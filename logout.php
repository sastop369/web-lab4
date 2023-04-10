<?php
include("header.php");
session_start();
session_destroy();
?>
<p>Вы успешно вышли из учетной записи</p>
<?php
include("footer.php");
?>