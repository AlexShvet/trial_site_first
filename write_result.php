<?php
$link = mysqli_connect("localhost","root","","reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$name_table = "write_result_".$_POST["login"];//пока не работает, надо про сессию читать и сюда попробовать прикрутить
$weight = htmlspecialchars($_POST["weight"]);
$many_times = htmlspecialchars($_POST["many_times"]);
$date_time = htmlspecialchars($_POST["date_times"]);
$b = mysqli_query($link,"INSERT INTO $name_table (`weight`,`many_times`,`date_time`) VALUES ('$weight','$many_times',`$date_time`);");
mysqli_close($link);
var_dump($_SESSION);
?>