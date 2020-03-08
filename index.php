<?php
include("utils/function.php");
include("views/header.php");
if (isset($_GET['page'])  && $_GET['page'] == 'yourtimeline') {
    include("views/timeline.php");
}else if (isset($_GET['page'])  && $_GET['page'] == 'yourtweets') {
    include("views/yourtweets.php"); 
}
else {
include("views/home.php");
}
include("views/footer.php");

?>