    <?
session_start();
$page = 'helpdesk';
$page_helpdesk = 'color: #ddd0b2;';
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");
?>
<div class="section " style="padding-top:20px; padding-bottom:0px;background-image:url(images/home_kravmaga_bg2.jpg); background-repeat:repeat; background-position:center top; ">
    <div class="section_wrapper clearfix panelf" style="padding-top: 20px;">
        <div class="items_group clearfix">
            <!-- One full width row-->
            <div class="column one column_column " style="text-align: center;">
                <div class="column_attr">
                  <h3 id="" style="margin-top: 20px; text-align: center; font-weight: 300; font-family: 'roboto';">Служба поддержки сайта<br/>
                    <small style="font-size: 14px;">мониторинг-штрафов.рф</small>
                  </h3>
                </div>
                <div class="" style="font-size: 16px; padding-lefT: 20px; color: #c8c8c8;">
                  <span style="color: #ddd0b2; font-size: 20px; font-weight: 300;">Напишите нам</span><br/><br/>
                </div>
                <div class="">
                  <input type="text" id="help_name" placeholder="* Контактное лицо, компания" style="background: rgba(255,255,255,.1); display: inline-block;">
                  <input type="text" id="help_company" placeholder="* Email" style="background: rgba(255,255,255,.1); display: inline-block; margin-left: 20px;">

                </div>
                <div  style="display: inline-block; text-align: center;">
                  <textarea name="name" id="help_text" rows="8" placeholder="* Сообщение" style="width: 484px; background: rgba(255,255,255,.1);"></textarea>
                </div>
                <div class="">


                  <div class="msgtext" style="margin-bottom: 15px; color: #c8c8c8; font-size: 16px; margin-bottom: 10px;">

                  </div>


                  <div class="">
                      <span id="go_client" style="cursor: pointer; background: #ddd0b2; margin: 0 auto; padding: 10px 20px;
                       font-size: 18px; color: #2d2d2d; border-radius: 0px; font-family: 'roboto'; font-weight:300;">Написать</span>

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
