<?php
session_start();
$uid=$_SESSION['bid'];
include "connection.php";
$ccode1=$_GET['a'];
$ar=explode(":", $ccode1);
$ccode=$ar[0];
$tid=$ar[1];
$table="";
$p=[];
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
$sql="select * from ".$table.";";
$res=mysqli_query($conn,$sql);
$i=1;

$a="a";
$b="b";
$c="c";
$d="d";
$ans="nsa";

while($row=mysqli_fetch_assoc($res))
{

	$p["q".$i]=$row['QUESTION'];
	$p["a".$i]=$row['OPTIONA'];
	$p[$b.$i]=$row['OPTIONB'];
	$p[$c.$i]=$row['OPTIONC'];
	$p[$d.$i]=$row['OPTIOND'];
	$p["key".$i]=$row['KEYQ'];
	$i=$i+1;
}
$o=1;
$id=1;
$q="q";
?>
<!DOCTYPE html>
<html>
<head>
	<title>QUIZ</title>
	<script type="text/javascript">
		function my(id) {
			// body...
			
			var p=document.getElementById(id).innerHTML;
			var msg=new SpeechSynthesisUtterance(p);
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			
			
		}
		
		
		function re(event,id)
		{
			if(event.code=='Tab')
			{
				var p=id[3]
				
				var msg=new SpeechSynthesisUtterance("answer question for question number "+p);
				msg.lang="en-US";
				speechSynthesis.speak(msg);
			}
			else if(event.keyCode==8)
			{
				var msg=new SpeechSynthesisUtterance(" deleted");
				msg.lang="en-US";
				speechSynthesis.speak(msg);
			}
			else
			{
				var s=event.code;
				var d=s[3];
				var msg=new SpeechSynthesisUtterance(d);
				msg.lang="en-US";
				speechSynthesis.speak(msg);

			}
		}
	</script>
</head>
<body>
	<form action="finalquiz.php?a=<?php echo $ccode1;?>" method="post">
	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<h2 onkeyup="my(this.id)" id=<?php echo $q.$id;?> tabindex=<?php echo $o;$o=$o+1;?>><?php echo $p[$q.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $a.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION A <?php echo $p[$a.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $b.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION B <?php echo $p[$b.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $c.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION C <?php echo $p[$c.$id];?></h2><br>
	<h2 onkeyup="my(this.id)" id=<?php echo $d.$id;?> tabindex=<?php echo $o;$o=$o+1;?>>OPTION D <?php echo $p[$d.$id];?></h2><br>
	<input type="text" id=<?php echo $ans.$id;?> name=<?php echo $ans.$id;?> onkeyup="re(event,this.id);" tabindex=<?php echo $o;$o=$o+1;?>>
	<?php
	$id=$id+1;
	?>

	<input type="submit" name="se">

	
</form>

</body>
</html>