
<div class="panelf" id="fulltransport">

  <div class="" style="padding: 10px;  vertical-align: top;">
    <h6 style="display: inline-block; margin-right: 5px;  vertical-align: top; position: relative;" class="pointer" onclick="renderer('transport')">
      <img id="mt_icon1" src="/images/interface/active_arrow.png" width="15" style="position: absolute; top: 0px; left: -0px; margin-top: 5px; margin-right: 2px; vertical-align: top;" alt="">
      <span style="vertical-align: top; margin-left: 25px; " id="f1trmenu">Мой транспорт</span>
    </h6>
    <h6 onClick="addTransport()" style="display: inline-block; color: #a8a9ab; margin-left: 35px; margin-right: 5px; vertical-align: top; position: relative;" class="pointer">
      <img id="addtsicon" src="/images/interface/active_arrow.png" width="15" style="opacity: 0;  position: absolute; top: 0px; left: -25px; margin-top: 5px; margin-right: 2px; vertical-align: top;" alt="">
      <span id="addtsspan">Добавить транспорт</span>
    </h6>
    <h6 onClick="addGroupTransport()" class="pointer" style=" color: #a8a9ab; display: inline-block; margin-left: 35px; vertical-align: top;  position: relative;">
      <img id="mt_icon3" src="/images/interface/active_arrow.png" width="15" style="opacity: 0; position: absolute; top: 0px; left: -25px; margin-top: 5px; margin-right: 2px; vertical-align: top;" alt="">
      <span id="tx_3uprgr">Управление группами</span>
    </h6>
  </div>
  <div class="">

  </div>
  <div class="trans_modal" style="display: none;">

  </div>
  <div class="transportchanger">
    <?
    $id_name_gr = getUserAutoGroupsName();

    $q_transport = sprintf("SELECT * FROM transport WHERE user_id = '".$_SESSION['user_id']."' ORDER BY id DESC");
    $r_transport = mysql_query($q_transport);
    $n_transport = mysql_numrows($r_transport);

    if ($n_transport > 0) {
      ?>
      <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1);border-top: 1px solid rgba(255,255,255,.1);">
        <div class="tdcellid" style="text-align: center;">
          №
        </div>
        <div class="tdcell_t">
          Название авто
        </div>
        <div class="tdcell_t">
          Гос номер
        </div>
        <div class="tdcell_t">
          Номер СТС
        </div>
        <div class="tdcell_t">
          Группа
        </div>
        <div class="tdcell_t">
          Настройки
        </div>
      </div>
      <?
        for ($i = 0; $i < $n_transport; $i++) {
            $transport_gosnumber = htmlspecialchars(mysql_result($r_transport, $i, "transport.gosnumber"));
            $transport_sts = htmlspecialchars(mysql_result($r_transport, $i, "transport.sts"));
            $transport_car_name = htmlspecialchars(mysql_result($r_transport, $i, "transport.car_name"));
            $transport_name_racer = htmlspecialchars(mysql_result($r_transport, $i, "transport.name_racer"));
            $transport_parent_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.parent_id"));
            $transport_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.id"));
            $transport_user_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.user_id"));
            $transport_group_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.group_id"));
            ?>
            <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1);">
              <div class="tdcellid"   style="text-align: center;">
                <?=$n_transport - $i;?>
              </div>
              <div class="tdcell_t">
                <?
                if(!$transport_car_name) {
                  echo "Без названия";
                } else {
                  echo $transport_car_name;
                }
                ?>
              </div>
              <div class="tdcell_t">
                <?
                if(!$transport_gosnumber) {
                  echo 'Номер не указан';
                } else {
                  echo $transport_gosnumber;
                }
                ?>
              </div>
              <div class="tdcell_t">
                <?=$transport_sts;?>
              </div>
              <div class="tdcell_t">
                <?
                if(!$transport_group_id) {
                  echo "Не опраделена";
                } else {
                  echo $id_name_gr[$transport_group_id];
                }
                ?>
              </div>
              <div class="tdcell_t">
                <span><img  class="pointer" src='/images/interface/change_trans_icon2.png'  onClick='transportOptions("<?=$transport_id;?>")'  title='Редактировать'  style='margin-left: 5px; vertical-align: top;'></span>
                <span><img src="/images/proddelete.png" width="14" onClick="deletTransportById(<?=$transport_id;?>)" title="Удалить транспортное средство <?=$transport_car_name;?>" style="cursor: pointer; margin-left: 15px; padding-top: 4px; vertical-align: top;" alt=""></span>
              </div>
            </div>
            <?
        }
    } else {
      ?>
      <p style="padding-left: 20px;">
        У вас еще не добавлены транспортные средства.<br/>
        Вы можете создать группы транспорта для удобного построяния отчетов,<br/>
        а так же для открытия доступа конкретных транспортных групп созданным менеджерам.
      </p>

      <?
    }
    ?>
  </div>
</div>
