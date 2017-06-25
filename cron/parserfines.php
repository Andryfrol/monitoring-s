<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/yadro/crn/api.php');

$time_zadachi = time();
$id_zadachi = 1;

$api=new _API();
$dat['top']=1;
$dat['id']="R052887532031";
$api_key='dsgn2Y7mn97aMNs';
$hash = md5($dat['id'].$dat['top'].$api_key);
$dat['hash'] = $hash;
$dat['type'] = 10;

$getStsNumbers = "SELECT sts FROM transport";
$sel = mysql_query($getStsNumbers);
$n_sel = mysql_numrows($sel);

if ($n_sel > 0) {
    for ($i = 0; $i < $n_sel; $i++) {
        $dat['sts'] = htmlspecialchars(mysql_result($sel, $i, "transport.sts"))."<br/>";
        $ret = $api->sendQUERY($dat);
        foreach ($ret['l'] as $blank) {
            $n_sts = $dat['sts'];
            $sum = $blank['sum'];
            $addinfo = $blank['addinfo'];
            $dat_str = $blank['dat'];
            $type = (int)$blank['type'];
            $feesrv = $blank['feesrv'];
            $payeridentifier = $blank['PAYERIDENTIFIER'];
            $articlecode = $blank['ARTICLECODE'];
            $location = $blank['LOCATION'];
            $discountsize = $blank['DISCOUNTSIZE'];
            $discountdate = $blank['DISCOUNTDATE'];
            $totalamount = $blank['TOTALAMOUNT'];
            $ispaid = $blank['ISPAID'];
            $bank = $blank['BANK']; // Массив данных банка получателя
            $bank_soiname = $bank['SOINAME'];
            $bank_inn = $bank['INN'];
            $bank_kpp = $bank['KPP'];
            $bank_acc = $bank['ACC'];
            $bank_bankname = $bank['BANKNAME'];
            $bank_bik = $bank['BIK'];

            $bank_purpose = $bank['PURPOSE'];

            $l_unic_num_shtr = explode("№", $bank_purpose);
            $l_unic_num_shtr = explode(" ", $l_unic_num_shtr[1]);
            $l_unic_num_shtr = explode(";", $l_unic_num_shtr[0]);
            $l_unic_num_shtr = $l_unic_num_shtr[0];

            $bank_username = $bank['USERNAME'];
            $bank_kbk = $bank['KBK'];
            $bank_oktmo = $bank['OKTMO'];
            $bank_sign = $bank['SIGN'];
            $bank_billdate  = $bank['BILLDATE'];
            $insert_new_blank = "INSERT INTO new_blank_data (sts_n,time_zadachi,id_zadachi,b_sum,addinfo,dat,type,feesrv,payeridentifier,articlecode,location,discountsize,discountdate,totalamount,ispaid,bank_soiname,bank_inn,bank_kpp,bank_acc,bank_bankname,bank_bik,bank_purpose,bank_username,bank_kbk,bank_oktmo,bank_sign,bank_billdate,l_unic_num_shtr) VALUES ('".$n_sts."','".$time_zadachi."','".$id_zadachi."','".$sum."','".$addinfo."','".$dat_str."','".$type."','".$feesrv."','".$payeridentifier."','".$articlecode."','".$location."','".$discountsize."','".$discountdate."','".$totalamount."','".$ispaid."','".$bank_soiname."','".$bank_inn."','".$bank_kpp."','".$bank_acc."','".$bank_bankname."','".$bank_bik."','".$bank_purpose."','".$bank_username."','".$bank_kbk."','".$bank_oktmo."','".$bank_sign."','".$bank_billdate."','".$l_unic_num_shtr."')
            ON DUPLICATE KEY UPDATE l_unic_num_shtr='".$l_unic_num_shtr."', time_zadachi='".$time_zadachi."'";
            $ins = mysql_query($insert_new_blank);

        }
    }
}



 ?>
