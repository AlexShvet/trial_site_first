<?php
var_dump($_GET['drop_table']);
/*
mysqli_query($link,"DROP TABLE reg_for_stopwatch");
mysqli_query($link,"CREATE TABLE reg_for_stopwatch (id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(20), login VARCHAR(20), password VARCHAR(32));");
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
</head>
<body>
    <a href="clear_all_members.php">Стереть всех зареганых(кроме админа(id == 1))</a><br><br>
    <a href="main_stop_watch.php">Перейти на main_stop_watch.php</a><br><br>
    <form method="get">
        <input name="drop_table" size="50" placeholder="Удалить таблицу с именем..."><a href="drop table.php"></a>
    </form><br><br>
        
    </form>
</body>
</html>