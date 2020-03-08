
<html>
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/CODEDEPTH/style.css">
    <title>Home page</title>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="color:#5EAD70;">
  <i class="fa fa-commenting" aria-hidden="true"></i>&nbsp;&nbsp;
  <a class="navbar-brand" href="?page=home.php">Matrix</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="?page=yourtimeline">Your Timeline</a>
      </li>
      <a class="nav-link" href="?page=yourtweets">Your Feeds</a>
      </li>
      <a class="nav-link" href="?page=publicprofiles">Public Profiles </a>
      </li>
    </ul>
    <?php
        if($isLoggedIn)
        {
    ?>
    <form action="logout.php" method="POST" class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0">Logout</button>
    </form>&nbsp;&nbsp;&nbsp;
    <?php
        }
        else
        {
    ?>
    <div class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">Signup</button>
    </div>&nbsp;&nbsp;&nbsp;
    <div class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal1">Login</button>
    </div>
    <?php
        }
    ?>
  </div>
</nav>