<?php
session_start();
$uid=$_SESSION['bid'];
include 'connection.php';
$a=$_GET['a'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("YOUR HAVE ENTERED YOUR ENROLL COURSE PAGE PLEASE ENTER TAB TO PROCEED");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function sp(event,d)
		{
			
			if(event.code=='Tab')
			{
				var msg=new SpeechSynthesisUtterance(d);
				msg.lang="en-US";
				speechSynthesis.speak(msg);
			}
			else if(event.keyCode>=48 && event.keyCode<=57)
			{
				var num=event.keyCode-48;
				var l=document.getElementById('ss');
				q=l.innerHTML;
				q=q+num;
				l.innerHTML=q;
				var msg=new SpeechSynthesisUtterance(num);
				msg.lang="en-US";
				speechSynthesis.speak(msg);

			}
			else
			{
				var p=event.code;
				var o=p[3];
				var l=document.getElementById('ss');
				q=l.innerHTML;
				q=q+o;
				l.innerHTML=q;
				var msg=new SpeechSynthesisUtterance(o);
				msg.lang="en-US";
				speechSynthesis.speak(msg);

			}
		}
		function sp1(d)
		{
			var t=document.getElementById(d).innerHTML;
			var msg=new SpeechSynthesisUtterance(t);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
	</script>
</head>
<body>
<form action="blindteacherselsearch.php?a=<?php echo $a;?>" method="post">
	<input type="text" name="search" tabindex="1" onkeyup="sp(event,'search function for courses');">
	<input type="submit" name="submit" tabindex="2" onkeyup="sp(event,'submit');">
</form>
<table>
	<?php
	$sql="select * from COURSETEACHER where COURSECODE='$a';";
	$res=mysqli_query($conn,$sql);
	$i=3;
	while($row=mysqli_fetch_assoc($res))
	{
		$id=$row['TEACHER'];
		$sql2="select * from TEACHER where USERNAME='$id';";
		$res2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_assoc($res2);
		echo "<a href=\"finalselect.php?a=".$id.":".$a."\" id=".$id." onkeyup=\"sp1(this.id);\" tabindex=".$i.">".$row2['NAME']."</a><br>";
		$i=$i+1;
	}
	?>
</table>
<a href="blindenroll.php" tabindex="<?php echo $i+1;?>" onkeyup="sp1('back');" id="back">BACK</a>

<p id="ss"></p>
</body>
</html>