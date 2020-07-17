<?php
session_start();
if(isset($_POST["submit"])){
$email = htmlspecialchars($_POST["email"]);
$text_of_letter = "Ваш новый пароль";
$header_of_lether = "восстановление пароля";
mail($email, $header_of_lether, $text_of_letter);
unset($_POST["email"]);
header("Location: restore_password_continue.php");
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>восстановление пароля</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/style_for_stop_watch.css">
</head>
<body>
    <form name="restore_email" action="" method="POST">
        <input type="email"  maxlenght="20" name="email" placeholder="это для почты" required><br><br>
        <input type="submit" name="submit" value="готово">
    </form>
</body>
</html>