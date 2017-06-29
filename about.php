<?
session_start();
$page = 'about';
$page_about = 'color: #fff; font-weight: bold; ';
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");
?>
<div class="section bgrwite" style="padding-top:20px; padding-bottom:0px;">
    <div class="section_wrapper clearfix panelf" style="padding-top: 20px;">
        <div class="items_group clearfix">
            <!-- One full width row-->
            <div class="column one column_column ">
                <div class="column_attr">
                  <h3 id="" style="margin-top: 20px; text-align: left; padding-left: 20px; font-weight: 300;  color: #444; font-family: 'roboto';">
                      О системе мониторинга
                  </h3>
                </div>
                <br/>
                <div class="" style="font-size: 16px; padding-lefT: 20px; color: #444; font-family: 'roboto'; font-weight:300; ">
                  <span style="color: #444; font-size: 20px;   font-family: 'roboto'; font-weight:300; ">Как работает система мониторинга</span><br/><br/>
                  После добавления номера СТС в систему мониторинга штрафов, происходит ежедневная проверка штрафов<br/>
                  Тем самым вы вовремя получаете данные о поступивших штрафах.<br/>
                  Система имеет возможность построения и выгрузки отчетов по всем найденным штрафам, для использования этих данных вашей компанией.<br/>
                  Для удобства вы можете группировать транспортные средства, строить отчеты по этим группам, настраивать получение отчетов по группам ТС.
                </div>
            </div>
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_list ">
                <div class="list_item lists_1 clearfix">

                    <div class="list_right">
                        <h4 style="font-family: 'roboto'; color: #444;">Своевременные оповещения</h4 style="font-family: 'roboto';">
                        <div class="desc" style="font-family: 'roboto';  color: #444; font-weight:300; ">
                            Возможность настройки периода оповещений, и получателей.
                        </div>
                    </div>
                </div>
            </div>
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_list ">
                <div class="list_item lists_1 clearfix">

                    <div class="list_right">
                        <h4 style="font-family: 'roboto'; color: #444 ">Ежедневная проверка</h4 style="font-family: 'roboto';">
                        <div class="desc" style="font-family: 'roboto';  color: #444; font-weight:300; ">
                            Обеспечивает незамедлительное оповещение о появлении штрафов.
                        </div>
                    </div>
                </div>
            </div>
            <!-- One Third (1/3) Column
            <div class="column one-third column_list ">
                <div class="list_item lists_1 clearfix">

                    <div class="list_right">
                        <h4 style="font-family: 'roboto'; color: #444;">Добавляйте менеджеров</h4 style="font-family: 'roboto';">
                        <div class="desc" style="font-family: 'roboto'; color: #444; font-weight:300; ">
                            Добавляйте доступ для мониторинга отдельной группы транспорта.
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Page devider -->
            <!-- One full width row-->
            <div class="column one column_divider ">
                <hr class="no_line" />
            </div>
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_list ">
                <div class="list_item lists_1 clearfix">

                    <div class="list_right">
                        <h4 style="font-family: 'roboto';  color: #444;">Создание отчетов</h4 style="font-family: 'roboto';">
                        <div class="desc" style="font-family: 'roboto';  color: #444; font-weight:300; ">
                            Делайте отчеты по группам транспорта или по всему транспорту
                        </div>
                    </div>
                </div>
            </div>
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_list ">
                <div class="list_item lists_1 clearfix">

                    <div class="list_right">
                        <h4 style="font-family: 'roboto';  color: #444;">Экспорт данных в Excell</h4 style="font-family: 'roboto';">
                        <div class="desc" style="font-family: 'roboto';  color: #444; font-weight:300; ">
                            Экспортируйте данные по штрафам в Excell для удобного использования.
                        </div>
                    </div>
                </div>
            </div>
            <!-- One Third (1/3) Column -->
            <div class="column one-third column_list ">
                <div class="list_item lists_1 clearfix">

                    <div class="list_right">
                        <h4 style="font-family: 'roboto';  color: #444;">Экономия денег</h4 style="font-family: 'roboto';">
                        <div class="desc" style="font-family: 'roboto';  color: #444; font-weight:300; ">
                            Вовремя получая информацию о нарушениях, вы контролируете свой бизнес и экономите деньги.
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="column one column_column ">
                <div class="column_attr">
                  <h3 id="" style="margin-top: 20px; text-align: center; font-weight: 300; font-family: 'roboto';  color: #444;">FAQ</h3>
                </div>
                <div class="" style="font-size: 16px; padding-lefT: 20px; color: #444; font-family: 'roboto'; font-weight:300; ">
                  <span style="color: #444; font-size: 20px;   font-family: 'roboto'; font-weight:300; ">Как часто выполныется проверка штрафов?</span><br/><br/>
                  - Нашей системой осуществляется ежедневная проверка штрафов по базе ГИБДД
                </div>
              <br>
                <div class="" style="font-size: 16px; padding-lefT: 20px; color: #444; font-family: 'roboto'; font-weight:300; ">
                  <span style="color: #444; font-size: 20px;   font-family: 'roboto'; font-weight:300; ">Возможен-ли безналичный рассчет?</span><br/><br/>
                  - Да, вы отправляете нам свои банковские реквизиты и мы выставляем вам счет.
                </div>
            </div>
            <div class="column one column_divider ">
                <hr class="no_line hrmargin_b_10" />
            </div>
            <div class="" style="clear: both;">

            </div>
            -->

        </div>

    </div>
    <?php
    include_once($_SERVER['DOCUMENT_ROOT']."/inc/logos-footer.php");
    ?>
</div>

<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/footer.inc.php");
?>
