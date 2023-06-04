<?php include("connect-to-table.php");
session_start();
include("header.php");
include("lab4/load-by-id.php")
?>
    <link rel="stylesheet" href="styles/news_style.css">
    <div class="container-fluid">
    <h2><?=$oneNews["Head"]?></h2>
    <img src="images/articles/<?=$oneNews["FullPicture"]?>">
    <p><?=$oneNews["ShortText"]?></p>
    <p><?=$oneNews["ArticleText"]?></p>
    <p class="time"><?=$oneNews["NewDate"]?></p>
    </div>
    <?php
    include("footer.php");
    ?>
  </body>
</html>
