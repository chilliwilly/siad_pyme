$(document).ready(function(){
	
	$("form#formularioData").submit(function()
	{
			var IngresoRegistro 		       = new Object();
			IngresoRegistro.p_proyecto 	       = $('input#in_proyecto').val();			
			IngresoRegistro.p_ingreso          = $('input#in_ingreso').val();//date fecha ingreso registro
			IngresoRegistro.p_entrega          = $('input#in_entrega').val();//date fecha agenda
			IngresoRegistro.p_bloque           = $('select#in_bloque_agenda :selected').val();//bloque agenda entra en posicion de SGA
			IngresoRegistro.p_cliente          = $('input#in_cliente').val();
			IngresoRegistro.p_rut              = $('input#in_rut').val();
			IngresoRegistro.p_direccion        = $('input#in_direccion').val();
			IngresoRegistro.p_direccion_t      = $('input#in_direccion_nueva').val();
			IngresoRegistro.p_nombre           = $('input#in_nombre').val();
			IngresoRegistro.p_fono             = $('input#in_fono').val();
			IngresoRegistro.p_region           = $('select#in_comuna :selected').text();
			IngresoRegistro.p_comuna           = $('select#in_comuna :selected').val();//$('select#in_comuna :selected').text();
			IngresoRegistro.plan_id     	   = $('select#in_plan_net :selected').val();			
			IngresoRegistro.p_plan_net_adic    = $('input#in_plan_net_adic').val();			
			IngresoRegistro.p_plan_fono_adicu  = $('input#in_plan_fono_adic').val();//lineas
			IngresoRegistro.p_plan_fono_adicd  = $('input#in_plan_fono_adict').val();//extensiones
			IngresoRegistro.p_plan_tv_pack     = $('input#in_plan_tv_pack').val();
			IngresoRegistro.p_central_tf       = $('select#in_central_tf :selected').val();
			IngresoRegistro.p_lineas_asignadas = $('input#in_central_tfl').val();
			IngresoRegistro.p_lineas_anexos    = $('input#in_central_tfa').val();
			//IngresoRegistro.p_fecha_cierre     = $('input#in_fecha_operacion').val();//date in_fecha_operacion
			IngresoRegistro.p_vende            = $('input#in_vende').val();
			IngresoRegistro.p_estado           = $('select#in_estado').val();
			IngresoRegistro.p_observacion      = $('textarea#indet_observacion').val();
			IngresoRegistro.tt_id              = $('select#in_tipo_trabajo').val();
			IngresoRegistro.deco_id     	   = $('select#in_deco_basico :selected').val();
			IngresoRegistro.deco_sd            = $('input#txtChksd').val();
			IngresoRegistro.deco_hd            = $('input#txtChkhd').val();
			IngresoRegistro.deco_tvr           = $('input#txtChktvr').val();
			IngresoRegistro.deco_std           = $('input#txtChkstn').val();
			IngresoRegistro.p_rep_tipo         = $('select#in_tiporep :selected').val();
			IngresoRegistro.p_rep_codi         = $('select#in_codrep :selected').val();
			IngresoRegistro.es_update          = $('input#id_update').val();

			/*
			INGRESO FONO TELEFONICO
			*/

			var InsFonoArray = [];			
			var tfono = document.getElementById('tblFonoCli');
		    var trow = tfono.rows.length;	    
		    for(i = 1; i < trow; i++){
		      var tcell = tfono.rows.item(i).cells;
		      var tcol = tcell.length;

		      var InsFono = new Object();
		      InsFono.p_proyecto = Math.floor(Math.random() * 2000);
		      InsFono.p_fono = tcell.item(0).innerHTML;

		      InsFonoArray.push(InsFono);
		    }

			/*
			FIN INGRESO FONO TELEFONICO
			*/
			
			$('html,body').animate({
	            scrollTop: 0
	        }, 700);

			$("#mensaje").append("<div class='modal1'><div class='center1'> <center> <img src='"+ baseurl +"/img/gif-load.gif'> Guardando Informacion...</center></div></div>");
			
			var DatosJson = JSON.stringify(IngresoRegistro);
			var DatosFono = JSON.stringify(InsFonoArray);
			
			$.post(baseurl + 'Ingreso/GuardaRegistro',
				{ 
					InsRegistro: DatosJson,
					InsFono: DatosFono
				},
				function(data, textStatus) {
					if(data.campo==null){
						$("#"+data.campo+"").focus();
						$("#mensaje").html(data.error_msg);

						var delay = 2500; //delay en milisegundos
						setTimeout(function(){ window.location.href = baseurl + "Ingreso/nuevo"; }, delay);	
					}else{						
						$("#"+data.campo+"").focus();
						$("#mensaje").html(data.error_msg);
					}					
				}, 
				"json"		
			);
			return false;
	});
});