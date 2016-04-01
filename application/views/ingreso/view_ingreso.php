<script type="text/javascript">
  var id_categoria  = 0;
  var id_subcat     = 0;
  var baseurl = "<?php echo base_url(); ?>";
</script>

<input type="hidden" name="id_trabajo" id="id_trabajo" value="<?php echo @$data_folio->in_tipo_trabajo; ?>"> 
<input type="hidden" name="id_comuna" id="id_comuna" value="<?php echo @$data_folio->in_comuna; ?>"> 
<input type="hidden" name="id_estado" id="id_estado" value="<?php echo @$data_folio_det->in_estado; ?>">

<?php
  //in_proyecto
  $in_proyecto = array(
  'name'        => 'in_proyecto',
  'id'          => 'in_proyecto',
  'size'        => 20,
  'maxlength'   => 20,
  'value'       => set_value('in_proyecto',@$data_folio->in_proyecto),//if($n_folio != null){ set_value('in_proyecto',$n_folio); }else{ set_value('in_proyecto',''); },//set_value('in_proyecto',@$data_folio->codigo),
  'type'        => 'number',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese nro proyecto',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_sga
  $in_sga = array(
  'name'        => 'in_sga',
  'id'          => 'in_sga',
  'value'       => set_value('in_sga',@$data_folio->in_sga),
  'type'        => 'date',
  'class'       => 'form-control',
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
  'value'       => set_value('in_entrega',@$data_folio->in_entrega),
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

  //in_plan_net
  $in_plan_net = array(
  'name'        => 'in_plan_net',
  'id'          => 'in_plan_net',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_net),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan internet',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_net_adic
  $in_plan_net_adic = array(
  'name'        => 'in_plan_net_adic',
  'id'          => 'in_plan_net_adic',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_net_adic),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan internet adic',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_fono
  $in_plan_fono = array(
  'name'        => 'in_plan_fono',
  'id'          => 'in_plan_fono',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_fono),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan fono',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_fono_adic
  $in_plan_fono_adic = array(
  'name'        => 'in_plan_fono_adic',
  'id'          => 'in_plan_fono_adic',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_fono_adic),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan fono 1',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_fono_adict
  $in_plan_fono_adict = array(
  'name'        => 'in_plan_fono_adict',
  'id'          => 'in_plan_fono_adict',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_fono_adict),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan fono 2',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_tv
  $in_plan_tv = array(
  'name'        => 'in_plan_tv',
  'id'          => 'in_plan_tv',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_tv),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan tv',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_deco_basico
  $in_deco_basico = array(
  'name'        => 'in_deco_basico',
  'id'          => 'in_deco_basico',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_deco_basico),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese deco basico',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_tv_adic
  $in_plan_tv_adic = array(
  'name'        => 'in_plan_tv_adic',
  'id'          => 'in_plan_tv_adic',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_tv_adic),
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
  'value'       => set_value('codigo',@$data_folio->in_plan_tv_adict),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese plan tv adic 2',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_deco_hd_basico
  $in_deco_hd_basico = array(
  'name'        => 'in_deco_hd_basico',
  'id'          => 'in_deco_hd_basico',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_deco_hd_basico),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese deco hd basico',
  //'onkeypress'  => 'return letras(event)',
  );

  //  in_deco_hd_full
  $in_deco_hd_full = array(
  'name'        => 'in_deco_hd_full',
  'id'          => 'in_deco_hd_full',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_deco_hd_full),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese deco hd full',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_plan_tv_pack
  $in_plan_tv_pack = array(
  'name'        => 'in_plan_tv_pack',
  'id'          => 'in_plan_tv_pack',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_plan_tv_pack),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese pack tv plan',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_central_tf
  $in_central_tf = array(
  'name'        => 'in_central_tf',
  'id'          => 'in_central_tf',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_central_tf),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese central tf',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_lineas_asignadas
  $in_lineas_asignadas = array(
  'name'        => 'in_lineas_asignadas',
  'id'          => 'in_lineas_asignadas',
  'size'        => 100,
  'maxlength'   => 100,
  'value'       => set_value('codigo',@$data_folio->in_lineas_asignadas),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese lineas asignadas',
  //'onkeypress'  => 'return letras(event)',
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
  'size'        => 100,
  'maxlength'   => 200,
  'value'       => set_value('codigo',@$data_folio->in_vende),
  'type'        => 'text',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese nombre',
  //'onkeypress'  => 'return letras(event)',
  );

  //in_estado
  //-$in_estado = array(
  //-'name'        => 'in_estado',
  //-'id'          => 'in_estado',
  //-'size'        => 100,
  //-'maxlength'   => 200,
  //'value'       => set_value('in_estado',@$data_folio_det->in_estado),
  //'type'        => 'text',
  //-'class'       => 'form-control',
  //'placeholder' => 'Ingrese estado',
  //'onkeypress'  => 'return letras(event)',
  //-);

  //indet_observacion
  $indet_observacion = array(
  'name'        => 'indet_observacion',
  'id'          => 'indet_observacion',
  'size'        => 100,
  //'maxlength'   => 500,
  'value'       => set_value('indet_observacion',@$data_folio_det->indet_observacion),
  //'type'        => 'text',
  'rows'        => '3',
  'class'       => 'form-control',
  'placeholder' => 'Ingrese observacion',
  //'onkeypress'  => 'return letras(event)',
  );

?>

<script src="<?php echo base_url();?>js/JsonIngresos.js"></script>
<!--<script src="<?php echo base_url();?>js/jsLoadComboModificar.js"></script>-->
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
              
              <div class="col-md-9 col-md-offset-1">
                  <div class="box box-primary">
                      <label><?php echo $titulo; ?></label>

                          <table>
                              <tr>
                                <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_proyecto">Tipo Trabajo*</label>
                                      <!--<input type="text" id="txtNombreU" name="txtNombreU" placeholder="Ingrese primer nombre" required="required" class="form-control" 
                                          oninvalid="this.setCustomValidity('Campo primer nombre obligatorio')" title="Debe ingresar primer nombre de la persona">-->
                                      <select name="in_tipo_trabajo" id="in_tipo_trabajo" class="form-control"></select>

                                  </div>
                                </td>
                              </tr>
                              <tr>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_proyecto">Proyecto*</label>
                                          <!--<input type="text" id="txtNombreU" name="txtNombreU" placeholder="Ingrese primer nombre" required="required" class="form-control" 
                                              oninvalid="this.setCustomValidity('Campo primer nombre obligatorio')" title="Debe ingresar primer nombre de la persona">-->
                                          <?php echo form_input($in_proyecto); ?>

                                          <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_sga">SGA*</label>
                                          <!--<input type="text" id="txtNombreD" name="txtNombreD" placeholder="Ingrese segundo nombre" required="required" class="form-control" 
                                              oninvalid="this.setCustomValidity('Campo segundo nombre obligatorio')" title="Debe ingresar segundo nombre de la persona">-->
                                          <?php echo form_input($in_sga); ?>

                                          <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_ingreso">Fecha Ingreso*</label>
                                          <!--<input type="text" id="txtApPat" name="txtApPat" placeholder="Ingrese apellido paterno" required="required" class="form-control" 
                                              oninvalid="this.setCustomValidity('Campo Apellido Obligatorio')" title="Debe ingresar apellido paterno de la persona" style="width:300px;">-->
                                          <?php echo form_input($in_ingreso); ?>

                                          <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_entrega">Fecha Entrega*</label>
                                          <!--<input type="text" id="txtApMat" name="txtApMat" placeholder="Ingrese apellido materno" required="required" class="form-control" 
                                              oninvalid="this.setCustomValidity('Campo Apellido Obligatorio')" title="Debe ingresar materno paterno de la persona" style="width:300px;">-->
                                          <?php echo form_input($in_entrega); ?>

                                          <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td colspan="3">
                                      <div class="form-group has-feedback">
                                          <label for="in_cliente">Cliente*</label>
                                          <!--<input type="text" id="txtRut" name="txtRut" placeholder="RUT 12345678-9" required="required" class="form-control"
                                              oninvalid="this.setCustomValidity('Campo Rut Obligatorio')" title="Debe ingresar rut de la persona" maxlength="10" style="width:180px; text-align:center;">-->
                                          <?php echo form_input($in_cliente); ?>

                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                  <td>
                                      <div class="form-group">
                                          <label for="in_rut">Rut*</label>
                                          <!--<div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-calendar"></i>
                                              </div>-->
                                              <!--<input type="text" id="txtFechIn" name="txtFechIn" required="required" class="form-control"
                                                  oninvalid="this.setCustomValidity('Campo Fecha Ingreso Obligatorio')" title="Debe ingresar fecha ingreso de la persona" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>-->
                                              <?php echo form_input($in_rut); ?>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_comuna">Comuna*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <select name="in_comuna" id="in_comuna" class="form-control"></select>

                                  </div>
                                </td>
                                <td>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td>
                                  <!--<div class="form-group has-feedback">
                                      <label for="in_region">Region*</label>
                                      
                                      <select name="in_region" id="in_region" class="form-control"></select>
                                      
                                  </div>-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_fono">Fono*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <?php echo form_input($in_fono); ?>

                                      <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                  </div>
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
                                      <div class="form-group has-feedback">
                                          <label for="in_plan_net">Plan Internet*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_plan_net); ?>

                                          <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_plan_net_adic">Plan Internet Adicional*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_plan_net_adic); ?>

                                          <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_plan_fono">Plan Telefonia*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_plan_fono); ?>

                                          <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_plan_fono_adic">Adicional Telefonia 1*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_plan_fono_adic); ?>

                                          <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_plan_fono_adict">Adicional Telefonia 2*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_plan_fono_adict); ?>

                                          <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_plan_tv">Plan TV*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_plan_tv); ?>

                                          <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_plan_tv_adic">Adicional TV 1*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_plan_tv_adic); ?>

                                          <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_plan_tv_adict">Adicional TV 2*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_plan_tv_adict); ?>

                                          <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_deco_basico">Deco Basico*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_deco_basico); ?>

                                          <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_deco_hd_basico">Deco Basico HD*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_deco_hd_basico); ?>

                                          <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_deco_hd_full">Deco Full HD*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_deco_hd_full); ?>

                                          <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
                                      </div>
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
                                  <td colspan="3">
                                      <div class="form-group has-feedback">
                                          <label for="in_central_tf">Central TF*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_central_tf); ?>

                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_lineas_asignadas">Lineas Asignadas*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_lineas_asignadas); ?>

                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                      </div>
                                  </td>
                              </tr>

                              <tr>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_fecha_operacion">Fecha Operacion*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_fecha_operacion); ?>

                                          <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_vende">Vende*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <?php echo form_input($in_vende); ?>

                                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                      </div>
                                  </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td>
                                      <div class="form-group has-feedback">
                                          <label for="in_estado">Estado*</label>
                                          <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                          <select name="in_estado" id="in_estado" class="form-control"></select>
                                          <!--<?php echo form_dropdown('in_estado', $in_estado, set_value('in_estado', @$data_folio_det->in_estado),'class="form-control" id="in_estado"'); ?>-->

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
                  </div>

                    <?php if($titulo == "Modificacion Datos"){ ?>

                      <button type="submit" class="btn btn-primary">
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
    $(".box-title").html("Datos SGA / SUR");
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", { "placeholder": "dd/mm/yyyy" });
    //Money Euro
    $("[data-mask]").inputmask();
  });

  //$(window).bind('load',function(){
      
  //});

</script>