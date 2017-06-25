<?
$var = '{"257":{"Prfx":257,"1":{"BAT_mV":33,"GPS_ANT_mV":4238,"DC_mV":4412,"BAT_RTC_mV":3241,"SWIRE_mV":0,"GSM_mV":4343}}}';
echo "<pre>";
print_r(json_decode($var));
// echo "TEST";
echo "</pre>";
