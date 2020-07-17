<?php
session_start();
$link = mysqli_connect("localhost","q96078vm_reg","Qwerty6622","q96078vm_reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$username = mb_convert_encoding($_SESSION["username"]["username"],'UTF-8');
$username = 'write_result_'.$username;
$limit = 10;
$data = mysqli_query($link,"SELECT * FROM $username LIMIT $limit")->fetch_all();
$array_temp = [];
foreach ($data as $temporary){
    $element = $temporary[1]*$temporary[2];//берем только нужные элементы вес*разы
    array_push($array_temp,$element);
}
$max_num = max($array_temp);//берем макс число для определения масштаба в графике
$scale = 700/$max_num;//700 это высота графика в css/.table/height
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel='stylesheet' href='styles/style.css'>
    <link rel="stylesheet" href="styles/style_for_stop_watch.css">
</head>
<body>
    <div class='table'><div class="first"></div></div><a href="stop_watch.php">Назад</a>
    <script>
    function create_column(height) {
        var table = document.getElementsByClassName('first')[0];
        var width = "40px";
        var coord_width = 'width: ' + width;
        var coord_height = 'height: '+ height + "px";
        var element = "<div class='column' style= '"+ coord_width + "; " + coord_height +"'></div>";
        table.insertAdjacentHTML('afterend',element);
    }
    </script>
<?php
foreach ($array_temp as $height){
    $height = $height*$scale;
    echo "<script>create_column('$height');</script>";
}
?>
</body>
</html>