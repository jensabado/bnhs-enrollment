<?php
session_start();
require_once '../database/connection.php';

if (isset($_POST['add_new_student'])) {
    $firstname = $_POST['add_firstname'];
    $lastname = $_POST['add_lastname'];
    $mi = $_POST['add_mi'];
    $gender = $_POST['add_gender'];
    $bdate = $_POST['add_bdate'];
    $address = $_POST['add_address'];
    $placebirth = $_POST['add_placebirth'];
    $nationality = $_POST['add_nationality'];
    $religion = $_POST['add_religion'];
    $civil_status = $_POST['add_civil_status'];
    $contact = $_POST['add_contact'];
    $guardian = $_POST['add_guardian'];
    $email = $_POST['add_email'];
    $guardian_contact = $_POST['add_guardian_contact'];
    $timestamp = time();
    $upload_folder = '../admin/assets/img/requirements/';

    $response = array();

    if (empty($firstname)) {
        $response['firstname'] = 'First Name is required!';
    } else {
        $response['firstname'] = '';
    }

    if (empty($lastname)) {
        $response['lastname'] = 'Last Name is required!';
    } else {
        $response['lastname'] = '';
    }

    if(empty($bdate)) {
        $response['bdate'] = 'Birth Date is required!';
    } else {
        $response['bdate'] = '';
    }

    if (empty($address)) {
        $response['address'] = 'Address is required!';
    } else {
        $response['address'] = '';
    }

    if (empty($placebirth)) {
        $response['placebirth'] = 'Place of Birth is required!';
    } else {
        $response['placebirth'] = '';
    }

    if (empty($nationality)) {
        $response['nationality'] = 'Nationality is required!';
    } else {
        $response['nationality'] = '';
    }

    if (empty($religion)) {
        $response['religion'] = 'Religion is required!';
    } else {
        $response['religion'] = '';
    }

    if (empty($civil_status)) {
        $response['civil_status'] = 'Religion is required!';
    } else {
        $response['civil_status'] = '';
    }

    if (empty($contact)) {
        $response['contact'] = 'Contact is required!';
    } else {
        $pattern = '/^9\d{9}$/';

        if (preg_match($pattern, $contact)) {
            $response['contact'] = '';
        } else {
            $response['contact'] = 'Invalid contact format!';
        }
    }

    if (empty($email)) {
        $response['email'] = 'Email is required!';
    } else {
        $pattern = '/^9\d{9}$/';

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['email'] = '';
        } else {
            $response['email'] = 'Invalid email format!';
        }
    }

    if (empty($guardian)) {
        $response['guardian'] = 'Guardian Name is required!';
    } else {
        $response['guardian'] = '';
    }

    if (empty($guardian_contact)) {
        $response['guardian_contact'] = 'Guardian\'s Contact is required!';
    } else {
        $pattern = '/^9\d{9}$/';

        if (preg_match($pattern, $guardian_contact)) {
            $response['guardian_contact'] = '';
        } else {
            $response['guardian_contact'] = 'Invalid contact format!';
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

    if (isset($_FILES['add_pdf_file']) && !empty($_FILES['add_pdf_file']['name'])) {
        $allowedExtensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png"); // Add more formats if needed
        $allowedMimeTypes = array(
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "image/jpeg",
            "image/png",
        );

        $fileExtension = pathinfo($_FILES['add_pdf_file']['name'], PATHINFO_EXTENSION);
        $fileMimeType = $_FILES['add_pdf_file']['type'];

        if (in_array($fileExtension, $allowedExtensions) && in_array($fileMimeType, $allowedMimeTypes)) {
            $response['pdf_file'] = '';
        } else {
            $response['pdf_file'] = 'Invalid file type. Only documents and images are allowed.';
        }
    } else {
        $response['pdf_file'] = 'PDF File is required!';
    }

    if (isset($_FILES['add_form_138']) && !empty($_FILES['add_form_138']['name'])) {
        $allowedExtensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png"); // Add more formats if needed
        $allowedMimeTypes = array(
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "image/jpeg",
            "image/png",
        );

        $fileExtension = pathinfo($_FILES['add_form_138']['name'], PATHINFO_EXTENSION);
        $fileMimeType = $_FILES['add_form_138']['type'];

        if (in_array($fileExtension, $allowedExtensions) && in_array($fileMimeType, $allowedMimeTypes)) {
            $response['form_138'] = '';
        } else {
            $response['form_138'] = 'Invalid file type. Only documents and images are allowed.';
        }
    } else {
        $response['form_138'] = 'Form 138 is required!';
    }

    if (isset($_FILES['add_psa']) && !empty($_FILES['add_psa']['name'])) {
        $allowedExtensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png"); // Add more formats if needed
        $allowedMimeTypes = array(
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "image/jpeg",
            "image/png",
        );

        $fileExtension = pathinfo($_FILES['add_psa']['name'], PATHINFO_EXTENSION);
        $fileMimeType = $_FILES['add_psa']['type'];

        if (in_array($fileExtension, $allowedExtensions) && in_array($fileMimeType, $allowedMimeTypes)) {
            $response['psa'] = '';
        } else {
            $response['psa'] = 'Invalid file type. Only documents and images are allowed.';
        }
    } else {
        $response['psa'] = 'PSA Birth Cert is required!';
    }

    if (isset($_FILES['add_brgy_clearance']) && !empty($_FILES['add_brgy_clearance']['name'])) {
        $allowedExtensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png"); // Add more formats if needed
        $allowedMimeTypes = array(
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "image/jpeg",
            "image/png",
        );

        $fileExtension = pathinfo($_FILES['add_brgy_clearance']['name'], PATHINFO_EXTENSION);
        $fileMimeType = $_FILES['add_brgy_clearance']['type'];

        if (in_array($fileExtension, $allowedExtensions) && in_array($fileMimeType, $allowedMimeTypes)) {
            $response['brgy_clearance'] = '';
        } else {
            $response['brgy_clearance'] = 'Invalid file type. Only documents and images are allowed.';
        }
    } else {
        $response['brgy_clearance'] = 'Barangay Clearance is required!';
    }

    if (isset($_FILES['add_good_moral']) && !empty($_FILES['add_good_moral']['name'])) {
        $allowedExtensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png"); // Add more formats if needed
        $allowedMimeTypes = array(
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "image/jpeg",
            "image/png",
        );

        $fileExtension = pathinfo($_FILES['add_good_moral']['name'], PATHINFO_EXTENSION);
        $fileMimeType = $_FILES['add_good_moral']['type'];

        if (in_array($fileExtension, $allowedExtensions) && in_array($fileMimeType, $allowedMimeTypes)) {
            $response['good_moral'] = '';
        } else {
            $response['good_moral'] = 'Invalid file type. Only documents and images are allowed.';
        }
    } else {
        $response['good_moral'] = 'Good Moral is required!';
    }

    if (isset($_FILES['add_guardian_id']) && !empty($_FILES['add_guardian_id']['name'])) {
        $allowedExtensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png"); // Add more formats if needed
        $allowedMimeTypes = array(
            "application/pdf",
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "image/jpeg",
            "image/png",
        );

        $fileExtension = pathinfo($_FILES['add_guardian_id']['name'], PATHINFO_EXTENSION);
        $fileMimeType = $_FILES['add_guardian_id']['type'];

        if (in_array($fileExtension, $allowedExtensions) && in_array($fileMimeType, $allowedMimeTypes)) {
            $response['guardian_id'] = '';
        } else {
            $response['guardian_id'] = 'Invalid file type. Only documents and images are allowed.';
        }
    } else {
        $response['guardian_id'] = 'Guardian\'s ID is required!';
    }

    if (count($response) != 0) {
        $new_video = $timestamp . '_' . $_FILES['add_video']['name'];
        $new_pdf_file = $timestamp . '_' . $_FILES['add_pdf_file']['name'];
        $new_form_138 = $timestamp . '_' . $_FILES['add_form_138']['name'];
        $new_psa = $timestamp . '_' . $_FILES['add_psa']['name'];
        $new_brgy_clearance = $timestamp . '_' . $_FILES['add_brgy_clearance']['name'];
        $new_good_moral = $timestamp . '_' . $_FILES['add_good_moral']['name'];
        $new_guardian_id = $timestamp . '_' . $_FILES['add_guardian_id']['name'];

        $query = mysqli_prepare($conn, "SELECT * FROM tbl_student WHERE email = ? AND status != 0 AND is_deleted = 'no'");

        mysqli_stmt_bind_param($query, "s", $email);

        mysqli_stmt_execute($query);

        $result = mysqli_stmt_get_result($query);

        if(mysqli_num_rows($result) > 0) {
            $response['status'] = 'invalid';
            $response['email'] = 'Email already used!';
            mysqli_stmt_close($query);
        } else {
            mysqli_stmt_close($query);

            $query = mysqli_prepare($conn, "INSERT INTO tbl_student (lastname, firstname, middle_initial, gender, date_of_birth, address, place_of_birth, nationality, religion, civil_status, contact_no, guardian, email, parent_contact_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            mysqli_stmt_bind_param($query, "ssssssssssssss", $lastname, $firstname, $mi, $gender, $bdate, $address, $placebirth, $nationality, $religion, $civil_status, $contact, $guardian, $email, $guardian_contact);

            $result = mysqli_stmt_execute($query);

            if($result) {
                $response['status'] = 'success';
                $response['message'] = 'Registration already submitted. Please wait for email confirmation.';
                mysqli_stmt_close($query);
                mysqli_close($conn);
            }
        }
    } else {
        $response['status'] = 'success';
    }

    echo json_encode($response);
}
