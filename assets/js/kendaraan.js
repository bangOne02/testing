	
$.fn.DataTable.ext.pager.numbers_length = 5;
$(document).ready(function(){
	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
	
	list(); 
	listJenis(); 

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

	$('#plant').change(function(){
		list();
	});

	$('#form_add_1').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Kendaraan/insertData',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					list();
				//	$('#form_add_1')[0].reset();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
	});

	$('#form_update_operasional').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Kendaraan/updateDataOperasional',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
				//	$('#form_add_1')[0].reset();
					toastr.success("Update berhasil");
				}else{
					toastr.error('Ups..! Update gagal !');
				}
			}
		});
	});

	$('#form_jenis').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Kendaraan/insertDataJenis',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){
				if (data['status'] == '1') {
					listJenis();
				//	$('#form_add_1')[0].reset();
					toastr.success("Insert berhasil");
				}else{
					toastr.error('Ups..! Insert gagal !');
				}
			}
		});
	});

	$('#list_table').on('click','.call-data-update',function(){
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Kendaraan/formUpdate',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
				list();
			 	$('#target-update').html(data['html']);
			 	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
	});

	$('#list_table').on('click','.call-data-preview',function(){
		var $id = $(this).data('id');
		$.ajax({
			url : base_url+'Kendaraan/formPreview',
			type: 'post',
			dataType: 'json',
			data: {id:$id},
			success:function(data){
			 	$('#target-preview').html(data['html']);
			 	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
			}
		});
	});

	$('#target-update').on('submit','#form-update',function(e){
		e.preventDefault();
		$.ajax({
			url : base_url+'Kendaraan/prosesUpdate',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
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

	$('#list_table').on('click', '.btn-detail', function(){
        var _btn = $(this), 
            _id = _btn.attr('data-id');
        var _modal = $('#detail-modal');
        _btn.prop('disabled', true);
        $.post(base_url+'Kendaraan/getDetail', {
            'id': _id,
        }, function(response){
            _btn.prop('disabled', false);
            var _resp = JSON.parse(response);
            _modal.find('div.message_placeholder').html(_resp.result);
            _modal.find('input[name=doc_id]').val(_id);
            _modal.addClass('is-active');
        });
    });

	

});

function list(){
	$('#list_table').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'Kendaraan/myList',
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
		     // "order": [[ 4, "desc" ]],
			 "bInfo" : false,
			  "pageLength": 15,
			  "bLengthChange": false,
			  "order": [[ 12, "desc" ]],
                "initComplete": function (settings, json) {  
				    $("#table_1").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
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
	    $('#list_table').show();
		}
	});
}

function listJenis(){
	$('#list_table_jenis').loading();
	var $id = $('#plant').val();
	$.ajax({
		url : base_url+'Kendaraan/myListJenis',
		type: 'post',
		dataType: 'json',
		data: {id:$id},
		success:function(data){
			$('#list_table_jenis').hide().html(data['html']);
			$('#list_table_jenis').loading('stop');
			$('[data-toggle=delete-pop]').confirmation({
		    rootSelector: '[data-toggle=delete-pop]',
		    container: 'body',
		    onConfirm: function() {
		    	var id = $(this).data('id');
			    remove_data_jenis(id);
			  }
		  }); 
 
	    $('#table_1_jenis').DataTable({
		     // "order": [[ 4, "desc" ]],
			  "bInfo" : false,
			  "pageLength": 15,
			  "bLengthChange": false,
			  "order": [[ 3, "desc" ]],
              "initComplete": function (settings, json) {  
				    $("#table_1_jenis").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
			  }, 
			  "columnDefs": [
		            {
		                "targets": [ 3 ],
		                "visible": false
		            }
		      ],
			  "rowCallback": function (nRow, aData, iDisplayIndex) {
					 var oSettings = this.fnSettings ();
					 $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
					 return nRow;
				},
		}).filtersOn();
	    $('#list_table_jenis').show();
		}
	});
}

function remove_data(id){
	$.ajax({
		url : base_url+"Kendaraan/deleteData",
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
 
function remove_data_jenis(id){
	$.ajax({
		url : base_url+"Kendaraan/deleteDataJenis",
		type: 'post',
		dataType: 'json',
		data: {id:id},
		success:function(data){
			if (data['status'] == '1') {
				listJenis();
				toastr.success('Delete berhasil');
			}else{
				toastr.error('Ups..! Delete gagal !');
			}
		}
	});
}
 