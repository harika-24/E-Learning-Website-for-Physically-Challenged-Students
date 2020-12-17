<?php
session_start();
include 'connection.php';
$uid=$_SESSION['tuid'];
$sql="select * from TEACHER where USERNAME='$uid';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
?>
<!DOCTYPE html>
<html>
<head>
	<title>TEACHER HOME</title>
	<link rel="stylesheet" type="text/css" href="acc.css">
</head>
<body>
	<div id="top">
	<img src="logo.png">
	<h2 class="wel"> WELCOME <?php echo $row['NAME'];?></h2><br><br><br><br>
	<a href="teacherlogout.php" class="wel">LOGOUT</a><br>
	</div><br><br>
<ul>
<li><a href="courseselection.php">PREPARE QUIZ</a><br></li>
<li><a href="managequiz.php"> MANAGE QUIZ</a><br></li>
<li><a href="teacherupload.php">UPLOADS</a><br></li>

</ul>	
</body>
</html>