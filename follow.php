<?php
session_start();
include './views/connect.php';
$con=openConnection();

if(isset($_POST['follow'])) {
    $USERMAIL=$_SESSION['usermail'];
   
    $querymail="SELECT * FROM user WHERE email='$USERMAIL';";
    $resultmail=mysqli_query($con,$querymail)or die(mysqli_error($con));
    $rowmail=mysqli_fetch_array($resultmail);

    $USERID=$rowmail['id'];
    
    $followerId = $_POST["userid"];
    
  $query = "SELECT * FROM isfollowing WHERE follower = \"".mysqli_real_escape_string($con, $USERID)."\" AND isfollowing = ".mysqli_real_escape_string($con,$followerId)." LIMIT 1;";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  if (mysqli_num_rows($result)>0){
      echo ("already followed");
    echo"<script> window.location.href='index.php' </script>";
  }
  else{
    $query="INSERT INTO isfollowing(follower,isfollowing) VALUES('$USERID','$followerId');";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    if($result){
        echo"<script> window.location.href='index.php' </script>";
    }
// }
}
}
?>