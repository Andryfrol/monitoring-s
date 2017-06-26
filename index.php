<?
session_start();
$page_index = 'color:#fff; font-weight: 600;';
$page = 'index';
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");

?>

        <div id="Content">
            <div class="content_wrapper clearfix ">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section " style="padding-top:20px; padding-bottom:0px; background-color: #fff;">
                            <div class="section_wrapper clearfix panelf">
                                <div class="items_group clearfix ">
                                    <div class="column  one-second">
                                        <div class="column_attr ">
                                            <div style="border-right: 2px solid #fff; padding: 20px 8% 0px 8%; margin-right: -2%;">
                                                <div><h1 class="h1_main">Проверить штрафы ГИБДД</h1></div>
                                                <div>
                                                    <div>Введите № свидетельства о регистрации ТС</div>
                                                    <div>
                                                        <input id="sv-vo" type="text" placeholder="Введите серию и номер СТС (без пробелов)"/>
                                                        <div id="searcher-fine" onclick="classes.openSearchFine()">Проверить</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="padding-left: 50px;">
                                                <div><h2 class="h1_main">Демо доступ к личному кабинету</h2></div>
                                                <div class="bly-btn">Открыть демоверсию</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column one-second">
                                        <div class="column_attr ">
                                            <div style="padding: 20px 8% 20px 4%; font-sizE: 16px;">
                                            <div class="color444" style=" color: #444;  font-family: 'roboto'; font-weight:300;">
                                                <h2 class="h1_main">Автоматическая система мониторинга штрафов</h4>
                                                <p class="big roboto" style="font-size: 16px; color: #444; font-weight:300;">
                                                    Система мониторинг-штрафов предназначена для своевременного обноружения штрафов
                                                    полученных транспортными средствами компании, с целью своевремменоо обнаружения данного пункта расходов и проведения мероприятий сокращающих дальнейшее получение штрафов.
                                                    <br/>Оповещения о полученных штрафах осуществляются по средствам Email.
                                                    <br/>Возможна гибкая настройка рассылки отчетов по штрафам, включая разделение полученной информации по группам автотранспорта и емайлам получателей.
                                                </p>
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
                                    <div>

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
