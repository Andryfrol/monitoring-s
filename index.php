<?
session_start();
$page_index = 'color:#ddd0b2;';
$page = 'index';
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");

?>

        <div id="Content">
            <div class="content_wrapper clearfix ">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section " style="padding-top:20px; padding-bottom:0px; background-color:; background-image:url(images/home_kravmaga_bg2.jpg); background-repeat:repeat; background-position:center top; ">
                            <div class="section_wrapper clearfix panelf">
                                <div class="items_group clearfix ">
                                    <div class="column one-second  column_column ">
                                        <div class="column_attr align_center">

                                        </div>
                                    </div>
                                    <div class="column two-third  column_column ">
                                        <div class="column_attr ">
                                            <div style="background: url(images/home_kravmaga_border_right.png) repeat-y right top; padding: 20px 8% 20px 8%; margin-right: -2%;">

                                                <h4 style=" font-family: 'roboto'; font-weight:300;">Автоматическая система мониторинга штрафов</h4>
                                                <p class="big" style="font-size: 16px; color: #c8c8c8;  font-family: 'roboto'; font-weight:300;">
                                                  Система мониторинг-штрафов предназначена для своевременного обноружения штрафов
                                                  полученных транспортными средствами компании, с целью своевремменоо обнаружения данного пункта расходов и проведения мероприятий сокращающих дальнейшее получение штрафов.
                                                  <br/>Оповещения о полученных штрафах осуществляются по средствам Email.
                                                  <br/>Возможна гибкая настройка рассылки отчетов по штрафам, включая разделение полученной информации по группам автотранспорта и емайлам получателей.
                                                </p>
                                                <p class="big">

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="column one-third column_column ">
                                        <div class="column_attr ">
                                            <div style="padding: 20px 8% 20px 4%; font-sizE: 16px;">
                                              <h4 style="color: #ddd0b2; padding-left: 0px;  font-family: 'roboto'; font-weight:300;">Новости</h4>
                                            <div class="" style=" color: #c8c8c8;  font-family: 'roboto'; font-weight:300;">
                                              Сайт на стадии разработки.
                                              <!-- <?
                                              $q_user = sprintf("SELECT * FROM user");
                                              $r_user = mysql_query($q_user);
                                              $n_user = mysql_numrows($r_user);

                                              $qnt_users = 400+$n_user;
                                              ?>
                                               Уже более <?=$qnt_users;?> компаний используют сервис <a href="/" style="color: #c8c8c8;">мониторинг-штрафов.рф</a><br/>
                                              <br/>
                                              Ознакомительное использование<br/> доступно в течении 14 дней
                                              <br/><br/>
                                              Безналичный расчет для юр. лиц -->

                                            </div>
                                            </div>
                                            <div style="padding: 20px 8% 20px 4%; display: none;">
                                                <h4 style="color: #ddd0b2; padding-left: 12px;">Возможности мониторинга</h4>

                                                <div class="column one-third">
                                                    <div class="image_frame no_link scale-with-grid aligncenter no_border">
                                                        <div class="image_wrapper">
                                                          <img class="scale-with-grid" src="/images/image1_small.jpg" alt="" width="138" height="91" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="column one-third">
                                                    <div class="image_frame no_link scale-with-grid aligncenter no_border">
                                                      <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="/images/image1_small.jpg" alt="" width="138" height="91" />
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="column one-third">
                                                    <div class="image_frame no_link scale-with-grid aligncenter no_border">
                                                      <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="/images/image1_small.jpg" alt="" width="138" height="91" />
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="column one-third">
                                                    <div class="image_frame no_link scale-with-grid aligncenter no_border">
                                                      <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="/images/image1_small.jpg" alt="" width="138" height="91" />
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="column one-third">
                                                    <div class="image_frame no_link scale-with-grid aligncenter no_border">
                                                      <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="/images/image1_small.jpg" alt="" width="138" height="91" />
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="column one-third">
                                                    <div class="image_frame no_link scale-with-grid aligncenter no_border">
                                                      <div class="image_wrapper">
                                                        <img class="scale-with-grid" src="/images/image1_small.jpg" alt="" width="138" height="91" />
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/footer.inc.php");
?>
