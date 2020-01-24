<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
        session_start();
        session_destroy();
        header("Refresh: 0.1; URL=../index.php");
    ?>
  </body>
</html>
