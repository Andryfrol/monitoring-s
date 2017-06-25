<?php
session_start();
include_once("db.php");
// Получение данных штрафов

// Отправить новые полученные штрафы пользователей если они есть!

// 


//
$curr_date = date('d-m-Y',time());
$insert_balanser = "INSERT INTO cron_status (curr_date,day_dailer_report)
VALUES ('".$curr_date."','1') ON DUPLICATE KEY UPDATE curr_date='".$curr_date."', day_dailer_report='1'";
$ins = mysql_query($insert_balanser);

?>
