    <!DOCTYPE html>
<html>
<head>
    <title>Startup</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    
</head>
<body>
<div id="header">
<img src="logo.png" id="logo">
<h1 id="title" tabindex="1">GRAV INSTITUTIONS</h1>  

</div>
<div class="container" >
    <div id="leftcolumn">
        <div id="menu" style="height: 350px;">
            <div id="empty"></div>

                <div id="dedulog" >
                    <a href="startup_stu_login.php" tabindex="2.1">Student Login</a></div>
                
                <div id="teacherlog" >
                    <a href="startup_teach_login.php" tabindex="2.2">Teacher Login</a></div>
                
                <div id="studentsignup" >
                    <a href="startup_stu_sign.php" tabindex="2.4">Student signup</a></div>

                <div id="teachersignup" >
                    <a href="startup_teach_sign.php" tabindex="2.3">Teacher signup</a></div>

                <div id="admin" style="padding: 10px; margin: 20px;background-color: white;font-size: 20px;">
                    <a href="adminlog.php" tabindex="2.5">Admin Login</a></div>

                
                
                
        </div>
    </div>
<div id="column">

<?php
include "connection.php";
if(isset($_POST['submit']))
{
    $uid=$_POST['uid'];
    $pass=$_POST['pass'];
    $sql="select * from TEACHER where USERNAME='$uid';";
    $res=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($res);
    if (empty($uid) || empty($pass)) 
    {
        echo "<script> alert('PLEASE ENTER ALL THE FIELDS');</script>";
    }
    else
    {
        if($check==0)
        {
            echo "<script>alert('USERNAME DOESNOT EXIST');</script>";
        }
        else
        {
            $row=mysqli_fetch_assoc($res);
            if(strcmp($pass, $row['PASSWORD'])==0)
            {
                session_start();
                $_SESSION["tuid"]=$uid;

                echo "<script>window.location=\"teacheracc.php\";</script>";
            }
            else
            {
                echo "<script>alert('WRONG PASSWORD');</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>TEACHER LOGIN</title>
    <script type="text/javascript">

    </script>
    
</head>
<body>
    <h1 align="center">LOGIN FOR TEACHERS</h1>
    <center>
<form method="post" action="startup_teach_login.php">
    <table>
        <tr><th>USERNAME:</th><td><input type="text" name="uid" placeholder="USERNAME"><br></td></tr>
    <tr><th>PASSWORD</th><td><input type="password" name="pass" placeholder="PASSWORD"><br></td></tr>
    <tr><td colspan="2" id="suq" align="center"><input type="submit" name="submit" id="sub" align="center"></td></tr>
</table>
</form></center>
<p id="emp"> </p>
</body>
</html>
       
</div>

<div id="bottom">
    <a href="about.html">ABOUT US</a><br><br>
    <a href="contact.html" id="contact">CONTACT US</a>
</div>

</body>
</html>