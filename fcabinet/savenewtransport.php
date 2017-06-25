<?
session_start();
$sts = clear($_POST['stsnumberadd']);
$namet = clear($_POST['nametransportadd']);
$gos_num = clear($_POST['gosnumbertransportadd']);
$parent_company = $_SESSION['parentcompany'];
$transgroup = clear($_POST['group']);

// Проверить тариф
// Проверить кол-во добавленного транспорта

$qnttr = qnttransportisset();


$insert = "INSERT INTO transport (gosnumber,user_id,sts,car_name,parent_id,group_id) VALUES ('".$gos_num."','".$_SESSION['user_id']."','".$sts."','".$namet."','".$parent_company."','".$transgroup."')";
$r_insert = mysql_query($insert);
if($r_insert){
  echo 'ok';
} else {
  echo "bad";
}
?>
