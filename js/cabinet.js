jQuery('.menudiv').click(function(){
  var link = jQuery(this).attr('name');
  renderer(link);
});

function click_summ_add(summ){
  jQuery("*").removeClass("balanceadditem_act");
  jQuery('#summ'+summ).addClass("balanceadditem_act");
  jQuery('#koplate').html(summ);
  // alert(summ);
};

function payShtraf(num_post) {
  alert('Оплата' + num_post)
}

function saveNewPw() {
  // alert('Сохранить новый пароль');
  var choldpw = jQuery('#choldpw').val(); // Старый пароль
  var chnewpw1 = jQuery('#chnewpw1').val(); // Новый пароль 1
  var chnewpw2 = jQuery('#chnewpw2').val(); // Новый пароль 2

  if(chnewpw1!=chnewpw2) {
    alert('Неправильный повтор нового пароля.')
    return;
  }

  var action = 'changepwaction';
  var data = {
    'choldpw' : choldpw,
    'chnewpw1' : chnewpw1,
    'chnewpw2' : chnewpw2
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        if(html=='ok') {
          jQuery('#choldpw').val('');
          jQuery('#chnewpw1').val('');
          jQuery('#chnewpw2').val('');
          jQuery('.repassmsg').css('display','block');
        } else {
          // messages
        }
        // jQuery('.optionschanger').html(html);
      },
      error: function(html) {

      }
  });


}

function chengeremail() {
  alert('Смена EMAIl');
}


function showZabilPass() {
  jQuery('#headzabilpass').css('color','#435183');
  jQuery('.zabilpasspanel').css('display','block');
  jQuery('.hidezabilpassclose').css('display','block');
  //  - show
}

function vosstanovlenie() {
  var email_repassword = jQuery('.email_repassword').val();
  alert('Восстановление пароля');
}

function hidezabilpassclose() {

  jQuery('#headzabilpass').css('color','#a8a9ab');
  jQuery('.zabilpasspanel').css('display','none');
  jQuery('.hidezabilpassclose').css('display','none');
}




function hidethismsg() {
  jQuery('.errorlenmsg').html('');
}

function saveGroupName(id_group) {
  var newName = jQuery('#newnamegroup').val();
  var action = 'saveGroupName';
  var data = {
    'newName' : newName,
    'id_group' : id_group
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        addGroupTransport();
      },
      error: function(html) {

      }
  });

}

function changeGropuTransportBtn(id_group,name) {
  // alert('Редактор групп транспорта');

    jQuery('.uprelem'+id_group).css('display','none');
    jQuery('#groupName'+id_group).html('<input id="newnamegroup" type="text" style="padding: 6px; color: #444; margin: 0; display: inline-block;" value="'+name+'"/><span class="saverupdgr" onClick="saveGroupName('+id_group+')">Сохранить</span>');
  // var action = 'changeGropuTransportBtn';
  // var data = {
  //   'id_group' : id_group
  // };
  // jQuery.ajax({
  //     type: "POST",
  //     url: "/ajax/act.php?action="+action,
  //     data : data,
  //     beforeSend: function(html) {
  //
  //     },
  //     success: function(html) {
  //
  //         // jQuery('.trans_modal').css('display','block');
  //       // jQuery('.transportchanger').css('display','none');
  //       // jQuery('.trans_modal').html(html);
  //     },
  //     error: function(html) {
  //
  //     }
  // });
}

function addGroupTransport() {

  var action = 'addgrouptransport';
  var data = {
    'summ' : 12
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        // делаем модально окно
          jQuery('#modalcontaner').css('display', 'block');
          var modalwindow = "<div class='popup_box_container'></div>";
          jQuery('#modalcontaner').html(modalwindow);
          jQuery('.popup_box_container').html(html);
        // jQuery('#mt_icon3').css('opacity','1');
        // jQuery('#mt_icon1').css('opacity','0');
        // jQuery('#addtsspan').css('color','#435183');
        // jQuery('#f1trmenu').css('color', '#a8a9ab');
        // jQuery('#addtsicon').css('opacity','0');
        // jQuery('#tx_3uprgr').css('color','#ddd0b2');
        // jQuery('.transportchanger').html(html);
        // jQuery('.trans_modal').css('display','none');
        // jQuery('.transportchanger').css('display','block');
      },
      error: function(html) {

      }
  });


}

