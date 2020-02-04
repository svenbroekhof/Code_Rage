<?php
if (!isset($_POST['search_input'])) {
    die("You do not have permission to view this page.");
}

echo $search_query = $_POST['search_input'];

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
$query = $dbh->prepare("SELECT `answer` FROM `reply` WHERE MATCH (`answer`) AGAINST (?)");
$query->bindParam(1, $search_query, PDO::PARAM_STR, 999);
$query->execute();
$result_set = $query->fetchAll(PDO::FETCH_ASSOC);
print_r($result_set);
