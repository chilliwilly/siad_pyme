<input type="hidden" name="id_trabajo" id="id_trabajo" value="<?php echo @$data_folio->tt_id; ?>"> 
<input type="hidden" name="id_comuna" id="id_comuna" value="<?php echo @$data_folio->id_comuna; ?>">
<input type="hidden" name="id_bloque" id="id_bloque" value="<?php echo @$data_folio->reagenda_bloque; ?>">
<input type="hidden" name="id_admin" id="id_admin" value="<?php echo @$data_folio->in_estado_admin; ?>">
<input type="hidden" name="id_plan" id="id_plan" value="<?php echo @$data_folio->plan_id; ?>">
<input type="hidden" name="id_deco" id="id_deco" value="<?php echo @$data_folio->deco_id; ?>">
<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $this->session->userdata('TIPOUSUARIO'); ?>">
<!--<input type="hidden" name="id_estado" id="id_estado" value="<?php echo @$data_folio_det->in_estado; ?>">-->

<script type="text/javascript">  
  var baseurl = "<?php echo base_url(); ?>";
  var v_deco_sd = "0";
  var v_deco_hd = "0";
  var v_deco_tvr = "0";
  var v_deco_stnd = "0"; 
  var num_trabajo = 0;
  var num_comuna = 0;
  var num_estado = 0;
  var num_bloque = 0;
  var num_plan = "0";
  var num_deco = 0;
  var num_ctf = 0;
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
  }else{
    num_trabajo = document.getElementById("id_trabajo").value;
    num_comuna = document.getElementById("id_comuna").value;
    //num_estado = document.getElementById("id_estado").value;
    num_bloque = document.getElementById("id_bloque").value;
    num_plan = document.getElementById("id_plan").value;
    num_deco = document.getElementById("id_deco").value;
    v_deco_sd = "<?php echo @$data_folio_deco->decoa_sd; ?>";
    v_deco_hd = "<?php echo @$data_folio_deco->decoa_hd; ?>";
    v_deco_tvr = "<?php echo @$data_folio_deco->decoa_tvr; ?>";
    v_deco_stnd = "<?php echo @$data_folio_deco->decoa_stnd; ?>";
  }

  function volverAdmin(){
    window.location="<?php echo base_url()?>orden";
  }

  function volverAliado(){
    window.location="<?php echo base_url()?>orden/aliado";
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

  //in_fono
  $in_fono = array(
  'name'        => 'in_fono',
  'id'          => 'in_fono',
  'size'        => 10,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_fono),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese telefonos',
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

  //in_plan_tv_adic
  $in_plan_tv_adic = array(
  'name'        => 'in_plan_tv_adic',
  'id'          => 'in_plan_tv_adic',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_tv_adicu),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan tv adic',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_tv_adict
  $in_plan_tv_adict = array(
  'name'        => 'in_plan_tv_adict',
  'id'          => 'in_plan_tv_adict',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_tv_adicd),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan tv adic 2',
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
  'value'       => set_value('codigo',@$data_folio->in_plan_pack),
  'type'        => 'number',
  'class'       => 'form-control',
  );

  $in_central_tfa = array(
  'name'        => 'in_central_tfa',
  'id'          => 'in_central_tfa',
  'value'       => set_value('codigo',@$data_folio->in_plan_pack),
  'type'        => 'number',
  'class'       => 'form-control',
  );

  //in_fecha_operacion
  $in_fecha_operacion = array(
  'name'        => 'in_fecha_operacion',
  'id'          => 'in_fecha_operacion',
  //'size'        => 100,
  //'maxlength'   => 200,
  'value'       => set_value('codigo',@$data_folio->in_fecha_operacion),
  'type'        => 'date',
  'class'       => 'form-control',
  //'placeholder' => 'Ingrese nombre',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_vende
  $in_vende = array(
  'name'        => 'in_vende',
  'id'          => 'in_vende',
  'size'        => 50,
  'maxlength'   => 200,
  'value'       => set_value('codigo',@$data_folio->in_vende),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese nombre',
  //'onkeypress'  => 'return letras(event)',
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
                        <table style="width: 100%; display: table; border-collapse: collapse;">
                            <tr>
                              <td>
                                <div class="row">
                                <div class="col-xs-12">
                                <h2 class="page-header">
                                  <i class="fa fa-user"></i> Datos Cliente
                                </h2>
                                </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="form-group has-feedback">
                                    <label for="in_proyecto">Tipo Trabajo*</label>
                                    <select name="in_tipo_trabajo" id="in_tipo_trabajo" class="form-control selectpicker show-tick" data-size="10"></select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_proyecto">Proyecto/Solot*</label>
                                        <?php echo form_input($in_proyecto); ?>

                                        <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_ingreso">Fecha Ingreso*</label>

                                        <?php echo form_input($in_ingreso); ?>

                                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                    </div>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_entrega">Fecha Agenda* <button type="button" id="btnVerAgendas" title="Ver Agendamientos Anteriores" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></label>                                        
                                        <?php echo form_input($in_entrega); ?>

                                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>                                        
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_bloque_agenda">Bloque Agenda*</label>

                                        <select name="in_bloque_agenda" id="in_bloque_agenda" class="form-control selectpicker show-tick"></select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group has-feedback">
                                        <label for="in_cliente">Cliente*</label>
                                        <?php echo form_input($in_cliente); ?>

                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="in_rut">Rut*</label>

                                            <?php echo form_input($in_rut); ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                              <td colspan="3">
                                <div class="form-group has-feedback">
                                    <label for="in_nombre">Nombre*</label>
                                    <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                    <?php echo form_input($in_nombre); ?>

                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                              </td>
                              <td>
                                
                              </td>
                              <td>
                                <div class="form-group has-feedback">
                                    <label for="in_fono">Fono Cliente*</label>
                                    <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                    <?php echo form_input($in_fono); ?>

                                    <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="form-group has-feedback">
                                    <label for="in_comuna">Comuna*</label>

                                    <select name="in_comuna" id="in_comuna" class="form-control selectpicker show-tick" data-live-search="true" data-size="10"></select>                                      

                                </div>
                              </td>
                              <td>
                                
                              </td>
                              <td>

                              </td>
                              <td>
                                
                              </td>
                              <td>
                                
                              </td>
                            </tr>                            
                            <tr>
                                <td colspan="5">
                                    <div class="form-group has-feedback">
                                        <label for="in_direccion">Direccion*</label>
                                        <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                        <?php echo form_input($in_direccion); ?>

                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="row">
                                <div class="col-xs-12">
                                <h2 class="page-header">
                                  <i class="fa fa-phone"></i> Datos Plan
                                </h2>
                                </div>
                                </div>
                              </td>
                            </tr>                         
                            <tr>                          
                              <td colspan="3">
                                <div class="form-group has-feedback">
                                    <label for="in_plan_net">Plan*</label>

                                    <select name="in_plan_net" id="in_plan_net" class="form-control selectpicker show-tick" data-live-search="true" data-size="10"></select>
                                    <!--<span class="glyphicon glyphicon-globe form-control-feedback"></span>-->
                                </div>
                              </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_plan_net_adic">Puntos Red Adicional*</label>
                                        <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                        <?php echo form_input($in_plan_net_adic); ?>

                                        <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_plan_fono_adic">Lineas*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <?php echo form_input($in_plan_fono_adic); ?>

                                      <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                  </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_plan_fono_adict">Extensiones*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <?php echo form_input($in_plan_fono_adict); ?>

                                      <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                  </div>  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_deco_basico">Deco Inicial*</label>

                                        <select name="in_deco_basico" id="in_deco_basico" class="form-control selectpicker show-tick"></select>

                                        <!--<span class="glyphicon glyphicon-hdd form-control-feedback"></span>-->
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="btnAgregaDeco">Deco Adicional*</label>

                                        <div class="btn-group">
                                          <button type="button" id="btnAgregaDeco" class="btn btn-block btn-success" data-toggle="modal" data-target="#myModalDeco"><span class="fa fa-plus-square-o"></span> Agregar</button>
                                        </div>
                                        
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group has-feedback">
                                        <label for="in_plan_tv_pack">Plan Adicional TV / Plan TV Pack*</label>
                                        <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                        <?php echo form_input($in_plan_tv_pack); ?>

                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_central_tf">Central TF*</label>
                                        <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                        <select name="in_central_tf" id="in_central_tf" class="form-control selectpicker show-tick"></select>
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_central_tfl">Central TF Lineas*</label>
                                      <?php echo form_input($in_central_tfl); ?>

                                      <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                  </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_central_tfa">Central TF Anexos*</label>
                                      <?php echo form_input($in_central_tfa); ?>

                                      <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                  </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_fecha_operacion">Fecha Cierre*</label>
                                        <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                        <?php echo form_input($in_fecha_operacion); ?>

                                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_vende">Canal de Ventas*</label>
                                        <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                        <?php echo form_input($in_vende); ?>

                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                    <div class="form-group has-feedback">
                                        <label for="in_estado">Estado*</label>
                                        <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                        <select name="in_estado" id="in_estado" class="form-control selectpicker show-tick"></select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                              <td colspan="5">
                                <label for="indet_observacion">Observacion*</label>
                                <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                <?php echo form_textarea($indet_observacion); ?>

                                <!--<span class="glyphicon glyphicon-user form-control-feedback"></span>-->
                              </td>
                            </tr>                      
                        </table>

                        <!-- FORMULARIO INGRESO DECOS ADICIONALES -->
                        <div class="modal fade" id="myModalDeco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                      </tbody>                                      
                                    </table>
                                  </div>
                              </div>
                          </div>
                        </div>

                        <br>

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

                <?php if($this->session->userdata("TIPOUSUARIO") == 1){ ?>
                  <button type="button" onclick="volverAdmin()" class="btn btn-default">Volver</button>
                <?php }else{ ?>
                  <button type="button" onclick="volverAliado()" class="btn btn-default">Volver</button>
                <?php } ?>
                

                <?php if($titulo == "Modificacion Datos" && @$data_folio->in_estado_admin != 1){ ?>

                  <button type="submit" class="btn btn-primary" id="btnUpdFolio">
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
      $("#in_plan_net_adic").prop('disabled','disabled');
      $("#in_plan_tv_pack").prop('disabled','disabled');
      $("#in_deco_basico").prop('disabled','disabled');
      $("#in_central_tfl").prop('disabled','disabled');
      $("#in_central_tfa").prop('disabled','disabled');
      $("#in_central_tf").prop('disabled','disabled');
      $("#in_deco_basico").selectpicker('refresh');
      $("#in_central_tf").selectpicker('refresh');
    }else{
      $("#txtChksd").val(v_deco_sd);
      $("#txtChkhd").val(v_deco_hd);
      $("#txtChktvr").val(v_deco_tvr);
      $("#txtChkstn").val(v_deco_stnd);

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
    }
  });

  $("#in_estado").on('change',function(){
    if($("#in_estado").val()==2 && $("#in_tipo_trabajo").val()==2 && $("#id_usuario").val()!=4 && $("#id_usuario").val()!=1 && $("#id_usuario").val()!=2){
      $("#btnUpdFolio").prop('disabled',true);
      swal("Cancelado", "Este registro solo puede ser cerrado por Plataforma T2", "warning");
    }else{
      $("#btnUpdFolio").prop('disabled',false);
    }
  });   
</script>