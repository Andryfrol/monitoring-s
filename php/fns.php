<?
// Test sts numbers 7729187780.7736869621.7736895981.7736981698.7736983304.7736983301.7736859982.7736859974.7741501932.7741460812

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

function last_day_ao() {
  $balance = userBalance();
  $q_tarif = sprintf("SELECT * FROM tarif WHERE user_id = '".$_SESSION['user_id']."'");
  $r_tarif = mysql_query($q_tarif);
  $n_tarif = mysql_numrows($r_tarif);

  if ($n_tarif > 0) {
      for ($i = 0; $i < $n_tarif; $i++) {
          $tarif_tarif = htmlspecialchars(mysql_result($r_tarif, $i, "tarif.tarif"));
      }
  }

  $q_calc_tarif = sprintf("SELECT * FROM calc_tarif WHERE id = '".$tarif_tarif."'");
  $r_calc_tarif = mysql_query($q_calc_tarif);
  $n_calc_tarif = mysql_numrows($r_calc_tarif);

  if ($n_calc_tarif > 0) {
      for ($i = 0; $i < $n_calc_tarif; $i++) {
          $calc_tarif_t_price_day = htmlspecialchars(mysql_result($r_calc_tarif, $i, "calc_tarif.t_price_day"));
      }
  }

  $last_day = $balance/$calc_tarif_t_price_day;
  $qnt_days = round($last_day);
  $last_time = time() + $qnt_days*86400;
  return date('d.m.Y',$last_time);
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
  $arr = array();
  if($page==404) {
    return $arr['title']='Страница не найдена. Ошибка 404.';
  } else {
    $q_seo = sprintf("SELECT * FROM seo WHERE page = '".$page."' ORDER BY id DESC LIMIT 1");
    $r_seo = mysql_query($q_seo);
    $n_seo = mysql_numrows($r_seo);

    if ($n_seo > 0) {
        for ($i = 0; $i < $n_seo; $i++) {
            $arr['title'] = $seo_title = htmlspecialchars(mysql_result($r_seo, $i, "seo.title"));
            $arr['desc'] = $seo_description = htmlspecialchars(mysql_result($r_seo, $i, "seo.description"));
            $arr['key'] = $seo_keywords = htmlspecialchars(mysql_result($r_seo, $i, "seo.keywords"));
            $arr['last'] = $seo_lastmodified = htmlspecialchars(mysql_result($r_seo, $i, "seo.lastmodified"));
        }
    }
    return $arr;
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

function gos_and_grup_id() {
  $q_transport = sprintf("SELECT * FROM transport WHERE user_id = '".$_SESSION['user_id']."'");
  $r_transport = mysql_query($q_transport);
  $n_transport = mysql_numrows($r_transport);
  $arr = array();
  if ($n_transport > 0) {
      for ($i = 0; $i < $n_transport; $i++) {
          $transport_group_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.group_id"));
          $transport_gosnumber = htmlspecialchars(mysql_result($r_transport, $i, "transport.gosnumber"));
          $transport_sts = htmlspecialchars(mysql_result($r_transport, $i, "transport.sts"));
          $arr[$transport_sts][0] = $transport_group_id;
          $arr[$transport_sts][1] = $transport_gosnumber;

      }
  }
  return $arr;
}

function get_group_trans_by_user_id() {
  $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND status =1");
  $r_transport_group = mysql_query($q_transport_group);
  $n_transport_group = mysql_numrows($r_transport_group);
  $arr = array();
  if ($n_transport_group > 0) {
      for ($i = 0; $i < $n_transport_group; $i++) {
          $transport_group_name_group = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.name_group"));
          $transport_group_id = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.id"));
          $arr[$transport_group_id]=$transport_group_name_group;
      }
  }
  return $arr;
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

function get_car_name_sts_car_name() {
  $q_transport = sprintf("SELECT * FROM transport WHERE user_id = '".$_SESSION['user_id']."'");
  $r_transport = mysql_query($q_transport);
  $n_transport = mysql_numrows($r_transport);
  $arr = array();
  if ($n_transport > 0) {
      for ($i = 0; $i < $n_transport; $i++) {
          $transport_car_name = htmlspecialchars(mysql_result($r_transport, $i, "transport.car_name"));
          $transport_sts = htmlspecialchars(mysql_result($r_transport, $i, "transport.sts"));
          $arr[$transport_sts]=$transport_car_name;
      }
  }
  return $arr;
}

?>
