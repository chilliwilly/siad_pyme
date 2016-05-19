<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Chile/Continental');
class Ingreso extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Seguridad_model');
		$this->load->model('Ingreso_model');
		$this->load->model('Regcomu_model');
		$this->load->model('Orden_model');
		$this->load->helper('date');
	}

	public function nuevo($nfolio = null){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      	$this->Seguridad_model->SessionActivo($url);
		$this->load->view('constant');
		$this->load->view('view_header');
		$data['titulo'] = "Nuevo Ingreso";
		$data['n_folio'] = base64_decode($nfolio);
		$data['data_flag'] = "0";//para saber si es para update
		$data['data_folio_agenda'] = '';
		$this->load->view('ingreso/view_ingreso',$data);
		$this->load->view('view_footer');
	}

	public function regiones(){
		$region = $this->Regcomu_model->GetListRegion();
		echo json_encode($region);
	}

	public function comunas(){
		$subcategorias = $this->Regcomu_model->GetListComuna();
		echo json_encode($subcategorias);
	}

	public function ttrabajos(){
		$trabajos = $this->Regcomu_model->GetListTrabajo();
		echo json_encode($trabajos);
	}

	public function testados(){
		$estados = $this->Regcomu_model->GetListEstado();
		echo json_encode($estados);
	}

	public function bloques(){
		$bloque = $this->Regcomu_model->GetListaBloques();
		echo json_encode($bloque);
	}

	public function decos(){
		$deco = $this->Regcomu_model->GetListaDecos();
		echo json_encode($deco);	
	}

	public function planes(){
		$plan = $this->Regcomu_model->GetListaPlanes();
		echo json_encode($plan);
	}

	public function centrales(){
		$central = $this->Regcomu_model->GetListaCentral();
		echo json_encode($central);
	}

	public function reparaciones(){
		$repas = $this->Regcomu_model->GetListaReparacionTipo();
		echo json_encode($repas);
	}

	public function codcierres(){
		$cierres = $this->Regcomu_model->GetListaCodigCierre();
		echo json_encode($cierres);
	}

	public function GuardaRegistro(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];        
        $this->Seguridad_model->SessionActivo($url);

		$InsRegistro = json_decode($this->input->post('InsRegistro'));
		$InsFono = json_decode($this->input->post('InsFono'));

		/*Array de response*/
		 $response = array (
				"estatus"   => false,
				"campo"     => "",
	            "error_msg" => ""
	    );

		/*Verificamos si Existe el folio*/
		$RutSinGuion = str_replace("-", "", $InsRegistro->p_rut);
		$RegionComuna = explode("-",$InsRegistro->p_region);		

		$ExisteRegistro = $this->Ingreso_model->ExisteIngreso($InsRegistro->p_proyecto);

		if($InsRegistro->es_update==1){
			//realizo update
			//compruebo que campo observacion no este en blanco
			if($InsRegistro->p_observacion == null || $InsRegistro->p_observacion == ""){
				$response["campo"] = "indet_observacion";
				$response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-remove'></span> &nbsp; El campo observacion no puede estar en blanco</div>";
				echo json_encode($response);
			}elseif($InsRegistro->p_estado == null || $InsRegistro->p_estado == "" || $InsRegistro->p_estado == "0"){
				$response["campo"] = "in_estado";
				$response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-remove'></span> &nbsp; Debe seleccionar un estado de la orden</div>";
				echo json_encode($response);
			}else{
				$ActualizaRegistro = array(
					'in_entrega'          => $InsRegistro->p_entrega,
					'in_cliente'          => $InsRegistro->p_cliente,
					'in_rut'              => $RutSinGuion,
					'in_direccion'        => $InsRegistro->p_direccion,
					'in_nombre'           => $InsRegistro->p_nombre,
					'in_fono'             => $InsRegistro->p_fono,
					'in_plan_net_adic'    => $InsRegistro->p_plan_net_adic,
					'in_plan_fono_adicu'  => $InsRegistro->p_plan_fono_adicu,
					'in_plan_fono_adicd'  => $InsRegistro->p_plan_fono_adicd,
					//'in_plan_tv_adicu'    => $InsRegistro->p_plan_tv_adicu,
					//'in_plan_tv_adicd'    => $InsRegistro->p_plan_tv_adicd,
					'in_plan_pack'		  => $InsRegistro->p_plan_tv_pack,
					//'in_central_tf'       => $InsRegistro->p_central_tf,
					//'in_lineas_asignadas' => $InsRegistro->p_lineas_asignadas,
					//'in_fecha_cierre'     => $InsRegistro->p_fecha_cierre,
					'in_vende'            => $InsRegistro->p_vende,
					'in_hora_ingreso'     => date('H:i:s'),						
					'tt_id'               => $InsRegistro->tt_id,						
					'id_comuna'           => $InsRegistro->p_comuna,
					'id_region'           => $RegionComuna[0],
					'plan_id'             => $InsRegistro->plan_id,
					'deco_id'             => $InsRegistro->deco_id
				);
				
				$ActualizaRegistroDetalle = array(
					'in_proyecto'            => $InsRegistro->p_proyecto,
					'indet_fecha_registro'   => date('Y-m-j H:i:s'),
					'indet_usr_registro'     => $this->session->userdata('ID'),
					'indet_usr_empresa'      => $this->session->userdata('ALIADORUT'),
					'indet_observacion'      => $InsRegistro->p_observacion,
					'in_estado'           	 => $InsRegistro->p_estado
				);

				$ActualizaRegistroDecoAdic = array(				
					'decoa_sd'	           => $InsRegistro->deco_sd,
					'decoa_hd'             => $InsRegistro->deco_hd,
					'decoa_tvr'            => $InsRegistro->deco_tvr,
					'decoa_stnd'           => $InsRegistro->deco_std,
					'decoa_usr_registro'   => $this->session->userdata('ID'),
					'decoa_usr_empresa'    => $this->session->userdata('ALIADORUT'),
					'decoa_fecha_registro' => date('Y-m-j H:i:s')
				);

				if($InsRegistro->p_entrega != null){
					$agendaFolio = $this->Orden_model->GetAgendaByFolio($InsRegistro->p_proyecto);
					foreach ($agendaFolio as $value) {
						# valido que al actualizar no ingrese un nuevo registro de agenda en caso de que bloque y fecha sean iguales
						if(($value->reagenda_fecha != $InsRegistro->p_entrega) || ($value->reagenda_bloque != $InsRegistro->p_bloque)){
							$GuardaRegistroAgenda = array(
								'in_proyecto'           => $InsRegistro->p_proyecto,
								'reagenda_fecha'        => $InsRegistro->p_entrega,
								'reagenda_bloque'       => $InsRegistro->p_bloque,
								'reagenda_modificacion' => date('Y-m-j H:i:s'),
								'reagenda_usr_registro' => $this->session->userdata('ID'),
								'reagenda_usr_empresa'  => $this->session->userdata('ALIADORUT')
							);

							$this->Ingreso_model->SaveIngresoAgenda($GuardaRegistroAgenda);
							break;
						}else{
							break;
						}
					}										
				}

				$this->Ingreso_model->UpdateIngreso($ActualizaRegistro, $InsRegistro->p_proyecto);
				$this->Ingreso_model->SaveIngresoDetalle($ActualizaRegistroDetalle);
				$this->Ingreso_model->UpdateDetalleDeco($ActualizaRegistroDecoAdic, $InsRegistro->p_proyecto);
				
				$response["error_msg"]   = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-ok'></span> &nbsp; Informacion Actualizada Correctamente</div>";// form-control-feedback
				echo json_encode($response);
			}			
		}else{
			//compruebo que campo observacion no este en blanco
			if($InsRegistro->p_observacion == null || $InsRegistro->p_observacion == ""){
				$response["campo"] = "indet_observacion";
				$response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-remove'></span> &nbsp; El campo observacion no puede estar en blanco</div>";
				echo json_encode($response);
			}elseif($InsRegistro->p_estado == null || $InsRegistro->p_estado == "" || $InsRegistro->p_estado == "0"){
				$response["campo"] = "in_estado";
				$response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-remove'></span> &nbsp; Debe seleccionar un estado de la orden</div>";
				echo json_encode($response);
			}elseif($InsRegistro->p_proyecto == null || $InsRegistro->p_proyecto == "" || $InsRegistro->p_proyecto == "0"){
				$response["campo"] = "in_proyecto";
				$response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-remove'></span> &nbsp; Debe ingresar un numero de Proyecto/Solot</div>";
				echo json_encode($response);
			}else{
				//compruebo que no exista e inserto
				if($ExisteRegistro==true){
					$response["campo"] = "in_proyecto";
					$response["error_msg"] = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-remove'></span> &nbsp; El folio que esta ingresando ya existe</div>";
					echo json_encode($response);
				}else{
					$GuardaRegistro  = array(
						'in_proyecto'         => $InsRegistro->p_proyecto,
						'in_ingreso'          => $InsRegistro->p_ingreso,
						//'in_entrega'          => $InsRegistro->p_entrega,
						'in_cliente'          => $InsRegistro->p_cliente,
						'in_rut'              => $RutSinGuion,
						'in_nombre'           => $InsRegistro->p_nombre,
						'in_fono'             => $InsRegistro->p_fono,
						'in_direccion'        => $InsRegistro->p_direccion,
						'in_direccion_t'      => $InsRegistro->p_direccion_t,
						'in_plan_net_adic'    => $InsRegistro->p_plan_net_adic,
						'in_plan_fono_linea'  => $InsRegistro->p_plan_fono_adicu,
						'in_plan_fono_ext'    => $InsRegistro->p_plan_fono_adicd,
						//'in_plan_tv_adicu'    => $InsRegistro->p_plan_tv_adicu,
						//'in_plan_tv_adicd'    => $InsRegistro->p_plan_tv_adicd,
						'in_plan_pack'		  => $InsRegistro->p_plan_tv_pack,
						//'in_central_tf'       => $InsRegistro->p_central_tf,
						//'in_lineas_asignadas' => $InsRegistro->p_lineas_asignadas,
						//'in_fecha_cierre'     => $InsRegistro->p_fecha_cierre,
						'in_vende'            => $InsRegistro->p_vende,
						'in_hora_ingreso'     => date('H:i:s'),
						'plan_id'             => $InsRegistro->plan_id,
						'tt_id'               => $InsRegistro->tt_id,						
						'id_comuna'           => $InsRegistro->p_comuna,
						'id_region'           => $RegionComuna[0],
						'rt_id'               => $InsRegistro->p_rep_tipo,
						'vt_codigo'           => $InsRegistro->p_rep_codi
						//'plan_id'             => $InsRegistro->plan_id,
						//'deco_id'             => $InsRegistro->deco_id
					);

					$GuardaRegistroDetalle = array(
						'in_proyecto'            => $InsRegistro->p_proyecto,
						'indet_fecha_registro'   => date('Y-m-j H:i:s'),
						'indet_usr_registro'     => $this->session->userdata('ID'),
						'indet_usr_empresa'      => $this->session->userdata('ALIADORUT'),
						'indet_observacion'      => $InsRegistro->p_observacion,
						'in_estado'           	 => $InsRegistro->p_estado
					);

					$GuardaRegistroDecoAdic = array(
						'in_proyecto'          => $InsRegistro->p_proyecto,						
						'deco_id'              => $InsRegistro->deco_id,
						'decoa_sd'	           => $InsRegistro->deco_sd,
						'decoa_hd'             => $InsRegistro->deco_hd,
						'decoa_tvr'            => $InsRegistro->deco_tvr,
						'decoa_stnd'           => $InsRegistro->deco_std,
						'decoa_usr_registro'   => $this->session->userdata('ID'),
						'decoa_usr_empresa'    => $this->session->userdata('ALIADORUT'),
						'decoa_fecha_registro' => date('Y-m-j H:i:s')
					);

					if($InsRegistro->p_entrega != null){
						$GuardaRegistroAgenda = array(
							'in_proyecto'           => $InsRegistro->p_proyecto,
							'reagenda_fecha'        => $InsRegistro->p_entrega,
							'reagenda_bloque'       => $InsRegistro->p_bloque,
							'reagenda_modificacion' => date('Y-m-j H:i:s'),
							'reagenda_usr_registro' => $this->session->userdata('ID'),
							'reagenda_usr_empresa'  => $this->session->userdata('ALIADORUT')
						);

						$this->Ingreso_model->SaveIngresoAgenda($GuardaRegistroAgenda);
					}

					if($InsRegistro->p_central_tf != "0" || $InsRegistro->p_central_tf != null){
						$GuardaRegistroCentral = array(
							'in_proyecto'      =>$InsRegistro->p_proyecto,
							'ctf_id'           =>$InsRegistro->p_central_tf,
							'dqty_linea'       =>$InsRegistro->p_lineas_asignadas,
							'dqty_anexo'       =>$InsRegistro->p_lineas_anexos,
							'ctf_usr_registro' =>$this->session->userdata('ID'),
							'ctf_usr_empresa'  =>$this->session->userdata('ALIADORUT')
						);

						$this->Ingreso_model->SaveIngresoCentral($GuardaRegistroCentral);
					}

					if(!is_null($InsFono)){
						foreach ($InsFono as $value) {
							# code...
							$GuardaFono = array(
								'in_proyecto' => $InsRegistro->p_proyecto,
								'fo_telefono' => $value->p_fono
							);

							$this->Ingreso_model->SaveIngresoFono($GuardaFono);
						}
					}			

					$this->Ingreso_model->SaveIngreso($GuardaRegistro);
					$this->Ingreso_model->SaveIngresoDetalle($GuardaRegistroDetalle);				
					$this->Ingreso_model->SaveIngresoDecoAdic($GuardaRegistroDecoAdic);

					$response["error_msg"]   = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-ok'></span> &nbsp; Informacion Guardada Correctamente</div>";// form-control-feedback
					echo json_encode($response);
				}
			}			
		}
	}

	public function GuardarFonoTest(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];        
        $this->Seguridad_model->SessionActivo($url);

		$InsFono = json_decode($this->input->post('InsFono'));

		/*Array de response*/
		 $response = array (
				"estatus"   => false,
				"campo"     => "",
	            "error_msg" => ""
	    );

		foreach ($InsFono as $value) {
			# code...
			$GuardaFono = array(
				'in_proyecto' => $value->p_proyecto,
				'fo_telefono' => $value->p_fono
			);

			$this->Ingreso_model->SaveIngresoFono($GuardaFono);
		}

		$response["campo"] = "";
		$response["error_msg"] = "";

		echo json_encode($response);
	}
}