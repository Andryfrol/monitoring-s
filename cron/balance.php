<?php
session_start();
$db_hostname="localhost";
$db_name="ce18538_monitor";
$db_username="ce18538_monitor";
$db_password="5440";
$now=time();
$link = mysql_connect($db_hostname, $db_username, $db_password);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
$db=@mysql_connect($db_hostname,$db_username,$db_password);
if($db!=FALSE) {
    $tabledb=mysql_select_db($db_name) or die("Can't select database");
} else {
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">";
    echo "<LINK href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">";
    echo "<h3>Ошибка!</h3>";
    echo "<p>Невозможно подключиться к базе данных. Пожалуйста повторите попыку позже.</p>";
}
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
// Обновление баланса пользователей и блокировка аккаунтов
// Проверка тестовый тарифов и блокировка функциональности
// Если баланс пользователей сегодня не обновлялся.
$date = date('d-m-Y',time());
$q_cron_status = sprintf("SELECT * FROM cron_status WHERE curr_date = '".$date."' AND balancer=0");
$r_cron_status = mysql_query($q_cron_status);
$n_cron_status = mysql_numrows($r_cron_status);
if($n_cron_status==1) {
  // тариф ид - узер ид
  $q_tarif = sprintf("SELECT * FROM tarif WHERE tarif > 0");
  $r_tarif = mysql_query($q_tarif);
  $n_tarif = mysql_numrows($r_tarif);
  $arrat_userid_tarif = array();
  if ($n_tarif > 0) {
      for ($s = 0; $s < $n_tarif; $s++) {
          $tarif_user_id = htmlspecialchars(mysql_result($r_tarif, $s, "tarif.user_id"));
          $tarif_tarif = htmlspecialchars(mysql_result($r_tarif, $s, "tarif.tarif"));
          $arrat_userid_tarif[$tarif_user_id]=$tarif_tarif;
      }
  }
    $q_calc_tarif = sprintf("SELECT * FROM calc_tarif");
    $r_calc_tarif = mysql_query($q_calc_tarif);
    $n_calc_tarif = mysql_numrows($r_calc_tarif);
    $array_tarifid_price = array();
    if ($n_calc_tarif > 0) {
        for ($q = 0; $q < $n_calc_tarif; $q++) {
            $calc_tarif_t_price_day = htmlspecialchars(mysql_result($r_calc_tarif, $q, "calc_tarif.t_price_day"));
            $calc_tarif_id = htmlspecialchars(mysql_result($r_calc_tarif, $q, "calc_tarif.id"));

            $array_tarifid_price[$calc_tarif_id]=$calc_tarif_t_price_day;
        }
    };
  // отнимаем сумму с баланса относительно тарифа
  $q_balance = sprintf("SELECT * FROM balance WHERE block = 0 and summ !=0");
  $r_balance = mysql_query($q_balance);
  $n_balance = mysql_numrows($r_balance);

  $array_balanceid_summ_userid = array();
  if ($n_balance > 0) {
      for ($e = 0; $e < $n_balance; $e++) {
          $balance_user_id = htmlspecialchars(mysql_result($r_balance, $e, "balance.user_id"));
          $balance_id = htmlspecialchars(mysql_result($r_balance, $e, "balance.id"));
          $balance_summ = htmlspecialchars(mysql_result($r_balance, $e, "balance.summ"));

          $array_balanceid_summ_userid[$e][0]=$balance_id;
          $array_balanceid_summ_userid[$e][1]=$balance_summ;
          $array_balanceid_summ_userid[$e][2]=$balance_user_id;
      }
  }
  // var_dump($array_balanceid_summ_userid);
  // Обновляю $array_balanceid_summ_userid[$e][0]=$balance_id;
  $count_balance_arr = count($array_balanceid_summ_userid);
  for ($c=0; $c < $count_balance_arr; $c++) { // цикл по балансам пользователя относительно тарифов
    // Баланс - стоимость дня тарифа
    $array_balanceid_summ_userid[$c][1] = $array_balanceid_summ_userid[$c][1]-$array_tarifid_price[$arrat_userid_tarif[$array_balanceid_summ_userid[$c][2]]];
    $update_balance = "UPDATE balance SET summ='".$array_balanceid_summ_userid[$c][1] ."' WHERE user_id='".$array_balanceid_summ_userid[$c][2]."'";
    $upd_balance = mysql_query($update_balance);
  }
  // заблокируем все отрицательные балансы и отправим им письма
  $update_minuses = 'UPDATE balance SET block=1, summ=0 WHERE summ < 0';
  $upd_minuses = mysql_query($update_minuses);
  // var_dump($array_balanceid_summ_userid);
  // Пометить что задача выполненна!
  $curr_date = date('d-m-Y',time());
  $insert_balanser = "INSERT INTO cron_status (curr_date,balancer) VALUES ('".$curr_date."','1') ON DUPLICATE KEY UPDATE curr_date='".$curr_date."', balancer='1'";
  $ins = mysql_query($insert_balanser);
  echo "Баланс пользователей мониторинга штрафов обновлен! ".date('d.m.Y',time());
} else {
  echo "Ошибка балансера пользователей! ".date('d.m.Y',time());
};
?>
