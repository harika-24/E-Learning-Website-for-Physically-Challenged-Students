<?php
include "connection.php";
session_start();
$uid=$_SESSION['uid'];
$sql="select * from student where USERNAME='$uid';";
$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
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
            <table>
                <tr>
                    <th>COURSECODE</th>
                    <th>COURSENAME</th>
                    <th>DOWNLOAD</th>
                </tr>
                <?php
                $sql5="select * from STUDENTCOURSE where STUDENTID='$uid' and MARKS>5;";
                $result5=mysqli_query($conn,$sql5);
                while ($row1=mysqli_fetch_assoc($result5)) {
                    $code=$row1['COURSECODE'];
                    $sql6="select * from COURSES WHERE COURSECODE='$code';";
                    $result4=mysqli_query($conn,$sql6);
                    $row2=mysqli_fetch_assoc($result4);
                    echo "<tr><td>".$row1['COURSECODE']."</td><td>".$row2['COURSENAME']."</td><td><button><a href=\"uploads/student/".$row1['COURSECODE']."/".$uid.".txt\" download>DOWNLOAD</a></button></td></tr>";
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
