<?php include("connect-to-table.php"); 
session_start();
include("header.php");
?>
    <?php 
    $from=0;
    $num=6;
    include("lab4/load-data.php");
    ?>
    <div class="wrapper">
        <div class="slider single-item">
        <?php 
        for ($i = 0;$i<$num;$i++) {
        ?>
            <div>
                <center><p>
                            <form method="get" action="new-page.php" enctype="multipart/form-data">
                                <input type ='hidden' name='id' value=<?=$news[$i]["ID"]?>></input>
                                <button class="a" type="submit" role="button"><img src="images/headers/<?=$news[$i]["HeadPicture"]?>"><h5 class="title"><?=$news[$i]["Head"]?></h5></button>
                            </form>
                </p></center>
            </div>
        <?php } ?>
        </div>
    </div>


    <div class="last_news">
        <h7>Свежие новости</h7>
    </div>


    <?php 
    $from=0;
    $num=3;
    include("load-data.php");
    ?>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php 
        for ($i = 0;$i<$num;$i++) {
        ?>
            <div class="col">
                <div class="card h-100 text-white border-dark bg-danger" style="--bs-bg-opacity: .1;">
                    <img src="images/headers/<?=$news[$i]["HeadPicture"]?>" class="img-top" alt="Monika Linkytė">
                    <div class="card-body">
                        <h5 class="text-decoration-underline"><?=$news[$i]["Head"]?></h5>
                        <p class="card-text" ><?=$news[$i]["ShortText"]?></p>
                        <form method="get" action="new-page.php" enctype="multipart/form-data">
                            <input type ='hidden' name='id' value=<?=$news[$i]["ID"]?>></input>
                            <button class="btn" type="submit" role="button">Читать дальше</button>
                        </form>
                    </div>
                    <p class="card-footer text-white-50"><?=$news[$i]["NewDate"]?></p>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
    <script src="slick/slick.min.js"></script>
    <script src="script.js"></script>

