$(document).ready(function(){

	//$('#in_comuna').prop('disabled', true);
	//$('#in_region').prop('disabled', true);
	//$('#in_comuna').append("<option value='0'>Elige Comuna...</option>");

	$("form#formularioData").submit(function()
	{
			var IngresoRegistro 		       = new Object();
			IngresoRegistro.p_proyecto 	       = $('input#in_proyecto').val();
			//IngresoRegistro.p_sga              = $('input#in_sga').val();//date			
			IngresoRegistro.p_ingreso          = $('input#in_ingreso').val();//date fecha ingreso registro
			IngresoRegistro.p_entrega          = $('input#in_entrega').val();//date fecha agenda
			IngresoRegistro.p_bloque           = $('select#in_bloque_agenda :selected').val();//bloque agenda entra en posicion de SGA
			IngresoRegistro.p_cliente          = $('input#in_cliente').val();
			IngresoRegistro.p_rut              = $('input#in_rut').val();
			IngresoRegistro.p_direccion        = $('input#in_direccion').val();
			IngresoRegistro.p_region           = $('select#in_comuna :selected').text();
			IngresoRegistro.p_comuna           = $('select#in_comuna :selected').val();//$('select#in_comuna :selected').text();
			IngresoRegistro.p_nombre           = $('input#in_nombre').val();
			IngresoRegistro.p_fono             = $('input#in_fono').val();
			IngresoRegistro.p_plan_net         = $('input#in_plan_net').val();
			IngresoRegistro.p_plan_net_adic    = $('input#in_plan_net_adic').val();
			IngresoRegistro.p_plan_fono        = $('input#in_plan_fono').val();
			IngresoRegistro.p_plan_fono_adic   = $('input#in_plan_fono_adic').val();
			IngresoRegistro.p_plan_fono_adict  = $('input#in_plan_fono_adict').val();
			IngresoRegistro.p_plan_tv          = $('input#in_plan_tv').val();
			IngresoRegistro.p_deco_basico      = $('input#in_deco_basico').val();
			IngresoRegistro.p_plan_tv_adic     = $('input#in_plan_tv_adic').val();
			IngresoRegistro.p_plan_tv_adict    = $('input#in_plan_tv_adict').val();
			IngresoRegistro.p_deco_hd_basico   = $('input#in_deco_hd_basico').val();
			IngresoRegistro.p_deco_hd_full     = $('input#in_deco_hd_full').val();
			IngresoRegistro.p_plan_tv_pack     = $('input#in_plan_tv_pack').val();
			IngresoRegistro.p_central_tf       = $('input#in_central_tf').val();
			IngresoRegistro.p_lineas_asignadas = $('input#in_lineas_asignadas').val();
			IngresoRegistro.p_fecha_operacion  = $('input#in_fecha_operacion').val();//date
			IngresoRegistro.p_vende            = $('input#in_vende').val();
			IngresoRegistro.p_estado           = $('select#in_estado').val();
			IngresoRegistro.p_observacion      = $('textarea#indet_observacion').val();
			IngresoRegistro.p_ttrabajo         = $('select#in_tipo_trabajo').val();
			IngresoRegistro.es_update          = $('input#id_update').val();
			
			$('html,body').animate({
	            scrollTop: 0
	        }, 700);

			$("#mensaje").append("<div class='modal1'><div class='center1'> <center> <img src='"+ baseurl +"/img/gif-load.gif'> Guardando Informacion...</center></div></div>");
			
			var DatosJson = JSON.stringify(IngresoRegistro);
			
			$.post(baseurl + 'ingreso/GuardaRegistro',
				{ 
					InsRegistro: DatosJson
				},
				function(data, textStatus) {
					$("#"+data.campo+"").focus();
					$("#mensaje").html(data.error_msg);

					var delay = 2000; //delay en milisegundos
					setTimeout(function(){ window.location.href = baseurl + "ingreso/nuevo"; }, delay);
				}, 
				"json"		
			);
			return false;
	});
});