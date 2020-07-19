<?php
session_start();
$link = mysqli_connect("localhost","q96078vm_reg","Qwerty6622","q96078vm_reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST["submit_reg"])){
    $username = htmlspecialchars($_POST["username"]);
    $login = htmlspecialchars($_POST["login"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = md5($_POST["password"]);
    $chek_exist = mysqli_query($link,"SELECT * FROM reg_for_stopwatch WHERE (`login` = '$login' AND `password` = '$password') LIMIT 1")->fetch_assoc();
    $_SESSION["username"]["username"] = $username;
    $_SESSION["login"] = $login;
    if (isset($chek_exist)) {
        $_SESSION["username"]["username"] = $username;
        $_SESSION["login"] = $login;
        $_SESSION["message"] = "<p>Такой пользователь уже есть</p>";
        Header("Location: main_stop_watch.php");
    } else reg_and_write($link,$username,$login,$password,$email);
}
if(isset($_POST["submit_res"])){
    send_email();
    Header("Location: restore_password_continue.php");
}
function send_email(){
        $email = htmlspecialchars($_POST["email"]);
        $text_of_letter = "Ваш новый пароль";
        $header_of_lether = "восстановление пароля";
        mail($email, $header_of_lether, $text_of_letter);
        unset($_POST["email"]);
    }
function reg_and_write($link,$username,$login,$password,$email){
    mysqli_query($link,"INSERT INTO reg_for_stopwatch (`username`,`login`,`password`,`email`) VALUES ('$username','$login','$password','$email');");
    $create_table_for_write_result = 'write_result_'.$login;
    mysqli_query($link,"CREATE TABLE `$create_table_for_write_result` (id INT PRIMARY KEY AUTO_INCREMENT, weight VARCHAR(50), many_times VARCHAR(50), date_time DATETIME);");
    Header("Location: stop_watch.php");
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/style_for_stop_watch.css">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Логин</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><!-- от гуглсервера--> 
    <script type="text/javascript" src="for_registration.js"></script>
</head>
<body>
    <form name="registration" action="" method="POST" >
        <br><br>
        <h2>Регаемся</h2>
        <span>Введите имя, логин и пароль</span><br><br>
        <input type="text" maxlenght="50" name="username" placeholder="сюда имя" required><br><br>
        <input type="text"  maxlenght="20" name="login" placeholder="тут логин" required><br><br>
        <input type="text" maxlenght="20" name="password" placeholder="здесь пароль" required><br><br>
        <input type="email"  maxlenght="20" name="email" placeholder="это для почты" required><br><br>
        <input type="submit" name="submit_reg" value="готово"><br><br>
        <input type="reset" value=" очистить поля формы ">
        <input type="button" class="forgot_pass" value=" жми, если забыл пароль "><br><br>
    </form>
    <form name="restore_password" action="" method="POST" >
        <br><br>
        <span>Введите почту на которую придёт пароль для восстановления</span><br><br>
        <input class="restore_password" type="email"  maxlenght="20" name="restore_email" placeholder="это для почты" required><br><br>
        <input class="restore_password" type="submit" name="submit_res" value="готово"><br><br>
    </form>
</body>
</html>