<?php
session_start();
foreach($_SESSION as $key => $val) {
    if($key !== 'bnhses_user_id') {
        unset($_SESSION[$key]);
    }
}

header('location: ../index.php');