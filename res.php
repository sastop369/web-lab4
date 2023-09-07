<?php include("connect-to-table.php"); 
session_start();
include("header.php");
?>

<div class="container">
<center>
<h5>Представляем Вашему вниманию победителей конкурса "Косплей на любимого участника Евровидения"!</h5>
</center>
</div>

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php
        $from = 0;
        $res = $mysqli->query("SELECT count(*) FROM compitition");
        $row = $res->fetch_row();
        $num = 3;
        include("load-winners.php"); 
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
                <br>
                <p><?=$oneUpload["Vote"]?> голосов</p>
              </form>
            </div>
            <p class="card-footer text-white-50"><?=$oneUpload["DateUpload"]?></p>
          </div>
        </div>
        <?php } }?>
    </div>
</div>

<?php
if (isset($_SESSION["Admin"])) { ?>
    <center><a class="btn" href="results-form.php" type="submit" role="button">Отправить фото</a></center>
    <?php }
        $from = 0;
        $res = $mysqli->query("SELECT count(*) FROM results");
        $row = $res->fetch_row();
        $num = $row[0];
        echo $num;
        if ($num != 0) {
        include("load-results.php"); ?>
        <center><h5>Публикуем отчет о вручении призов по итогам конкурса "Косплей на любимого участника Евровидения"!<br>
        Благодарим всех участников за творческий подход к конкурсу!<br>
        Желаем Вам дальнейших успехов во всех Ваших начинаниях!</h5></center>
        <div class="wrapper">
        <div class="slider single-item">
        <?php
        for ($i = 0;$i<$num;$i++) {
        ?>
        <div>
            <center><p>
                <img src="images/results/<?=$results[$i]["Photo"]?>">
            </p></center>
        </div>
        <?php } ?>
        </div>
        </div>
        <?php }?>


<?php include("footer.php");?>
<script src="time.js"></script>
<script src="script.js"></script>
<script src="slick/slick.min.js"></script>