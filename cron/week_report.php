<?php
session_start();
include_once("db.php");
//

// Сформировать и отправить еженедельноый отчет по штрафам

$curr_date = date('d-m-Y',time());
$insert_balanser = "INSERT INTO cron_status (curr_date,week_mailer_report) VALUES ('".$curr_date."','1') ON DUPLICATE KEY UPDATE curr_date='".$curr_date."', week_mailer_report='1'";
$ins = mysql_query($insert_balanser);

?>
