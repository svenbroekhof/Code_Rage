<!-- Verbinding met de DB opzetten -->
<?php
// Database data
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'knowledgebank';

// Trying to connect and .
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
// If there is an error with the connection, stop the script and display the error.
die ('Failed to connect to the database: ' . mysqli_connect_error());
}