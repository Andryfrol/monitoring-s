<?
session_start();

$textpayform = "Мониторинг штрафов. Пополнение счета пользователя ".$_SESSION['name']."_id15".$_SESSION['user_id'];
?>
<iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/quickpay/shop-widget?account=410013204469379&quickpay=shop&payment-type-choice=on&mobile-payment-type-choice=on&writer=seller&targets=<?=$textpayform;?>&default-sum=<?=$summ;?>&button-text=01&fio=on&mail=on&successURL=http%3A%2F%2Fxn----8sbgbya0aicgcfuexg0b6d.xn--p1ai%2F%25D0%25BE%25D0%25BF%25D0%25BB%25D0%25B0%25D1%2587%25D0%25B5%25D0%25BD%25D0%25BE" width="450" height="198"></iframe>
