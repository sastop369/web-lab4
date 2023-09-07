<?php include("connect-to-table.php");
session_start();
include("header.php");
?>
    <a class="btn" role="button" href="lab4/post-new-form.php" >Добавить новость</a>
    <table class="table table-secondary table-hover table-bordered border-dark">
        <thead>
        <tr>
            <th scope="col">Дата новости</th>
            <th scope="col">Заголовок</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
<?php
$from = 0;
$res = $mysqli->query("SELECT count(*) FROM pages1");
$row = $res->fetch_row();
$num = $row[0];
include("lab4/load-data.php"); 
foreach ($news as $oneNews)
{
?>
        <tr>
            <th scope="col"><?=$oneNews["NewDate"]?></th>
            <th scope="col"><?=$oneNews["Head"]?></th>
            <th scope="col">
                <form method="get" action="lab4/redact-news-form.php" enctype="multipart/form-data">
                    <input type ='hidden' name='id' value=<?=$oneNews["ID"]?>></input>
                    <center><button class="btn" type="submit" role="button">Редактировать</button></center>
                </form>
            </th>
        </tr>
<?php
}
?>
        </tbody>
    </table>
    <?php
    include("footer.php");
    ?>
</body>
</html>
