<?php
// Подключение к базе данных на хосте
$link = mysqli_connect("localhost", "h165931_root", "ratsOntheLAW59Getushka", "h165931_auto-quiz_db");

// Локалка:
//$link = mysqli_connect("localhost", "root", "", "auto-quiz_db");

// Проверка подключения
/*
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}
*/


?>
