<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registration</title>
</head>
<body>
<?php
session_start();
include './views/connect.php';
$con=openConnection();

if(isset($_POST['register'])){
        $Name=$_POST['fullname'];
        $Password=md5($_POST['password']);
        $Email=$_POST['email'];

        $query="INSERT INTO user(name,email,password) VALUES('$Name','$Email','$Password')";
        $result=mysqli_query($con,$query)or die(mysqli_error($con));
        
        if($result){
       
                echo "Signup Successful";
                $_SESSION['usermail']=$Email;
                echo $_SESSION['usermail'];
                echo"<script> window.location.href='index.php' </script>";
        
}
}
//isset means button press hua hai
//md5 encrypts password


?>
</div>
</body>
</html>