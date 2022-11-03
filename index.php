<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no>
	<title>Авто-викторина</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1>Авто-викторина</h1></header>
<h2>Выбрать режим:</h2>
<ul class="list-1">
 <li class="list_element_1"><a href="sport-cars.php">Спортивные авто</a></li>
 <li class="list_element_2"><a href="classic-cars.php">Классические авто</a></li>
 <li class="list_element_3"><a href="sedans.php">Современные Седаны</a></li>
</ul>

<?php
// Костыль для удаления результатов между режимами
session_start();
session_destroy();

 ?>

<address>
Контакты: ar3yom96@mail.ru <br>
<a href="http://github.com/Artyom-Koran">GitHub</a>
</address>
</body>
</html>
