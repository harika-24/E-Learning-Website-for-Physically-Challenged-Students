<?php
include "connection.php";
$code="MAT1001";
$k=0;
$id="vijaya";
$uid="10001";
$name="akhil";
$sql="insert into certificate(COURSECODE,MARKS,TEACHER,STUDENT,LOCATION) VALUES('$code','$k','$id','$uid','$name');";
mysqli_query($conn,$sql);
?>