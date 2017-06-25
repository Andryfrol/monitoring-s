<?
session_start();
$page = 'tarif';
$page_tarif = 'color: #ddd0b2;';
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");
?>

        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section " style="padding-top:20px; padding-bottom:10px; background-color:; background-image:url(images/home_kravmaga_bg2.jpg); background-repeat:repeat; background-position:center top; ">
                            <div class="section_wrapper clearfix panelf">
                              <div class="column one column_column " style="margin-bottom: 3px;">
                                  <div class="column_attr">
                                      <h3 id="trainers" style="margin-top: 40px; text-align: center;  font-family: 'roboto'; font-weight:300;">Тарифные планы<br/>
                                        <span style="font-size: 16px;  font-family: 'roboto'; font-weight:300;">Автоматическая система мониторинга штрафов ГИБДД </span></h3>
                                  </div>
                              </div>
                              <div class="column one column_column " style="text-align: center;">

                                <div class="tariflist"  id="t1">
                                  <div class="" style="padding-left: 20px;">
                                    <div class="header-tarif">
                                      Базовый
                                      <img src="/images/proddelete.png" alt="скрыть" id="closetarifs1" onClick="closeactivetarif(1)"  width="16" class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">
                                    </div>
                                    <div class="tarifprice">
                                      50 руб./мес.
                                    </div>
                                    <div class="tarifstr">
                                      до 30 машин
                                    </div>
                                    <div class="tarifstr">
                                      Экспорт данных
                                    </div>
                                    <div class="tarifstr">
                                      Email оповещения
                                    </div>
                                    <div class="tarifstr">
                                      Группировка транспорта
                                    </div>

                                  </div>
                                </div>
                                <div class="tariflist" id="t2">
                                  <div class="" style="padding-left: 20px; position: relative;">

                                    <div class="header-tarif" style="position: relative; background: #2f3742; color: #dccfb1;">
                                      Стандарт
                                      <img src="/images/proddelete.png" alt="скрыть" onClick="closeactivetarif(2)" id="closetarifs2" width="16" class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">
                                      <div class="" style="position: absolute; top: -4px; right: -4px;">
                                        <img src="/images/besttarif.png" style="" alt="">

                                      </div>

                                    </div>
                                    <div class="tarifprice">
                                      100 руб./мес.
                                    </div>
                                    <div class="tarifstr">
                                      до 100 машин
                                    </div>
                                    <div class="tarifstr">
                                      Экспорт данных
                                    </div>
                                    <div class="tarifstr">
                                      Email оповещения
                                    </div>
                                    <div class="tarifstr">
                                      Группировка транспорта
                                    </div>

                                  </div>
                                </div>
                                <div class="tariflist" id="t3">
                                  <div class="" style="padding-left: 20px;">
                                    <div class="header-tarif">
                                      Ультиматум
                                      <img src="/images/proddelete.png" alt="скрыть" class="pointer" id="closetarifs3" onClick="closeactivetarif(3)"  width="16" style="position: absolute; top: -18px; right: -18px; opacity: .0;">

                                    </div>
                                    <div class="tarifprice">
                                      150 руб./мес.
                                    </div>
                                    <div class="tarifstr">
                                      до 200 машин
                                    </div>
                                    <div class="tarifstr">
                                      Экспорт данных
                                    </div>
                                    <div class="tarifstr">
                                      Email оповещения
                                    </div>
                                    <div class="tarifstr">
                                      Группировка транспорта
                                    </div>

                                  </div>
                                </div>
                                <div class="tariflist" id="t4">
                                  <div class="" style="padding-left: 20px;">
                                    <div class="header-tarif">
                                      Корпорация
                                      <img src="/images/proddelete.png" alt="скрыть" id="closetarifs4" width="16" onClick="closeactivetarif(4)"  class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">

                                    </div>
                                    <div class="tarifprice">
                                      250 руб./мес
                                    </div>
                                    <div class="tarifstr">
                                      до 500 машин
                                    </div>

                                    <div class="tarifstr">
                                      Экспорт данных
                                    </div>
                                    <div class="tarifstr">
                                      Email оповещения
                                    </div>
                                    <div class="tarifstr">
                                      Группировка транспорта
                                    </div>

                                </div>
                              </div>
                            <div class="" style="color: #c8c8c8; cursor: default; font-family: 'roboto'; font-weight:300; color: #ddd0b2;">
                              Ознакомительное использование сервиса доступно в течении 14 дней после регистрации.
                            </div>
                            </div>
                        </div>
                        <div class="section the_content no_content" >
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
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
