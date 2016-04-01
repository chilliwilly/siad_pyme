<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Chile/Continental');
class subir_data_sga extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('seguridad_model');
		$this->load->model('subir_data_sga_model');
		$this->load->library('upload');
		//$this->load->library('PHPExcel.php');
		$this->load->library('PHPExcel/IOFactory');
		//$this->load->library('application/libraries/PHPExcel/IOFactory.php');
		//$this->load->library('excel');
		$this->load->helper('date');
		$this->load->helper('file');
	}

	public function index(){
          $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          $this->seguridad_model->SessionActivo($url);
          /**/
          //$data = array('msg' => "Favor seleccione archivo a subir...");    
    	  //$data['upload_data'] = '';
          //$data['names'] = '';

          $this->load->view('constant');
          $this->load->view('view_header');
          $this->load->view('subir_data/view_subir_sga');//,$data);
          $this->load->view('view_footer');          
	}

	//sube el archivo excel de sga
	function subir_sga() {
		//carga el helper
		$this->load->helper('form');
		$this->borrar_sga();
		//Configure
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = 'application/views/uploads/';
		
	    //set de extension de archivos
		$config['allowed_types'] = 'xls|xlsx|xlsb';
		
		//carga la libreria upload
		$this->load->library('upload', $config);    
	    $this->upload->initialize($config);	    
	    $this->upload->set_allowed_types('*');
	    
		//$data['upload_data'] = '';
    
		//if not successful, set the error message
		if (!$this->upload->do_upload('userfile')) {
			$data = array('msg' => $this->upload->display_errors());

		} else { //else, set the success message
			$data = array('msg' => "Subida Exitosa!");      
      		$data['upload_data'] = $this->upload->data();
      		//$this->read_sga();
		}

		//$data['names'] = '';
		//carga nuevamente la vista de subida
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $this->seguridad_model->SessionActivo($url);
        $this->load->view('constant');
        $this->load->view('view_header');
		$this->load->view('subir_data/view_subir_sga');//, $data);
		$this->load->view('view_footer');
		
	}

	//borra el archivo excel sga
	function borrar_sga(){
		delete_files('application/views/uploads/');
	}

	//inserta datos utilizados
	function insert_actual(){
		$filename = get_filenames('application/views/uploads/')[0];
		$names=array();
	    $no=0;
	    $inputFileType = 'Excel5';
	    $objReader = IOFactory::createReader($inputFileType);
	    $objPHPExcel  = $objReader->load(FCPATH.'application/views/uploads/Libro2.xls');//FCPATH.
	    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
	    $maxRow = $objWorksheet->getHighestRow();
	    
	    //$this->subir_data_sga_model->CleanSga();

	    for ($i = 2; $i <= 2; $i++)//$i=14; $i<=$maxRow; $i++
	    {
	        //$names[$no] = $objWorksheet->getCell('A'.$i)->getValue();
	        //$no++;
	        $GuardaRegistro = array(
				'in_proyecto'		  => $objWorksheet->getCell('A'.$i)->getValue(),
				'in_sga'			  => PHPExcel_Shared_Date::ExcelToPHPObject($objWorksheet->getCell('B'.$i)->getValue())->format('Y-m-d'),//date('Y-m-j',strtotime($objWorksheet->getCell('B'.$i)->getValue())),
				'in_ingreso'		  => PHPExcel_Shared_Date::ExcelToPHPObject($objWorksheet->getCell('C'.$i)->getValue())->format('Y-m-d'),//date('Y-m-j',strtotime($objWorksheet->getCell('C'.$i)->getValue())),
				'in_entrega'		  => PHPExcel_Shared_Date::ExcelToPHPObject($objWorksheet->getCell('D'.$i)->getValue())->format('Y-m-d'),//date('Y-m-j',strtotime($objWorksheet->getCell('D'.$i)->getValue())),
				'in_cliente'		  => $objWorksheet->getCell('E'.$i)->getValue(),
				'in_rut'			  => str_replace("-", "", $objWorksheet->getCell('F'.$i)->getValue()),
				'in_direccion'		  => $objWorksheet->getCell('G'.$i)->getValue(),
				'in_region'			  => $objWorksheet->getCell('H'.$i)->getValue(),
				'in_comuna'		 	  => $objWorksheet->getCell('I'.$i)->getValue(),
				'in_nombre'	 		  => $objWorksheet->getCell('J'.$i)->getValue(),
				'in_fono'	 		  => $objWorksheet->getCell('K'.$i)->getValue(),
				'in_plan_net'		  => $objWorksheet->getCell('L'.$i)->getValue(),
				'in_plan_net_adic'	  => $objWorksheet->getCell('M'.$i)->getValue(),
				'in_plan_fono'		  => $objWorksheet->getCell('N'.$i)->getValue(),
				'in_plan_fono_adic'	  => $objWorksheet->getCell('O'.$i)->getValue(),
				'in_plan_fono_adict'  => $objWorksheet->getCell('P'.$i)->getValue(),
				'in_plan_tv'		  => $objWorksheet->getCell('Q'.$i)->getValue(),
				'in_deco_basico'	  => $objWorksheet->getCell('R'.$i)->getValue(),
				'in_plan_tv_adic'	  => $objWorksheet->getCell('S'.$i)->getValue(),
				'in_plan_tv_adict'	  => $objWorksheet->getCell('T'.$i)->getValue(),
				'in_deco_hd_basico'	  => $objWorksheet->getCell('U'.$i)->getValue(),
				'in_deco_hd_full'	  => $objWorksheet->getCell('V'.$i)->getValue(),
				'in_plan_tv_pack'	  => $objWorksheet->getCell('W'.$i)->getValue(),
				'in_central_tf'	 	  => $objWorksheet->getCell('X'.$i)->getValue(),
				'in_lineas_asignadas' => $objWorksheet->getCell('Y'.$i)->getValue(),
				'in_fecha_operacion'  => PHPExcel_Shared_Date::ExcelToPHPObject($objWorksheet->getCell('Z'.$i)->getValue())->format('Y-m-d'),//date('Y-m-j',strtotime($objWorksheet->getCell('Z'.$i)->getValue())),
				'in_vende'	 		  => $objWorksheet->getCell('AA'.$i)->getValue(),
				'in_estado'	 		  => $objWorksheet->getCell('AB'.$i)->getValue()
				// 'sga_fechareevaluauno'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('AC'.$i)->getValue())),
				// 'sga_tipoeds'			 => $objWorksheet->getCell('AD'.$i)->getValue(),
				// 'sga_eds'				 => $objWorksheet->getCell('AE'.$i)->getValue(),
				// 'sga_observacion'		 => $objWorksheet->getCell('AF'.$i)->getValue(),
				// 'sga_segmentobjetivo'    => $objWorksheet->getCell('AG'.$i)->getValue(),
				// 'sga_tiempointerrupcion' => str_replace(',', '.', $objWorksheet->getCell('AH'.$i)->getValue()),
				// 'sga_campana'			 => $objWorksheet->getCell('AI'.$i)->getValue(),
				// 'sga_categoria'			 => $objWorksheet->getCell('AJ'.$i)->getValue(),
				// 'sga_rutcliente'		 => $objWorksheet->getCell('AK'.$i)->getValue(),
				// 'sga_diagnostico'		 => $objWorksheet->getCell('AL'.$i)->getValue(),
				// 'sga_problema'			 => $objWorksheet->getCell('AM'.$i)->getValue(),
				// 'sga_ppp'				 => str_replace(',', '.', $objWorksheet->getCell('AN'.$i)->getValue()),
				// 'sga_usuejecutor'		 => $objWorksheet->getCell('AO'.$i)->getValue()
			);
			//echo date('Y-m-j H:i:s',strtotime($GuardaRegistro['sga_fechaprobacion'])).'<br>';
			//echo $GuardaRegistro['sga_cliente'].'<br>';
			echo json_encode($GuardaRegistro);
			//$this->subir_data_sga_model->InsertData($GuardaRegistro);
	    }
	}

	//inserta datos del sga a la tabla truncandola antes
	function insert_sga(){
		$filename = get_filenames('application/views/uploads/')[0];
		$names=array();
	    $no=0;
	    $inputFileType = 'Excel5';
	    $objReader = IOFactory::createReader($inputFileType);
	    $objPHPExcel  = $objReader->load(FCPATH.'application/views/uploads/'.$filename);//FCPATH.
	    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
	    $maxRow = $objWorksheet->getHighestRow();
	    
	    $this->subir_data_sga_model->CleanSga();

	    for ($i = 2; $i <= $maxRow; $i++)//$i=14; $i<=$maxRow; $i++
	    {
	        //$names[$no] = $objWorksheet->getCell('A'.$i)->getValue();
	        //$no++;
	        $GuardaRegistro = array(
				'sga_cliente'			 => $objWorksheet->getCell('A'.$i)->getValue(),
				'sga_proyecto'			 => $objWorksheet->getCell('B'.$i)->getValue(),
				'sga_solot'				 => $objWorksheet->getCell('C'.$i)->getValue(),
				'sga_nroincidencia'		 => $objWorksheet->getCell('D'.$i)->getValue(),
				'sga_tiposolot'			 => $objWorksheet->getCell('E'.$i)->getValue(),
				'sga_estadosot'			 => $objWorksheet->getCell('F'.$i)->getValue(),
				'sga_motivo'			 => $objWorksheet->getCell('G'.$i)->getValue(),
				'sga_servicio'			 => $objWorksheet->getCell('H'.$i)->getValue(),
				'sga_fechainicio'		 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('I'.$i)->getValue())),
				'sga_fechacompromiso'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('J'.$i)->getValue())),
				'sga_fechaprobacion'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('K'.$i)->getValue())),
				'sga_fechafin'			 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('L'.$i)->getValue())),
				'sga_fechageneracion'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('M'.$i)->getValue())),
				'sga_generadopor'		 => $objWorksheet->getCell('N'.$i)->getValue(),
				'sga_areasolicitante'	 => $objWorksheet->getCell('O'.$i)->getValue(),
				'sga_ingeresponsable'	 => $objWorksheet->getCell('P'.$i)->getValue(),
				'sga_areasignada'		 => $objWorksheet->getCell('Q'.$i)->getValue(),
				'sga_usuarioasignada'	 => $objWorksheet->getCell('R'.$i)->getValue(),
				'sga_prioridad'			 => $objWorksheet->getCell('S'.$i)->getValue(),
				'sga_ctaproyecto'		 => $objWorksheet->getCell('T'.$i)->getValue(),
				'sga_direccion'			 => $objWorksheet->getCell('U'.$i)->getValue(),
				'sga_nroservicio'		 => $objWorksheet->getCell('V'.$i)->getValue(),
				'sga_fechaprogfin'		 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('W'.$i)->getValue())),
				'sga_fecharealizacion'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('X'.$i)->getValue())),
				'sga_fechaejecutauno'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('Y'.$i)->getValue())),
				'sga_fechabortauno'		 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('Z'.$i)->getValue())),
				'sga_fechaeliminauno'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('AA'.$i)->getValue())),
				'sga_fechacierrauno'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('AB'.$i)->getValue())),
				'sga_fechareevaluauno'	 => date('Y-m-j H:i:s',strtotime($objWorksheet->getCell('AC'.$i)->getValue())),
				'sga_tipoeds'			 => $objWorksheet->getCell('AD'.$i)->getValue(),
				'sga_eds'				 => $objWorksheet->getCell('AE'.$i)->getValue(),
				'sga_observacion'		 => $objWorksheet->getCell('AF'.$i)->getValue(),
				'sga_segmentobjetivo'    => $objWorksheet->getCell('AG'.$i)->getValue(),
				'sga_tiempointerrupcion' => str_replace(',', '.', $objWorksheet->getCell('AH'.$i)->getValue()),
				'sga_campana'			 => $objWorksheet->getCell('AI'.$i)->getValue(),
				'sga_categoria'			 => $objWorksheet->getCell('AJ'.$i)->getValue(),
				'sga_rutcliente'		 => $objWorksheet->getCell('AK'.$i)->getValue(),
				'sga_diagnostico'		 => $objWorksheet->getCell('AL'.$i)->getValue(),
				'sga_problema'			 => $objWorksheet->getCell('AM'.$i)->getValue(),
				'sga_ppp'				 => str_replace(',', '.', $objWorksheet->getCell('AN'.$i)->getValue()),
				'sga_usuejecutor'		 => $objWorksheet->getCell('AO'.$i)->getValue()
			);
			//echo date('Y-m-j H:i:s',strtotime($GuardaRegistro['sga_fechaprobacion'])).'<br>';
			//echo $GuardaRegistro['sga_cliente'].'<br>';
			//echo json_encode($GuardaRegistro);
			$this->subir_data_sga_model->InsertSga($GuardaRegistro);
	    }

	    //$data['names'] = $names;
	    //$data['no'] = $no;

	    //borrar esta parte y mover esta funcion a subir_sga
	    $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $this->seguridad_model->SessionActivo($url);
        $this->load->view('constant');
        $this->load->view('view_header');
		$this->load->view('subir_data/view_subir_sga');//, $data);
		$this->load->view('view_footer');
	}
}