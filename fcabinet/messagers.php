<?
$q_message_reports = sprintf("SELECT * FROM message_reports WHERE user_id = '".$_SESSION['user_id']."'");
$r_message_reports = mysql_query($q_message_reports);
$n_message_reports = mysql_numrows($r_message_reports);

if ($n_message_reports > 0) {
    for ($i = 0; $i < $n_message_reports; $i++) {
        $message_reports_week_report = htmlspecialchars(mysql_result($r_message_reports, $i, "message_reports.week_report"));
        $message_reports_new_fines_report = htmlspecialchars(mysql_result($r_message_reports, $i, "message_reports.new_fines_report"));
        $message_reports_id = htmlspecialchars(mysql_result($r_message_reports, $i, "message_reports.id"));
    }
}
?>
<div class="panelf">
  <div class="" style="padding: 10px; padding-top: 20px;">
    <div class="" style="padding:10px; display: inline-block; vertical-align: top;">
      Получать еженедельный отчет на email
    </div>
    <div id="toggles" style="margin-top: 13px; vertical-align: top; margin-left: 20px;">
      <input type="checkbox" name="checkbox1" id="checkbox1" onChange="clickCheck1()" class="ios-toggle" <? if($message_reports_week_report){ echo "checked";};?>/>
      <label for="checkbox1" class="checkbox-label" data-off="" data-on=""></label>
    </div>
    <div class=""></div>
    <div class=""  style="padding:10px; display: inline-block; vertical-align: top;">
      Отправлять оповещение о новых штрафах в момент появления в системе
    </div>
    <div id="toggles" style="margin-top: 13px; vertical-align: top;">
        <input type="checkbox" name="checkbox2" id="checkbox2" onChange="clickCheck2()"  class="ios-toggle" <? if($message_reports_new_fines_report){ echo "checked";};?>/>
        <label for="checkbox2" class="checkbox-label" data-off="" data-on=""></label>
      </div>
  </div>
</div>
