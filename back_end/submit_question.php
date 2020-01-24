<?php
        //Check if the question has an title.
        if(isset($_POST['title'])){
            require_once 'db_config.php';

            $tagid = $_POST['tagid'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = date(DATE_RFC822);
            $user_id = $_SESSION['user_id'];

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
