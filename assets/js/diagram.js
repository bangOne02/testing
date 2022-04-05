	
$.fn.DataTable.ext.pager.numbers_length = 5;

$(document).ready(function(){
	$('.datepicker').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',todayHighlight: true,
  });



	$('.date').datepicker({
		locale: {
	    	dateFormat: 'YYYY-MM-DD'
	    }
	});

	$('.call-add-tujuan').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-tujuan').hide('slow');
	});

	$('.call-minimize-tujuan').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-tujuan').show('slow');
	});

	$('.call-add-container').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-chasis').hide('slow');
	});

	$('.call-minimize-container').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-chasis').show('slow');
	});

	$('.call-add-plant').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-plant').hide('slow');
	});

	$('.call-minimize-plant').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-plant').show('slow');
	});

	$('.call-add-chasis').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-chasis').hide('slow');
	});

	$('.call-minimize-chasis').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-chasis').show('slow');
	});

	$('.call-add-depo').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-plant').hide('slow');
	});

	$('.call-minimize-depo').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-plant').show('slow');
	});

	$('.call-add-pelabuhan').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-pelabuhan').hide('slow');
	});

	$('.call-minimize-pelabuhan').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-pelabuhan').show('slow');
	});

	$('.call-add-sopir').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-sopir').hide('slow');
	});

	$('.call-minimize-sopir').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-sopir').show('slow');
	});
	
  listPlant();	
  listDepo();
  listPelabuhan();	
  listChasis();	
  listContainer();
  listSopir();	
  listTujuan();	

  $('#form_add_tujuan').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Kendaraan/insertData',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					list();
					$('#form_add_1')[0].reset();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
   });

   $('#form_add_sopir').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Diagram/insertSopir',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					listSopir();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
   });

   $('#form_add_depo').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Diagram/insertDepo',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					listDepo();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
   });

   $('#form_add_pelabuhan').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Diagram/insertPelabuhan',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					listPelabuhan();
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
			url : base_url+'Diagram/insertContainer',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					listContainer();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
   });

   $('#form_add_plant').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Diagram/insertPlant',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					listPlant();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
   });

   $('#form_add_chasis').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Diagram/insertChasis',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					listChasis();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
   });

   $('#list_table_chasis').on('click','.call-data-update',function(){
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

   $('#list_table_container').on('click','.call-data-update',function(){
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Diagram/formUpdateContainer',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
			 	$('#target-update-container').html(data['html']);
			 	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
   });

   $('#target-update').on('submit','#form-update',function(e){
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

   $('#target-update-container').on('submit','#form-update',function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Diagram/prosesUpdateContainer',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if(data['status'] == 1){
					listContainer();
				 	$('#modal-update').modal('hide');
				 	toastr.success('Update berhasil');
				}else{
				 	toastr.error('Ups..! Update gagal !');
				}
			}
		});
	});


});


function listDepartemen(){
	$('#list_table_departemen').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'Diagram/myListDepartemen',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table_departemen').hide().html(data['html']);
			$('#list_table_departemen').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		  }); 
 
	    $('#table_1').DataTable();
			$('#list_table_departemen').show();

		}
	});
}

function listChasis(){
	$('#list_table_chasis').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'Diagram/myListChasis',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table_chasis').hide().html(data['html']);
			$('#list_table_chasis').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_chasis(id);
			  }
		  }); 
 
	    $('#table_1_chasis').DataTable({
			  "bInfo" : false,
		      "pageLength": 15,
			  "bLengthChange": false,
			  "order": [[ 12, "desc" ]],
              "initComplete": function (settings, json) {  
				    	$("#table_1_chasis").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
			  },
			  "columnDefs": [
		            {
		                "targets": [ 12 ],
		                "visible": false
		            }
		      ],
			  "rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
			  },
		    		
		}).filtersOn();
			$('#list_table_chasis').show();
		}
	});
}

function remove_data_chasis(id){
	$.ajax({
		url : base_url+"Diagram/deleteDataChasis",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				listChasis();
				toastr.success('Delete berhasil');
			}else{
				toastr.error('Ups..! Delete gagal !');
			}
		}
	});
}

function listTujuan(){
	$('#list_table_tujuan').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'Diagram/myListTujuan',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table_tujuan').hide().html(data['html']);
			$('#list_table_tujuan').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		  }); 
 
	    $('#table_1_tujuan').DataTable({
		    		"initComplete": function (settings, json) {  
				    	$("#table_1_container").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
					}, 
		    }).filtersOn();
			$('#list_table_tujuan').show();

		}
	});
}

function listPlant(){
	$('#list_table_plant').loading();
	$.ajax({
		url : base_url+'Diagram/myListPlant',
		type: 'post',
		dataType: 'json',
		data: {id:0},
		success:function(data){ 
			$('#list_table_plant').hide().html(data['html']);
			$('#list_table_plant').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_plant(id);
			  }
		  }); 
 
	    $('#table_1_plant').DataTable({
		     // "order": [[ 4, "desc" ]],
			 "bInfo" : false,
		      "pageLength": 15,
			  "bLengthChange": false,
			  "initComplete": function (settings, json) {  
				    	$("#table_1_plant").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
					}, 
		}).filtersOn();
			$('#list_table_plant').show();

		}
	});
}

