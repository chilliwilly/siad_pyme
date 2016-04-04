<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class orden_model extends CI_Model {
	function __construct()
	{
	    parent::__construct();
	    $this->db_inf = $this->load->database('defaultinf',TRUE);
	    $this->db_siad = $this->load->database('defaultsiad',TRUE);
	}

	//lista ordenes para admin
	public function ListarOrdenesAdmin(){
		$sql = "select tbl_sp_ingreso.*, in_estado from tbl_sp_ingreso left join tbl_sp_detalle on (tbl_sp_ingreso.in_proyecto = tbl_sp_detalle.in_proyecto) where tbl_sp_detalle.indet_id in (select max(indet_id) from tbl_sp_detalle where tbl_sp_ingreso.in_proyecto = tbl_sp_detalle.in_proyecto)";
	    $query = $this->db->query($sql);

		return $query->result();
	}

	public function GetOrdenByFolio($folio){
		$this->db->where('in_proyecto',$folio);		
	 	return $this->db->get('tbl_sp_ingreso')->row();
	}

	public function GetOrdenByFolioDet($folio){
		$this->db->where('in_proyecto',$folio);
		$this->db->order_by('indet_id','desc');
		$this->db->limit(1);
	 	return $this->db->get('tbl_sp_detalle')->row();
	}

	//obtiene nombre aliado pyme de acuerdo a la comuna
	/*public function GetNombreAliadoByComuna($comu){
		$this->db_inf->where('comuna',$comu);
	 	return $this->db_inf->get('encargados_zona')->row();	
	}*/

	public function GetNombreAliadoByComuna($comu){
		/*$this->db_inf->select('aliado_id_pyme');
		$this->db_inf->from('tbl_aliado_comuna');
		$this->db_inf->where('ac_id_comuna',$comu);
		$subqry =  $this->db_inf->get_compiled_select();*/

		//$sql = "select aliado_nombre from tbl_aliado where aliado_id in (select aliado_id_pyme from tbl_aliado_comuna where ac_id_comuna in (".$comu."))";
		//$sql = "select aliado_nombre from tbl_aliado join tbl_aliado_comuna on (tbl_aliado_comuna.aliado_id = tbl_aliado.aliado_id) where ac_id_comuna in (".$comu.")";
		//$query = $this->db_inf->query($sql);

		//return $query->result();

		/*$this->db_inf->where_in('aliado_id',$subqry,null,false);
		return $this->db_inf->get('tbl_aliado')->row();*/

		$this->db_inf->select('aliado_nombre');
      	$this->db_inf->from('tbl_aliado');
      	$this->db_inf->join('tbl_aliado_comuna','tbl_aliado_comuna.aliado_id = tbl_aliado.aliado_id');
      	$this->db_inf->where('ac_id_comuna',$comu);
      	$query = $this->db_inf->get();
      	return $query->row();
    }

    public function GetNombreAliadoById($idaliado){
    	$this->db->select('inf_despacho_nacional.tbl_aliado.aliado_nombre');
      	$this->db->from('inf_despacho_nacional.tbl_aliado');      	
      	$this->db->where('inf_despacho_nacional.tbl_aliado.aliado_id in (select siad_pyme.tbl_sp_empresa_aliado.aliado_id from siad_pyme.tbl_sp_empresa_aliado where siad_pyme.tbl_sp_empresa_aliado.empresa_id = '.$idaliado.')');
      	$query = $this->db->get();
      	return $query->row();	
    }

	//obtiene comuna de acuerdo al id
	public function GetIdComunaByNomComuna($comu){
		$this->db_siad->where('id',$comu);
	 	return $this->db_siad->get('comunas')->row();
	}

	public function GetNombreTipoTrabajo($idtt){
		$this->db->where('tt_id',$idtt);
	 	return $this->db->get('tbl_sp_tipo_trabajo')->row();
	}

	public function GetNombreEstadoOrden($idest){
		$this->db->where('est_id',$idest);
	 	return $this->db->get('tbl_sp_estados')->row();
	}
}