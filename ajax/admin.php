<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/php/mailer/rassila.php");
if($_SESSION['admin']!=1) {
  echo 'Need admin ACL';
  exit;
}




if($_GET['action']=='todo') {
  ?>
  <div class="" style="padding: 10px;">
    <div class="">
      <h4 style="font-family: 'roboto';">Todo List</h4>
    </div>
    <div class="">

      - 1 Отчеты по штрафам!<br/>
      - 7 Печать отчетов, печать штрафов.<br/>
      <!-- + 2 Вход что бы запоминал!<br/> -->
      - 3 Экспорт данных в Excell.<br/>
      - 4 Оповещения<br/>
      <!-- + 5 Платежи, и дата оканчания абонентского обслуживания<br/> -->
      - 6 запретить добавлять ТС больше чем в тарифе<br/>

      <!-- + 8 Исправить суммы со скидкой<br/> -->
      - 9 Исправить select<br/>
      - 10 Отправка писем из HelpDesk<br/>
      - 11 Angular Router [LastStart: 1 Jan 17 - LastEnd: 2 Jan 17]<br/>
      - 12 Упрощеное подключение для компаний.<br/>
      <!-- - 13 Рассылка КП<br/> -->

    </br>

    </div>
  </div>
  <?
}

if($_GET['action']=='activity') {
  $t_48 = time() - 172800;
  $q_log_login = sprintf("SELECT * FROM log_login WHERE timestamp > '".$t_48."' ORDER BY id DESC"); // WHERE timestamp = '".$_timestamp."'
  $r_log_login = mysql_query($q_log_login);
  $n_log_login = mysql_numrows($r_log_login);

  if ($n_log_login > 0) {
    ?>
    <br/>
    <h6>Активность за последние 48 часов</h6>
    <?
      for ($i = 0; $i < $n_log_login; $i++) {
          $log_login_id = htmlspecialchars(mysql_result($r_log_login, $i, "log_login.id"));
          $log_login_user_id = htmlspecialchars(mysql_result($r_log_login, $i, "log_login.user_id"));
          $log_login_date_dmy = htmlspecialchars(mysql_result($r_log_login, $i, "log_login.date_dmy"));
          $log_login_timestamp = htmlspecialchars(mysql_result($r_log_login, $i, "log_login.timestamp"));
          $log_login_log_out = htmlspecialchars(mysql_result($r_log_login, $i, "log_login.log_out"));
          ?>

          <div class="">
            User_id = <?=$log_login_user_id;?> -  <?=date('d.m.y H:i:s',$log_login_timestamp);?>
            <?
            if($log_login_log_out==0) {
              echo "Вход";
            } else {
              echo "Выход";
            };
            ?>
          </div>
          <?
      }
  }
}


if($_GET['action']=='crontab') {
  ?>
    <div class="" style="padding: 10px;">
      <div class="">
        <h4 style="font-family: 'roboto';">Crontab</h4>
      </div>
      <?
      $q_cron_status = sprintf("SELECT * FROM cron_status ORDER BY id DESC LIMIT 7");
      $r_cron_status = mysql_query($q_cron_status);
      $n_cron_status = mysql_numrows($r_cron_status);

      if ($n_cron_status > 0) {
        echo "<table>";
        ?>
        <tr>
          <td>
            Дата
          </td>
          <td>
            Парсер штрафов
          </td>
          <td>
            Еженедельная
          </td>
          <td>
            Ежедневная (по новым)
          </td>
          <td>
            Баланс
          </td>
        </tr>
        <?
          for ($i = 0; $i < $n_cron_status; $i++) {
              $cron_status_id = htmlspecialchars(mysql_result($r_cron_status, $i, "cron_status.id"));
              $cron_status_week_mailer_report = htmlspecialchars(mysql_result($r_cron_status, $i, "cron_status.week_mailer_report"));
              $cron_status_day_dailer_report = htmlspecialchars(mysql_result($r_cron_status, $i, "cron_status.day_dailer_report"));
              $cron_status_balancer = htmlspecialchars(mysql_result($r_cron_status, $i, "cron_status.balancer"));
              $cron_status_fines_parser = htmlspecialchars(mysql_result($r_cron_status, $i, "cron_status.fines_parser"));
              $cron_status_curr_date = htmlspecialchars(mysql_result($r_cron_status, $i, "cron_status.curr_date"));
              // echo $cron_status_week_mailer_report;
              ?>

                <tr>
                  <td>
                    <?=$cron_status_curr_date;?>
                  </td>
                  <td>
                    <?
                    if($cron_status_fines_parser==1) {
                      echo "Parser OK";
                    } else {
                      echo "Parser <span style='color: red;'>NO</span>";
                    }
                    ?>

                  </td>
                  <td>
                    <?
                    if($cron_status_week_mailer_report==1) {
                      echo "Еженедельная ОК";
                    } else {
                      echo "Еженедельная <span style='color: red;'>NO</span>";
                    }
                    ?>

                  </td>
                  <td>
                    <?
                    if($cron_status_day_dailer_report==1) {
                      echo "Ежедневная ОК";
                    } else {
                      echo "Ежедневная <span style='color: red;'>NO</span>";
                    }
                    ?>
                  </td>
                  <td>
                    <?
                    if($cron_status_balancer==1) {
                      echo "Перерасчет OK";
                    } else {
                      echo "Перерасчет <span style='color: red;'>NO</span>";
                    }
                    ?>
                  </td>
                </tr>


              <?
          }
          echo "</table>";
      }
      ?>
    </div>
  <?
}


