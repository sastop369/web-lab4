<?php
include("connect-to-table.php");
session_start();
include("header.php");
$stmt = $mysqli->prepare("UPDATE compitition SET Accept = ? WHERE ID = ?");
$stmt->bind_param("si", $accept, $id);
$id = $_GET['id'];
$accept = true;  
$stmt->execute();
?>
<p>Заявка принята!</p>
<?php
include("footer.php");
?>
