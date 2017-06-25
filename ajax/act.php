<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
if($_GET['action']=='transport') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/transport.php");
}
if($_GET['action']=='addmanager') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/addmanager.php");
}

// if($_GET['action']=='changepwtpl') {
//   $user_id = $_SESSION['user_id'];
// }



if($_GET['action']=='plateji') {
  $q_pay_history = sprintf("SELECT * FROM pay_history WHERE user_id = '".$_SESSION['user_id']."' AND status ='1' ORDER BY id DESC");
  $r_pay_history = mysql_query($q_pay_history);
  $n_pay_history = mysql_numrows($r_pay_history);
  ?>
  <div class="gold" style="margin-bottom: 5px;">
    Платежи
  </div>

  <?
  if ($n_pay_history > 0) {
      for ($i = 0; $i < $n_pay_history; $i++) {
          $pay_history_id = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.id"));
          $pay_history_date_ts = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.date_ts"));
          $pay_history_date_dmy = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.date_dmy"));
          $pay_history_summa = htmlspecialchars(mysql_result($r_pay_history, $i, "pay_history.summa"));
          ?>
          <p><span style="font-size: 13px;"><?=$pay_history_date_dmy;?></span><br/>Пополнение баланса на <?=$pay_history_summa;?> руб.</p>
          <?
      }
  }

}

if($_GET['action']=='detailao') {
  ?>
  Детализация АО
  <?
}


