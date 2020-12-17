<?php
include "connection.php";
session_start();
$uid=$_SESSION['tuid'];
$code=$_GET['a'];
$sqlname="select * from TEACHER where USERNAME='$uid';";
$rowname=mysqli_fetch_assoc(mysqli_query($conn,$sqlname));
$sql="select  * from courses where COURSECODE='$code';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
if (isset($_POST['submit'])) {
	
	$name=$_FILES['file']['name'];
	
	if(!empty($_POST['topic'])&& !empty($name))
	{
		$tmp=$_FILES['file']['tmp_name'];
		$s=explode(".", $name);
		$code=$_GET['a'];
		$d=end($s);
		$arr=array('txt','mp4','3gp','mkv');
		if(in_array($d, $arr))
		{
			$topic=$_POST['topic'];
			$filename=$topic.".".$d;
			$dest='uploads/';
			for($i=0;$i<3;$i++)
			{
				if($i==0)
				{
					if(!is_dir($dest))
					{
						mkdir($dest);
						
					}
				}
				else if($i==1)
				{
					$dest=$dest.$code.'/';
					if(!is_dir($dest))
					{
						mkdir($dest);
						
					}
				}
				else if($i==2)
				{
					$dest=$dest.$uid.'/';
					if(!is_dir($dest))
					{
						mkdir($dest);
						
					}
				}

				
			}
			
			$dest=$dest.$filename;
			move_uploaded_file($tmp, $dest);
			$sql1="insert into UPLOADS(COURSECODE,TEACHER,TOPIC,LOCATION) VALUES('$code','$uid','$topic','$dest');";
			mysqli_query($conn,$sql1);
			
			
			
		
		}
		else
		{
			echo "<script>alert('".$d."');window.location=\"finalupload.php?a=".$code."\";</script>";	
		}
	}
	else
	{
		echo "<script>alert('EMPTY FIELDS DETECTED');window.location=\"finalupload.php?a=".$code."\";</script>";
	}
	

	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FINAL UPLOAD</title>
	<link rel="stylesheet" type="text/css" href="styleak.css">
	<style type="text/css">
		table,td,th
		{
			border: 2px solid black;
			border-collapse: collapse;
			padding: 5px;
		}
		table{
			margin-top: 10px;
			margin-left: 550px;
		}
		tr:hover
		{
			background-color: yellow;
		}
		#up {
			margin-left: 500px;
		}
	</style>
</head>
<body>
	<div id="top">
	<img src="logo.png">
	<h2 class="wel"> WELCOME <?php echo $rowname['NAME'];?></h2><br><br><br><br>
	<a href="teacherlogout.php" class="wel">LOGOUT</a><br>
	</div><br><br>
<h1 align="center"> <?php echo $row['COURSENAME']; ?></h1>
<h2 align="center">DELETE EXISTING MATERIALS</h2><br>
<table>
	<tr><th>TOPIC</th><th>DOWNLOAD</th><th>DELETE</th></tr>
	<?php 
	$sql="select * from uploads where TEACHER='$uid' and COURSECODE='$code';";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<tr><td>".$row['TOPIC']."</td><td><a href=\"".$row['LOCATION']."\" download>VIEW</a></td><td><button><a href=\"deletedoc.php?a=".$row['LOCATION'].":".$code."\">DELETE</a></button></td></tr>";
	}
	?>
</table>
<h2 align="center">UPLOADS</h2>
<br>
<form action="finalupload.php?a=<?php echo $code;?>" method="post" enctype="multipart/form-data" align="center">
	<table id="up">
	<tr><th>TOPIC:</th><td><input type="text" name="topic"><br></td></tr>
	<tr><th>CHOOSE FILE:</th><td><input type="file" name="file" id="file"><br></td></tr>
	<tr><td colspan="2"><input type="submit" name="submit"></td></tr>
	</table>
</form>
</body>
</html>