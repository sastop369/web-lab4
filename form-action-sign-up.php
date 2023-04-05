<?php
include("connect-to-users.php");
session_start();
$stmt = $mysqli->prepare("SELECT * FROM users_info WHERE Name = ?");
$stmt->bind_param("s", $user_name);
$user_name = $_POST['user_name'];
$stmt->execute();
$logins=array();
$res=$stmt->get_result();
while($row=$res->fetch_assoc())
    $logins[]=$row;
if (empty($logins))
{
    echo "in if";
    $stmt = $mysqli->prepare("INSERT INTO users_info ( Name, Password ) VALUES (?, ?)");
    echo "Prepared";
    /* Подготовленный запрос, шаг 2: связывание и выполнение */
    $stmt->bind_param("ss", $user_name, $password);
    $user_name = $_POST['user_name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  
    $stmt->execute();
    header("Location: "."./index.php");
}
else
{
$_SESSION['log_error'] = true;
    header("Location: "."./sign-up-form.php");
}
?>