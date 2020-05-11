<?php
print_r($login);
$link = mysqli_connect("localhost","root","","reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST["submit"])){
    $username = htmlspecialchars($_POST["username"]);
    $login = htmlspecialchars($_POST["login"]);
    $password = md5($_POST["password"]);
    $preg = $_POST["username"].$_POST["login"].$_POST["password"];
    $chek_exist = mysqli_query($link,"SELECT * FROM reg_for_stopwatch WHERE (`login` = '$login' AND `password` = '$password') LIMIT 1")->fetch_assoc();
    if (isset($chek_exist)) {
        echo" <br><br>такой пользователь уже есть";
    } else reg_and_write($link,$username,$login,$password);
}
function reg_and_write($link,$username,$login,$password){
    Header("Location: stop_watch.html");
    $b = mysqli_query($link,"INSERT INTO reg_for_stopwatch (`username`,`login`,`password`) VALUES ('$username','$login','$password');");
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логин</title>
</head>
<body>
    <form name="registration" action="" method="POST" align="center">
        <br><br>
        <h2>Регаемся</h2>
        <span>Введите имя, логин и пароль</span><br><br>
        <input type="text" maxlenght="50" name="username" placeholder="сюда имя" required><br><br>
        <input type="text"  maxlenght="20" name="login" placeholder="тут логин" required><br><br>
        <input type="text" maxlenght="20" name="password" placeholder="здесь пароль" required><br><br>
        <input name="submit" type="submit" value="готово">
        <input type="reset" value="очистить поля формы">
    </form>
</body>
</html>