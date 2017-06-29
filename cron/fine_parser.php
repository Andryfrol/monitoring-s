<?php
session_start();
// include_once("db.php");

$db_hostname="localhost";
$db_name="ce18538_monitor";
$db_username="ce18538_monitor";
$db_password="5440";

//текущее время
$now=time();

$link = mysql_connect($db_hostname, $db_username, $db_password);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}

//подключение к базе данных
$db=@mysql_connect($db_hostname,$db_username,$db_password);
if($db!=FALSE)
    $tabledb=mysql_select_db($db_name) or die("Can't select database");
else{
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">";
    echo "<LINK href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">";
    echo "<h3>Ошибка!</h3>";
    echo "<p>Невозможно подключиться к базе данных. Пожалуйста повторите попыку позже.</p>";
//    die();
    }
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");


// очистка форм от мусора
function clear($q) {
    $clear = trim($q);
    $clear = htmlspecialchars($clear);
    $clear = mysql_escape_string($clear);
    return $clear;
}

function issetLiTransport(){
  $q_transport = sprintf("SELECT * FROM transport WHERE user_id = '".$_SESSION['user_id']."'");
  $r_transport = mysql_query($q_transport);
  $n_transport = mysql_numrows($r_transport);
  if($n_transport) {
    return true;
  } else {
    return false;
  }
}

function getQntNamagers() {
  $user_id = $_SESSION['user_id'];
  $q_user = sprintf("SELECT * FROM user WHERE parentcompany = '".$user_id."'");
  $r_user = mysql_query($q_user);
  $n_user = mysql_numrows($r_user);
  return $n_user;
}


function get_user_info() {

}

function probVerEnd(){
  $q_tarif = sprintf("SELECT * FROM tarif WHERE user_id = '".$_SESSION['user_id']."' AND tarif =0");
  $r_tarif = mysql_query($q_tarif);
  $n_tarif = mysql_numrows($r_tarif);

  if ($n_tarif > 0) {
      for ($i = 0; $i < $n_tarif; $i++) {
          $tarif_curr_date = htmlspecialchars(mysql_result($r_tarif, $i, "tarif.curr_date"));
          return date('d.m.Y',$tarif_curr_date+1209600);
      }
  } else {
    return false;
  }
}

function gettitle($page){
  if($page==404) {
    return 'Страница не найдена. Ошибка 404.';
  } else {
    return 'Мониторинг штрафов ГИБДД';
  }
}
/*
* Frolyonok AV 12.2016
* Функция возвращает Масси ключ=id_group значение=name_group
*/
function getUserAutoGroupsName() {
  $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND status = 1");
  $r_transport_group = mysql_query($q_transport_group);
  $n_transport_group = mysql_numrows($r_transport_group);
  $id_name_gr = array();
  if ($n_transport_group > 0) {
      for ($i = 0; $i < $n_transport_group; $i++) {
          $transport_group_name_group = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.name_group"));
          $transport_group_id = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.id"));
          $id_name_gr[$transport_group_id] = $transport_group_name_group;
      }
  }
  return $id_name_gr;
}

function getTarif(){
  $q_tarif = sprintf("SELECT * FROM tarif WHERE user_id = '".$_SESSION['user_id']."'");
  $r_tarif = mysql_query($q_tarif);
  $n_tarif = mysql_numrows($r_tarif);

  if ($n_tarif > 0) {
      for ($i = 0; $i < $n_tarif; $i++) {
          $tarif_tarif = htmlspecialchars(mysql_result($r_tarif, $i, "tarif.tarif"));
          $tarif_curr_date = htmlspecialchars(mysql_result($r_tarif, $i, "tarif.curr_date"));
      }
  }
  $endtime = $tarif_curr_date+1209600;
  if(($tarif_tarif==0)&&($endtime > time())){
    return 'free';
  } else {
    return $tarif_tarif;
  };

}

// Сколько имеется транспортных средств
function qnttransportisset() {
  $select = "SELECT id FROM transport WHERE user_id='".$_SESSION['user_id']."'";
  $q = mysql_query($select);
  $n = mysql_numrows($q);
  return $n;
};

// Сколько транспорта позволяет тариф
function getqnttransbytarif() {

}

function userBalance(){
  $q_balance = sprintf("SELECT * FROM balance WHERE user_id = '".$_SESSION['user_id']."'");
  $r_balance = mysql_query($q_balance);
  $n_balance = mysql_numrows($r_balance);

  if ($n_balance > 0) {
      for ($i = 0; $i < $n_balance; $i++) {
          $balance_summ = htmlspecialchars(mysql_result($r_balance, $i, "balance.summ"));
      }
  }
  return $balance_summ;
}

