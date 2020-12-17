<?php
include "connection.php";
if(isset($_POST['submit']))
{
	$uid=$_POST['uid'];
	$pass=$_POST['pass'];
	$sql="select * from TEACHER where USERNAME='$uid';";
	$res=mysqli_query($conn,$sql);
	$check=mysqli_num_rows($res);
	if (empty($uid) || empty($pass)) 
	{
		echo "<script> alert('PLEASE ENTER ALL THE FIELDS');</script>";
	}
	else
	{
		if($check==0)
		{
			echo "<script>alert('USERNAME DOESNOT EXIST');</script>";
		}
		else
		{
			$row=mysqli_fetch_assoc($res);
			if(strcmp($pass, $row['PASSWORD'])==0)
			{
				session_start();
				$_SESSION["tuid"]=$uid;

				echo "<script>window.location=\"teacheracc.php\";</script>";
			}
			else
			{
				echo "<script>alert('WRONG PASSWORD');</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TEACHER LOGIN</title>
	<script type="text/javascript">

	</script>
	<link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>
	<h1 align="center">LOGIN FOR TEACHERS</h1>
<form method="post" action="teacherlog.php">
	<table>
		<tr><th>USERNAME:</th><td><input type="text" name="uid" placeholder="USERNAME"><br></td></tr>
	<tr><th>PASSWORD</th><td><input type="password" name="pass" placeholder="PASSWORD"><br></td></tr>
	<tr><td colspan="2" id="suq"><input type="submit" name="submit" id="sub" align="center"></td></tr>
</table>
</form>
<p id="emp"> </p>
</body>
</html>