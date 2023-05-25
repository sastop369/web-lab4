<?php
session_start();
include("header.php");
date_default_timezone_set('Asia/Novosibirsk');

if(!isset($_SESSION['userName'])) {
echo "<h7>Вы не зарегистрированы или не вошли в свой аккаунт!</h7>";
}

else { ?>
        <div class="container-fluid">
            <form method="post" action="form-action-upload.php" enctype="multipart/form-data">
                <p>Автор</p>
                <input type="text" name="author" required>
                <p>Описание</p>
                <input type="text" name="description" required></input>
                <input type="datetime-local" hidden="true" name="date"  value="<?php echo date('Y-m-d H:i');?>"></input>
                <p>Фото (мин. 1)</p>
                <input type="file" name="picture" accept="image/png image/jpg" required></input>
                <input type="file" name="picture2" accept="image/png image/jpg"></input>
                <br>
                <br>
                <input type="submit" name="submit"></input>
            </form>
        </div>
<?php } ?>

<?php
    include("footer.php");
?>