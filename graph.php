<?php
session_start();
$link = mysqli_connect("localhost","q96078vm_reg","Qwerty6622","q96078vm_reg");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
$username = mb_convert_encoding($_SESSION["username"]["username"],'UTF-8');
$username = 'write_result_'.$username;
$data = mysqli_query($link,"SELECT * FROM $username")->fetch_all();
//echo is_array($username) ? 'yes' : 'no';
/*$lenght = count($data);
for ($i=0; $i<$lenght; $i++) {
    $result .= '$result_'.$i.', ';}
    $result .= '$result_'.$i;*/
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>
<body>
    <div class='table'><div class="first"></div></div>
    
    <pre><p><?php print_r($data); ?></pre>
    <script>
    function create_column(height) {
        var table = document.getElementsByClassName('first')[0];
        var width = "10px";
        var coord_width = 'width: ' + width;
        var coord_height = 'height: '+ height + "px";
        var element = "<div class='column' style= '"+ coord_width + "; " + coord_height +"'></div>";
        table.insertAdjacentHTML('afterend',element);
    }
</script>

</body>
</html>
<?php
foreach ($data as $temporary){
    $height = $temporary[1]*$temporary[2];
    echo "<script>create_column('$height');</script>";
}
?>


<script>/*
var table = document.getElementsByClassName('table')[0];
var width = "10px";
var height = "100px";
var coord_width = 'width: ' + width;
var coord_height = 'height: '+ height;
var element = "<div class='column' style= '"+ coord_width + "; " + coord_height +"'></div>";
table.innerHTML = element;*/
</script>