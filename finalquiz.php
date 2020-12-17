<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function sp(mark)
		{
			var msg=new SpeechSynthesisUtterance("YOU HAVE SECURED "+mark+ " MARKS");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			
		}

	</script>
</head>
<body>

</body>
</html>

<?php
session_start();
include "connection.php";
$uid=$_SESSION['bid'];
if (isset($_POST['se'])) {
	# code...
	$ccode1=$_GET['a'];
	$ar=explode(":", $ccode1);
	$ccode=$ar[0];
	$tid=$ar[1];
	$br=array();
	$ans="nsa";
	$table="";
	$sqltid="select * from blindstudentcourse where COURSECODE='$ccode' and STUDENTID='$uid';";
	$rowtid=(mysqli_fetch_assoc(mysqli_query($conn,$sqltid)));
	$tid=$rowtid['TEACHERID'];
	if(strpos($tid, "."))
	{
		$v=explode(".", $tid);
		for($i=0;$i<sizeof($v);$i++)
		{
			$table=$table.$v[$i];
		}
		$table=$ccode.$table;
	}
	else
	{
		$table=$ccode.$tid;	
	}
	for($i=0;$i<10;$i++)
	{
		$j=$i+1;
		$br[$i]=strtoupper($_POST[$ans.$j]);
	}
	$sql="select * from ".$table.";";
	$res=mysqli_query($conn,$sql);
	$mark=0;$i=0;
	
	while($row=mysqli_fetch_assoc($res))
	{
		echo $row['KEYQ'];
		$t=strtoupper($row['KEYQ']);
		if(strcmp($br[$i], $t)==0)
		{
			$mark++;			
		}
		$i++;
	}
	$k=$mark;
	echo "$k";
	$sql5="update BLINDSTUDENTCOURSE SET MARKS='$k' WHERE COURSECODE='$ccode' and TEACHERID='$tid';";
	mysqli_query($conn,$sql5);
	echo "<script>sp(".$mark.");</script>";
	
	echo "success";
	if($k>5)
	{
		$dest="uploads/student/".$ccode."/";//.$code."/";
		if(!is_dir($dest))
		{
			mkdir($dest);
		}
		$name=$dest.$uid.".txt";
		$file=fopen($name,"w");
		$txt="YOU HAVE SECURED ".$k." marks";
		fwrite($file,$txt);
		fclose($file);
		$sql6="insert into CERTIFICATE VALUES('$ccode','$k','$tid','$uid','$name');";
		if(mysqli_query($conn,$sql6))
		{
			echo "<script>window.location='blindacc.php';</script>";
		}
		else
		{
			echo mysqli_error($conn);
		}
		//echo "<script>window.location='blindacc.php';</script>";
	}
	//echo "<script>window.location='blindacc.php';</script>";
}
?>