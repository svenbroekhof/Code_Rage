<?php
require('connect_db.php');

// Define variables and set to empty values
$emailErr = $passwordErr = $usernameErr = "";
$email = $password = $username = "";


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

// Make sure the submitted registration values are not empty.
if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username'])) {
    // One or more values are empty.
    return ('One of more values are empty');
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['email'], $_POST['password'], $_POST['username'])) {
    // Could not get the data that should have been sent.
    return ('Please complete the registration form!');
}








//if (isset($_POST['submit'])) {
//    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//        if (empty($_POST["username"])) {
//            $usernameErr = "Username is required";
//        } else {
//            $username = test_input($_POST["username"]);
//        }
//
//
//        if (empty($_POST["email"])) {
//            $emailErr = "Email is required";
//        } else {
//            $email = test_input($_POST["email"]);
//        }
//
//        if (empty($_POST["password"])) {
//            $passwordErr = "Password is required";
//        } else {
//            $password = test_input($_POST["password"]);
//        }
//
//
//    }
//}




?>
