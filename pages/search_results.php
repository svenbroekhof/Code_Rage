<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Search Results</title>
</head>
<body>

<style>
    #wrapper {
        margin: 2% 25%;
        border: solid 0px transparent;
    }

    div {
        padding: 3%;
        margin: 0.0%;
        border: solid 1px gray;
        text-align: center;
        border-right: solid 0px transparent;
        border-left: solid 0px transparent;
    }
</style>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
<div id="wrapper">
<?php
if (!isset($_POST['search_input']) && empty($_GET)) {
    die("You do not have permission to view this page.");
}

if (isset($_POST['search_input'])) {
    $search_query = $_POST['search_input'];
}

//$query  = " MATCH (project.name) AGAINST (:name_project)";


//TRY CONNECTING TO THE DATABASE
try {
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=knowledgebank', $user, $pass);
} catch (PDOException $e) { //ELSE THROW AN EXCEPTION
    print "Error!: " . $e->getMessage() . "<br>"; //ERROR MESSAGE
    die("Could not connect to database."); //USER FRIENDLY ERROR MESSAGE
}

$result_set = array();
$query = $dbh->prepare("SELECT `answer`, `question` FROM `reply` WHERE MATCH (`answer`) AGAINST (?)");
$query->bindParam(1, $search_query, PDO::PARAM_STR, 999);
$query->execute();
$result_set = $query->fetchAll(PDO::FETCH_ASSOC);
if (empty($result_set)) {
    echo "



<script>
    setTimeout(function(){window.location.href = '../index.php' ;}, 5000);
</script>";
    echo "<h1>Could not find any search results.</h1>";
    exit();


}
foreach ($result_set as $results) {
    echo "<div><a href='search_results.php?question=" . $results['question'] . "'>" . $results['answer'] . "</a></div>";
}

?>


<?php
if (!empty($_GET)) {
    $query = $dbh->prepare("SELECT `answer` FROM `reply` WHERE `question` = ?");
    $query->bindParam(1, $_GET['question'], PDO::PARAM_INT);
    $query->execute();
    $result_set = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result_set as $results) {
        echo "<div>" . $results['answer'] . "</div>";
    }
}
?>
</div>
