<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" shrink-to-fit=no>
	<title>Седаны</title>
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
	$taskCard_1 = new cards("1/10", "img/sedans/Cadillac_ATS_I.jpg", "Первый в мире автомобиль, на который устанавливается вибрирующее кресло безопасности", "Infiniti Q50 I", "Cadillac ATS I", "Lexus IS III", "0", "1", "0");
	$taskCard_2 = new cards("2/10", "img/sedans/Toyota_Premio_II_(T26).jpg", "Японский седан C-класса", "Nissan Bluebird Sylphy III", "Honda Jade I", "Toyota Premio II (T26)", "0", "0", "1");
	$taskCard_3 = new cards("3/10", "img/sedans/Hyundai_Sonata_VIII.jpg", "Снова Японский седан", "Mazda 6 GJ", "Genesis G70 I", "Hyundai Sonata VIII", "0", "0", "1");
	$taskCard_4 = new cards("4/10", "img/sedans/Lincoln_MKZ_II.jpg", "E-класс", "Lincoln MKZ II", "Honda Clarity II", "Buick LaCrosse III", "1", "0", "0");
	$taskCard_5 = new cards("5/10", "img/sedans/Geely_Emgrand_GT.jpg", "D-класс", "Kia Optima III", "Subaru Legacy V", "Geely Emgrand GT", "0", "0", "1");
	$taskCard_6 = new cards("6/10", "img/sedans/Maserati_Quattroporte_VI.jpg", "Спортивный седан F-класса", "Kia K9 II", "Maserati Quattroporte VI", "Jaguar XJ", "0", "1", "0");
	$taskCard_7 = new cards("7/10", "img/sedans/Nissan_Altima_VI.jpg", "D-класс", "Nissan Altima VI", "Volvo S60 III", "Acura ILX I", "1", "0", "0");
	$taskCard_8 = new cards("8/10", "img/sedans/Peugeot_508_II.jpg", "Европейский лифтбек D-класса", "Peugeot 508 II", "Opel Insignia II", "Volkswagen Passat II", "1", "0", "0");
	$taskCard_9 = new cards("9/10", "img/sedans/Chevrolet_Malibu_IX.jpg", "D-класс, передний привод", "Renault Talisman I", "Chevrolet Malibu IX", "Ford Mondeo V", "0", "1", "0");
	$taskCard_10 = new cards("10/10", "img/sedans/Saab_9-3_II.jpg", "D-класс, выпускался до 2014 г.", "Nissan Teana J31", "Toyota Avensis III", "Saab 9-3 II", "0", "0", "1");


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
    	<b>Седаны</b>
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
					echo "<H2>" . "Результат:" . $_SESSION['correct_count'] . "/10" . "</H2>";
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
		 <input type="radio" required checked <?= $_SESSION['disabled'] ?> class="variant <?= $_SESSION['green_light']; ?>" name='variant' id='radio1' value='<?= $tCard_now->radioV_1; ?>'> <label for='radio1' class='label_1'><?= $tCard_now->answer_1 ?></label><br>
		 <input type="radio" <?= $_SESSION['disabled'] ?> class="variant <?= $_SESSION['green_light']; ?>" name='variant' id='radio2' value='<?= $tCard_now->radioV_2; ?>'> <label for='radio2' class='label_2'><?= $tCard_now->answer_2 ?> </label> <br>
		 <input type="radio" <?= $_SESSION['disabled'] ?> class="variant <?= $_SESSION['green_light'];?>" name='variant' id='radio3' value='<?= $tCard_now->radioV_3; ?>'> <label for='radio3' class='label_3'><?= $tCard_now->answer_3 ?> </label> <br>

		 <input type="submit" value="Ответить"  <?= $_SESSION['button_hide_ans']; ?> class='<?= $_SESSION['button_class_ans']; ?>' >
		 <input type="submit" name="go" value="Продолжить"  <?= $_SESSION['button_hide_con']; ?> class=<?= $_SESSION['button_class_con'] ?> >

		</form>
		</ul>
   </div>
</article>

<div class="clearFix"></div>

</body>
</html>
