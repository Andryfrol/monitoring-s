<?php
$db_hostname="localhost";
$db_name="ce18538_monitor";
$db_username="ce18538_monitor";
$db_password="5440";
$now=time();
$link = mysql_connect($db_hostname, $db_username, $db_password);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
$db=@mysql_connect($db_hostname,$db_username,$db_password);
if($db!=FALSE) {
    $tabledb=mysql_select_db($db_name) or die("Can't select database");
} else {
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">";
    echo "<LINK href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">";
    echo "<h3>Ошибка!</h3>";
    echo "<p>Невозможно подключиться к базе данных. Пожалуйста повторите попыку позже.</p>";
}
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
?>
