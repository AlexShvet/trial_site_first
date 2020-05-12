<?php
$link = mysqli_connect("localhost","root","","reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

$weight = htmlspecialchars($_POST["weight"]);
$many_times = htmlspecialchars($_POST["many_times"]);
$b = mysqli_query($link,"INSERT INTO `write_result` +login (`weight`,`many_times`) VALUES ('$weight','$many_times');");
mysqli_close($link);
?>