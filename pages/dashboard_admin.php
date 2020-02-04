<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['role'] == "docent" ||
    $_SESSION['role'] == "student") {

    session_unset();
    session_destroy();
    echo "<script>location.href='../index.php'</script>";
    exit();
}
//<h1 class="m-0 text-dark">Dashboard <?php if (isset($_SESSION['username'])) {echo "van: " . $_SESSION ["username"];} ?><!--</h1>-->