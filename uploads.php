<?php include("connect-to-table.php");
session_start();
include("header.php");
?>

<center><h7>Заявки пользователей:</h7></center>
<table class="table table-secondary table-hover table-bordered border-dark">
        <thead>
        <tr>
            <th scope="col">Дата</th>
            <th scope="col">Автор</th>
            <th scope="col">Фото</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
<?php

$from = 0;
$res = $mysqli->query("SELECT count(*) FROM compitition");
$row = $res->fetch_row();
$num = $row[0];
include("load-compitition.php"); 
foreach ($uploads as $oneUpload)
if ($oneUpload["Accept"] == false) {
{
?>
        <tr>
            <th scope="col"><?=$oneUpload["DateUpload"]?></th>
            <th scope="col"><?=$oneUpload["Author"]?></th>
            <th scope="col"><center><img src="images/photos/<?=$oneUpload["Picture"]?>" style="width: 150px; height: 150px;" alt="">
            <?php if ($oneUpload["Picture2"]!='') { ?>
                <img src="images/photos/<?=$oneUpload["Picture2"]?>" style="width: 150px; height: 150px;" alt="">
                <?php } ?>
            </center></th>
            <th scope="col">
                <form method="get" action="accept-upload.php" enctype="multipart/form-data">
                    <input type ='hidden' name='id' value=<?=$oneUpload["ID"]?>></input>
                    <center><button class="btn" type="submit" role="button">Принять</button></center>
                </form>
            </th>
            <th scope="col">
                <form method="get" action="delete-upload.php" enctype="multipart/form-data">
                    <input type ='hidden' name='id' value=<?=$oneUpload["ID"]?>></input>
                    <center><button class="btn" type="submit" role="button">Отклонить</button></center>
                </form>
            </th>
        </tr>
<?php
} }
?>
        </tbody>
    </table>
    <?php
    include("footer.php");
    ?>