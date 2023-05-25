<?php
$stmt = $mysqli->prepare("SELECT * FROM results");
$stmt->execute();
$results=array();
$res=$stmt->get_result();
while($row=$res->fetch_assoc())
    $results[]=$row;
?>