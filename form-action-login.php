<?php
include("connect-to-table.php");
session_start();
include("header.php");
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
?>
 <p>Неверный логин или пароль</p>
<?php    
}
else
{
?>
<p>Успешный вход в учетную запись</p>
<?php    
    $_SESSION["userName"]=$login["Name"];
    if($login["Mode"]==1)
        $_SESSION["Admin"]=true;
}
include("footer.php");
?>



