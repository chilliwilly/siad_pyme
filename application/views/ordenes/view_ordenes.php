  <style type="text/css">
    .sorting, .sorting_asc, .sorting_desc {
        background : none;
    }
  </style>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Ordenes en Trabajo</h3>
      </div>
      <div class="box-body">

        <!--<div class="box box-primary">-->
          <table id="ordenes" border="0" cellpadding="0" cellspacing="0" width="100%" class="pretty">
            <thead>
              <tr>

                <th>Folio</th>
                <th>Fecha Ingreso</th>
                <th>Cliente</th>
                <!--<th>Fono</th>-->
                <th>Region-Comuna</th>
                <th>Aliado</th>
                <th>Tipo Trabajo</th>
                <th>Estado</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                if(json_decode($regordenes)){
                  foreach (json_decode($regordenes) as $orden) {
                    # code...
                    $nrofolio = base64_encode($orden->folio);

                    echo '<tr>';
                    echo '<td>'.$orden->folio.'</td>';
                    echo '<td>'.$orden->fecha_ingreso.'</td>';
                    echo '<td>'.$orden->cliente.'</td>';
                    //echo '<td>'.$orden->fono_cli.'</td>';
                    echo '<td>'.$orden->reg_comu.'</td>';
                    echo '<td>'.$orden->aliado.'</td>';
                    echo '<td>'.$orden->tipo_trabajo.'</td>';
                    echo '<td>'.$orden->estado.'</td>';

                    if($this->session->userdata('TIPOUSUARIO') == 1){
                      $p_row = '<a href="orden/editarIngreso/'.$nrofolio.'"><button type="button" title="Editar Orden" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></button></a>';
                    }else{
                      $p_row = '<a href="editarIngreso/'.$nrofolio.'"><button type="button" title="Editar Orden" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></button></a>'; 
                    }

                    echo '<td>'.                          
                          '<a href="productos/editarProducto/'.$nrofolio.'"><button type="button" title="Ver Orden" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></a>'.
                          $p_row.                          
                          '</td>';
                    echo '</tr>';
                  }
                }else{
                  echo '<tr><td colspan=9><center>No Existen Ordenes Para Mostrar</center></td></tr>';
                }
              ?>
            </tbody>
          </table>
        <!--</div>-->

      </div><!-- /.box-body -->
      <div class="box-footer">

      </div><!-- /.box-footer-->
    </div><!-- /.box -->
  </section><!-- /.content -->

  <script type="text/javascript">

    $(document).ready(function(){
      $('#ordenes').dataTable({
          "scrollX": true,
          "searching": false,
          "bSort": false
      });
    });

  </script>