function addGroupTransportTS() {
  var grouptsname = jQuery('#grouptsname').val(); // название добаваляемой группы ТС
  if(grouptsname=='') {
    alert('Группа должна иметь название!');
    return;
  }
  var action = 'addgrouptransportsend';
  var data = {
    'grouptsname' : grouptsname
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        // jQuery('.transportchanger').html(html);
        if(html=='ok') {
          // jQuery('#grouptsname').val('');
          // alert('ok');
          addGroupTransport();
        } else {

        }
      },
      error: function(html) {

      }
  });
}

function closeactivetarif(id) {

  jQuery('#pt'+id).slideDown(400);
  jQuery('#gopt'+id).slideUp(300);

  jQuery('#closetarifs1').css('opacity','0');
  jQuery('#closetarifs2').css('opacity','0');
  jQuery('#closetarifs3').css('opacity','0');
  jQuery('#closetarifs4').css('opacity','0');
  jQuery('#t1').fadeTo( 300, 1 ); // active this
  jQuery('#t2').fadeTo( 300, 1 ); // active this
  jQuery('#t3').fadeTo( 300, 1 ); // active this
  jQuery('#t4').fadeTo( 300, 1 ); // active this

}

function payTarif(numTarifPlan) {
  var id = numTarifPlan;
  switch (id) {
    case 1:

      jQuery('#pt2').slideDown(400);
      jQuery('#gopt2').slideUp(300);
      jQuery('#pt3').slideDown(400);
      jQuery('#gopt3').slideUp(300);
      jQuery('#pt4').slideDown(400);
      jQuery('#gopt4').slideUp(300);
      jQuery('#pt'+id).slideUp(300);
      jQuery('#gopt'+id).slideDown(400);
      jQuery('#closetarifs'+id).css('opacity','.9');
      jQuery('#t1').fadeTo( 300, 1 ); // active this
      // hide X
      jQuery('#closetarifs2').css('opacity','0');
      jQuery('#closetarifs3').css('opacity','0');
      jQuery('#closetarifs4').css('opacity','0');
      jQuery('#t2').fadeTo( 300, 0.44 );
      jQuery('#t3').fadeTo( 300, 0.44 );
      jQuery('#t4').fadeTo( 300, 0.44 );
      break;
    case 2:
      jQuery('#closetarifs'+id).css('opacity','.9');
      // hide X
      jQuery('#pt1').slideDown(400);
      jQuery('#gopt1').slideUp(300);
      jQuery('#pt3').slideDown(400);
      jQuery('#gopt3').slideUp(300);
      jQuery('#pt4').slideDown(400);
      jQuery('#gopt4').slideUp(300);
      jQuery('#closetarifs1').css('opacity','0');
      jQuery('#closetarifs3').css('opacity','0');
      jQuery('#closetarifs4').css('opacity','0');
      jQuery('#pt'+id).slideUp(300);
      jQuery('#gopt'+id).slideDown(400);
      jQuery('#t2').fadeTo( 300, 1 ); // active this
      jQuery('#t1').fadeTo( 300, 0.44 );
      jQuery('#t3').fadeTo( 300, 0.44 );
      jQuery('#t4').fadeTo( 300, 0.44 );
      break;
    case 3:
    jQuery('#pt'+id).slideUp(300);
    jQuery('#gopt'+id).slideDown(400);
      jQuery('#pt2').slideDown(400);
      jQuery('#gopt2').slideUp(300);
      jQuery('#pt1').slideDown(400);
      jQuery('#gopt1').slideUp(300);
      jQuery('#pt4').slideDown(400);
      jQuery('#gopt4').slideUp(300);
      jQuery('#closetarifs'+id).css('opacity','.9');
      jQuery('#t3').fadeTo( 300, 1 ); // active this
      jQuery('#closetarifs1').css('opacity','0');
      jQuery('#closetarifs2').css('opacity','0');
      jQuery('#closetarifs4').css('opacity','0');
      jQuery('#t1').fadeTo( 300, 0.44 );
      jQuery('#t2').fadeTo( 300, 0.44 );
      jQuery('#t4').fadeTo( 300, 0.44 );
      break;
    case 4:
    jQuery('#pt'+id).slideUp(300);
    jQuery('#gopt'+id).slideDown(400);
      jQuery('#pt2').slideDown(400);
      jQuery('#gopt2').slideUp(300);
      jQuery('#pt3').slideDown(400);
      jQuery('#gopt3').slideUp(300);
      jQuery('#pt1').slideDown(400);
      jQuery('#gopt1').slideUp(300);
      jQuery('#closetarifs'+id).css('opacity','.9');
      jQuery('#t4').fadeTo( 300, 1 ); // active this
      jQuery('#closetarifs1').css('opacity','0');
      jQuery('#closetarifs2').css('opacity','0');
      jQuery('#closetarifs3').css('opacity','0');
      jQuery('#t1').fadeTo( 300, 0.44 );
      jQuery('#t2').fadeTo( 300, 0.44 );
      jQuery('#t3').fadeTo( 300, 0.44 );
      break;
    default:

  }


}

