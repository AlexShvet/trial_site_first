<?php
session_start();
$username = mb_convert_encoding($_SESSION["username"]["username"],'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <script src="for_stop_watch.js"></script>
    <link rel="stylesheet" href="style_for_stop_watch.css">
</head>
<body>
    <div id="greeting">Сайт Александра</div><br><div id="greeting">приветствует Вас, <?php echo $username ?>!</div><div class="stop_watch">
    <div id="notice">Что бы обнулить время, нажми сначала кнопку "Пуск"</div>
        
            <div id="zero" onclick="zero()">Обнулить</div>
            <div id="sta" onclick="start()">Пуск</div>
            <div id="pause" onclick="pause()">Пауза</div>
        </div>
            <div class="clock_face">
                <div id="null_min">0</div>
                <div id="minutes">0</div>
                <div id="gap">:</div>
                <div id="null_sec">0</div>
                <div id="seconds">0</div><br>
            </div>
        <div align="center">
            <form method="POST" action="write_result.php">
                <input id="weight" type="number" name="weight" placeholder="    сюда вес (штанги)" required><br>
                <input id="many_times" type="number" name="many_times" placeholder="    тут разы" required><br>
                <input type="submit" value="готово">
            </form>
        </div>
</body>
</html>