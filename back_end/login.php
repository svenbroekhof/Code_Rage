<?php
if(isset($_POST['username'], $_POST['password'])){
    require 'db_config.php';

    $pass = hash('sha256', $_POST['password']);
    $usr = $_POST['username'];

    $query = dbConnect()->prepare("SELECT username, password FROM login WHERE username=:username AND password=:password");
    $query->bindParam(':username', $user);
    $query->bindParam(':password', $pass);
    $query->execute();

    $row = $query->fetch();

    if($row['password'] == $pass || ['username'] == $user){
        $_SESSION['username'] = $row['username'];
        header("Location: www.google.com");
    }
    else if($row['password'] == $pass) {
        echo "Verkeerd wachtwoord bitch";

    } else if($row['username'] == $user) {
        var_dump($user);
    } else {
        echo "error";
    }

}
?>