if($_GET['action']=='balancer') {
  $q_user = sprintf("SELECT * FROM user");
  $r_user = mysql_query($q_user);
  $n_user = mysql_numrows($r_user);
  $user_array = array();
  if ($n_user > 0) {
      for ($i = 0; $i < $n_user; $i++) {
        $user_name = htmlspecialchars(mysql_result($r_user, $i, "user.name"));
        $user_idd = htmlspecialchars(mysql_result($r_user, $i, "user.id"));
        $curr_date = htmlspecialchars(mysql_result($r_user, $i, "user.curr_date"));
        $user_array[$user_idd][0]=$user_name;
        $user_array[$user_idd][1]=$curr_date;
      }
  }
  ?>
  <div class="" style="padding: 10px;">
    <div class="">
      <h4 style="font-family: 'roboto';">Баланс</h4>
    </div>
    <div class="">
      <table>
      <tr>
        <td style="width: 10px; text-align: left;">
          <h5 style="margin: 0px;">User id</h5>
        </td>
        <td style="width: 100px; text-align: left;">
          <h5 style="margin: 0px;">Компания</h5>
        </td>
        <td  style="width: 100px; text-align: left;">
          <h5 style="margin: 0px;">Сумма на балансе</h5>
        </td>
        <td  style="width: 100px; text-align: left;">
          <h5 style="margin: 0px;">Зарегистрирован</h5>
        </td>
      </tr>
      <?
      $q_balance = sprintf("SELECT * FROM balance ORDER BY id DESC");
      $r_balance = mysql_query($q_balance);
      $n_balance = mysql_numrows($r_balance);

      if ($n_balance > 0) {
          for ($i = 0; $i < $n_balance; $i++) {
              $balance_user_id = htmlspecialchars(mysql_result($r_balance, $i, "balance.user_id"));
              $balance_summ = htmlspecialchars(mysql_result($r_balance, $i, "balance.summ"));
              ?>
            <tr>
              <td style="width: 10px; text-align: left;">
                <?=$balance_user_id;?>
              </td>
              <td style="width: 100px; text-align: left;">
                <?=$user_array[$balance_user_id][0];?> -
              </td>
              <td  style="width: 100px; text-align: left;">
                <?=$balance_summ;?> руб.
              </td>
              <td style="width: 100px; text-align: left;">
                <?=date('d-m-Y',$user_array[$balance_user_id][1]);?>
              </td>
            </tr>
              <?
          }
          ?>
          <table>
          <?
      }
      ?>
    </div>
  </div>
  <?
}