function issetEmail($email){
  $q_user = sprintf("SELECT * FROM user WHERE email = '".$email."'");
  $r_user = mysql_query($q_user);
  $n_user = mysql_numrows($r_user);
  if($n_user==0) {
    return false;
  } else {
    return true;
  }
}

function logLogin($user_id,$log_out=0) {
  $time = time();
  $date_dmy = date('d-m-Y',time());
  $insertLogLogin = "INSERT INTO log_login (user_id,date_dmy,timestamp,log_out) VALUES ('".$user_id."','".$date_dmy."','".$time."','".$log_out."')";
  $sql = mysql_query($insertLogLogin);
}

function qntFInesIs() // Количество штрафов
{
   // Идем в номера стс, потом в бланки с штрафами

   // Переход на
  $q_s_blank = sprintf("SELECT * FROM s_blank WHERE sts_number = '1234567890'");
  $r_s_blank = mysql_query($q_s_blank);
  $n_s_blank = mysql_numrows($r_s_blank);
  if($n_s_blank) {
    return $n_s_blank;
  } else {
    return 0;
  }
}

if(!defined("_ZKZ_SHTRAF"))	define("_ZKZ_SHTRAF", "10");	// оплата штрафов ГИБДД
if(!defined("_ZKZ_NALOG"))	define("_ZKZ_NALOG", "21");		// оплата налогов

if(!defined("API_CHECK_PAY"))	define("API_CHECK_PAY", "1");	// провести поиск начислений
if(!defined("API_CREATE_ZKZ"))	define("API_CREATE_ZKZ", "2");	// создать заказ
if(!defined("API_GO_PAY"))		define("API_GO_PAY", "3");		// отправить Клиента на оплату
if(!defined("API_LOAD_ZKZ"))	define("API_LOAD_ZKZ", "4");	// проверить состояние заказа

ini_set('max_execution_time',210);  // не устанавливайте меньше! Запросы в систему ГИС ГМП отрабатывают долго! Ваш скрипт может "не дождаться".

////////////////////////////////////////////
// Класс "API shtraf.biz"  верс.1.01
// http://shtraf.biz/api.php
// (с) 2015 Федорук Александр fedl@mail.ru
// The MIT License (MIT)
////////////////////////////////////////////
class _API
{   private $url='https://www.elpas.ru/api.php';	// url для запроса
	private $id='R052887532031';	// id Партнера (номер R-кошелька WebMoney)
	private $api_key='dsgn2Y7mn97aMNs';	// ключ для подписи запросов (получите в техподдержке support@shtraf.biz)
	// создать подпись запроса
    function createHash($top)
	{   return md5($this->id.$top.$this->api_key);
	}

	// получить url для запроса
    function getUrl()
	{   return $this->url;
	}

	// Отправить запрос
	// На выходе: массив с результатом запроса
	function sendQUERY($dat)
	{	// добавляем к массиву с данными идентификационную информацию
        $dat['hash']=$this->createHash($dat['top']);
		if($dat['top']==API_CHECK_PAY||$dat['top']==API_CREATE_ZKZ)
		{   $dat['id']=$this->id;
		}
		if(isset($dat['l'])) $dat['l']=urlencode($dat['l']);
		$ch=curl_init($this->url);
        curl_setopt($ch,CURLOPT_TIMEOUT,210);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
		curl_setopt($ch,CURLOPT_HEADER,0);	// результат не включает полученные заголовки
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);	// возврат, а не вывод результата
		curl_setopt($ch,CURLOPT_POST,1);	// отправка http запроса методом POST
		curl_setopt($ch,CURLOPT_POSTFIELDS,$dat);	// массив, содержащий данные для HTTP POST запроса

		$res=curl_exec($ch);
        $curlErr=curl_errno($ch);
		curl_close($ch);
		if($curlErr!=0||$res=="")
		{	$ret['err']=-1;
			$ret['msg']='Ошибка. Нет связи с сервисом. Попробуйте повторить операцию позже';
		}
        else
		{   if($res)
			{   $ret= $dat['top']!=API_GO_PAY?json_decode($res,true):$res;
			}
    }

        return $ret;
	}
}

$time_zadachi = time();
$id_zadachi = 1;

$api=new _API();
$dat['top']=1;
$dat['id']="R052887532031";
$api_key='dsgn2Y7mn97aMNs';
$hash = md5($dat['id'].$dat['top'].$api_key);
$dat['hash'] = $hash;
$dat['type'] = 10;

