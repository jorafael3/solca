<?php

$urlGuardarUsuarios = constant("URL") . "mantenimiento/GuardarNuevoUsuario";
$urlListarUsuarios = constant("URL") . "mantenimiento/ListarUsuario";

?>

<script>
    var urlGuardarUsuarios = '<?php echo $urlGuardarUsuarios ?>';
    var urlListarUsuarios = '<?php echo $urlListarUsuarios ?>';


    function validarNUevoUsuario() {
        //**OBTENEMOS LOS DATOS DE LOS CAMPOS */
        var user_name = $("#user_name").val();
        var user_email = $("#user_email").val();
        var user_Cedula = $("#user_Cedula").val();
        var user_Celular = $("#user_Celular").val();
        var user_ciudad = $("#user_ciudad").val();
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
                user_Contrasena: user_Contrasena,
                rol: rol
            }

            AjaxSendReceive(urlGuardarUsuarios, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_user").modal('hide');
                    Mensaje_Guardado_ok();
                    $("#BtnReset").trigger('click'); 
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

        var table = $('#TablaUsuarios').DataTable({
            destroy: true,
            data: data,
            dom: 'frtip',
            scrollY: 450,
            scrollX: true,
            scrollCollapse: true,
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
                data: "US_ACTIVO",
                title: "Estado"
            }, {
                data: null,
                title: "Editar",
                className: "dt-center  btn_edit",
                defaultContent: '<button type="button"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" ><i class="fa fa-edit"></i></button>',
                orderable: false
            }],
            "createdRow": function(row, data, index, cell) {

                if (data["US_ACTIVO"] == "S") {
                    $('td', row).eq(3).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["US_ACTIVO"] == "N") {
                    $('td', row).eq(3).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

    }

    function AjaxSendReceive(url, data, callback) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                data = JSON.parse(data);
                //console.log(data);
                callback(data);
            }
        }

        data = JSON.stringify(data);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    }
</script>