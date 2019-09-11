//Funcion para agregar datos en la tabla
$(function() {
    var base_url = "http://localhost/tesis/";
    var cont = 0;

    $("#btnTb").click(function() {
        //validar formulario
        var categorias = $("#categoria option:selected").text();
        var nomequipo = $("#equipos option:selected").text();

        var fila = '<tr class="selected" id="fila' + cont + '"> ' + ' <td> <input type="hidden" name="txtCt[' + cont + ']" id="txtCt[]" value="' + categorias + '">' + categorias + ' </td> ' + ' <td> <input type="hidden" name="txtEq[' + cont + ']" id="txtEq[]" value="' + nomequipo + '">' + nomequipo + ' </td> ' + ' <td><button type="button" class="btn btn-danger" onclick="eliminar(' + cont + ')"> Quitar </button> </td> ' + ' </tr>';

        $("#showPre").append(fila);
        $("input[name = txtDt]").val(cont);
        cont++;

    });

});

function eliminar($cont) { //Sirve para quitar las filasde la tabla de prestamos
    $("#fila" + $cont).remove();
}

//alert("Si llego");
$(function() {
    var base_url = "http://localhost/sprestamos/";
    listar();

    function listar() {
        $.ajax({
            type: "ajax",
            url: base_url + "prestamos/ctprestamo/listar",
            async: false,
            dataType: "json",
            success: function(data) {
                var html = "";
                var i;
                for (i = 0; i < data.length; i++) {
                    if (data[i].estadoprestamo == 'PENDIENTE') {
                        html += "<tr>" + "<td>" + data[i].persona + "</td>" + "<td>" + data[i].apellidoper + " " + data[i].nombreper + "</td>" + "<td>" + data[i].fechaprestamo + "</td>" + "<td><span class='label label-warning'>" + data[i].estadoprestamo + "</span></td>" + "<td>" + "<div class='btn-group'>" + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].idprestamo + '">Devolución</a>' + '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].idprestamo + '">Anular</a>' + "</div>" + "</td>" + "</tr>";
                    }
                } //Fin del For
                $("#showprestamos").html(html);
            },
            error: function() {
                alert("No Existe Datos Para Mostrar");
            }
        });
    }
    //Finaliza Metodo para listar Prestamos

    //Funcion para traer el Equipo para ser editada
    $("#showprestamos").on("click", ".item-edit", function() {
        var id = $(this).attr("data");
        //alert(id);
        $("#modal-default").modal("show");
        $("#modal-default").find(".modal-title").text("Devolver Prestamo");
        $("#modal-default").attr("action", base_url + "prestamos/ctprestamo/editarPre");
        $.ajax({
            type: "ajax",
            method: "post",
            url: base_url + "prestamos/ctprestamo/editarPre",
            data: {
                id: id
            },
            async: false,
            dataType: "json",
            success: function(data) {
                $("input[name = idprestamo]").val(data.idprestamo);
                $("input[name = txtencar]").val(data.encargado); //Como esta cargado en la base de dartos
                /*for ($i = 1; $i <= 300000; $i++) {
                    alert("si llego");
                    if (data[i].idprestamo == data[i].iddetalle) {
                        var fila = '<tr id="fila' + i + '"> ' + ' <td> <input type="hidden" name="txtCt[' + i + ']" id="txtCt[]" value="' + data[i].categoria + '">' + data[i].categoria + ' </td> ' + ' <td> <input type="hidden" name="txtEq[' + i + ']" id="txtEq[]" value="' + data[i].numeroequipo + '">' + data[i].numeroequipo + ' </td> ' + ' </tr>';

                        $("#showDet").append(fila);
                    }
                }*/

            },
            error: function() {
                alert("Sin Datos");
            }
        });
    });
    //Fin de la funcion para traer la Categoria para ser editada

});