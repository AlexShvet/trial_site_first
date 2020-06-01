<?php
$link = mysqli_connect("localhost","q96078vm_reg","Qwerty6622","q96078vm_reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
mysqli_query($link,"DELETE FROM `reg_for_stopwatch` WHERE id>1") ;
mysqli_query($link,"ALTER TABLE `reg_for_stopwatch` AUTO_INCREMENT=1;");
mysqli_close($link);
$a = true;
Header("Location: admin.php");
?>