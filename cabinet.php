<?
session_start();
$page = 'cabinet';
$page_cabinet = 'color: #ddd0b2;';
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");

if($auth)
{
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/user.php");
} else
{
  include_once($_SERVER['DOCUMENT_ROOT']."/fcabinet/login.php");
};
include_once($_SERVER['DOCUMENT_ROOT']."/inc/footer.inc.php");
if($_SESSION['admin']==1){ // include administration js file
  ?><script type="text/javascript" src="/js/admin.js"></script><?
};
?>
