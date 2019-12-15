<?php
require('connect_db.php');

// Define variables and set to empty values
$emailErr = $passwordErr = $validationErr = $usernameErr = "";
$email = $password = $validation = $username = "";


//    // _SERVER = datbase, REQUEST the superglobals
//    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//        $email = test_input($_POST["email"]);
//        $password = test_input($_POST["password"]);
//        $username = test_input($_POST["username"]);
//    }

// get all data to the validation checks
function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
        }


        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST["validate_password"])) {
            $validationErr = "Confirm password";
        } else {
            $validation = test_input($_POST["validate_password"]);
        }


    }
}

?>