if($_GET['action']=='helpdesk') {
  $date = date('d-m-Y',time());
  $q_helpdesk = sprintf("SELECT * FROM helpdesk WHERE date_dmy='".$date."' AND from_or_to=1");
  $r_helpdesk = mysql_query($q_helpdesk);
  $n_helpdesk = mysql_numrows($r_helpdesk);

  ?>
  <div class="" style="padding: 15px;">
    <h4 style="font-family: 'roboto';">Help DESC </h4>
    <p>Cообщений сегодня ~ <?=$n_helpdesk;?></p>
    <div class="">
      <?

      $q_helpdesk = sprintf("SELECT * FROM helpdesk ORDER BY id DESC");
      $r_helpdesk = mysql_query($q_helpdesk);
      $n_helpdesk = mysql_numrows($r_helpdesk);

      if ($n_helpdesk > 0) {
          for ($i = 0; $i < $n_helpdesk; $i++) {
              $helpdesk_id = htmlspecialchars(mysql_result($r_helpdesk, $i, "helpdesk.id"));

              $helpdesk_name = htmlspecialchars(mysql_result($r_helpdesk, $i, "helpdesk.name"));
              $helpdesk_company = htmlspecialchars(mysql_result($r_helpdesk, $i, "helpdesk.company"));
               $helpdesk_email = htmlspecialchars(mysql_result($r_helpdesk, $i, "helpdesk.email"));
              $helpdesk_message = htmlspecialchars(mysql_result($r_helpdesk, $i, "helpdesk.message"));
              $helpdesk_from_or_to = htmlspecialchars(mysql_result($r_helpdesk, $i, "helpdesk.from_or_to"));
              $helpdesk_curr_date = htmlspecialchars(mysql_result($r_helpdesk, $i, "helpdesk.curr_date"));
              ?>
              <div class="" style="border: 1px solid rgba(255,255,255,.1); margin-bottom: 5px; padding: 3px 10px; padding-bottom: 5px;">
                <small style="font-size: 11px;"><?=date('d.m h:i',$helpdesk_curr_date);?></small>


                  <small style="font-size: 11px; float: right;" onclick="adminMsg('<?=$helpdesk_email;?>')" class="pointer">Ответить</small>
                  <span class="" style="font-size: 11px; margin-left: 5px;">
                      <?=$helpdesk_email;?>
                  </span>
                  <div class="">
                    <?=$helpdesk_message;?>
                  </div>
              </div>
              <?
          }
      }
      ?>
    </div>
  </div>

  <?
}

// sender mailer
if($_GET['action']=='send_mail') {
  $typeis = $_POST['typeis']; // тип рассылки
  $mails = $_POST['mails']; // список через точку с запятой
  // собираем шаблон рассылки
  $date = time();
  $date_dmy = date('d-m-Y',$date);
  $mails_array = explode(';',$mails);

  $count_emails = count($mails_array);
  for ($i=0; $i < $count_emails; $i++) {

    // Отправляем письмо получателю
    rassila(trim($mails_array[$i]));
    // добавляем в лог рассылку
    $insert_to_log = "INSERT INTO mailer_log (date_is,date_dmy,email,type_mailer) VALUES ('".$date."','".$date_dmy."','".trim($mails_array[$i])."','".$typeis."')";
    mysql_query($insert_to_log);
  }
  // var_dump($mails_array);
  // echo $typeis."+".$mails;
  echo 'ok';
}


if($_GET['action']=='mailer') {
  ?>
  <div class="" style="padding: 15px;">

    <div class="">
      <h4 style="font-family: 'roboto';">Mailer</h4>
    </div>
    <div class="">
      <lable for="rassilka1">
        <input type="radio" name="rassilka1" value="1" id="rassilka1" checked> Коммерческое пролложение №1
      </lable><br/>
      <lable for="rassilka2">
        <input type="radio" name="rassilka1" value="2" id="rassilka2"> Коммерческое пролложение №2
      </lable>
    </div>
    <br>

    <div class="">
      <textarea name="name" rows="3" style="width: 400px; background: rgba(255,255,255,.2);" placeholder="Список адресов получателей" id="mailer_emails"></textarea>
    </div>
    <div class="">
      <div class="disactivebtn" onClick="sendMailerTo()">Отправить</div>
    </div>
    <br/><br/>
    <div class="">
      LOG отправленных рассылок
      <div class="">
        <?
        $q_mailer_log = sprintf("SELECT * FROM mailer_log ORDER BY id DESC");
        $r_mailer_log = mysql_query($q_mailer_log);
        $n_mailer_log = mysql_numrows($r_mailer_log);

        if ($n_mailer_log > 0) {
            for ($i = 0; $i < $n_mailer_log; $i++) {
                $mailer_log_date_is = htmlspecialchars(mysql_result($r_mailer_log, $i, "mailer_log.date_is"));
                $mailer_log_date_dmy = htmlspecialchars(mysql_result($r_mailer_log, $i, "mailer_log.date_dmy"));
                echo " ".$mailer_log_email = htmlspecialchars(mysql_result($r_mailer_log, $i, "mailer_log.email"));
                $mailer_log_type_mailer = htmlspecialchars(mysql_result($r_mailer_log, $i, "mailer_log.type_mailer"));
                $mailer_log_status_read = htmlspecialchars(mysql_result($r_mailer_log, $i, "mailer_log.status_read"));
                $mailer_log_read_date = htmlspecialchars(mysql_result($r_mailer_log, $i, "mailer_log.read_date"));
            }
        }
        ?>
      </div>
    </div>
  </div>
  <?
}

