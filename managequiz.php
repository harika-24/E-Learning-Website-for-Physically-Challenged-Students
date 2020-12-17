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
	<title>MANAGE QUIZ</title>
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
	<tr><th>COURSE CODE</th><th>COURSE NAME</th><th>STATUS</th><th>ENABLE/DISABLE</th></tr>
	<?php
	$sql="select * from COURSETEACHER WHERE TEACHER='$uid' and STATUS>0;";
	$result=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_assoc($result))
	{
		$str="";$status="";
		if($row['STATUS']==1)
		{
			$str="ENABLE";
			$status="PASSIVE";

		}
		else
		{
			$str="DISABLE";
			$status="ACTIVE";
		}
		$code=$row['COURSECODE'];
		$sql1="select * from COURSES WHERE COURSECODE='$code';";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_assoc($result1);
		echo "<tr><td>".$code."</td><td>".$row1['COURSENAME']."</td><td>".$status."</td><td><button><a href=\"enabledisable.php?a=".$code."\">".$str."</a></button></td></tr>";
	}
	?>
</table>
</body>
</html>