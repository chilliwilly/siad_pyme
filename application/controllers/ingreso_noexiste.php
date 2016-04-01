<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Chile/Continental');
class ingreso_noexiste extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('seguridad_model');
		$this->load->model('ingreso_model');
		$this->load->helper('date');
	}


	public function index(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    $this->seguridad_model->SessionActivo($url);
	    /**/
	    //$data = array('msg' => "Favor seleccione archivo a subir...");    
		//$data['upload_data'] = '';
	    //$data['names'] = '';
	    //$data['fromsur'] = $this->ingreso_model->LeftIngresoSur();
	    $RegistroSga = array();

	    //retorna folios de sga inexistentes en los ya ingresados
	    $FaltaSga = $this->ingreso_model->LeftIngresoSga();
	    foreach ($FaltaSga as $sga) {
	    	# code...
	    	
		    $ExisteRegistro = $this->ingreso_model->ExisteIngreso($sga->sga_proyecto);

			if($ExisteRegistro==false){
				$RegistroSga[] = array(
					'folio_faltante' => $sga->sga_proyecto
				);
			}
	    }

		$data['fromsga'] = json_encode($RegistroSga);
	    $this->CargaSurMaster();	    

	    $this->load->view('constant');
	    $this->load->view('view_header');
	    $this->load->view('ingreso/view_ingreso_noexiste',$data);
	    $this->load->view('view_footer');
	}

	//Lista sga_proyecto que no existen en master
	//para que usuario seleccione y rellene datos
	function CargaSgaMaster(){
		$FaltaSga = $this->ingreso_model->LeftIngresoSga();

		foreach ($FaltaSga as $sga) {
			# code...
			$ExisteRegistro = $this->ingreso_model->ExisteIngreso($sga->sga_proyecto);

			if($ExisteIngreso==false){

			}
		}
	}

	//metodo que carga datos de sur que no existen en master
	//carga todos los campos necesarios
	function CargaSurMaster(){
		$FaltaSur = $this->ingreso_model->LeftIngresoSur();

		foreach ($FaltaSur as $sur) {
			# code...
			$ExisteRegistro = $this->ingreso_model->ExisteIngreso($sur->folio);

			if($ExisteRegistro==false){
				$GuardaRegistro  = array(
					'in_proyecto' 	      => $sur->folio
					// 'in_sga'              => $sur->p_sga,
					// 'in_ingreso'          => $sur->p_ingreso,
					// 'in_entrega'          => $sur->p_entrega,
					// 'in_cliente'          => $sur->p_cliente,
					// 'in_rut'              => $RutSinGuion,//sur->p_rut,
					// 'in_direccion'        => $sur->p_direccion,
					// 'in_region'           => $sur->p_region,
					// 'in_comuna'           => $sur->p_comuna,
					// 'in_nombre'           => $sur->p_nombre,
					// 'in_fono'             => $sur->p_fono,
					// 'in_plan_net'         => $sur->p_plan_net,
					// 'in_plan_net_adic'    => $sur->p_plan_net_adic,
					// 'in_plan_fono'        => $sur->p_plan_fono,
					// 'in_plan_fono_adic'   => $sur->p_plan_fono_adic,
					// 'in_plan_fono_adict'  => $sur->p_plan_fono_adict,
					// 'in_plan_tv'          => $sur->p_plan_tv,
					// 'in_deco_basico'      => $sur->p_deco_basico,
					// 'in_plan_tv_adic'     => $sur->p_plan_tv_adic,
					// 'in_plan_tv_adict'    => $sur->p_plan_tv_adict,
					// 'in_deco_hd_basico'   => $sur->p_deco_hd_basico,
					// 'in_deco_hd_full'     => $sur->p_deco_hd_full,
					// 'in_plan_tv_pack'     => $sur->p_plan_tv_pack,
					// 'in_central_tf'       => $sur->p_central_tf,
					// 'in_lineas_asignadas' => $sur->p_lineas_asignadas,
					// 'in_fecha_operacion'  => $sur->p_fecha_operacion,
					// 'in_vende'            => $sur->p_vende,
					// 'in_estado'           => $sur->p_estado
				);

				$this->ingreso_model->SaveIngreso($GuardaRegistro);
			}
		}
	}
}