if($_GET['action']=='analytics') {
  ?>
  <div class="" style="padding: 15px;">
    <h4 style="font-family: 'roboto';">Аналитика</h4>
  </div>
  <?
}

if($_GET['action']=='tarif') {
  ?>
    <div class="" style="padding: 10px; padding-top: 25px;">
      <h4 style="font-family: 'roboto';">Тарифы</h4>
    </div>
    <div class="">
      <?
      $q_calc_tarif = sprintf("SELECT * FROM calc_tarif ORDER BY id ASC");
      $r_calc_tarif = mysql_query($q_calc_tarif);
      $n_calc_tarif = mysql_numrows($r_calc_tarif);

      if ($n_calc_tarif > 0) {
          for ($i = 0; $i < $n_calc_tarif; $i++) {
              $calc_tarif_t_name = htmlspecialchars(mysql_result($r_calc_tarif, $i, "calc_tarif.t_name"));
              $calc_tarif_t_price = htmlspecialchars(mysql_result($r_calc_tarif, $i, "calc_tarif.t_price"));
              $calc_tarif_t_price_day = htmlspecialchars(mysql_result($r_calc_tarif, $i, "calc_tarif.t_price_day"));
              $calc_tarif_qnt_car = htmlspecialchars(mysql_result($r_calc_tarif, $i, "calc_tarif.qnt_car"));
              $calc_tarif_id = htmlspecialchars(mysql_result($r_calc_tarif, $i, "calc_tarif.id"));
              ?>
              <div class="" style="display: inline-block; width: 24%; text-align: center;">
                <div class="" style="font-size: 18px; color: #ddd0b2; padding: 5px;">
                  <?=$calc_tarif_t_name;?>
                </div>
                <div class="">
                  <?=$calc_tarif_t_price;?> руб./мес.
                </div>
                <div class="">
                  <?=$calc_tarif_t_price_day;?> в день
                </div>
                <div class="">
                  СТС до <?=$calc_tarif_qnt_car;?> шт.
                </div>
              </div>
              <?
          }
      }
      ?>
    </div>
    <div class="" style="margin-top: 15px; text-align: left; padding-left: 10px; display: inline-block; margin-top: 30px; cursor: pointer;">
      <a style="color: #ddd0b2;">Обновить цены</a>

    </div>
  <?
}

if($_GET['action']=='users') {
  ?>
  <div class="" style="padding: 15px;">
    <div class="">
      <h4 style="font-family: 'roboto';">Пользователи</h4>
    </div>
  <?
  $q_user = sprintf("SELECT * FROM user ORDER BY id DESC");
  $r_user = mysql_query($q_user);
  $n_user = mysql_numrows($r_user);

  if ($n_user > 0) {
    ?>
    <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1);border-top: 1px solid rgba(255,255,255,.1); border-right: 1px solid rgba(255,255,255,.1);">
      <div class="tdcell" style="width: 40px;">
        ID
      </div>
      <div class="tdcell">
        Имя / Комп.
      </div>
      <div class="tdcell">
        Пароль
      </div>
      <div class="tdcell" style="width: 200px;">
        Email
      </div>
      <div class="tdcell">
        Зарегистрирован
      </div>
      <div class="tdcell" style="width: 80px;">
        Блокировка
      </div>
    </div>
    <?
      for ($i = 0; $i < $n_user; $i++) {
          $user__id = htmlspecialchars(mysql_result($r_user, $i, "user.id"));
          $user_name = htmlspecialchars(mysql_result($r_user, $i, "user.name"));
          $user_password = htmlspecialchars(mysql_result($r_user, $i, "user.password"));
          $user_email = htmlspecialchars(mysql_result($r_user, $i, "user.email"));
          $user_parentcompany = htmlspecialchars(mysql_result($r_user, $i, "user.parentcompany"));
          $user_text_pw = htmlspecialchars(mysql_result($r_user, $i, "user.text_pw"));
          $user_curr_date = htmlspecialchars(mysql_result($r_user, $i, "user.curr_date"));
          $user_admin = htmlspecialchars(mysql_result($r_user, $i, "user.admin"));
          $user_name;
          ?>
          <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1); border-right: 1px solid rgba(255,255,255,.1);">
            <div class="tdcell" style="width: 40px;">
              <?=$user__id;?>
            </div>
            <div class="tdcell">
              <?=$user_name;?>
            </div>
            <div class="tdcell">
              <?=$user_text_pw;?>
            </div>
            <div class="tdcell" style="width: 200px;">
              <?=$user_email?>
            </div>
            <div class="tdcell text-center">
              <?=date('d.m.y',$user_curr_date);?>
            </div>
            <div class="tdcell" style="width: 80px;">
              X
            </div>
          </div>
          <?
      }
  }
  ?>

