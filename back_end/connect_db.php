<!-- Verbinding met de DB opzetten -->
<?php
    define("SERVERNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DBNAME", "knowledgebank");
  
    // We maken contact met de database
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
?>