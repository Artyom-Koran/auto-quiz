<?php
  session_start();
// Получение данных из формы
  $answer = $_POST['variant'];
// Запись ответа в сессию для отправки на страницу формы
  $_SESSION['send_variant'] = $answer;
  $_SESSION['correct'];

// Кнопки

  $go_button = $_POST['go'];
  $_SESSION['go'] = $go_button;
  $_SESSION['button_hide_con'] = "hidden";
  $_SESSION['button_hide_ans'];
  $_SESSION['button_class_con'];
  $_SESSION['button_class_ans'] = "button";

// Переменная для отображения текста "Правильно"
  $_SESSION["right"] = 0;

// Переключение карточек, сначала меняется кнопка с "Ответить" на "Продолжить"

if ($_SESSION['send_variant'] == 1) {
    unset(  $_SESSION['button_hide_con']);
    unset(  $_SESSION['button_class_ans']);
    $_SESSION['button_hide_ans'] = "hidden";
    $_SESSION['button_class_con'] = "button";
    $_SESSION["right"] = 1;

} elseif($_SESSION['send_variant'] == 0 && isset($_SESSION['go']) == 0 ) {
    $_SESSION['correct'] = 1;

} elseif($_SESSION['correct'] == 10){
    // победа чё
    header ('Location: index.php');
    session_destroy();

}

//else {
  //  $_SESSION['correct'] = 1;
//}


// Нажатие по кнопке "Продолжить" переключает карточку и меняет кнопку
  if (isset($_SESSION['go']) ){
    unset($_SESSION['send_variant']);
    unset($_SESSION['button_class_con']);
    $_SESSION['button_hide_con'] = "hidden";
    $_SESSION['button_class_ans'] = "button";
    $_SESSION['correct']++;

  }




// Решение из форума для возврата на предыдущую страницу
  echo "
  <html>
    <head>
     <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
    </head>
  </html>";


?>
