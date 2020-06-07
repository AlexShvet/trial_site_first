<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логин</title>
</head>
<body>
    <?php echo "<br>".$_SESSION["message"]; ?>
    <?php unset($_SESSION["message"]); ?>
    <form name="authorization" action="checking.php" method="post" align="center">
        <br><br>
        <h2>Вход</h2>
        <br><br>
        <input type="text"  maxlenght="20" name="login" placeholder="логин сюда" requored><br><br>
        <input type="text"  maxlenght="20" name="password" placeholder="пароль здесь" required><br><br>
        <input type="submit" value="готово">
    </form>
    <br>
    <form action="registration.php" align="center"><button>Перейти к регистрации</button></form>
</body>
</html>