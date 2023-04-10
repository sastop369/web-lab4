<?php
include("connect-to-table.php");
session_start();
include("header.php");
if (trim($_FILES["head_image"]["name"]))
{
    $stmt = $mysqli->prepare("SELECT HeadPicture FROM pages1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $id = $_POST['id'];
    $stmt->execute();
    $result = $stmt->get_result();
    $news=array();
    $news=$result->fetch_assoc();
    $head_folder = "./images/headers/" . $news['HeadPicture'];
    if (file_exists($head_folder))
        unlink($head_folder);
    $head_image_name = $_FILES["head_image"]["name"];
    $head_image_tmp = $_FILES["head_image"]["tmp_name"];
    $head_folder = "./images/headers/" . $head_image_name;
    $stmt = $mysqli->prepare("UPDATE pages1 SET HeadPicture = ? WHERE ID = ?");
    $stmt->bind_param("si", $pic, $id);
    $id = $_POST['id'];
    $pic = $head_image_name;
    $stmt->execute();
    move_uploaded_file($head_image_tmp, $head_folder);
}
if (trim($_FILES["main_image"]["name"]))
{
    $stmt = $mysqli->prepare("SELECT FullPicture FROM pages1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $id = $_POST['id'];
    $stmt->execute();
    $result = $stmt->get_result();
    $news=array();
    $news=$result->fetch_assoc();
    $main_folder = "./images/articles/" . $news['FullPicture'];
    if (file_exists($main_folder))
        unlink($main_folder);
    $main_image_name = $_FILES["main_image"]["name"];
    $main_image_tmp = $_FILES["main_image"]["tmp_name"];
    $main_folder = "./images/articles/" . $main_image_name;
    $stmt = $mysqli->prepare("UPDATE pages1 SET FullPicture = ? WHERE ID = ?");
    $stmt->bind_param("si", $pic, $id);
    $id = $_POST['id'];
    $pic = $main_image_name;
    $stmt->execute();
    move_uploaded_file($main_image_tmp, $main_folder);
}
$stmt = $mysqli->prepare("UPDATE pages1 SET Head = ?, ShortText = ?, ArticleText = ?, NewDate = ? WHERE ID = ?");
$stmt->bind_param("ssssi", $title, $short_text, $full_text, $new_date, $id);
$id = $_POST['id'];
$title = $_POST['title'];
$short_text = $_POST['short_text'];
$full_text = $_POST['full_text'];
$new_date = $_POST['new_date'];  
$stmt->execute();
?>
<p>Новость успешно изменена</p>
<?php
include("footer.php");
?>
