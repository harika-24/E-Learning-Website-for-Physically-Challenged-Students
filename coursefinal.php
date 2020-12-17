<?php

include "connection.php";
session_start();
$uid=$_SESSION['uid'];
$a=$_GET['a'];
$b=explode(":", $a);
$c=$b[0];
$d=$b[1];


$sql="insert into STUDENTCOURSE(COURSECODE,STUDENTID,MARKS,TEACHERID) VALUES('$c','$uid',0,'$d');";
mysqli_query($conn,$sql);
echo "<script>alert('you have succesfully registered this course');window.location=\"studentacc.php\";</script>";
?>