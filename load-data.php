<?php
$stmt = $mysqli->prepare("SELECT * FROM pages1 ORDER BY NewDate DESC LIMIT $from, $num");
$stmt->execute();
$news=array();
$res=$stmt->get_result();
while($row=$res->fetch_assoc())
    $news[]=$row;
?>