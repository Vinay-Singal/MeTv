<?php
session_start();
if(!isset($_SESSION['auth']))
{
    $_SESSION['auth_status']="login to Access Dashboard";
    header("Location: login.php");
    exit(0);
}
?>