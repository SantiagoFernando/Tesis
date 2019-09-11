//alert("Si llego");
$(function() {
    var base_url = "http://localhost/sprestamos/";
    listar();
    //Agregar Nueva Categoria
    $("#btnAdd").click(function() {
        $("#myModal").modal("show");
        $("#myModal").find(".modal-title").text("Agregar Una Nueva Categoria");
        $("#myForm").attr("action", base_url + "categorias/ctcategoria/addC");
    });

    //Funcion Para Guardar
    $("#btnSave").click(function() {
        var url = $("#myForm").attr("action");
        var data = $("#myForm").serialize();
        //Validar Formulario
        var nombrecategoria = $("input[name=nombrecategoria]");
        var result = "";
        //Para Validar Texto Del Modal
        if (nombrecategoria.val() == "") {
            nombrecategoria.parent().parent().addClass("has-error");
        } else {
            nombrecategoria
                .parent()
                .parent()
                .removeClass("has-error");
            result += "12";
        }
        //Fin de la validacion De texto
        if (result == "12") {
            $.ajax({
                type: "ajax",
                method: "post",
                url: url,
                data: data,
                async: false, //Nose utiliza pero siempre se le pone false
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        $("#myModal").modal("hide");
                        $("#myForm")[0].reset();
                        if (response.type == "add") {
                            var type = "Agregada";
                        } else if (response.type == "update") {
                            var type = "Actualizada";
                        }
                        $(".alert-success")
                            .html("Categoria " + type + " Satisfactoriamente")
                            .fadeIn()
                            .delay(4000)
                            .fadeOut("slow")
                        $("#nombrecategoria").val("");
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

    //Funcion para traer la Categoria para ser editada
    $("#showdata").on("click", ".item-edit", function() {
        var id = $(this).attr("data");
        //alert(id);
        $("#myModal").modal("show");
        $("#myModal").find(".modal-title").text("Editar Categoria Seleccionada");
        $("#myForm").attr("action", base_url + "categorias/ctcategoria/updateCat");
        $.ajax({
            type: "ajax",
            method: "post",
            url: base_url + "categorias/ctcategoria/editCat",
            data: {
                id: id
            },
            async: false,
            dataType: "json",
            success: function(data) {
                $("input[name = nombrecategoria]").val(data.nombrecategoria); //Como esta cargado en la base de dartos
                $("input[name = idcategoria]").val(data.idcategoria);
            },
            error: function() {
                alert("Sin Datos");
            }
        });
    });
    //Fin de la funcion para traer la Categoria para ser editada

    //Funcion Eliminar o Desactivar la Categoria
    $("#showdata").on("click", ".item-delete", function() { //Para Obtener la seleccion del click
        var id = $(this).attr("data"); //Obtenemos el id
        SwalDelete(id);
    });

    function SwalDelete(id) {
        Swal.fire({
            title: "Seguro Desea Desactivar?",
            text: "La Categoria Se Desactivara!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Desactivar!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: base_url + 'categorias/ctcategoria/deleteCat',
                            type: "post",
                            data: "delete=" + id,
                            dataType: "json"
                        })
                        .done(function(response) {
                            Swal.fire("Desactivada", response.message, response.status);
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
    $("#showdata").on("click", ".item-active", function() { //Para Obtener la seleccion del click
        var id = $(this).attr("data"); //Obtenemos el id
        SwalDeletes(id);
    });

    function SwalDeletes(id) {
        Swal.fire({
            title: "Seguro Desea Activar?",
            text: "La Categoria Se Activara!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Activar!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: base_url + 'categorias/ctcategoria/activarCat',
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
            url: base_url + "categorias/ctcategoria/listar",
            async: false,
            dataType: "json",
            success: function(data) {
                var html = "";
                var i;
                for (i = 0; i < data.length; i++) {
                    if (data[i].estadocategoria == 'A') {
                        html += "<tr>" + "<td>" + data[i].idcategoria + "</td>" + "<td>" + data[i].nombrecategoria + "</td>" + "<td>" + "<span class='label label-success'>ACTIVADA</span>" + "</td>" + "<td>" + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].idcategoria + '">Editar</a>' + '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].idcategoria + '">Desactivar</a>' + "</td>" + "</tr>";
                    } else {
                        html += "<tr>" + "<td>" + data[i].idcategoria + "</td>" + "<td>" + data[i].nombrecategoria + "</td>" + "<td>" + "<span class='label label-danger'>DESACTIVADA</span>" + "</td>" + "<td>" + '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].idcategoria + '">Editar</a>' + '<a href="javascript:;" class="btn btn-success item-active" data="' + data[i].idcategoria + '">Activar</a>' + "</td>" + "</tr>";
                    }
                } //Fin del For
                $("#nombrecategoria").val("");
                $("#showdata").html(html);
            },
            error: function() {
                alert("No Existe Datos Para Mostrar");
            }
        });
    }
    //Finaliza Metodo para listar especialidades
});