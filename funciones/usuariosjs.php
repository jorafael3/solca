<?php

$urlGuardarUsuarios = constant("URL") . "mantenimiento/GuardarNuevoUsuario";
$urlListarUsuarios = constant("URL") . "mantenimiento/ListarUsuario";
$urlActualizar_usuario = constant("URL") . "mantenimiento/Actualizar_usuario";

?>

<script>
    var urlGuardarUsuarios = '<?php echo $urlGuardarUsuarios ?>';
    var urlListarUsuarios = '<?php echo $urlListarUsuarios ?>';
    var urlActualizar_usuario = '<?php echo $urlActualizar_usuario ?>';

    var US_ID_GLOBAL;

    function validarNUevoUsuario() {
        //**OBTENEMOS LOS DATOS DE LOS CAMPOS */
        var user_name = $("#user_name").val();
        var user_email = $("#user_email").val();
        var user_Cedula = $("#user_Cedula").val();
        var user_Celular = $("#user_Celular").val();
        var user_ciudad = $("#user_ciudad").val();
        var user_area = $("#user_area").val();
        var rol = 1;
        var rol1 = document.getElementById("kt_modal_update_role_option_1");
        var rol2 = document.getElementById("kt_modal_update_role_option_2");
        var rol3 = document.getElementById("kt_modal_update_role_option_3");
        var rol4 = document.getElementById("kt_modal_update_role_option_4");

        var user_Contrasena = $("#user_Contrasena").val();

        //*** VALIDAMOS EL TIPO DE ROL SELECIONADO */
        if (rol1.checked == true) {
            rol = 1;
        } else if (rol2.checked == true) {
            rol = 2;
        } else if (rol3.checked == true) {
            rol = 3;
        } else if (rol4.checked == true) {
            rol = 4;
        }

        //** VALIDAMOS QUE NO PERMITA CAMPOS VACIOS */
        if (user_name == "") {
            console.log("asasdsad");

        } else if (user_email == "") {

        } else if (user_ciudad == "") {

        } else if (user_Contrasena == "") {

        } else {
            var data = {
                user_name: user_name,
                user_email: user_email,
                user_Cedula: user_Cedula,
                user_Celular: user_Celular,
                user_ciudad: user_ciudad,
                user_area: user_area,
                user_Contrasena: user_Contrasena,
                rol: rol
            }

            AjaxSendReceive(urlGuardarUsuarios, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_user").modal('hide');
                    Mensaje_Guardado_ok();
                    $("#BtnReset").trigger('click');
                    ListarUsuarios();
                } else {
                    Mensaje_Error("Oops", "Ocurrio un error al guardar los datos");

                }
            });
        }
    }

    function ListarUsuarios() {

        AjaxSendReceive(urlListarUsuarios, data = [], function(response) {
            console.log(response);

            TablaUsuarios(response);
        });
    }

    function TablaUsuarios(data) {
        $('#TablaUsuarios').empty();

        var table = $('#TablaUsuarios').DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        $("#kt_modal_add_user").modal("show");
                    }
                },
                // {
                //     extend: "excelHtml5",
                //     text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                //     className: 'btn btn-success btn-fill',
                //     messageTop: "Paises",
                //     title: "Paises"
                // },

            ],
            columns: [{
                data: "US_APELLNOM",
                title: "Nombre "
            }, {
                data: "US_EMAIL",
                title: "Correo "
            }, {
                data: "TIPOUS_NOM",
                title: "Tipo "
            }, {
                data: "AREA_NOM",
                title: "Area "
            }, {
                data: "US_ACTIVO",
                title: "Estado"
            }, {
                data: null,
                title: "Editar",
                className: "dt-center  btn_edit",
                defaultContent: '<button type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user_edit"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" ><i class="fa fa-edit"></i></button>',
                orderable: false
            }],
            "createdRow": function(row, data, index, cell) {

                if (data["US_ACTIVO"] == "S") {
                    $('td', row).eq(4).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["US_ACTIVO"] == "N") {
                    $('td', row).eq(4).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);


        $('#TablaUsuarios tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            console.log(data);
            $("#user_area_act").val(data["AREA_ID"]).change();
            Validar_Actualizar_Datos_usuario(data);

        });


    }

    function Validar_Actualizar_Datos_usuario(data) {
        var Tipo_id = data["TIPOUS_ID"];
        var estado = data["US_ACTIVO"];
        US_ID_GLOBAL = data["US_ID"];

        if (estado == 'S') {
            $("#Check_estado_activo").prop("checked", true);
        } else {
            $("#Check_estado_inactivo").prop("checked", true);
        }

        if (Tipo_id == "1") {
            $("#Check_tipo_us_1").prop("checked", true);

        } else if (Tipo_id == "2") {
            $("#Check_tipo_us_2").prop("checked", true);

        } else if (Tipo_id == "3") {
            $("#Check_tipo_us_3").prop("checked", true);

        } else if (Tipo_id == "4") {
            $("#Check_tipo_us_4").prop("checked", true);

        }


    }

    function Actualizar_Datos_usuario() {
        var rol1 = document.getElementById("Check_tipo_us_1");
        var rol2 = document.getElementById("Check_tipo_us_2");
        var rol3 = document.getElementById("Check_tipo_us_3");
        var rol4 = document.getElementById("Check_tipo_us_4");
        var rol5 = document.getElementById("Check_tipo_us_5");

        var activo = document.getElementById("Check_estado_activo");
        var inactivo = document.getElementById("Check_estado_inactivo");
        var user_area = $("#user_area_act").val();

        var rol;
        var estado;

        if (rol1.checked == true) {
            rol = 1;
        } else if (rol2.checked == true) {
            rol = 2;
        } else if (rol3.checked == true) {
            rol = 3;
        } else if (rol4.checked == true) {
            rol = 4;
        }else if (rol5.checked == true) {
            rol = 5;
        }

        if (activo.checked == true) {
            estado = "S";
        } else if (inactivo.checked == true) {
            estado = "N";
        }


        var data2 = {
            US_ID: US_ID_GLOBAL,
            US_ACTIVO: estado,
            TIPOUS_ID: rol,
            AREA_ID:user_area
        }
        console.log(data2);

        AjaxSendReceive(urlActualizar_usuario, data2, function(response) {
            console.log(response);
            if (response == true) {
                $("#kt_modal_add_user_edit").modal('hide');
                Mensaje_Ok("Exito", "Los datos se actualizaron correctamente");
                ListarUsuarios();
            } else {
                Mensaje_Error("Oops", "Ocurrio un error al actualizar los datos");
            }
        });
    }

    function AjaxSendReceive(url, data, callback) {
        $.blockUI({
            message: '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Cargando ...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
            css: {
                backgroundColor: 'transparent',
                color: '#fff',
                border: '0'
            },
            overlayCSS: {
                opacity: 0.5
            }
        });
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                data = JSON.parse(data);
                //console.log(data);
                callback(data);
            }
        }
        xmlhttp.onload = () => {
            $.unblockUI();

        };

        xmlhttp.onerror = function() {
            $.unblockUI();
            alert("Request failed");
        };
        data = JSON.stringify(data);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    }
</script>