if($_GET['action']=='make_report_group') {
  $from = strtotime($_POST['value_from']);
  $to = strtotime($_POST['value_to']);
  $from1 = $_POST['value_from'];
  $to1 = $_POST['value_to'];
  $array_groups = $_POST['groups_report_array'];
  $count_gr = count($array_groups); // Количество ID переданных групп
  if($count_gr==0) { echo 'bad'; exit;}
  $get_car_name_sts_car_name = get_car_name_sts_car_name(); // [sts]=CarName
  ?>
  <div class="" style="padding-right: 10px; padding-left: 10px;">
    Групповой отчет по штрафам за период с <?=$from1;?> по <?=$to1;?>
    <span onclick="exportDataToExcell2()" style="float: right; vertical-align: top;   margin-right: 10px; cursor: pointer;  line-height: 1.5;"><img src="/images/export_excell.gif" alt=""><small style="padding-left: 5px; font-size: 13px;  vertical-align: top;">Экспорт в Excell</small></span>
    <span onclick="print_file('rep_exp','asdads')" style="float: right; vertical-align: top;  margin-right: 20px; cursor: pointer;   line-height: 1.5;"><img src="/images/printer_icon.png" alt=""><small style="padding-left: 5px; font-size: 13px; vertical-align: top;">Печать</small></span>
  </div>
  <div class="" style="padding: 10px;">
    <?
    $get_group_trans_by_user_id = get_group_trans_by_user_id();
    $gos_and_grup_id = gos_and_grup_id();
    for ($gr_count_num=0; $gr_count_num < $count_gr; $gr_count_num++) {
    ?>
    <div class="" style="margin-top: 20px;">
      <span class="gold" style="padding: 10px 0;"><?=$get_group_trans_by_user_id[$array_groups[$gr_count_num]];?></span>
    </div>
    <?
    // Берем CNC машин всех групп
    $q_transport = sprintf("SELECT * FROM transport WHERE group_id = '".$array_groups[$gr_count_num]."' AND user_id = '".$_SESSION['user_id']."'");
    $r_transport = mysql_query($q_transport);
    $n_transport = mysql_numrows($r_transport);
    $sts_list = '';

    if ($n_transport > 0) {
        for ($i = 0; $i < $n_transport; $i++) {
           $transport_sts = htmlspecialchars(mysql_result($r_transport, $i, "transport.sts"));
           if($i==0) {
             $sts_list .= "'".$transport_sts."'";
           } else {
             $sts_list .= ",'".$transport_sts."'";
           };
        }
    }
    // Берем по ним штрафы
    //

    $q_new_blank_data = sprintf("SELECT * FROM new_blank_data WHERE sts_n IN (".$sts_list.") AND status = 1 AND dat_timestamp <=".$to." AND dat_timestamp >=".$from." ORDER BY dat_timestamp DESC");

    $r_new_blank_data = mysql_query($q_new_blank_data);
    $n_new_blank_data = mysql_numrows($r_new_blank_data);

    if ($n_new_blank_data > 0) {
      ?>
      <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1); border-top: 1px solid rgba(255,255,255,.1); border-right: 1px solid rgba(255,255,255,.1);">
          <div class="tdcell" style="width: 80px;">
            Дата
          </div>
          <div class="tdcell">
            Сумма штрафа
          </div>
          <div class="tdcell" >
            Гос номер
          </div>
          <div class="tdcell">
            Название авто
          </div>
          <div class="tdcell">
            Номер СТС
          </div>
          <div class="tdcell_post">
             Постановление
          </div>
          <div class="tdcell" style="width: 80px;">
            &nbsp;
          </div>
        </div>
      <?
        $total = '';
        for ($i = 0; $i < $n_new_blank_data; $i++) {
            $new_blank_data_sts_n = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.sts_n"));
            $new_blank_data_l_unic_num_shtr = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.l_unic_num_shtr"));
            $new_blank_data_bank_billdate = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_billdate"));
            $new_blank_data_bank_sign = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_sign"));
            $new_blank_data_bank_oktmo = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_oktmo"));
            $new_blank_data_bank_kbk = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_kbk"));
            $new_blank_data_bank_username = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_username"));
            $new_blank_data_bank_bik = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_bik"));
            $new_blank_data_bank_purpose = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_purpose"));
            $new_blank_data_bank_bankname = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_bankname"));
            $new_blank_data_bank_acc = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_acc"));
            $new_blank_data_bank_kpp = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_kpp"));
            $new_blank_data_bank_inn = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_inn"));
            $new_blank_data_bank_soiname = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_soiname"));
            $new_blank_data_ispaid = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.ispaid"));
            $new_blank_data_totalamount = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.totalamount"));
            $new_blank_data_discountdate = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.discountdate"));
            $new_blank_data_discountsize = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.discountsize"));
            $new_blank_data_location = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.location"));
            $new_blank_data_articlecode = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.articlecode"));
            $new_blank_data_feesrv = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.feesrv"));
            $new_blank_data_payeridentifier = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.payeridentifier"));
            $new_blank_data_type = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.type"));
            $new_blank_data_dat_timestamp = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.dat_timestamp"));
            $new_blank_data_addinfo = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.addinfo"));
            $new_blank_data_dat = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.dat"));
            $new_blank_data_b_sum = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.b_sum"));
            $new_blank_data_id_zadachi = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.id_zadachi"));
            $new_blank_data_time_zadachi = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.time_zadachi"));
            $new_blank_data_id = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.id"));

            // Дата ! Сумма штрафов ! Гос номер ! Название авто ! Номер стс ! № пост ! Оплатить
            $new_blank_data_totalamount = ($new_blank_data_totalamount * 100)/100;
            $total = $total + $new_blank_data_totalamount;
            // echo "string";
            // echo "~".$new_blank_data_totalamount."~".."~ ~".$new_blank_data_sts_n."~".$new_blank_data_l_unic_num_shtr."~Оплатить~";
            ?>
            <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1); border-right: 1px solid rgba(255,255,255,.1);">
                <div class="tdcell" style="width: 80px;">
                  <?=$new_blank_data_dat;?>
                </div>

                <div class="tdcell">
                  <?=$new_blank_data_b_sum;?> руб.
                </div>
                <div class="tdcell">
                  <?=$gos_and_grup_id[$new_blank_data_sts_n][1];?>
                </div>
                <div class="tdcell">
                  <?
                  mb_internal_encoding("UTF-8");

                  $carname = mb_substr($get_car_name_sts_car_name[$new_blank_data_sts_n],0,10);
                  echo $carname;
                  if(strlen($get_car_name_sts_car_name[$new_blank_data_sts_n]) < 11) {

                  } else {
                    echo ' ..';
                  }
                  ?>
                </div>
                <div class="tdcell">
                  <?=$new_blank_data_sts_n;?>
                </div>
                <div class="tdcell_post">
                   <?=$new_blank_data_l_unic_num_shtr;?>
                </div>
                <div class="tdcell" style="width: 80px; ">
                  <a target="_blank" href="/оплатить-штраф?num=<?=$new_blank_data_l_unic_num_shtr?>&go=pay&summ=<?=$new_blank_data_b_sum;?>&summ2=<?=$new_blank_data_feesrv;?>" style="color: #c8c8c8;">Оплатить</a>
                </div>
              </div>
            <?
        }
      ?>
      <div class="gold" style="margin-top: 5px;">
        Cумма штрафов <?=$total;?> руб.
      </div>
      <?
    } else {
      echo "штрафы не найденны<br/>";
    }

    ?>


    <?
    // echo "<pre>";
    // var_dump($array_groups);
    // echo "</pre>";
      # code...
    } // Вышли из цикла FOR
    ?>
  </div>
  <?
}

