
<div class="panelf" style="">
  <div class="" style="padding: 15px 15px 0 15px;">
    <div class="">
      <h6>
        <span onClick="renderer('reports')" class="header_report_1 pointer">Отчеты </span>&nbsp;&nbsp;&nbsp;
        <span class="i_name_otchet" onClick="reportPoGruppe()"></span>
        <span class="postroinnii_otshet">Отчет</span>

      </h6>
    </div>
  </div>

  <div class="i_report_block_1">
    <div class="reportchanger" style="display: inline-block; width: 48%;">
      <div class="" style="padding-left: 15px; color: #c8c8c8; background: rgba(255,255,255,.1); padding: 10px; border-left: 2px solid #ddd0b2">
          Отчеты помогают увидеть тенденцию получения штрафов<br/> по группам ТС или отдельному ТС, за определенный период.
      </div>
      <div class="" style="padding: 0px; padding-top: 20px;">
        <div class="" style="padding: 5px 0; ">
          <div class="button-round" onClick="reportPoGruppe()">
            <img src="/images/bars-chart.png" alt="" class="colored-image" style="float: left;  margin-right: 10px; width: 22px;">
            Построить отчет по группе транспортных средств
            <img src="/images/exit-to-app-button.png" style="float: right; margin-top: 4px;" class="right-arrow-btn" width="14" alt="">
          </div>
        </div>
        <div class=""  style="padding: 5px 0;">

          <div class="button-round" for="report2"  onClick="reportPoVsem()" style="position: relative;">
            <img src="/images/bars-chart.png" alt="" class="colored-image" style="float: left;  margin-right: 10px; width: 22px;">
            Построить отчет по всем найденным штрафам
            <img src="/images/exit-to-app-button.png" style="float: right; margin-top: 4px;" class="right-arrow-btn" width="14" alt="">
          </div>

        </div>
        <div class=""  style="padding: 5px 0;">
          <div class="button-round" for="report3"  onClick="reportPoOtdelnim()" >
            <img src="/images/bars-chart.png" alt="" class="colored-image" style="float: left;  margin-right: 10px; width: 22px;">
            Построить отчет по отдельным автомобилям
            <img src="/images/exit-to-app-button.png" style="float: right; margin-top: 4px;" class="right-arrow-btn" width="14" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="reportChanger" style="display: inline-block; width: 48%; vertical-align: top;"  >
        <div class="" style="padding-left: 20px;">
          Отчет <span style="color: #ddd0b2;">по группе</span> транспортных средств:<br/>
          - незаменим при мониторинге штрафов филиалов компании, позволяет наглядно проанализировать ситуацию.
          <br/><br/>
          Отчет <span style="color: #ddd0b2;">по всем</span> найденным штрафам:<br/>
          - выводит все найденные неоплаченые штрафы по всем вашим транспортным средствам, позволяет отправить данные на печать или сохранить в формате Excell.
          <br/><br/>
          Отчет <span style="color: #ddd0b2;">по отдельным</span> автомобилям:<br/>
          - позволяет выбрать только необходимые транспортные средства для построения отчета и выгрузки данных по штрафам или напечатать их.

        </div>
    </div>
  </div>
  <div class="cach_report_step_2">
    <div class="l">

    </div>
    <div class="r">

    </div>
  </div>
  <div class="cach_report_step_3">

  </div>
  <div class="">
    <div style="overflow:hidden; display: none;">
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    <div id="datetimepicker12"></div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
