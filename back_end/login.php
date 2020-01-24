<?php
if(isset($_POST['username'], $_POST['password'])){
    require 'db_config.php';

    $pass = hash('sha256', $_POST['password']);
    $user = $_POST['username'];

    $query = dbConnect()->prepare("SELECT username, password, user_id FROM login WHERE username=:username AND password=:password");
    $query->bindParam(':username', $user);
    $query->bindParam(':password', $pass);
    $query->execute();

    $roles = dbConnect()->prepare("SELECT role FROM login WHERE role=:role");
    $roles->bindParam(':role', $role);
    $roles->execute();

    var_dump($query);
    var_dump($roles);
    $userRoles = $roles->fetch();
    $row = $query->fetch();
    var_dump($roles);
    // var_dump(headers_list()); exit;
    if($row['password'] == $pass || ['username'] == $user){
        $_SESSION['role'] = 1;
        session_start();
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['role'] = $_POST['role'];


        $_SESSION['user_id'] = $row['user_id'];
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
