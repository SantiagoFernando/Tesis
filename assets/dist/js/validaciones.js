//Validacion para letras solo en mayusculas
function mayus(e) {
    e.value = e.value.toUpperCase();
}

//Validacion para letras solo en minusculas
function minus(e) {
    e.value = e.value.toLowerCase();
}

//Solo ingresar las letras
function sololetras(evento) {
    key = evento.keyCode || evento.which;
    teclado = String.fromCharCode(key).toLocaleLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz ";
    especiales = "8-37-38-46-164";

    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
    }
}

//Solo ingresa valores numericos
function sololnumeros(evento) {
    key = evento.keyCode || evento.which;
    teclado = String.fromCharCode(key).toLocaleLowerCase();
    numero = "0123456789";
    especiales = "37-38-46";

    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (numero.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
    }
}

//Validar los campos vacios
function vacios() {
    var ced = document.frmDatos.txtcedulap;

    if (ced.value == "" || ced.value.length < 10) {
        Swal.fire({
            title: "CEDULA",
            text: "Campos Vacios u Incompletos",
            type: 'information',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar!',
            showLoaderOnConfirm: true,

            allowOutsideClick: false
        });
        return false;
    }
}

//Metodo para validar Cedula
validarDocumento = function() {

        numero = document.getElementById('cedula').value;
        /* alert(numero); */
        var suma = 0;
        var residuo = 0;
        var pri = false;
        var pub = false;
        var nat = false;
        var numeroProvincias = 22;
        var modulo = 11;

        /* Verifico que el campo no contenga letras */
        var ok = 1;
        for (i = 0; i < numero.length && ok == 1; i++) {
            var n = parseInt(numero.charAt(i));
            if (isNaN(n))
                ok = 0;
        }
        if (ok == 0) {
            alert("No puede ingresar caracteres en el número");
            return false;
        }

        if (numero.length < 10) {
            // alert('El número ingresado no es válido'); 
            $("#iconotexto").remove();
            $("#cedula").parent().attr("class", "form-group has-error has-feedback col-sm-9");
            $("#cedula").parent().children('span').text("El número ingresado no es válido").show();
            $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            return false;
        }

        /* Los primeros dos digitos corresponden al codigo de la provincia */
        provincia = numero.substr(0, 2);
        if (provincia < 1 || provincia > numeroProvincias) {
            // alert('El código de la provincia (dos primeros dígitos) es inválido');
            $("#iconotexto").remove();
            $("#cedula").parent().attr("class", "form-group has-error has-feedback");
            $("#cedula").parent().children('span').text("El código de la provincia (dos primeros dígitos) es inválido").show();
            $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            return false;
        }
        /* Aqui almacenamos los digitos de la cedula en variables. */
        d1 = numero.substr(0, 1);
        d2 = numero.substr(1, 1);
        d3 = numero.substr(2, 1);
        d4 = numero.substr(3, 1);
        d5 = numero.substr(4, 1);
        d6 = numero.substr(5, 1);
        d7 = numero.substr(6, 1);
        d8 = numero.substr(7, 1);
        d9 = numero.substr(8, 1);
        d10 = numero.substr(9, 1);

        /* El tercer digito es: */
        /* 9 para sociedades privadas y extranjeros */
        /* 6 para sociedades publicas */
        /* menor que 6 (0,1,2,3,4,5) para personas naturales */
        if (d3 == 7 || d3 == 8) {
            // alert('El tercer dígito ingresado es inválido'); 
            $("#iconotexto").remove();
            $("#cedula").parent().attr("class", "form-group has-error has-feedback");
            $("#cedula").parent().children('span').text("El tercer dígito ingresado es inválido.").show();
            $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
            return false;
        }

        /* Solo para personas naturales (modulo 10) */
        if (d3 < 6) {
            nat = true;
            p1 = d1 * 2;
            if (p1 >= 10)
                p1 -= 9;
            p2 = d2 * 1;
            if (p2 >= 10)
                p2 -= 9;
            p3 = d3 * 2;
            if (p3 >= 10)
                p3 -= 9;
            p4 = d4 * 1;
            if (p4 >= 10)
                p4 -= 9;
            p5 = d5 * 2;
            if (p5 >= 10)
                p5 -= 9;
            p6 = d6 * 1;
            if (p6 >= 10)
                p6 -= 9;
            p7 = d7 * 2;
            if (p7 >= 10)
                p7 -= 9;
            p8 = d8 * 1;
            if (p8 >= 10)
                p8 -= 9;
            p9 = d9 * 2;
            if (p9 >= 10)
                p9 -= 9;
            modulo = 10;
        }
        /* Solo para sociedades publicas (modulo 11) */
        /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
        else if (d3 == 6) {
            pub = true;
            p1 = d1 * 3;
            p2 = d2 * 2;
            p3 = d3 * 7;
            p4 = d4 * 6;
            p5 = d5 * 5;
            p6 = d6 * 4;
            p7 = d7 * 3;
            p8 = d8 * 2;
            p9 = 0;
        }

        /* Solo para entidades privadas (modulo 11) */
        else if (d3 == 9) {
            pri = true;
            p1 = d1 * 4;
            p2 = d2 * 3;
            p3 = d3 * 2;
            p4 = d4 * 7;
            p5 = d5 * 6;
            p6 = d6 * 5;
            p7 = d7 * 4;
            p8 = d8 * 3;
            p9 = d9 * 2;
        }

        suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
        residuo = suma % modulo;
        /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
        digitoVerificador = residuo == 0 ? 0 : modulo - residuo;
        /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/
        if (pub == true) {
            if (digitoVerificador != d9) {
                // alert('El ruc de la empresa del sector público es incorrecto.');
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-error has-feedback");
                $("#cedula").parent().children('span').text("El ruc de la empresa del sector público es incorrecto.").show();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                return false;
            } else {
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-success has-feedback");
                $("#cedula").parent().children('span').text("").hide();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                return true;
            }
            /* El ruc de las empresas del sector publico terminan con 0001*/
            if (numero.substr(9, 4) != '0001') {
                // alert('El ruc de la empresa del sector público debe terminar con 0001');
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-error has-feedback");
                $("#cedula").parent().children('span').text("El ruc de la empresa del sector público debe terminar con 0001").show();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                return false;
            } else {
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-success has-feedback");
                $("#cedula").parent().children('span').text("").hide();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                return true;
            }
        } else if (pri == true) {
            if (digitoVerificador != d10) {
                // alert('El ruc de la empresa del sector privado es incorrecto.');
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-error has-feedback");
                $("#cedula").parent().children('span').text("El ruc de la empresa del sector privado es incorrecto.").show();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                return false;
            } else {
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-success has-feedback");
                $("#cedula").parent().children('span').text("").hide();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                return true;
            }
            if (numero.substr(10, 3) != '001') {
                // alert('El ruc de la empresa del sector privado debe terminar con 001');
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-error has-feedback");
                $("#cedula").parent().children('span').text("El ruc de la empresa del sector privado debe terminar con 001").show();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                return false;
            } else {
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-success has-feedback");
                $("#cedula").parent().children('span').text("").hide();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                return true;
            }
        } else if (nat == true) {
            if (digitoVerificador != d10) {
                // alert('El número de cédula de la persona natural es incorrecto.'); 
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-error has-feedback");
                $("#cedula").parent().children('span').text("El numero de cédula de la persona natural es incorrecta").show();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                return false;
            } else {
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-success has-feedback");
                $("#cedula").parent().children('span').text("").hide();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                return true;

            }
            if (numero.length > 10 && numero.substr(10, 3) != '001') {
                // alert('El ruc de la persona natural debe terminar con 001');
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-error has-feedback");
                $("#cedula").parent().children('span').text("El ruc de la persona natural debe terminar con 001").show();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
                return false;

            } else {
                $("#iconotexto").remove();
                $("#cedula").parent().attr("class", "form-group has-success has-feedback col-sm-9");
                $("#cedula").parent().children('span').text("").hide();
                $("#cedula").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
                return true;
            }
        }
        return true;
    }
    //Fin del metodo para validar Cedula