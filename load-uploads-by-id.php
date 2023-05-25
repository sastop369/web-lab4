<?php
$stmt = $mysqli->prepare("SELECT * FROM compitition WHERE ID = ?");
$stmt->bind_param("i", $id);
$id = $_GET['ID'];
$stmt->execute();
$res=$stmt->get_result();
$oneUpload=$res->fetch_assoc();
?>