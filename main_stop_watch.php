<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_for_stop_watch.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="Javascripts/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Javascripts/fortune.js" defer></script>
    <title>Вход</title>
</head>
<body>
    <?php echo "<br>".$_SESSION["message"]; ?>
    <?php unset($_SESSION["message"]); ?>
    <?php include_once("menu.php"); ?>
    <form name="authorization" action="checking.php" method="post">
        <br><br>
        <h2>Вход</h2>
        <br><br>
        <input type="text"  maxlength="20" name="login" placeholder="логин сюда" requored><br><br>
        <input type="text"  maxlength="20" name="password" placeholder="пароль здесь" required><br><br>
        <input type="submit" value="готово">
    </form>
    <br>
    <form action="registration.php"><button>Перейти к регистрации</button></form>
</body>
</html>