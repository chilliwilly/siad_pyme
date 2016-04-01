<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>

<style type="text/css">
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>

<script src="<?php echo base_url();?>js/JsonSubirArchivo.js"></script>
<!-- Main content -->
<!--<form name="uploadform" id="uploadform" role="form">  -->
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

                <!--<input type="file" id="fileupload">
                <br>
                <input type="submit" class="btn btn-primary" value="Subir Archivo" />
                <br>
                <div id="files"></div>-->

                <!--<code>-->
                <!--<?php if($upload_data != ''):?>
                <?php var_dump($upload_data);?>-->

                <!--</code>-->
                <!--<img scr="<?php echo $upload_data['full_path'];?>">
                <?php endif;?>-->

                <!--<?php if($names != ''):?>
                <?php var_dump($names[0]);?>
                <?php endif;?>-->
                
                <!--<input type="file" name="userfile" size="20" />-->
                <?php echo form_open_multipart('subir_data_sga/subir_sga');?>
                <span class="btn btn-primary btn-file">
                    Buscar Archivo <input type="file" name="userfile" size="20"/>
                </span>
                <br />
                <div id="nomfile"></div>
                <br /><br />
                <input type="submit" value="Subir Archivo" class="btn btn-primary" />

              </div>
          </div>

        </div>

      </div><!-- /.box-body -->

      <div class="box-footer">

      </div><!-- /.box-footer-->
    </div><!-- /.box -->

  </section><!-- /.content -->
<!--</form>-->

<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">    

  $(document).ready(function(){
    //Titulo Pagina
    $(".box-title").html("Subir Data SGA");

    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        //console.log(numFiles);
        //console.log(label);
        $("#nomfile").append(label);
    });    
  });

  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

</script>