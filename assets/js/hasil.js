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

	$("#ttglawal").change(function(){
		$("#tglawal").val($(this).val());
	});

	$("#ttglakhir").change(function(){
		$("#tglakhir").val($(this).val());
	});

	$("#submit1").click(function(){
	form_config.button = 'submit1';  
	});

	$("#submit2").click(function(){
	form_config.button = 'submit2';  
	});

	$('#form-search').submit(function(e){
		
		console.log(e);
		e.preventDefault();

		var submiturl;

		if (form_config.button === 'submit1') { 
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
							"order": [[ 1, "asc" ]],
							"bLengthChange": false,
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
				xhr: function() {
					var xhr = new window.XMLHttpRequest();
			
					// Upload progress
					xhr.upload.addEventListener("progress", function(evt){
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							//Do something with upload progress
							alert(percentComplete);
							// console.log(percentComplete);
						}
				   }, false);
			
				   // Download progress
				   xhr.addEventListener("progress", function(evt){
					   if (evt.lengthComputable) {
						   var percentComplete = evt.loaded / evt.total;
						   // Do something with download progress
						   alert(percentComplete);
						//    console.log(percentComplete);
					   }
				   }, false);
			
				   return xhr;
				},
				url : base_url+'Laporan/getHasil/2',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				timeout: 10000,
				beforeSend: function(){
					$('.my-box').html('<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div>');
					$('.progress-bar').animate({width: "30%"}, 100);
				},
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

});
