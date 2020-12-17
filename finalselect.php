<?php
session_start();
$uid=$_SESSION['bid'];
include 'connection.php';
$a=$_GET['a'];
$ar=explode(":", $a);
$tid=$ar[0];
$code=$ar[1];
echo $code;
$sql="insert into blindstudentcourse values('$code','$uid',0,'$tid');";
mysqli_query($conn,$sql);
echo "<script>window.location=\"blindenroll.php\";</script>";
?>
