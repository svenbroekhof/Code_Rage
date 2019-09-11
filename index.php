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
    <!-- Include all the contents of the page. -->
    <main id="contents">

        <?php include("./layout/navbar.php"); ?>

        <section class="content">
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

    </main>

    <!-- Footer -->
    <?php include("./layout/footer.php"); ?>

    <!-- Include the needed scripts. -->
    <?php include("./index/js.php"); ?>
</body>

</html>