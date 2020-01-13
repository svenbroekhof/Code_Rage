<?php
if(isset($_POST['username'], $_POST['password'])){
    require 'db_config.php';

    $pass = hash('sha256', $_POST['password']);
    $usr = $_POST['username'];

    $query = dbConnect()->prepare("SELECT username, password FROM login WHERE username=:username AND password=:password");
    $query->bindParam(':username', $usr);
    $query->bindParam(':password', $pass);
    $query->execute();

    var_dump($query);

    $row = $query->fetch();
    // var_dump(headers_list()); exit;
    if($row['password'] == $pass || ['username'] == $user){
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header("Refresh: 1; URL=../index.php?content=dashboard_student");

    }
    else if($row['password'] != $pass) {
        echo "Verkeerd wachtwoord";

    } else if($row['username'] != $user) {
        var_dump($user);
    } else {
        echo "error";
    }

}
?>
