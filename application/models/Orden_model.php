<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orden_model extends CI_Model {
	function __construct()
	{
	    parent::__construct();
	    $this->db_inf = $this->load->database('defaultinf',TRUE);
	    $this->db_siad = $this->load->database('defaultsiad',TRUE);
	}

	//lista ordenes para admin
	public function ListarOrdenesAdmin(){
		$sql = "select tbl_sp_ingreso.*,
						in_estado,
						(select reagenda_fecha from tbl_sp_reagenda where reagenda_id = (select max(reagenda_id) from tbl_sp_reagenda where in_proyecto = tbl_sp_ingreso.in_proyecto)) as fecha_agenda,
						plan_alta,
						tt_nombre,
						rt_descripcion,
						vt_descripcion,
						tfa_descripcion,
						tcv_nombre,
						(select concat(SIAD.usuarios.nombres,' ',SIAD.usuarios.paterno,' ',SIAD.usuarios.materno) from SIAD.usuarios where SIAD.usuarios.id = indet_usr_registro) as nombre_ingresador
						from tbl_sp_ingreso left join tbl_sp_detalle on (tbl_sp_ingreso.in_proyecto = tbl_sp_detalle.in_proyecto)
						left join tbl_sp_planes on (tbl_sp_ingreso.plan_id = tbl_sp_planes.plan_id)
						left join tbl_sp_tipo_trabajo on (tbl_sp_ingreso.tt_id = tbl_sp_tipo_trabajo.tt_id)
						left join tbl_sp_reparacion_tipo on (tbl_sp_ingreso.rt_id = tbl_sp_reparacion_tipo.rt_id)
						left join tbl_sp_cierre_vt on (tbl_sp_cierre_vt.vt_id = tbl_sp_ingreso.vt_codigo)
						left join tbl_sp_tipo_falla on (tbl_sp_tipo_falla.tfa_id = tbl_sp_ingreso.tfa_id)
						left join tbl_sp_tipo_canal_venta on (tbl_sp_tipo_canal_venta.tcv_id = tbl_sp_ingreso.tcv_id)
						where tbl_sp_detalle.indet_fecha_registro in (select max(indet_fecha_registro) from tbl_sp_detalle where tbl_sp_ingreso.in_proyecto = tbl_sp_detalle.in_proyecto)
						order by (select reagenda_fecha from tbl_sp_reagenda where reagenda_id = (select max(reagenda_id) from tbl_sp_reagenda where in_proyecto = tbl_sp_ingreso.in_proyecto))";
	    $query = $this->db->query($sql);

		return $query->result();
	}

	//lista ordenes liquidadas
	public function ListarOrdenesAdminLiquida(){
		$sql = "select tbl_sp_ingreso.*,
						in_estado,
						(select reagenda_fecha from tbl_sp_reagenda where reagenda_id = (select max(reagenda_id) from tbl_sp_reagenda where in_proyecto = tbl_sp_ingreso.in_proyecto)) as fecha_agenda,
						plan_alta,
						tt_nombre,
						rt_descripcion,
						vt_descripcion,
						tfa_descripcion,
						tcv_nombre,
						(select concat(SIAD.usuarios.nombres,' ',SIAD.usuarios.paterno,' ',SIAD.usuarios.materno) from SIAD.usuarios where SIAD.usuarios.id = indet_usr_registro) as nombre_ingresador
						from tbl_sp_ingreso left join tbl_sp_detalle on (tbl_sp_ingreso.in_proyecto = tbl_sp_detalle.in_proyecto)
						left join tbl_sp_planes on (tbl_sp_ingreso.plan_id = tbl_sp_planes.plan_id)
						left join tbl_sp_tipo_trabajo on (tbl_sp_ingreso.tt_id = tbl_sp_tipo_trabajo.tt_id)
						left join tbl_sp_reparacion_tipo on (tbl_sp_ingreso.rt_id = tbl_sp_reparacion_tipo.rt_id)
						left join tbl_sp_cierre_vt on (tbl_sp_cierre_vt.vt_id = tbl_sp_ingreso.vt_codigo)
						left join tbl_sp_tipo_falla on (tbl_sp_tipo_falla.tfa_id = tbl_sp_ingreso.tfa_id)
						left join tbl_sp_tipo_canal_venta on (tbl_sp_tipo_canal_venta.tcv_id = tbl_sp_ingreso.tcv_id)
						where tbl_sp_detalle.indet_fecha_registro in (select max(indet_fecha_registro) from tbl_sp_detalle where tbl_sp_ingreso.in_proyecto = tbl_sp_detalle.in_proyecto)
						order by (select reagenda_fecha from tbl_sp_reagenda where reagenda_id = (select max(reagenda_id) from tbl_sp_reagenda where in_proyecto = tbl_sp_ingreso.in_proyecto))";
    $query = $this->db->query($sql);

		return $query->result();
	}

	public function GetOrdenByFolio($folio){
		/*$this->db->where('in_proyecto',$folio);
	 	return $this->db->get('tbl_sp_ingreso')->row();*/

	 	$this->db->select('tbl_sp_ingreso.*, tbl_sp_reagenda.reagenda_fecha, tbl_sp_reagenda.reagenda_bloque');
	 	$this->db->from('tbl_sp_ingreso');
	 	$this->db->join('tbl_sp_reagenda','tbl_sp_reagenda.in_proyecto = tbl_sp_ingreso.in_proyecto','left');
	 	$this->db->where('tbl_sp_ingreso.in_proyecto',$folio);
	 	$this->db->order_by('tbl_sp_reagenda.reagenda_id','desc');
	 	$this->db->limit(1);
	 	$query = $this->db->get();
      	return $query->row();
	}

	public function GetOrdenByFolioDet($folio){
		$this->db->where('in_proyecto',$folio);
		$this->db->order_by('indet_fecha_registro','desc');
		//$this->db->limit(1);
	 	return $this->db->get('tbl_sp_detalle')->result();
	}

	public function GetOrdenByFolioDeco($folio){
		$this->db->where('in_proyecto',$folio);
	 	return $this->db->get('tbl_sp_deco_adicional')->row();
	}

	public function GetAgendaByFolio($folio){
		/*$this->db->where('in_proyecto',$folio);
		$this->db->order_by('reagenda_id','desc');
	 	return $this->db->get('tbl_sp_reagenda')->result();*/

	 	$this->db->select('reagenda_fecha, bloque_descripcion, reagenda_modificacion, reagenda_bloque, concat(nombres," ",paterno) as reagenda_usr_registro');
	 	$this->db->from('tbl_sp_reagenda');
	 	$this->db->join('SIAD.usuarios','SIAD.usuarios.id = reagenda_usr_registro','left');
	 	$this->db->join('tbl_sp_bloques','bloque_id = reagenda_bloque','left');
	 	$this->db->where('in_proyecto',$folio);
	 	$this->db->order_by('reagenda_id','desc');
	 	$query = $this->db->get();

      	return $query->result();
	}
	/*public function GetOrdenByFolioDetFirst($folio){
		$this->db->where('in_proyecto',$folio);
		$this->db->order_by('indet_fecha_registro','desc');
		$this->db->limit(1);
	 	return $this->db->get('tbl_sp_detalle')->result();
	}*/

	//obtiene nombre aliado pyme de acuerdo a la comuna
	/*public function GetNombreAliadoByComuna($comu){
		$this->db_inf->where('comuna',$comu);
	 	return $this->db_inf->get('encargados_zona')->row();
	}*/
	public function GetCentralByFolio($folio){
		$this->db->where('in_proyecto',$folio);
	 	return $this->db->get('tbl_sp_detalle_central')->row();
	}

	public function GetFonoByFolio($folio){
		$this->db->where('in_proyecto',$folio);
	 	return $this->db->get('tbl_sp_fono_orden')->result();
	}

	public function GetNombreAliadoByComuna($comu){
		$this->db_inf->select('aliado_nombre, tbl_aliado.aliado_id');
      	$this->db_inf->from('tbl_aliado');
      	$this->db_inf->join('tbl_aliado_comuna','tbl_aliado_comuna.aliado_id_pyme = tbl_aliado.aliado_id');
      	$this->db_inf->where('ac_id_comuna',$comu);
      	$query = $this->db_inf->get();
      	return $query->row();
    }

    public function GetNombreAliadoById($idaliado){
    	$this->db->select('inf_despacho_nacional.tbl_aliado.aliado_nombre, inf_despacho_nacional.tbl_aliado.aliado_id');
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

	public function GetOrderByFolioPreview($folio){
		$sql = "select * from tbl_sp_ingreso where in_proyecto = ?";
	  $query = $this->db->query($sql,$folio);

		return $query->result();
	}

	public function GetOrderDetUserName($usrid){
		$this->db_siad->where('id',$usrid);
		return $this->db_siad->get('usuarios')->row();
	}

	public function GetBloqueByIdBloque($bloque){
		$this->db->where('bloque_id',$bloque);
		return $this->db->get('tbl_sp_bloques')->row();
	}

	public function GetPlanByIdPlan($plan){
		$this->db->where('plan_id',$plan);
		return $this->db->get('tbl_sp_planes')->row();
	}

	public function GetLastEstadoIdDetByFolio($folio){
		$sql = "select in_estado from tbl_sp_detalle where in_proyecto = ? and indet_id = (select max(indet_id) from tbl_sp_detalle where in_proyecto = ?)";
		$query = $this->db->query($sql,array($folio,$folio));

		return $query->result();
	}

	public function UpdateEstadoAdmOrden($folio,$data){
		$this->db->trans_start();
		$this->db->set('in_estado_admin',$data);
		$this->db->where('in_proyecto',$folio);
		$this->db->update('tbl_sp_ingreso');
		$this->db->trans_complete();

		if($this->db->trans_status() === false){
			return false;
		}else{
			return true;
		}
	}
}
