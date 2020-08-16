<?php
session_start();
$username = mb_convert_encoding($_SESSION["username"]["username"],'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Секундомер</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <script src="Javascripts/for_stop_watch.js"></script>
    <script type="text/javascript" src="Javascripts/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Javascripts/fortune.js" defer></script>
    <link rel="stylesheet" href="styles/style_for_stop_watch.css">
</head>
<body>
    <div class="menu">
        <input type="button" value="Меню">
        <input type="text" class="input_name" placeholder="Пишите сюда Ваши инициалы" size="25" maxlength="5">
        <div class="answer_fortune_js"></div>
    </div>
    <div id="greeting">Доброго времени</div><br><div id="greeting">суток, <?php echo $username ?>!</div><div class="stop_watch">
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
                <input id="weight" type="number" name="weight" placeholder="  сюда вес (штанги)" required><br>
                <input id="many_times" type="number" name="many_times" placeholder="  тут разы" required><br>
                <input type="submit" value="готово"><br><br>
                <a href="graph.php">Глянуть график</a>
            </form>
        </div>
</body>
</html>