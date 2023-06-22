<?php
include("connect-to-table.php");
session_start();
include("header.php");
/* Подготовленный запрос, шаг 1: подготовка */
$stmt = $mysqli->prepare("INSERT INTO compitition (Author, DescriptionText, DateUpload, Picture, Picture2) VALUES (?, ?, ?, ?, ?)");
/* Подготовленный запрос, шаг 2: связывание и выполнение */
$stmt->bind_param("sssss", $author, $description, $date, $picture, $picture2);

$picture = $_FILES["picture"]["name"];
$picture_tmp = $_FILES["picture"]["tmp_name"];
$head_folder = "./images/photos/" . $picture;

$picture2 = $_FILES["picture2"]["name"];
if ($picture2 != '') {
$picture2_tmp = $_FILES["picture2"]["tmp_name"];
$head2_folder = "./images/photos/" . $picture2;
move_uploaded_file($picture2_tmp, $head2_folder);
}

$author = $_POST['author'];
$description = $_POST['description'];
$date = $_POST['date'];  
$stmt->execute();
move_uploaded_file($picture_tmp, $head_folder);
?>
<p>Заявка успешно подана!</p>
<?php
include("footer.php");
?>