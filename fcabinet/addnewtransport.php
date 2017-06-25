<div class="" style="padding-left:25px; padding-bottom: 30px;">
  <div class="" style="display: inline-block; width: 270px;">
    * Номер СТС
    <input id="stsnumberadd" type="text"  style="background: rgba(255,255,255,.2); padding: 7px 10px;">
  </div>
  <div class=""  style="display: inline-block; width: 270px;">
    Название транспорта
    <input id="nametransportadd" type="text" style="background: rgba(255,255,255,.2); padding: 7px 10px;">
  </div>
  <div class="clear">

  </div>
  <div class=""  style="display: inline-block; width: 270px;">
    Гос номер
    <input id="gosnumbertransportadd" type="text"   style="background: rgba(255,255,255,.2); padding: 7px 10px;">
  </div>

    <?
    // Возможность добавить в группу если она есть
    $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND status='1' ORDER BY id DESC");
    $r_transport_group = mysql_query($q_transport_group);
    $n_transport_group = mysql_numrows($r_transport_group);

    if ($n_transport_group > 0) {
        ?>
        <div class=""  style="display: inline-block; width: 270px;">

          Группа транспорта
          <select class="transgroup" style="background: rgba(255,255,255,.2); padding: 7px 10px;">
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
  <div class="disactivebtn" onclick="saveTransport()" style="margin-top: 10px;">
    Добавить
  </div>
  <div class="" style="clear: both;">

  </div>
</div>
