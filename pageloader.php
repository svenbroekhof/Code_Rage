<section class="content">
    <?php
    if (isset($_GET["content"])){
        include("./pages/" . $_GET["content"] . ".php");
    } else if(isset($_GET["script"])){
        include("./back_end/" . $_GET["script"] . ".php");
    } else {
        include("./pages/main.php");
    }
    ?>
</section>