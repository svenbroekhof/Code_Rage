<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Check page</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      session_start();
      if (isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        echo "Welcome ".ucwords($user).". It works! Now you can <a href='logout.php'>logout to check that it REALLY works</a>";
      }
      else {
        echo "To see it you have to <a href='index.php'>Login</a> or <a href='reg.php'>Register</a>";
      }
    ?>
  </body>
</html>
