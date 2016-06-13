<input type="hidden" name="id_trabajo" id="id_trabajo" value="<?php echo @$data_folio->tt_id; ?>">
<input type="hidden" name="id_comuna" id="id_comuna" value="<?php echo @$data_folio->id_comuna; ?>">
<input type="hidden" name="id_bloque" id="id_bloque" value="<?php echo @$data_folio->reagenda_bloque; ?>">
<input type="hidden" name="id_admin" id="id_admin" value="<?php echo @$data_folio->in_estado_admin; ?>">
<input type="hidden" name="id_plan" id="id_plan" value="<?php echo @$data_folio->plan_id; ?>">
<input type="hidden" name="id_deco" id="id_deco" value="<?php echo @$data_folio->deco_id; ?>">
<input type="hidden" name="id_central" id="id_central" value="<?php echo @$data_folio_central->ctf_id; ?>">
<input type="hidden" name="id_tiporep" id="id_tiporep" value="<?php echo @$data_folio->rt_id; ?>">
<input type="hidden" name="id_codirep" id="id_codirep" value="<?php echo @$data_folio->vt_codigo; ?>">
<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $this->session->userdata('TIPOUSUARIO'); ?>">
<input type="hidden" name="id_falla" id="id_falla" value="<?php echo @$data_folio->tfa_id; ?>">
<input type="hidden" name="id_canal" id="id_canal" value="<?php echo @$data_folio->tcv_id; ?>">
<!--<input type="hidden" name="id_estado" id="id_estado" value="<?php echo @$data_folio_det->in_estado; ?>">-->

<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
  var v_deco_sd = "0";
  var v_deco_hd = "0";
  var v_deco_tvr = "0";
  var v_deco_stnd = "0";
  var v_deco_stnd_hd = "0";
  var num_trabajo = 0;
  var num_comuna = 0;
  var num_estado = 9;
  var num_bloque = 0;
  var num_plan = "0";
  var num_deco = 0;
  var num_ctf = 0;
  var num_tiporep = 0;
  var num_codrep = "0";
  var num_central = 0;
  var num_falla = 0;
  var num_canal = 0;
  var numtrab = document.getElementById("id_trabajo").value;
  numtrab = parseInt(numtrab.length);

  if(numtrab == 0){
    num_trabajo = 0;
    num_comuna = 0;
    //num_estado = 0;
    num_bloque = 0;
    num_plan = "0";
    num_deco = 0;
    num_ctf = 0;
    num_tiporep = 0;
    num_codrep = "0";
    num_central = 0;
    num_falla = 0;
    num_canal = 0;
  }else{
    num_trabajo = document.getElementById("id_trabajo").value;
    num_comuna = document.getElementById("id_comuna").value;
    num_estado = 0;
    num_bloque = document.getElementById("id_bloque").value;
    num_plan = document.getElementById("id_plan").value;
    num_deco = document.getElementById("id_deco").value;
    num_tiporep = document.getElementById("id_tiporep").value;
    num_codrep = document.getElementById("id_codirep").value;
    num_central = document.getElementById("id_central").value;//"<?php echo @$data_folio_central->ctf_id; ?>";
    num_falla = document.getElementById("id_falla").value;
    num_canal = document.getElementById("id_canal").value;
    v_deco_sd = "<?php echo @$data_folio_deco->decoa_sd; ?>";
    v_deco_hd = "<?php echo @$data_folio_deco->decoa_hd; ?>";
    v_deco_tvr = "<?php echo @$data_folio_deco->decoa_tvr; ?>";
    v_deco_stnd = "<?php echo @$data_folio_deco->decoa_stnd; ?>";
    v_deco_stnd_hd = "<?php echo @$data_folio_deco->decoa_stnd_hd; ?>";
  }

  function volverAdmin(){
    window.location=baseurl+"orden";
  }

  function volverAliado(){
    window.location=baseurl+"orden/aliado";
  }
</script>

