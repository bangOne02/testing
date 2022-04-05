$(document).ready(function(){
	
	var stats = 0;
	var intervalId = null;
	$('.daterange').daterangepicker({
		locale: {
    	format: 'YYYY-MM-DD'
    }
	});	
	$('.date2').datepicker({
		locale: {
    	dateFormat: 'YYYY-MM-DD'
    }
	});

	$('#nomorsuratjalan').html('NOT FOUND');
	$('#tujuan').html('NOT FOUND');
	$('#keterangan').html('NOT FOUND');
	$('#list_table').hide();
    $('#list_table2').hide();
    $('#list_table_rev').hide();
	
	$('#add').submit(function(e){
		$('#mulai').click();
		return false;		
	});	

	$('#nosj').keydown(function (e) {  
		//return false;
		stats = 1;
	});
	
	$(document).scannerDetection({
		  timeBeforeScanTest: 200, // wait for the next character for upto 200ms
		  avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
		  onComplete: function (barcode, qty) {
		   // $('#pTest').text(barcode);
		    if (stats == 1)
		    {
		    	$('#mulai').click();
		    	stats = 0;	
		    }
		  } // main callback function 
	});

	$('#mulai').click(function(){
		
		var $nosj = $('#nosj').val();
		var $proces = $('#proces').val();
		$.ajax({
		url : base_url+'Proses/getSuratJalan',
		type: 'post',
		dataType: 'json',
		data: {nosj:$nosj},
		success:function(data){
			//  console.log(data[0]["suratjalan"]);
			    if(data[0] != undefined)
			    {
			    	list(); 
					list2(); 
					var _resp = data[0];
					//console.log(_resp.nomorsj);

					$('#nomorsuratjalan').html(_resp.nomorsj.toUpperCase());
					$('#nosuratjalan').val(_resp.nomorsj);
					$('#tujuan').html(_resp.ktujuan.toUpperCase());
					$('#keterangan').html(_resp.keterangan.toUpperCase());
					$('#selesai').removeAttr('disabled');
					$('#list_table').show();
			        $('#list_table2').show();

			    } else
			    {
			    	$('#nomorsuratjalan').html('NOT FOUND');
					$('#tujuan').html('NOT FOUND');
					$('#keterangan').html('NOT FOUND');
			    	$('#list_table').hide();
		            $('#list_table2').hide();
			    }
				
	 
			}
			,
            error: function(result) {
               $('#list_table').hide();
		       $('#list_table2').hide();
            }
		});
	});

	$('#mulai2').click(function(){
		var $nosj = $('#nosj').val();
		var $proces = $('#proces').val();
		$.ajax({
		url : base_url+'Proses/getSuratJalan',
		type: 'post',
		dataType: 'json',
		data: {nosj:$nosj},
		success:function(data){
			    if(data[0] != undefined)
			    {
					list_rev(); 
					var _resp = data[0];
					$('#nomorsuratjalan').html(_resp.nomorsj.toUpperCase());
					$('#nosuratjalan').val(_resp.id);
					$('#list_table_rev').show();
			    } else
			    {
			    	$('#nomorsuratjalan').html('NOT FOUND');
			    	$('#list_table_rev').hide();
			    }
			}
			,
            error: function(result) {
               $('#list_table_rev').hide();
            }
		});

	});
	
	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
	
	
//	getPeserta();

	$('.call-add').click(function(){
		$('#panel_1').slideDown();
		$('.call-add').hide('slow');
	});

	$('.call-minimize').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add').show('slow');
	});

	$('.call-refresh').click(function(){
		list();
	});

	$('#jenis_soal').change(function(){
		if($(this).val() == 1){
			$('#opsi_a').val('BENAR');
			$('#opsi_b').val('SALAH');
			$('#opsi_c').val('');
			$('#opsi_d').val('');
			$('#opsi_c').attr('disabled','true');
			$('#opsi_d').attr('disabled','true');
		}else{
			$('#opsi_a').val('');
			$('#opsi_b').val('');
			$('#opsi_c').removeAttr('disabled');
			$('#opsi_d').removeAttr('disabled');
		}
	});

	$('#form_add_1').submit(function(e){
		// $('#list_table').hide();
		e.preventDefault();

		$.ajax({
			url: base_url+"Proses/insertData",
			type: 'post',
			dataType: 'json',
			data : new FormData(this),
			cache : false,
			contentType : false,
			processData : false,
			success:function(data){
				if(data['status'] == 1){
				  //	list();
				    $('#selesai').attr('disabled','true');
					$('#list_table').hide();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal ! Surat Jalan Sudah Di Closed. ');
				}
			}
		});
	});

	$('#form_add_2').submit(function(e){
		// $('#list_table').hide();
		e.preventDefault();

		$.ajax({
			url: base_url+"Proses/insertDataRevisi",
			type: 'post',
			dataType: 'json',
			data : new FormData(this),
			cache : false,
			contentType : false,
			processData : false,
			success:function(data){
				if(data['status'] == 1){
					list();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal ! Surat Jalan Sudah Di Closed. ');
				}
			}
		});
	});

	var $a = $('#nosj').val();
	if ($a != '')
	{
	  	$('#mulai').click();
	  //	$('#nosj').val() = '';
	}

});

function list(){
//	$('#list_table').loading();
	var $id = $('#nosj').val();
	var $proces = $('#proces').val();
	$.ajax({
		url : base_url+'Proses/myList',
		type: 'post',
		dataType: 'json',
		data: {no_sj:$id,proces:$proces},
		success:function(data){

		    $('#list_table').hide().html(data['html']);
		//	$('#list_table').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		  }); 
 
	      $('#table_1').DataTable({
				"bInfo": false,
				"scroll": false,
				"ordering": false, 
				autowidth: true,
				"bPaginate": false,
			    "searching": false,
			    "pageLength": 10000
		  });

	      $('#list_table').show();
		}
	});
}

function list_rev(){
//	$('#list_table').loading();
	var $id = $('#nosj').val();
	var $proces = $('#proces').val();
	$.ajax({
		url : base_url+'Proses/myListRev',
		type: 'post',
		dataType: 'json',
		data: {no_sj:$id,proces:$proces},
		success:function(data){

		    $('#list_table_rev').hide().html(data['html']);
		//	$('#list_table').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		  }); 
 
	      $('#table_rev').DataTable({
				"bInfo": false,
				"scroll": false, 
				"ordering": false,
				autowidth: true,
				"bPaginate": false,
			    "searching": false,
			    "pageLength": 10000
		  });

	      $('#list_table_rev').show();
		}
	});
}

function list2(){
//	$('#list_table2').loading();
	var $id = $('#nosj').val();
	$.ajax({
		url : base_url+'Proses/myList2',
		type: 'post',
		dataType: 'json',
		data: {no_sj:$id},
		success:function(data){

		    $('#list_table2').hide().html(data['html']);
			$('#list_table2').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() { 
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		  }); 
 
	      $('#table_2').DataTable({
				"bInfo": false,
				"scroll": false, 
				autowidth: true,
				"bPaginate": false,
			    "searching": false,
			    "pageLength": 10000
		  });

	      $('#list_table2').show();
		}
	});
}
 