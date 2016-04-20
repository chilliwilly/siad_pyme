<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Chile/Continental');
class Orden extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Seguridad_model');
		$this->load->model('Orden_model');
		$this->load->model('Login_model');
		$this->load->helper('date');
	}

	public function index(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    $this->Seguridad_model->SessionActivo($url);
	    /**/
	    $this->load->view('constant');
	    $this->load->view('view_header');
	    
	    $ordenes = $this->Orden_model->ListarOrdenesAdmin();

	    $RegistroOrden = array();

	    foreach ($ordenes as $value) {
	    	# code...
	    	$NomAliado = $this->Orden_model->GetNombreAliadoByComuna($value->in_comuna);
	    	$NomTipoTrabajo = $this->Orden_model->GetNombreTipoTrabajo($value->in_tipo_trabajo);
	    	$NomEstadoOrden = $this->Orden_model->GetNombreEstadoOrden($value->in_estado);
	    	$NomComuna = $this->Orden_model->GetIdComunaByNomComuna($value->in_comuna);

	    	$RegistroOrden[] = array(
	    		'folio'         => $value->in_proyecto,
	    		'fecha_ingreso'	=> $value->in_ingreso,
	    		'cliente'	    => $value->in_cliente,
	    		'fono_cli'	    => $value->in_fono,
	    		'reg_comu'	    => sprintf("%02d",$value->in_region).' - '.$NomComuna->descripcion,
	    		'aliado'        => $NomAliado->aliado_nombre,
	    		'tipo_trabajo'	=> $NomTipoTrabajo->tt_nombre,
	    		'estado'        => $NomEstadoOrden->est_descripcion,
	    		'estado_adm'    => $value->in_estado_admin,
	    		'fecha_agenda'  => $value->fecha_agenda
	    	);
	    }

	    $data['regordenes'] = json_encode($RegistroOrden);

	    $this->load->view('ordenes/view_ordenes', $data);
	    $this->load->view('view_footer');
	}

	public function editarIngreso($folio = null){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      	$this->Seguridad_model->SessionActivo($url);
      	$nrofolio = base64_decode($folio);

      	$this->load->view('constant');
		$this->load->view('view_header');
		$data['titulo']    = "Modificacion Datos";
		$data["data_folio"] = $this->Orden_model->GetOrdenByFolio($nrofolio);
		$data['data_flag'] = "1";//para saber si es para update
		//echo json_encode($data);
		$data['data_folio_det'] = json_encode($this->getOrdenDetalleFolio($nrofolio));

		//echo json_encode($data["data_folio"]);
		$this->load->view('ingreso/view_ingreso',$data);
		$this->load->view('view_footer');
	}

	//RETORNA LA LISTA DE TRABAJOS DE ACUERDO A LA EMPRESA DEL USUARIO LOGEADO A EXCEPCION DE LOS ADMIN
	public function aliado(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    $this->Seguridad_model->SessionActivo($url);
	    /**/
	    $this->load->view('constant');
	    $this->load->view('view_header');

	    $siad_aliadoid = $this->session->userdata('ALIADORUT');
	    $ordenes = $this->Orden_model->ListarOrdenesAdmin();
	    $NomEmpresa = $this->Orden_model->GetNombreAliadoById($siad_aliadoid);

	    $RegistroOrden = array();

	    foreach ($ordenes as $value) {
	    	# code...
	    	$NomAliado = $this->Orden_model->GetNombreAliadoByComuna($value->in_comuna);
	    	$NomTipoTrabajo = $this->Orden_model->GetNombreTipoTrabajo($value->in_tipo_trabajo);
	    	$NomEstadoOrden = $this->Orden_model->GetNombreEstadoOrden($value->in_estado);
	    	$NomComuna = $this->Orden_model->GetIdComunaByNomComuna($value->in_comuna);	    	

	    	if($NomAliado == $NomEmpresa){
	    		$RegistroOrden[] = array(
		    		'folio'         => $value->in_proyecto,
		    		'fecha_ingreso'	=> $value->in_ingreso,
		    		'cliente'	    => $value->in_cliente,
		    		'fono_cli'	    => $value->in_fono,
		    		'reg_comu'	    => sprintf("%02d",$value->in_region).' - '.$NomComuna->descripcion,
		    		'aliado'        => $NomAliado->aliado_nombre,
		    		'tipo_trabajo'	=> $NomTipoTrabajo->tt_nombre,
		    		'estado'        => $NomEstadoOrden->est_descripcion,
		    		'estado_adm'    => $value->in_estado_admin,
		    		'fecha_agenda'  => $value->fecha_agenda
		    	);
	    	}	    	
	    }

	    $data['regordenes'] = json_encode($RegistroOrden);

	    $this->load->view('ordenes/view_ordenes', $data);
	    $this->load->view('view_footer');
	}

	public function plataforma(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    $this->Seguridad_model->SessionActivo($url);
	    /**/
	    $this->load->view('constant');
	    $this->load->view('view_header');

	    $ordenes = $this->Orden_model->ListarOrdenesAdmin();

	    $RegistroOrden = array();

	    foreach ($ordenes as $value) {
	    	# code...
	    	if($value->in_tipo_trabajo == 2){
	    		$NomAliado = $this->Orden_model->GetNombreAliadoByComuna($value->in_comuna);
		    	$NomTipoTrabajo = $this->Orden_model->GetNombreTipoTrabajo($value->in_tipo_trabajo);
		    	$NomEstadoOrden = $this->Orden_model->GetNombreEstadoOrden($value->in_estado);
		    	$NomComuna = $this->Orden_model->GetIdComunaByNomComuna($value->in_comuna);

		    	$RegistroOrden[] = array(
		    		'folio'         => $value->in_proyecto,
		    		'fecha_ingreso'	=> $value->in_ingreso,
		    		'cliente'	    => $value->in_cliente,
		    		'fono_cli'	    => $value->in_fono,
		    		'reg_comu'	    => sprintf("%02d",$value->in_region).' - '.$NomComuna->descripcion,
		    		'aliado'        => $NomAliado->aliado_nombre,
		    		'tipo_trabajo'	=> $NomTipoTrabajo->tt_nombre,
		    		'estado'        => $NomEstadoOrden->est_descripcion,
		    		'estado_adm'    => $value->in_estado_admin
		    	);
	    	}	    	
	    }

	    $data['regordenes'] = json_encode($RegistroOrden);

	    $this->load->view('ordenes/view_ordenes', $data);
	    $this->load->view('view_footer');
	}

	public function previewFolio(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    $this->Seguridad_model->SessionActivo($url);
	    
	    $folio = base64_decode($this->input->post('n_folio'));

	    $orden = $this->Orden_model->GetOrdenByFolio($folio);
	    $NomAliado = $this->Orden_model->GetNombreAliadoByComuna($orden->in_comuna);
    	$NomTipoTrabajo = $this->Orden_model->GetNombreTipoTrabajo($orden->in_tipo_trabajo);
    	//$NomEstadoOrden = $this->Orden_model->GetNombreEstadoOrden($orden->in_estado);
    	$NomComuna = $this->Orden_model->GetIdComunaByNomComuna($orden->in_comuna);
    	$Bloque = $this->Orden_model->GetBloqueByIdBloque($orden->reagenda_bloque);

    	$RegistroOrden = array();
    	$RegistroOrden[] = array(
    		'p_in_proyecto'         => $orden->in_proyecto,
			//'p_in_sga'              => $orden->in_sga,
			'p_in_ingreso'          => $orden->in_ingreso,
			'p_in_entrega'          => $orden->reagenda_fecha,
			'p_in_bloque'           => $Bloque->bloque_descripcion,
			'p_in_cliente'          => $orden->in_cliente,
			'p_in_rut'              => substr_replace($orden->in_rut,"-",-1,0),
			'p_in_direccion'        => $orden->in_direccion,			
			'p_in_comuna'           => sprintf("%02d",$orden->in_region).' - '.$NomComuna->descripcion,//$orden->in_comuna,
			'p_in_nombre'           => $orden->in_nombre,
			'p_in_fono'             => $orden->in_fono,
			'p_in_plan_net'         => $orden->in_plan_net,
			'p_in_plan_net_adic'    => $orden->in_plan_net_adic,
			'p_in_plan_fono'        => $orden->in_plan_fono,
			'p_in_plan_fono_adic'   => $orden->in_plan_fono_adic,
			'p_in_plan_fono_adict'  => $orden->in_plan_fono_adict,
			'p_in_plan_tv'          => $orden->in_plan_tv,
			'p_in_deco_basico'      => $orden->in_deco_basico,
			'p_in_plan_tv_adic'     => $orden->in_plan_tv_adic,
			'p_in_plan_tv_adict'    => $orden->in_plan_tv_adict,
			'p_in_deco_hd_basico'   => $orden->in_deco_hd_basico,
			'p_in_deco_hd_full'     => $orden->in_deco_hd_full,
			'p_in_plan_tv_pack'     => $orden->in_plan_tv_pack,
			'p_in_central_tf'       => $orden->in_central_tf,
			'p_in_lineas_asignadas' => $orden->in_lineas_asignadas,
			'p_in_fecha_operacion'  => $orden->in_fecha_operacion,
			'p_in_vende'            => $orden->in_vende,
			'p_in_tipo_trabajo'     => $NomTipoTrabajo->tt_nombre
    	);		

	    $data['preview_folio'] = $RegistroOrden;
	    $data['data_folio_det'] = $this->getOrdenDetalleFolio($folio);
	    
		echo json_encode($data);
	}

	public function CierraAdmin(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];        
        $this->Seguridad_model->SessionActivo($url);

		//$DatosFolio = json_decode($this->input->post('DatoFolio'));

		$datos = 1;//array('in_estado_adm' => '1');
		$datos_folio = base64_decode($this->input->post('DatoFolio'));//base64_decode($DatosFolio->nroOrden);

		$updSuccess = $this->Orden_model->UpdateEstadoAdmOrden($datos_folio, $datos);

		if($updSuccess == false){
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-ok'></span> &nbsp; Error Al Actualizar</div>";
		}else{
			$response["error_msg"]   = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button><span class='glyphicon glyphicon-ok'></span> &nbsp; Folio Cerrado Exitosamente</div>";
		}

		echo json_encode($response);
	}

	function getOrdenDetalleFolio($folio){
		$orden_det = $this->Orden_model->GetOrdenByFolioDet($folio);
		$RegistroOrdenDet = array();

		foreach ($orden_det as $value) {
			# code...
			$NomEstadoOrden = $this->Orden_model->GetNombreEstadoOrden($value->in_estado);
			$DatosUsuario = $this->Orden_model->GetOrderDetUserName($value->indet_usr_registro);

			$RegistroOrdenDet[] = array(
				'fecha_registro' => $value->indet_fecha_registro,
				'user_ingresa'   => $DatosUsuario->nombres.' '.$DatosUsuario->paterno,
				'estado'         => $NomEstadoOrden->est_descripcion,
				'observacion'    => $value->indet_observacion
			);
		}

		return $RegistroOrdenDet;	
	}
}