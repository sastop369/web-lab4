<?php
$stmt = $mysqli->prepare("SELECT * FROM compitition ORDER BY Vote DESC LIMIT $from, $num");
$stmt->execute();
$uploads=array();
$res=$stmt->get_result();
while($row=$res->fetch_assoc())
    $uploads[]=$row;
?>