if($_GET['action']=='changepwaction') {
  $choldpw =  clear($_POST['choldpw']);
  $chnewpw1 =  clear($_POST['chnewpw1']);
  $chnewpw2 =  clear($_POST['chnewpw2']);
  $choldpwmd5 = md5($choldpw);
  // Проверить пользователя c ID и PASS
  $check = "SELECT id FROM user WHERE id='".$_SESSION['user_id']."' AND password='".$choldpwmd5."'";
  $checking = mysql_query($check);
  $n_checking = mysql_numrows($checking);

  if($n_checking==1) {// ok
    if($chnewpw1==$chnewpw2) {
      $chnewpw1md5 = md5($chnewpw1);
      // upd password
      $update_pass = "UPDATE user SET password='".$chnewpw1md5."' WHERE id='".$_SESSION['user_id']."' AND password='".$choldpwmd5."'";
      $upd = mysql_query($update_pass);
      if($upd){
        // sending to email repass message
        echo "ok";
      } else {
        echo "bad";
      }


    }
  } else {
    echo "bad_old_pass";
  }

}



if($_GET['action']=='delgrouptrans_byid') {
  $id_group = clear($_POST['group_id']);
  $delet_group = "UPDATE transport_group SET status='0' WHERE user_id='".$_SESSION['user_id']."' AND id='".$id_group."'";
  $del = mysql_query($delet_group);
  $update_this_transport = "UPDATE transport SET group_id='0' WHERE user_id='".$_SESSION['user_id']."' AND group_id='".$id_group."'";
  $upd = mysql_query($update_this_transport);
  if($del) {
    echo 'ok';
  } else {
    echo "bad";
  };
}

if($_GET['action']=='farif') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/farif.php");
}
if($_GET['action']=='registercompany') {
  include_once($_SERVER['DOCUMENT_ROOT']."/php/register.php");
}
if($_GET['action']=='delettransport') {
  // include_once($_SERVER['DOCUMENT_ROOT']."/php/register.php");

  // Можно ли удалить мне этот транспорт
}


