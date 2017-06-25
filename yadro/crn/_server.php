
<?php
session_start();
set_time_limit(0);
error_reporting(E_ERROR);
$testmode = true; // or false
require_once ('db_connect.php');
require_once ('fns.php');
require_once ('srvfns.php');
$ip = $_SERVER['HTTP_HOST'];
$start_time = $script_start_time = time();
$array_sts[] = "";
if(($_POST['plan_code']!="")||(true)) {

  $plan_code = clean($_POST['plan_code']); // хэш плана
  if((!$_POST['plan_code']) && ($testmode)) {
      $plan_code = "f63ee38c0cce183b2cd80b9970feecb7";
  };

  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $select_plan_sts = "SELECT * FROM s_plan WHERE code_plan='".$plan_code."' AND status_plan=0";
  $result = mysqli_query($db, $select_plan_sts);
  $rows = mysqli_num_rows($result); // 1 eVeryvere!~
  if($rows==0) {
    echo 'No more find. Exit.';
    die;
  };

  $row = mysqli_fetch_assoc($result);
  $plan_id = $row['id']; // номер плана в бд
  $start_sts_id = $row['start_sts_id']; // начальный id стс
  $stop_sts_id = $row['stop_sts_id'];  // конечный id стс
  $up_time = $row['curr_date'];

  $array_sts_gos = get_sts_numbers($start_sts_id,$stop_sts_id); // массив номеров стс и гос номеров


  while ($array_sts_gos_row = mysqli_fetch_assoc($array_sts_gos)) {
       $sts = $array_sts_gos_row['sts_number'];
       $gos_num = $array_sts_gos_row['gos_number'];
       $id='R052887532031';
       $api_key='dsgn2Y7mn97aMNs';
       $top = 1;
       $dat['hash'] = MD5($id.$top.$api_key);
       $dat['top'] = 1;
       $dat['id'] = 'R052887532031';
       $dat['type'] = 10;
       $dat['sts'] = $sts;
       $api=new _API();
       $dat['top']=API_CHECK_PAY;
       $ret=$api->sendQUERY($dat);
       $object = json_decode(json_encode($ret), FALSE);
       $status_insert = "";
       if(!$object->l) {
         // PU
         // print_r($object->msg);
       } else {
         if($object->err==0) {
           foreach ($object->l as $v1) {
                $paysumm = $v1->sum;
                $description = $v1->addinfo;
                $bankname = $v1->BANK->USERNAME;
                $header_saf = $v1->BANK->PURPOSE;
                $articlecode = $v1->ARTICLECODE;
                $location_s = $v1->LOCATION;
                $discountsize = $v1->DISCOUNTSIZE;
                $discountdate = strtotime($v1->DISCOUNTDATE);
                $description = str_replace(';','<br/>',$description);
                $blank_date = $v1->dat;
                $n_postonovlenia = split('№',$header_saf);
                $n_postonovlenia = explode(" ", $n_postonovlenia); // исправлено появление лишних данных
                $n_postonovlenia = $n_postonovlenia[0];
                $blank_date_timestamp = str_replace('.','-',$blank_date);
                $blank_date_timestamp = strtotime($blank_date_timestamp);
                $status_insert .= insertsafs($bankname,$gos_num,$script_start_time,$paysumm,$description,$uniqblank_id,$blank_date,  $header_saf,$n_postonovlenia[1],$blank_date_timestamp,$up_time,$articlecode,$location_s,$discountsize,$discountdate,$sts);
                sleep(1);
            }
         }
       };
  };

  $work_time = time() - $start_time;
  $status = 1;
  $databaseconnect = new database;
  $db = $databaseconnect->connect();
  $select_plan_sts = "UPDATE s_plan SET status_plan='".$status."', work_time='".$work_time."' WHERE code_plan='".$plan_code."'";
  $result = mysqli_query($db, $select_plan_sts);
  saveStat($start_time,'OK');
} else {
  echo "Error:1";
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

   </body>
 </html>
