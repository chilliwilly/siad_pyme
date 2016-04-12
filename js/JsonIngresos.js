$(document).ready(function(){

	//$('#in_comuna').prop('disabled', true);
	//$('#in_region').prop('disabled', true);
	//$('#in_comuna').append("<option value='0'>Elige Comuna...</option>");

	//LOAD DE COMUNAS
	var comuna = $("#in_comuna");
	comuna.append("<option value='0'>Cargando Comunas...</option>");
	$.getJSON(baseurl + "ingreso/comunas",function(objetosretorna1){
		comuna.empty();
		comuna.append("<option value='0'>Elige Comuna...</option>");
		$.each(objetosretorna1, function(i,ObjetoReturn1){
			var seleccion1 = "";
			if(num_comuna==ObjetoReturn1.id_comuna){
				seleccion1 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn1.id_comuna+"' "+seleccion1+">" + ObjetoReturn1.comuna+"</option>";
			comuna.append(nuevaFila);
		});
	});

	$("#in_comuna").change(function(){
		var comuna = $("#in_comuna").val();
	});

	//LOAD DE TIPOS DE TRABAJO
	var ttrabajo = $("#in_tipo_trabajo");
	ttrabajo.append("<option value='0'>Cargando Trabajos...</option>");
	$.getJSON(baseurl + "ingreso/ttrabajos",function(objetosretorna2){
		ttrabajo.empty();
		ttrabajo.append("<option value='0'>Elige Trabajo...</option>");
		$.each(objetosretorna2, function(i,ObjetoReturn2){
			var seleccion2 = "";
			if(num_trabajo==ObjetoReturn2.tt_id){
				seleccion2 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn2.tt_id+"' "+seleccion2+">" + ObjetoReturn2.tt_nombre+"</option>";
			ttrabajo.append(nuevaFila);
		});
	});

	$("#in_tipo_trabajo").change(function(){
		var ttrabajo = $("#in_tipo_trabajo").val();
	});

	//LOAD ESTADO ACTIVIDADES
	var testado = $("#in_estado");
	testado.append("<option value='0'>Cargando Estados...</option>");
	$.getJSON(baseurl + "ingreso/testados",function(objetosretorna3){
		testado.empty();
		testado.append("<option value='0'>Elige Estado...</option>");
		$.each(objetosretorna3, function(i,ObjetoReturn3){
			var seleccion3 = "";
			if(num_estado==ObjetoReturn3.est_id){
				seleccion3 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn3.est_id+"' "+seleccion3+">" + ObjetoReturn3.est_descripcion+"</option>";
			testado.append(nuevaFila);
		});
	});

	$("#in_estado").change(function(){
		var testado = $("#in_estado").val();
	});

	$("form#formularioData").submit(function()
	{
			var IngresoRegistro 		       = new Object();
			IngresoRegistro.p_proyecto 	       = $('input#in_proyecto').val();
			IngresoRegistro.p_sga              = $('input#in_sga').val();//date
			IngresoRegistro.p_ingreso          = $('input#in_ingreso').val();//date
			IngresoRegistro.p_entrega          = $('input#in_entrega').val();//date
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