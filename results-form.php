<?php
session_start();
include("header.php");
?>
        <div class="container-fluid">
            <form method="post" action="form-action-results.php" enctype="multipart/form-data">
                <p>Фото</p>
                <input type="file" name="photo" accept="image/png image/jpg" required></input>
                <br>
                <input type="submit" name="submit"></input>
            </form>
        </div>
    </body>
    <?php
    include("footer.php");
    ?>
</html>
    