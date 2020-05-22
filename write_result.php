<?php
session_start();
$link = mysqli_connect("localhost","root","","reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$login = $_SESSION["login"];
$name_table = "write_result_".$login;
$weight = htmlspecialchars($_POST["weight"]);
$many_times = htmlspecialchars($_POST["many_times"]);
$b = mysqli_query($link,"INSERT INTO $name_table (`weight`,`many_times`,`date_time`) VALUES ('$weight','$many_times',NOW());");
Header ('Location: stop_watch.php');
mysqli_close($link);
?>