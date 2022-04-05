$(document).ready(function(){
	$('.select2').select2({width:'100%',placeholder: '-- select one --'});
	$('.daterange').daterangepicker({
		locale: {
    	format: 'YYYY-MM-DD'
    }
	});
	$('.date').datepicker({
		locale: {
    	dateFormat: 'YYYY-MM-DD'
    }
	});

	$('#form-search').submit(function(e){
		e.preventDefault();

		$('#list_table').loading();
		$.ajax({
			url : base_url+'Laporan/getHasil/true',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){  
				$('#list_table').html('').hide().html(data['html']);
				$('#list_table').loading('stop');
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
				    $('#table_1').DataTable({ 
					     "scrollY": "400px",
					     "scrollX": "100%",
	                     "pageLength": 10000,
	                     "fnInitComplete": function(oSettings) {
	                        $( window ).resize();
	                     },
						 "fnDrawCallback": function(oSettings) {
						      $( window ).trigger('resize');
						 }
					});
				}, 100);
				
				$('#list_table').show();
			}
		});	
	});

});
