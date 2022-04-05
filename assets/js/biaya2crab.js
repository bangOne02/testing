$(document).ready(function(){
	$('.select2').select2({width:'100%',placeholder: '-- select one --'});


	var currDate = new Date();
	$('.date').datepicker({
		locale: {
    	dateFormat: 'YYYY-MM-DD'
  	    },
  	    // startDate : currDate,
	});

	$('.call-add-suratjalan').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-suratjalan').hide('slow');
	});

	$('.call-minimize-suratjalan').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-suratjalan').show('slow');
	});

	 $('#sasis').prop('disabled', false);
	 $('#tugas').prop('disabled', true);

	listtablebiaya2(); 
	getSuratJalan();

	$('#myTable').DataTable({
			    "bLengthChange": false,
	      	    "pagingType": "simple",
	      	    "bInfo" : false,
	      	    "searching": false,
				"language" : {
	        		// "searchPlaceholder": false,
	        		"zeroRecords": " ", 
	    		},
	      	    "order": [[ 1, "desc" ]],
                "initComplete": function (settings, json) {  
				    $("#myTable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
				}, 
				
				"rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
				},
	});

	$('.call-refresh').click(function(){
		listtablebiaya();
	});

	$('#plant').change(function(){
		listtablebiaya();
	});

	$('#list_table_biaya2').on('click','.call-data-update', function(){
		var $id = $(this).data('id');
			$.ajax({
				url : base_url+'SuratJalan/formUpdateBiaya',
				type: 'post',
				dataType: 'json',
				data: {id:$id},
				success:function(data){
					$('#target-update').html(data['html']);
					$('.select2').select2({width:'100%',placeholder: '-- select one --'});
				}
			});
	});



	$('input[type="radio"]').on('change', function(e) {
	    console.log($(this).val());
	    if ($(this).val() == 0)
	    {
	    	$('#isimuatan').prop('disabled', true);
	    	$('#nomorcontainer').prop('disabled', true);
			$('#gembok').prop('disabled', true);
	    	$('#segelpelayaran').prop('disabled', true);
	    	$('#segelbeacukai').prop('disabled', true);
			
	    	$('#isimuatan').val("");
	    	$('#nomorcontainer').val("");
	    	$('#sasis').prop('disabled', true);
	    	$('#tugas').prop('disabled', false);
	    	$('#isopir').prop('disabled', true);
	    	$('#isopir').val("");
	    	getKendaraan(0);
	    	getSopir(0);
	    } else
	    {
	    	$('#isimuatan').prop('disabled', false);
	    	$('#nomorcontainer').prop('disabled', false);
			$('#gembok').prop('disabled', false);
	    	$('#segelpelayaran').prop('disabled', false);
	    	$('#segelbeacukai').prop('disabled', false);
			
	    	$('#isimuatan').val("");
	    	$('#nomorcontainer').val("");
	    	$('#isopir').prop('disabled', true);
	    	$('#isopir').val("");
	    	$('#tugas').val("");
	    	$('#sasis').prop('disabled', false);
	    	$('#tugas').prop('disabled', true);
	    	getKendaraan(1);
	    	getSopir(1);
	    }
	});

	$('#tujuan').change(function(){
		if($(this).val() == 9999){
			$('#itujuan').prop('disabled', false);
		}else{
			$('#itujuan').prop('disabled', true);
		}
	});

	$('#sopir').change(function(){
		if($(this).val() == 9999 || $(this).val() == 9998){
			$('#isopir').prop('disabled', false);
		}else{
			$('#isopir').prop('disabled', true);
		}
	});

	$('#form_biaya_detail').submit(function(e){
		var itemdiv = [];
		var formData = new FormData(this);
		var $id = $('#id').val();
		var $nosj = $('#myInput').val();
		formData.append('id', $id);
		e.preventDefault();
		$.ajax({
		url : base_url+'SuratJalan/cekSJ',
		type: 'post',
		dataType: 'json',
		data: {id:$nosj},
		success:function(data){
				if(data['status'] == 1){
					$.ajax({
						url: base_url+"SuratJalan/insertBiayaDetail",
						type: 'post',
						dataType: 'json',
						data : formData,
						cache : false,
						contentType : false,
						processData : false,
						success:function(data){
							if(data['status'] == 1){
								$('#nominal').val('');
								$('#fdriver').val('');
								$('#ldriver').val('');
								$('#fkernet').val('');
								$('#lkernet').val('');
								$('#finap').val('');
								$('#kelasjalan').val('');
								$('#kuli').val('');
								$('#parkir').val('');
								$('#biayatol').val('');
								$('#genset').val('');
								$('#tunai').val('');
								$('#nontunai').val('');
								$('#nomemo').val('');
								$('#biayalain').val('');
								$('#keterangan').val('');
								listtablebiaya2();
								toastr.success("Insert berhasil");
							}else{
								toastr.error('Ups..! Insert gagal !');
							}
						}
					});					
				}else{
					alert("YOU HAVE TO WRITE ANOTHER NUMBER, BECAUSE THE NUMBER ALREADY EXISTS");
				}
			}
	 	});
	});

	$('#target-update').on('submit','#form_update_biaya_detail', function(e){
		e.preventDefault();

		$.ajax({
			url: base_url+"SuratJalan/prosesUpdateDetail",
			type: 'post',
			dataType: 'json',
			data : new FormData(this),
			cache : false,
			contentType : false,
			processData : false,
			success:function(data){
				if(data['status'] == 1){
					
				 //	$('#modal-update').modal('hide');
				 	toastr.success('Update berhasil');
				 	listtablebiaya2();
				}else{
				 	toastr.error('Ups..! Update gagal !');
				}
			}
		});
	});

});

