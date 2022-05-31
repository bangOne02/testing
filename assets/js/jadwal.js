$(document).ready(function(){
	$('.datepicker').datepicker({
    	autoclose: true,
    	format: 'dd/mm/yyyy',todayHighlight: true,
  	});

    $('.call-add-request').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-request').hide('slow');
    });

	$('.call-minimize-request').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-request').show('slow');
	});

	$('.date').datepicker({
			locale: {
				dateFormat: 'YYYY-MM-DD'
			}
	});

    $('.call-refresh').click(function(){
		listRequest();
	});

	
   listRequest();
   listKeberangkatan();	
   listHistCont();
   listSuhu($('#idcontainer').val());
   listMuatan($('#idcontainer').val());

   $('#form_add_request').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Kendaraan/insertDataRequest',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					listRequest();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
   });

   $('#form_add_container').submit(function(e){
		e.preventDefault();
		$.ajax({
			url: base_url+"Kendaraan/insertContainer",
			type: 'post',
			dataType: 'json',
			data : new FormData(this),
			cache : false,
			contentType : false,
			processData : false,
			success:function(data){
				if(data['status'] == 1){
					listHistCont();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Container Sudah Ada !');
				}
			}
		});
   });

   $('#form_add_suhu').submit(function(e){
	e.preventDefault();
	$.ajax({
		url : base_url+'Kendaraan/insertDataSuhu',
		type: 'post',
		dataType: 'json',
		data: $(this).serialize(),
		success:function(data){
			if (data['status'] == '1') {
				listSuhu($('#idcontainer').val());
				toastr.success("Insert berhasil");
			}else{
				toastr.error('Ups..! Insert gagal !');
			}
		}
	});
	});

   $('#list_table_request').on('click','.data-approve',function(){
	//	$("#target-preview").removeClass();
		var $status = 1;
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Kendaraan/updateApprove',
			type: 'post',
			dataType: 'json',
			data: {id:$id,status:$status},
			success:function(data){
				if(data['status'] == 1){
					var _modal2 = $('#table_1_biaya');
		            var trid = $id;
		            _modal2.find('tr#'+trid+' td.statusapproved').html('<div class="btn-group-horizontal"><center><a style="background-color: #d93015; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">SUDAH DI APPROVE</a></center></div>');
				   
					toastr.success("Berhasil Di Simpan");
				}else{
					toastr.error('Ups..! gagal di simpan !');
				}
			}
		});
	});

	$('#list_table_request').on('click','.call-data-approve',function(){
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Kendaraan/formApprove',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
			 	$('#target-approve').html(data['html']);
			 	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
   });

   $('#list_table_request').on('click','.call-data-update',function(){
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Diagram/formUpdateChasis',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
			 	$('#target-update').html(data['html']);
			 	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
   });

   $('#list_table_suhu').on('click','.call-data-update',function(){
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Diagram/formUpdateSuhu',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
				$('#target-update-suhu').html(data['html']);
				$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
	});

   $("#btn-tgl").click(function(){
		var $tanggal = $('#tanggal').val();
		var url = base_url+'Kendaraan/jadwalKeberangkatan';
		url += '?tanggal='+$tanggal;
		window.location.href = url;
   }); 

   $('#target-approve').on('submit','#form-approve',function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Kendaraan/prosesUpdateApprove',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if(data['status'] == 1){
					listRequest();
				 	$('#modal-approve').modal('hide');
				 	toastr.success('Update berhasil');
				}else{
				 	toastr.error('Ups..! Update gagal !');
				}
			}
		});
   });

   $('#target-update-request').on('submit','#form-update',function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Diagram/prosesUpdateChasis',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if(data['status'] == 1){
					listChasis();
				 	$('#modal-update').modal('hide');
				 	toastr.success('Update berhasil');
				}else{
				 	toastr.error('Ups..! Update gagal !');
				}
			}
		});
	});

	$('#target-update-suhu').on('submit','#form-update',function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Diagram/prosesUpdateSuhu',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if(data['status'] == 1){
					listSuhu($('#idcontainer').val());
				 	$('#modal-update').modal('hide');
				 	toastr.success('Update berhasil');
				}else{
				 	toastr.error('Ups..! Update gagal !');
				}
			}
		});
	});

});


function listRequest(){

	$('#list_table_request').loading();
	$.ajax({
		url : base_url+'Kendaraan/myListRequest',
		type: 'post',
		dataType: 'json',
		success:function(data){ 
			$('#list_table_request').hide().html(data['html']);
			$('#list_table_request').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_request(id);
			  }
		}); 
 
	    $('#table_1_request').DataTable({
			  "bInfo" : false,
		      "pageLength": 15,
			  "searching": false,
			  "bLengthChange": false,
			  "order": [[ 10, "desc" ]],
              "initComplete": function (settings, json) {  
		    		$("#table_1_request").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
			  }, 
			  "columnDefs": [
		            {
		                "targets": [ 10 ],
		                "visible": false
		            }
		      ],
			  "rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
			  },
		}).filtersOn();
			$('#list_table_request').show();
		}

	});
}

