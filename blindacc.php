<?php
session_start();
$uid=$_SESSION['bid'];
echo $uid;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		window.onload=function()
		{
			var msg=new SpeechSynthesisUtterance("YOUR HAVE ENTERED YOUR HOME PAGE");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
		function sp(d)
		{
			var msg=new SpeechSynthesisUtterance(d);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
		}
	</script>
</head>
<body>
<a href="blindenroll.php" tabindex="1" onkeyup="sp('enroll course')">enroll course</a>
<a href="blindcourse.php" tabindex="2" onkeyup="sp('courses enrolled')">course enrolled</a>
<a href="blindquiz.php" tabindex="3" onkeyup="sp('quiz')">quiz</a>
<a href="blindcert.php" tabindex="4" onkeyup="sp('certificates')">certificate</a>
<a href="blindlogout.php" tabindex="5" onkeyup="sp('logout')">logout</a>
</body>
</html>