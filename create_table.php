<?php
$link = mysqli_connect("localhost","root","","reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$create_table = $_GET['create_table'];
mysqli_query($link,"CREATE TABLE `$create_table` (id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(20), login VARCHAR(20), password VARCHAR(32));");
Header("Location: admin.php");
mysqli_close($link);
?>