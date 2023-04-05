<?php
include("connect-to-table.php");

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

$stmt = $mysqli->prepare("DELETE FROM pages1 WHERE ID = ?");
$stmt->bind_param("i", $id);
$id = $_POST['id'];
$stmt->execute();
header("Location: "."./index.php");
?>