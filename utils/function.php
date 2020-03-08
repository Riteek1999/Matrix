<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    
</head>
<body>


    
<?php
    session_start();

    $isLoggedIn = false;
    if(isset($_SESSION['usermail']) && $_SESSION['usermail']) {
        $isLoggedIn = true;
    }
    function time_since($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'min'),
            array(1 , 'sec')
        );
    
        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }
    
        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
        return $print;
    }
    ?>
    <?php
function displayTweets($type){
    include './views/connect.php';
    $con=openConnection();
    $whereClause = "";

    if($type == 'public'){
        $whereClause = "";
    }else if($type == 'isFollowing'){
        if (isset($_SESSION['usermail']) && $_SESSION['usermail']){
        $USERMAIL=$_SESSION['usermail'];

        $querymail="SELECT * FROM user WHERE email='$USERMAIL';";
        $resultmail=mysqli_query($con,$querymail)or die(mysqli_error($con));
        $rowmail=mysqli_fetch_array($resultmail);
    
        $USERID=$rowmail['id'];

        $query = "SELECT * FROM isfollowing WHERE follower='$USERID';";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));
        $followingIds = array(); 
        while($row = mysqli_fetch_assoc($result)) {
            array_push($followingIds,$row['isfollowing'] );
        }
        $whereClause =  "WHERE userid IN (".join(",", $followingIds).")";
    }
}
    $query = "SELECT * FROM tweets ".$whereClause." ORDER BY `datetime` DESC LIMIT 10 ";
    $result = mysqli_query($con,$query);
    if(!$result || mysqli_num_rows($result) == 0){
        echo "There is no tweets to display.";
    }else if($result && mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $userquery = "SELECT * FROM user WHERE id = ".mysqli_real_escape_string($con,$row['userid'])." LIMIT 1";
            $userqueryresult = mysqli_query($con,$userquery);
            $user = mysqli_fetch_assoc($userqueryresult);

            echo"<div class='tweet'><p>".$user['email']." <span class='time'>".time_since(time() - strtotime($row['datetime']))." ago</span>:</p>";

            echo "<p>".$row['tweets']."</p></div>"; 
            if (isset($_SESSION['usermail']) && $_SESSION['usermail']){
            $followerId = $row["userid"];
            $USERMAIL=$_SESSION['usermail'];

            $querymail="SELECT * FROM user WHERE email='$USERMAIL';";
            $resultmail=mysqli_query($con,$querymail)or die(mysqli_error($con));
            $rowmail=mysqli_fetch_array($resultmail);
        
            $USERID=$rowmail['id'];

            if(isset($_SESSION['usermail']) && $_SESSION['usermail'] && ($USERID!=$followerId)){
            $USERMAIL=$_SESSION['usermail'];

    $querymail="SELECT * FROM user WHERE email='$USERMAIL';";
    $resultmail=mysqli_query($con,$querymail)or die(mysqli_error($con));
    $rowmail=mysqli_fetch_array($resultmail);

    $USERID=$rowmail['id'];

            $tweetById = $user['id'];
            $query = "SELECT * FROM isfollowing WHERE follower='$USERID' AND isfollowing='$tweetById';";
            $isFollowing=mysqli_query($con,$query) or die(mysqli_error($con));
            if($isFollowing && mysqli_num_rows($isFollowing) > 0) {
            ?>
            <div>
            <form action="unfollow.php" method="POST">
            <input type="hidden" class="userid" name="userid" value="<?php echo $user['id']; ?>">
            <button type="submit" name="unfollow" class="btn btn-outline-success my-2 my-sm-0">Unfollow</button>
            </form></div>
            <?php }
            else {?>
                <form action="follow.php" method="POST">
                <input type="hidden" class="userid" name="userid" value="<?php echo $user['id']; ?>">
                <button type="submit" name="follow" class="btn btn-outline-success my-2 my-sm-0">Follow</button>
                </form>

        <?php
        }
    }
}
}
}
}
function displayownTweets($owntweets){
    include './views/connect.php';
    $con=openConnection();

    $query = "SELECT * FROM tweets ORDER BY `datetime` DESC LIMIT 10 ";
    $result = mysqli_query($con,$query);
    if(!$result || mysqli_num_rows($result) == 0){
        echo "There is no tweets to display.";
    }else if($result && mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $userquery = "SELECT * FROM user WHERE id = ".mysqli_real_escape_string($con,$row['userid'])." LIMIT 1";
            $userqueryresult = mysqli_query($con,$userquery);
            if (isset($_SESSION['usermail']) && $_SESSION['usermail']){
            $user = mysqli_fetch_assoc($userqueryresult);

            $followerId = $row["userid"];
            $USERMAIL=$_SESSION['usermail'];

            $querymail="SELECT * FROM user WHERE email='$USERMAIL';";
            $resultmail=mysqli_query($con,$querymail)or die(mysqli_error($con));
            $rowmail=mysqli_fetch_array($resultmail);
        
            $USERID=$rowmail['id'];
            if($USERID==$followerId){

            echo"<div class='tweet'><p>".$user['email']." <span class='time'>".time_since(time() - strtotime($row['datetime']))." ago</span>:</p>";

            echo "<p>".$row['tweets']."</p></div>"; 
            }
}

        }
    }

}

?>     


<?php
function displaySearch(){

    echo'<form class="form-row">
    <div class="col">
      <input type="text" class="form-control" id="search" placeholder="Search">
    </div class="col">
    <button type="submit" class="btn btn-primary">Search Tweets</button>
  </form>';
}
function displayTweetBox(){
    if(isset($_SESSION['usermail']) && $_SESSION['usermail']){?>
    <form action="post.php" method="POST">
    <div class="form-group">
      <textarea class="form-control" name="postcontent" id="tweetContent" maxlength="50"required></textarea>
    </div>
    <button type="submit" name="postbutton" class="btn btn-primary">Post Tweet</button>
  </form>
<?php
}
}
?>
</body>
</html>