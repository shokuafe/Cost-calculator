<?php
require_once 'connection.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));

    $result = mysqli_query("SELECT * FROM `tur`.`access`");

    $login= $_POST["login"];
    $passworld = $_POST["passworld"];

    if (isset($_POST["login"]) && ($_POST["password"])){
        echo "thanks for data!";
        echo $result;
        user_data_check($_POST["login"], $_POST["password"]);
    }

    function user_data_check($login, $password){
        $arr= ["Rita"=> "5050", "Nick" => "6666", "Vova" => "999"];
        foreach ($arr as $key => $val){
            if ($key == $login){
                echo $key . "проверка пройдена";;
            }
        }
    }
// закрываем подключение
mysqli_close($link);
?>
