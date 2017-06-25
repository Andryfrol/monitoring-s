<?php
session_start();
set_time_limit(0);
error_reporting(E_ERROR);
$script_start_time = time();
/*
Скрипт проверки штафов
s_customer_blank - таблица актуальных штрафов
s_gosnumber - связь гос номера и стс
*/
require_once ('db_connect.php');
require_once ('fns.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?
    if(true) {
      $get_sts = "SELECT * FROM s_gosnum_sts WHERE status=1";
      $databaseconnect = new database;
      $db = $databaseconnect->connect();
      $result = mysqli_query($db, $get_sts);
      $rows = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
           $sts = $row['sts_number'];
           $gos_num = $row['gos_number'];
           $dat['hash'] = MD5($id.$top.$api_key);
           $dat['top'] = 1;
           $dat['id'] = 'R052887532031';
           $dat['type'] = 10;
           $dat['sts'] = $sts;
           $api=new _API();
           $dat['top']=API_CHECK_PAY;
           $ret=$api->sendQUERY($dat);
          //  echo "STS № ".$sts."<br/>";
          //  echo "<pre>";
           $object = json_decode(json_encode($ret), FALSE);
           $status_insert = "";
           if(!$object->l) {
             // print_r($object->msg);
           } else {
             if($object->err==0) {
               foreach ($object->l as $v1) {
                    // echo $v1->type.'<br/>';
                    // $mykey = key($object);
                    // echo $mykey;
                    $paysumm = $v1->sum;
                    $description = $v1->addinfo;
                    $blank_date = $v1->dat;
                    $status_insert .= insertsafs($gos_num,$script_start_time,$paysumm,$description,$uniqblank_id,$blank_date);
                    sleep(1);
                }
             }
           };

            if(trim($status_insert)=="") {
              $status_insert = 'OK';
            }
           saveStat($script_start_time,$status_insert);
       }
       // Фиксация времини последнего обновления
    };
    ?>

  </body>

</html>