function list(){
	$('#list_table').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'SuratJalan/myList',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table').hide().html(data['html']);
			$('#list_table').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		  }); 
 
	      $('#table_1').DataTable({
			    "bLengthChange": false,
	      	    "pagingType": "simple",
	      	    "bInfo" : false,
				"language" : {
	        		searchPlaceholder: ""
	    		},
	      	    "order": [[ 1, "desc" ]],
                "initComplete": function (settings, json) {  
				    $("#table_1").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
				}, 
				"columnDefs": [
		            {
		                "targets": [ 1 ],
		                "visible": false
		            }
		        ],
				"rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
				},
		  });
		  
		  $('#list_table').show();

		}
	});
}

function listtablebiaya2(){
	$('#list_table_biaya2').loading();
	var $id = $('#id').val();
	$.ajax({
		url : base_url+'SuratJalan/myListBiayaDetail',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table_biaya2').hide().html(data['html']);
			$('#list_table_biaya2').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_detail_biaya(id);
			  }
		  }); 
 
	      $('#table_1_biaya2').DataTable({
	      	    "pagingType": "simple",
	      	
		        "columnDefs" : [
		            { 'type': 'num', 'targets': 0},
					{ "targets": [ 1 ],"visible": false}
		        ],
				"language" : {
	        		searchPlaceholder: ""
	    		},
	      	    "order": [[ 1, "asc" ]],
                "initComplete": function (settings, json) {  
				    $("#table_1_biaya2").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
				}, 
				"rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
				},
		  });
		  
		  $('#list_table_biaya2').show();

		}
	});
}

function listtablebiaya(){
	$('#list_table_biaya').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'SuratJalan/myListBiaya',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table_biaya').hide().html(data['html']);
			$('#list_table_biaya').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		  }); 
 
	      $('#table_1_biaya').DataTable({
	      	    "pagingType": "simple",
	      	    "dom": 'Bfrtip',
		        "buttons": [
		            {
		                extend: 'excelHtml5',
		                exportOptions: {
		                    columns: [ 1, 2, 3, 4, 5 ],
		                    modifier: {
		                        page: 'all'
		                    }
		                },
		                text: 'EXPORT TO EXCEL',
		                title: 'Laporan Biaya Kendaraan'
		                
		            }
		        ],
		        "columnDefs" : [
		            { 'type': 'num', 'targets': 0}
		        ],
				"language" : {
	        		searchPlaceholder: ""
	    		},
	      	    "order": [[ 1, "desc" ]],
                "initComplete": function (settings, json) {  
				    $("#table_1_biaya").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
				}, 
				"rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
				},
		  });
		  
		  $('#list_table_biaya').show();

		}
	});
}

function remove_data(id){
	$.ajax({
		url : base_url+"SuratJalan/deleteData",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				list();
				toastr.success('Delete berhasil');
			}else{
				toastr.error('Ups..! Delete gagal !');
			}
		}
	});
}

function remove_detail_biaya(id){
	$.ajax({
		url : base_url+"SuratJalan/deleteDetailBiaya",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				listtablebiaya2();
				toastr.success('Delete berhasil');
			}else{
				toastr.error('Ups..! Delete gagal !');
			}
		}
	});
}

function listhistory(){
	$('#list_table_his').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'Planning/myListHistory',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){ 
			$('#list_table_his').hide().html(data['html']);
			$('#list_table_his').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data(id);
			  }
		  }); 
 
	      $('#table_his').DataTable({
		      "order": [[ 4, "desc" ]],
			  "rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
				},
		  });
		  $('#list_table_his').show();
		}
	});
}

function getSasis(){
	var $plant = $('#mplant').val();
	$.ajax({
		url : base_url+'SuratJalan/getSasis',
		type: 'post',
		dataType: 'json',
		data: {plant:$plant},
		success:function(data){
			$('#sasis').html(data);
		}
	});
}

function getTujuan(){
	$.ajax({
		url : base_url+'SuratJalan/getTujuan',
		type: 'post',
		dataType: 'json',
		data: {plant:0},
		success:function(data){
			$('#tujuan').html(data);
		}
	});
}

function getSopir(jns){
	//var $jns = $('input[type="radio"]').val();
	$.ajax({
		url : base_url+'SuratJalan/getSopir',
		type: 'post',
		dataType: 'json',
		data: {jns:jns},
		success:function(data){
			$('#sopir').html(data);
		}
	});
}

function getKendaraan(ukuran){
	//var $plant = $('#mplant').val();
	$.ajax({
		url : base_url+'SuratJalan/getKendaraan',
		type: 'post',
		dataType: 'json',
		data: {ukuran:ukuran},
		success:function(data){
			$('#kendaraan').html(data);
		}
	});
}

function getSuratJalan(jns){
	//var $jns = $('input[type="radio"]').val();
	$.ajax({
		url : base_url+'SuratJalan/getSuratJalan',
		type: 'post',
		dataType: 'json',
		data: {jns:jns},
		success:function(data){
			$('#myInput').html(data);
		}
	});
}


function myFunction() {
  var $id = document.getElementById("tanggal").value;
  getSuratJalan($id);
  
}


 