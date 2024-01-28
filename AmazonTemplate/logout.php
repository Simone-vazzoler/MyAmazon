<?php
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();

unset($_COOKIE['username']);
setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp

header("location:index.php");
?>