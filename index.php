<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include the bootstrap css and meta links. -->
    <?php
    include("./index/meta.php");
    include("./index/css.php");
    ?>

    <title>Code rage</title>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php include("./layout/sidebar.php"); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php include("./layout/navbar.php"); ?>

            <section class="container-fluid">
                <?php
                if (isset($_GET["content"])) {
                    include("./pages/" . $_GET["content"] . ".php");
                } else if (empty(isset($_GET["content"]))) {
                    include("./pages/homepage.php");
                } else {
                    include("./pages/homepage.php");
                }
                ?>
            </section>

        </div>

    </div>


    <!-- Footer -->
    <?php include("./layout/footer.php"); ?>

    <!-- Include the needed scripts. -->
    <?php include("./index/js.php"); ?>
</body>

</html>