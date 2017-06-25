<?
$num_post = $_GET['num'];
if($num_post) {

};
$act_searching = $_GET['go']; // pay

$summ = $_GET['summ'];
$summ2 = $_GET['summ2'];
$itog = $_GET['summ']+$_GET['summ2'];

?>
<div class="section " style="padding-top:20px; padding-bottom:0px; background-color:; background-image:url(images/home_kravmaga_bg2.jpg); background-repeat:repeat; background-position:center top; ">
    <div class="section_wrapper clearfix">
        <div class="items_group clearfix panelf" style="padding-top: 20px; padding-bottom: 20px;">
            <!-- One full width row-->
            <div class="items_group">
              <div class="column one-third" style="margin-bottom: 0px;">
                <div class="">
                  <div class="">
                    <h4>Оплата штрафа</h4>
                  </div>
                  <h6>Номер постановления штрафа ГИБДД</h6>
                  <?
                  if($num_post) {
                    ?>
                    <h4 style="font-family: 'roboto';"><?=$num_post;?></h4>
                    <?
                  } else {
                    ?>
                    <input type="text" placeholder="Введите номер постановления штрафа ГИБДД" name="" style=" background: rgba(255,255,255,.15);  width: 495px;" value="">
                    <div class="">
                      <button type="button" name="button" style="border-radius: 0px; background: #ddd0b2; color: #2d2d2d;" onclick="goPayFine()">Оплатить штраф</button>
                    </div>
                    <?
                  }
                  ?>
                </div>
                <!-- Page devider -->
                <!-- One full width row-->
                <div class="column one column_divider ">
                    <hr class="no_line hrmargin_b_10" />
                </div>
              </div>
                <div class="column two-third" style="margin-bottom: 0px;">
                  <?
                  if($num_post) {
                    ?>
                    <!-- <iframe id="myIframe" style=" margin-left: 10px; margin-top: -10px; width: 400px; height: 550px;" src="http://s2.7its.ru/paymentform.php?num=<?=$num_post;?>&summ=<?=$summ;?>&summ2=<?=$summ2;?>"></iframe> -->

                    <style>
                    * {
                      color: white;
                      font-family: 'roboto';
                    }
                    .form-style {
                      background: rgba(255,255,255,.15);
                      display: inline-block;
                      margin-bottom: 20px; width: 300px; border: 0px; padding: 10px 15px;
                    }
                    ::-webkit-input-placeholder {
                    color: #e8e8e8;
                    }

                    :-moz-placeholder { /* Firefox 18- */
                    color: #e8e8e8;
                    }

                    ::-moz-placeholder {  /* Firefox 19+ */
                    color: #e8e8e8;
                    }

                    :-ms-input-placeholder {
                    color: #e8e8e8;
                    }

                    </style>
                    <script
                     src="https://code.jquery.com/jquery-3.1.1.min.js"
                     integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                     crossorigin="anonymous"></script>
                    <link rel="shortcut icon" href="favicon.ico">
                    <link rel='stylesheet' id='Roboto-css' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
                    <?
                    $number_post = $_GET['num'];
                    ?>
                    <div style="border: 1px solid #ccc; display: inline-block; padding: 20px;
                    margin-left: 20px;
                        border: 1px solid rgba(140, 156, 172, 0.47);
                        background: rgba(140, 156, 172, 0.17);">
                      <div class="">
                        <h3 style="color: ; font-family: 'roboto'; color: #ddd0b2; font-weight: 400;">Оплата штрафа ГИБДД</h3>
                      </div>
                      <div class="">
                        <h4 style="font-family: 'roboto';">№ <?=$number_post;?></h4>
                      </div>
                      <div class="">
                        <div class="">
                          <input type="text" id="sname" class="form-style" style="width: 300px;" placeholder="Фамилия">
                        </div>
                      </div>
                      <div class="">

                        <div class="">
                          <input type="text" id="fname" class="form-style" style="width: 300px;" placeholder="Имя">
                        </div>
                      </div>
                      <div class="">

                        <div class="">
                          <input type="text" id="email" class="form-style" style="width: 300px;" placeholder="Email" style="">
                        </div>
                      </div>
                      <div class="" style="font-size: 14px;">
                        Сумма штрафа <?=$_GET['summ'];?> руб., комиссия: <?=$_GET['summ2'];?> руб.
                      </div>
                      <div class=""  style="font-size: 18px; margin-top: 8px;">
                        Сумма к оплате<br/>
                        <?
                        $itog = $_GET['summ']+$_GET['summ2'];
                        ?>
                      с учетом комиссии: <?=$itog;?> руб.
                      </div>
                      <div class="" style="margin-top: 10px; padding-left: 40px; font-size: 14px;">
                        <lable for="ok_ysl" style="cursor: pointer;"><input type="checkbox" id="ok_ysl" name="" value="" style="margin-left: -25px;">&nbsp;&nbsp;&nbsp;Я принимаю условия</lable><br/><small>
                        <a target="_blank" style="color:#ddd0b2;" href="http://xn----8sbgbya0aicgcfuexg0b6d.xn--p1ai/соглашение-оплата-штрафов-гибдд.pdf
                        ">"cоглашения о предоставлении услуг"</a></small>

                      </div>
                      <div onclick="go_to_bank()" class="gotobank" style="background: #ddd0b2; padding: 10px; width: 280px; text-align: center; color: #2d2d2d; cursor: pointer; margin-top: 15px; font-family: 'roboto';">
                        Оплатить
                      </div>
                      <div class="ysloviaopl" style="text-align: center; padding-top: 15px; opacity: 0; color: #ddd0b2;">
                        необходимо принять условия оплаты
                      </div>
                    </div>
                    <script>
                      function go_to_bank() {

                        var sname = $('#sname').val();
                        var fname = $('#fname').val();
                        var email = $('#email').val();

                        if ($('#ok_ysl').is(':checked')) {
                          var status = 1;
                          $('.gotobank').html('Загрузка...')
                          $('.ysloviaopl').css('opacity','0');
                        } else {
                          var status = 0;
                          $('.ysloviaopl').css('opacity','1');
                          return;
                        };

                        var number_post = '<?=$number_post;?>';
                        var link = 'http://s2.7its.ru/gobank.php?fname='+fname+'&sname='+sname+'&email='+email+'&number_post='+number_post;
                        location.replace(link);
                        // alert("status = "+status+" + "+number_post+sname);
                      };
                    </script>
                    <?
                  };
                  ?>
                </div>
            </div>
            <!-- One full width row
            <div class="column one column_column ">
                <div class="column_attr ">
                    <div style="background: url(images/home_kravmaga_border_bottom.png) repeat-x; height: 2px; width: 100%; overflow: hidden;"></div>
                </div>
            </div>-->

        </div>
    </div>
</div>
