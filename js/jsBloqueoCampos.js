$(document).ready(function(){
  if($("#id_update").val()==1){
    //bloqueo camposde formulario a excepcion de admin o despacho
    if($("#id_usuario").val()>2){
      $("#in_tipo_trabajo").prop('disabled',true);
      $("#in_tiporep").prop('disabled',true);
      $("#in_falla").prop('disabled',true);
      $("#in_cliente").prop('disabled',true);
      $("#in_rut").prop('disabled',true);
      $("#in_nombre").prop('disabled',true);
      $("#in_comuna").prop('disabled',true);
      $("#in_direccion").prop('disabled',true);
      $("#in_direccion_nueva").prop('disabled',true);
      $("#txtFono").prop('disabled',true);
      $("#in_canal_venta").prop('disabled',true);
      $("#in_plan_net").prop('disabled',true);
      $("#in_plan_net_adic").prop('disabled',true);
      $("#in_plan_fono_adic").prop('disabled',true);
      $("#in_plan_fono_adict").prop('disabled',true);
      $("#in_deco_basico").prop('disabled',true);
      $("#in_plan_tv_pack").prop('disabled',true);
      $("#in_central_tf").prop('disabled',true);
    }
  }
});
