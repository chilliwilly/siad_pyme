<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Regcomu_model extends CI_Model {
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
      $this->db->order_by('tt_nombre');
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

    public function GetListaBloques(){
      $this->db->select('bloque_id, bloque_descripcion');
      $this->db->from('tbl_sp_bloques');
      $this->db->order_by('bloque_id');
      $query = $this->db->get();
      return $query->result();
    }

    public function GetListaDecos(){
      $this->db->select('deco_id, deco_nombre');
      $this->db->from('tbl_sp_decodificador');
      $this->db->where('deco_estado',1);
      $this->db->order_by('deco_nombre');
      $query = $this->db->get();
      return $query->result();
    }

    public function GetListaPlanes(){
      $this->db->select('plan_id, upper(plan_alta) as plan_alta');
      $this->db->from('tbl_sp_planes');
      $this->db->order_by('plan_alta');
      $query = $this->db->get();
      return $query->result();
    }

    public function GetListaCentral(){
      $this->db->select('ctf_id, concat(ctf_descripcion," | L-",ctf_linea_min," a ",ctf_linea_max," | A-",ctf_anexo_min," a ",ctf_anexo_max) as ctf_descripcion',false);
      $this->db->from('tbl_sp_centraltf');
      $this->db->order_by('ctf_descripcion');
      //$sql = "select ctf_id, concat(ctf_descripcion,' | L-',ctf_linea_min,' a ',ctf_linea_max,' | A-',ctf_anexo_min,' a ',ctf_anexo_max) from tbl_sp_centraltf";
      //$query = $this->db->get($sql);
      $query = $this->db->get();
      return $query->result();
    }

    public function GetListaReparacionTipo(){
      $this->db->select('rt_id, rt_descripcion');
      $this->db->from('tbl_sp_reparacion_tipo');
      $this->db->where('rt_estado',1);
      $this->db->order_by('rt_id');
      $query = $this->db->get();
      return $query->result();
    }

	  public function GetListaCodigCierre(){
      $this->db->select('vt_codigo, concat(vt_codigo," - ",vt_descripcion) as vt_descripcion');
      $this->db->from('tbl_sp_cierre_vt');
      $this->db->where('vt_estado',1);
      $this->db->order_by('vt_id');
      $query = $this->db->get();
      return $query->result();
	  }

		public function GetListaTipoFalla(){
			$this->db->select('tfa_id, upper(tfa_descripcion) tfa_descripcion');
			$this->db->from('tbl_sp_tipo_falla');
			$this->db->where('tfa_estado',1);
			$this->db->order_by('tfa_descripcion');
			$query = $this->db->get();
			return $query->result();
		}
}
