<?php include("connect-to-table.php");
session_start();
include("header.php");
?>
        <?php include("lab4/load-by-id.php") ?>
        <div class="container-fluid">
        <form method="post" enctype="multipart/form-data">
            <br><h5>Отредактируйте желаемые поля</h5>
            <input type ='hidden' name='id' value=<?=$oneNews["ID"]?>></input>
            <p>Заголовок новости</p>
            <input type="text" name="title" value = "<?=$oneNews["Head"]?>">
            <p>Короткий текст</p>
            <input type="text" name="short_text" value = "<?=$oneNews["ShortText"]?>"></input>
            <p>Полный текст</p>
            <textarea name="full_text"><?=$oneNews["ArticleText"]?></textarea>
            <p>Дата новости</p>
            <input type="datetime-local" name="new_date" value="<?=$oneNews["NewDate"]?>"></input>
            <p>Изображение для заголовка</p>
            <input type="file" name="head_image" accept="image/png image/jpg"></input>
            <p>Изображение на странице новости</p>
            <input type="file" name="main_image" accept="image/png image/jpg"></input>
            <br>
            <br>
            <input type="submit" name="submit" formaction="lab4/form-action-redact.php"></input>
            <button name="delete" formaction="lab4/delete-new.php">Удалить</button>
        </form>
        </div>
    <?php
    include("footer.php");
    ?>
    </body>
</html>