// Редактор транспортного средства
if($_GET['action']=='redactor_ts') {
  $tsid = clear($_POST['tsid']);
  $q_transport = sprintf("SELECT * FROM transport WHERE id = '".$tsid."' AND user_id = '".$_SESSION['user_id']."'");
  $r_transport = mysql_query($q_transport);
  $n_transport = mysql_numrows($r_transport);

  if ($n_transport > 0) {
      for ($i = 0; $i < $n_transport; $i++) {
          $transport_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.id"));
          $transport_gosnumber = htmlspecialchars(mysql_result($r_transport, $i, "transport.gosnumber"));
          $transport_user_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.user_id"));
          $transport_group_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.group_id"));
          $transport_sts = htmlspecialchars(mysql_result($r_transport, $i, "transport.sts"));
          $transport_car_name = htmlspecialchars(mysql_result($r_transport, $i, "transport.car_name"));
          $transport_name_racer = htmlspecialchars(mysql_result($r_transport, $i, "transport.name_racer"));
          $transport_parent_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.parent_id"));
      }
  }
  ?>
  <div class="" style="padding-left: 20px;">
    <div class="">
      <h6>Редактор транспорта <span style="margin-left: 80px;"><img src="/images/proddelete.png" width="16" title="Закрыть редактор транспорта" style="cursor: pointer; padding-top: 4px; vertical-align: top; margin-top: -1px;" alt="" onClick="renderer('transport')"></span></h6>
    </div>
    <div class="">
      Название транспорта
      <input type="text" id="upd_name_transport" placeholder="Название транспорта" value="<?=$transport_car_name;?>" style="background: rgba(255,255,255,.2); padding: 7px 10px;">
    </div>
    <div class="">
      Гос. номер
      <input type="text" id="upd_gos_num_transport" placeholder="Гос. номер" value="<?=$transport_gosnumber;?>" style="background: rgba(255,255,255,.2); padding: 7px 10px;">
    </div>
    <div class="">
      Номер СТС
      <input type="text" id="upd_sts_numberdata" placeholder="Номер СТС" value="<?=$transport_sts;?>" style="background: rgba(255,255,255,.2); padding: 7px 10px;">
    </div>
    <?
    $id_name_group = getUserAutoGroupsName();
    $count_group = count($id_name_group);
    if($count_group!=0) {
      ?>
      <div class="" style="cursor: default; position: relative; display: inline-block;">
        Группа транспорта <small>^</small>
      </div>


      <select class="trans_rpout_id_upd" style="padding: 7px 10px; background: rgba(255,255,255,.2);">

      <?
      if($transport_group_id==0) {
        ?>
        <option value="0">Не определена</option>
        <?
        $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND status = 1");
        $r_transport_group = mysql_query($q_transport_group);
        $n_transport_group = mysql_numrows($r_transport_group);

        if ($n_transport_group > 0) {
            for ($i = 0; $i < $n_transport_group; $i++) {
                $transport_group_id = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.id"));
                $transport_group_name_group = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.name_group"));
                ?>
                <option style="background: rgba(255,255,255,.2);" value="<?=$transport_group_id;?>"><?=$transport_group_name_group;?></option>
                <?
            }
        }
      } else {
        ?>
        <option value="<?=$transport_group_id;?>"><?=$id_name_group[$transport_group_id];?></option>
        <?
          $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND status = 1");
          $r_transport_group = mysql_query($q_transport_group);
          $n_transport_group = mysql_numrows($r_transport_group);

          if ($n_transport_group > 0) {
              for ($i = 0; $i < $n_transport_group; $i++) {
                  $transport_group_id2 = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.id"));
                  $transport_group_name_group2 = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.name_group"));
                  if($transport_group_id2!=$transport_group_id) {
                  ?>
                    <option value="<?=$transport_group_id2;?>"><?=$transport_group_name_group2;?></option>
                  <?
                  }
              }
          }
        ?>
        <option value="0">Не определена</option>
        <?
      }
      ?>

      </select>
      <?
    } else {
      ?>
        <input type="text" class="trans_rpout_id_upd" style="display: none;" value="0">
      <?
    }
    ?>
    <div class="disactivebtn" onclick="updateTransportData('<?=$transport_id;?>')">
      Сохранить изменения
    </div>
    <br><br>
  </div>
  <?
}


if($_GET['action']=='hepdeskMsg') {
  $help_name = clear($_POST['help_name']);
  $help_company = clear($_POST['help_company']);
  $help_text = clear($_POST['help_text']);
  $curr_date = time();
  $date_dmy = date('d-m-Y',time());
  $insert_mgs = "INSERT INTO helpdesk (name,company,email,message,curr_date,date_dmy) VALUES ('".$help_name."','".$help_name."','".$help_company."','".$help_text."','".$curr_date."','".$date_dmy."')";
  $sql = mysql_query($insert_mgs);

};


