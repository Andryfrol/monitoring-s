<?
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
$page = 404;
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");
// Записать в лог что попытка открытия несуществующей страницы
?>
<div class="section " style="padding-top:40px; padding-bottom:0px; background-color:; background: #fff; background-repeat:repeat; background-position:center top; ">
    <div class="section_wrapper clearfix">
        <div class="items_group clearfix">
            <!-- One full width row-->
            <div class="items_group">
              <div class="column one" style="margin-bottom: 0px;">
                <div class="">
                  <!-- <div class="">
                    <h4>Страница не найденна</h4>
                  </div>
                  <h6>Ошибка 404</h6> -->
                  <img src="/images/ssssa.png" alt="" style="margin-bottom: -30px; width: 277px; z-index: 100;">
                  <div class="" style="border: 1px solid rgba(214, 215, 216,.3); border-radius: 0; min-height: 130px; z-index: -10; padding: 40px;">
                    <a href="/index2.php" style="text-decoration: none;">
                      <h4>Вернуться на главную</h4>
                      <img src="/images/asasdasa.png" width="200" alt="">
                    </a>
                  </div>

                </div>
                <div class="">

                </div>
                <div class="column one column_divider ">
                    <hr class="no_line hrmargin_b_10" />
                </div>
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
<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/footer.inc.php");
?>
