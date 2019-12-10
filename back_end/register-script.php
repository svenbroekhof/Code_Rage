<?php
//// Change this to your connection info.
//$DATABASE_HOST = 'localhost';
//$DATABASE_USER = 'root';
//$DATABASE_PASS = '';
//$DATABASE_NAME = 'knowledgebank';
//// Try and connect using the info above.
//$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
//
//if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
//	// Could not get the data that should have been sent.
//	die ('U heeft niet het hele formulier ingevuld.');
//}
//// Make sure the submitted registration values are not empty.
//if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
//	// One or more values are empty.
//	die ('U heeft niet het hele formulier ingevuld.');
//}
//
//if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//	die ('Onjuist e-mail adres');
//}
//
//if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
//    die ('Die username is niet toegestaan');
//}
//
//// We need to check if the account with that username exists.
//if ($stmt = $con->prepare('SELECT user_id, password FROM `login` WHERE username = ?')) {
//	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
//	$stmt->bind_param('s', $_POST['username']);
//	$stmt->execute();
//	$stmt->store_result();
//	// Store the result so we can check if the account exists in the database.
//	if ($stmt->num_rows > 0) {
//		// Username already exists
//		echo 'Deze username is al ingebruik';
//	} else {
//		// Username doesnt exists, insert new account
//        if ($stmt = $con->prepare('INSERT INTO `login` (user_id, email, password, username, activation_code, role) VALUES (?, ?, ?, ?)')) {
//            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
//            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//            $uniqid = uniqid();
//            $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $uniqid, $_POST['rol']);
//            $stmt->execute();
//            $from    = 'noreply@code_rage.com';
//            $subject = 'Account activatie';
//            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
//            $activate_link = 'localhost/Code_rage/back_end/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
//            $message = '<p>klik op de volgende link om uw account te activeren: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
//            mail($_POST['email'], $subject, $message, $headers);
//            echo 'Kijk in uw mail om uw account te activeren';
//        } else {
//            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
//            echo 'Error';
//        }
//	}
//	$stmt->close();
//} else {
//	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
//	echo 'Error';
//}
//$con->close();
?>

<?php
// Include config file
require_once "connect_db.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["validate_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["validate_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>