</div>
  <?
}

if($_GET['action']=='add_to_pay') {
  $user_name_to_pay = $_POST['user_name_to_pay'];
  $user_id_to_pay = (int)$_POST['user_id_to_pay'];
  $user_summ_to_pay = $_POST['user_summ_to_pay'];

  // берем баланс пользователя
  $q_balance = sprintf("SELECT * FROM balance WHERE user_id = '".$user_id_to_pay."' LIMIT 1");
  $r_balance = mysql_query($q_balance);
  $n_balance = mysql_numrows($r_balance);

  if ($n_balance > 0) {
      for ($i = 0; $i < $n_balance; $i++) {
          $balance_summ = htmlspecialchars(mysql_result($r_balance, $i, "balance.summ"));
      }
  }
  // прибавляем сумму
  $new_balance = $balance_summ + $user_summ_to_pay;
  $update_balance = "UPDATE balance SET summ='".$new_balance."' WHERE user_id='".$user_id_to_pay."'";
  mysql_query($update_balance);

  // заносим в логи
  $date_ts = time();
  $date_dmy = date('d-m-Y',$date_ts);
  $insert_history = "INSERT INTO pay_history (date_ts,date_dmy,summa,user_id) VALUES ('".$date_ts."','".$date_dmy."','".$user_summ_to_pay."','".$user_id_to_pay."')";
  mysql_query($insert_history);
  echo "ok";

}


if($_GET['action']=='addMoney') {
  ?>
  <div class="" style="padding: 15px;">
    <h4 style="font-family: 'roboto';">
      Пополнить баланс
    </h4>
    <div class="" style="display: inline-block; width: 49%; vertical-align: top;">
      <div class="">
        <input type="text" placeholder="Пользователь" name="" id="user_name_to_pay" value="" style="background: rgba(255,255,255,.1);">
      </div>
      <div class="">
        <input type="text" placeholder="ID" name="" value="" id="user_id_to_pay" style="background: rgba(255,255,255,.1);">
      </div>
      <div class="">
        <input type="text" placeholder="Сумма" name="" id="user_summ_to_pay" value="" style="background: rgba(255,255,255,.1);">
      </div>
      <div class="sbtn" onclick="addBalanceToUser();">
        Пополнить баланс
      </div>
    </div>
    <div class="" style="display: inline-block; width: 49%; vertical-align: top;">
      <div class="gold">
        Лог пополнений баланса
      </div>
      <div class="">
        <?
        $q_pay_history = sprintf("SELECT * FROM pay_history ORDER BY id DESC");
        $r_pay_history = mysql_query($q_pay_history);
        $n_pay_history = mysql_numrows($r_pay_history);

        if ($n_pay_history > 0) {
            for ($i = 0; $i < $n_pay_history; $i++) {
                $pay_history_id = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.id"));
                $pay_history_date_ts = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.date_ts"));
                $pay_history_date_dmy = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.date_dmy"));
                $pay_history_summa = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.summa"));
                $pay_history_status = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.status"));
                $pay_history_comment = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.comment"));
                $pay_history_user_id = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.user_id"));
                ?>
                <p>User id: <?=$pay_history_user_id?> [<?=$pay_history_date_dmy;?>] + <?=$pay_history_summa;?> руб.</p>
                <?
            }
        }
        ?>
      </div>
    </div>
  </div>
  <?
};

if($_GET['action']=='adminmessage') {
  ?>
  <div class="" style="padding: 15px;">
    <h4 style="font-family: 'roboto';">Написать</h4>
    <div class="">
      <div class="">
        <input type="text" id="email_to" placeholder="Email кому" value="<?=$_POST['to_user'];?>" style="background: rgba(255,255,255,.1)">
      </div>
      <textarea name="name" rows="8" id="text_to" cols="80" placeholder="Сообщение" style="background: rgba(255,255,255,.1)"></textarea>
      <div class="">
        <div class="disactivebtn" onClick="sendMsgFromHelpDesk()">
          Отправить сообщение
        </div>
      </div>
    </div>
  </div>
  <?
}






 ?>