// Обновление данных транспорта (сохранение обновленных данных)
if($_GET['action']=='updateTransportData') {
  $id_transport = clear($_POST['transportId']);
  $upd_name_transport = clear($_POST['upd_name_transport']);
  $upd_gos_num_transport = clear($_POST['upd_gos_num_transport']);
  $upd_sts_numberdata = clear($_POST['upd_sts_numberdata']);
  $trans_rpout_id_upd = clear($_POST['trans_rpout_id_upd']);
  $upd = "UPDATE transport SET gosnumber='".$upd_gos_num_transport."',car_name='".$upd_name_transport."',sts='".$upd_sts_numberdata."',group_id='".$trans_rpout_id_upd."' WHERE id='".$id_transport."' AND user_id='".$_SESSION['user_id']."'";
  $msq = mysql_query($upd);
  if($msq) {
    echo "ok";
  } else {
    echo "bad";
  }
}

if($_GET['action']=='changeGropuTransportBtn') {
  $group_id = (int)$_POST['id_group'];
  $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND id = '".$group_id."' LIMIT 1");
  $r_transport_group = mysql_query($q_transport_group);
  $n_transport_group = mysql_numrows($r_transport_group);
  ?>
    <div class="" style="padding-left: 25px;">
      <h6>Редактор группы транспорта<span style="float: right;">X</span></h6>


  <?
  if ($n_transport_group > 0) {
      for ($i = 0; $i < $n_transport_group; $i++) {
          $transport_group_name_group = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.name_group"));
          $transport_group_id = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.id"));
          echo '<p>Название группы ТС</p>';
          echo '<input type="text" style="background: rgba(255,255,255,.2); padding: 7px;" class="group_id_'.$transport_group_id.'" value="'.$transport_group_name_group.'">';
          echo '<div class="disactivebtn" onClick="saveGroupName('.$transport_group_id.')">Сохранить изминения</div>';
      }
  }
  ?>
    </div>
  <?
}


if($_GET['action']=='saveGroupName') {
  $id_group = (int)$_POST['id_group'];
  $name_group = clear($_POST['newName']);
  $update = "UPDATE transport_group SET name_group='".$name_group."' WHERE id='".$id_group."' AND user_id='".$_SESSION['user_id']."'";
  $sql = mysql_query($update);
  echo 'ok';
}


if($_GET['action']=='addgrouptransportsend') {
  $grouptsname = $_POST['grouptsname'];
  $insert_group = "INSERT INTO transport_group (name_group,user_id) VALUES ('".$grouptsname."','".$_SESSION['user_id']."')";
  $ins = mysql_query($insert_group);
  if($ins) {
    echo "ok";
  } else {
    echo "bad";
  }
}

if($_GET['action']=='addgrouptransport') {
?>
<div class="" style="padding-left: 15px;">

    <div class="items_group">
      <div class="column one-second" style="margin-bottom: 0px;">
        <div class="">
          <h6>
              Добавление группы транспортных средств</h6>
        </div>
        <div class="">
          <p>Название группы</p>
          <input type="text" value="" id="grouptsname" placeholder="Название группы ТС" style="background: rgba(255,255,255,.2); padding: 7px 10px;">
        </div>
        <div class="disactivebtn" onClick="addGroupTransportTS()">
          Добавить группу
        </div>
      </div>
      <div class="column one-second" style="margin-bottom: 0px;">
        <div class="">
          <h6>Мои группы транспортных средств</h6>
        </div>
        <?
        $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND status='1' ORDER BY id DESC");
        $r_transport_group = mysql_query($q_transport_group);
        $n_transport_group = mysql_numrows($r_transport_group);

        if ($n_transport_group > 0) {
            for ($i = 0; $i < $n_transport_group; $i++) {

                $transport_group_name_group = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.name_group"));
                $transport_group_acl = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.acl"));
                $transport_group_status = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.status"));
                $transport_group_id = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.id"));
                ?>
                <div class="" style="background: rgba(255,255,255,.2); font-weight: 300; padding: 5px; border: 1px solid rgba(255,255,255,.2); padding-left: 15px; padding-right: 10px; margin-bottom: 5px; border-radius: 50px; ">

                  <span style="cursor: pointer;" onClick="changeGropuTransportBtn(<?=$transport_group_id;?>)"><?=$transport_group_name_group?></span>
                  <div class="" style="float: right;">
                    <span style="margin-right: 15px; vertical-align: top;" class="pointer">
                      <img src="/images/interface/change_trans_icon2.png" title="Редактировать" onClick="changeGropuTransportBtn(<?=$transport_group_id;?>)" alt="" style=" vertical-align: top;">
                    </span>
                    <span onClick="deletTransportGroup(<?=$transport_group_id;?>)" style="">
                      <img
                      src="/images/proddelete.png"
                      width="16" title="Удалить группу <?=$transport_group_name_group;?>"
                      style="cursor: pointer; float: right; padding-top: 4px; vertical-align: top; margin-top: -1px;"
                      alt="">
                    </span>

                  </div>
                  <div class="clear">

                  </div>
                </div>
                <?
            }
        } else {
          echo "У вас нет ни одной группы транспортных средств";
        }
        ?>


      </div>
    </div>


</div>
<?
}


