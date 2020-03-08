<?php
session_start();
include './views/connect.php';
$con=openConnection();

if(isset($_POST['postbutton'])){
    $USERMAIL=$_SESSION['usermail'];

    $querymail="SELECT * FROM user WHERE email='$USERMAIL';";
    $resultmail=mysqli_query($con,$querymail)or die(mysqli_error($con));
    $rowmail=mysqli_fetch_array($resultmail);

    $USERID=$rowmail['id'];
    $Tweet=$_POST['postcontent'];
    $date = date('Y-m-d H:i:s');

        echo $query="INSERT INTO tweets(tweets,userid,datetime) VALUES('$Tweet','$USERID','$date')";
        $result=mysqli_query($con,$query)or die(mysqli_error($con));
        
        if($result){
            echo"data inserted";
                echo"<script> window.location.href='index.php' </script>";
        
}
}


?>