<?php
include("connect-to-table.php");
session_start();
include("header.php");
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
    $stmt = $mysqli->prepare("INSERT INTO users_info ( Name, Password ) VALUES (?, ?)");
    /* Подготовленный запрос, шаг 2: связывание и выполнение */
    $stmt->bind_param("ss", $user_name, $password);
    $user_name = $_POST['user_name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  
    $stmt->execute();
?>
    <p>Регистрация прошла успешно</p>
<?php   
}
else
{
    ?>
    <p>Данное имя пользователя уже занято</p>
    <?php   
}
include("footer.php");
?>
