$(document).ready(function(){
	$("#chksd").on('click',function(){
    	if($(this).is(":checked")){      
      		$("#txtChksd").prop('disabled',false);
      		return;
    	}
    	$("#txtChksd").prop('disabled',true);
    	$("#txtChksd").val("0");
  	});

	$("#chkhd").on('click',function(){
	    if($(this).is(":checked")){      
	      $("#txtChkhd").prop('disabled',false);
	      return;
	    }
	    $("#txtChkhd").prop('disabled',true);
	    $("#txtChkhd").val("0");
  	});

	$("#chktvr").on('click',function(){
	    if($(this).is(":checked")){      
	      $("#txtChktvr").prop('disabled',false);
	      return;
	    }
	    $("#txtChktvr").prop('disabled',true);
	    $("#txtChktvr").val("0");
	});

	$("#chkstn").on('click',function(){
	    if($(this).is(":checked")){      
	      $("#txtChkstn").prop('disabled',false);
	      return;
	    }
	    $("#txtChkstn").prop('disabled',true);
	    $("#txtChkstn").val("0");
	}); 
});