<?php

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
        }
    }

    $contact = $_POST['add_contact'];
    $email = $_POST['add_email'];

    $contact_pattern = '/^9\d{9}$/';
    $email_pattern = '/^\S+@\S+\.\S+$/';

    if (!preg_match($contact_pattern, $contact)) {
        $response['add_contact'] = 'Invalid contact format!';
    }

    if (!preg_match($email_pattern, $email)) {
        $response['add_email'] = 'Invalid email format!';
    }

    $required_files = array(
        'add_video' => 'Video Record',
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
            }
        } else {
            $response[$file_field] = $file_label . ' is required!';
        }
    }

    if (empty($response['add_email'])) {
        $conn = mysqli_connect("your_db_host", "your_db_user", "your_db_password", "your_db_name");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $email = $_POST['add_email'];
        $query = mysqli_prepare($conn, "SELECT * FROM tbl_student WHERE email = ? AND status != 0 AND is_deleted = 'no'");

        mysqli_stmt_bind_param($query, "s", $email);

        mysqli_stmt_execute($query);

        $result = mysqli_stmt_get_result($query);

        if (mysqli_num_rows($result) > 0) {
            $response['status'] = 'invalid';
            $response['add_email'] = 'Email already used!';
            mysqli_stmt_close($query);
        } else {
            mysqli_stmt_close($query);

            $query = mysqli_prepare($conn, "INSERT INTO tbl_student (lastname, firstname, middle_initial, gender, date_of_birth, address, place_of_birth, nationality, religion, civil_status, contact_no, guardian, email, parent_contact_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            mysqli_stmt_bind_param($query, "ssssssssssssss", $_POST['add_lastname'], $_POST['add_firstname'], $_POST['add_mi'], $_POST['add_gender'], $_POST['add_bdate'], $_POST['add_address'], $_POST['add_placebirth'], $_POST['add_nationality'], $_POST['add_religion'], $_POST['add_civil_status'], $_POST['add_contact'], $_POST['add_guardian'], $_POST['add_email'], $_POST['add_guardian_contact']);

            $result = mysqli_stmt_execute($query);

            if ($result) {
                $response['status'] = 'success';
                $response['message'] = 'Registration already submitted. Please wait for email confirmation.';
                mysqli_stmt_close($query);
            }

            mysqli_close($conn);
        }
    } else {
        $response['status'] = 'success';
    }

    echo json_encode($response);
}