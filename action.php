<?php
  session_start();
  // Получение данных из форм
  $answer = $_POST['variant'];
  $reboot_click = $_POST['reButton'];
  // Запись ответа в сессию для отправки на страницу формы
  $_SESSION['send_variant'] = $answer;
  $_SESSION['change'];
  // Данные о нажатии на кнопку перезагрузки
  $_SESSION['reButton'] = $reboot_click;

  // Пременная для подсчета правильных ответов
  $_SESSION['correct_count'];

  // Подсветка ответа и вариантов
  $_SESSION['green_light'];
  $_SESSION['red_light'];

  // Блокировка кнопок
  $_SESSION['disabled'];

  // Кнопка
  $go_button = $_POST['go'];
  $_SESSION['go'] = $go_button;
  // Стили кнопок, их смена
  $_SESSION['button_hide_con'] = "hidden";
  $_SESSION['button_hide_ans'];
  $_SESSION['button_class_con'];
  $_SESSION['button_class_ans'] = "button";

// Переменная для отображения текста "Правильно"
  $_SESSION["right"] = 0;


  $_SESSION['hidden'];
  $_SESSIONP['finish'];


// Переключение карточек, сначала меняется кнопка с "Ответить" на "Продолжить"

  if ($_SESSION['send_variant'] == 1) {
      unset(  $_SESSION['button_hide_con']);
      unset(  $_SESSION['button_class_ans']);
      $_SESSION['button_hide_ans'] = "hidden";
      $_SESSION['button_class_con'] = "button";
      $_SESSION['green_light'] = "true";
      $_SESSION["right"] = 1;
      $_SESSION['correct_count']++;
      $_SESSION['disabled'] = "disabled";

      } elseif($_SESSION['send_variant'] == 0 && isset($_SESSION['go']) == 0 ) {
        unset($_SESSION['button_hide_con']);
        unset($_SESSION['button_class_ans']);
        $_SESSION['button_hide_ans'] = "hidden";
        $_SESSION['button_class_con'] = "button";
        $_SESSION['green_light'] = "true";
        $_SESSION['right'] = false;
        $_SESSION['disabled'] = "disabled";
      }


  // Нажатие по кнопке "Продолжить" переключает карточку и меняет кнопку
  if (isset($_SESSION['go']) ){
    unset($_SESSION['send_variant']);
    unset($_SESSION['button_class_con']);
    unset($_SESSION['green_light']);
    unset($_SESSION['disabled']);
    $_SESSION['button_hide_con'] = "hidden";
    $_SESSION['button_class_ans'] = "button";
    $_SESSION['change']++;

  }


  // Завершение. Вместо карточки показывает результат
  if($_SESSION['change'] == 11){
    $_SESSION['hidden'] = "hidden";
  }

//   Кусок кода для записи результата. Нужно как-то получить доступ к этому коду, но не при перезагрузке
    // Подключение к БД
    if($_SESSION['call_db'] == 1){
    require("db_conn.php");
    // Запись результата в БД
    $countForBD = $_SESSION['correct_count'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $mode = $_SERVER['mode'];
    $sql = "INSERT INTO results SET mode = '$mode' ,result = '$countForBD', ip = '$ip' ";
    $result = mysqli_query($link, $sql);
    // Костыль
    $_SESSION["data_control"] = 1;

    // Проверка
    if ($result == false) {
        print("Произошла ошибка при сохранении резльтата");
    }
}

  // Нажатие на кнопку "Начать заново"
  if(isset($_SESSION['reButton'])){
    session_destroy();
  }





// Решение из форума для возврата на предыдущую страницу
  echo "
  <html>
    <head>
     <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
    </head>
  </html>";

?>
