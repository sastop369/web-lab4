<?php
include("connect-to-table.php");
session_start();
include("header.php");
$stmt = $mysqli->prepare("SELECT * FROM voted_users WHERE Login = ?");
$stmt->bind_param("s", $user_name);
$user_name = $_GET['login'];
$stmt->execute();
$login=array();
$res=$stmt->get_result();
$login=$res->fetch_assoc();
if (empty($login))
{
    $stmt = $mysqli->prepare("SELECT Vote FROM compitition WHERE id = ?");
    $stmt->bind_param("i", $id);
    $id = $_GET['id'];
    $stmt->execute();
    $result = $stmt->get_result();
    $uploads=array();
    $uploads=$result->fetch_assoc();
    $stmt = $mysqli->prepare("UPDATE compitition SET Vote = ? WHERE ID = ?");
    $stmt->bind_param("ii", $vote, $id);
    $id = $_GET['id'];
    $vote = $uploads["Vote"] + 1;  
    $stmt->execute();
    $stmt = $mysqli->prepare("INSERT INTO voted_users (Login) VALUES (?)");
    $stmt->bind_param("s", $user_name);
    $user_name = $_GET['login'];
    $stmt->execute();
?>
    <p>Вас голос учтен!</p>
<?php    
}
else { ?>
<p>Вы не можете больше голосовать!</p>
<?php }

include("footer.php");
?>



