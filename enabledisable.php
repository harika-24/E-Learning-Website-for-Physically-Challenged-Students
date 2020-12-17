<?php
include "connection.php";
session_start();
$uid=$_SESSION['tuid'];
$code=$_GET['a'];
$sql="SELECT * FROM COURSETEACHER where COURSECODE='$code' AND TEACHER='$uid';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
if($row['STATUS']==1)
{
	$sql1="UPDATE COURSETEACHER SET STATUS=2 where COURSECODE='$code' AND TEACHER='$uid';";
	mysqli_query($conn,$sql1);
	echo "<script>window.location=\"managequiz.php?a=".$code."\";</script>";
}
else
{
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
	$table=$code.$table;
	$table=strtoupper($table);
	$sql1="UPDATE COURSETEACHER SET STATUS=0 WHERE COURSECODE='$code' AND TEACHER='$uid';";
	mysqli_query($conn,$sql1);
	$sql2="DROP TABLE ".$table.";";
	if(mysqli_query($conn,$sql2))
	{
		echo "<script>window.location=\"managequiz.php?a=".$code."\";</script>";
	}
	else
	{
		echo mysqli_error($conn);
	}
}

?>
