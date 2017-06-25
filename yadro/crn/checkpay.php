<?	// пример вызова метода checkPay
	// API сервиса поиска и оплаты штрафов и налогов shtraf.biz
	// http://shtraf.biz/api.php
    // (с) 2015 Федорук Александр fedl@mail.ru
	// The MIT License (MIT)
  session_start();
	require_once('api.php');
	$dat=array();
	// сохраняем в:
	// $_SESSION['acc'][$fieldID] - значения полей докуменов
    // $_SESSION['type'] - тип Заказа
	// для последующей передачи в метод API_CREATE_ZKZ

    $dat['hash'] = $_POST['hash'];
    $dat['top'] = 1;
    $dat['id'] = 'R052887532031';
    $dat['type'] = 10;
    $dat['sts'] = $_POST['sts'];
    $name1= isset($_SESSION['pdat']['name1'])?$_SESSION['pdat']['name1']:"";
    $name2= isset($_SESSION['pdat']['name2'])?$_SESSION['pdat']['name2']:"";
    $name3= isset($_SESSION['pdat']['name3'])?$_SESSION['pdat']['name3']:"";
    $email= isset($_SESSION['pdat']['email'])?$_SESSION['pdat']['email']:"";
    $flmonSt= isset($_SESSION['pdat']['flmon'])&&$_SESSION['pdat']['flmon']==1?
		" checked":"";

    $api=new _API();
    $dat['top']=API_CHECK_PAY;
    $ret=$api->sendQUERY($dat);
	  //  unset($api);
    var_dump($ret);

?>
