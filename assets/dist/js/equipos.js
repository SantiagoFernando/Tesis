//alert("Si llego");
$(function() {
    var base_url = "http://localhost/sprestamos/";
    listar();
    //Agregar Nuevo Equipo
    $("#btnAdd1").click(function() {
        $("#myModal1").modal("show");
        $("#myModal1").find(".modal-title").text("Agregar Equipo");
        $("#myForm1").attr("action", base_url + "equipos/ctequipos/addE");
    });

    //Funcion Para Guardar
    $("#btnSave1").click(function() {
        var url = $("#myForm1").attr("action");
        var data = $("#myForm1").serialize();

        //Validar Formulario
        var adqui = $("input[name=txtadqui]");
        var serie = $("input[name=txtserie]");
        var marca = $("input[name=txtmarca]");
        var numero = $("input[name=txtnumero]");
        var modelo = $("input[name=txtmodelo]");
        var fecha = $("input[name=fecha]");
        var result = "";

        //Para Validar Texto Del Modal
        if (adqui.val() == "") {
            adqui.parent().parent().addClass("has-error");
        } else {
            adqui
                .parent()
                .parent()
                .removeClass("has-error");
            result += "1";
        }

        if (serie.val() == "") {
            serie.parent().parent().addClass("has-error");
        } else {
            serie
                .parent()
                .parent()
                .removeClass("has-error");
            result += "2";
        }

        if (marca.val() == "") {
            marca.parent().parent().addClass("has-error");
        } else {
            marca
                .parent()
                .parent()
                .removeClass("has-error");
            result += "3";
        }

        if (numero.val() == "") {
            numero.parent().parent().addClass("has-error");
        } else {
            numero
                .parent()
                .parent()
                .removeClass("has-error");
            result += "4";
        }

        if (modelo.val() == "") {
            modelo.parent().parent().addClass("has-error");
        } else {
            modelo
                .parent()
                .parent()
                .removeClass("has-error");
            result += "5";
        }

        if (fecha.val() == "") {
            fecha.parent().parent().addClass("has-error");
        } else {
            fecha
                .parent()
                .parent()
                .removeClass("has-error");
            result += "6";
        }

        //Fin de la validacion De texto

        if (result == "123456") {
            $.ajax({
                type: "ajax",
                method: "post",
                url: url,
                data: data,
                async: false, //Nose utiliza pero siempre se le pone false
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        $("#myModal1").modal("hide");
                        $("#myForm1")[0].reset();
                        if (response.type == "add") {
                            var type = "Agregado";
                        } else if (response.type == "update") {
                            var type = "Actualizado";
                        }
                        $(".alert-success")
                            .html("Equipo " + type + " Satisfactoriamente")
                            .fadeIn()
                            .delay(4000)
                            .fadeOut("slow")
                        $("#txtadqui").val("");
                        $("#txtserie").val("");
                        $("#txtmarca").val("");
                        $("#txtmodelo").val("");
                        $("#txtnumero").val("");
                        listar();
                    } else {
                        alert("error");
                    }
                },
                error: function() {
                    alert("No Hay Data")
                }
            });
        }
    });
    //Fin de Funcion Para Guardar

    //Funcion para traer el Equipo para ser editada
    $("#showEqui").on("click", ".item-edit", function() {
        var id = $(this).attr("data");
        //alert(id);
        $("#myModal1").modal("show");
        $("#myModal1").find(".modal-title").text("Editar Equipo Seleccionado");
        $("#myForm1").attr("action", base_url + "equipos/ctequipos/updateMaqi");
        $.ajax({
            type: "ajax",
            method: "post",
            url: base_url + "equipos/ctequipos/editarEq",
            data: {
                id: id
            },
            async: false,
            dataType: "json",
            success: function(data) {
                $("input[name = idequipo]").val(data.idequipo);
                $("input[name = txtadqui]").val(data.adquisicion); //Como esta cargado en la base de dartos
                $("input[name = txtserie]").val(data.serie);
                $("input[name = txtmodelo]").val(data.modelo);
                $("input[name = txtmarca]").val(data.marca);
                $("input[name = txtnumero]").val(data.numero);
                $("option:selected[name = txtaula]").val(data.ubicacion);
                $("option:selected[name = categoria]").val(data.categoriaid);
                $("input[name = fecha]").val(data.fechacompra);
            },
            error: function() {
                alert("Sin Datos");
            }
        });
    });
    //Fin de la funcion para traer la Categoria para ser editada

    //Funcion Eliminar o Desactivar la Categoria
    $("#showEqui").on("click", ".item-delete", function() { //Para Obtener la seleccion del click
        var id = $(this).attr("data"); //Obtenemos el id
        SwalDelete(id);
    });

    function SwalDelete(id) {
        Swal.fire({
            title: "Seguro Desea Desactivar?",
            text: "El Equipo Se Desactivara!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Desactivar!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: base_url + 'equipos/ctequipos/deleteEq',
                            type: "post",
                            data: "delete=" + id,
                            dataType: "json"
                        })
                        .done(function(response) {
                            Swal.fire("Desactivado", response.message, response.status);
                            listar();
                        })
                        .fail(function() {
                            Swal("Oops...!", "No Se Realizo la Desactivacion", "error");
                        });
                }); //-->Variable Cualquiera
            },
            allowOutsideClick: false
        });
    }
    //Fin de la funcion Eliminar O Desactivar Especialidad

    //Funcion Para Activar 
    $("#showEqui").on("click", ".item-active", function() { //Para Obtener la seleccion del click
        var id = $(this).attr("data"); //Obtenemos el id
        SwalDeletes(id);
    });

    function SwalDeletes(id) {
        Swal.fire({
            title: "Seguro Desea Activar?",
            text: "El Equipo Se Activara!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Activar!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: base_url + 'equipos/ctequipos/activarE',
                            type: "post",
                            data: "active=" + id,
                            dataType: "json"
                        })
                        .done(function(response) {
                            Swal.fire("Activado", response.message, response.status);
                            listar();
                        })
                        .fail(function() {
                            Swal("Oops...!", "No Se Realizo la Activacion", "error");
                        });
                }); //-->Variable Cualquiera
            },
            allowOutsideClick: false
        });
    }
    //Fin de la funcion Activar

    //Para listar Categorias
    function listar() {
        $.ajax({
            type: "ajax",
            url: base_url + "equipos/ctequipos/listar",
            async: false,
            dataType: "json",
            success: function(data) {
                var html = "";
                var i;
                for (i = 0; i < data.length; i++) {
                    if (data[i].estadoequipo == 'A') {
                        html += "<tr>" + "<td>" + data[i].numero + "</td>" + "<td>" + data[i].serie + "</td>" + "<td>" + data[i].marca + "</td>" + "<td>" + "<span class='label label-success'>ACTIVADO</span>" + "</td>" + "<td>" + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].idequipo + '">Editar</a>' + '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].idequipo + '">Desactivar</a>' + "</td>" + "</tr>";
                    } else {
                        html += "<tr>" + "<td>" + data[i].numero + "</td>" + "<td>" + data[i].serie + "</td>" + "<td>" + data[i].marca + "</td>" + "<td>" + "<span class='label label-danger'>DESACTIVADO</span>" + "</td>" + "<td>" + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].idequipo + '">Editar</a>' + '<a href="javascript:;" class="btn btn-success item-active" data="' + data[i].idequipo + '">Activar</a>' + "</td>" + "</tr>";
                    }
                } //Fin del For
                $("#txtadqui").val("");
                $("#txtserie").val("");
                $("#txtmodelo").val("");
                $("#txtmarca").val("");
                $("#txtnumero").val("");
                $("#showEqui").html(html);
            },
            error: function() {
                alert("No Existe Datos Para Mostrar");
            }
        });
    }
    //Finaliza Metodo para listar especialidades
});