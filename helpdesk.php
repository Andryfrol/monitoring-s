    <?
session_start();
$page = 'helpdesk';
$page_helpdesk = 'color: #fff; font-weight: bold;';
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");
?>
<div class="section bgrwite" style="padding-top:20px; padding-bottom:0px;">
    <div class="section_wrapper clearfix panelf" style="padding-top: 20px;">
        <div class="items_group clearfix" style="">
            <!-- One full width row-->
            <div class="" style="padding-left: 50px;">
                <h3 id="" style="margin-top: 20px; font-weight: 300; font-family: 'roboto'; color: #444;" >Служба поддержки сайта<br/>
                    <small style="font-size: 14px;  color: #444;">мониторинг-штрафов.рф</small>
                </h3>
            </div>
            <div class="column one column_column" style="padding-left: 30%;">


                <div class="" style="font-size: 16px; padding-left: 0px; color: #444;">
                  <div style="color: #444; font-size: 22px; font-weight: 300;">Напишите нам</div><br/><br/>
                </div>
                <div class="">
                    <div>
                        <div style="min-width: 250px; display: inline-block;">* Контактное лицо, компания</div>
                        <input type="text" id="help_name" placeholder="* Контактное лицо, компания" style="color: #444; background: rgba(255,255,255,.1); display: inline-block;">
                    </div>
                    <div>
                        <span style="min-width: 250px; display: inline-block;">* Email</span>
                        <input type="text" id="help_company" placeholder="* Email" style="color: #444; background: rgba(255,255,255,.1); display: inline-block;">
                    </div>

                </div>
                <div  style="display: inline-block; text-align: center;">
                   <div style="width: 484px; text-align: left; padding-bottom: 15px;">* Сообщение</div>
                  <textarea name="name" id="help_text" rows="8" placeholder="* Сообщение" style="width: 484px; color: #444; background: rgba(255,255,255,.1);"></textarea>
                </div>
                <div class="">


                  <div class="msgtext" style="margin-bottom: 15px; color: #c8c8c8; font-size: 16px; margin-bottom: 10px;">

                  </div>
                  <div>
                      <span id="go_client" class="white-btn pointer">Написать</span>
                  </div>

                </div>
            </div>

            <div class="column one column_divider ">
                <hr class="no_line hrmargin_b_10" />
            </div>
            <div class="" style="clear: both;">

            </div>

        </div>

    </div>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT']."/inc/logos-footer.php");
    ?>
</div>

<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/footer.inc.php");
?>
<script type="text/javascript">
jQuery('#go_client').click(function() {
  var help_name = jQuery('#help_name').val();
  if(help_name.length <3) {
    alert('Слишком короткое Имя')
    jQuery('#slider').slider ({value: 0});
    return;
  }

  var help_company = jQuery('#help_company').val();
  var help_text = jQuery('#help_text').val();
  if(help_text.length <3) {
    alert('Слишком короткое сообщение');

    jQuery('#slider').slider ({value: 0});
    return;
  }
  jQuery('#unlocked').css('opacity','1');
  jQuery('#locked').css('opacity','0.2');

    var action = 'hepdeskMsg';
    var data = {
      'help_name' : help_name,
      'help_company' : help_company,
      'help_text' : help_text
    };
    jQuery.ajax({
        type: "POST",
        url: "/ajax/act.php?action="+action,
        data : data,
        beforeSend: function(html) {

        },
        success: function(html) {
          jQuery('.msgtext').html(help_name+', Ваше сообщение отправленно!<br/> Мы ответим вам в течении 24 часов');
          jQuery('#help_name').val('');
          jQuery('#help_company').val('');
          jQuery('#help_text').val('');
        }  // ,
        // error: function(html) {
        //
        // }
    });});
</script>
