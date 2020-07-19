<?php
session_start();
$login = $_SESSION["login"];
if(isset($_POST["submit"])){
    $password_one = htmlspecialchars($_POST["password_one"]);
    $password_two = htmlspecialchars($_POST["password_two"]);
    if($password_one === $password_two){
        $password = md5($password_one);
        $link = mysqli_connect("localhost","q96078vm_reg","Qwerty6622","q96078vm_reg");
            if (mysqli_connect_errno()) {
                printf("Соединение не удалось: %s\n", mysqli_connect_error());
                exit();
            }
            $last_password = mysqli_query($link,"SELECT password FROM reg_for_stopwatch WHERE login = '$login';")->fetch_assoc();//берем старый пароль из БД
            $check = mysqli_query($link,"SELECT * FROM reg_for_stopwatch WHERE (`login` = '$login') LIMIT 1")->fetch_assoc();
            if($check["login"] == $login){//проверка того ли человека меняем пароль по логину 
                mysqli_query($link,"UPDATE reg_for_stopwatch SET `password` = '$password' WHERE `login` = '$login';");//смена поля пароля на новый пароль
            }
            $new_password = mysqli_query($link,"SELECT password FROM reg_for_stopwatch WHERE login = '$login';")->fetch_assoc();//после того как записали новый пароль берем снова пароль из БД что б потом его сравнить
            if($last_password !== $new_password){//сравниваем старый пароль и тот который теперь в БД
                echo "<br><p>пароль сменился успешно</p><p>Жми на \"Вернуться...\"</p>";
            }
            mysqli_close($link);
    } else answer();
};
function answer(){
    echo "<br><p>пароли не совпадают, надо перебдеть и впечатать их заново.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>восстановление пароля</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel='stylesheet' href='styles/style.css'>
    <link rel="stylesheet" href="styles/style_for_stop_watch.css">
</head>
<body>
    <form name="restore_password_continue" action="" method="POST">
        <br><br>
        <input type="password"  maxlenght="20" name="password_one" placeholder="новый пароль" required><br><br>
        <input type="password" name="password_two" placeholder="новый пароль"><br><br>
        <input type="submit" name="submit" value="готово"><br><br>
        <a href="stop_watch.php">Вернуться на основную стр.</a>
    </form>
</body>
</html>

