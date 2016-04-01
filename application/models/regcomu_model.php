<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class regcomu_model extends CI_Model {
	function __construct()
     {
          parent::__construct();
          $this->db_siad = $this->load->database('defaultsiad',TRUE);
          $this->db_inf = $this->load->database('defaultinf',TRUE);
     }
	
     public function GetListRegion()
     {
          $sql = "select * from regiones order by id asc";
          $query = $this->db_siad->query($sql);
          return $query->result();
     }

     /*public function GetListComuna()//($idreg)
     {
          //$sql = "select * from regiones order by id asc";
          $this->db_siad->select('id, descripcion');
          $this->db_siad->from('comunas');
          //$this->db_siad->where('region', $idreg);
          $this->db_siad->order_by('descripcion');
          //$query = $this->db->query($sql);
          $query = $this->db_siad->get();
          return $query->result();
     }*/

     /*public function GetListComuna(){
          $this->db_inf->select('region, concat(region," - ",comuna) as comuna');
          $this->db_inf->from('encargados_zona');
          $this->db_inf->order_by('region','comuna');
          $query = $this->db_inf->get();
          return $query->result();
     }*/

     public function GetListComuna(){
          $this->db_siad->select('id as id_comuna, concat(region," - ",descripcion) as comuna');
          $this->db_siad->from('comunas');
          $this->db_siad->order_by('region','descripcion');
          $query = $this->db_siad->get();
          return $query->result();
     }

     public function GetListTrabajo(){
          $this->db->select('tt_id, tt_nombre');
          $this->db->from('tbl_sp_tipo_trabajo');
          $this->db->where('tt_activo',1);
          $this->db->order_by('tt_id');
          $query = $this->db->get();
          return $query->result();
     }

     public function GetListEstado(){
          $this->db->select('est_id, est_descripcion');
          $this->db->from('tbl_sp_estados');
          $this->db->where('est_activo',1);
          $this->db->order_by('est_descripcion');
          $query = $this->db->get();
          return $query->result();
     }
}