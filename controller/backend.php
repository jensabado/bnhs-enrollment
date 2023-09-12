<?php
session_start();
require_once '../database/connection.php';

if (isset($_POST['add_new_student'])) {
    $response = array();
    $upload_folder = '../admin/assets/img/requirements/';
    $timestamp = time();

    $fields = array(
        'add_firstname' => 'First Name',
        'add_lastname' => 'Last Name',
        'add_bdate' => 'Birth Date',
        'add_address' => 'Address',
        'add_placebirth' => 'Place of Birth',
        'add_nationality' => 'Nationality',
        'add_religion' => 'Religion',
        'add_civil_status' => 'Civil Status',
        'add_contact' => 'Contact',
        'add_email' => 'Email',
        'add_guardian' => 'Guardian Name',
        'add_guardian_contact' => 'Guardian\'s Contact',
    );

    foreach ($fields as $field => $label) {
        if (empty($_POST[$field])) {
            $response[$field] = $label . ' is required!';
        } else {
            $response[$field] = '';
            if ($field == 'add_contact' || $field == 'add_guardian_contact') {
                $contact_pattern = '/^9\d{9}$/';
                if (!preg_match($contact_pattern, $_POST[$field])) {
                    $response[$field] = 'Invalid contact format!';
                } else {
                    $response[$field] = '';
                }
            }
            if ($field == 'add_email') {
                $email_pattern = '/^\S+@\S+\.\S+$/';
                if (!preg_match($email_pattern, $_POST[$field])) {
                    $response[$field] = 'Invalid email format!';
                } else {
                    $response[$field] = '';
                }
            }
        }
    }

    if (isset($_FILES['add_video']) && !empty($_FILES['add_video']['name'])) {
        $allowedExtensions = array("mp4", "avi", "mov", "mkv");
        $allowedMimeTypes = array("video/mp4", "video/avi", "video/quicktime", "video/x-matroska");

        $fileExtension = pathinfo($_FILES['add_video']['name'], PATHINFO_EXTENSION);
        $fileMimeType = $_FILES['add_video']['type'];

        if (in_array($fileExtension, $allowedExtensions) && in_array($fileMimeType, $allowedMimeTypes)) {
            $response['video'] = '';
        } else {
            $response['video'] = 'Invalid file type. Only video files are allowed.';
        }
    } else {
        $response['video'] = 'Video Record required!';
    }

    $required_files = array(
        'add_pdf_file' => 'PDF File',
        'add_form_138' => 'Form 138',
        'add_psa' => 'PSA Birth Cert',
        'add_brgy_clearance' => 'Barangay Clearance',
        'add_good_moral' => 'Good Moral',
        'add_guardian_id' => 'Guardian\'s ID',
    );

    foreach ($required_files as $file_field => $file_label) {
        if (isset($_FILES[$file_field]) && !empty($_FILES[$file_field]['name'])) {
            $allowedExtensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png"); // Add more formats if needed
            $allowedMimeTypes = array(
                "application/pdf",
                "application/msword",
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                "image/jpeg",
                "image/png",
            );

            $fileExtension = pathinfo($_FILES[$file_field]['name'], PATHINFO_EXTENSION);
            $fileMimeType = $_FILES[$file_field]['type'];

            if (!in_array($fileExtension, $allowedExtensions) || !in_array($fileMimeType, $allowedMimeTypes)) {
                $response[$file_field] = 'Invalid file type. Only documents and images are allowed.';
            } else {
                $response[$file_field] = '';
            }
        } else {
            $response[$file_field] = $file_label . ' is required!';
        }
    }

    $is_all_empty = true;
    $exclude_key = 'status';

    foreach ($response as $key => $value) {
        if ($key !== $exclude_key && !empty($value)) {
            $is_all_empty = false;
            break;
        }
    }

    if ($is_all_empty) {
        $video_name = $timestamp . '_' . $_FILES['add_video']['name'];
        $pdf_file_name = $timestamp . '_' . $_FILES['add_pdf_file']['name'];
        $form_138_name = $timestamp . '_' . $_FILES['add_form_138']['name'];
        $psa_name = $timestamp . '_' . $_FILES['add_psa']['name'];
        $brgy_clearance_name = $timestamp . '_' . $_FILES['add_brgy_clearance']['name'];
        $good_moral_name = $timestamp . '_' . $_FILES['add_good_moral']['name'];
        $guardian_id_name = $timestamp . '_' . $_FILES['add_guardian_id']['name'];
        $form_138 = '../admin/assets/requirements/form-138/' . $timestamp . '_' . $_FILES['add_form_138']['name'];
        $psa = '../admin/assets/requirements/psa-birth-cert/' . $timestamp . '_' . $_FILES['add_psa']['name'];
        $brgy_clearance = '../admin/assets/requirements/brgy-clearance/' . $timestamp . '_' . $_FILES['add_brgy_clearance']['name'];
        $good_moral = '../admin/assets/requirements/good-moral/' . $timestamp . '_' . $_FILES['add_good_moral']['name'];
        $guardian_id = '../admin/assets/requirements/guardian-id/' . $timestamp . '_' . $_FILES['add_guardian_id']['name'];

        $query = mysqli_prepare($conn, "SELECT * FROM tbl_student WHERE email = ? AND status != 0 AND is_deleted = 'no'");

        mysqli_stmt_bind_param($query, "s", $_POST['add_email']);

        mysqli_stmt_execute($query);

        $result = mysqli_stmt_get_result($query);

        if (mysqli_num_rows($result) > 0) {
            $response['status'] = 'invalid';
            $response['email'] = 'Email already used!';
            mysqli_stmt_close($query);
        } else {
            mysqli_stmt_close($query);

            $query = mysqli_prepare($conn, "INSERT INTO tbl_student (lastname, firstname, middle_initial, gender, date_of_birth, address, place_of_birth, nationality, religion, civil_status, contact_no, guardian, email, parent_contact_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            mysqli_stmt_bind_param($query, "ssssssssssssss", $_POST['add_lastname'], $_POST['add_firstname'], $_POST['add_mi'], $_POST['add_gender'], $_POST['add_bdate'], $_POST['add_address'], $_POST['add_placebirth'], $_POST['add_nationality'], $_POST['add_religion'], $_POST['add_civil_status'], $_POST['add_contact'], $_POST['add_guardian'], $_POST['add_email'], $_POST['add_guardian_contact']);

            $result = mysqli_stmt_execute($query);

            if ($result) {
                $student_id = mysqli_insert_id($conn);
                mysqli_stmt_close($query);

                move_uploaded_file($_FILES['add_video']['tmp_name'], '../admin/assets/requirements/video-record/' . $video_name);
                move_uploaded_file($_FILES['add_pdf_file']['tmp_name'], '../admin/assets/requirements/pdf-file/' . $pdf_file_name);
                move_uploaded_file($_FILES['add_form_138']['tmp_name'], '../admin/assets/requirements/form-138/' . $form_138_name);
                move_uploaded_file($_FILES['add_psa']['tmp_name'], '../admin/assets/requirements/psa-birth-cert/' . $psa_name);
                move_uploaded_file($_FILES['add_brgy_clearance']['tmp_name'], '../admin/assets/requirements/brgy-clearance/' . $brgy_clearance_name);
                move_uploaded_file($_FILES['add_good_moral']['tmp_name'], '../admin/assets/requirements/good-moral/' . $good_moral_name);
                move_uploaded_file($_FILES['add_guardian_id']['tmp_name'], '../admin/assets/requirements/guardian-id/' . $guardian_id_name);

                $query = mysqli_prepare($conn, "INSERT INTO tbl_requirements (student_id, video_record, pdf_file, form_138, psa_birth_cert, brgy_clearance, good_moral, guardian_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                mysqli_stmt_bind_param($query, "isssssss", $student_id, $video_name, $pdf_file_name, $form_138_name, $psa_name, $brgy_clearance_name, $good_moral_name, $guardian_id_name);

                $result = mysqli_stmt_execute($query);

                if ($result) {
                    $response['status'] = 'success';
                    $response['message'] = 'Registration already submitted. Please wait for email confirmation.';
                    mysqli_stmt_close($query);
                    mysqli_close($conn);
                } else {
                    $response['status'] = 'failed';
                    $response['message'] = 'Something went wrong.';
                    mysqli_stmt_close($query);
                    mysqli_close($conn);
                }
            }
        }
    } else {
        $response['status'] = 'invalid';
    }

    echo json_encode($response);
}
