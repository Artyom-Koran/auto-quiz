<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no>
	<title>Авто-викторина</title>

	<link rel="stylesheet" href="style.css">

</head>
<body>
<header><h1>Выбрать режим авто-викторины:</h1></header>
<ul class="list-1">
 <li class="list_element_1"><a href="sport-cars.php">Спортивные авто</a></li>
 <li class="list_element_2"><a href="classic-cars.php">Классические авто</a></li>
 <li class="list_element_3"><a href="">Седаны(в разработке)</a></li>
</ul>

<?php
// Костыль для удаления результатов между режимами
session_start();
session_destroy();

 ?>


</body>
</html>
