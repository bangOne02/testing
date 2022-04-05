<?php $this->load->view('component/headerHtml'); ?>
<div class="wrapper">

  <?php $this->load->view('component/header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('component/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
    <?php if($content_header != false){ ?>
      <section class="content-header">
        <h1>
          &nbsp;
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
          <?php foreach ($breadcrumb as $row) {
				$str = strtoupper($row[0]);
			  
            echo "<li><a href='$row[1]'>$str</a></li>";
          } ?>
        </ol>
      </section>
    <?php } ?>
   

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php $this->load->view($content); ?>
      </div>
      <!-- /.row -->
      </section>
    <!-- /.content -->
  </div>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view('component/footerHtml'); ?>