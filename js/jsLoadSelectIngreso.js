$(document).ready(function(){
	//LOAD DE COMUNAS
	var comuna = $("#in_comuna");
	comuna.append("<option value='0'>Cargando Comunas...</option>");
	$.getJSON(baseurl + "Ingreso/comunas",function(objetosretorna1){
		comuna.empty();
		comuna.append("<option value='0'>Elige Comuna...</option>");
		$.each(objetosretorna1, function(i,ObjetoReturn1){
			var seleccion1 = "";
			if(num_comuna==ObjetoReturn1.id_comuna){
				seleccion1 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn1.id_comuna+"' "+seleccion1+">" + ObjetoReturn1.comuna+"</option>";
			comuna.append(nuevaFila);			
		});
		comuna.selectpicker('refresh');
	});

	$("#in_comuna").change(function(){
		var comuna = $("#in_comuna").val();
	});

	//LOAD DE TIPOS DE TRABAJO
	var ttrabajo = $("#in_tipo_trabajo");
	ttrabajo.append("<option value='0'>Cargando Trabajos...</option>");
	$.getJSON(baseurl + "Ingreso/ttrabajos",function(objetosretorna2){
		ttrabajo.empty();
		ttrabajo.append("<option value='0'>Elige Trabajo...</option>");
		$.each(objetosretorna2, function(i,ObjetoReturn2){
			var seleccion2 = "";
			if(num_trabajo==ObjetoReturn2.tt_id){
				seleccion2 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn2.tt_id+"' "+seleccion2+">" + ObjetoReturn2.tt_nombre+"</option>";
			ttrabajo.append(nuevaFila);
		});
		ttrabajo.selectpicker('refresh');
	});

	$("#in_tipo_trabajo").change(function(){
		var ttrabajo = $("#in_tipo_trabajo").val();
	});

	//LOAD ESTADO ACTIVIDADES
	var testado = $("#in_estado");
	testado.append("<option value='0'>Cargando Estados...</option>");
	$.getJSON(baseurl + "Ingreso/testados",function(objetosretorna3){
		testado.empty();
		testado.append("<option value='0'>Elige Estado...</option>");
		$.each(objetosretorna3, function(i,ObjetoReturn3){
			var seleccion3 = "";
			if(num_estado==ObjetoReturn3.est_id){
				seleccion3 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn3.est_id+"' "+seleccion3+">" + ObjetoReturn3.est_descripcion+"</option>";
			testado.append(nuevaFila);
		});
		testado.selectpicker('refresh');
	});

	$("#in_estado").change(function(){
		var testado = $("#in_estado").val();
	});

	//LOAD BLOQUES
	var tbloque = $("#in_bloque_agenda");
	tbloque.append("<option value='0'>Cargando Bloques...</option>");
	$.getJSON(baseurl + "Ingreso/bloques",function(objetosretorna4){
		tbloque.empty();
		tbloque.append("<option value='0'>Elige Bloque...</option>");
		$.each(objetosretorna4, function(i,ObjetoReturn4){
			var seleccion4 = "";
			if(num_bloque==ObjetoReturn4.bloque_id){
				seleccion4 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn4.bloque_id+"' "+seleccion4+">" + ObjetoReturn4.bloque_descripcion+"</option>";
			tbloque.append(nuevaFila);
		});
		tbloque.selectpicker('refresh');
	});

	$("#in_bloque_agenda").change(function(){
		var tbloque = $("#in_bloque_agenda").val();
	});
});