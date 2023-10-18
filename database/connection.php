<?php
date_default_timezone_set('Asia/Manila');
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ;
$rootSiteURLAdmin = $protocol . $host . '/bnhs-enrollment/admin/';
$rootSiteURL = $protocol . $host . '/bnhs-enrollment/';

$conn = mysqli_connect('localhost', 'root', '', 'bnhs_enrollment_db');
?>