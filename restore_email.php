<?php
session_start();
if(isset($_POST["submit"])){
$email = htmlspecialchars($_POST["email"]);
$text_of_letter = "Ваш новый пароль";
mail($email, "восстановление пароля", $text_of_letter, "From: itsdasv@yandex.com");
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/style_for_stop_watch.css">
    <title>восстановление пароля</title>
</head>
<body>
    <form name="restore_email" action="" method="POST">
        <input type="email"  maxlenght="20" name="email" placeholder="это для почты" required><br><br>
        <input type="submit" name="submit" value="готово">
    </form>
</body>
</html>