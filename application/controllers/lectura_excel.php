<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Chile/Continental');
class lectura_excel extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('seguridad_model');
		$this->load->helper('date');
		$this->load->helper('file');
	}

	

}