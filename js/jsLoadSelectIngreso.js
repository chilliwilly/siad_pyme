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

	//LOAD DECODIFICADORES in_deco_basico
	var tdeco = $("#in_deco_basico");
	tdeco.append("<option value='0'>Cargando Decos...</option>");
	$.getJSON(baseurl + "Ingreso/decos",function(objetosretorna5){
		tdeco.empty();
		tdeco.append("<option value='0'>Elige Deco...</option>");
		$.each(objetosretorna5, function(i,ObjetoReturn5){
			var seleccion5 = "";
			if(num_deco==ObjetoReturn5.deco_id){
				seleccion5 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn5.deco_id+"' "+seleccion5+">" + ObjetoReturn5.deco_nombre+"</option>";
			tdeco.append(nuevaFila);
		});
		tdeco.selectpicker('refresh');
	});

	$("#in_deco_basico").change(function(){
		var tdeco = $("#in_deco_basico").val();
	});

	//LOAD PLANES
	var tplan = $("#in_plan_net");
	tplan.append("<option value='0'>Cargando Planes...</option>");
	$.getJSON(baseurl + "Ingreso/planes",function(objetosretorna6){
		tplan.empty();
		tplan.append("<option value='0'>Elige Plan...</option>");
		$.each(objetosretorna6, function(i,ObjetoReturn6){
			var seleccion6 = "";
			if(num_plan==ObjetoReturn6.plan_id){
				seleccion6 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn6.plan_id+"' "+seleccion6+">" + ObjetoReturn6.plan_alta+"</option>";
			tplan.append(nuevaFila);
		});
		tplan.selectpicker('refresh');
	});

	$("#in_plan_net").change(function(){
		var tplan = $("#in_plan_net").val();
	});

	//LOAD COMBO CENTRAL TF in_central_tf
	var ctf = $("#in_central_tf");
	ctf.append("<option value='0'>Cargando Combos...</option>");
	$.getJSON(baseurl + "Ingreso/centrales",function(objetosretorna7){
		ctf.empty();
		ctf.append("<option value='0'>Elige Combo...</option>");
		$.each(objetosretorna7, function(i,ObjetoReturn7){
			var seleccion7 = "";
			if(num_central==ObjetoReturn7.ctf_id){
				seleccion7 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn7.ctf_id+"' "+seleccion7+">" + ObjetoReturn7.ctf_descripcion+"</option>";
			ctf.append(nuevaFila);
		});
		ctf.selectpicker('refresh');
	});

	$("#in_central_tf").change(function(){
		var ctf = $("#in_central_tf").val();
	});

	//LOAD COMBO TIPO REAPRACION
	var repa = $("#in_tiporep");
	repa.append("<option value='0'>Cargando Tipos...</option>");
	$.getJSON(baseurl + "Ingreso/reparaciones",function(objetosretorna8){
		repa.empty();
		repa.append("<option value='0'>Elige Tipo...</option>");
		$.each(objetosretorna8, function(i,ObjetoReturn8){
			var seleccion8 = "";
			if(num_tiporep==ObjetoReturn8.rt_id){
				seleccion8 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn8.rt_id+"' "+seleccion8+">" + ObjetoReturn8.rt_descripcion+"</option>";
			repa.append(nuevaFila);
		});
		repa.selectpicker('refresh');
	});

	$("#in_tiporep").change(function(){
		var repa = $("#in_tiporep").val();
	});

	//LOAD COMBO CODIGO REPARACIONES
	var codrep = $("#in_codrep");
	codrep.append("<option value='0'>Cargando Cierres...</option>");
	$.getJSON(baseurl + "Ingreso/codcierres",function(objetosretorna9){
		codrep.empty();
		codrep.append("<option value='0'>Elige Cierre...</option>");
		$.each(objetosretorna9, function(i,ObjetoReturn9){
			var seleccion9 = "";
			if(num_tiporep==ObjetoReturn9.rt_id){
				seleccion9 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn9.vt_codigo+"' "+seleccion9+">" + ObjetoReturn9.vt_descripcion+"</option>";
			codrep.append(nuevaFila);
		});
		codrep.selectpicker('refresh');
	});

	$("#in_tiporep").change(function(){
		var codrep = $("#in_codrep").val();
	});

	//LOAD COMBO TIPO FALLAS
	var tipofalla = $("#in_falla");
	tipofalla.append("<option value='0'>Cargando Fallas...</option>");
	$.getJSON(baseurl + "Ingreso/tipofallas",function(objetosretorna0){
		tipofalla.empty();
		tipofalla.append("<option value='0'>Elige Falla...</option>");
		$.each(objetosretorna0, function(i,ObjetoReturn0){
			var seleccion0 = "";
			if(num_falla==ObjetoReturn0.tfa_id){
				seleccion0 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn0.tfa_id+"' "+seleccion0+">" + ObjetoReturn0.tfa_descripcion+"</option>";
			tipofalla.append(nuevaFila);
		});
		tipofalla.selectpicker('refresh');
	});

	$("#in_falla").change(function(){
		var tipofalla = $("#in_falla").val();
	});

	//LOAD COMBO CANAL DE VENTAS
	var canalv = $("#in_canal_venta");
	canalv.append("<option value='0'>Cargando Canales...</option>");
	$.getJSON(baseurl + "Ingreso/canalventas",function(objetosretorna11){
		canalv.empty();
		canalv.append("<option value='0'>Elige Canal...</option>");
		$.each(objetosretorna11, function(i,ObjetoReturn11){
			var seleccion11 = "";
			if(num_canal==ObjetoReturn11.tcv_id){
				seleccion11 = "selected='selected'";
			}
			var nuevaFila = "<option value='"+ObjetoReturn11.tcv_id+"' "+seleccion11+">" + ObjetoReturn11.tcv_nombre+"</option>";
			canalv.append(nuevaFila);
		});
		canalv.selectpicker('refresh');
	});

	$("#in_canal_venta").change(function(){
		var canalv = $("#in_canal_venta").val();
	});
});
