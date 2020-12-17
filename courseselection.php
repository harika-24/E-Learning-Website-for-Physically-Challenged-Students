<?php
include "connection.php";
session_start();
$uid=$_SESSION['tuid'];
$sql="select * from TEACHER where USERNAME='$uid';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
?>
<!DOCTYPE html>
<html>
<head>
	<title>COURSE SELECTION</title>
	<link rel="stylesheet" type="text/css" href="styleak.css">
	<style type="text/css">
		table,td,th
		{
			border: 2px solid black;
			border-collapse: collapse;
			padding: 5px;
		}
		table{
			margin-top: 100px;
			margin-left: 350px;
		}
		tr:hover
		{
			background-color: yellow;
		}
	</style>
</head>
<body>
	<div id="top">
	<img src="logo.png">
	<h2 class="wel"> WELCOME <?php echo $row['NAME'];?></h2><br><br><br><br>
	<a href="teacherlogout.php" class="wel">LOGOUT</a><br>
	</div><br><br>
<table>
	<tr>
		<th>COURSE CODE</th>
		<th>COURSE NAME</th>
		<th>GO</th>
	</tr>
	<?php
	$sql="select * from COURSETEACHER WHERE TEACHER='$uid';";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{
		$cd=$row['COURSECODE'];
		$sql2="select * from COURSES where COURSECODE='$cd';";
		$res=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_assoc($res);
		echo "<tr><td>".$cd."</td><td>".$row2['COURSENAME']."</td><td><a href=\"teacherquiz.php?a=".$cd."\">VIEW</a></td></tr>";
	}
	?>
</table>
</body>
</html>