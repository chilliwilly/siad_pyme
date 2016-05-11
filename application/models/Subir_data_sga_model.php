<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subir_data_sga_model extends CI_Model {
	function __construct()
     {
          parent::__construct();
     }

    public function InsertSga($datos)
    {       
      $this->db->trans_start();
      $this->db->insert('tbl_sp_data_sga', $datos);
      $this->db->trans_complete();

      return $this->db->affected_rows() > 0;
    }

    public function CleanSga(){
      $this->db->truncate('tbl_sp_data_sga');
    }

    public function InsertData($datos){
      $this->db->trans_start();
      $this->db->insert('tbl_sp_ingreso', $datos);
      $this->db->trans_complete();
    }
}