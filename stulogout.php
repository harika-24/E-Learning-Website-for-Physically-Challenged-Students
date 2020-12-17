<?php
session_start();
unset($_SESSION['uid']);
echo "<script>window.location='startup_stu_login.php';</script>";
?>