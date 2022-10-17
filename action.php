<?php
  session_start();
// Получение данных из формы
  $answer = $_POST['variant'];
// Запись ответа в сессию для отправки на страницу формы
  $_SESSION['send_variant'] = $answer;
  $_SESSION['correct'];


// Переключение карточек

if ($_SESSION['send_variant'] == 1) {
  unset($_SESSION['send_variant']);
  $_SESSION['correct']++;
} elseif($_SESSION['send_variant'] == 0) {
    $_SESSION['correct'] = 1;
    
} else {
    $_SESSION['correct'] = 1;
}
// Решение из форума для возврата на предыдущую страницу
  echo "
  <html>
    <head>
     <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
    </head>
  </html>";


?>
