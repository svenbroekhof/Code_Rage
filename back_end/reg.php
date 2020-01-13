<?php
        if(isset($_POST['username'], $_POST['password'])){
            require 'db_config.php';

            $user = $_POST['username'];
            $email = $_POST['email'];
            $pass = hash('sha256', $_POST['password']);
            $role = $_POST['role'];

            //Check, if user exists:

            $check = dbConnect()->prepare("SELECT * FROM login");

            $check->bindParam(':username', $user);
            $check->bindParam(':password', $pass);
            $check->bindParam(':email', $email);
            $check->bindParam('role',$role);

            $check->execute();

            $row = $check->fetch();
            if ($row['username'] == $user) {
              echo "User already exists";
            }
            else {
              //Register:
              $query = dbConnect()->prepare("INSERT INTO `login`(`email`, `password`,`username`,`role`) VALUES ('$email', '$pass','$user','$role')");
              $query->execute();

              $_SESSION['username'] = $user;
              header("Location: check.php");
            }
        }
      ?>
