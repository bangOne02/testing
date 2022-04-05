<div class="col-md-9">
    <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Inspection Activity Statistik</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button> 
      </div>
    </div>
    <div class="box-body">
        <div class="form-group">
        <label>Date:</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right datepicker" id="date-statistik" value="<?php echo date('d/m/Y') ?>" onchange="statistikPengunjung()">
        </div>
      </div>
      <div class="col-md-12">
        <div id="chart-statistik" style="margin: 0 auto"></div>
      </div>
    </div>
  </div>
</div>