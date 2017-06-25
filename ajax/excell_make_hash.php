<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
// Сохранить массив в excell_export_objects
if($_GET['action']=='makehash') {
    $ids_blanks = $_POST['ids_blanks'];
    $strIdsSts = implode(",", $ids_blanks);
    $strIdsSts = clear($strIdsSts);
    $hash =md5($_SESSION['user_id'].time());
    $hashToDb = substr($hash, 0, 7);
    $insert_report_objects = "INSERT excell_export_objects (objs,hashick,curr_time,user_id) VALUES ('".$strIdsSts."','".$hashToDb."','".time()."','".$_SESSION['user_id']."')"; // Isset STS nums
    $ins = mysql_query($insert_report_objects);
    echo $hashToDb;
    exit;
}
?>