$getStsNumbers = "SELECT sts FROM transport";
$sel = mysql_query($getStsNumbers);
$n_sel = mysql_numrows($sel);

if ($n_sel > 0) {
    for ($i = 0; $i < $n_sel; $i++) {
        $dat['sts'] = htmlspecialchars(mysql_result($sel, $i, "transport.sts"))."<br/>";
        $ret = $api->sendQUERY($dat);
        $object = json_decode(json_encode($ret), FALSE);
        $status_insert = "";
        if(!$object->l) {
            // не найдено штрафов по номеру стс
            $update_all_for_sts = "UPDATE new_blank_data SET status=0 WHERE sts_n='".$dat['sts']."'";
            $resUpdate = mysql_query($update_all_for_sts);
        } else {
            if($object->err == 0) {
                foreach ($ret['l'] as $blank) {
                    $n_sts = $dat['sts'];
                    $sum = $blank['sum'];
                    $addinfo = $blank['addinfo'];
                    $dat_str = $blank['dat'];
                    $shtr_time = strtotime($dat_str);
                    $type = (int)$blank['type'];
                    $feesrv = $blank['feesrv'];
                    $payeridentifier = $blank['PAYERIDENTIFIER'];
                    $articlecode = $blank['ARTICLECODE'];
                    $location = $blank['LOCATION'];
                    $discountsize = $blank['DISCOUNTSIZE'];
                    $discountdate = $blank['DISCOUNTDATE'];
                    $totalamount = $blank['TOTALAMOUNT'];
                    $ispaid = $blank['ISPAID'];
                    $bank = $blank['BANK']; // Массив данных банка получателя
                    $bank_soiname = $bank['SOINAME'];
                    $bank_inn = $bank['INN'];
                    $bank_kpp = $bank['KPP'];
                    $bank_acc = $bank['ACC'];
                    $bank_bankname = $bank['BANKNAME'];
                    $bank_bik = $bank['BIK'];
                    $bank_purpose = $bank['PURPOSE'];
                    $l_unic_num_shtr = explode("№", $bank_purpose);
                    $l_unic_num_shtr = explode(" ", $l_unic_num_shtr[1]);
                    $l_unic_num_shtr = explode(";", $l_unic_num_shtr[0]);
                    $l_unic_num_shtr = $l_unic_num_shtr[0];
                    $bank_username = $bank['USERNAME'];
                    $bank_kbk = $bank['KBK'];
                    $bank_oktmo = $bank['OKTMO'];
                    $bank_sign = $bank['SIGN'];
                    $bank_billdate  = $bank['BILLDATE'];
                    $insert_new_blank = "INSERT INTO new_blank_data (dat_timestamp,sts_n,time_zadachi,id_zadachi,b_sum,addinfo,dat,type,feesrv,payeridentifier,articlecode,location,discountsize,discountdate,totalamount,ispaid,bank_soiname,bank_inn,bank_kpp,bank_acc,bank_bankname,bank_bik,bank_purpose,bank_username,bank_kbk,bank_oktmo,bank_sign,bank_billdate,l_unic_num_shtr) VALUES ('".$shtr_time."','".$n_sts."','".$time_zadachi."','".$id_zadachi."','".$sum."','".$addinfo."','".$dat_str."','".$type."','".$feesrv."','".$payeridentifier."','".$articlecode."','".$location."','".$discountsize."','".$discountdate."','".$totalamount."','".$ispaid."','".$bank_soiname."','".$bank_inn."','".$bank_kpp."','".$bank_acc."','".$bank_bankname."','".$bank_bik."','".$bank_purpose."','".$bank_username."','".$bank_kbk."','".$bank_oktmo."','".$bank_sign."','".$bank_billdate."','".$l_unic_num_shtr."') ON DUPLICATE KEY UPDATE dat_timestamp='".$shtr_time."', l_unic_num_shtr='".$l_unic_num_shtr."', time_zadachi='".$time_zadachi."'";
                    $ins = mysql_query($insert_new_blank);

                };
            }
        }
    }
}

// Получение данных штрафов
$curr_date = date('d-m-Y',time());
$insert_balanser = "INSERT INTO cron_status (curr_date,fines_parser)
VALUES ('".$curr_date."','1') ON DUPLICATE KEY UPDATE curr_date='".$curr_date."', fines_parser='1'";
$ins = mysql_query($insert_balanser);

?>
