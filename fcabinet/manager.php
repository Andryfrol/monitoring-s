
<div class="panelf">
  <div class="column one" style="margin-bottom: 0px; margin-top: 20px;">
    <h6 style="display: inline-block; margin-right: 40px;">Мои менеджеры</h6><small onclick="addManager()" style="padding: 2px 10px; cursor: pointer;">Добавить менеджера</small>

  </div>
  <div class="column one-second" style="padding-bottom: 20px; padding-left: 0px;">
    <?
    $q_user = sprintf("SELECT * FROM user WHERE parentcompany = '".$_SESSION['user_id']."' ORDER BY id DESC");
    $r_user = mysql_query($q_user);
    $n_user = mysql_numrows($r_user);

    if ($n_user > 0) {
        for ($i = 0; $i < $n_user; $i++) {
            $user = htmlspecialchars(mysql_result($r_user, $i, "user.id"));
            $user_name = htmlspecialchars(mysql_result($r_user, $i, "user.name"));
            $user_password = htmlspecialchars(mysql_result($r_user, $i, "user.password"));
            $user_email = htmlspecialchars(mysql_result($r_user, $i, "user.email"));
            $user_parentcompany = htmlspecialchars(mysql_result($r_user, $i, "user.parentcompany"));
            $user_text_pw = htmlspecialchars(mysql_result($r_user, $i, "user.text_pw"));
            $user_curr_date = htmlspecialchars(mysql_result($r_user, $i, "user.curr_date"));
            echo '<div class="managername">';
              echo "Менеджер: ".$user_name."<br/> Email: $user_email <br/>  Дата создания: ".date('d.m.Y',$user_curr_date)."<br/>Пароль: $user_text_pw";
              echo "<span style='float: right; margin-right: 5px;'><small onClick='deletManager(".$user.")'>Удалить</small></span>";
            echo '</div><div style="clear: both;"></div>';
        }
    } else {
      echo "У вас нет созданных менеджеров на сайте";
    }
    ?>

  </div>
  <div class="column one-second" id="manager_info">
    <div class="">
      Настройки прав менеджера
    </div>
    <div class="">
      Менеджеру недоступен просмотр штрафов ваших групп ТС
    </div>
  </div>
  <div class="" style="clear: both;">

  </div>

</div>
