<?php
require_once('../api.php');
// добавляю данные по штрафу
function insertShtrafs($bankname,$gosn,$curr_date,$paysumm,$description,$uniqblank_id,$blank_date,$header_shtraf,$n_postanovlenia,$blank_date_timestamp,$up_time,$articlecode,$location_shtr,$discountsize,$discountdate,$sts_number){
  $blank_date_timestamp = str_replace('.','-',$blank_date_timestamp);
  $insert_into = "INSERT INTO shtr_customer_blank (bankname,gos_number,curr_date,pay_summ,uniq_blank_id,blank_date,description,
    status,header_shtraf,num_postonovlenia,blank_date_timestamp,up_time,articlecode,location_shtr,discountsize,discountdate,sts_number)
  VALUES ('".$bankname."','".$gosn."','".$curr_date."','".$paysumm."','".$uniqblank_id."','".$blank_date."','".$description."','0','".$header_shtraf."',
  '".$n_postanovlenia."','".$blank_date_timestamp."','".$up_time."','".$articlecode."','".$location_shtr."','".$discountsize."','".$discountdate."','".$sts_number."')
  ON DUPLICATE KEY UPDATE curr_date='".$curr_date."', status='0', up_time='".$up_time."'";
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $result = mysqli_query($db, $insert_into);
  echo mysqli_error($db);
  // Обновить оплаченные и не оплаченныее
}

function saveStat($script_start_time,$status_insert)
{
  $stop_time = time();
  $insert_stop = "INSERT INTO shtr_update (curr_time,stop_time,status_insert) VALUES ('".$script_start_time."','".$stop_time."','".$status_insert."')";
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $result = mysqli_query($db, $insert_stop);
}

function lastUpTime()
{
  $select = "SELECT id, curr_time FROM shtr_update ORDER BY id DESC LIMIT 1";
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $result = mysqli_query($db, $select);
  $row = mysqli_fetch_assoc($result);
  $curr_time = $row['curr_time'];
  return $curr_time; // время последнего обновления штрафов
}



?>
