<?php
$link = mysqli_connect("localhost","q96078vm_reg","Qwerty6622","q96078vm_reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$drop_table = $_GET['drop_table'];
mysqli_query($link,"DROP TABLE `$drop_table`");
Header("Location: admin.php");
mysqli_close($link);
?>