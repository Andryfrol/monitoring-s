<div class="" style="padding-bottom: 30px;">
    <div class="" style="padding: 10px; background: #f0f2f5; margin-bottom: 25px; border-bottom: 1px solid #ebebeb;">
        <h6 style="font-weight: 400; margin-bottom: 0px; font-size: 18px; color: #435183; padding: 2px; padding-left: 10px; ">Транспортное средство
            <span class="mcloser" title="Закрыть окно" onClick="closemodal()">
              x
            </span>
        </h6>
    </div>
    <div style="padding-left: 50px;">
  <div class="" style="display: inline-block; width: 270px;">
      <div class="flight">Номер СТС</div>
      <input id="stsnumberadd" type="text" placeholder="Серия и номер (без пробелов)">
  </div>
  <div class=""  style="display: inline-block; width: 270px;">
      <div class="flight">Название транспорта</div>
    <input id="nametransportadd" type="text" placeholder="Например Volvo">
  </div>
  <div class="clear">

  </div>
  <div class=""  style="display: inline-block; width: 270px;">
      <div class="flight"> Гос номер</div>
      <input id="gosnumbertransportadd" type="text"  placeholder="Например А700АВ199">
  </div>

    <?
    // Возможность добавить в группу если она есть
    $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND status='1' ORDER BY id DESC");
    $r_transport_group = mysql_query($q_transport_group);
    $n_transport_group = mysql_numrows($r_transport_group);

    if ($n_transport_group > 0) {
        ?>
        <div class=""  style="display: inline-block; width: 270px;">

          <div class="flight">Группа транспорта</div>
          <select class="transgroup" style="padding: 7px 10px;">
            <option value='0'>Не выбрана</option>
          <?
          for ($i = 0; $i < $n_transport_group; $i++) {

              $transport_group_name_group = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.name_group"));
              $transport_group_acl = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.acl"));
              $transport_group_status = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.status"));
              $transport_group_id = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.id"));
              ?>
              <option value='<?=$transport_group_id;?>'><?=$transport_group_name_group;?></option>
              <?
          }
          ?>
          </select>

        </div>
          <?
    };

    ?>
    <div class="clear">

    </div>
  <div class="groupsst-btn pointer"  onclick="saveTransport()" style="margin-right: 70px; margin-top: 10px;">
    Добавить
  </div>
  <div class="" style="clear: both;">

  </div>
    </div>
</div>
