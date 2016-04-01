<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Chile/Continental');
class ingreso extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('seguridad_model');
		$this->load->model('ingreso_model');
		$this->load->model('regcomu_model');
		$this->load->helper('date');
	}

	public function nuevo($nfolio = null){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      	$this->seguridad_model->SessionActivo($url);
		$this->load->view('constant');
		$this->load->view('view_header');
		$data['titulo']    = "Nuevo Ingreso";
		$data['n_folio'] = base64_decode($nfolio);
		$this->load->view('ingreso/view_ingreso',$data);
		$this->load->view('view_footer');
	}

	public function regiones(){
		$region = $this->regcomu_model->GetListRegion();
		echo json_encode($region);
	}

	public function comunas(){
		//$idCategoria   = $this->input->get("filtro");
		$subcategorias = $this->regcomu_model->GetListComuna();//($idCategoria);
		echo json_encode($subcategorias);
	}

	public function ttrabajos(){
		$trabajos = $this->regcomu_model->GetListTrabajo();//($idCategoria);
		echo json_encode($trabajos);
	}

	public function testados(){
		$estados = $this->regcomu_model->GetListEstado();
		echo json_encode($estados);
	}

	public function GuardaRegistro(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        
        $this->seguridad_model->SessionActivo($url);

		$InsRegistro = json_decode($this->input->post('InsRegistro'));

		/*Array de response*/
		 $response = array (
				"estatus"   => false,
				"campo"     => "",
	            "error_msg" => ""
	    );

		/*Verificamos si Existe el folio*/
		$RutSinGuion = str_replace("-", "", $InsRegistro->p_rut);
		$RegionComuna = explode("-",$InsRegistro->p_region);		

		$ExisteRegistro = $this->ingreso_model->ExisteIngreso($InsRegistro->p_proyecto);

		if($ExisteRegistro==true){
			$response["campo"]     = "in_proyecto";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-remove'></span> &nbsp; El folio que esta ingresando ya existe</div>";
			echo json_encode($response);
		}else{
			$GuardaRegistro  = array(
			'in_proyecto' 	      => $InsRegistro->p_proyecto,
			'in_sga'              => $InsRegistro->p_sga,
			'in_ingreso'          => $InsRegistro->p_ingreso,
			'in_entrega'          => $InsRegistro->p_entrega,
			'in_cliente'          => $InsRegistro->p_cliente,
			'in_rut'              => $RutSinGuion,//InsRegistro->p_rut,
			'in_direccion'        => $InsRegistro->p_direccion,
			'in_region'           => $RegionComuna[0],//$InsRegistro->p_region,
			'in_comuna'           => $InsRegistro->p_comuna,//$RegionComuna[1],//$InsRegistro->p_comuna,
			'in_nombre'           => $InsRegistro->p_nombre,
			'in_fono'             => $InsRegistro->p_fono,
			'in_plan_net'         => $InsRegistro->p_plan_net,
			'in_plan_net_adic'    => $InsRegistro->p_plan_net_adic,
			'in_plan_fono'        => $InsRegistro->p_plan_fono,
			'in_plan_fono_adic'   => $InsRegistro->p_plan_fono_adic,
			'in_plan_fono_adict'  => $InsRegistro->p_plan_fono_adict,
			'in_plan_tv'          => $InsRegistro->p_plan_tv,
			'in_deco_basico'      => $InsRegistro->p_deco_basico,
			'in_plan_tv_adic'     => $InsRegistro->p_plan_tv_adic,
			'in_plan_tv_adict'    => $InsRegistro->p_plan_tv_adict,
			'in_deco_hd_basico'   => $InsRegistro->p_deco_hd_basico,
			'in_deco_hd_full'     => $InsRegistro->p_deco_hd_full,
			'in_plan_tv_pack'     => $InsRegistro->p_plan_tv_pack,
			'in_central_tf'       => $InsRegistro->p_central_tf,
			'in_lineas_asignadas' => $InsRegistro->p_lineas_asignadas,
			'in_fecha_operacion'  => $InsRegistro->p_fecha_operacion,
			'in_vende'            => $InsRegistro->p_vende,
			//'in_estado'           => $InsRegistro->p_estado,
			'in_tipo_trabajo'	  => $InsRegistro->p_ttrabajo
			);

			$GuardaRegistroDetalle = array(
				'in_proyecto'         => $InsRegistro->p_proyecto,
				'indet_fecha_registro'   => date('Y-m-j H:i:s'),
				'indet_usr_registro'     => $this->session->userdata('ID'),
				'indet_usr_empresa'      => $this->session->userdata('ALIADORUT'),
				'indet_observacion'      => $InsRegistro->p_observacion,
				'in_estado'           	 => $InsRegistro->p_estado
			);

			$this->ingreso_model->SaveIngreso($GuardaRegistro);
			$this->ingreso_model->SaveIngresoDetalle($GuardaRegistroDetalle);

			$response["error_msg"]   = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-ok'></span> &nbsp; Informacion Guardada Correctamente</div>";// form-control-feedback
			echo json_encode($response);
		}
	}
}