<?php
session_start();
include("header.php");
?>
        <div class="container-fluid">
            <form method="post" action="lab4/form-action-post.php" enctype="multipart/form-data">
                <p>Заголовок новости</p>
                <input type="text" name="title" required>
                <p>Короткий текст</p>
                <input type="text" name="short_text" required></input>
                <p>Полный текст</p>
                <textarea name="full_text" required></textarea>
                <p>Дата новости</p>
                <input type="datetime-local" name="new_date" required></input>
                <p>Изображение для заголовка</p>
                <input type="file" name="head_image" accept="image/png image/jpg" required></input>
                <p>Изображение на странице новости</p>
                <input type="file" name="main_image" accept="image/png image/jpg" required></input>
                <br>
                <br>
                <input type="submit" name="submit"></input>
            </form>
        </div>
    </body>
    <?php
    include("footer.php");
    ?>
</html>
    