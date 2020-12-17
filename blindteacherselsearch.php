<?php
session_start();
$uid=$_SESSION['bid'];
include 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>COURSES</title>
	<script type="text/javascript">
		function al()
		{
			var msg=new SpeechSynthesisUtterance("no such result found you are redirected to course teacher selection page ");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			
			
		}
		function sp()
		{
			var msg=new SpeechSynthesisUtterance("empty fields are detected you are redirected");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			
		}
		function my(id){
			var p=document.getElementById(id).innerHTML;
			var msg=new SpeechSynthesisUtterance(p);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}

	</script>
</head>
<body>

<?php

if (isset($_POST['submit'])) 
{
	$a=$_GET['a'];
	$search=strtoupper($_POST['search']);
	if(empty($search))
	{
		echo "<script>sp();window.location=\"blindteachersel.php?a=".$a."\";</script>";
	}
	else
	{
		
		
		$sql="select * from TEACHER where NAME='$search';";
		$res=mysqli_query($conn,$sql);
		$check=mysqli_num_rows($res);
		
		if($check<1)
		{
			echo "<script>al();</script>";
			echo "<script>window.location=\"blindteachersel.php?a=".$a."\";</script>";

		}
		else
		{
			$i=0;
			while ($row=mysqli_fetch_assoc($res)) {
				$id=$row['USERNAME'];
				$sql2="select * from COURSETEACHER WHERE TEACHER='$id' and COURSECODE='$a';";
				$res2=mysqli_query($conn,$sql2);
				if(mysqli_num_rows($res2)<1)
				{
					echo "<script>al();</script>";
				}
				else
				{
					while($row2=mysqli_fetch_assoc($res2))
					{
						echo "<a href=\"finalselect.php?a=".$row2['TEACHER'].":".$a."\" id=\"".$row['NAME']."\" onkeyup=\"my(this.id)\" tabindex=".$i.">".$row['NAME']."</a><br>"; 
						$i=$i+1;
					}
				}
			}
			echo "<a href=\"blindteachersel.php?a=".$a."\" id='res' onkeyup=\"my(this.id)\">BACK</a>";
			
		}
	}
}
?>

</body>
</html>