<?php
  //in_proyecto
  $nproy = "";

  if(@$n_folio != null){
    $nproy = @$n_folio;
  }elseif(@$data_folio->in_proyecto != null){
    $nproy = @$data_folio->in_proyecto;
  }else{
    $nproy = "";
  }

  $in_proyecto = array(
  'name'        => 'in_proyecto',
  'id'          => 'in_proyecto',
  'size'        => 20,
  'maxlength'   => 20,
  'value'       => set_value('in_proyecto',$nproy),//if($n_folio != null){ set_value('in_proyecto',$n_folio); }else{ set_value('in_proyecto',''); },//set_value('in_proyecto',@$data_folio->codigo),
  'type'        => 'number',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese nro proyecto',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_ingreso
  $in_ingreso = array(
  'name'        => 'in_ingreso',
  'id'          => 'in_ingreso',
  'value'       => set_value('in_ingreso',@$data_folio->in_ingreso),
  'type'        => 'date',
  'class'       => 'form-control',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_entrega
  $in_entrega = array(
  'name'        => 'in_entrega',
  'id'          => 'in_entrega',
  'value'       => set_value('in_entrega',@$data_folio->reagenda_fecha),//in_entrega
  'type'        => 'date',
  'class'       => 'form-control',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_cliente
  $in_cliente = array(
  'name'        => 'in_cliente',
  'id'          => 'in_cliente',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_cliente),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese cliente',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_rut
  $in_rut = array(
  'name'        => 'in_rut',
  'id'          => 'in_rut',
  'size'        => 10,
  'maxlength'   => 10,
  'value'       => set_value('codigo',substr_replace(@$data_folio->in_rut,"-",-1,0)),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese rut 12345678-9',
  'style' => 'width:180px; text-align:center;',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_direccion
  $in_direccion = array(
  'name'        => 'in_direccion',
  'id'          => 'in_direccion',
  'size'        => 100,
  'maxlength'   => 200,
  'value'       => set_value('codigo',@$data_folio->in_direccion),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese nombre',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_direccion_nueva
  $in_direccion_nueva = array(
  'name'        => 'in_direccion_nueva',
  'id'          => 'in_direccion_nueva',
  'size'        => 100,
  'maxlength'   => 200,
  'value'       => set_value('codigo',@$data_folio->in_direccion_t),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese direccion',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_nombre
  $in_nombre = array(
  'name'        => 'in_nombre',
  'id'          => 'in_nombre',
  'size'        => 100,
  'maxlength'   => 150,
  'value'       => set_value('codigo',@$data_folio->in_nombre),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese nombre',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_net_adic
  $in_plan_net_adic = array(
  'name'        => 'in_plan_net_adic',
  'id'          => 'in_plan_net_adic',
  'size'        => 50,
  'maxlength'   => 5,
  'value'       => set_value('codigo',@$data_folio->in_plan_net_adic),
  'type'        => 'number',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan internet adic',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_fono_adic
  $in_plan_fono_adic = array(
  'name'        => 'in_plan_fono_adic',
  'id'          => 'in_plan_fono_adic',
  'size'        => 30,
  'maxlength'   => 5,
  'value'       => set_value('codigo',@$data_folio->in_plan_fono_adicu),
  'type'        => 'number',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese lineas',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_fono_adict
  $in_plan_fono_adict = array(
  'name'        => 'in_plan_fono_adict',
  'id'          => 'in_plan_fono_adict',
  'size'        => 50,
  'maxlength'   => 5,
  'value'       => set_value('codigo',@$data_folio->in_plan_fono_adicd),
  'type'        => 'number',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese extensiones',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_tv_pack
  $in_plan_tv_pack = array(
  'name'        => 'in_plan_tv_pack',
  'id'          => 'in_plan_tv_pack',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_pack),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese pack tv plan',
  //'onkeypress'  => 'return letras(event)',
  );

  $in_central_tfl = array(
  'name'        => 'in_central_tfl',
  'id'          => 'in_central_tfl',
  'value'       => set_value('codigo',@$data_folio_central->dqty_linea),
  'type'        => 'number',
  'class'       => 'form-control',
  );

  $in_central_tfa = array(
  'name'        => 'in_central_tfa',
  'id'          => 'in_central_tfa',
  'value'       => set_value('codigo',@$data_folio_central->dqty_anexo),
  'type'        => 'number',
  'class'       => 'form-control',
  );

  $in_central_tflp = array(
  'name'        => 'in_central_tflp',
  'id'          => 'in_central_tflp',
  'value'       => set_value('codigo',@$data_folio_central->dqty_linea_prev),
  'type'        => 'number',
  'class'       => 'form-control',
  );

  $in_central_tfap = array(
  'name'        => 'in_central_tfap',
  'id'          => 'in_central_tfap',
  'value'       => set_value('codigo',@$data_folio_central->dqty_anexo_prev),
  'type'        => 'number',
  'class'       => 'form-control',
  );

  //indet_observacion
  $indet_observacion = array(
  'name'        => 'indet_observacion',
  'id'          => 'indet_observacion',
  'size'        => 100,
  //'maxlength'   => 500,
  //'value'       => set_value('indet_observacion',@$data_folio_det->indet_observacion),
  //'type'        => 'text',
  'rows'        => '3',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese observacion',
  //'onkeypress'  => 'return letras(event)',
  );

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-select.min.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>lib/sweet-alert.css"/>
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url()?>js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url()?>lib/sweet-alert.js"></script>
<script src="<?php echo base_url();?>js/jsLoadSelectIngreso.js"></script>
<script src="<?php echo base_url();?>js/jsDistribucionPlan.js"></script>
<script src="<?php echo base_url();?>js/jsDistribucionDecoAdic.js"></script>
<script src="<?php echo base_url();?>js/JsonIngresos.js"></script>
<script src="<?php echo base_url();?>js/jsBloqueoCampos.js"></script>
<!-- Main content --><form name="formularioData" id="formularioData" role="form">
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">

      <h3 class="box-title"></h3>

    </div>
    <div class="box-body">
      <div id="mensaje"></div>
      <div class="row">

        <div class="col-md-10 col-md-offset-1">
          <div class="box box-primary">
            <label><?php echo $titulo; ?></label>
            <input type="hidden" name="id_update" id="id_update" value="<?php echo $data_flag; ?>">
            <div class="form-group">
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="page-header">
                    <i class="fa fa-user"></i> Datos Cliente
                  </h2>
                </div>
                <!--inicio formulario-->
                <div class="col-xs-12">
                  <div class="form-group col-xs-4">
                    <div class="form-group has-feedback">
                        <label for="in_proyecto">Tipo Trabajo*</label>
                        <select name="in_tipo_trabajo" id="in_tipo_trabajo" class="form-control selectpicker show-tick" data-size="10"></select>
                    </div>

                    <div class="form-group has-feedback">
                      <label for="in_proyecto">Proyecto/Solot*</label>
                      <?php echo form_input($in_proyecto); ?>

                      <span class="glyphicon glyphicon-file form-control-feedback"></span>
                    </div>
                  </div>

                  <div class="form-group col-xs-4" style="display: none;" id="divtiporep">
                    <div class="form-group has-feedback">
                        <label for="in_tiporep">Tipo Reparacion*</label>

                        <select name="in_tiporep" id="in_tiporep" class="form-control selectpicker show-tick" data-size="10"></select>
                    </div>
                  </div>

                  <div class="form-group col-xs-4" style="display: none;" id="divcodfalla">
                    <div class="form-group has-feedback">
                        <label for="in_falla">Tipo Falla*</label>

                        <select name="in_falla" id="in_falla" class="form-control selectpicker show-tick" data-live-search="true" data-size="10"></select>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <label for="in_ingreso">Fecha Ingreso*</label>

                        <?php echo form_input($in_ingreso); ?>

                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <label for="in_entrega">Fecha Agenda* <button type="button" id="btnVerAgendas" title="Ver Agendamientos Anteriores" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalAgenda"><span class="glyphicon glyphicon-eye-open"></span></button></label>
                        <?php echo form_input($in_entrega); ?>

                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <label for="in_bloque_agenda">Bloque Agenda*</label>

                        <select name="in_bloque_agenda" id="in_bloque_agenda" class="form-control selectpicker show-tick"></select>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-8">
                    <div class="form-group has-feedback">
                        <label for="in_cliente">Razon Social*</label>
                        <?php echo form_input($in_cliente); ?>

                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="form-group">
                      <label for="in_rut">Rut*</label>

                          <?php echo form_input($in_rut); ?>
                      </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-8">
                    <div class="form-group has-feedback">
                        <label for="in_nombre">Nombre*</label>
                        <?php echo form_input($in_nombre); ?>

                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <!-- <php echo form_input($in_fono); ?> -->
                        <div class="btn-group">
                          <label for="btnAddFono">Fono Cliente*</label>
                          <button type="button" id="btnAddFono" class="btn btn-block btn-success" style="width: 70%;" data-toggle="modal" data-target="#myModalFono"><span class="fa fa-plus-square-o"></span> Agregar Fono</button>
                        </div>
                        <!-- <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span> -->

                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="form-group col-xs-4">
                    <div class="form-group has-feedback">
                        <label for="in_comuna">Comuna*</label>

                        <select name="in_comuna" id="in_comuna" class="form-control selectpicker show-tick" data-live-search="true" data-size="10"></select>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="form-group col-xs-8">
                    <div class="form-group has-feedback">
                        <label for="in_direccion">Direccion*</label>
                        <?php echo form_input($in_direccion); ?>

                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12" id="divTraslado">
                  <div class="form-group col-xs-8">
                    <div class="form-group has-feedback">
                        <label for="in_direccion_nueva">Nueva Direccion*</label>
                        <?php echo form_input($in_direccion_nueva); ?>

                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                  </div>
                </div>
<!--<button type="button" data-toggle="collapse" data-target="#modalFiltro" id="btnCollapse" style="display: none;"></button>-->
<div id="modalFiltro" style="display: none;">
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-12">
                      <h2 class="page-header">
                        <i class="fa fa-phone"></i> Datos Plan
                      </h2>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                      <label for="in_canal_venta">Canal de Ventas*</label>

                      <select name="in_canal_venta" id="in_canal_venta" class="form-control selectpicker show-tick" data-live-search="true" data-size="6"></select>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-8">
                    <div class="form-group has-feedback">
                        <label for="in_plan_net">Plan*</label>

                        <select name="in_plan_net" id="in_plan_net" class="form-control selectpicker show-tick" data-live-search="true" data-size="10"></select>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <label for="in_plan_net_adic">Puntos Red Adicional*</label>
                        <?php echo form_input($in_plan_net_adic); ?>

                        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <label for="in_plan_fono_adic">Lineas*</label>
                        <?php echo form_input($in_plan_fono_adic); ?>

                        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                    </div>
                  </div>

                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <label for="in_plan_fono_adict">Extensiones*</label>
                        <?php echo form_input($in_plan_fono_adict); ?>

                        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                      <label for="in_deco_basico">Deco Inicial*</label>

                      <select name="in_deco_basico" id="in_deco_basico" class="form-control selectpicker show-tick"></select>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <div class="btn-group">
                          <label for="btnAgregaDeco">Deco Adicional*</label>
                          <button type="button" id="btnAgregaDeco" class="btn btn-block btn-success" style="width: 70%;" data-toggle="modal" data-target="#myModalDeco"><span class="fa fa-plus-square-o"></span> Agregar</button>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-8">
                    <div class="form-group has-feedback">
                        <label for="in_plan_tv_pack">Plan Adicional TV / Plan TV Pack*</label>
                        <?php echo form_input($in_plan_tv_pack); ?>

                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                      <label for="in_central_tf">Central TF*</label>

                      <select name="in_central_tf" id="in_central_tf" class="form-control selectpicker show-tick"></select>
                    </div>
                  </div>

                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                        <div class="btn-group">
                          <label for="btnAgregaCentral">Lineas y Anexos*</label>
                          <button type="button" id="btnAgregaCentral" class="btn btn-block btn-success" style="width: 70%;" data-toggle="modal" data-target="#myModalCentral"><span class="fa fa-plus-square-o"></span> Agregar</button>
                        </div>
                    </div>
                  </div>
                </div>
</div>
                <div class="col-xs-12">
                  <div class="col-xs-4">
                    <div class="form-group has-feedback">
                      <label for="in_estado">Estado*</label>

                      <select name="in_estado" id="in_estado" class="form-control selectpicker show-tick"></select>
                    </div>
                  </div>

                  <div class="form-group col-xs-4" style="display: none;" id="divcodrep">
                    <div class="form-group has-feedback">
                        <label for="in_codrep">Codigo Reparacion*</label>

                        <select name="in_codrep" id="in_codrep" class="form-control selectpicker show-tick" data-live-search="true" data-size="10"></select>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <label for="indet_observacion">Observacion*</label>
                  <?php echo form_textarea($indet_observacion); ?>
                </div>

                <!-- FORMULARIO INGRESO DECOS ADICIONALES -->
                <div class="modal fade" id="myModalDeco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                              <h4 class="modal-title" id="myModalLabel">Decos Adicionales</h4>
                          </div>
                          <div class="modal-body">
                            <h5 class="text-center">Seleccione los decos adicionales y su cantidad</h5>
                            <table class="table table-striped">
                              <thead>
                                <th>Tipo Deco</th>
                                <th>Cantidad</th>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <input id="chksd" type="checkbox" name="decos[]" value="chksd" />
                                    <label for="chksd">DTA SD</label>
                                  </td>
                                  <td>
                                    <input id="txtChksd" type="number" min="0" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="0" style="width: 4em;" disabled="disabled">
                                  </td>
                                </tr>
                                <tr>
                                  <<td>
                                    <input id="chkhd" type="checkbox" name="decos[]" value="chkhd" />
                                    <label for="chkhd">DTA HD</label>
                                  </td>
                                  <td>
                                    <input id="txtChkhd" type="number" min="0" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="0" style="width: 4em;" disabled="disabled">
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <input id="chktvr" type="checkbox" name="decos[]" value="chktvr" />
                                    <label for="chktvr">HD TVR</label>
                                  </td>
                                  <td>
                                    <input id="txtChktvr" type="number" min="0" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="0" style="width: 4em;" disabled="disabled">
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <input id="chkstn" type="checkbox" name="decos[]" value="chkstn" />
                                    <label for="chkstn">Standard</label>
                                  </td>
                                  <td>
                                    <input id="txtChkstn" type="number" min="0" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="0" style="width: 4em;" disabled="disabled">
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <input id="chkstnhd" type="checkbox" name="decos[]" value="chkstnhd" />
                                    <label for="chkstnhd">Standard</label>
                                  </td>
                                  <td>
                                    <input id="txtChkstnhd" type="number" min="0" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="0" style="width: 4em;" disabled="disabled">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                      </div>
                  </div>
                </div>

                <!-- FORMULARIO LISTADO AGENDA FOLIO -->
                <div class="modal fade" id="myModalAgenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                        <h4 class="modal-title" id="myModalLabel">Agendamientos Realizados</h4>
                      </div>
                      <div class="modal-body">
                        <h5 class="text-center">Listado de agendamientos realizados para esta orden, ordenada desde el agendamiento mas reciente al mas antiguo.</h5>
                        <table class="table table-striped">
                          <thead>
                            <th>Fecha Reagenda</th>
                            <th>Bloque</th>
                            <th>Usuario Modificacion</th>
                            <th>Fecha Modificacion</th>
                          </thead>
                          <tbody>
                            <?php
                              if(json_decode($data_folio_agenda)){
                                foreach (json_decode($data_folio_agenda) as $agenda) {
                                  echo '<tr>';
                                  echo '<td>'.$agenda->reagenda_fecha.'</td>';
                                  echo '<td>'.$agenda->bloque_descripcion.'</td>';
                                  echo '<td>'.$agenda->reagenda_modificacion.'</td>';
                                  echo '<td>'.$agenda->reagenda_usr_registro.'</td>';
                                  echo '</tr>';
                                }
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- FORMULARIO LISTADO FONO -->
                <div class="modal fade" id="myModalFono" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                              <h4 class="modal-title" id="myModalLabel">Fonos Contacto Cliente</h4>
                          </div>
                          <div class="modal-body">
                            <h5 class="text-center">Ingrese los fonos de contacto del cliente que se esta ingresando.</h5>
                            <br>
                            <div class="col-xs-12">
                              <div class="col-xs-5">
                                <div class="form-group has-feedback">
                                  <label for="txtFono">Nro Telefonico</label>
                                  <input type="text" id="txtFono" name="txtFono" class="form-control" placeholder="Ingrese Nro Telefonico">
                                </div>
                              </div>
                              <div class="col-xs-3">

                              </div>
                            </div>

                            <br>

                            <div class="col-xs-12">
                              <div class="col-xs-3">
                                <div class="form-group has-feedback">
                                  <label for="btnFonoA"></label>
                                  <div class="btn-group">
                                    <button type="button" id="btnFonoA" class="btn btn-block btn-success"><span class="fa fa-plus-square-o"></span> Agregar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <table id="tblFonoCli" border="0" cellpadding="0" cellspacing="0" width="100%" class="pretty">
                              <!-- class="table table-striped" -->
                              <thead>
                                <th>Fono</th>
                                <th>Borrar</th>
                              </thead>
                                <?php
                                  if($data_flag == 1){
                                    echo '<tbody>';
                                    if(json_decode($data_folio_fono)){
                                      foreach (json_decode($data_folio_fono) as $fono) {
                                        echo '<tr>';
                                        echo '<td>'.$fono->fo_telefono.'</td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                      }
                                    }
                                    echo '</tbody>';
                                  }
                                ?>
                            </table>
                          </div>
                      </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <br>
                </div>

                <!-- MODIFICACION DE DATOS -->
                <div class="col-xs-12">
                  <?php if($titulo == "Modificacion Datos"){ ?>
                    <label>Detalle Observaciones</label>
                    <table id="ordenesDet" border="0" cellpadding="0" cellspacing="0" width="100%" class="pretty">
                      <thead>
                        <tr>
                          <th>Fecha Ingreso</th>
                          <th>Usuario</th>
                          <th>Estado</th>
                          <th>Observacion</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if(json_decode($data_folio_det)){
                            foreach (json_decode($data_folio_det) as $value) {
                              # code...
                              echo '<tr>';
                              echo '<td>'.$value->fecha_registro.'</td>';
                              echo '<td>'.$value->user_ingresa.'</td>';
                              echo '<td>'.$value->estado.'</td>';
                              echo '<td>'.$value->observacion.'</td>';
                              echo '</tr>';
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  <?php } ?>
                </div>

                <!-- ADJUNTAR DATOS SCHARFSTEIN ($this->session->userdata("ALIADORUT") == 81) || ($this->session->userdata("ALIADORUT") == 0)-->
                <?php if($this->session->userdata("USRNAME") == 'wcontreras') { ?>
                  <div class="col-xs-12">
                    <label>Adjuntar Archivos</label>
                    <table id="ordenesDet" border="0" cellpadding="0" cellspacing="0" width="100%" class="pretty">
                      <thead>
                        <tr>
                          <th>Fecha Ingreso</th>
                          <th>Usuario</th>
                          <th>Nombre Archivo</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                <?php } ?>

                <!-- FORMULARIO DATOS LINEAS ANEXOS CTF -->
                <div class="modal fade" id="myModalCentral" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <?php if(@$data_folio_det->in_estado == 1){ ?>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                          <?php } ?>
                          <h4 class="modal-title" id="myModalLabel">Central Telefonica Anexos y Lineas</h4>
                      </div>
                      <div class="modal-body">
                        <h5 class="text-center">Ingrese los anexos y lienas donde corresponda</h5>
                        <br>
                        <table class="table table-striped">
                          <thead>
                            <th>Lineas</th>
                            <th>Anexos</th>
                          </thead>
                          <tbody>
                              <tr>
                                <td>
                                  <?php echo form_input($in_central_tfl); ?>
                                </td>
                                <td>
                                  <?php echo form_input($in_central_tfa); ?>
                                </td>
                              </tr>
                          </tbody>
                        </table>
                        <br>
                        <table class="table table-striped">
                          <thead>
                            <th>Lineas Previos</th>
                            <th>Anexos Previas</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <?php echo form_input($in_central_tflp); ?>
                              </td>
                              <td>
                                <?php echo form_input($in_central_tfap); ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="btnCierraCentral">Aceptar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <br><br>
                </div>

                <div class="col-xs-12">
                  <?php if($this->session->userdata("TIPOUSUARIO") == 1 || $this->session->userdata("TIPOUSUARIO") == 2){ ?>
                    <button type="button" id="btnAtras" onclick="volverAdmin()" class="btn btn-default">Volver</button>
                  <?php }else{ ?>
                    <button type="button" id="btnAtras" onclick="volverAliado()" class="btn btn-default">Volver</button>
                  <?php } ?>
                  <!-- -->
                  <!-- -->
                  <!-- -->
                  <?php if($titulo == "Modificacion Datos" && @$data_folio->in_estado_admin != 1){ ?>

                    <button type="submit" class="btn btn-primary"$data_flag id="btnUpdFolio">
                      <span class="glyphicon glyphicon-refresh"></span>
                      Actualizar Registro
                    </button>

                  <?php }elseif(@$data_folio->in_estado_admin == 1 && $titulo == "Modificacion Datos") { ?>

                    <button class="btn btn-primary" disabled>
                      <span class="glyphicon glyphicon-refresh"></span>
                      Actualizar Registro
                    </button>

                  <?php }else{?>

                    <button type="submit" class="btn btn-primary">
                      <span class="glyphicon glyphicon-floppy-disk"></span>
                      Guardar Registro
                    </button>

                  <?php }?>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">

    </div><!-- /.box-footer-->
  </div><!-- /.box -->

</section><!-- /.content --></form>

<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">

  $(document).ready(function(){
    //Titulo Pagina
    $(".box-title").html("Datos SGA / SUR PYME");
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", { "placeholder": "dd/mm/yyyy" });
    //Money Euro
    $("[data-mask]").inputmask();
    //$(window).bind('load',function(){
    $('#ordenesDet').dataTable({
        "scrollX": true,
        //"searching": false,
        "bSort": false,
        "pageLength": 5,
        "bLengthChange": false
    });

    $('#tblFonoCli').dataTable({
      "language": {
        "url": baseurl.concat("js/i18n/Spanish.json").replace('index.php/','') //"//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"//C:\wamp\www\siad_pyme\plugins\datatables\i18n
      }
    });
    //var cosa = JSON.stringify($('form').serializeArray());
    var datos = $('#formularioData').serializeArray().reduce(function(obj, item) {
                    obj[item.name] = item.value;
                    return obj;
                }, {});
    console.log(datos);
    //alert(coso.id_update);

    if($("#in_estado").val()==2 && $("#in_tipo_trabajo").val()!=2){
      $("#btnUpdFolio").prop('disabled',true);
      swal("Cancelado", "Este registro ya ha sido liquidado", "warning");
    }

    if($("#id_usuario").val()==5 && $("#id_update").val()==0){
      $("#in_entrega").prop('disabled',true);
      $("#in_bloque_agenda").prop('disabled',true);
    }

    //alert("cosa");
    //fecha de ingreso del registro
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day);
    $("#in_ingreso").prop('disabled',true);
    $('#in_ingreso').val(today);
    //-----------------------------

    if($("#id_update").val()==0){
      $("#btnVerAgendas").css("visibility","hidden");
      $("#in_plan_fono_adic").prop('disabled','disabled');
      $("#in_plan_fono_adict").prop('disabled','disabled');
      $("#btnAgregaDeco").prop('disabled','disabled');
      $("#btnAgregaCentral").prop('disabled','disabled');
      $("#in_plan_net_adic").prop('disabled','disabled');
      $("#in_plan_tv_pack").prop('disabled','disabled');
      $("#in_deco_basico").prop('disabled','disabled');
      $("#in_central_tfl").prop('disabled','disabled');
      $("#in_central_tfa").prop('disabled','disabled');
      $("#in_central_tf").prop('disabled','disabled');
      $("#in_deco_basico").selectpicker('refresh');
      $("#in_central_tf").selectpicker('refresh');
      $("#in_rut").val("");
      //inicializar inputs lineas y anexos para central telefonica
      $("#in_central_tfl").val(0);
      $("#in_central_tfa").val(0);
      $("#in_central_tflp").val(0);
      $("#in_central_tfap").val(0);
    }else{
      $("#in_proyecto").prop('disabled',true);

      $("#txtChksd").val(v_deco_sd);
      $("#txtChkhd").val(v_deco_hd);
      $("#txtChktvr").val(v_deco_tvr);
      $("#txtChkstn").val(v_deco_stnd);
      $("#txtChkstnhd").val(v_deco_stnd_hd);

      if($("#txtChksd").val()>0){
        $("#chksd").prop('checked',true);
        $("#txtChksd").prop('disabled',false);
      }

      if($("#txtChkhd").val()>0){
        $("#chkhd").prop('checked',true);
        $("#txtChkhd").prop('disabled',false);
      }

      if($("#txtChktvr").val()>0){
        $("#chktvr").prop('checked',true);
        $("#txtChktvr").prop('disabled',false);
      }

      if($("#txtChkstn").val()>0){
        $("#chkstn").prop('checked',true);
        $("#txtChkstn").prop('disabled',false);
      }
      //alert($("#id_trabajo").val());
      if($("#in_tipo_trabajo").val()==2 || $("#id_trabajo").val()==2){
        $("#divtiporep").css('display','block');

        if($("#id_update").val() != 0){
					$("#divcodrep").css('display','block');
				}

        $("#divcodfalla").css('display','block');
        $("#modalFiltro").css('display','none');
      }else{
        $("#modalFiltro").css('display','block');
      }

      $("#btnAddFono").html("<span class='fa fa-eye'></span> Ver Fono");
      $("#btnAgregaDeco").html("<span class='fa fa-eye'></span> Ver Decos Adic.");
      $("#btnAgregaCentral").html("<span class='fa fa-eye'></span> Ver Lin y Anex.");
    }

    $("#divTraslado").css('display','none');

    var t = $('#tblFonoCli').DataTable();
    //var colNum = 1;
    $("#btnFonoA").on('click',function(){
      t.row.add([
        //colNum,
        $("#txtFono").val(),
        "<a class='delete'>Borrar</a>"
      ]).draw(false);
      //colNum++;
      $("#txtFono").val("");
      $("#txtFono").focus();
    });

    /*$('#tblFonoCli').on('click', 'a.delete', function (e) {
        e.preventDefault();

        var nRow = $(this).parents('tr')[0];
        //alert($(this).parent().parent().children().index($(this).parent()));
        t.fnDeleteRow(nRow);
    });*/

    /*$('#tblFonoCli tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            t.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#btnFonoD').click( function () {
        t.row('.selected').remove().draw( false );
    } );*/

    $('#tblFonoCli tbody').on( 'click', 'a.delete', function () {
        t
        .row($(this).parents('tr'))
        .remove()
        .draw();
    } );
  });

  $("#in_estado").on('change',function(){
    if($("#in_estado").val()==2 && $("#in_tipo_trabajo").val()==2 && $("#id_usuario").val()!=4 && $("#id_usuario").val()!=1 && $("#id_usuario").val()!=2){
      $("#btnUpdFolio").prop('disabled',true);
      swal("Cancelado", "Este registro solo puede ser cerrado por Plataforma T2", "warning");
    }else{
      $("#btnUpdFolio").prop('disabled',false);
    }
  });

  $("#in_tipo_trabajo").on('change',function(){
    if($("#in_tipo_trabajo").val()==4){
      $("#divTraslado").css('display','block');
    }else{
      $("#divTraslado").css('display','none');
    }

    showCboReparacion();
  });

  var delay = (function(){
  var timer = 0;
    return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
    };
  })();

  //obtengo las cantidades de lineas y anexos de acuerdo al plan
  var n_plan = 0;
  var n_line_min = 0;
  var n_line_max = 0;
  var n_anex_min = 0;
  var n_anex_max = 0;

  $("#in_central_tf").on('change',function(){
    n_plan = $("#in_central_tf :selected").text().match(/\d+/g)[0];
    n_line_min = $("#in_central_tf :selected").text().match(/\d+/g)[1];
    n_line_max = $("#in_central_tf :selected").text().match(/\d+/g)[2];
    n_anex_min = $("#in_central_tf :selected").text().match(/\d+/g)[3];
    n_anex_max = $("#in_central_tf :selected").text().match(/\d+/g)[4];

    $("#in_central_tfl").attr({"min":n_line_min,"max":n_line_max});
    $("#in_central_tfa").attr({"min":n_anex_min,"max":n_anex_max});
  });
  //in_entrega in_bloque_agenda
  $("#in_entrega").on('change',function(){
    $("#in_estado").val("10");
    $("#in_estado").selectpicker('refresh');
  });

  $("#in_bloque_agenda").on('change',function(){
    $("#in_estado").val("10");
    $("#in_estado").selectpicker('refresh');
  });

  $("#btnCierraCentral").on('click',function(){
    //validar inputs de linea
    var cuenta = 0;
    if($("#in_canal_venta").val()!=9){
      var sumLinea = parseInt($("#in_central_tfl").val()) + parseInt($("#in_central_tflp").val());
      var sumAnexo = parseInt($("#in_central_tfa").val()) + parseInt($("#in_central_tfap").val());
      //alert("sumaLinea "+ sumLinea + " -- sumaAnexo "+sumAnexo);
      if(n_line_min <= sumLinea && sumLinea <= n_line_max){
        //alert("Debe seleccionar rango de lineas entre " + n_line_min + " como minimo y " + n_line_max + " como maximo.");
        cuenta++;
      }else{
        //alert("Valores de lineas ingresadas fuera de rango");
        alert("Debe seleccionar rango de lineas entre " + n_line_min + " como minimo y " + n_line_max + " como maximo.");
      }

      if(n_anex_min <= sumAnexo && sumAnexo <= n_anex_max){
        //alert("Debe seleccionar rango de anexos entre " + n_anex_min + " como minimo y " + n_anex_max + " como maximo.");
        cuenta++;
      }else{
        //alert("Valores de anexos ingresados fuera de rango");
        alert("Debe seleccionar rango de anexos entre " + n_anex_min + " como minimo y " + n_anex_max + " como maximo.");
      }
    }else{
      cuenta = 2;
    }

    if(cuenta == 2){
      $("#myModalCentral").modal('hide');
    }
  });
</script>
