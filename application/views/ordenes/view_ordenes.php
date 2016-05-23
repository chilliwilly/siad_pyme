  <style type="text/css">
    .sorting, .sorting_asc, .sorting_desc {
        background : none;
    }
  </style>

  <script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
  </script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-select.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>lib/sweet-alert.css"/>
  <!--<link rel="stylesheet" href="<?php echo base_url()?>plugins/yadcf/jquery.dataTables.yadcf.css"/>-->
  <!-- Latest compiled and minified JavaScript -->
  <script src="<?php echo base_url()?>js/bootstrap-select.min.js"></script>
  <script src="<?php echo base_url()?>lib/sweet-alert.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/JsOrdenPreview.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>plugins/sdatatables/jquery.multiselect.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>plugins/sdatatables/jquery.dataTables.columnFilter.js"></script>
  <!--<script type="text/javascript" src="<?php echo base_url(); ?>plugins/yadcf/jquery.dataTables.yadcf.js"></script>-->
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Ordenes en Trabajo</h3>
      </div>

      <div class="box-body">
        <div id="mensaje"></div>
        <!--<div class="box box-primary">-->
        <table>
          <tr>
            <td colspan="3" style="text-align: center;">Leyenda Iconos</td>
          </tr>
          <tr>
            <td>Preview Orden <button type="button" title="Ver Orden" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button>&nbsp;</td>
            <td>Cerrar Orden <button type="button" title="Ver Orden" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-ok"></span></button>&nbsp;</td>
            <td>Editar Orden <button type="button" title="Ver Orden" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></button>&nbsp;</td>
          </tr>
        </table>
        <br>
        <div class="row">
        <!-- col-xs-12 style="float: none; display: block; margin-left: auto; margin-right: auto;"-->
          <div class="col-xs-6">
            <div class="col-xs-3">
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#modalFiltro"><span class="glyphicon glyphicon-search"></span> Filtrar Tabla</button>
            </div>
            <div class="col-xs-3">
              <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#modalFiltro"><span class="glyphicon glyphicon-export"></span> Exportar</button>
            </div>
          </div>
        </div>
        <div id="modalFiltro" class="collapse">
          <div class="row">
            <div class="col-xs-12">
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Folio</label>
                    <p id="filtroFolio"></p>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Fecha Ingreso</label>
                    <p id="filtroFecha"></p>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Fecha Agenda</label>
                    <p id="filtroAgenda"></p>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Cliente</label>
                    <p id="filtroCliente"></p>
                </div>
              </div>
            </div>

            <div class="col-xs-12">
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Comuna</label>
                    <p id="filtroComuna"></p>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Aliado Responsable</label>
                    <p id="filtroAliado"></p>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Tipo Trabajo</label>
                    <p id="filtroTrabajo"></p>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Estado</label>
                    <p id="filtroEstado"></p>
                </div>
              </div>
            </div>

            <div class="col-xs-12">
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso">Estado Admin</label>
                    <p id="filtroAdmin"></p>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="form-group has-feedback">
                    <label for="in_ingreso"></label>
                    <p id="filtroBoton"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <table id="ordenes" border="0" cellpadding="0" cellspacing="0" width="100%" class="pretty">
          <thead>
            <tr>
              <th>Folio</th>
              <th>Fecha Ingreso</th>
              <th>Fecha Agenda</th>
              <th></th>
              <th>Cliente</th>
              <th>Region-Comuna</th>
              <th>Aliado</th>
              <th>Tipo Trabajo</th>
              <th>Estado</th>
              <th>Estado Despacho</th>
              <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Folio</th>
              <th>Fecha Ingreso</th>
              <th>Fecha Agenda</th>
              <th></th>
              <th>Cliente</th>
              <th>Region-Comuna</th>
              <th>Aliado</th>
              <th>Tipo Trabajo</th>
              <th>Estado</th>
              <th>Estado Despacho</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
            <?php
              if(json_decode($regordenes)){
                foreach (json_decode($regordenes) as $orden) {
                  # code...
                  $nrofolio = base64_encode($orden->folio);

                  if($orden->estado_adm==1){
                    $adm_estado = 'Cerrada';
                  }else{
                    $adm_estado = 'Abierta';
                  }

                  if($orden->fecha_agenda==null){
                    $f_agenda = 'Sin Agenda';
                  }else{
                    $f_agenda = $orden->fecha_agenda;
                  }

                  if($f_agenda == date('Y-m-d')){
                    $f_color = 'success';
                  }elseif($f_agenda < date('Y-m-d')){
                    $f_color = 'danger';
                  }elseif($f_agenda > date('Y-m-d') && !($f_agenda == 'Sin Agenda' || $f_agenda == null || $f_agenda == "")){
                    $f_color = 'warning';
                  }elseif($f_agenda == 'Sin Agenda' || $f_agenda == null || $f_agenda == ""){
                    $f_color = 'info';
                  }

                  // style="background-color: '.$f_color.';"
                  echo '<tr>';
                  echo '<td>'.$orden->folio.'</td>';
                  echo '<td>'.$orden->fecha_ingreso.'</td>';
                  echo '<td>'.$f_agenda.'</td>';
                  echo '<td><button type="button" class="btn btn-block btn-'.$f_color.' btn-xs"><span class="fa fa-clock-o"></span></button></td>';
                  echo '<td>'.$orden->cliente.'</td>';
                  //echo '<td>'.$orden->fono_cli.'</td>';
                  echo '<td>'.$orden->reg_comu.'</td>';
                  echo '<td>'.$orden->aliado.'</td>';
                  echo '<td>'.$orden->tipo_trabajo.'</td>';
                  echo '<td>'.$orden->estado.'</td>';
                  echo '<td>'.$adm_estado.'</td>';

                  if($this->session->userdata('TIPOUSUARIO') == 1 || $this->session->userdata('TIPOUSUARIO') == 2){
                    $p_row = '<a href="orden/editarIngreso/'.$nrofolio.'"><button type="button" title="Editar Orden" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></button></a>';
                  }else{
                    $p_row = '<a href="editarIngreso/'.$nrofolio.'"><button type="button" title="Editar Orden" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></button></a>';
                  }

                  if($this->session->userdata('TIPOUSUARIO')==1 || $this->session->userdata('TIPOUSUARIO')==2){
                    if($orden->estado_adm==1){
                      $p_adm = '<button type="button" title="Cerrar Orden" class="btn btn-warning btn-xs" id="btnPreview" disabled><span class="glyphicon glyphicon-ok"></span></button>&nbsp;';
                    }else{
                      $p_adm = '<button type="button" title="Cerrar Orden" class="btn btn-warning btn-xs" id="btnPreview" onclick="setFolio('."'".$nrofolio."'".');cerrarOrden();"><span class="glyphicon glyphicon-ok"></span></button>&nbsp;';
                    }

                  }else{
                    $p_adm = null;
                  }

                  echo '<td>'.
                        '<button type="button" title="Ver Orden" class="btn btn-info btn-xs" id="btnPreview" onclick="verPreview('."'".$nrofolio."'".')" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open"></span></button>&nbsp;'.
                        $p_adm.
                        $p_row.
                        '</td>';
                  echo '</tr>';
                }
              }
            ?>
          </tbody>
        </table>

        <!--</div>-->
        <!--INICIO MOSTRAR DATA BOTON VER-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                        <h4 class="modal-title" id="myModalLabel">Visualizacion Datos Folio</h4>
                    </div>
                    <div class="modal-body">

                        <table>
                          <tr>
                            <td>
                              <div class="form-group has-feedback">
                                  <label for="in_tipo_trabajo">Tipo Trabajo*</label>
                                  <!--<input type="text" id="txtNombreU" name="txtNombreU" placeholder="Ingrese primer nombre" required="required" class="form-control"
                                      oninvalid="this.setCustomValidity('Campo primer nombre obligatorio')" title="Debe ingresar primer nombre de la persona">-->
                                  <input type="text" id="txt_tipo_trabajo" class="form-control" readonly>

                              </div>
                            </td>
                          </tr>
                          <tr>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_proyecto">Proyecto*</label>
                                      <!--<input type="text" id="txtNombreU" name="txtNombreU" placeholder="Ingrese primer nombre" required="required" class="form-control"
                                          oninvalid="this.setCustomValidity('Campo primer nombre obligatorio')" title="Debe ingresar primer nombre de la persona">-->
                                      <input type="text" id="txt_proyecto" class="form-control" readonly>
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
                                      <label for="in_ingreso">Fecha Ingreso*</label>
                                      <!--<input type="text" id="txtApPat" name="txtApPat" placeholder="Ingrese apellido paterno" required="required" class="form-control"
                                          oninvalid="this.setCustomValidity('Campo Apellido Obligatorio')" title="Debe ingresar apellido paterno de la persona" style="width:300px;">-->
                                      <input type="text" id="txt_ingreso" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_entrega">Fecha Agenda*</label>
                                      <!--<input type="text" id="txtApMat" name="txtApMat" placeholder="Ingrese apellido materno" required="required" class="form-control"
                                          oninvalid="this.setCustomValidity('Campo Apellido Obligatorio')" title="Debe ingresar materno paterno de la persona" style="width:300px;">-->
                                      <input type="text" id="txt_entrega" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_bloque_agenda">Bloque Agenda*</label>
                                      <!--<input type="text" id="txtApMat" name="txtApMat" placeholder="Ingrese apellido materno" required="required" class="form-control"
                                          oninvalid="this.setCustomValidity('Campo Apellido Obligatorio')" title="Debe ingresar materno paterno de la persona" style="width:300px;">-->
                                      <input type="text" id="txt_bloque_agenda" class="form-control" readonly>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td colspan="3">
                                  <div class="form-group has-feedback">
                                      <label for="in_cliente">Cliente*</label>
                                      <!--<input type="text" id="txtRut" name="txtRut" placeholder="RUT 12345678-9" required="required" class="form-control"
                                          oninvalid="this.setCustomValidity('Campo Rut Obligatorio')" title="Debe ingresar rut de la persona" maxlength="10" style="width:180px; text-align:center;">-->
                                      <input type="text" id="txt_cliente" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td>
                                  <div class="form-group">
                                    <label for="in_rut">Rut*</label>
                                      <input type="text" id="txt_rut" class="form-control" readonly>
                                    </div>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-group has-feedback">
                                  <label for="in_comuna">Comuna*</label>
                                  <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                  <input type="text" id="txt_comuna" class="form-control" readonly>
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
                                  <input type="text" id="txt_nombre" class="form-control" readonly>
                              </div>
                            </td>
                            <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                            <td>
                              <div class="form-group has-feedback">
                                  <label for="in_fono">Fono*</label>
                                  <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                  <input type="text" id="txt_fono" class="form-control" readonly>
                              </div>
                            </td>
                          </tr>
                          <tr>
                              <td colspan="5">
                                  <div class="form-group has-feedback">
                                      <label for="in_direccion">Direccion*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_direccion" class="form-control" readonly>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_plan_net_adic">Plan Internet Adicional*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_plan_net_adic" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>

                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_plan_fono_adic">Adicional Telefonia 1*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_plan_fono_adic" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_plan_fono_adict">Adicional Telefonia 2*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_plan_fono_adict" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>

                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_plan_tv_adic">Adicional TV 1*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_plan_tv_adic" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_plan_tv_adict">Adicional TV 2*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_plan_tv_adict" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>

                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_deco_basico">Deco Inicial*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_deco_basico" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_deco_hd_basico">Deco Adicional*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_deco_hd_basico" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>

                              </td>
                          </tr>
                          <tr>
                              <td colspan="3">
                                  <div class="form-group has-feedback">
                                      <label for="in_plan_tv_pack">Plan Adicional TV / Plan TV Pack*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_plan_tv_pack" class="form-control" readonly>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td colspan="3">
                                  <div class="form-group has-feedback">
                                      <label for="in_central_tf">Central TF*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_central_tf" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_lineas_asignadas">Lineas Asignadas*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_lineas_asignadas" class="form-control" readonly>
                                  </div>
                              </td>
                          </tr>

                          <tr>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_fecha_operacion">Fecha Operacion*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_fecha_operacion" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_vende">Vende*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_vende" class="form-control" readonly>
                                  </div>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                              <td>
                                  <div class="form-group has-feedback">
                                      <label for="in_estado">Estado*</label>
                                      <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                                      <input type="text" id="txt_estado" class="form-control" readonly>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                            <td colspan="5">
                              <label for="indet_observacion">Observacion*</label>
                              <!--<input type="email" id="txtMail" name="txtMail" placeholder="ingrese@mail.com" required="required" class="form-control" placeholder="Ingrese Email">-->
                              <textarea rows="3" id="txt_observacion" class="form-control" readonly></textarea>
                            </td>
                          </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--FIN MOSTRAR DATA BOTON VER-->

        <!-- INICIO CERRAR ADMIN-->
        <div class="modal fade" id="myModalC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                      <h4 class="modal-title" id="myModalLabel">Cerrar Orden</h4>
                  </div>
                  <div class="modal-body">
                    <center>Esta seguro que desea cerrar esta orden?</center>
                    <input type="hidden" id="txtNroFolioHide"/>
                    <br>
                    <table align="center">
                      <tr>
                        <td>
                          <button type="button" title="Cerrar Orden" class="btn btn-success" id="btnCloseOk" onclick="cerrarOrden()"><span class="glyphicon glyphicon-ok"></span>Cerrar</button>
                        </td>
                        <td>
                          &nbsp;
                        </td>
                        <td>
                          <button type="button" title="Cancelar" class="btn btn-danger" id="btnCloseNo" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                        </td>
                      </tr>
                    </table>
                  </div>
              </div>
          </div>
        </div>
        <!-- FIN CERRAR ADMIN-->

      </div><!-- /.box-body -->
      <div class="box-footer">

      </div><!-- /.box-footer-->
    </div><!-- /.box -->
  </section><!-- /.content -->

  <!-- Modal -->
  <script type="text/javascript">
    $(document).ready(function(){
      $.datepicker.regional[""].dateFormat = 'yy-mm-dd';
      $.datepicker.setDefaults($.datepicker.regional['']);

      $('#ordenes').dataTable({
          "scrollX": false,
          "searching": true,
          "bSort": false,
          "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"//C:\wamp\www\siad_pyme\plugins\datatables\i18n
          },
          "columnDefs": [
            { "width": "1%", "targets": 0 },
            { "width": "2%", "targets": 1 },
            { "width": "2%", "targets": 2 },
            { "width": "3%", "targets": 9 },
            { "width": "10%", "targets": 10 },
            {
              "data": "",
              "defaultContent": ""
            }
          ]/*,
          "aoColumns": [
            { "sWidth": "50px" },
              null,
              null,
              null,
              null,
              null,
              null,
              null,
              null,
              null
          ]*/
      }).columnFilter({
          sPlaceHolder: "head:before",
          aoColumns: [{type: "select", sSelector: "#filtroFolio",},
                      {type: "date-range", sRangeFormat: "Desde {from} hasta {to}", sSelector: "#filtroFecha"},
                      {type: "date-range", sRangeFormat: "Desde {from} hasta {to}", sSelector: "#filtroAgenda"},
                      {sSelector: "#filtroCliente"},
                      {type: "select", sSelector: "#filtroComuna"},
                      {type: "select", sSelector: "#filtroAliado"},
                      {type: "select", sSelector: "#filtroTrabajo"},
                      {type: "select", sSelector: "#filtroEstado"},
                      {type: "select", sSelector: "#filtroAdmin"},
                      null]
      });

      /*.columnFilter({
          //sPlaceHolder: "head:before",
          aoColumns: [{type: "select", sSelector: "#filtroFolio",},
                      {sSelector: "#filtroFecha"},
                      {sSelector: "#filtroAgenda"},
                      {sSelector: "#filtroCliente"},
                      {sSelector: "#filtroComuna"},
                      {sSelector: "#filtroAliado"},
                      {sSelector: "#filtroTrabajo"},
                      {type: "select", sSelector: "#filtroEstado"},
                      {type: "select", sSelector: "#filtroAdmin"},
                      null]
      });*/

      //$("#ordenes").dataTable({});

      /*$("table#ordenes tfoot tr th#cssFolio").find("select").multiselect({
        selectedList: 1,
        multiple: true,
        minWidth: "100",
        height: "auto"
      });*/

      //$("#ui-datepicker-div").datepicker({ dateFormat: 'yy-mm-dd' }).val();
    });

  </script>
