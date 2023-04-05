<?php
include("connect-to-users.php");
session_start();
$stmt = $mysqli->prepare("SELECT * FROM users_info WHERE Name = ?");
$stmt->bind_param("s", $user_name);
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$stmt->execute();
$login=array();
$res=$stmt->get_result();
$login=$res->fetch_assoc();
if (empty($login) || !password_verify($password, $login["Password"]))
{
    $_SESSION['log_error'] = true;
    header("Location: "."./login-form.php");
}
else
{
    echo "verified";
    $_SESSION["userName"]=$login["Name"];
    if($login["Mode"]==1)
        $_SESSION["Admin"]=true;
    header("Location: "."./index.php");
}
?>

