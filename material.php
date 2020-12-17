<?php
include 'connection.php';
session_start();
$uid=$_SESSION['uid'];
$code=$_GET['a'];
$sql="select * from STUDENTCOURSE WHERE COURSECODE='$code' AND STUDENTID='$uid';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
$id=$row['TEACHERID'];
$sql1="select * from TEACHER WHERE USERNAME='$id';";
$row2=mysqli_fetch_assoc(mysqli_query($conn,$sql1));
$name=$row2['NAME'];
$sqlname="select * from student where USERNAME='$uid';";
$rowname=mysqli_fetch_assoc(mysqli_query($conn,$sqlname));
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
<h2 id="name">HELLO <?php echo $rowname['NAME'];?></h2>
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
           <table>
	<tr>
	<th>TOPIC NAME</th>
	<th>DOWNLOADS</th></tr>
	<?php
	$sql3="select * from uploads where COURSECODE='$code' and TEACHER='$id';";
	$result=mysqli_query($conn,$sql3);
	while($row3=mysqli_fetch_assoc($result))
	{
		echo "<tr><td>".$row3['TOPIC']."</td><td><a href=\"".$row3['LOCATION']."\" download>DOWNLOAD</a></td></tr>";
	}
	?>

</table>
         </center>
      
        
        </div>
    
   
    
</div>
<div id="bottom">
    <a href="about.html">ABOUT US</a><br><br>
    <a href="contact.html" id="contact">CONTACT US</a>
</div>
</body>
</html>