if($_GET['action']=='loadpayform') {
  $summ = (int)$_POST['summ'];
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/paymant/main.php");
}


if($_GET['action']=='popolnenie') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/paymant/addformbalance.php");
}

if($_GET['action']=='updatereportweek') {
  $status = (int)$_POST['status'];
  $user_id = $_SESSION['user_id'];
  $update = "UPDATE message_reports SET week_report='".$status."' WHERE user_id='".$user_id."'";
  $del_user = mysql_query($update);
}
if($_GET['action']=='updaterepornewfines') {
  $user_id = $_SESSION['user_id'];
  $status = (int)$_POST['status'];
  $update = "UPDATE message_reports SET new_fines_report='".$status."' WHERE user_id='".$user_id."'";
  $del_user = mysql_query($update);
}

if($_GET['action']=='delettransportbyid') {
  $transport_id = (int)$_POST['id_transport'];
  $user_id = $_SESSION['user_id'];
  $delet = "DELETE FROM transport WHERE user_id='".$user_id."' AND id='".$transport_id."'";
  $del_trans = mysql_query($delet);
  if($del_trans) {
    echo 'ok';
  } else {
    echo 'bad';
  };
}


if($_GET['action']=='savenewtransport') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/savenewtransport.php");
}
if($_GET['action']=='addnewtransport') { // добавление транспорта
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/addnewtransport.php");
}
if($_GET['action']=='options') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/options.php");
}
if($_GET['action']=='fines') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/getfines.php");
}
if($_GET['action']=='managers') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/manager.php");
}

if($_GET['action']=='addmoney') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/addmoney.php");
}

if($_GET['action']=='messagers') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/messagers.php");

}

if($_GET['action']=='deletmanader') {
  $id = clear($_POST['manager_id']);
  $delet = "DELETE FROM user WHERE parentcompany='".$_SESSION['user_id']."' AND id='".$id."'";
  $del_user = mysql_query($delet);
  if($del_user) {
    echo 'ok';
  } else {
    echo 'bad';
  };
}

if($_GET['action']=='reports') {
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/reports.php");

}

if($_GET['action']=='administration') {
  ?>
  <div class="panelf">
    <div class="" style="padding: 10px;">
      <div class="adminmenu">
        <span style="margin-left: 15px;" class="pointer" onClick="adminActivity()">Активность</span>
        <span style="margin-left: 15px;" class="pointer" onClick="adminBalance()">Баланс</span>
        <span style="margin-left: 15px;" class="pointer" onclick="adminTarif()">Тариф</span>
        <span style="margin-left: 15px;" class="pointer" onclick="adminMailer()">Рассылка</span>
        <span style="margin-left: 15px;" class="pointer" onclick="adminCrons()">Crons</span>
        <span style="margin-left: 15px;" class="pointer" onclick="adminUsers()">Пользователи</span>
        <span style="margin-left: 15px;" class="pointer" onclick="adminAnaliz()">Аналитика</span>
        <span style="margin-left: 15px;" class="pointer" onclick="adminHelpDesk()">HDesk</span>
        <span style="margin-left: 15px;" class="pointer" onclick="adminMsg()">Написать</span>
        <span style="margin-left: 15px;" class="pointer" onclick="todoList()">TODO</span>
    
        <span style="margin-left: 15px;" class="pointer" onClick="adminAddMoney()">Add $</span>
      </div>
      <div class="adminchanger">

      </div>
    </div>
  </div>
  <?

}