function goPayTarif(numTarif) {
  // Load Ajaj Pay Form
  var action = 'gopaytarif';
  var data = {
    'numTarif' : numTarif
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('#changer').html(html);
      },
      error: function(html) {

      }
  });
}

// Оплатить
function loadpayform() {
  var action = 'loadpayform';
  var summ = jQuery('#koplate').html();
  var data = {
    'summ' : summ
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.balancechanger').html(html);
      },
      error: function(html) {

      }
  });
}



function renderer(render) {
  if(render=='reports') {
    groups_report_array = [];
  }
  jQuery("*").removeClass("activemenudiv");
  jQuery('.menudiv[name|="'+render+'"]').addClass('activemenudiv');
   var action = render;
   var group_is = 'moderators';
   var sex_is = 'man';
   var data = {
     'group' : group_is,
     'sex' : sex_is
   };
   jQuery.ajax({
       type: "POST",
       url: "/ajax/act.php?action="+action,
       data : data,
       beforeSend: function(html) {

       },
       success: function(html) {
         jQuery('#changer').html(html);
       },
       error: function(html) {

       }
   });
}

function registerNewUser() {
  var regcompanyname = jQuery('#regcompanyname').val();
  var regcompanyemail = jQuery('#regcompanyemail').val();
  var regcompanypass1 = jQuery('#regcompanypass1').val();
  var regcompanypass2 = jQuery('#regcompanypass2').val();

  var action = 'registercompany';
  var data = {
    'regcompanyname' : regcompanyname,
    'regcompanyemail' : regcompanyemail,
    'regcompanypass1' : regcompanypass1,
    'regcompanypass2' : regcompanypass2
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        if(html=='ok') {
          jQuery('input').val('');
          location.replace('/кабинет?R=1')
        } else {
          jQuery('.doorerror').html('<p style="margin-left: -17px;">'+html+'</p>');
          setTimeout(function(){ jQuery('.doorerror').html(''); }, 3000);
        }
      },
      error: function(html) {

      }
  });

}


function deletTransport(id) {
  var action = 'delettransport';
  var data = {
    'id' : id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {

      },
      error: function(html) {

      }
  });
}


function addManager() { // Отображение панели добавления менеджера
  var action = 'addmanager';
  var group_is = 'moderators';
  var sex_is = 'man';
  var data = {
    'group' : group_is,
    'sex' : sex_is
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('#changer').html(html);
      },
      error: function(html) {

      }
  });
}

function closemodal() {
    jQuery('#modalcontaner').html('');
    jQuery('#modalcontaner').css('display','none');
}

function addNewManager(){ // Добавление нового менеджера
  var fio_manager = jQuery('#fioaddermanager').val();
  var email_manager = jQuery('#emailaddermanager').val();
  var password_manager = jQuery('#passwordaddermanager').val();
  // VALIDATE INFORMATION
  if((!fio_manager)||(!email_manager)||(!password_manager)) {
    alert('Email, пароль и имя - обязательные поля');
  }
  var action = 'addnewmanager';

  var data = {
    'fio_manager' : fio_manager,
    'password_manager' : password_manager,
    'email_manager' : email_manager
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        if(html=='ok') {
          renderer('managers');
        } else {
          alert('Ошибка при создании менеджера');
        }
      },
      error: function(html) {

      }
  });


}


function deletManager(manager_id) {

  var action = 'deletmanader';
  var data = {
    'manager_id' : manager_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        // jQuery('.transportchanger').html(html);
        if(html=='ok') {
          renderer('managers');
        } else {
          alert('Ошибка удаления.')
        };
      },
      error: function(html) {

      }
  });
}

function addTransport()
{


  var action = 'addnewtransport';
  var data = {
    'stsasddd' : '123'
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {

          jQuery('#modalcontaner').css('display', 'block');
          var modalwindow = "<div class='popup_box_container'></div>";
          jQuery('#modalcontaner').html(modalwindow);
          jQuery('.popup_box_container').html(html);
      },
      error: function(html) {

      }
  });
}

function deletTransportGroup(group_id) {
  var isDelet = confirm("Удалить группу транспортных средств?");
  if(!isDelet){return};

  var group_id = group_id;
  // заменить все ID данной группы на ID == 0
  var action = 'delgrouptrans_byid';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        addGroupTransport();
      },
      error: function(html) {

      }
  });

}


