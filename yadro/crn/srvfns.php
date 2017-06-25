<?php

function get_sts_numbers($start,$stop) {
  $arr_sts_plan = array();
  $select = "SELECT * FROM shtr_gosnum_sts WHERE id >= '".$start."' AND id <= '".$stop."'";
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $result = mysqli_query($db, $select);
  $rows = mysqli_num_rows($result); // 1 eVeryvere!~
  return $result;
};


function servers_rows() {
  $selectserv = "SELECT * FROM shtr_servers WHERE status=1";
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $result = mysqli_query($db, $selectserv);
  return $result;
}

function qnt_gosnum_sts() {
  $sel = "SELECT * FROM shtr_gosnum_sts WHERE status=1";
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $result = mysqli_query($db, $sel);
  $rows = mysqli_num_rows($result);
  return $rows;
}

function array_servers() {
  $arr = array();
  $sel = "SELECT id FROM shtr_servers WHERE status=1";
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $result = mysqli_query($db, $sel);
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($arr,$row['id']);
  }
  return $arr;
}

function array_ids_sts() {
  $arr = array();
  $sel = "SELECT id FROM shtr_gosnum_sts WHERE status=1";
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $result = mysqli_query($db, $sel);
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($arr,$row['id']);
  }
  return $arr;
}

// Создать план для сервера
function makePlan($qnt_gosnum_sts,$qnt_serv,$kf){
  $lenth_block = $qnt_gosnum_sts/$qnt_serv;
  $array_servers = array_servers();
  $arr_ids_sts = array_ids_sts();
  $kays = array();
  $curr_date = time();
  for ($ii=1; $ii <= $qnt_serv; $ii++) {

      $start_sts_id = $arr_ids_sts[($ii-1)*$kf];

      if(($kf*$ii-1)>count($arr_ids_sts)) {
        $stop_sts_id = $arr_ids_sts[$qnt_gosnum_sts];
      } else {
        $stop_sts_id = $arr_ids_sts[$kf*$ii-1];
      };

      if(!$stop_sts_id) {
        $stop_sts_id = array_pop($arr_ids_sts);
      }


      $tt = $ii-1;
      $server_www = $array_servers[$tt];
      $key = generateUniqKey();
      array_push($kays,$key);
      $status_plan = 0;
      $insert = "INSERT INTO shtr_plan(server_id,code_plan,curr_date,start_sts_id,stop_sts_id,status_plan) VALUES ('".$server_www."','".$key."','".$curr_date."','".$start_sts_id."','".$stop_sts_id."','".$status_plan."')";
      $databaseconnect = new database;
      $db = $databaseconnect->connect();
      $result = mysqli_query($db, $insert);
      echo mysqli_error($db);
    }
    return $kays;
};

function generateUniqKey()
{
  $random_i = rand(time()/2,time());
  return MD5($random_i);
}

// выполнить планы Отправить пост запросы с $_POST['plan']==hash на выбранные сервера
function startMakeShtrafs($md5_keys) // <== Массив в цикле по этому массиву запустить ПОСТЫ
{
  // $_POSt['plan'] = $md5_keys[i]
  print_r($md5_keys);
}

?>