if($_GET['action']=='addnewmanager') {

  $parent_company = $_SESSION['user_id'];
  $fio_manager = clear($_POST['fio_manager']);
  $password_manager = clear($_POST['password_manager']);
  $text_pw = $password_manager;
  $password_manager = MD5($password_manager);
  $email_manager = clear($_POST['email_manager']);
  // Проверка емайла на повтор в базе данных
  $issetEmail = issetEmail($email_manager);
  if($issetEmail) {
    echo 'Такой email уже существует в системе';
  } else {
    $insertManager = sprintf("INSERT INTO user (name,password,email,parentcompany,text_pw,curr_date) VALUES ('".$fio_manager."','".$password_manager."','".$email_manager."','".$parent_company."','".$text_pw."','".time()."')");
    $r_user = mysql_query($insertManager);
    echo ok;
  }

}


if($_GET['action']=='register') {

}

if($_GET['action']=='gopaytarif') {
   $num = $_POST['numTarif'];
   switch ($num) {
     case '1':
       $summ = 50;
       $planname = 'Базовый';
       break;
     case '2':
       $planname = 'Стандарт';
       $summ = 100;
       break;
     case '3':
      $planname = 'Ультиматум';
       $summ = 150;
       break;
     case '4':
      $planname = 'Корпорация';
       $summ = 250;
       break;
     default:
       # code...
       break;
   }

  ?>
  <div class="panelf">
    <div class="" style="padding: 10px;">
      <h6 class="pointer"><span  onClick="renderer('farif')">Тарифный план</span> <span style="margin-left: 30px;">Оплата</span></h6>
    </div>
    <div class="" style="padding-left: 15px;">
      <?

      $textpayform = "Оплата тарифного плана ".$planname.". Пользователь ".$_SESSION['name']."_id15".$_SESSION['user_id'];
      ?>
      <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/quickpay/shop-widget?account=410013204469379&quickpay=shop&payment-type-choice=on&mobile-payment-type-choice=on&writer=seller&targets=<?=$textpayform;?>&default-sum=<?=$summ;?>&button-text=01&fio=on&mail=on&successURL=http%3A%2F%2Fxn----8sbgbya0aicgcfuexg0b6d.xn--p1ai%2F%25D0%25BE%25D0%25BF%25D0%25BB%25D0%25B0%25D1%2587%25D0%25B5%25D0%25BD%25D0%25BE" width="450" height="198"></iframe>

    </div>
  </div>
  <?
}

if($_GET['action']=='openthedoor') {
  $login = clear($_POST['loginis']);
  $password = clear($_POST['passis']);
  $password = md5($password);

  $q_user = sprintf("SELECT * FROM user WHERE password = '".$password."' AND email = '".$login."' LIMIT 1");
  $r_user = mysql_query($q_user);
  $n_user = mysql_numrows($r_user);

  if ($n_user > 0) {

      for ($i = 0; $i < $n_user; $i++) {
          $user_id = htmlspecialchars(mysql_result($r_user, $i, "user.id"));
          $user_parentcompany = htmlspecialchars(mysql_result($r_user, $i, "user.parentcompany"));
          $user_name = htmlspecialchars(mysql_result($r_user, $i, "user.name"));
          $user_admin = htmlspecialchars(mysql_result($r_user, $i, "user.admin"));

      }
      $_SESSION['auth'] = true;
      $_SESSION['user_id'] = $user_id;
      $_SESSION['name'] = $user_name;
      $_SESSION['admin'] = $user_admin;
      $_SESSION['parentcompany'] = $user_parentcompany;
      if(!$user_parentcompany) {
        // save log login
        logLogin($user_id);
        $_SESSION['company'] = true;
      };
      echo "ok";
  } else {
    echo 'bad';
  }


}


 ?>
