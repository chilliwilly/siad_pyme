$(document).ready(function(){
	window.verPreview = function (nroOrden){
		//alert(nroOrden);
		$.post(baseurl + 'orden/previewFolio',
		{
			n_folio: nroOrden
		},
		function(data){
			if(data.length < 0){
				alert("no hay datos");
			}else{
				var data_json = $.parseJSON(data);				
				//alert(data_json.data_folio_det);
				//alert(data_json.preview_folio[0].p_in_rut);
				//$("#txtTipoTrabajo").val(data_json.preview_folio["p_in_rut"]);
				$("#txt_tipo_trabajo").val(data_json.preview_folio[0].p_in_tipo_trabajo);
				$("#txt_proyecto").val(data_json.preview_folio[0].p_in_proyecto);
				$("#txt_sga").val(data_json.preview_folio[0].p_in_sga);
				$("#txt_ingreso").val(data_json.preview_folio[0].p_in_ingreso);
				$("#txt_entrega").val(data_json.preview_folio[0].p_in_entrega);
				$("#txt_cliente").val(data_json.preview_folio[0].p_in_cliente);
				$("#txt_rut").val(data_json.preview_folio[0].p_in_rut);
				$("#txt_comuna").val(data_json.preview_folio[0].p_in_comuna);
				$("#txt_nombre").val(data_json.preview_folio[0].p_in_nombre);
				$("#txt_fono").val(data_json.preview_folio[0].p_in_fono);
				$("#txt_direccion").val(data_json.preview_folio[0].p_in_direccion);
				$("#txt_plan_net").val(data_json.preview_folio[0].p_in_plan_net);
				$("#txt_plan_net_adic").val(data_json.preview_folio[0].p_in_plan_net_adic);
				$("#txt_plan_fono").val(data_json.preview_folio[0].p_in_plan_fono);
				$("#txt_plan_fono_adic").val(data_json.preview_folio[0].p_in_plan_fono_adic);
				$("#txt_plan_fono_adict").val(data_json.preview_folio[0].p_in_plan_fono_adict);
				$("#txt_plan_tv").val(data_json.preview_folio[0].p_in_plan_tv);
				$("#txt_deco_basico").val(data_json.preview_folio[0].p_in_deco_basico);
				$("#txt_plan_tv_adic").val(data_json.preview_folio[0].p_in_plan_tv_adic);
				$("#txt_plan_tv_adict").val(data_json.preview_folio[0].p_in_plan_tv_adict);
				$("#txt_deco_hd_basico").val(data_json.preview_folio[0].p_in_deco_hd_basico);
				$("#txt_deco_hd_full").val(data_json.preview_folio[0].p_in_deco_hd_full);
				$("#txt_plan_tv_pack").val(data_json.preview_folio[0].p_in_plan_tv_pack);
				$("#txt_central_tf").val(data_json.preview_folio[0].p_in_central_tf);
				$("#txt_lineas_asignadas").val(data_json.preview_folio[0].p_in_lineas_asignadas);
				$("#txt_fecha_operacion").val(data_json.preview_folio[0].p_in_fecha_operacion);
				$("#txt_vende").val(data_json.preview_folio[0].p_in_vende);			

				$("#ordenesDet tbody").html("");

				$.each(data_json.data_folio_det, function(i, detalle){
					if(i==0){
						$("#txt_estado").val(detalle.estado);
						$("#txt_observacion").val(detalle.observacion);						
					}

					/*var data_detalle = "<tr>"
					+"<td>"+detalle.fecha_registro+"</td>"
					+"<td>"+detalle.user_ingresa+"</td>"
					+"<td>"+detalle.estado+"</td>"
					+"<td>"+detalle.observacion+"</td>"
					+"</tr>";

					$(data_detalle).appendTo("#ordenesDet tbody");*/
				});

			}
		});
	}

	window.setFolio = function(nroOrden){
		$("#txtNroFolioHide").val(nroOrden);
	}

	window.cerrarOrden = function(){		
		var nroFolio = $("#txtNroFolioHide").val();
		//alert(nroOrden);
		//var InputNroOrden = new Object();
		//InputNroOrden.nroOrden = nroFolio;
		//var DatosFolio = JSON.stringify(nroFolio);

						
				//$("#mensaje").html(data.error_msg);
		//swal('Mensaje',data.error_msg,'success');
		swal({
			  title: "Esta Seguro?",
			  text: "Para reabrir debera buscar el folio que ha cerrado",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-success",
			  cancelmButtonClass: "btn-danger",
			  confirmButtonText: "Cerrar",
			  cancelButtonText: "Cancelar",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm) {
			 	if (isConfirm) {
					swal("Hecho!", "El registro ha sido cerrado, este mensaje se cerrara automaticamente en 3 segundos", "success");

					$.post(baseurl + 'orden/CierraAdmin',
					{ 
						DatoFolio: nroFolio
					},
					function(data, textStatus) {	
						var delay = 3000; //delay en milisegundos
						setTimeout(function(){ window.location.href = baseurl + "orden"; }, delay);
					});

			  	} else {
			    	swal("Cancelado", "El registro no ha sido actualizado", "error");
			  	}
		});

				
	}
});