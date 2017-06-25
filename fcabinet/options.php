<div class="panelf">

  <div class="" style="padding: 10px;">
    <h6 style="padding: 0px;" class="pointer" onclick="renderer('options')">Настройки</h6>
  </div>
  <div class="optionschanger">
    <div class="column one-second" style="padding-bottom: 0px; padding-left: 0px;">

        <div class="" style="padding: 10px 10px 0px 30px;">
          <div class="">
            <div class="">
              <h6>Смена пароля</h6>
            </div>
            <div class="" style="vertical-align: top;">
              Старый пароль<br/>
              <input type="password" style="display: inline-block; background: rgba(255,255,255,.15); height: 35px; margin-bottom: 12px;" id="choldpw" name="" value="">

            </div>
            <div class="" style="vertical-align: top; padding-left: 0px;">
              Новый пароль<br/>
              <input type="password" style="display: inline-block; background: rgba(255,255,255,.15); height: 35px; margin-bottom: 12px;"  id="chnewpw1" name="" value="">
              <br/>Повторите новый пароль<br/>
              <input type="password" style="display: inline-block; background: rgba(255,255,255,.15); height: 35px; margin-bottom: 12px;"  id="chnewpw2" name="" value="">

            </div>
            <div class="" style="vertical-align: top;">
              <div onClick="saveNewPw()" class="disactivebtn" style="margin-top: 15px; margin-bottom: 0px;">
                Сохранить новый пароль
              </div>
            </div>
          </div>
          <div class="repassmsg" style="display: none;">
            <p style="" style="padding-top: 50px;">Успешное изменение пароля. Вам отправлено оповещение на email о смене пароля.</p>
          </div>

        </div>
    </div>
    <div class="column one-second" style="padding-bottom: 0px; padding-left: 0px;">
      <div class="" style="padding: 10px 10px 10px 0px;">
        <div class="">
          <h6>Смена Email</h6>
        </div>
        Новый Email<br/>
        <input type="text" style="background: rgba(255,255,255,.15); height: 35px; margin-bottom: 12px;"  id="" name="" value="">
        Ваш пароль
        <input type="password" style="background: rgba(255,255,255,.15); height: 35px; margin-bottom: 12px;"  id="" name="" value="">
        <div class="disactivebtn" style="margin-top: 15px; margin-bottom: 25px;" onClick="chengeremail()">
          Сменить Email
        </div>
      </div>

    </div>
    <div class="clear">

    </div>
  </div>
</div>