function updateTransportData(transportId) {
  var upd_name_transport = jQuery('#upd_name_transport').val();
  var upd_gos_num_transport = jQuery('#upd_gos_num_transport').val();
  var upd_sts_numberdata = jQuery('#upd_sts_numberdata').val();
  var trans_rpout_id_upd = jQuery('.trans_rpout_id_upd').val();
  var action = 'updateTransportData';
  var data = {
    'transportId' : transportId,
    'upd_name_transport' : upd_name_transport,
    'upd_gos_num_transport' : upd_gos_num_transport,
    'upd_sts_numberdata' : upd_sts_numberdata,
    'trans_rpout_id_upd' : trans_rpout_id_upd
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        if(html=='ok') {
          closemodal();
          renderer('transport');

        } else {
          alert(html);
        }
      },
      error: function(html) {

      }
  });


}

function transportOptions(tsid) {
  var action = 'redactor_ts';
  var data = {
    'tsid' : tsid
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
          // Перед #Content
          jQuery('#modalcontaner').css('display', 'block');
          var modalwindow = "<div class='popup_box_container'></div>";
          jQuery('#modalcontaner').html(modalwindow);
          jQuery('.popup_box_container').html(html);
      },
      error: function(html) {

      }
  });
  // alert('Определить группу');
}

function saveTransport()
{
  var group = jQuery('.transgroup').val();
  var action = 'savenewtransport';
  var stsnumberadd = jQuery('#stsnumberadd').val();
  var nametransportadd = jQuery('#nametransportadd').val();
  var gosnumbertransportadd = jQuery('#gosnumbertransportadd').val();
  if(!stsnumberadd) { alert('Для добавления транспортного средства необходимо указать хотябы номер СТС'); return};
  var data = {
    'stsnumberadd' : stsnumberadd,
    'nametransportadd' : nametransportadd,
    'gosnumbertransportadd' : gosnumbertransportadd,
    'group' : group
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        closemodal();
        renderer('transport');
      },
      error: function(html) {

      }
  });
}

// детализация АО
function detailAo() {
  console.log('Детализация АО')
  var action = 'detailao';
  var data = {
    'loginis' : 12
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.balancechanger').html(html);
      },
      error: function(html) {

      }
  });
}

// платежи
function infoPay() {
  console.log('Платежи')
  var action = 'plateji';
  var data = {
    'loginis' : 12
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.balancechanger').html(html);
      },
      error: function(html) {

      }
  });
}

function popolnenie() {

  var action = 'popolnenie';
  var data = {
    'loginis' : 12,
    'passis' : 12
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        jQuery('.balancechanger').html(html);
      },
      error: function(html) {

      }
  });
}

function makeReport() {
  // Проверить на возможность построения отчета :
  // 1 - Баланс usera
  // 2 - Наличие транспортных средств
  jQuery('.reportchanger').html('По всему транспорту за период | По группе транспорта | По отдельному транспортному средству');

}

function openthedoor() {
  var loginis = jQuery('.loginis').val();
  var passis = jQuery('.passis').val();
  var action = 'openthedoor';
  var data = {
    'loginis' : loginis,
    'passis' : passis
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        if(html=='ok'){
          // location.reload();
          jQuery('#formdoor').submit();
        } else if(html=='bad') {
          jQuery('.doorerror').html('<p style="margin-left: -17px;">Неправильный логин или пароль!</p>');
          setTimeout(function(){ jQuery('.doorerror').html(''); }, 3000);
        }
      },
      error: function(html) {

      }
  });
}


// Отчет по всем найденным штрафам
function reportPoVsem() {
  var group_id = 1;
  var action = 'activity';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/reports/all_fines.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        // Отображаем название меню
        jQuery('.i_name_otchet').css('display', 'inline-block');
        jQuery('.i_name_otchet').html('<span class="gold">Отчет по всем найденным штрафам</span>')
        jQuery('.i_report_block_1').css('display', 'none');
        jQuery('.header_report_1').css('color','#a8a9ab');

        // cach_report_step_3
        // var sucs = html.split('<splitter>')
        jQuery('.cach_report_step_2').css('display','none');
        jQuery('.cach_report_step_3').html(html);
      },
      error: function(html) {

      }
  });
}

