<style>
    .site-footer{
  margin-top: 100px;
  display: ;
}

.container{
  margin-top: 40px;
  text-align: left;
  background-color: white;
}

body {
  background-color: #F6F6F3;
}
h1{
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
</style>

<?php

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
        <?php echo $row2['username'];?>
    </div>
        <div class="row">
            <h2 style="margin-left: 35%;"><?php echo $row['title']; ?></h2>
        </div>
        <br>
        <!-- Tag question -->
        <div class="row">
            <p style="margin-left: 20px;"><?php echo 'Tags: <br>'  . $row['tagid']; ?></p>
        </div>

        <!-- Content question -->
        <div class="row">
            <p style="margin-left: 47%;"><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
        </div>
</div>