function remove_data_plant(id){
	$.ajax({
		url : base_url+"Diagram/deleteDataPlant",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				listPlant();
				toastr.success('Delete berhasil');
			}else{
				toastr.error('Ups..! Delete gagal !');
			}
		}
	});
}

function listDepo(){
	$('#list_table_depo').loading();
	$.ajax({
		url : base_url+'Diagram/myListDepo',
		type: 'post',
		dataType: 'json',
		data: {id:0},
		success:function(data){ 
			$('#list_table_depo').hide().html(data['html']);
			$('#list_table_depo').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_depo(id);
			  }
		  }); 
 
	    $('#table_1_depo').DataTable({
			  "bInfo" : false,
		      "pageLength": 15,
			  "bLengthChange": false,
		    		"initComplete": function (settings, json) {  
				    	$("#table_1_depo").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
					}, 
		    }).filtersOn();
			$('#list_table_depo').show();

		}
	});
}

function remove_data_depo(id){
	$.ajax({
		url : base_url+"Diagram/deleteDataDepo",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				listDepo();
				toastr.success('Delete berhasil');
			}else{
				toastr.error('Ups..! Delete gagal !');
			}
		}
	});
}

function listPelabuhan(){
	$('#list_table_pelabuhan').loading();
	$.ajax({
		url : base_url+'Diagram/myListPelabuhan',
		type: 'post',
		dataType: 'json',
		data: {id:0},
		success:function(data){ 
			$('#list_table_pelabuhan').hide().html(data['html']);
			$('#list_table_pelabuhan').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_pelabuhan(id);
			  }
		  }); 
 
	    $('#table_1_pelabuhan').DataTable({
			"bInfo" : false,
		      "pageLength": 15,
			  "bLengthChange": false,
		    		"initComplete": function (settings, json) {  
				    	$("#table_1_pelabuhan").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
					}, 
		    }).filtersOn();
			$('#list_table_pelabuhan').show();

		}
	});
}

function remove_data_pelabuhan(id){
	$.ajax({
		url : base_url+"Diagram/deleteDataPelabuhan",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				listPelabuhan();
				toastr.success('Delete berhasil');
			}else{
				toastr.error('Ups..! Delete gagal !');
			}
		}
	});
}

function listSopir(){
	$('#list_table_sopir').loading();
	$.ajax({
		url : base_url+'Diagram/myListSopir',
		type: 'post',
		dataType: 'json',
		data: {id:0},
		success:function(data){ 
			$('#list_table_sopir').hide().html(data['html']);
			$('#list_table_sopir').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_sopir(id);
			  }
		  }); 
 
	    $('#table_1_sopir').DataTable({
					  "pageLength": 15,
					  "bLengthChange": false,
					  "bInfo" : false,
					  "order": [[ 7, "desc" ]],
		              "initComplete": function (settings, json) {  
				    	$("#table_1_sopir").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
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
			$('#list_table_sopir').show();
		}
	});
}

function remove_data_sopir(id){
	$.ajax({
		url : base_url+"Diagram/deleteDataSopir",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				listSopir();
				toastr.success('Delete berhasil');
			}else{
				toastr.error('Ups..! Delete gagal !');
			}
		}
	});
}

function listContainer(){
	$('#list_table_container').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'Diagram/myListContainer',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table_container').hide().html(data['html']);
			$('#list_table_container').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		    }); 
 
		    $('#table_1_container').DataTable({
				"bInfo" : false,
					  "pageLength": 15,
					  "bLengthChange": false,
					  "order": [[ 8, "desc" ]],
		              "initComplete": function (settings, json) {  
				    	$("#table_1_container").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
					  },
					  "columnDefs": [
				            {
				                "targets": [ 8 ],
				                "visible": false
				            }
				      ],
					  "rowCallback": function (nRow, aData, iDisplayIndex) {
							 var oSettings = this.fnSettings ();
							 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
							 return nRow;
					  },
		    }).filtersOn();
			$('#list_table_container').show();
		}
	});
}

var fullnames = [];

function listDivisi(){
	$('#list_table_divisi').loading();
	var $id = $('#plant').val();

	$.ajax({
		url : base_url+'Diagram/myListDivisi',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table_divisi').hide().html(data['html']);
			$('#list_table_divisi').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		    }); 

		    var table = $('#table_1').DataTable({
		    		"initComplete": function (settings, json) {  
				    	$("#table_1").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
					}, 
		    }); 
		    $('#table_1 tbody').on('click', 'td.details-control', function () {
		        var tr = $(this).closest('tr');
		        var row = table.row( tr );
		 

		        if ( row.child.isShown() ) {
		            // This row is already open - close it
		            row.child.hide();
		            tr.removeClass('shown');
		        }
		        else {
		            // Open this row
		            row.child( format(row.data()) ).show();
		            tr.addClass('shown');
		        }
		    } );

		    $('#list_table_divisi').show();

		}
	});
}



