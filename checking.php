<?php
session_start();
$link = mysqli_connect("localhost","q96078vm_reg","Qwerty6622","q96078vm_reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$login = htmlspecialchars($_POST["login"]);
$password = md5($_POST["password"]);
$admin = md5('admin');

//$_SESSION['username'] = mysqli_query($link,"SELECT username FROM reg_for_stopwatch WHERE (`login` = '$login')")->fetch_assoc();
$chek_exist = mysqli_query($link,"SELECT * FROM reg_for_stopwatch WHERE (`login` = '$login' AND `password` = '$password') LIMIT 1")->fetch_assoc();
if (isset($chek_exist) && $login !== 'admin' ) {
        $_SESSION["login"] = $login;
        Header("Location: stop_watch.php");
} else if($login == 'admin' && $password == $admin){
        Header("Location: admin/admin.php");
    } else Header("Location: registration.php");
mysqli_close($link);
?>