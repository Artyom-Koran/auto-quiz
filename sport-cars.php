<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no>
	<title>Спортивные авто</title>
	<link rel="stylesheet" href="action.css">

</head>
<body>
	<?php
	session_start();

	class cards
	{
	    // объявление свойств
			public $number;
			public $image;
			public $text;
			public $answer_1;
			public $answer_2;
			public $answer_3;
			public $radioV_1;
			public $radioV_2;
			public $radioV_3;

			public function __construct($number, $image, $text, $answer_1, $answer_2, $answer_3, $radioV_1, $radioV_2, $radioV_3){
				$this->number = $number;
        $this->image = $image;
        $this->text = $text;
				$this->answer_1 = $answer_1;
				$this->answer_2 = $answer_2;
				$this->answer_3 = $answer_3;
				$this->radioV_1 = $radioV_1;
				$this->radioV_2 = $radioV_2;
				$this->radioV_3 = $radioV_3;
			}

	}
	// Создание новых объектов(карточек)
	$taskCard_1 = new cards("1/10","img/sport/dodgeV.jpg","Производится в США", "GMC", "Mazda RX-7", "Dodge Viper", "0", "0", "1");
	$taskCard_2 = new cards("2/10","img/sport/subaru_BRZ.jpg","Производится ____", "Toyota Supra A90", "Subaru BRZ", "Alpine A110", "0", "1", "0");
	$taskCard_3 = new cards("3/10", "img/sport/Acura_NSX.jpg", "Производится в Японии", "McLaren 570S", "Acura NSX", "Honda NSX II", "0", "1", "0");
	$taskCard_4 = new cards("4/10", "img/sport/Lamborghini_Murcielago.jpg", "Пришёл на смену Lamborghini Diablo", "Lamborghini Gallardo", "Lamborghini Murcielago", "Lamborghini Reventon", "0", "1", "0");
	$taskCard_5 = new cards("5/10", "img/sport/McLaren_F1.jpg", " Серийная модель гиперкара британской фирмы, с 1998 по 2005 года считался самым быстрым в мире", "Ferrari 550", "Saleen S7", "McLaren F1", "0", "0", "1");
	$taskCard_6 = new cards("6/10", "img/sport/Ford_GT.jpg", "Выпускается с 2006 года ", "Ford GT", "Maserati MC20", "Aston Martin V12 Vantage II", "1", "0", "0");
	$taskCard_7 = new cards("7/10", "img/sport/Koenigsegg_One1.jpg", "Кузов выполнен из углепластика", "Maserati MC20", "Hennessey Venom GT", "Koenigsegg One:1", "0", "0", "1");
	$taskCard_8 = new cards("8/10", "img/sport/Pagani_Huayra.jpg", "Производится в Италии ", "McLaren Senna", "Pagani Huayra", "Ferrari F8", "0", "1", "0");
	$taskCard_9 = new cards("9/10", "img/sport/Lotus_Exige_III.jpg", "Производится в Британии ", "Lotus Exige III", "Alpine A110 II", "Lexus LC I", "1", "0", "0");
	$taskCard_10 = new cards("10/10", "img/sport/Aston_Martin_Vanquish_II.jpg", "Родстер S-класса", "Aston Martin Vanquish II", "Porsche 918 Spyder", "Ferrari 458", "1", "0", "0");


	$cards_ar = array(
			"1" => $taskCard_1,
			"2" => $taskCard_2,
			"3" => $taskCard_3,
			"4" => $taskCard_4,
			"5" => $taskCard_5,
			"6" => $taskCard_6,
			"7" => $taskCard_7,
			"8" => $taskCard_8,
			"9" => $taskCard_9,
			"10" => $taskCard_10
	);


	// Текущий объект
	$tCard_now = $cards_ar[$_SESSION['correct']];

//	var_dump($_SESSION['correct']);
//	var_dump($_SESSION['send_variant']);

?>
	<div class="Mode">
    	<b>Спортивные авто</b>
	</div>

<article>
	<div class='menu'>
		<a href="index.php">Сдаюсь</a>
		<span class="help help_1">Страхование ответа</span>
		<span class="help help_2">Убрать вариант</span>
	</div>

  <div class='task'>
		<p class='numberOfTask' id='p1'></p>
		<img class="image" id="image" src="<?= $tCard_now->image;  ?>">
  </div>

  <div class='variants'>
	 <form class="form1" action="action.php" method="POST" name="radioForm" id="radioForm">
		<p class="textOfTask"><?= $tCard_now->text?></p>
		 <input type="radio" class="variant" name='variant' id='radio1' value='<?= $tCard_now->radioV_1; ?>'> <label for='radio1' class='label_1'><?= $tCard_now->answer_1 ?></label><br>
		 <input type="radio" class="variant" name='variant' id='radio2' value='<?= $tCard_now->radioV_2; ?>'> <label for='radio2' class='label_2'><?= $tCard_now->answer_2 ?> </label> <br>
		 <input type="radio" class="variant" name='variant' id='radio3' value='<?= $tCard_now->radioV_3; ?>'> <label for='radio3' class='label_3'><?= $tCard_now->answer_3 ?> </label> <br>

<input type="submit" value="Ответить" class='button'>

		</form>
		</ul>
   </div>
</article>

<div class="clearFix"></div>

<?php

?>

</body>
</html>
