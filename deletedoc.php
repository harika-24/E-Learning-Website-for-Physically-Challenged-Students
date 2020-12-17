<?php
include "connection.php";
session_start();
$uid=$_SESSION['tuid'];
$a=$_GET['a'];
$v=explode(":", $a);
$b=$v[0];
$c=end($v);
$sql1="delete from uploads where LOCATION='$b';";
mysqli_query($conn,$sql1);
unlink($b);
echo "<script>alert('delted');window.location=\"finalupload.php?a=".$c."\";</script>";
?>
