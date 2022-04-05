<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap Confirmation -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-confirmation/bootstrap-confirmation.js"></script>
<!-- charts --> 
<script src="<?php echo base_url(); ?>assets/bower_components/highcharts/code/highcharts.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> 
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatable/datatables.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>assets/bower_components/toastr/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables.filters.js"></script>
<!-- loading -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-loading/dist/jquery.loading.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jqueryscannerdetection.js"></script>



<script type="text/javascript">
	toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.timeOut = 3000;
    toastr.options.preventDuplicates = false;
    toastr.options.positionClass = "toast-bottom-right";

	var base_url = "<?php echo base_url(); ?>";

	function back() {
	  window.history.back();
	}
</script>
<?php if ($js_file != false) { ?>
	<script src="<?php echo base_url('assets/js/'.$js_file.'.js?rnd='.date('YmdHis'))?>"></script>	
<?php } ?>


	
</body>
</html>