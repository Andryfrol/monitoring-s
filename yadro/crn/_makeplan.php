<?php
session_start();
set_time_limit(0);
error_reporting(E_ERROR);
$testmode = true; // or false
require_once ('db_connect.php');
require_once ('srvfns.php');
// получить сервера
$servers_rows = servers_rows();
// кол-во серверов
$qnt_serv = mysqli_num_rows($servers_rows);
// кол-во стс
$qnt_gosnum_sts = qnt_gosnum_sts();
// кол-во стс на каждый сервер
$kf = ceil($qnt_gosnum_sts/$qnt_serv);
// создаем планы серверов 1. Кол-во СТС 2. Кол-во СЕРВЕРОВ
$md5_keys = makePlan($qnt_gosnum_sts,$qnt_serv,$kf);
// отправить план на выполнение т,е. -> кол-во серверов
echo "ok";


















 ?>
