<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include the bootstrap css and meta links. -->
    <?php
    include("./index/meta.php");
    include("./index/css.php");
    include("./back_end/connect_db.php");
    ?>

    <title>Code rage</title>
    <link rel="shortcut icon" type="image/png" href="/img/icon.png">

</head>

<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php //include("./layout/sidebar.php"); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <?php include("./layout/navbar.php"); ?>

    </div>
</div>

<main id="main">
    <?php include("./pageloader.php"); ?>
    <?php if (isset($_SESSION['username'])) {echo "welkom " . $_SESSION ["username"];}?>
</main>

<!-- Footer -->
<?php include("./layout/footer.php"); ?>

<!-- Include the needed scripts. -->
<?php include("./index/js.php");?>
</body>

</html>
