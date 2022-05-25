

$(document).ready(function(){
	$('.select2').select2({width:'100%',placeholder: '-- select one --'});

	var currDate = new Date();
	$('.date').datepicker({
		locale: {
    	dateFormat: 'YYYY-MM-DD'
  	    },
	});

	// var $table2 = $('#table_1_biaya').DataTable();
	// 		    $table2.fnStandingRedraw();	



	$('.call-add-suratjalan').click(function(){
		$('#panel_1').slideDown();
		$('.call-add-suratjalan').hide('slow');
	});
	
	$('.call-refresh').click(function(){
		listtablebiaya();
	});

	$('.call-minimize-suratjalan').click(function(){
		$('#panel_1').slideUp('slow');
		$('.call-add-suratjalan').show('slow');
	});

	 $('#sasis').prop('disabled', false);
	 $('#tugas').prop('disabled', true);

	listtablebiaya(); 

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


	$('#list_table').on('click','.call-data-update', function(){
			var $id = $(this).data('id');
			$.ajax({
				url : base_url+'Planning/formUpdate',
				type: 'post',
				dataType: 'json',
				data: {id:$id},
				success:function(data){
					$('#target-update').html(data['html']);
					$('.select2').select2({width:'100%',placeholder: '-- select one --'});
				}
			});
	});

	$('#list_table_biaya').on('click','.call-data-preview',function(){
	//	$("#target-preview").removeClass();
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'SuratJalan/formBiayaPreview',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
				
			 	$('#target-preview').html(data['html']);
			 //	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
	});

	$("#btn-tgl").click(function(){
        listtablebiaya($('#tanggall').val());
    }); 

	$('#list_table_biaya').on('click','.btn-tgl',function(){
	//	$("#target-preview").removeClass();
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'SuratJalan/formBiayaPreview',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
				
			 	$('#target-preview').html(data['html']);
			 //	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
	});

	$('#list_table_biaya').on('click','.data-approved',function(){
	//	$("#target-preview").removeClass();
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'SuratJalan/updateStatusBiaya',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
				listtablebiaya();
			 //	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
	});
	
	$('#list_table_biaya').on('click','.data-checker-approve',function(){
	//	$("#target-preview").removeClass();
		var $status = 1;
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'SuratJalan/updateStatusChecker',
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

	$('#list_table_biaya').on('click','.data-checker-reject',function(){
	//	$("#target-preview").removeClass();
	    var $keterangan = prompt("Input Keterangan?");
	    if ($keterangan === null) {
	        return; //break out of the function early
	    }
	    var $status = 2;
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'SuratJalan/updateStatusChecker',
			type: 'post',
			dataType: 'json',
			data: {id:$id,status:$status,keterangan:$keterangan},
			success:function(data){
				if(data['status'] == 1){
					var _modal2 = $('#table_1_biaya');
		            var trid = $id;
		            _modal2.find('tr#'+trid+' td.statusapproved').html('<div class="btn-group-horizontal"><center><a style="background-color: #0dc345; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">STAT CHECK REJECT</a></center></div>');
				   
					toastr.success("Berhasil Di Simpan");
				}else{
					toastr.error('Ups..! gagal di simpan !');
				}
			}
		});
	});

	$('#list_table_biaya').on('click','.data-checker2-approve',function(){
		var $status = 1;
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'SuratJalan/updateStatusChecker2',
			type: 'post',
			dataType: 'json',
			data: {id:$id,status:$status},
			success:function(data){
				if(data['status'] == 1){
				//	listtablebiaya();
				    var _modal2 = $('#table_1_biaya');
		            var trid = $id;
		            _modal2.find('tr#'+trid+' td.statusapproved2').html('<div class="btn-group-horizontal"><center><a style="background-color: #d93015; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">SUDAH DI APPROVE</a></center></div>');

					toastr.success("Berhasil Di Simpan");
				}else{
					toastr.error('Ups..! gagal di simpan !');
				}
			}
		});
	});

	$('#list_table_biaya').on('click','.data-checker2-reject',function(){
		var $keterangan = prompt("Input Keterangan?");
		if ($keterangan === null) {
	        return; //break out of the function early
	    }
	    var $status = 2;
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'SuratJalan/updateStatusChecker2',
			type: 'post',
			dataType: 'json',
			data: {id:$id,status:$status,keterangan:$keterangan},
			success:function(data){
				if(data['status'] == 1){
					var _modal2 = $('#table_1_biaya');
		            var trid = $id;
		            _modal2.find('tr#'+trid+' td.statusapproved2').html('<div class="btn-group-horizontal"><center><a style="background-color: #0dc345; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">STAT CHECK REJECT</a></center></div>');
				   
					toastr.success("Berhasil Di Simpan");
				}else{
					toastr.error('Ups..! gagal di simpan !');
				}
			}
		});
	});

	$('#list_table_biaya').on('click','.data-checker-resolve',function(){
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'SuratJalan/updateStatusResolve',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
				if(data['status'] == 1){
					listtablebiaya();
					toastr.success("Berhasil Di Simpan");
				}else{
					toastr.error('Ups..! gagal di simpan !');
				}
			}
		});
	});

	$('#list_table_biaya').on('click','.data-download',function(){
	//	$("#target-preview").removeClass();
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Laporan/reportFileUpload',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
				listtablebiaya();
			 //	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
      //	listtablebiaya();
	});

	

	$('#list_table_biaya').on('click','#download_biaya',function(){
  		var $table = $('#table_1_biaya').DataTable();
        var $data = $table.$('input[type="checkbox"]').serializeArray();

		$.ajax({
			url: base_url+"Laporan/reportFileUpload2",
			type: 'post',
			dataType: 'json',
			data : {data:$data},
			success:function(data){
				var $a = $("<a>");
			    $a.attr("href",data.file);
			    $("body").append($a);
			    $a.attr("download",data.namafile+".xls");
			    $a[0].click();
			    $a.remove();
			    listtablebiaya();

			    //var $table2 = $('#table_1_biaya').DataTable();
			    //$table2.fnStandingRedraw();	
				//$('#table_1_biaya').DataTable().ajax.reload( null, false );

			}
		});
	});

	$('#list_table_his').on('click','.call-data-preview',function(){
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Planning/formPreview',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
				
			 	$('#target-preview').html(data['html']);
			 	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
	});

	$('#form_add_1').submit(function(e){
		e.preventDefault();
		$.ajax({
			url: base_url+"SuratJalan/insertData",
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
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
	});

	$('#form_biaya').submit(function(e){
		var formData = new FormData(this);
		e.preventDefault();
		$.ajax({
			url: base_url+"SuratJalan/insertBiaya",
			type: 'post',
			dataType: 'json',
			data : formData,
			cache : false,
			contentType : false,
			processData : false,
			success:function(data){
				if(data['status'] == 1){
					$('#nkasbon').val('');
					$('#tanggal').val('');
					$('#nomi').val('');
				//	$('#myUL > li').remove();
					listtablebiaya();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
	});

	$('#form-download').submit(function(e){
		e.preventDefault();

		$('#list_table_download').loading();
		$.ajax({
			url : base_url+'Laporan/getDownload/true',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){  
				$('#list_table_download').html('').hide().html(data['html']);
				$('#list_table_download').loading('stop');
				$('[data-toggle=delete-pop]').confirmation({
			    rootSelector: '[data-toggle=delete-pop]',
			    container: 'body',
			    onConfirm: function() {
			    	var id = $(this).data('id');
			    	$(this).remove();
				    remove_data(id);
				  }
			    }); 
				
				setTimeout(function(){ 
				    $('#table_download').DataTable({ 
					     "scrollY": "400px",
					     "scrollX": "100%",
					     "dom": 'Bfrtip',
				         "buttons": [
				            {
				                extend: 'excelHtml5',
				                exportOptions: {
				                    columns: [ 2, 3, 4, 5, 6, 7, 8, 9 ],
				                    modifier: {
				                        page: 'all'
				                    }
				                },
				                text: 'EXPORT TO EXCEL',
				                title: 'Laporan Biaya Kendaraan'
				                
				            }
				         ],
	                     "pageLength": 10000,
	                     "fnInitComplete": function(oSettings) {
	                        $( window ).resize();
	                     },
						 "fnDrawCallback": function(oSettings) {
						      $( window ).trigger('resize');
						 }
					});
				}, 100);
				
				$('#list_table_download').show();
			}
		});	
	});

	$('#target-update').on('submit','#form-update', function(e){
		e.preventDefault();

		$.ajax({
			url: base_url+"Planning/prosesUpdate",
			type: 'post',
			dataType: 'json',
			data : new FormData(this),
			cache : false,
			contentType : false,
			processData : false,
			success:function(data){
				if(data['status'] == 1){
					list();
				 	$('#modal-update').modal('hide');
				 	toastr.success('Update berhasil');
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

function listtablebiaya($tanggal=0){
	$('#list_table_biaya').loading();
	// var $tanggal = $('#tanggal').val();
	$.ajax({
		url : base_url+'SuratJalan/myListBiayaBesar',
		type: 'post',
		dataType: 'json',
		data: {tanggal:$tanggal},
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
					"pageLength": 15,
					"bLengthChange": false,
					"columnDefs" : [
						{ 'type': 'num', 'targets': 0},
						{
							"targets": [ 15 ],
							"visible": false
						}
					],
					"language" : {
						searchPlaceholder: ""
					},
					"order": [[ 15, "desc" ]],
					"initComplete": function (settings, json) {  
						$("#table_1_biaya").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
					}, 
					"rowCallback": function (nRow, aData, iDisplayIndex) {
						var oSettings = this.fnSettings ();
						$("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
						return nRow;
					},
		  }).filtersOn();
		  

		  $('#list_table_biaya').show();

		}
	});
}

function listtablebiaya2(){
	$('#list_table_biaya2').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'SuratJalan/myListBiaya',
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
			    remove_data(id);
			  }
		  }); 
 
	      $('#table_1_biaya2').DataTable({
	      	    "pagingType": "simple",
	      	    "dom": 'Bfrtip',
				"length": 15,
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
		  
		  $('#list_table_biaya2').show();

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

function newElement() {
  //var li = document.createElement("li");
  var table = document.getElementById("myTable2");
  var row = table.insertRow(1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = document.getElementById("myInput").value;
  cell2.innerHTML = document.getElementById("nombiaya").value;
  cell3.innerHTML = document.getElementById("detail").value;

}


 