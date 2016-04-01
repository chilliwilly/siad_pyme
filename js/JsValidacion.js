function validarEmail(email) {
    // expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    // if(email.length!=0){
    //     if (!expr.test(email)){
    //         document.getElementById('validamail').value="1";
    //         document.getElementById('mensaje').innerHTML = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>El Correo: <strong>"+ email + "</strong>, es Incorrecto</div>";
    //         return false;
    //     }else{
    //         document.getElementById('validamail').value="0";
    //         document.getElementById('mensaje').innerHTML = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>El Correo: <strong>"+ email + "</strong>, Es Correcto</div>";
    //         return true;
    //     }
    // }
    document.getElementById('validausuario').value="0";
    return true;
}

function validarn(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
	 if (tecla==9) return true; // 3
	 if (tecla==11) return true; // 3
    patron = /[A-Za-zñÑ'áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛÑñäëïöüÄËÏÖÜ\s\t]/; // 4
 
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function letras(key){
    window.console.log(key.charCode)
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 
                )
                return false;
}

function SoloNumerosDecimales3(e, valInicial, nEntero, nDecimal) {
    var obj = e.srcElement || e.target;
    var tecla_codigo = (document.all) ? e.keyCode : e.which;
    var tecla_valor = String.fromCharCode(tecla_codigo);
    var patron2 = /[\d.]/;
    var control = (tecla_codigo === 46 && (/[.]/).test(obj.value)) ? false : true;
    var existePto = (/[.]/).test(obj.value);

    //el tab
    if (tecla_codigo === 8)
        return true;

    if (valInicial !== obj.value) {
        var TControl = obj.value.length;
        if (existePto === false && tecla_codigo !== 46) {
            if (TControl === nEntero) {
                obj.value = obj.value + ".";
            }
        }

        if (existePto === true) {
            var subVal = obj.value.substring(obj.value.indexOf(".") + 1, obj.value.length);

            if (subVal.length > 1) {
                return false;
            }
        }

        return patron2.test(tecla_valor) && control;
    }
    else {
        if (valInicial === obj.value) {
            obj.value = '';
        }
        return patron2.test(tecla_valor) && control;
    }
}

function validarNumeros(evt) { // 1
		var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
}

function Codificar(pwd){
    var Base64 = {

        _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",


        encode: function(input) {
            var output = "";
            var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
            var i = 0;

            input = Base64._utf8_encode(input);

            while (i < input.length) {

                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);

                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;

                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }

                output = output + this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) + this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

            }

            return output;
        },


        decode: function(input) {
            var output = "";
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;

            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

            while (i < input.length) {

                enc1 = this._keyStr.indexOf(input.charAt(i++));
                enc2 = this._keyStr.indexOf(input.charAt(i++));
                enc3 = this._keyStr.indexOf(input.charAt(i++));
                enc4 = this._keyStr.indexOf(input.charAt(i++));

                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;

                output = output + String.fromCharCode(chr1);

                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }

            }

            output = Base64._utf8_decode(output);

            return output;

        },

        _utf8_encode: function(string) {
            string = string.replace(/\r\n/g, "\n");
            var utftext = "";

            for (var n = 0; n < string.length; n++) {

                var c = string.charCodeAt(n);

                if (c < 128) {
                    utftext += String.fromCharCode(c);
                }
                else if ((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
                }
                else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
                }

            }

            return utftext;
        },

        _utf8_decode: function(utftext) {
            var string = "";
            var i = 0;
            var c = c1 = c2 = 0;

            while (i < utftext.length) {

                c = utftext.charCodeAt(i);

                if (c < 128) {
                    string += String.fromCharCode(c);
                    i++;
                }
                else if ((c > 191) && (c < 224)) {
                    c2 = utftext.charCodeAt(i + 1);
                    string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                    i += 2;
                }
                else {
                    c2 = utftext.charCodeAt(i + 1);
                    c3 = utftext.charCodeAt(i + 2);
                    string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    i += 3;
                }

            }

            return string;
        }

    }

    return Base64.encode(pwd);
}