<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/CODEDEPTH/style.css">
  <title>HOME</title>
</head>
<body>
<div class="container mainContainer">
<div class="row">
    <div class="col-8">
        <h2>Tweets For You</h2>
        <?php displayTweets('isFollowing'); ?>
    </div>
    <div class="col-4">

    <?php displaySearch(); ?><hr>

    <?php displayTweetBox(); ?>

    </div>
  </div>
</div>
</body>
</html>