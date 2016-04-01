<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-u.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles-u.css">
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

              <h3>Your file was successfully uploaded!</h3>
              <ul>
              <?php foreach ($upload_data as $item => $value):?>
              <li><?php echo $item;?>: <?php echo $value;?></li>
              <?php endforeach; ?>
              </ul>
              <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>              

              </form>

            </div>
        </div>

      </div>

    </div><!-- /.box-body -->

    <div class="box-footer">

    </div><!-- /.box-footer-->
  </div><!-- /.box -->

</section><!-- /.content --></form>

<!-- Load jQuery and the necessary widget JS files to enable file upload -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.fileupload.js"></script>

<!-- InputMask -->
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">    

  $(document).ready(function(){
        //Titulo Pagina
        $(".box-title").html("Subir Data SGA Relizado!");

        'use strict';
                    
        // Define the url to send the image data to
        var url = 'files.php';
        
        // Call the fileupload widget and set some parameters
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                // Add each uploaded file name to the #files list
                $.each(data.result.files, function (index, file) {
                    $('<li/>').text(file.name).appendTo('#files');
                });
            },
            progressall: function (e, data) {
                // Update the progress bar while files are being uploaded
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            }
        });
  });

</script>