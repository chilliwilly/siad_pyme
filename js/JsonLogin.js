$(document).ready(function(){
	$("#txtUsuario").focus();
	$("form#loginform").submit(function()
	{ 
		var usuario  = $('input#validausuario').val();
		if(usuario=="1"){
				$("#mensaje").html("<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>El usuario no es valido</div>");
				$("#txtUsuario").focus();
				return false;
		}else{
			$("#mensaje").append("<div class='modal1'><div class='center1'> <center> <img src='"+ baseurl +"/img/gif-load.gif'> Iniciando Sessión...</center></div></div>");
			var Login 		 = new Object();
			Login.UserName   = $('input#txtUsuario').val();
			Login.Password   = Codificar($('input#txtPassword').val());			
			var DatosJson = JSON.stringify(Login);
			$.post(baseurl + 'Login/ValidaAcceso',
			{ 
				LoginPost: DatosJson
			},
			function(data, textStatus) {
				$("#"+data.campo+"").focus();
				$("#mensaje").html(data.error_msg);
			}, 
			"json"		
			);
			return false;
		}
	});	
});