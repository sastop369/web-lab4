<?php include("connect-to-table.php"); 
session_start();
include("header.php");
?>

<div class="container">
<center>
<h5>Объявляем фотоконкурс "Косплей на любимого участника Евровидения"</h5>
<h7>Регистрируйся на сайте и присылай фото косплея на своего фаворита на конкурсе Евровидения! Это может быть участник абсолютно любого года и страны. <br> Успей подать заявку или проголосовать за понравившуюся работу пока конкурс не завершился!</h7>
<br><br>
<h7>До завершения конкурса осталось:</h7>
<div class="timer">
  <div class="timer__items">
    <div class="timer__item timer__days"></div>
    <div class="timer__item timer__hours"></div>
    <div class="timer__item timer__minutes"></div>
    <div class="timer__item timer__seconds"></div>
  </div>
</div>


<a class="btn" id="btn1" href="upload-new-form.php">Подать заявку</a>
<a class="btn" id="btn2" hidden = "true" href="res.php">Результаты конкурса</a>
<br>
<h5>Голосуй за лучшую заявку:</h5>
</center>
</div>

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php
        $from = 0;
        $res = $mysqli->query("SELECT count(*) FROM compitition");
        $row = $res->fetch_row();
        $num = $row[0];
        include("load-compitition.php"); 
        foreach ($uploads as $oneUpload) {
          if ($oneUpload["Accept"] == true) {
        ?>
        <div class="col">
          <div class="card h-100 text-white border-dark bg-danger" style="--bs-bg-opacity: .1;">
          <?php if ($oneUpload["Picture2"] != '') { ?>
              <div class="slider single-item">

              <div>
                  <center><p>
                      <img src="images/photos/<?=$oneUpload["Picture"]?>" class="img-top">
                  </p></center>
              </div>
              <div>
                  <center><p>
                      <img src="images/photos/<?=$oneUpload["Picture2"]?>" class="img-top">
                  </p></center>
              </div>

              </div>
          <?php } else { ?>
            <img src="images/photos/<?=$oneUpload["Picture"]?>" class="img-top" alt="">
          <?php } ?>
            <div class="card-body">
              <h5 class="text-decoration-underline"><?=$oneUpload["Author"]?></h5>
              <p class="card-text" ><?=$oneUpload["DescriptionText"]?></p>
              <form method="get" action="vote.php" enctype="multipart/form-data">
                <input type ='hidden' name='id' value=<?=$oneUpload["ID"]?>></input>
                <input type ='hidden' name='login' value="<?=$_SESSION['userName']?>"></input>
                <br>
                <p><?=$oneUpload["Vote"]?> голосов</p>
                <?php
                if (isset($_SESSION['userName'])) { ?>
                <button class="btnVote" type="submit" role="button">Проголосовать</button>
                <?php }
                else { ?>
                  <br><p style="text-decoration: underline;">Зарегистрируйтесь или войдите в систему, чтобы проголосовать!</p>
                <?php } ?>
              </form>
            </div>
            <p class="card-footer text-white-50"><?=$oneUpload["DateUpload"]?></p>
          </div>
        </div>
        <?php } }?>
    </div>
</div>


<?php include("footer.php");?>
<script src="time.js"></script>
<script src="script.js"></script>
<script src="slick/slick.min.js"></script>