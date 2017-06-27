<?
$balance = userBalance();
?>
<div class="panelf">
  <div class="" style="padding: 10px;">

    <h6>
      <span class="pointer" onClick="renderer('addmoney')" style="color: #435183; font-weight: bold; font-size: 14px;">Баланc</span>

      <span style="margin-left: 30px;" class="pointer addst-btn" onClick="infoPay()">Платежи</span>
    </h6>
    <div class="balancechanger">

      <div class="" style=" margin-bottom: 15px; padding-bottom: 10px;">
        <h4 style="font-family: 'roboto'; color: #444;">Ваш баланс <?=$balance;?> руб.</h4>
          <div><span style="margin-left: -2px;" class="pointer addstbtn" onClick="popolnenie()">Пополнить баланс</span></div>
        <div class="" style="margin-top: 30px;">
          Дата оканчания абонентского обслуживани <?=last_day_ao();?>
        </div>

        <div class="" style="margin-top: 30px;">
          <?
          if($balance==0) {
            $probDateEnd = probVerEnd();
            if($probDateEnd) {
              echo "Дата окончания пробной версии ".probVerEnd();
            } else {
              echo "Недостаточно средств для мониторинга штрафов. Пополните баланс";
            }
          }
          ?>
        </div>
      </div>

      <!-- <div class="">
        Этих средств хватит до: 22.05.17
      </div>
      <div class="">
        Оповестить о необходимости пополнить счет когда баланс будет менее 50 руб. [Да] [Нет]
      </div> -->


    </div>
  </div>

</div>
