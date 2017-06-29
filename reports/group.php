<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
// Отчет по группам

// Проверить существование групп автотранспорта
?>
<div class="text-report-ll">
    Выбирите группы для построения отчета
</div>
<div class="" style="margin-top: 17px; padding-left: 20px;">

  <?
  $q_transport_group = sprintf("SELECT * FROM transport_group WHERE user_id = '".$_SESSION['user_id']."' AND status = 1");
  $r_transport_group = mysql_query($q_transport_group);
  $n_transport_group = mysql_numrows($r_transport_group);

  if ($n_transport_group > 0) {
      for ($i = 0; $i < $n_transport_group; $i++) {
          $transport_group_id = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.id"));
          $transport_group_name_group = htmlspecialchars(mysql_result($r_transport_group, $i, "transport_group.name_group"));
          ?>
          <label for="group<?=$transport_group_id;?>" style="font-weight: 400; vertical-align: top; font-family: 'roboto'; color: #444; cursor: pointer;">
          <input type="checkbox" style="width: 16px; height: 16px;" name="" id="group<?=$transport_group_id;?>" onclick="groups_id_array('<?=$transport_group_id;?>')">
          <?=$transport_group_name_group;?>
          </label>
          <?
      }
  }
  ?>

</div>

<splitter>

<div class="" style="margin-top: 42px; padding-left: 0px; margin-left: -3px;">
  <div class="report-make-period">
      Укажите период отчета
  </div>

</div>
<div class="" style="margin-top: 15px; padding-left: 20px;">
  <div class="" style="display: inline-block">
    <small>Начало периода</small><br/>
    <input id="dater" type="date" data-date="" data-date-format="DD MMMM YYYY" value="<?=date('Y-m-d', time()-2678400);?>"><br/>
  </div>
  <div class="" style="display: inline-block; margin-left: 20px;">
    Конец периода<br/>
    <input id="dater2" type="date" data-date="" data-date-format="DD MMMM YYYY" value="<?=date('Y-m-d', time());?>"><br/>
  </div>


</div>
<div class="addstbtn pointer" style="margin-top: 20px; margin-left: 200px;" onClick="makeReportGroup()">
  Построить отчет
</div>


<!-- JS -->

<script type="text/javascript">
    jQuery("#dater").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
  }).trigger("change")

  jQuery("#dater2").on("change", function() {
  this.setAttribute(
      "data-date",
      moment(this.value, "YYYY-MM-DD")
      .format( this.getAttribute("data-date-format") )
  )
}).trigger("change")
</script>
