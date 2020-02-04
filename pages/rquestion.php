<style>
    .site-footer {
        margin-top: 100px;
        display: ;
    }

    .container {
        margin-top: 40px;
        text-align: left;
        background-color: white;
    }

    body {
        background-color: #F6F6F3;
    }

    h1 {
        text-align: center;
    }

    .description {
        font-style: italic;
        font-size: 12px;
    }

    .kop-input {
        font-weight: bold;
        margin-bottom: 0;
    }

    h3, p {
        text-align: center;
    }
</style>


<?php
//CHECK IF THE URL HAS A QUESTION ID TO ANSWER
if (!isset($_GET['q'])) {
    die("Question unknown");
}
$question_id = $_GET['q'];


//TRY CONNECTING TO THE DATABASE
try {
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=knowledgebank', $user, $pass);
} catch (PDOException $e) { //ELSE THROW AN EXCEPTION
    print "Error!: " . $e->getMessage() . "<br>"; //ERROR MESSAGE
    die("Could not connect to database."); //USER FRIENDLY ERROR MESSAGE
}


//CHECK IF THE QUESTION HAS ALREADY BEEN ANSWERED
$query = $dbh->prepare("SELECT `answer` FROM `reply` WHERE `question` = ?");
$query->bindParam(1, $question_id, PDO::PARAM_INT);
$query->execute(); //EXECUTE QUERY


if (empty($query->fetch())) {
    //CHECK IF THE USER HAS PERMISSION TO WRITE A MESSAGE
    if (isset($_SESSION['role']) && $_SESSION['role'] == "docent" && empty($query->fetch())) {
        $role = $_SESSION['user_id'];

        ?>
        <form method="post" action="">
            <div class="form-group">
                <textarea name="bericht_docent" class="form-control" id="exampleFormControlTextarea1"
                          rows="3"></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php

        if (isset($_POST['bericht_docent'])) {
            $bericht_docent = $_POST['bericht_docent'];
        }

        //INSERT INTO THE DATABASE
        $query = $dbh->prepare("INSERT INTO `reply` (`id_docent`, `answer`, `question`) VALUES (?, ?, ?)"); //PREPARE QUERY
        $query->bindParam(1, $role, PDO::PARAM_INT);
        $query->bindParam(2, $bericht_docent, PDO::PARAM_STR, 999);
        $query->bindParam(3, $question_id, PDO::PARAM_INT);
        $query->execute(); //EXECUTE QUERY
    }


} else {
    $role = $_SESSION['user_id'];
    $bericht_docent = $_POST['bericht_docent'];

    //FETCH CORRESPONDING QUESTION & ANSWER FROM THE DATABASE
    $result_set = array(); //DECLARE EMPTY ARRAY TO STORE FETCHED RESULTS FROM THE DATABASE
    $query = $dbh->prepare("SELECT `answer`, `question` FROM `reply` WHERE `question` = ?");
    $query->bindParam(1, $question_id, PDO::PARAM_INT);
    $query->execute(); //EXECUTE QUERY
    $result_set = $query->fetch(PDO::FETCH_ASSOC); //FETCH THE RESULTS FROM THE DATABASE

    //DISPLAY THE RESULTS IF THE FETCHED DATA IS SET AND NOT EMPTY
//    if(isset($result_set) && !empty($result_set)){
//        echo "<h3>QUESTION: #</h3>" . $result_set['question'] . "<br><br>";
//        echo "<h3>ANSWER: </h3>" . $result_set['answer'] . "<br><br>";
//    }
}

function dbConnect()
{
    try {
        $conn = new PDO ("mysql:dbname=knowledgebank;host=localhost", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo 'ERROR', $e->getMessage();
    }
}

$question_id = $_GET['q'];

$query = dbConnect()->prepare("SELECT question_id, title, content, tagid, user_id FROM content WHERE question_id=:question_id");
$query->bindParam(':question_id', $question_id);
$query->execute();

$row = $query->fetch();
$userid = $row['user_id'];
?>


<style>
    .site-footer{
        margin-top: 100px;
        display: ;
    }

    #largebox{
        margin-top: 40px;
        text-align: left;
        background-color: white;
    }

    body {
        background-color: #F6F6F3;
    }
</style>

<?php
$query = dbConnect()->prepare("SELECT username from login WHERE user_id=:userid");
$query->bindParam(':userid', $userid);
$query->execute();

$row2 = $query->fetch();
?>
<div class="container" id="largebox" style="border: 2px solid #FFCF10; padding: 0;">
    <div class="container" style="border: 2px solid #FFCF10; margin-top: 0; width: 200px; float: left;">
        <p style="margin-bottom: 5px;">Username: </p>
        <?php echo $row2['username']; ?>
    </div>
    <div class="row">
        <h2 style="margin-left: 35%;"><?php echo $row['title']; ?></h2>
    </div>
    <br>
    <!-- Tag question -->
    <div class="row">
        <p style="margin-left: 20px;"><?php echo 'Tags: <br>' . $row['tagid']; ?></p>
    </div>

    <!-- Content question -->
    <div class="row">
        <p style="margin-left: 47%;"><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
    </div>

    <?php

    if (isset($result_set) && !empty($result_set)) {
//        echo "<h3>QUESTION: #</h3>" . $result_set['question'] . "<br><br>";
        echo "<br><br><h3>Antwoord: </h3>" . "<p>" . $result_set['answer'] . "</p>";
    }
    ?>
</div>

