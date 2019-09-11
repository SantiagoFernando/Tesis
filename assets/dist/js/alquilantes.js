//alert("Si llego");
$(function() {
    var base_url = "http://localhost/sprestamos/";
    listar();
    //Agregar una Persona
    $("#btnAdd4").click(function() {
        $("#myModal4").modal("show");
        $("#myModal4").find(".modal-title").text("Agregar Persona");
        $("#myForm4").attr("action", base_url + "personas/ctpersona/addPersons");
    });

    //Funcion Para Guardar
    $("#btnSave4").click(function() {
        var url = $("#myForm4").attr("action");
        var data = $("#myForm4").serialize();

        //Validar Formulario
        var cedula = $("input[name=txtcedula]");
        var apellidos = $("input[name=txtapellidos]");
        var nombres = $("input[name=txtnombres]");
        var direccion = $("textarea[name=txtdir]");
        var telefono = $("input[name=txttelf]");
        var correo = $("input[name=correo]");
        var result = "";

        //Para Validar Texto Del Modal
        if (cedula.val() == "") {
            cedula.parent().parent().addClass("has-error");
        } else {
            cedula
                .parent()
                .parent()
                .removeClass("has-error");
            result += "1";
        }

        if (apellidos.val() == "") {
            apellidos.parent().parent().addClass("has-error");
        } else {
            apellidos
                .parent()
                .parent()
                .removeClass("has-error");
            result += "2";
        }

        if (nombres.val() == "") {
            nombres.parent().parent().addClass("has-error");
        } else {
            nombres
                .parent()
                .parent()
                .removeClass("has-error");
            result += "3";
        }

        //Para Validar La Area De Texto Del Modal
        if (direccion.val() == "") {
            direccion.parent().parent().addClass("has-error");
        } else {
            direccion
                .parent()
                .parent()
                .removeClass("has-error");
            result += "4";
        }

        if (telefono.val() == "") {
            telefono.parent().parent().addClass("has-error");
        } else {
            telefono
                .parent()
                .parent()
                .removeClass("has-error");
            result += "5";
        }

        if (correo.val() == "") {
            correo.parent().parent().addClass("has-error");
        } else {
            correo
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
                        $("#myModal4").modal("hide");
                        $("#myForm4")[0].reset();
                        if (response.type == "add") {
                            var type = "Agregada";
                        } else if (response.type == "update") {
                            var type = "Actualizada";
                        }
                        $(".alert-success")
                            .html("Persona " + type + " Satisfactoriamente")
                            .fadeIn()
                            .delay(4000)
                            .fadeOut("slow")

                        $("#txtcedula").val("");
                        $("#txtapellidos").val("");
                        $("#txtnombres").val("");
                        $("#txtdir").val("");
                        $("#txttelf").val("");
                        $("#correo").val("");
                        listar();
                    } else {
                        alert("error");
                    }
                },
                error: function() {
                    alert("No Hay Data");
                }
            });
        }

    });
    //Fin de Funcion Para Guardar

    //Funcion para traer la Categoria para ser editada
    $("#showPer").on("click", ".item-edit", function() {
        var id = $(this).attr("data");
        //alert(id);
        $("#myModal4").modal("show");
        $("#myModal4").find(".modal-title").text("Editar Persona Seleccionada");
        $("#myForm4").attr("action", base_url + "personas/ctpersona/updateP");
        $.ajax({
            type: "ajax",
            method: "post",
            url: base_url + "personas/ctpersona/editarPer",
            data: {
                id: id
            },
            async: false,
            dataType: "json",
            success: function(data) {
                $("input[name = idpersona]").val(data.idpersona);
                $("input[name = txtcedula]").val(data.cedula).enabled;
                $("input[name = txtapellidos]").val(data.apellido); //Como esta cargado en la base de dartos
                $("input[name = txtnombres]").val(data.nombre);
                $("textarea[name = txtdir]").val(data.direccion);
                $("input[name = txttelf]").val(data.telefono);
                $("input[name = correo]").val(data.email);
            },
            error: function() {
                alert("Sin Datos");
            }
        });
    });
    //Fin de la funcion para traer la Categoria para ser editada

    //Funcion Eliminar o Desactivar la Categoria
    $("#showPer").on("click", ".item-delete", function() { //Para Obtener la seleccion del click
        var id = $(this).attr("data"); //Obtenemos el id
        SwalDelete(id);
    });

    function SwalDelete(id) {
        Swal.fire({
            title: "Seguro Desea Desactivar?",
            text: "La Persona Se Desactivara!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Desactivar!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: base_url + 'personas/ctpersona/delete',
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
    $("#showPer").on("click", ".item-active", function() { //Para Obtener la seleccion del click
        var id = $(this).attr("data"); //Obtenemos el id
        SwalDeletes(id);
    });

    function SwalDeletes(id) {
        Swal.fire({
            title: "Seguro Desea Activar?",
            text: "La Persona Se Activara!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Activar!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: base_url + 'personas/ctpersona/activarP',
                            type: "post",
                            data: "active=" + id,
                            dataType: "json"
                        })
                        .done(function(response) {
                            Swal.fire("Activada", response.message, response.status);
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
            url: base_url + "personas/ctpersona/listar",
            async: false,
            dataType: "json",
            success: function(data) {
                var html = "";
                var i;
                for (i = 0; i < data.length; i++) {
                    if (data[i].rol == 'PERSONA' && data[i].estadopersona == 'A') {
                        html += "<tr>" + "<td>" + data[i].cedula + "</td>" + "<td>" + data[i].apellido + "</td>" + "<td>" + data[i].nombre + "</td>" + "<td>" + "<span class='label label-success'>ACTIVADO</span>" + "</td>" + "<td>" + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].idpersona + '">Editar</a>' + '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].idpersona + '">Desactivar</a>' + "</td>" + "</tr>";
                    } else {
                        if (data[i].rol == 'PERSONA' && data[i].estadopersona == 'I') {
                            html += "<tr>" + "<td>" + data[i].cedula + "</td>" + "<td>" + data[i].apellido + "</td>" + "<td>" + data[i].nombre + "</td>" + "<td>" + "<span class='label label-danger'>DESACTIVADO</span>" + "</td>" + "<td>" + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].idpersona + '">Editar</a>' + '<a href="javascript:;" class="btn btn-success item-active" data="' + data[i].idpersona + '">Activar</a>' + "</td>" + "</tr>";
                        }

                    }
                } //Fin del For
                $("#txtcedula").val("");
                $("#txtapellidos").val("");
                $("#txtnombres").val("");
                $("#txtdir").val("");
                $("#txttelf").val("");
                $("#correo").val("");
                $("#showPer").html(html);
            },
            error: function() {
                alert("No Existe Datos Para Mostrar");
            }
        });
    }
    //Finaliza Metodo para listar especialidades
});