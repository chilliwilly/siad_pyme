$(document).ready(function(){

	$("form#uploadform").submit(function(e){
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:'./subir_data_sga/SubirArchivo', 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			data			: {
				'title'		: $('#title').val()
			},
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#files').html('<p>Cargando Archivos...</p>');
					refresh_files();
					//$('#title').val('');
				}
				alert(data.msg);
			}
		});
		return false;
	});

});