<?php
header("Access-Control-Allow-Origin: * ");//это что б не выскакивала ошибка поскольку браузеру запрещено отправлять на стр без этого заголовка
$name = $_POST["name"];//это берется из ajax(data:"тут че надо передавать")
$blank_rus = array("а","б","в","г","д","е","ё","ж","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ч","ш","щ","ъ","ы","ь","э","ю","я");
$blank_eng = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$pattern = "/".$name."/";
$pattern_wrong_simbols = "/^[a-zA-Zа-яА-Я]/";
$pattern_language = "/[a-zA-Z]/";
$counter = 1;
$lenght_name = mb_strlen($name,"UTF-8");//возвращает кол-во символов в строке учитывая кодировку. Длина строки не обязательно будет соответствовать количеству байт в ней.
$check_language = preg_match($pattern_language,$name);
$wrong_simbols = preg_match($pattern_wrong_simbols,$name);
if($check_language == true){
    $lang = 25;
    $blank = $blank_eng;
} else {
    $lang = 32;
    $blank = $blank_rus;
}
function generate($blank,$lenght_name,$pattern,$name,$counter,$lang){
    for($j = 1; $j <= $lenght_name; $j++){//делаем
        $number = mt_rand(0,$lang);//рандомный
        $array_key[] .= $number;//массив
    }
    for($i = 0; $i < $lenght_name; $i++){//делаем
        $arr .= $blank[$array_key[$i]];//из алфавита строку по рандомным ключам, которые сгенерировал пред. for
    }
    if(preg_match($pattern,$arr)){//проверяем введенное имя с получившейся рандомно строкой
        $res1 = "<span>совпадение с ".$counter." попытки</span>";
        if($counter <= 10000){
            $res2 = "<br><span>вам сегодня везет</span>";
            $res = $res1.$res2;
            echo $res;
        } elseif($counter > 10000){
            $res2 = "<br><span>вам сегодня не везет</span>";
            $res = $res1.$res2;
            echo $res;
        }
    } else {
        $counter++;
        if($counter <= 100000){
            generate($blank,$lenght_name,$pattern,$name,$counter,$lang);
        } else echo "<span>Попыток генерации целых сто тыщь безрезультатно</span><br><span>Вам сегодня крайне не везёт</span>";
        }
}
if($lenght_name <= 3){
    if($wrong_simbols === 0){
        echo "<span>надо только буквы</span>";
    } else generate($blank,$lenght_name,$pattern,$name,$counter,$lang);
} else echo "<span>надо три или меньше буквы</span><br><span>Обновите стр.</span>";

?>