<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");

?>


<div class="" style="padding: 10px;">
  <h4 style="font-family: 'roboto'; display: inline-block;">Выбирите транспортные средства</h4>
  <div class="">
    <?
    $q_transport = sprintf("SELECT * FROM transport WHERE user_id = '".$_SESSION['user_id']."' ORDER BY car_name ASC");
    $r_transport = mysql_query($q_transport);
    $n_transport = mysql_numrows($r_transport);

    if ($n_transport > 0) {
      for ($i = 0; $i < $n_transport; $i++) {
          $transport_sts = htmlspecialchars(mysql_result($r_transport, $i, "transport.sts"));
          $transport_car_name = htmlspecialchars(mysql_result($r_transport, $i, "transport.car_name"));
          $transport_gosnumber = strtoupper(htmlspecialchars(mysql_result($r_transport, $i, "transport.gosnumber")));
          $transport_id = htmlspecialchars(mysql_result($r_transport, $i, "transport.id"));
          ?>
          <div class="" style="padding: 5px; background: rgba(255,255,255,.2); margin-bottom: 11px;">
            <div class="" name="<?=$transport_id?>" style="cursor: pointer; margin-left: 4px; vertical-align: top; margin-top: 4px; display: inline-block; width: 16px; height: 16px; background: #ccc;">
              <img src="/images/icons/graph12 (1).png" alt="">
            </div>
            <div class="" style="vertical-align: top; padding-left: 10px; display: inline-block; width: 200px;">
              <?=$transport_car_name?>
            </div>
            <div class="" style="vertical-align: top; display: inline-block;">
              <?=$transport_gosnumber?>
            </div>


          </div>
          <?
      }
    }
    ?>
  </div>
</div>

<splitter>

<div class="" style="padding-top: 10px;">
  <h4 style="font-family: 'roboto'; display: inline-block;">
    Выберите период
  </h4>
  <div class="">
    Календарь ОТ - ДО
  </div>
  <div class="">

  </div>
</div>
