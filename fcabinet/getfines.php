<div class="panelf">
  <div class="" style="padding: 10px 15px;">
    <h6><span class="pointer" onClick="renderer('fines')">Штрафы</span>
      <span style="float: right; display: none;">Данные штрафов обновлены <?=date('d.m.Y',time());?></span></h6>
  </div>
  <?
  // Получаем все СТС номера транспортных средств компании
  $q_transport = sprintf("SELECT * FROM transport WHERE user_id = '".$_SESSION['user_id']."'");
  $r_transport = mysql_query($q_transport);
  $n_transport = mysql_numrows($r_transport);

  if ($n_transport > 0) {
      $sts_nums = "(";
      for ($i = 0; $i < $n_transport; $i++) {
          $transport_sts = htmlspecialchars(mysql_result($r_transport, $i, "transport.sts"));
          if($i==0) {
            $sts_nums .= "'".$transport_sts."'";
          } else {
            $sts_nums .=",'".$transport_sts."'";
          }
      }
      $sts_nums .= ")";
  }

   // Есть ли транспортные средства?
   $issetli = issetLiTransport();



   if($issetli) {
     $tarif = getTarif();
     if(($tarif=='free')||($tarif!=0)) {
       // Получаем данные по штрафам


      $q_new_blank_data = sprintf("SELECT * FROM new_blank_data WHERE sts_n IN ".$sts_nums." ORDER BY dat_timestamp DESC");
      $r_new_blank_data = mysql_query($q_new_blank_data);
      $n_new_blank_data = mysql_numrows($r_new_blank_data);

      // Получаем массив ГОС номер И Групп ИД
      $gos_and_grup_id = gos_and_grup_id();

      $get_group_trans_by_user_id = get_group_trans_by_user_id();

      if ($n_new_blank_data > 0) {
          ?>

          <div style='text-align: right;'>

            <div class="" style="float: left; padding: 10px; cursor: default;">
              Количество найденных штрафов <span style="padding: 10px; color: #dccfb1; cursor: default;"><?=$n_new_blank_data;?></span>

            </div>

            <a href="/printer/all" style="color: #e8e8e8;" target="_blank">
              <div class="btnexport" onclick="exportDataToExcell('all')">
                Печатать все штрафы
              </div>
            </a>
            <div class="btnexport" onclick="exportDataToExcell('all')">
              Экспортировать в Excell
            </div>

            <div class="clear">

            </div>
          </div>
          <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1);"></div>
          <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1);">
            <div class="tdcell" style="width: 80px;">
              Дата
            </div>
            <div class="tdcell">
              Гос номер
            </div>
            <div class="tdcell">
              Сумма штрафа
            </div>
            <div class="tdcell">
              Группа
            </div>
            <div class="tdcell">
              Номер СТС
            </div>
            <div class="tdcell_post">
               Постановление
            </div>
            <div class="tdcell" style="width: 80px;">
            </div>
          </div>
          <?
          for ($i = 0; $i < $n_new_blank_data; $i++) {
              $new_blank_data_time_zadachi = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.time_zadachi"));
              $new_blank_data_id_zadachi = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.id_zadachi"));
              $new_blank_data_b_sum = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.b_sum"));
              $new_blank_data_addinfo = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.addinfo"));
              $new_blank_data_dat = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.dat"));
              $new_blank_data_type = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.type"));
              $new_blank_data_feesrv = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.feesrv"));
              $new_blank_data_payeridentifier = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.payeridentifier"));
              $new_blank_data_articlecode = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.articlecode"));
              $new_blank_data_location = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.location"));
              $new_blank_data_discountsize = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.discountsize"));
              $new_blank_data_discountdate = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.discountdate"));
              $new_blank_data_totalamount = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.totalamount"));
              $new_blank_data_ispaid = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.ispaid"));
              $new_blank_data_bank_soiname = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_soiname"));
              $new_blank_data_bank_inn = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_inn"));
              $new_blank_data_bank_kpp = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_kpp"));
              $new_blank_data_bank_acc = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_acc"));
              $new_blank_data_bank_bankname = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_bankname"));
              $new_blank_data_bank_bik = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_bik"));
              $new_blank_data_bank_purpose = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_purpose"));
              $new_blank_data_bank_username = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_username"));
              $new_blank_data_bank_kbk = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_kbk"));
              $new_blank_data_bank_oktmo = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_oktmo"));
              $new_blank_data_bank_sign = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_sign"));
              $new_blank_data_bank_billdate = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.bank_billdate"));
              $new_blank_data_l_unic_num_shtr = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.l_unic_num_shtr"));
              $new_blank_data_id = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.id"));
              $new_blank_data_sts_n = htmlspecialchars(mysql_result($r_new_blank_data, $i, "new_blank_data.sts_n"));

              ?>
              <div class="" style="border-bottom: 1px solid rgba(255,255,255,.1);"></div>
              <div class="str_to_excell" name="<?=$new_blank_data_id;?>" style="border-bottom: 1px solid rgba(255,255,255,.1);">
                <div class="tdcell" style="width: 80px;">
                  <?=$new_blank_data_dat;?>
                </div>
                <div class="tdcell">
                  <?
                  $gos_n = mb_strtoupper($gos_and_grup_id[$new_blank_data_sts_n][1],'UTF-8');
                  echo $gos_n;
                  ?>
                </div>
                <div class="tdcell">
                  <?=$new_blank_data_b_sum;?> руб.
                </div>
                <div class="tdcell">
                  <?=$get_group_trans_by_user_id[$gos_and_grup_id[$new_blank_data_sts_n][0]];?>
                </div>
                <div class="tdcell">
                  <?=$new_blank_data_sts_n;?>
                </div>
                <div class="tdcell_post">
                  <?=$new_blank_data_l_unic_num_shtr;?>
                </div>
                <div class="tdcell" style="width: 80px;">
                  <a target="_blank" href="/оплатить-штраф?num=<?=$new_blank_data_l_unic_num_shtr;?>&go=pay&summ=<?=$new_blank_data_b_sum;?>&summ2=<?=$new_blank_data_feesrv;?>" style="color: #c8c8c8;">Оплатить</a>
                </div>
              </div>

              <?
          }
      } else {
        echo "Нет данных";
      }

     } else {
       // Пробный тариф истек.
     }
     // echo $tarif;
   } else {
     echo "<p style='padding-left: 10px;'>Вам будет доступен поиск штрафов - после добавления транспортных средств.<br/> <span>Добавьте транспортные средства в разделе <span onClick='renderer(\"transport\")' style='text-decoration: underline;' class='pointer'>\"Мой транспорт\"</span></p>";
   }
  ?>

</div>
