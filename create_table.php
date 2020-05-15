<?php
$link = mysqli_connect("localhost","root","","reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$name_table = "write_result".$_POST["login"];
$create_table = $_GET['create_table'];
mysqli_query($link,"CREATE TABLE `$create_table` (id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(20), login VARCHAR(20), password VARCHAR(32));");
Header("Location: admin.php");
$create_table_for_write_result = $_GET['create_table_for_write_result'].$_POST["login"];
mysqli_query($link,"CREATE TABLE `$create_table_for_write_result` (id INT PRIMARY KEY AUTO_INCREMENT, weight VARCHAR(50), many_times VARCHAR(50), date_time VARCHAR(50));");
Header("Location: admin.php");
mysqli_close($link);
?>