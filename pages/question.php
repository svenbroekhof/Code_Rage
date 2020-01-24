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

<h1>Stel je vraag:</h1>
<div class="container" style="border: 2px solid #FFCF10">
  <form action="index.php?script=submit_question" method="post">
    <!-- Title question -->
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="title-question"><p class="kop-input">Titel</p></label>
          <p class="description">Geef een titel aan je vraag</p>
          <input type="text" class="form-control" id="title-question" name="title" style="text-align: left;"></input>
        </div>
      </div>
    </div>

    <!-- Tag question -->
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="title-question"><p class="kop-input">Tag</p></label>
          <p class="description">Geef een tag aan je vraag</p>
          <input type="text" class="form-control" id="title-question" name="tagid" style="text-align: left;" placeholder="Voorbeeld: PHP"></input>
        </div>
      </div>
    </div>

    <!-- Content question -->
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><p class="kop-input">Vraag</p></label>
          <p class="description">Geef zo veel mogelijk informatie over je vraag</p>
          <textarea class="form-control" id="content-question" rows="10" name="content"></textarea>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary" style="margin-left: 45%; margin-bottom: 5px;">Stel vraag</button>
    </div>
  </form>
</div>
<?php

?>
