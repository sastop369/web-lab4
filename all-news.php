<?php
include("connect-to-table.php");
session_start();
include("header.php");
?>
<!DOCTYPE html>
<html lang="ru">
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php
        $from = 0;
        $res = $mysqli->query("SELECT count(*) FROM pages1");
        $row = $res->fetch_row();
        $num = $row[0];
        include("lab4/load-data.php"); 
        foreach ($news as $oneNews) {
        ?>
        <div class="col">
          <div class="card h-100 text-white border-dark bg-danger" style="--bs-bg-opacity: .1;">
            <img src="images/headers/<?=$oneNews["HeadPicture"]?>" class="img-top" alt="Monika Linkytė">
            <div class="card-body">
              <h5 class="text-decoration-underline"><?=$oneNews["Head"]?></h5>
              <p class="card-text" ><?=$oneNews["ShortText"]?></p>
              <form method="get" action="new-page.php" enctype="multipart/form-data">
                <input type ='hidden' name='id' value=<?=$oneNews["ID"]?>></input>
                <button class="btn" type="submit" role="button">Читать дальше</button>
              </form>
            </div>
            <p class="card-footer text-white-50"><?=$oneNews["NewDate"]?></p>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php
    include("footer.php");
    ?>
  </body>
</html>
