
<!DOCTYPE html>
<html>
<head>
	<title>
		slf
	</title>
	<script type="text/javascript">
		function fp()
		{
			var msg=new SpeechSynthesisUtterance("EMPTY FIELDS ARE DETECTED SO YOU ARE AGAIN REDIRECTED TO SIGNUP PAGE PLEASE FILL IT AGAIN");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="final.html";
		}
		function unequal()
		{
			var msg=new SpeechSynthesisUtterance("UNEQUAL PASSWORDS ARE DETECTED SO YOU ARE AGAIN REDIRECTED TO SIGNUP PAGE PLEASE FILL IT AGAIN");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="final.html";			
		}
		function user()
		{
			var msg=new SpeechSynthesisUtterance("USERNAME ALREADY PRESENT SO YOU ARE AGAIN REDIRECTED TO SIGNUP PAGE. PLEASE USE DIFFERENT USERNAME");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="final.html";			
		}
		function success()
		{
			var msg=new SpeechSynthesisUtterance("USER SIGNED UP SUCCESSFULLY");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			window.location="blindlog.php";			
		}
	</script>
</head>
<body>

</body>
</html>

<?php
include "connection.php";
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$age=$_POST['age'];
	$username=strtolower($_POST['uid']) ;
	$pwd=strtolower($_POST['pwd']);
	$pwd2=strtolower($_POST['pwd2']);
	$dob=$_POST['dob'];
	str_replace('s', '/', $dob);
	if(empty($name) || empty($age) || empty($username) || empty($pwd) || empty($pwd2) || empty($dob))
	{
		echo "<script>fp();</script>";
	} 
	else
	{
		if(strcmp($pwd, $pwd2)!=0)
		{
			echo "<script>unequal();</script>";
		}
		else
		{
			$sql2="select * from blind where USERNAME='$username';";
			$res=mysqli_query($conn,$sql2);
			$row=mysqli_num_rows($res);
			if($row!=0)
			{
				echo "<script>user();</script>";
			}
			else
			{		
				$sql="insert into blind values('$name','$age','$username','$pwd','$dob');";
				mysqli_query($conn,$sql);
				echo "<script>success();</script>";
			}

		}
	}
}
?>