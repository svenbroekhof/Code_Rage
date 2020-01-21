<!-- site -->
<!--
    include("db_config.php");
    include("functions.php");
    //contact met de database
    $sql = "SELECT * FROM `content`";
    $result = mysqli_query($conn, $sql);


    $_tagid = sanitize($_POST["tagid"]);
    $_title = sanitize($_POST["title"]);
    $_content = sanitize($_POST["content"]);


    $sql = "INSERT INTO `content` (`tagid`,
                      `title`,
                      `content`,
                      `date`
                      )
                      VALUES('" . $_POST["tagid"] . "',
                      '" . $_POST["title"] . "',
                      '" . $_POST["content"] . "',
                      '" . $_POST["date"] . "')";
    mysqli_query($conn, $sql);

    //mogelijke resultaten

    if ( $result ) {
        //succes
        echo '<br><br><div class="alert alert-success" role="alert">
            Uw vraag is succesvol verzonden.
        </div>';
        header("Refresh: 4; url=./index.php?question=");
    } else {
        //foutmelding
        echo '<br><br><div class="alert alert-danger" role="alert">
        Er is iets fout gegaan tijdens het verzenden van uw bericht. Probeer het opnieuw.
    </div>';
    }
-->

<?php
        if(isset($_POST['title'])){
            require_once 'db_config.php';

            $tagid = $_POST['tagid'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = date(DATE_RFC822);
            $user_id = $_SESSION['user_id'];

            //Check, if user exists:

            $check = dbConnect()->prepare("SELECT * FROM content");

            $check->bindParam('tagid', $tagid);
            $check->bindParam('title', $title);
            $check->bindParam('content', $content);
            $check->bindParam('date',$date);
            $check->bindParam('user_id',$user_id);

            $check->execute();

            $row = $check->fetch();
            if ($row['title'] == $title) {
              echo "vraag bestaat al";
            }
            else {
              //Register:
              $query = dbConnect()->prepare("INSERT INTO `content`(`tagid`, `title`,`content`,`date`,`user_id`) VALUES ('$tagid', '$title','$content','$date','$user_id')");
              $query->execute();
            }
        }
      ?>
