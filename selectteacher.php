<?php
include "connection.php";
if (isset($_POST['submit'])) {
	$s=$_POST['check'];
	$f=$_POST['course'];
	for($i=0;$i<sizeof($s);$i++)
	{
		$sql2="INSERT INTO courseteacher (COURSECODE, TEACHER) VALUES ('$f','$s[$i]')";
		mysqli_query($conn,$sql2);

	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SELECT TEACHER</title>
	<link rel="stylesheet" type="text/css" href="acc.css">
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
	<h2 class="wel"> WELCOME ADMIN</h2><br><br><br><br>
	<a href="teacherlogout.php" class="wel">LOGOUT</a><br>
	</div><br><br>
<form action="selectteacher.php" method="post">
	<table>
	<tr><th>COURSES:</th> <td><select name="course">
		<?php
		$sql="select * from COURSES;";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			echo "<option value=".$row['COURSECODE'].">".$row['COURSENAME']."</option>";
		}
		?>
	</select></td></tr>
	<tr><th colspan="2" align="center">TEACHER</th></tr>
		 <?php
		 $sql1="select * from TEACHER;";
		 $result1=mysqli_query($conn,$sql1);
		 while($row1=mysqli_fetch_assoc($result1))
		{
			echo "<tr><td colspan=\"2\"><input type='checkbox' name='check[]' value=".$row1['USERNAME'].">".$row1['NAME']."</td></tr>";
		}
		?>
		 
	<tr><th colspan="2" align="center">
	<input type="submit" name="submit"></th></tr>
</table>


</form>
</body>
</html>
