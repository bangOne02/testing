$(document).ready(function(){
	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
	
	list(); 

	$('.call-refresh').click(function(){
		list();
	});

	$('#plant').change(function(){
		list();
	});

	$('#form_add_1').submit(function(e){
		e.preventDefault();

		$.ajax({
			url: base_url+"SuratJalan/insertDetail",
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

});

function list(){
	$('#list_table').loading();
	var $id = $('#id_suratjalan').val();
	$.ajax({
		url : base_url+'SuratJalan/myListItem',
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
 
	    $('#table_1').DataTable();
			$('#list_table').show();

		}
	});
}


function remove_data(id){
	$.ajax({
		url : base_url+"SuratJalan/deleteDetailData",
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
