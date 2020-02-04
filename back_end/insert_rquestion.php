<?php
session_start();
$role = $_SESSION['role'];
echo $_POST['bericht_docent'];

try {
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=knowledgebank', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br>";
    die("Could not connect to database.");
}

$query = $dbh->prepare("INSERT INTO `reply` (`id_docent`, `bericht`) VALUES (?, ?)");
$query->bindParam(1, $role, PDO::PARAM_INT);
$query->execute(2, );
print_r($query->fetch());



