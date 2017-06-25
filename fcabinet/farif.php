<div class="panelf">
  <div class="" style="padding: 10px;">
    <h6 class="pointer" onClick="renderer('farif')">Тарифный план</h6>
  </div>
  <div class="">

  </div>
  <div class="" style="vertical-align: top;">
    <?
    // Если FREE то бесплатный тариф еще в силе, если 0 то просрочен, иначе return N tarif
    $tarif = getTarif();
    if($tarif=='free') {
        ?>
        <div class="tarif_active_free">
          <div class="" style="padding-left: 30px; margin-top: -10px; padding-bottom: 15px;">
              Вы используете пробную версию мониторинга штрафов, лицензия действительна <small style="font-size: 12px;">до <?=date('d.m.Y', time()+102020);?> года.</small>
          </div>
        </div>
        <div class="tariflist"  id="t1">
          <div class="" style="padding-left: 20px;">
            <div class="header-tarif">
              Базовый
              <img src="/images/proddelete.png" id="closetarifs1" onClick="closeactivetarif(1)"  width="16" class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">
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
            <div class="tarifstr">
              <div class="pointer" id="pt1" style="margin: 10px; color: #2d2d2d; padding: 4px 0; background: #dccfb1;" onClick="payTarif(1)">
                Активировать
              </div>
              <div id="gopt1" class="pointer" style="color: #ddd0b2; background: rgb(47, 55, 66); margin: 10px 10px 10px 10px; display: none; padding: 4px 0;"  onClick="goPayTarif(1)">
                Перейти к оплате
              </div>
            </div>

          </div>
        </div>
        <div class="tariflist" id="t2">
          <div class="" style="padding-left: 20px; position: relative;">

            <div class="header-tarif" style="position: relative; background: #2f3742; color: #dccfb1;">
              Стандарт
              <img src="/images/proddelete.png" onClick="closeactivetarif(2)" id="closetarifs2" width="16" class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">
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
            <div class="tarifstr" style="height: 50px;">
              <div class="pointer" id="pt2" style="margin: 10px; color: #dccfb1; padding: 4px 0; background: #2f3742;"  onClick="payTarif(2)">
                Активировать
              </div>
              <div id="gopt2" class="pointer" style="margin: 10px 10px 10px 10px; color: #2f3742; display: none; padding: 4px 0; background: #dccfb1;"  onClick="goPayTarif(2)">
                Перейти к оплате
              </div>
            </div>
          </div>
        </div>
        <div class="tariflist" id="t3">
          <div class="" style="padding-left: 20px;">
            <div class="header-tarif">
              Ультиматум
              <img src="/images/proddelete.png" class="pointer" id="closetarifs3" onClick="closeactivetarif(3)"  width="16" style="position: absolute; top: -18px; right: -18px; opacity: .0;">

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
            <div class="tarifstr">
              <div class="pointer"  id="pt3" style="margin: 10px; color: #2d2d2d; padding: 4px 0; background: #dccfb1;"  onClick="payTarif(3)">
                Активировать
              </div>
              <div id="gopt3" class="pointer" style="margin: 10px 10px 10px 10px; display: none; padding: 4px 0; color: #ddd0b2; background: rgb(47, 55, 66); "  onClick="goPayTarif(3)">
                Перейти к оплате
              </div>
            </div>
          </div>
        </div>
        <div class="tariflist" id="t4">
          <div class="" style="padding-left: 20px;">
            <div class="header-tarif">
              Корпорация
              <img src="/images/proddelete.png" id="closetarifs4" width="16" onClick="closeactivetarif(4)"  class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">

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
            <div class="tarifstr">
              <div class="pointer"  id="pt4" style="margin: 10px; color: #2d2d2d; padding: 4px 0; background: #dccfb1;"  onClick="payTarif(4)">
                Активировать
              </div>
              <div id="gopt4" class="pointer" style="margin: 10px 10px 10px 10px; display: none; padding: 4px 0; color: #ddd0b2; background: rgb(47, 55, 66); "  onClick="goPayTarif(4)">
                Перейти к оплате
              </div>
            </div>
          </div>
        </div>
        <?
    } else if($tarif==0){
      echo "Бесплатный период пробной версии закончился, выбирите тарифный план";
    } else {
      if($tarif==1) {
        ?>
        <div class="tariflist"  id="t1">
          <div class="" style="padding-left: 20px;">
            <div class="" style="padding: 5px; color: #dccfb1;">
              Активный тарифный план
            </div>
            <div class="header-tarif">
              Базовый
              <img src="/images/proddelete.png" id="closetarifs1" onClick="closeactivetarif(1)"  width="16" class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">
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
        <?
      } else {
        ?>
        <div class="tariflist"  id="t1">
          <div class="" style="padding-left: 20px;">
            <div class="header-tarif">
              Базовый
              <img src="/images/proddelete.png" id="closetarifs1" onClick="closeactivetarif(1)"  width="16" class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">
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
            <div class="tarifstr">
              <div class="pointer" id="pt1" style="margin: 10px; color: #2d2d2d; padding: 4px 0; background: #dccfb1;" onClick="payTarif(1)">
                Активировать
              </div>
              <div id="gopt1" class="pointer" style="color: #ddd0b2; background: rgb(47, 55, 66); margin: 10px 10px 10px 10px; display: none; padding: 4px 0;"  onClick="goPayTarif(1)">
                Перейти к оплате
              </div>
            </div>

          </div>
        </div>
        <?
      };
      if($tarif==2) {
        ?>

        <div class="tariflist" id="t2">
          <div class="" style="padding-left: 20px; position: relative;">
            <div class="" style="padding: 5px; color: #dccfb1;">
              Активный тарифный план
            </div>
            <div class="header-tarif" style="position: relative; background: #2f3742; color: #dccfb1;">
              Стандарт
              <img src="/images/proddelete.png" onClick="closeactivetarif(2)" id="closetarifs2" width="16" class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">
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
        <?
      } else {
        ?>
        <div class="tariflist" id="t2">
          <div class="" style="padding-left: 20px; position: relative;">

            <div class="header-tarif" style="position: relative; background: #2f3742; color: #dccfb1;">
              Стандарт
              <img src="/images/proddelete.png" onClick="closeactivetarif(2)" id="closetarifs2" width="16" class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">
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
            <div class="tarifstr" style="height: 50px;">
              <div class="pointer" id="pt2" style="margin: 10px; color: #dccfb1; padding: 4px 0; background: #2f3742;"  onClick="payTarif(2)">
                Активировать
              </div>
              <div id="gopt2" class="pointer" style="margin: 10px 10px 10px 10px; color: #2f3742; display: none; padding: 4px 0; background: #dccfb1;"  onClick="goPayTarif(2)">
                Перейти к оплате
              </div>
            </div>
          </div>
        </div>
        <?
      };
      if($tarif==3) {
        ?>
        <div class="tariflist" id="t3">
          <div class="" style="padding-left: 20px;">
            <div class="" style="padding: 5px; color: #dccfb1;">
              Активный тарифный план
            </div>
            <div class="header-tarif">
              Ультиматум
              <img src="/images/proddelete.png" class="pointer" id="closetarifs3" onClick="closeactivetarif(3)"  width="16" style="position: absolute; top: -18px; right: -18px; opacity: .0;">

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
        <?
      } else {
        ?>
        <div class="tariflist" id="t3">
          <div class="" style="padding-left: 20px;">

            <div class="header-tarif">
              Ультиматум
              <img src="/images/proddelete.png" class="pointer" id="closetarifs3" onClick="closeactivetarif(3)"  width="16" style="position: absolute; top: -18px; right: -18px; opacity: .0;">

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
            <div class="tarifstr">
              <div class="pointer"  id="pt3" style="margin: 10px; color: #2d2d2d; padding: 4px 0; background: #dccfb1;"  onClick="payTarif(3)">
                Активировать
              </div>
              <div id="gopt3" class="pointer" style="margin: 10px 10px 10px 10px; display: none; padding: 4px 0; color: #ddd0b2; background: rgb(47, 55, 66); "  onClick="goPayTarif(3)">
                Перейти к оплате
              </div>
            </div>
          </div>
        </div>
        <?
      };
      if($tarif==4) {
        ?>
        <div class="tariflist" id="t4">
          <div class="" style="padding-left: 20px;">
            <div class="" style="padding: 5px; color: #dccfb1;">
              Активный тарифный план
            </div>
            <div class="header-tarif">
              Корпорация
              <img src="/images/proddelete.png" id="closetarifs4" width="16" onClick="closeactivetarif(4)"  class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">

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
        <?
      } else {
        ?>
        <div class="tariflist" id="t4">
          <div class="" style="padding-left: 20px;">
            <div class="header-tarif">
              Корпорация
              <img src="/images/proddelete.png" id="closetarifs4" width="16" onClick="closeactivetarif(4)"  class="pointer" style="position: absolute; top: -18px; right: -18px; opacity: .0;">

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
            <div class="tarifstr">
              <div class="pointer"  id="pt4" style="margin: 10px; color: #2d2d2d; padding: 4px 0; background: #dccfb1;"  onClick="payTarif(4)">
                Активировать
              </div>
              <div id="gopt4" class="pointer" style="margin: 10px 10px 10px 10px; display: none; padding: 4px 0; color: #ddd0b2; background: rgb(47, 55, 66); "  onClick="goPayTarif(4)">
                Перейти к оплате
              </div>
            </div>
          </div>
        <?
      };
      ?>




      </div>
      <?
    }
    ?>
  </div>
</div>
