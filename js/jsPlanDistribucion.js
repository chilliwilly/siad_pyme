$(document).ready(function(){
	$("#in_plan_net").on('change',function(){
		if($("#in_plan_net :selected").text().toLowerCase().indexOf("3 play") >= 0){
			swal({
				    title: "Central Telefonica",
				    text: "Lleva central telefonica?",
				    type: "warning",
				    showCancelButton: true,
				    confirmButtonClass: "btn-success",
				    cancelmButtonClass: "btn-danger",
				    confirmButtonText: "Aceptar",
				    cancelButtonText: "Cancelar",
				    closeOnConfirm: false,
				    closeOnCancel: false
				},
				function(isConfirm) {
				 	if (isConfirm) {
						swal("Hecho!", "Seleccione combo central telefonica", "success");						
						$("#in_plan_net_adic").prop('disabled',false);
						$("#in_plan_tv_pack").removeAttr('disabled');
						$("#btnAgregaDeco").removeAttr('disabled');

						$("#in_plan_fono_adic").prop('disabled','disabled');
      					$("#in_plan_fono_adict").prop('disabled','disabled');

						$("#in_deco_basico").removeAttr('disabled');
						$("#in_deco_basico").selectpicker('refresh');
						$("#in_central_tf").removeAttr('disabled');
						$("#in_central_tf").selectpicker('refresh');
				  	} else {
				    	swal("Cancelado", "Esepecifique lineas y extensiones", "error");
				    	$("#in_plan_net_adic").prop('disabled',false);
						$("#in_plan_tv_pack").removeAttr('disabled');
						$("#btnAgregaDeco").removeAttr('disabled');

						$("#in_plan_fono_adic").prop('disabled',false);
						$("#in_plan_fono_adict").prop('disabled',false);

						$("#in_deco_basico").removeAttr('disabled');
						$("#in_deco_basico").selectpicker('refresh');
						$("#in_central_tf").attr('disabled','disabled');
						$("#in_central_tf").selectpicker('refresh');
				  	}				  	
			});
		}else if($("#in_plan_net :selected").text().toLowerCase().indexOf("tv") >= 0 && $("#in_plan_net :selected").text().toLowerCase().indexOf("telefonia") >= 0){
			swal({
				    title: "Central Telefonica",
				    text: "Lleva central telefonica?",
				    type: "warning",
				    showCancelButton: true,
				    confirmButtonClass: "btn-success",
				    cancelmButtonClass: "btn-danger",
				    confirmButtonText: "Aceptar",
				    cancelButtonText: "Cancelar",
				    closeOnConfirm: false,
				    closeOnCancel: false
				},
				function(isConfirm) {
				 	if (isConfirm) {
						swal("Hecho!", "Seleccione combo central telefonica", "success");						
						$("#in_plan_net_adic").prop('disabled','disabled');
						$("#in_plan_tv_pack").removeAttr('disabled');
						$("#btnAgregaDeco").removeAttr('disabled');

						$("#in_plan_fono_adic").prop('disabled','disabled');
      					$("#in_plan_fono_adict").prop('disabled','disabled');

						$("#in_deco_basico").removeAttr('disabled');
						$("#in_deco_basico").selectpicker('refresh');
						$("#in_central_tf").removeAttr('disabled');
						$("#in_central_tf").selectpicker('refresh');
				  	} else {
				    	swal("Cancelado", "Esepecifique lineas y extensiones", "error");
				    	$("#in_plan_net_adic").prop('disabled','disabled');
						$("#in_plan_tv_pack").removeAttr('disabled');
						$("#btnAgregaDeco").removeAttr('disabled');

						$("#in_plan_fono_adic").prop('disabled',false);
						$("#in_plan_fono_adict").prop('disabled',false);

						$("#in_deco_basico").removeAttr('disabled');
						$("#in_deco_basico").selectpicker('refresh');
						$("#in_central_tf").attr('disabled','disabled');
						$("#in_central_tf").selectpicker('refresh');
				  	}				  	
			});
		}else if($("#in_plan_net :selected").text().toLowerCase().indexOf("tv") >= 0 && $("#in_plan_net :selected").text().toLowerCase().indexOf("banda ancha") >= 0){
			$("#in_plan_net_adic").prop('disabled',false);
			$("#in_plan_tv_pack").prop('disabled',false);
			$("#btnAgregaDeco").removeAttr('disabled');

			$("#in_plan_fono_adic").prop('disabled','disabled');
			$("#in_plan_fono_adict").prop('disabled','disabled');

			$("#in_deco_basico").removeAttr('disabled');
			$("#in_deco_basico").selectpicker('refresh');
			$("#in_central_tf").attr('disabled','disabled');
			$("#in_central_tf").selectpicker('refresh');
		}else if($("#in_plan_net :selected").text().toLowerCase().indexOf("telefonia") >= 0 && $("#in_plan_net :selected").text().toLowerCase().indexOf("banda ancha") >= 0){
			swal({
				    title: "Central Telefonica",
				    text: "Lleva central telefonica?",
				    type: "warning",
				    showCancelButton: true,
				    confirmButtonClass: "btn-success",
				    cancelmButtonClass: "btn-danger",
				    confirmButtonText: "Aceptar",
				    cancelButtonText: "Cancelar",
				    closeOnConfirm: false,
				    closeOnCancel: false
				},
				function(isConfirm) {
				 	if (isConfirm) {
						swal("Hecho!", "Seleccione combo central telefonica", "success");						
						$("#in_plan_net_adic").prop('disabled',false);
						$("#in_plan_tv_pack").prop('disabled','disabled');
						$("#btnAgregaDeco").prop('disabled','disabled');

						$("#in_plan_fono_adic").prop('disabled','disabled');
      					$("#in_plan_fono_adict").prop('disabled','disabled');

						$("#in_deco_basico").prop('disabled','disabled');
						$("#in_deco_basico").selectpicker('refresh');
						$("#in_central_tf").removeAttr('disabled');
						$("#in_central_tf").selectpicker('refresh');
				  	} else {
				    	swal("Cancelado", "Esepecifique lineas y extensiones", "error");
				    	$("#in_plan_net_adic").prop('disabled',false);
						$("#in_plan_tv_pack").prop('disabled','disabled');
						$("#btnAgregaDeco").prop('disabled','disabled');

						$("#in_plan_fono_adic").prop('disabled',false);
						$("#in_plan_fono_adict").prop('disabled',false);

						$("#in_deco_basico").prop('disabled','disabled');
						$("#in_deco_basico").selectpicker('refresh');
						$("#in_central_tf").attr('disabled','disabled');
						$("#in_central_tf").selectpicker('refresh');
				  	}				  	
			});
		}else if($("#in_plan_net :selected").text().toLowerCase().indexOf("1 play") >= 0 && $("#in_plan_net :selected").text().toLowerCase().indexOf("banda ancha") >= 0){
			$("#in_plan_net_adic").prop('disabled',false);
			$("#in_plan_tv_pack").prop('disabled','disabled');
			$("#btnAgregaDeco").prop('disabled','disabled');

			$("#in_plan_fono_adic").prop('disabled','disabled');
			$("#in_plan_fono_adict").prop('disabled','disabled');

			$("#in_deco_basico").prop('disabled','disabled');
			$("#in_deco_basico").selectpicker('refresh');
			$("#in_central_tf").attr('disabled','disabled');
			$("#in_central_tf").selectpicker('refresh');
		}else if($("#in_plan_net :selected").text().toLowerCase().indexOf("1 play") >= 0 && $("#in_plan_net :selected").text().toLowerCase().indexOf("tv") >= 0){
			$("#in_plan_net_adic").prop('disabled','disabled');
			$("#in_plan_tv_pack").prop('disabled',false);
			$("#btnAgregaDeco").removeAttr('disabled');

			$("#in_plan_fono_adic").prop('disabled','disabled');
			$("#in_plan_fono_adict").prop('disabled','disabled');

			$("#in_deco_basico").removeAttr('disabled');
			$("#in_deco_basico").selectpicker('refresh');
			$("#in_central_tf").attr('disabled','disabled');
			$("#in_central_tf").selectpicker('refresh');
		}else if($("#in_plan_net :selected").text().toLowerCase().indexOf("1 play") >= 0 && $("#in_plan_net :selected").text().toLowerCase().indexOf("telefonia") >= 0){
			swal({
				    title: "Central Telefonica",
				    text: "Lleva central telefonica?",
				    type: "warning",
				    showCancelButton: true,
				    confirmButtonClass: "btn-success",
				    cancelmButtonClass: "btn-danger",
				    confirmButtonText: "Aceptar",
				    cancelButtonText: "Cancelar",
				    closeOnConfirm: false,
				    closeOnCancel: false
				},
				function(isConfirm) {
				 	if (isConfirm) {
						swal("Hecho!", "Seleccione combo central telefonica", "success");						
						$("#in_plan_net_adic").prop('disabled','disabled');
						$("#in_plan_tv_pack").prop('disabled','disabled');
						$("#btnAgregaDeco").prop('disabled','disabled');

						$("#in_plan_fono_adic").prop('disabled','disabled');
      					$("#in_plan_fono_adict").prop('disabled','disabled');

						$("#in_deco_basico").prop('disabled','disabled');
						$("#in_deco_basico").selectpicker('refresh');
						$("#in_central_tf").removeAttr('disabled');
						$("#in_central_tf").selectpicker('refresh');
				  	} else {
				    	swal("Cancelado", "Esepecifique lineas y extensiones", "error");
				    	$("#in_plan_net_adic").prop('disabled','disabled');
						$("#in_plan_tv_pack").prop('disabled','disabled');
						$("#btnAgregaDeco").prop('disabled','disabled');

						$("#in_plan_fono_adic").prop('disabled',false);
						$("#in_plan_fono_adict").prop('disabled',false);

						$("#in_deco_basico").prop('disabled','disabled');
						$("#in_deco_basico").selectpicker('refresh');
						$("#in_central_tf").prop('disabled','disabled');
						$("#in_central_tf").selectpicker('refresh');
				  	}				  	
			});
		}
	});
});