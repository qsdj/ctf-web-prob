<?php
error_reporting(0);
session_start();

if(isset($_POST['username'], $_POST['password'])){
  $username = substr($_POST['username'], 0, 100);
  $password = substr($_POST['password'], 0, 100);

  $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME) or die('err');
  $query = mysqli_query($conn, "SELECT * FROM `users` WHERE 1");

  while($x = mysqli_fetch_assoc($query)){
    if($username === $x['username'] && $password === $x['password']){
      $_SESSION['username'] = $x['username'];
      exit("<script>location.href='./page/index.php';</script>");
    }
  }
  exit("<script>location.href='?page=login';</script>");
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="./page/assets/style.css" type="text/css">
</head>
<body class="text-center">
  <nav class="navbar navbar-inverse navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ">
        </ul>
      </div>
    </div>
  </nav>
  <div class="cover d-flex align-items-center pt-1 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-md-left align-self-center my-4">
          <h1 class="text-white display-5" align="center">Color World</h1>
          <h4 class="text-white" align="center">plz login first</h4>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form role="form" method="post">
            <div class="form-group">
              <input class="form-control" placeholder="username" type="text" name="username">
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="password" type="password" name="password">
            </div>
            <input type="submit" value="Login" class="btn btn-block btn-outline-primary btn-lg" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="./page/assets/bootstrap.min.js"></script>
</body>
</html>