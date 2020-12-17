<?php
include "connection.php";
session_start();
$uid=$_SESSION['uid'];
$sql="select * from student where USERNAME='$uid';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
$code=$_GET['a'];
$sql2="select * from STUDENTCOURSE WHERE COURSECODE='$code' and STUDENTID='$uid';";
$row2=mysqli_fetch_assoc(mysqli_query($conn,$sql2));
$id=$row2['TEACHERID'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Course</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <style type="text/css">
        #name{
            float: right;
            margin-top: -70px;
            color: white;
        }
        table,th,td{
            border: 2px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<div id="header">

<img src="logo.png" id="logo">
<h1 id="title" tabindex="1">GRAV INSTITUTIONS</h1>  
<h2 id="name">HELLO <?php echo $row['NAME'];?></h2>
</div>
<div class="container" >
    <div id="leftcolumn">
        <div id="menu">
        <div id="empty"></div>
        <div id="course" >
            <a href="stucourse.php" tabindex="2.1">ENROLL COURSES</a></div>
        
        <div id="quiz" >
            <a href="stuquiz.php" tabindex="2.2">QUIZ</a></div>
          <div id="enroll" >
            <a href="courseplan.php" tabindex="2.5">COURSES ENROLLED</a></div>
        
        <div id="certificates" >
            <a href="certificate.php" tabindex="2.3">CERTIFICATES</a></div>
        
        <div id="logout" >
            <a href="stulogout.php" tabindex="2.4">LOGOUT</a></div>
    </div>
    </div>
    <div id="column">
        <br><center>
            <?php
			$sql="select * from COURSETEACHER WHERE TEACHER='$id' and COURSECODE='$code';";
			$res=mysqli_query($conn,$sql);
			$row2=mysqli_fetch_assoc($res);
			if($row2['STATUS']==2)
			{
				echo "<button><a href=\"quizrun.php?a=".$code."\">ATTEMPT QUIZ NOW</a></button>";
			}
			else
			{
				echo "<h1>QUIZ IS NOT AVAILABLE</h1>";
			}
			?>
         </center>
      
        
        </div>
    
   
    
</div>
<div id="bottom">
    <a href="about.html">ABOUT US</a><br><br>
    <a href="contact.html" id="contact">CONTACT US</a>
</div>
</body>
</html>