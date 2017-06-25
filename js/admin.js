var groups_report_array = [];

function groups_id_array(namefield) {
  // Добавить в массив название fielda если такого еще нет

  if((groups_report_array.indexOf(namefield)<0)||(groups_report_array.length==0)){
      window.groups_report_array.push(namefield);
      jQuery('.tableSecond_'+namefield).addClass('activeFirsttable');
  } else {
    var q = groups_report_array.indexOf(namefield);
     console.log(q);
     window.groups_report_array.splice(q,q+1);
    jQuery('.tableSecond_'+namefield).removeClass('activeFirsttable');
  }
    console.log(groups_report_array);
}





// Управление балансом пользователей
function adminBalance() {
  var action = 'balancer';
  var data = {
    'nodata' : 1
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

function addBalanceToUser() {
  var user_name_to_pay = jQuery('#user_name_to_pay').val();
  var user_id_to_pay = jQuery('#user_id_to_pay').val();
  var user_summ_to_pay = jQuery('#user_summ_to_pay').val();
  var action = 'add_to_pay';
  var data = {
    'user_name_to_pay' : user_name_to_pay,
    'user_id_to_pay' : user_id_to_pay,
    'user_summ_to_pay' : user_summ_to_pay
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        if(html=='ok') {
          adminAddMoney();
        }
        // jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

function sendMsgFromHelpDesk() {
  var email_to = jQuery('#email_to').val();
  var text_to = jQuery('#text_to').val();


  alert('Отправка письма из Help Desk');
}

function adminAddMoney() {
  var action = 'addMoney';
  var data = {
    'nodata' : 1
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

// Отправить коммерческое предложение
function sendMailerTo() {
  var mails = jQuery('#mailer_emails').val(); // список почтовых адресов
  var typeis = jQuery('input[name="rassilka1"]:checked').val(); // тип рассылки
  var action = 'send_mail';
  var data = {
    'typeis' : typeis,
    'mails' : mails
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        if(html=='ok') {
          adminMailer();
        };
      },
      error: function(html) {

      }
  });
}

function todoList() {
  var action = 'todo';
  var data = {
    'nodata' : 1
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

// Активность пользователей
function adminActivity() {
  var group_id = 1;
  var action = 'activity';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

// Управление тарифом пользователей
function adminTarif() {
  var group_id = 1;
  var action = 'tarif';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

function adminMsg(to_user) {
  var action = 'adminmessage';
  var data = {
    'to_user' : to_user
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

function adminHelpDesk() {
  var group_id = 1;
  var action = 'helpdesk';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

function adminUsers() {
  var group_id = 1;
  var action = 'users';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

function adminAnaliz() {
  var group_id = 1;
  var action = 'analytics';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

// Управление рассылкой
function adminMailer() {
  var group_id = 1;
  var action = 'mailer';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
}

function adminCrons() {
  var action = 'crontab';
  var data = {
    'nodata' : 1
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/admin.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.adminchanger').html(html);
      },
      error: function(html) {

      }
  });
  // alert('Административный КРОНТАБ')
}


// Отчет по отдельным автотранспортным средствам
function reportPoOtdelnim() {
  var group_id = 1;
  var action = 'activity';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/reports/by_autos.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        // Отображаем название меню
        jQuery('.i_name_otchet').css('display', 'inline-block');
        jQuery('.i_name_otchet').html('<span class="gold">Отчет по отдельным автомобилям</span>')
        jQuery('.i_report_block_1').css('display', 'none');
        jQuery('.header_report_1').css('color','#a8a9ab');
        var sucs = html.split('<splitter>')
        jQuery('.cach_report_step_2 .l').html(sucs[0]);
        jQuery('.cach_report_step_2 .r').html(sucs[1]);
      },
      error: function(html) {

      }
  });
}
