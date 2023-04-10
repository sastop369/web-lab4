<?php
include("connect-to-table.php");
session_start();
include("header.php");
$stmt = $mysqli->prepare("SELECT HeadPicture, FullPicture FROM pages1 WHERE id = ?");
$stmt->bind_param("i", $id);
$id = $_POST['id'];
$stmt->execute();
$result = $stmt->get_result();
$news=array();
$news=$result->fetch_assoc();
$head_folder = "./images/headers/" . $news['HeadPicture'];
if (file_exists($head_folder))
    unlink($head_folder);
$main_folder = "./images/articles/" . $news['FullPicture'];
if (file_exists($main_folder))
    unlink($main_folder);
$stmt = $mysqli->prepare("DELETE FROM pages1 WHERE ID = ?");
$stmt->bind_param("i", $id);
$id = $_POST['id'];
$stmt->execute();
?>
<p>Новость успешно удалена</p>
<?php
include("footer.php");
?>