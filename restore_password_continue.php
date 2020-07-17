<?php
session_start();
$login = $_SESSION["login"];
if(isset($_POST["submit"])){
    if($_POST["password_one"] === $_POST["password_two"]){
        $password = $_POST['password_one'];
        $link = mysqli_connect("localhost","q96078vm_reg","Qwerty6622","q96078vm_reg");
            if (mysqli_connect_errno()) {
                printf("Соединение не удалось: %s\n", mysqli_connect_error());
                exit();
            }
            $chek = mysqli_query($link,"SELECT * FROM reg_for_stopwatch WHERE (`login` = '$login') LIMIT 1")->fetch_assoc();
            mysqli_query($link,"UPDATE reg_for_stopwatch SET `password` = '$password' WHERE `login` = '$login';");

            mysqli_close($link);
    } else answer();
};
function answer(){
    echo "<p>пароли не совпадают, надо перебдеть и впечатать их заново.</p>";
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
    <form name="restore_password" action="" method="POST">
        <input type="password"  maxlenght="20" name="password_one" placeholder="новый пароль" required><br><br>
        <input type="password" name="password_two" placeholder="новый пароль">
        <input type="submit" name="submit" value="готово">
    </form>
</body>
</html>