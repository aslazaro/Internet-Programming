<?php
session_start();
$time = $_SERVER['REQUEST_TIME'];
$sessionduration= 240;


if(isset($_SESSION['last_action']) && ($time - $_SESSION['last_action']) > $sessionduration){
        session_unset();
        session_destroy();
        session_start();
        header("location:Loginpage.php?sessionend= Your session has expired. Please log-in again.");
    }

$_SESSION['last_action'] = $time;
?>
