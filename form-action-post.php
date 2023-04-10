<?php
include("connect-to-table.php");
session_start();
include("header.php");
/* Подготовленный запрос, шаг 1: подготовка */
$stmt = $mysqli->prepare("INSERT INTO pages1 (Head, ShortText, ArticleText, NewDate, HeadPicture, FullPicture) VALUES (?, ?, ?, ?, ?, ?)");
/* Подготовленный запрос, шаг 2: связывание и выполнение */
$stmt->bind_param("ssssss", $title, $short_text, $full_text, $new_date, $head_image_name, $main_image_name);
$head_image_name = $_FILES["head_image"]["name"];
$head_image_tmp = $_FILES["head_image"]["tmp_name"];
$head_folder = "./images/headers/" . $head_image_name;
$main_image_name = $_FILES["main_image"]["name"];
$main_image_tmp = $_FILES["main_image"]["tmp_name"];
$main_folder = "./images/articles/" . $main_image_name;
$title = $_POST['title'];
$short_text = $_POST['short_text'];
$full_text = $_POST['full_text'];
$new_date = $_POST['new_date'];  
$stmt->execute();
move_uploaded_file($head_image_tmp, $head_folder);
move_uploaded_file($main_image_tmp, $main_folder);
?>
<p>Новость загружена успешно</p>
<?php
include("footer.php");
?>