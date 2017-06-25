<?
$regcompanyname = clear($_POST['regcompanyname']);
$regcompanyemail = clear($_POST['regcompanyemail']);
$regcompanypass1 = clear($_POST['regcompanypass1']);
$regcompanypass2 = clear($_POST['regcompanypass2']);
if(!$regcompanyname) {
  echo "Email уже зарегистрирован в системе!";
  exit();
}
if (strpos($regcompanyemail, '@') == false) {
  echo 'Неправильно введен email!';
  exit();
};
if($regcompanypass1!=$regcompanypass2) {
  echo "Пароли не совпадают!";
  exit();
}
$pass = MD5($regcompanypass1);
$selectIsset = "SELECT * FROM user WHERE email='".$regcompanyemail."'";
$del_user = mysql_query($selectIsset);
$n_user = mysql_numrows($del_user);
if(!$n_user) {





  $curr_date = time();
  $insertNewUser = "INSERT INTO user (name,password,email,curr_date) VALUES ('".$regcompanyname."','".$pass."','".$regcompanyemail."','".$curr_date."')";
  $sql = mysql_query($insertNewUser);

  $q_user = sprintf("SELECT * FROM user WHERE password = '".$pass."' AND email = '".$regcompanyemail."' LIMIT 1");
  $r_user = mysql_query($q_user);
  $n_user = mysql_numrows($r_user);

  if($n_user) {
    if ($n_user > 0) {
        for ($i = 0; $i < $n_user; $i++) {
            $user_id = htmlspecialchars(mysql_result($r_user, $i, "user.id"));
            $user_parentcompany = htmlspecialchars(mysql_result($r_user, $i, "user.parentcompany"));
            $user_name = htmlspecialchars(mysql_result($r_user, $i, "user.name"));
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $user_name;
            $_SESSION['parentcompany'] = $user_parentcompany;

            // Настройка автоотчетов
            $insertAutoRepot = "INSERT INTO message_reports (user_id,week_report,new_fines_report) VALUES ('".$user_id."','1','1')";
            $sqlR = mysql_query($insertAutoRepot);
            // Настройка автро баланса
            $insertAutoBalance = "INSERT INTO balance (user_id) VALUES ('".$user_id."')";
            $ab = mysql_query($insertAutoBalance);
            // Пометка тестового тарифного плана
            $insertAutoTarif = "INSERT INTO tarif (user_id,curr_date) VALUES ('".$user_id."','".time()."')";
            $at = mysql_query($insertAutoTarif);
            include_once($_SERVER['DOCUMENT_ROOT']."/php/mailer/newuser.php");
            echo "ok";
        }

    }
    // var_dump($_SESSION);
  } else {
    echo "xError";
  };
  exit();
} else {
  echo 'isset_email';
}
?>
