<?php
session_start();
$uid=$_SESSION['uid'];
include 'connection.php';
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
    <div id="midcolumn">
        <br>
        <div class="course"><h1>Internet of Things</h1>
        <p>
Human–computer interaction (HCI) researches the design and use of computer technology, focused on the interfaces between people (users) and computers. Researchers in the field of HCI both observe the ways in which humans interact with computers and design technologies that let humans interact with computers in novel ways. As a field of research, human–computer interaction is situated at the intersection of computer science, behavioral sciences, design, media studies, and several other fields of study.</p>
        <button class="btn"><i class="fa fa-download"></i> Go to Course page</button>

        </div>
        <br>
        <div class="course"><h1>Internet and Web Programming</h1>
        <p>Web development is a broad term for the work involved in developing a web site for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing the simplest static single page of plain text to the most complex web-based internet applications (or just 'web apps') electronic businesses, and social network services. A more comprehensive list of tasks to which web development commonly refers, may include web engineering, web design, web content development, client liaison, client-side/server-side scripting, web server and network security configuration, and e-commerce development.</p>
        <button class="btn"><i class="fa fa-download"></i> Go to Course page</button></div>
        
        
        
    </div>
    <div id="rightcolumn">
        <br>
        <iframe width="450" height="270" src="https://www.youtube.com/embed/QSIPNhOiMoE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <br>
        <br>
        <iframe width="450" height="270" src="https://www.youtube.com/embed/Zftx68K-1D4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        
    </div>
	
</div>
<div id="bottom">
	<a href="about.html">ABOUT US</a><br><br>
	<a href="contact.html" id="contact">CONTACT US</a>
</div>
</body>
</html>

