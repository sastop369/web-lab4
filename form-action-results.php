<?php
include("connect-to-table.php");
session_start();
include("header.php");
/* Подготовленный запрос, шаг 1: подготовка */
$stmt = $mysqli->prepare("INSERT INTO results (Photo) VALUES (?)");
/* Подготовленный запрос, шаг 2: связывание и выполнение */
$stmt->bind_param("s", $photo);

$photo = $_FILES["photo"]["name"];
$photo_tmp = $_FILES["photo"]["tmp_name"];
$head_folder = "./images/results/" . $photo;

$stmt->execute();
move_uploaded_file($photo_tmp, $head_folder);
?>
<p>Фотография успешно опубликована!</p>
<?php
include("footer.php");
?>