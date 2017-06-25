<?
// require ($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
// $action = $_POST['action'];
// $whiteListActions = ['register','report'];
// $login = $_POST['login'];
// $password = $_POST['pass'];
function rassila($email){
          $regcompanyemail = $email;
          $to = trim($regcompanyemail);
          $imgSrc   = 'http://xn----8sbgbya0aicgcfuexg0b6d.xn--p1ai/images/retina-kravmaga.png';
          $imgDesc  = 'Рассылка.';
          $imgTitle = 'мониторинг-штрафов.рф';
          $subjectPara1 = '';
          $subjectPara2 = '
          <h1 style="font-size: 15px; font-family: tahoma; color: #ddd0b2; line-height: 1.6; font-weight: 400;">Здравствуйте!&nbsp;</h1>
          <div style="padding: 0 0 10px 0; font-size: 14px; padding-top: 0px;">
            Мы оказываем услуги мониторинга штрафов транспортных средств.<br/>
            Уже более 400 компаний следят за штрафами своих транспортных средств с нами.<br/>
            <p style="font-size: 15px; font-family: tahoma; color: #ddd0b2; line-height: 1.6; font-weight: 400;">
            Возможности нашей системы</p>
            Оповещения о новых полученных штрафах<br/>
            Еженедельныя отправка отчета на Ваш email<br/>
            Выгрузка данных в Excell<br/>
            Группировка транспортных средств<br/>
            Оплата штрафов<br/>
            <a href="http://xn----8sbgbya0aicgcfuexg0b6d.xn--p1ai/" style="text-decoration: none!important;"><p style="font-size: 15px; font-family: tahoma; color: #ddd0b2; line-height: 1.6; font-weight: 400;">Присоединяйтесь</p></a>
          </div>
          <div>


          </div>';
          $subjectPara3 = '<h2 style="font-size: 16px; font-family: tahoma; text-align: center; margin-top: 10px; color: #d0d1d2; margin-bottom: 5px;">С полным перечнем услуг вы можете ознакомиться на нашем сайте <a href="http://n-i-c-e.ru/?mail=mail1&from='.$to.'">www.n-i-c-e.ru</a> </h2>';
          $subjectPara4 = NULL;
          $subjectPara5 = NULL;


          // bottomemed may analytics code
          $message = '<!DOCTYPE HTML>'.
          '<head>'.
          '<meta http-equiv="content-type" content="text/html; charset=utf-8">'.
          '<title>Email notification</title>'.
          '</head>'.
          '<body style="background-image:url(http://xn----8sbgbya0aicgcfuexg0b6d.xn--p1ai/images/home_kravmaga_bg1.jpg);background-repeat:repeat;background-position:center top;background-attachment:;-webkit-background-size:;">'.
          '<div style="width: 70%; margin-top: 25px; margin-bottom: 25px; margin: 0 auto; background:url(http://xn----8sbgbya0aicgcfuexg0b6d.xn--p1ai/images/home_kravmaga_bg3.png);"><div id="header" style="width: 80%; height: 80px;margin: 0 auto;padding: 10px;  padding-top: 25px; color: #fff;text-align: center;font-family: Open Sans,Arial,sans-serif;">'.
             '<a href="http://xn----8sbgbya0aicgcfuexg0b6d.xn--p1ai/"><img style="border-width:0; margin-left: -145px;" src="'.$imgSrc.'" alt="'.$imgDesc.'" title="'.$imgTitle.'"></a>'.
          '</div>'.

          '<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 0px;">'.
             '<div id="inner" style="width: 80%;margin: 0 auto; font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal; padding-left: 40px; line-height: 1.4em;color: #d0d1d2;margin-top: 10px;">'.
                 '<p>'.$subjectPara1.'</p>'.
                 '<p>'.$subjectPara2.'</p>'.
                 '<p>'.$subjectPara4.'</p>'.
                 '<p>'.$subjectPara5.'</p>'.
             '</div>'.
          '</div>'.
          '<div id="footer" style="width: 60%;height: 70px; padding: 0px; padding-bottom: 25px; margin: 0 auto; font-size: 14px; margin-top:0px; font-family: tahoma; color: #d0d1d2;">'.
             'С уважением, система мониторинга штрафов.<br/>'.
             '<small>отписаться от рассылки</small>'.
          '</div></div>'.
          '</body>';
          $subject = 'Мониторинг штрафов автотранспорта. Предложение о сотрудничестве.';
          $from    = 'noreply@мониторинг-штрафов.рф';
          $headers  = "From: " . $from . "\r\n";
          $headers .= "Reply-To: ". $from . "\r\n";
          $headers .= "CC: noreply@мониторинг-штрафов.рф\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=utf-8\r\n";
          mail($to, $subject, $message, $headers);
};
?>
