<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no>
	<title>Классические авто</title>
	<link rel="stylesheet" href="action.css">

</head>
<body>
	<?php
	session_start();

	class cards {
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
	$taskCard_1 = new cards("1/10", "img/classic/gaz_edited.jpg", "Седан F-класса, автомат. Двигатель мощностью 195 л. с.", "Cadillac Series 62", "ГАЗ 13 &#34Чайка&#34", "ГАЗ 21 &#34Волга&#34", "0", "1", "0");
	$taskCard_2 = new cards("2/10", "img/classic/Cadillac_Fleetwood.jpg","США, выпускался с 1956 по 1976 г.", "Cadillac Fleetwood 75", "Lincoln Premiere", "Chevrolet Bel Air II", "1", "0", "0");
	$taskCard_3 = new cards("3/10", "img/classic/Honda_Accord_I.jpg","Япония, выпускается с 1976 г. - по сегодня", "Mazda 616", "Toyota Carina II", "Honda Accord I", "0", "0", "1");
	$taskCard_4 = new cards("4/10", "img/classic/Jaguar_E-type_Series_3.jpg","Также выпускалась версия без крыши", "Jaguar E-type Series 3", "Lamborghini 350/400 GT", "Ferrari 250 GTO I", "1", "0", "0");
	$taskCard_5 = new cards("5/10", "img/classic/Chevrolet_Impala_IV.jpg","Выпускался в США", "Buick Riviera II", "Ford Torino II", "Chevrolet Impala IV", "0", "0", "1");
	$taskCard_6 = new cards("6/10", "img/classic/Lamborghini_Miura.jpg","Выпускался с 1966 по 1973 г.", "Maserati Merak", "Ferrari 512 BB", "Lamborghini Miura", "0", "0", "1");
	$taskCard_7 = new cards("7/10", "img/classic/Chevrolet_Corvette_C2.jpg","Достаточно узнаваемая модель", "Chevrolet Corvette C2", "Ferrari 250 GTO I", "Maserati Mexico", "1", "0", "0");
	$taskCard_8 = new cards("8/10", "img/classic/Porsche_928.jpg","Выпускался с 1977 по 1995 г.", "Porsche 928", "Lotus Esprit V", "Mazda RX-7 FD", "1", "0", "0");
	$taskCard_9 = new cards("9/10", "img/classic/Nissan_Skyline_VIII.jpg","Автомобиль из Японии(как, впрочем, и другие варианты)", "Honda Legend II", "Subaru Impreza I", "Nissan Skyline VIII", "0", "0", "1");
	$taskCard_10 = new cards("10/10", "img/classic/BMW_E9.jpg","Выпускался с 1968 по 1975 г.", "Puma GTB", "BMW E9", "Citroen SM", "0", "1", "0");


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

	// Условия для загрузки первой карточки
	 if($_SESSION['change'] == 0){
			$_SESSION['change'] = 1;
			$_SESSION['button_hide_con'] = "hidden";
	    $_SESSION['button_class_ans'] = "button";
	 }


	// Текущий объект
	$tCard_now = $cards_ar[$_SESSION['change']];

	// Отдельная переменная для замены текста при правильном ответе
	$text_area = $tCard_now->text;

	// Если ответ правильный, то заменяется текст в карточке
	if($_SESSION["right"] == 1){
		$text_area = "Правильно!";
		$_SESSION["right"] = 0;
	}	elseif($_SESSION["right"] === false){
		$text_area = "Неправильно!";

	}


?>

<div id="flex-container">
	<div class='main'>
		<a href="index.php">Главная</a>
	</div>
	<div class="mode">
		<b>Классические авто</b>
	</div>
	<div class="reButton">
		<form action="action.php" method="POST">
			<input class="reButton" type="submit" name="reButton" id="reButton" value="Начать заново">
		</form>
	</div>
</div>

			<?php
				// Финал, резултаты
				if($_SESSION['hidden'] == "hidden"){
					echo "<H2>" . "Результат: " . $_SESSION['correct_count'] . "/10" . "</H2>";
				}
			?>
<article <?= $_SESSION["hidden"]; ?>>

  <div class='task'>
		<p class='numberOfTask' id='p1'><?= $tCard_now->number; ?></p>
		<img class="image" id="image" src="<?= $tCard_now->image; ?>">
  </div>

  <div class='variants'>
	 <form class="form1" action="action.php" method="POST" name="radioForm" id="radioForm">
		<p class="textOfTask"><?= $text_area ?></p>
		 <input type="radio" checked <?= $_SESSION['disabled'] ?> class="variant <?= $_SESSION['green_light']; ?>" name='variant' id='radio1' value='<?= $tCard_now->radioV_1; ?>'> <label for='radio1' class='label_1'><?= $tCard_now->answer_1 ?></label><br>
		 <input type="radio" <?= $_SESSION['disabled'] ?> class="variant <?= $_SESSION['green_light']; ?>" name='variant' id='radio2' value='<?= $tCard_now->radioV_2; ?>'> <label for='radio2' class='label_2'><?= $tCard_now->answer_2 ?> </label> <br>
		 <input type="radio" <?= $_SESSION['disabled'] ?> class="variant <?= $_SESSION['green_light'];?>" name='variant' id='radio3' value='<?= $tCard_now->radioV_3; ?>'> <label for='radio3' class='label_3'><?= $tCard_now->answer_3 ?> </label> <br>

		 <input type="submit" value="Ответить"  <?= $_SESSION['button_hide_ans']; ?> class='<?= $_SESSION['button_class_ans']; ?>' >
		 <input type="submit" name="go" value="Продолжить"  <?= $_SESSION['button_hide_con']; ?> class=<?= $_SESSION['button_class_con'] ?> >

		</form>
		</ul>
   </div>
</article>

<div class="clearFix"></div>

<?php

?>

</body>
</html>
