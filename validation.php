<h3><?php
session_start();
include './views/connect.php';
$con=openConnection();

if(isset($_POST['login'])){
      
        $Password=md5($_POST['password']);
        $Email=$_POST['email'];

        $query="SELECT * FROM user WHERE email='$Email' AND password='$Password';";
        $result=mysqli_query($con,$query)or die(mysqli_error($con));


        if(mysqli_num_rows($result)>0){
            echo "Login Successful";
            $_SESSION['usermail']=$Email;
            echo $_SESSION['usermail'];
            echo"<script> window.location.href='index.php' </script>";
        }
        else echo "Login Unsuccessful";
}
//log i time active log out time inactive


?></h3>