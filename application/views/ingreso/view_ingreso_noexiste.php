<style type="text/css">
	th, td { 
		white-space: nowrap; 
	}

    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
</style>

<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>

<!-- Main content -->
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

	        	<table id="listafolio" border="0" cellpadding="0" cellspacing="0" width="100%" class="pretty">
	        		<thead>
        				<th width="15px">
        					Agregar
        				</th>
	        			<th>
	        				Folio
	        			</th>
	        		</thead>
	        		<tbody>
	        			<?php
	        			
	        				if(json_decode($fromsga)){
	        					foreach (json_decode($fromsga) as $sga) {
	        						# code...
	        						echo '<tr>';
	        						echo '<td width="15px" style="text-align:center;"><a href="ingreso/nuevo/'.base64_encode($sga->folio_faltante).'"><button type="button" title="Editar Folio" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-floppy-open"></span></button></a> &nbsp;</td>';
	        						echo '<td>'.$sga->folio_faltante.'</td>';
		        					echo '</tr>';
	        					}	        					
	        				}else{
	        					echo '<tr><td colspan=9><center>No Existe Informacion</center></td></tr>';
	        				}

	        			?>
	        		</tbody>
	        	</table>

	        </div>

	          
	    </div>
          
      </div>

    </div><!-- /.box-body -->

    <div class="box-footer">

    </div><!-- /.box-footer-->
  </div><!-- /.box -->

</section><!-- /.content -->

<script type="text/javascript">    

  $(document).ready(function(){
        //Titulo Pagina
        $(".box-title").html("Datos SGA Faltantes");

        //Tabla para lista de folios faltantes
        $('#listafolio').dataTable({
	        "scrollX": true
	    });
  });

</script>