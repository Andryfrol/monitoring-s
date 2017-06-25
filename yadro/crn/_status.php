<?php
session_start();
set_time_limit(0);
error_reporting(E_ERROR);
require_once ('db_connect.php');
require_once ('fns.php');

// время последнего обновления штрафа
$lastUpTime = lastUpTime();

$gos_num = 'о007мм777';
// получить мои штрафы
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Status</title>
  </head>
  <body>
<?
$databaseconnect = new database;
$db = $databaseconnect->connect();
$select_actual_shtrafs = "SELECT * FROM shtr_customer_blank WHERE gos_number='".$gos_num."' AND curr_date='".$lastUpTime."'";
$result = mysqli_query($db, $select_actual_shtrafs);
$rows = mysqli_num_rows($result);

$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo $i."<br/>";
    echo $row['pay_summ']." - ".$row['description']."<br/>";
    $i++;
}

if($i==1) {
  echo "Штрафов не найденно";
}
?>
  </body>
</html>
