<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!---->
<script src="<?php echo base_url(); ?>assets/pluginfechas/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/pluginfechas/js/bootstrap-datepicker.es.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/template/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- bootstrap datepicker -->
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Jquery-ui -->
<script src="<?php echo base_url(); ?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- Jquery-ui -->
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
<!-- Mensajes De Alerta -->
<script src="<?php echo base_url(); ?>assets/pluginmensajes/dist/sweetalert2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-print.js"></script>
//Traemos los JS nuevos
<script src="<?php echo base_url(); ?>assets/dist/js/Buttons_for_DataTables _1.5.6.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/FlashexportbuttonsforButtonsandDataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/JSZipv3.1.3.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/pdfmakev0.1.53.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/Printbutton.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/vfs.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/HTML5exportbuttons.js"></script>

<!--Libreroas de Las Diferentes Vistas-->
<script src="<?php echo base_url(); ?>assets/dist/js/categorisacion.js"></script>

<script src="<?php echo base_url(); ?>assets/dist/js/equipos.js"></script>

<script src="<?php echo base_url(); ?>assets/dist/js/prestamos.js"></script>

<script src="<?php echo base_url(); ?>assets/dist/js/alquilantes.js"></script>

<script src="<?php echo base_url(); ?>assets/dist/js/validaciones.js"></script>

<script>
  $(document).ready(function() {
    var base_url = "<?php echo base_url(); ?>";
    $('.sidebar-menu').tree();
    $('#fecha').datepicker({
      language: "es",
      dateFormat: "yy-mm-dd",
    });

    $('#fecha2').datepicker({
      language: "es",
      dateFormat: "yy-mm-dd",
    });

    //Llenado de Select dependiendo dentro de otro Select
    $('#categoria').on('change', function() {
      var idcategoria = $(this).val();
      if (idcategoria == "") {
        $('#equipos').prop('disabled', true);
      } else {
        $('#equipos').prop('disabled', false);
      }

      $.ajax({
        url: base_url + "prestamos/ctprestamo/getTodos",
        type: "post",
        data: {
          'idcategoria': idcategoria,
        },
        dataType: "json",
        success: function(data) {
          $('#equipos').html(data);
        },
        error: function() {
          alert("error");
        }

      });

    });

    //Datos de las Tablas del Sistema
    $("#example1").DataTable({
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
      }
    });

    //Datos de las Tablas del Sistema
    $("#example2").DataTable({
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
      }
    });

    //Datos de las Tablas del Sistema
    $("#example3").DataTable({
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
      }
    });

    //autocompletado
    $('#autoc1').autocomplete({
      source: function(request, response) {
        $.ajax({
          url: base_url + "prestamos/ctprestamo/getAlquilantes",
          type: "post",
          dataType: "json",
          data: {
            valor: request.term
          },
          success: function(data) {
            response(data);
          }
        });
      },
      minLength: 4,
      select: function(event, ui) {
        data = ui.item.idper + "*" + ui.item.txtapeper + "*" + ui.item.txtnomper + "*" + ui.item.label;
        infoAlquilante = data.split("*");
        $("#idper").val(infoAlquilante[0]);
        $("#txtapeper").val(infoAlquilante[1]);
        $("#txtnomper").val(infoAlquilante[2]);
      },
    });
    //Fin Autocompletado

    //Auto completado de los Equipos

    //Fin Autocompletado de los Equipos

  });

  function validacion(campo) {
    if (campo === 'txtclave2') {
      pas2 = document.getElementById('txtclave2').value;
      pas1 = document.getElementById('txtclave').value;
      if (pas2 === pas1) {
        $('#iconotexto').remove();
        $('#' + campo).parent().attr("class", "has-success has-feedback col-sm-10");
        $('#' + campo).parent().children('span').text("").hide();
        $('#' + campo).parent().append("<span id='iconotexto' class='fa fa-check form-control-feedback'></span>");
      } else {
        $('#iconotexto').remove();
        $('#' + campo).parent().attr("class", "has-error has-feedback col-sm-10  ");
        $('#' + campo).parent().children('span').text("No Coincide Las Contraseñas").show();
        $('#' + campo).parent().append("<span id='iconotexto' class='fa fa-remove form-control-feedback'></span>");
      }
    }
  }

  //Metodo para validar Cedula
  validarDoc = function() {

    numero = document.getElementById('cedulap').value;
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
      $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
      $("#cedulap").parent().children('span').text("El número ingresado no es válido").show();
      $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
      return false;
    }

    /* Los primeros dos digitos corresponden al codigo de la provincia */
    provincia = numero.substr(0, 2);
    if (provincia < 1 || provincia > numeroProvincias) {
      // alert('El código de la provincia (dos primeros dígitos) es inválido');
      $("#iconotexto").remove();
      $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
      $("#cedulap").parent().children('span').text("El código de la provincia (dos primeros dígitos) es inválido").show();
      $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
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
      $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
      $("#cedulap").parent().children('span').text("El tercer dígito ingresado es inválido.").show();
      $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
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
        $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("El ruc de la empresa del sector público es incorrecto.").show();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;
      } else {
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-success has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("").hide();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;
      }
      /* El ruc de las empresas del sector publico terminan con 0001*/
      if (numero.substr(9, 4) != '0001') {
        // alert('El ruc de la empresa del sector público debe terminar con 0001');
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("El ruc de la empresa del sector público debe terminar con 0001").show();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;
      } else {
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-success has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("").hide();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;
      }
    } else if (pri == true) {
      if (digitoVerificador != d10) {
        // alert('El ruc de la empresa del sector privado es incorrecto.');
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("El ruc de la empresa del sector privado es incorrecto.").show();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;
      } else {
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-success has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("").hide();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;
      }
      if (numero.substr(10, 3) != '001') {
        // alert('El ruc de la empresa del sector privado debe terminar con 001');
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("El ruc de la empresa del sector privado debe terminar con 001").show();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;
      } else {
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-success has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("").hide();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;
      }
    } else if (nat == true) {
      if (digitoVerificador != d10) {
        // alert('El número de cédula de la persona natural es incorrecto.'); 
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("El numero de cédula de la persona natural es incorrecta").show();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;
      } else {
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-success has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("").hide();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;

      }
      if (numero.length > 10 && numero.substr(10, 3) != '001') {
        // alert('El ruc de la persona natural debe terminar con 001');
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-error has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("El ruc de la persona natural debe terminar con 001").show();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback'></span>");
        return false;

      } else {
        $("#iconotexto").remove();
        $("#cedulap").parent().attr("class", "form-group has-success has-feedback col-sm-9");
        $("#cedulap").parent().children('span').text("").hide();
        $("#cedulap").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback'></span>");
        return true;
      }
    }
    return true;
  }
  //Fin del metodo para validar Cedula
</script>
</body>

</html>