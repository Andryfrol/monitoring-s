

        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">


                        <div class="section bgrwite" style="padding-top:20px; padding-bottom:0px;">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix panelf">

                                    <!-- One Second (1/2) Column -->
                                    <div class="doorerror" style='text-align: center; margin-top: -15px; padding-bottom: 10px; height: 28px;'>

                                    </div>
                                    <div class="">
                                      <h4 style="color: #444; text-align: center; font-weight: 300; font-family: 'Roboto';">Сайт скоро откроется, временно не работает!</h4>
                                    </div>
                                    <div class="column one-second column_column ">

                                        <div class="column_attr ">
                                            <div style="border-right: 1px solid #ebebeb; padding: 20px 8% 20px 8%; margin-right: 0%;">

                                                <h4 style="text-align: right; padding-right: 185px; color: #444; font-weight: 300; font-family: 'Roboto';">Вход</h4>

                                                <div class="" style="text-align: right;">
                                                    <form id="formdoor" action="/в-кабинет" method="post">
                                                        <div  style="padding-right: 196px;">email</div>
                                                      <input type="text" placeholder="Email" name="email" class="loginis" style="background: rgba(255,255,255,.15);display: inline-block; margin-bottom: 20px;">
                                                      <div class=""></div>
                                                        <div style="padding-right: 183px;">пароль</div>

                                                      <input type="password" placeholder="Пароль" name="password" class="passis" style="background: rgba(255,255,255,.15); display: inline-block;">
                                                    </form>
                                                </div>
                                                <div class="" style="margin-top: 0px; text-align: right;">
                                                  <button type="button" name="button" style="padding: 11px 7px; margin-left: 0px; margin-right: 0px; background: #435183; color: #fff; border-radius: 0px; margin-top: 10px; width: 230px;" onClick="openthedoor()">Войти</button>
                                                </div>
                                                <div class="">
                                                  <span style="float: right; display: none; margin-top: 2px;" class="pointer hidezabilpassclose" onClick="hidezabilpassclose()"><img src="/images/proddelete.png" width="12" class="closserzabil" alt="Кнопка скрыть." title="Скрыть"/></span>
                                                  <p id="headzabilpass" class="pointer" style="text-align: right; margin-top: 20px; padding-right: 71px;" onClick="showZabilPass()">Восстановление пароля</p>

                                                </div>
                                                <div class="zabilpasspanel" style="text-align: right; display: none;">
                                                  <div class="" style="padding-right: 57px;">

                                                  </div>
                                                  <input type="text" placeholder="Введите Email от аккаунта" class="email_repassword" style="background: rgba(255,255,255,.15);display: inline-block; margin-bottom: 20px;">
                                                  <div class="" style="margin-top: 0px; text-align: right;">
                                                    <button type="button" name="button" style="padding: 11px 7px; margin-left: 0px; margin-right: 0px; background: #435183; color: #fff; border-radius: 0px; margin-top: 10px; width: 230px;" onClick="vosstanovlenie()">Восстановить пароль</button>
                                                  </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column ">
                                        <div class="column_attr">
                                            <div style="padding: 20px 8% 20px 4%;">
                                                <h4 style="color: #444; font-weight: 300; font-family: 'Roboto';">Регистрация</h4>
                                                    <div  style="">название компании или ИП</div>
                                                  <input type="text" id="regcompanyname" placeholder="* Название компании или ИП">
                                                <div class="">
                                                </div>
                                                  <div>email</div>
                                                  <input type="text" id="regcompanyemail" placeholder="* Email">
                                                <div class="">
                                                </div>
                                                  <div>пароль</div>
                                                  <input type="password" id="regcompanypass1" placeholder="* Пароль" style="background: rgba(255,255,255,.15); margin-bottom: 20px;">
                                                <div class="">
                                                </div>
                                                <div>повторите пароль</div>
                                                <input type="password" id="regcompanypass2" placeholder="* Повтор пароля" style=" background: rgba(255,255,255,.15); margin-bottom: 20px;">
                                                <div class="">
<!--                                                  <button type="button" name="button" id="register" style="border-radius: 0px; width: 230px; margin-top: 10px; background: #435183; color: #fff;" onclick="registerNewUser()">Регистрация</button>-->
                                                </div>
                                            </div>
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


                        <div class="section the_content no_content" style="">
                            <?php
                            include_once($_SERVER['DOCUMENT_ROOT']."/inc/logos-footer.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
