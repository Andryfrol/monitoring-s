<?php
session_start(); // printer
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");

// Обрабатываем хэши выгрузки
$hash = $_GET['hash'];

if($hash=='all') {
  $title_cr = 'всех имеющихся штрафов.';
  // Печать всех найденных штрафов.
  // Проверяем БАЛАНС
  // Берем все номера STS

} else {
  $title_cr = 'отчета по штрафам.';
  // Вытягиваем данные по listУ id
};


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Печать <?=$title_cr?></title>
  </head>
  <body>
    <div class="">
      Когда страница загружается автоматически вызываем
    </div>
    <script type="text/javascript">
      window.print() ;
    </script>
  </body>
</html>
