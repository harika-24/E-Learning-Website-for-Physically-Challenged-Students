<?php
 $u="localhost";
 $s="root";
 $pas="";
 $db="hci";
 $conn=mysqli_connect($u,$s,$pas,$db);
if(isset($_POST['REGISTER']))
{
	
	if(empty($_POST['name']) || empty($_POST['age']) || empty($_POST['dob']) || empty($_POST['pass']) || empty($_POST['pass2'])  )
	{
		echo "<script>alert('Please enter all the fields');</script>";
	}
	else 
	{
		$name=$_POST["name"];$age=$_POST["age"];$dob=$_POST["dob"];$pass=$_POST["pass"];$uname=$_POST["uname"];$pass2=$_POST["pass2"];
		$p="8699";$e="0";
		$sql2="SELECT * FROM TEACHER WHERE USERNAME='$uname';";
	    $result=mysqli_query($conn,$sql2);
	    
	    if(mysqli_num_rows($result)!=0)
	    {
	    	echo "<script>alert('Username already exists!');</script>";
	    }
		else
		{
			if(strcmp($pass, $pass2)!=0)
			{
				echo "<script>alert('PLEASE TYPE SAME PASSWORDS');</script>";	
				

			}
			else
			{
				$sql="INSERT INTO TEACHER(NAME,AGE,USERNAME,PASSWORD,DOB) VALUES ('$name','$age','$uname','$pass','$dob');";
				mysqli_query($conn,$sql);		
				echo "<script>window.location='startup_teach_login.php';</script>";		
			}
		}
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="log.css">
	<script type="text/javascript">
		function analysis()
		{
			var s= document.getElementById('sc');
			alert(s.value);
		}
	</script>
</head>
<body>
	<h1 align="center"> SIGNUP FOR TEACHERS</h1>
<form action="teachersignup.php" method="post">
	<table>
	<tr><th>NAME: </th><td><input type="text" name="name"></td></tr>
	<tr><th>AGE: </th><td><input type="text" name="age"></td></tr>
	<tr><th>USERNAME: </th><td><input type="text" name="uname"></td></tr>
	<tr><th>DOB: </th><td><input type="text" name="dob"></td></tr>
	<tr><th>PASSWORD:</th><td><input type="password" name="pass"></td></tr>
	<tr><th>CONFIRM PASSWORD:</th><td> <input type="password" name="pass2"></td></tr>
	</table>
	<br>
	<input type="submit" value="REGISTER" name="REGISTER">
</form>
</body>
</html>