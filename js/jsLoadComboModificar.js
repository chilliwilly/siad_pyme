$(document).ready(function(){
	$(window).load(function(){
		if($("#id_trabajo").val()!=null && $("#id_comuna").val()!=null && $("#id_estado").val()!=null){
	  		//alert($("#id_trabajo").val()+' '+$("#id_comuna").val()+' '+$("#id_estado").val());
		  	var idt = $("#id_trabajo").val();
		  	var idc = $("#id_comuna").val();
		  	var ide = $("#id_estado").val();

		  	//$('#in_tipo_trabajo option[value="'+idt+'"]').prop('selected',true);
		  	$("#in_tipo_trabajo").val(idt);
		  	$("#in_comuna").val(idc);
		  	$("#in_estado").val(ide);
		}   
	});
});