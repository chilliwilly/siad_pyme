<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Chile/Continental');
class orden extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('seguridad_model');
		$this->load->model('orden_model');		
		$this->load->helper('date');
	}

	public function index(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    $this->seguridad_model->SessionActivo($url);
	    /**/
	    $this->load->view('constant');
	    $this->load->view('view_header');

	    $ordenes = $this->orden_model->ListarOrdenesAdmin();
	    $RegistroOrden = array();

	    foreach ($ordenes as $value) {
	    	# code...
	    	$NomAliado = $this->orden_model->GetNombreAliadoByComuna($value->in_comuna);
	    	$NomTipoTrabajo = $this->orden_model->GetNombreTipoTrabajo($value->in_tipo_trabajo);
	    	$NomEstadoOrden = $this->orden_model->GetNombreEstadoOrden($value->in_estado);
	    	$NomComuna = $this->orden_model->GetIdComunaByNomComuna($value->in_comuna);

	    	$RegistroOrden[] = array(
	    		'folio'         => $value->in_proyecto,
	    		'fecha_ingreso'	=> $value->in_ingreso,
	    		'cliente'	    => $value->in_cliente,
	    		'fono_cli'	    => $value->in_fono,
	    		'reg_comu'	    => sprintf("%02d",$value->in_region).' - '.$NomComuna->descripcion,
	    		'aliado'        => $NomAliado->aliado_nombre,
	    		'tipo_trabajo'	=> $NomTipoTrabajo->tt_nombre,
	    		'estado'        => $NomEstadoOrden->est_descripcion
	    	);
	    }

	    $data['regordenes'] = json_encode($RegistroOrden);

	    $this->load->view('ordenes/view_ordenes', $data);
	    $this->load->view('view_footer');
	}

	public function editarIngreso($folio = null){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      	$this->seguridad_model->SessionActivo($url);
      	$nrofolio = base64_decode($folio);

      	$this->load->view('constant');
		$this->load->view('view_header');
		$data['titulo']    = "Modificacion Datos";
		$data["data_folio"] = $this->orden_model->GetOrdenByFolio($nrofolio);
		$data["data_folio_det"] = $this->orden_model->GetOrdenByFolioDet($nrofolio);
		//echo json_encode($data);
		$this->load->view('ingreso/view_ingreso',$data);
		$this->load->view('view_footer');
	}
}