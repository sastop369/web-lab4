<?php
include("connect-to-table.php");
session_start();
include("header.php");
$stmt = $mysqli->prepare("SELECT Picture FROM compitition WHERE id = ?");
$stmt->bind_param("i", $id);
$id = $_GET['id'];
$stmt->execute();
$result = $stmt->get_result();
$uploads=array();
$uploads=$result->fetch_assoc();
$head_folder = "./images/photos/" . $uploads['Picture'];
if (file_exists($head_folder))
    unlink($head_folder);
$stmt = $mysqli->prepare("DELETE FROM compitition WHERE ID = ?");
$stmt->bind_param("i", $id);
$id = $_GET['id'];
$stmt->execute();
?>
<p>Заявка отклонена!</p>
<?php
include("footer.php");
?>