function makeReportGroup() {
  var value_from = jQuery('#dater').val(); // дата начала
  var value_to = jQuery('#dater2').val(); // дата конца
  var groups_array = ''; // Выбранные группы для отчета
  jQuery('.cach_report_step_2').css('display','none');
  jQuery('.postroinnii_otshet').css('display','inline-block');
  jQuery('.i_name_otchet .gold').css('color', '435183');

  if(!groups_report_array.length){
   console.log('Выбирите группу!'+groups_report_array.length);
   return;
  };  // cach_report_step_3
  var action = 'make_report_group';
  var data = {
    'value_from' : value_from,
    'value_to' : value_to,
    'groups_report_array' : groups_report_array
  };

  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

          jQuery('.cach_report_step_3').html('Loader');


      },
      success: function(html) {
        if(html=='bad') {
          alert('bad');
        } else {
          jQuery('.cach_report_step_3').html(html);
        }
      },
      error: function(html) {}
  });
};

function clickCheck1() {
  if (jQuery('#checkbox1').is(':checked')) {
    var status = 1;
  } else {
    var status = 0;
  };

  var action = 'updatereportweek';
  var data = {
    'status' : status
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {

      },
      error: function(html) {

      }
  });
};


// Отчет по группам
function reportPoGruppe() {
  var group_id = 1;
  var action = 'activity';
  var data = {
    'group_id' : group_id
  };
  jQuery.ajax({
      type: "POST",
      url: "/reports/group.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        // Отображаем название меню
        jQuery('.i_name_otchet2').css('display', 'inline-block');
        jQuery('.i_name_otchet2').html('<span class="gold">Отчет по группе транспортных средств</span>')
        jQuery('.i_report_block_1').css('display', 'none');
        jQuery('.header_report_1').css('color','#435183');
        var sucs = html.split('<splitter>')
        jQuery('.cach_report_step_2 .l').html(sucs[0]);
        jQuery('.cach_report_step_2 .r').html(sucs[1]);
      },
      error: function(html) {

      }
  });
}


function clickCheck2() {
  if (jQuery('#checkbox2').is(':checked')) {
    var status = 1;
  } else {
    var status = 0;
  };

  var action = 'updaterepornewfines';
  var data = {
    'status' : status
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {

      },
      error: function(html) {

      }
  });
  // updaterepornewfines
};

function goPayFine() {
  alert('Оплата щтрафа по номеру постановления');
}



function startSearchingFines() {
  var number = jQuery('.search_number').val();
  var sts_or_post_1_2 = jQuery('input[name="sear"]:checked').val();

  if(sts_or_post_1_2==1) {
    if(number.length!=10) {
      // alert(sts_or_post_1_2.length);
      jQuery('.errorlenmsg').html('<span><img src="/images/proddelete.png" width="14" onclick="hidethismsg()" title="Закрыть" style="cursor: pointer; margin-left: 0px; margin-rigth: 10px; padding-top: 4px; vertical-align: top;" alt=""></span> <span>&nbsp;&nbsp;&nbsp;Серия и номер СТС имеет не менее 10 знаков</span>')
      return;
    }
  } else {
    if(number.length < 10) {
      jQuery('.errorlenmsg').html('<span><img src="/images/proddelete.png" width="14" onclick="hidethismsg()" title="Закрыть" style="cursor: pointer; margin-left: 0px; margin-rigth: 10px; padding-top: 4px; vertical-align: top;" alt=""></span> <span>&nbsp;&nbsp;&nbsp;Номер не менее 11 знаков</span>')

      return;
    }
  }


  document.getElementById('myIframe').src = 'http://s2.7its.ru?opt='+sts_or_post_1_2+'&num='+number;
  return;
}

function LoadPage(){
    jQuery('#content').attr('src','http://n-i-c-e.ru');
}

function deletTransportById(id_transport) {
  // Проверка принадлежит ли мне транспорт
  var isAdmin = confirm("Удалить транспортное средство?");
  if(!isAdmin){return};
  var action = 'delettransportbyid';
  var data = {
    'id_transport' : id_transport
  };
  jQuery.ajax({
      type: "POST",
      url: "/ajax/act.php?action="+action,
      data : data,
      beforeSend: function(html) {

      },
      success: function(html) {
        if(html=='ok') {
          renderer('transport');
          closemodal();
        } else {
          alert('Недостаточно прав для удаления транспорта');
        }
      },
      error: function(html) {

      }
  });
}

function sengMsgHelpdesc() {
  alert('send message');
}

function addGroupNew() {

    jQuery('.addercontanergroup').html('<div class="flight" style="padding-left: 15px; padding-bottom: 3px; border-top: 1px solid #ebebeb; padding-top: 7px; margin-top: 10px; color: #435183;">Имя группы</div><input type="text" id="grouptsname" class="newgropname" placeholder="Например Грузовики">' +
        '<div class="addnewtsgroupsaver" onClick="addGroupTransportTS()">Добавить</div><div class="clear"></div>');
    jQuery('.addnewtsgroup').css('display','none');
}