<?php
session_start();
$uid=$_SESSION['uid'];
include "connection.php";
$code=$_GET['a'];
$sql1="select * from studentcourse where COURSECODE='$code' and STUDENTID='$uid';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql1));
$id=$row['TEACHERID'];
$table="";
if(strpos($id, "."))
{
	$v=explode(".", $id);
	for($i=0;$i<sizeof($v);$i++)
	{
		$table=$table.$v[$i];
	}
	$table=$code.$table;
}
else
{
	$table=$code.$id;	
}

$table=strtoupper($table);
if(isset($_POST['submit']))
{
	$code=$_GET['a'];
	$sql1="select * from studentcourse where COURSECODE='$code' and STUDENTID='$uid';";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sql1));
	$id=$row['TEACHERID'];
	$ar=array();
	$table=$code.$id;
	$mark=0;
	$table=strtoupper($table);
	for($i=0;$i<10;$i++)
	{
		$p=$i+1;
		$q="q".$p;
		if(!empty($_POST[$q]))
		{
			$ar[$mark]=$_POST[$q];
			$mark=$mark+1;
			
		}

	}
	$ans=array();
	$k=0;
	
	for ($i=0; $i<sizeof($ar); $i++) { 
		$p=$ar[$i][0];
		$y=$ar[$i][1];
		$qno=(int)$y;
		if($qno!=0)
		{

			$sql4="select KEYQ from ".$table." where QUESTIONNO=".$qno.";";
			$result4=mysqli_query($conn,$sql4);
			$row4=mysqli_fetch_assoc($result4);
			if(strcasecmp($p,$row4['KEYQ'])==0)
			{
				$k=$k+1;
			}

		}
		else
		{
			$sql4="select KEYQ from ".$table." where QUESTIONNO=10;";
			$result4=mysqli_query($conn,$sql4);
			$row4=mysqli_fetch_assoc($result4);
			if(strcasecmp($p,$row4['KEYQ'])==0)
			{
				$k=$k+1;
			}
		}
		

	}
	$sql5="update STUDENTCOURSE SET MARKS='$k' WHERE COURSECODE='$code' and TEACHERID='$id';";
	mysqli_query($conn,$sql5);
	//if($k>5)
	//{
		$dest="uploads/student/".$code."/";//.$code."/";
		/*for($i=0;$i<2;$i++)
		{
			if($i==0)
			{
				if(!is_dir($dest))
				{
					mkdir($dest);
					$dest=$dest.$code."/";
				}
			}
			else if($i==1)
			{
				if(!is_dir($dest))
				{
					mkdir($dest);
				}
			}
		}*/
		$name=$dest.$uid.".txt";
		$file=fopen($name,"w");
		$txt="YOU HAVE SECURED ".$k." marks";
		echo "$name";
		fwrite($file,$txt);
		fclose($file);
		$sql6="insert into CERTIFICATE(COURSECODE,MARKS,TEACHER,STUDENT,LOCATION) VALUES('$code','$k','$id','$uid','$name');";
		mysqli_query($conn,$sql6);
		
		echo "<script>alert('you have completed the quiz. you have secured ".$k." marks');window.location='studentacc.php';</script>";		
		

	//}
	
	
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>QUIZ</title>
	<style type="text/css">
		.qu{
			border-bottom:2px solid black;
			margin-top: 4px; 
		}
	</style>

</head>
<body>
<form action="quizrun.php?a=<?php echo $code?>" method="post">
<?php
for($i=1;$i<=10;$i++)
{
	$sql="select * from ".$table." where QUESTIONNO='$i';";
	$row1=mysqli_fetch_assoc(mysqli_query($conn,$sql));
	$v=$i%10;
	echo "<div class=\"qu\">".$row1['QUESTION']."<br><br><input type=\"radio\" name=\"q".$i."\" value=\"A".$v."\">".$row1['OPTIONA']."<br><input type=\"radio\" name=\"q".$i."\" value=\"B".$v."\">".$row1['OPTIONB']."<br><input type=\"radio\" name=\"q".$i."\" value=\"C".$v."\">".$row1['OPTIONC']."<br><input type=\"radio\" name=\"q".$i."\" value=\"D".$v."\">".$row1['OPTIOND']."<br><br></div><br>";
}

echo "<input type='submit' name='submit'>";

?>
</form>
</body>
</html>

