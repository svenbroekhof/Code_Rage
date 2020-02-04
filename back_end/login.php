<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['username'], $_POST['password'])) {
    require 'db_config.php';

    $pass = hash('sha256', $_POST['password']);
    $user = $_POST['username'];

    $query = dbConnect()->prepare("SELECT username, password, user_id, role FROM login WHERE username= :username AND password = :password");
    $query->bindParam(':username', $user);
    $query->bindParam(':password', $pass);
    $query->execute();

    $row = $query->fetch();
    // var_dump(headers_list()); exit;
    if ($row['password'] == $pass || ['username'] == $user) {
        $_SESSION['role'] = 1;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $row['user_id'];
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            switch ($role) {
                case "student":
                    header("Refresh: 0.1; URL=../index.php?content=dashboard_student");
                    break;
                case "docent":
                    header("Refresh: 0.1; URL=../index.php?content=dashboard_docent");
                    break;
                case "admin":
                    header("Refresh: 0.1; URL=../index.php?content=dashboard_admin");
                    break;
            }
        }


    } else if ($row['password'] != $pass) {
        echo "Verkeerd wachtwoord";

    } else if ($row['username'] != $user) {
        var_dump($user);
    } else {
        echo "error";
    }

}
?>
