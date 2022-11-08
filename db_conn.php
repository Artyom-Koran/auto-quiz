<?php
// Подключение к базе данных
$link = mysqli_connect("localhost", "h165776_root", "ratsOntheLAW59Getushka", "h165776_auto-quiz_bd");


// Локалка: $link = mysqli_connect("localhost", "root", "", "auto-quiz_db");

// Проверка подключения

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}



?>
