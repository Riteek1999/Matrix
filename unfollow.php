<?php
session_start();
include './views/connect.php';
$con=openConnection();

if(isset($_POST['unfollow'])) {
    $USERMAIL=$_SESSION['usermail'];
   
    $querymail="SELECT * FROM user WHERE email='$USERMAIL';";
    $resultmail=mysqli_query($con,$querymail)or die(mysqli_error($con));
    $rowmail=mysqli_fetch_array($resultmail);
    $followerId = $_POST["userid"];
    $USERID=$rowmail['id'];
    

  $query = "SELECT * FROM isfollowing WHERE follower = \"".mysqli_real_escape_string($con, $USERID)."\" AND isfollowing = ".mysqli_real_escape_string($con,$followerId)." LIMIT 1;";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  echo mysqli_num_rows($result);
  if (mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    $q2 = "DELETE FROM isfollowing WHERE id = ".mysqli_real_escape_string($con,$row['id']).";";
    $result=mysqli_query($con,$q2);
}
    echo"<script> window.location.href='index.php' </script>";
}
?>