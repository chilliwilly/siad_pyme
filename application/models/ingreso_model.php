<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ingreso_model extends CI_Model {
	function __construct()
     {
          parent::__construct();
          $this->db_sur = $this->load->database('defaultinf',TRUE);
     }
	

	public function ExisteIngreso($inFolio){

	   $this->db->where('in_proyecto',$inFolio);

	   $check_exists = $this->db->get('tbl_sp_ingreso');

	   if($check_exists->num_rows() == 0){
	       return false;
	   }else{
	       return true;
	   }

	}

	public function SaveIngreso($arrayIngreso)
	{
          $this->db->trans_start();
          $this->db->insert('tbl_sp_ingreso', $arrayIngreso);
          $this->db->trans_complete();
	}

     //update de datos sga que noexistian previamente
     public function UpdateIngreso($arrayIngreso, $folio){
          $this->db->trans_start();
          $this->db->where('in_proyecto', $folio);
          $this->db->update('tbl_sp_ingreso', $arrayIngreso); 
          $this->db->trans_complete();
     }

     public function SaveIngresoDetalle($arrayIngresoDetalle)
     {
          $this->db->trans_start();
          $this->db->insert('tbl_sp_detalle', $arrayIngresoDetalle);
          $this->db->trans_complete();
     }

     public function LeftIngresoSga(){
          $this->db->select('sga_proyecto');
          $this->db->from('tbl_sp_data_sga');
          $this->db->where_not_in('sga_proyecto');
          $query = $this->db->get();
          return $query->result();
     }

     function LeftIngresoSur(){
          $this->db_sur->select('folio');
          $this->db_sur->from('notificacion_hfc');
          $this->db_sur->where_in('tipo_cliente','EMPRESA');
          $query = $this->db_sur->get();
          return $query->result();
     }
}