<?php
include "connection.php";
session_start();
$uid=$_SESSION['tuid'];
$B=$_GET['a'];
$sql="select * from TEACHER where USERNAME='$uid';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
if(isset($_POST['submit']))
{
	$k=0;
	for($i=1;$i<=10;$i++)
	{
		$s="q".$i;$a="a".$i;$b="b".$i;$c="c".$i;$d="d".$i;$k="k".$i;
		if(empty($_POST[$s]))
		{
			$k=$k+1;
		}


	}
	
	if($k>0)
	{
		echo "<script>alert('EMPTY');window.location=\"teacherquiz.php?a=".$a."\"</script>";
	}
	else
	{
		$B=$_GET['a'];
		$table="";
		if(strpos($uid, "."))
		{
			$v=explode(".", $uid);
			for($i=0;$i<sizeof($v);$i++)
			{
				$table=$table.$v[$i];

			}
		}
		else
		{
			$table=$uid;
		}
		$var=$B.$table;
		
		$var=strtoupper($var);
		$sql="CREATE table $var (QUESTIONNO INT(2),QUESTION VARCHAR(150), OPTIONA VARCHAR(30), OPTIONB VARCHAR(30), OPTIONC VARCHAR(30), OPTIOND VARCHAR(30), KEYQ VARCHAR(1));";
		if(mysqli_query($conn,$sql))
		{


			for($i=1;$i<=10;$i++)
			{
				$varq=$_POST["q".$i];
				$vara=$_POST["a".$i];
				$varb=$_POST["b".$i];
				$varc=$_POST["c".$i];
				$vard=$_POST["d".$i];
				$vark=$_POST["k".$i];
				$sql1="insert into ".$var." values ('$i','$varq','$vara','$varb','$varc','$vard','$vark');";
				mysqli_query($conn,$sql1);
				$sql2="UPDATE COURSETEACHER SET STATUS=1 WHERE COURSECODE='$B' AND TEACHER='$uid';";
				if(mysqli_query($conn,$sql2))
				{
					echo "<script>window.location=\"teacheracc.php\";</script>";
				}
				else
				{
					echo mysqli_error($conn).$var;
				}
			}
		}
		else
		{
			echo mysqli_error($conn);
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>COURSES DISPLAY</title>
	<link rel="stylesheet" type="text/css" href="styleak.css">
</head>
<body>
	<div id="top">
	<img src="logo.png">
	<h2 class="wel"> WELCOME <?php echo $row['NAME'];?></h2><br><br><br><br>
	<a href="teacherlogout.php" class="wel">LOGOUT</a><br>
	</div><br><br>
<form action="teacherquiz.php?a=<?php echo $B;?>" method="post">
	1. <input type="text" name="q1" ><br>
	A. <input type="text" name="a1"><br>
	B. <input type="text" name="b1"><br>
	C. <input type="text" name="c1"><br>
	D. <input type="text" name="d1"><br>
	KEY: <input type="text" name="k1"><br>
	<br>

		2. <input type="text" name="q2"><br>
	A. <input type="text" name="a2"><br>
	B. <input type="text" name="b2"><br>
	C. <input type="text" name="c2"><br>
	D. <input type="text" name="d2"><br>
	KEY: <input type="text" name="k2"><br>
	<br>
		3. <input type="text" name="q3"><br>
	A. <input type="text" name="a3"><br>
	B. <input type="text" name="b3"><br>
	C. <input type="text" name="c3"><br>
	D. <input type="text" name="d3"><br>
	KEY: <input type="text" name="k3"><br>
	<br>
		4. <input type="text" name="q4"><br>
	A. <input type="text" name="a4"><br>
	B. <input type="text" name="b4"><br>
	C. <input type="text" name="c4"><br>
	D. <input type="text" name="d4"><br>
	KEY: <input type="text" name="k4"><br>
	<br>
		5. <input type="text" name="q5"><br>
	A. <input type="text" name="a5"><br>
	B. <input type="text" name="b5"><br>
	C. <input type="text" name="c5"><br>
	D. <input type="text" name="d5"><br>
	KEY: <input type="text" name="k5"><br>
	<br>
		6. <input type="text" name="q6"><br>
	A. <input type="text" name="a6"><br>
	B. <input type="text" name="b6"><br>
	C. <input type="text" name="c6"><br>
	D. <input type="text" name="d6"><br>
	KEY: <input type="text" name="k6"><br>
	<br>
		7. <input type="text" name="q7"><br>
	A. <input type="text" name="a7"><br>
	B. <input type="text" name="b7"><br>
	C. <input type="text" name="c7"><br>
	D. <input type="text" name="d7"><br>
	KEY: <input type="text" name="k7"><br>
	<br>
		8. <input type="text" name="q8"><br>
	A. <input type="text" name="a8"><br>
	B. <input type="text" name="b8"><br>
	C. <input type="text" name="c8"><br>
	D. <input type="text" name="d8"><br>
	KEY: <input type="text" name="k8"><br>
	<br>
		9. <input type="text" name="q9"><br>
	A. <input type="text" name="a9"><br>
	B. <input type="text" name="b9"><br>
	C. <input type="text" name="c9"><br>
	D. <input type="text" name="d9"><br>
	KEY: <input type="text" name="k9"><br>
	<br>
		10. <input type="text" name="q10"><br>
	A. <input type="text" name="a10"><br>
	B. <input type="text" name="b10"><br>
	C. <input type="text" name="c10"><br>
	D. <input type="text" name="d10"><br>
	KEY: <input type="text" name="k10"><br>
	<br>
	<input type="submit" name="submit">
</form>
</body>
</html>