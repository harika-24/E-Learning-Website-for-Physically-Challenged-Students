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
 $u="localhost";
 $s="root";
 $pas="";
 $db="hci";
 $conn=mysqli_connect($u,$s,$pas,$db);
if(isset($_POST['REGISTER']))
{
    
    if(empty($_POST['name']) || empty($_POST['age']) || empty($_POST['dob']) || empty($_POST['pass']) || empty($_POST['pass2'])  )
    {
        echo "<script>alert('Please enter all the fields');</script>";
    }
    else 
    {
        $name=$_POST["name"];$age=$_POST["age"];$dob=$_POST["dob"];$pass=$_POST["pass"];$uname=$_POST["uname"];$pass2=$_POST["pass2"];
        $p="8699";$e="0";
        $sql2="SELECT * FROM TEACHER WHERE USERNAME='$uname';";
        $result=mysqli_query($conn,$sql2);
        
        if(mysqli_num_rows($result)!=0)
        {
            echo "<script>alert('Username already exists!');</script>";
        }
        else
        {
            if(strcmp($pass, $pass2)!=0)
            {
                echo "<script>alert('PLEASE TYPE SAME PASSWORDS');</script>";   
                

            }
            else
            {
                $sql="INSERT INTO TEACHER(NAME,AGE,USERNAME,PASSWORD,DOB) VALUES ('$name','$age','$uname','$pass','$dob');";
                mysqli_query($conn,$sql);               
            }
        }
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    
    <script type="text/javascript">
        function analysis()
        {
            var s= document.getElementById('sc');
            alert(s.value);
        }
    </script>
</head>
<body>
    <h1 align="center"> SIGNUP FOR TEACHERS</h1>
<CENTER><form action="teachersignup.php" method="post">
    <table>
    <tr><th>NAME: </th><td><input type="text" name="name"></td></tr>
    <tr><th>AGE: </th><td><input type="text" name="age"></td></tr>
    <tr><th>USERNAME: </th><td><input type="text" name="uname"></td></tr>
    <tr><th>DOB: </th><td><input type="text" name="dob"></td></tr>
    <tr><th>PASSWORD:</th><td><input type="password" name="pass"></td></tr>
    <tr><th>CONFIRM PASSWORD:</th><td> <input type="password" name="pass2"></td></tr>
    </table>
    <br>
    <input type="submit" value="REGISTER" name="REGISTER">
</form></CENTER>
</body>
</html>
       
</div>

<div id="bottom">
    <a href="about.html">ABOUT US</a><br><br>
    <a href="contact.html" id="contact">CONTACT US</a>
</div>

</body>
</html>