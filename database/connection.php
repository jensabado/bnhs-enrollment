<?php

use PHPMailer\PHPMailer\PHPMailer;
date_default_timezone_set('Asia/Manila');
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$rootSiteURLAdmin = $protocol . $host . '/bnhs-enrollment/admin/';
$rootSiteURL = $protocol . $host . '/bnhs-enrollment/';

$conn = mysqli_connect('localhost', 'root', '', 'bnhs_enrollment_db');

require $_SERVER['DOCUMENT_ROOT'] . '/bnhs-enrollment/vendor/autoload.php';

function sanitizeData($data)
{
    if (is_array($data)) {
        // If $data is an array, sanitize each element recursively
        foreach ($data as $key => $value) {
            $data[$key] = sanitizeData($value);
        }
    } elseif (is_string($data)) {
        // If $data is a string, apply string sanitization
        $data = filter_var($data, FILTER_SANITIZE_STRING);
    } elseif (is_int($data) || is_float($data)) {
        // If $data is an integer or float, apply numeric sanitization
        $data = filter_var($data, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    // Return the sanitized data
    return $data;
}

function sendEmail($mailConfig)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/bnhs-enrollment/PHPMailer/src/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bnhs-enrollment/PHPMailer/src/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bnhs-enrollment/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'TLS';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'codexztest@gmail.com';
    $mail->Password = 'yjkhawssqylireec';
    $mail->setFrom('codexztest@gmail.com', 'Bacoor Nation High School');
    $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);
    $mail->isHTML(true);
    $mail->Subject = $mailConfig['mail_subject'];
    $mail->Body = $mailConfig['mail_body'];

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }

}
