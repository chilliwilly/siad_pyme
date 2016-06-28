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

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url()?>js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url()?>lib/sweet-alert.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jsBuscarPorFolio.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/JsOrdenPreview.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/JsValidacion.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/sdatatables/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/i18n/datepicker-es.js"></script>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Busqueda por Folio</h3>
    </div>

    <div class="box-body">
      <div id="mensaje"></div>
      <!--<div class="box box-primary">-->
      <!-- TABLA CON LEYENDAS DE LOS ICONOS -->
      <div class="row">
        <div class="col-xs-12">
          <div class="input-group input-group">
            <input type="text" id="txtFoliosIn" class="form-control" placeholder="INGRESE UN NUMERO DE FOLIO">
            <span class="input-group-btn">
              <button id="btnBuscarFolios" type="button" class="btn btn-info btn-flat">Buscar!</button>
            </span>
          </div>
        </div>
      </div>

      <br>

      <div class="row">
      <!-- col-xs-12 style="float: none; display: block; margin-left: auto; margin-right: auto;"-->
        <div class="col-xs-6">
          <div class="col-xs-3">
            <!--<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#modalFiltro"><span class="glyphicon glyphicon-search"></span> Filtrar Tabla</button>-->
          </div>
        </div>
      </div>
      <!-- FILTRO DATATABLE ORDENES -->
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
                  <label for="in_ingreso">Comuna</label>
                  <p id="filtroComuna"></p>
              </div>
            </div>
          </div>

          <div class="col-xs-12">
            <div class="col-xs-3">
              <div class="form-group has-feedback">
                  <label for="in_ingreso">Cliente</label>
                  <p id="filtroCliente"></p>
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
                  <label for="in_ingreso">Estado Despacho</label>
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
      <!-- DATATABLE CON ORDENES -->
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
            <th>Estado Orden</th>
            <th>Estado CCOM</th>
            <th></th>
            <!--
            <th>Tipo Reparacion</th>
            <th>Tipo Cierre</th>
            <th>Tipo Falla</th>
            <th>Canal Venta</th>
            <th>Plan Nombre</th>
            <th>Plan ID</th>
            <th>Hora Ingreso</th>
            <th>Nombre Cliente</th>
            <th>Rut Cliente</th>
            <th>Dir Cliente</th>
            <th>Dir Cliente Traslado</th>
            <th>Nombre Ingresa</th>-->
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
            <th>Estado Orden</th>
            <th>Estado CCOM</th>
            <th></th>
            <!--
            <th>Tipo Reparacion</th>
            <th>Tipo Cierre</th>
            <th>Tipo Falla</th>
            <th>Canal Venta</th>
            <th>Plan Nombre</th>
            <th>Plan ID</th>
            <th>Hora Insert</th>
            <th>Nombre Cliente</th>
            <th>Rut Cliente</th>
            <th>Dir Cliente</th>
            <th>Dir Cliente Traslado</th>
            <th>Nombre Ingresa</th>-->
          </tr>
        </tfoot>
        <tbody>
          <!-- se llena con el response del ajax -->
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
    $.datepicker.setDefaults({
      changeMonth: true
    });
    $.datepicker.regional[''].dateFormat = 'yy-mm-dd';

    $('#ordenes').dataTable({
        "scrollX": false,
        "searching": true,
        "bSort": false,
        "language": {
          "url": baseurl.concat("js/i18n/Spanish.json").replace('index.php/','') //"//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"//C:\wamp\www\siad_pyme\plugins\datatables\i18n
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
          }/*,
          {
            "targets": [11,12,13,14,15,16,17,18,19,20,21,22],
            "visible": false,
            "searchable": false
          }*/
        ]
    }).columnFilter({
        sPlaceHolder: "head:before",
        aoColumns: [{sSelector: "#filtroFolio",},
                    {type: "date-range", sRangeFormat: "Desde {from} hasta {to}", sSelector: "#filtroFecha"},
                    {type: "date-range", sRangeFormat: "Desde {from} hasta {to}", sSelector: "#filtroAgenda"},
                    null,
                    {type: "select", sSelector: "#filtroCliente"},
                    {type: "select", sSelector: "#filtroComuna"},
                    {type: "select", sSelector: "#filtroAliado"},
                    {type: "select", sSelector: "#filtroTrabajo"},
                    {type: "select", sSelector: "#filtroEstado"},
                    {type: "select", sSelector: "#filtroAdmin"},
                    null]
    });
  });

</script>
