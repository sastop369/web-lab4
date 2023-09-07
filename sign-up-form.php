<?php
session_start();
include("header.php");
?>
        <div class="container-fluid">
            <form method="post" action="form-action-sign-up.php">
                <p>Имя пользователя</p>
                <input type="text" name="user_name" required>
                <p>Пароль</p>
                <input type="password" name="password" required></input>
                <input type="submit" name="submit"></input>
            </form>
        </div>
    </body>
    <?php
    include("footer.php");
    ?>
</html>
