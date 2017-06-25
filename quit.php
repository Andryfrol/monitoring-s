<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
$_SESSION['auth']=false;
session_destroy();
$log_out = 1;
logLogin($user_id,$log_out);
header('Location: /кабинет');
exit;
 ?>