function listHistCont(){

	$('#list_hist_cont').loading();
	$.ajax({
		url : base_url+'Kendaraan/myListCont',
		type: 'post',
		dataType: 'json',
		success:function(data){ 
			$('#list_hist_cont').hide().html(data['html']);
			$('#list_hist_cont').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_request(id);
			  }
		}); 
 
	    $('#table_1_container').DataTable({
			"bInfo" : false,
		      "pageLength": 15,
			  "bLengthChange": false,
			  "order": [[ 5, "desc" ]],
              "initComplete": function (settings, json) {  
		    		$("#table_1_container").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
			  }, 
			  "columnDefs": [
		            {
		                "targets": [ 5 ],
		                "visible": false
		            }
		      ],
			  "rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
			  },
		}).filtersOn();
			$('#list_hist_cont').show();
		}

	});
}

function listSuhu(nocontainer){

	$('#list_table_suhu').loading();
	$.ajax({
		url : base_url+'Kendaraan/myListSuhu',
		type: 'post',
		dataType: 'json',
		data: {nocontainer:nocontainer},
		success:function(data){ 
			$('#list_table_suhu').hide().html(data['html']);
			$('#list_table_suhu').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_request(id);
			  }
		}); 
 
	    $('#table_1_suhu').DataTable({
			"bInfo" : false,
		      "pageLength": 15,
			  "bLengthChange": false,
			  "order": [[ 1, "desc" ],[2, 'desc']],
              "initComplete": function (settings, json) {  
		    		$("#table_1_suhu").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
			  }, 
			  "columnDefs": [
		            {
		                "targets": [ 7 ],
		                "visible": false
		            }
		      ],
			  "rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
			  },
		}).filtersOn();
			$('#list_table_suhu').show();
		}

	});
}

function listMuatan(nocontainer){

	$('#list_table_muatan').loading();
	$.ajax({
		url : base_url+'Kendaraan/myListMuatan',
		type: 'post',
		dataType: 'json',
		data: {nocontainer:nocontainer},
		success:function(data){ 
			$('#list_table_muatan').hide().html(data['html']);
			$('#list_table_muatan').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_request(id);
			  }
		}); 
 
	    $('#table_1_muatan').DataTable({
			"bInfo" : false,
		      "pageLength": 15,
			  "bLengthChange": false,
			//  "order": [[ 5, "desc" ]],
              "initComplete": function (settings, json) {  
		    		$("#table_1_muatan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
			  }, 
			//   "columnDefs": [
		    //         {
		    //             "targets": [ 5 ],
		    //             "visible": false
		    //         }
		    //   ],
			  "rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
			  },
		}).filtersOn();
			$('#list_table_muatan').show();
		}

	});
}

function listKeberangkatan(){

	$("#table_1_berangkat").hide();
    $('#list_table_berangkat').loading();

	$.ajax({
		url : base_url+'Kendaraan/myListRequest',
		type: 'post',
		dataType: 'json',
		success:function(data) { 
			$('#list_table_berangkat').hide().html(data['html']);
			$('#list_table_berangkat').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
			    rootSelector: '[data-toggle=delete-pop]',
			    container: 'body',
			    onConfirm: function() {
			    	var id = $(this).data('id');
				    remove_data_request(id);
				  }
			}); 
 
	   		$('#table_1_berangkat').DataTable({
	    	  "hide":true,
		      "pageLength": 15,
			  "searching": false,
			  "bLengthChange": false,
			  "paging": false,
			  "language": {
			   emptyTable: "",
			   zeroRecords: ""
			  },
			  "order": [[ 8, "desc" ]],
			  "bInfo": false,
              "initComplete": function (settings, json) {  
		    		$("#table_1_berangkat").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
			  }, 
			  "columnDefs": [
		            {
		                "targets": [ 8 ],
		                "visible": false
		            }
		      ],
		      "fnDrawCallback": function ( oSettings ) {
				    $(oSettings.nTHead).hide();
			  },
			  fnInitComplete : function() {
			      if ($(this).find('tbody tr').length<=1) {
			         $(this).parent().hide();
			      }
			  }, 
			  "rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
			  },
			});

			$('#list_table_berangkat').show();
		}

	});
}

function remove_data_request(id){
	$.ajax({
		url : base_url+"Kendaraan/deleteDataRequest",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				listRequest();
				toastr.success('Cancel berhasil');
			}else{
				toastr.error('Ups..! Cancel gagal !');
			}
		}
	});
}




