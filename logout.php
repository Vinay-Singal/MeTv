<!-- logout.php -->
<?php
session_start();
session_destroy();
header("location: homepage.php"); // Redirect to login page after logout
?>
