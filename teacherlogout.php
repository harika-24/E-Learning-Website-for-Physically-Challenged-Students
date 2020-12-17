<?php
session_start();
unset($_SESSION['tuid']);
echo "<script>window.location=\"startup_teach_login.php\";</script>";
?>