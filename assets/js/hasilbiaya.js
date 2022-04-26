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

	var form_config = {button: null};

	$("#submit1").click(function(){
	form_config.button = 'submit1';  
	});

	$("#submit2").click(function(){
	form_config.button = 'submit2';  
	});

	$('#form-search').submit(function(e){
		e.preventDefault();
		var submiturl;
		if (form_config.button === 'submit1') { 
			e.preventDefault();
			$('#list_table').loading();
			$.ajax({
				url : base_url+'Laporan/getHasilBiaya/true',
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
							"bLengthChange": false,
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
		}
		
		if (form_config.button  === 'submit2') { 
			$('#list_table').loading();
			$.ajax({
				url : base_url+'Laporan/getHasilBiaya/2',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				success:function(data){  
					var $a = $("<a>");
					$a.attr("href",data.file);
					$("body").append($a);
					$a.attr("download",data.namafile+".xls");
					$a[0].click();
					$a.remove();
					$('#list_table').loading('stop');
				}
			});		
		}			
	});

	$('#form-search-2').submit(function(e){
		e.preventDefault();

		$('#list_table_2').loading();
		$.ajax({
			url : base_url+'Laporan/getHasilBiayaTotal/true',
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(data){  
				$('#list_table_2').html('').hide().html(data['html']);
				$('#list_table_2').loading('stop');
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
				    $('#table_1_total').DataTable({
						 "bLengthChange": false,						
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
				
				$('#list_table_2').show();
			}
		});	
	});

});
