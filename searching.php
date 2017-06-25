<?
session_start();
$page = 'searching';
$page_search = 'color: #ddd0b2;';
include_once($_SERVER['DOCUMENT_ROOT']."/php/fns.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/head.inc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.inc.php");

?>

        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">

                        <div class="section " style="padding-top:20px; padding-bottom:0px; background-color:; background-image:url(images/home_kravmaga_bg2.jpg); background-repeat:repeat; background-position:center top; ">
                            <div class="section_wrapper clearfix" >
                                <div class="items_group clearfix panelf">
                                    <!-- One full width row-->

                                    <div class="items_group">
                                      <div class="column one-third " style=" padding-bottom: 0px; margin-bottom: 0px; margin-top: 20px;">
                                        <div class="" style="padding: 25px 15px;">

                                        <div class="">
                                          <h4 style=" font-family: 'roboto'; font-weight:300;">Проверка штрафов ГИБДД</h4>
                                        </div>
                                        <div class="" style="display: inline-block; margin-right: 30px; margin-top: 13px;">
                                          <label for="sear1" style="cursor: pointer; font-weight: 400;  font-family: 'roboto'; font-weight:300; color: #e8e8e8;" onClick="jQuery('.search_number').attr('placeholder', 'Введите серию и номер СТС (без пробелов)');">
                                            <input type="radio" name="sear" value="1" id="sear1" checked>&nbsp;&nbsp;&nbsp;Поиск по номеру CTC
                                          </label>
                                        </div>
                                        <!-- <div class=""  style="display: inline-block; margin-top: 13px;">
                                          <label for="sear2" style="cursor: pointer; font-weight: 400; color: #e8e8e8;" onClick="jQuery('.search_number').attr('placeholder', 'Введите номер постановления');">
                                            <input type="radio" name="sear" value="2" id="sear2">&nbsp;&nbsp;&nbsp;Поиск по номеру постановления
                                          </label>
                                        </div> -->
                                        <div class="errorlenmsg" style="min-height: 22px; padding-top: 7px;">

                                        </div>
                                        <div class="" style="margin-top: 10px;">
                                          <input type="text" placeholder="Введите серию и номер СТС (без пробелов)" class="search_number" style="width: 700px; background: rgba(255,255,255,.15); ">
                                        </div>
                                        <div class="" style="text-align: right;">
                                          <!-- <span  style="float: left; text-align: left; color: #e8e8e8;" >
                                            <small style="font-size: 12px; cursor: pointer;" onclick="jQuery('.primersts').toggle();">пример</small><br/>
                                            <img src="/images/stsseria.jpg" class="primersts" width="130" alt="" style="display: none;">
                                          </span> -->
                                          <div onclick="startSearchingFines()" class="disactivebtn" style="margin-top: 23px; margin-right: -1px;  font-family: 'roboto'; font-weight:300;  color: #e8e8e8;">
                                            Поиск штрафов
                                          </div>
                                        </div>


                                      </div>


                                      </div>
                                      <div class="column two-third" style="margin-bottom: 0px;">
                                        <h4 style="opacity: 0;">Результаты поиска штрафов</h4>
                                          <iframe id="myIframe" style=" margin-left: -84px; margin-top: -28px; width: 1000px; height: 400px;" src=""></iframe>
                                      </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- <div class="section " style="padding-top:47px; padding-bottom:0px; background-color:; background-image:url(images/home_kravmaga_box_bottom.png); background-repeat:no-repeat; background-position:center top; ">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix"></div>
                            </div>
                        </div> -->


                        <div class="section the_content no_content" >
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/footer.inc.php");
?>
