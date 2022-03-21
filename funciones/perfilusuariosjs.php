<?php

$urlActualizar_datos_usuario = constant("URL") . "cuenta/Actualizar_datos_usuario";
$urlActualizar_Contrasena_usuario = constant("URL") . "cuenta/Actualizar_Contrasena_usuario";

?>

<script>
    /**
     * FUNCION QUE ACTUALIZA LOS DATOS DE USUARIIO BASADO EN EL ID
     * DEL INICIO DE SESION
     */
    var urlActualizar_datos_usuario = '<?php echo $urlActualizar_datos_usuario ?>';
    var urlActualizar_Contrasena_usuario = '<?php echo $urlActualizar_Contrasena_usuario ?>';

    function Validar_Actualizacion_datos() {
        var nombre = $("#Txt_Set_name").val();
        var cedula = $("#Txt_Set_Cedula").val();
        var celular = $("#Txt_Set_celular").val();
        var ciudad = $("#Txt_Set_user_ciudad").val();

        if (nombre == "") {

        } else {
            var data = {
                nombre: nombre,
                cedula: cedula,
                celular: celular,
                ciudad: ciudad
            };

            console.log(data);

            AjaxSendReceive(urlActualizar_datos_usuario, data, function(response) {
                console.log(response);

                if (response == true) {
                    Mensaje_Actulizado_ok();
                }

            });
        }


    }

    function Validar_Actualizar_Contrasena() {
        var con_actual = $("#currentpassword").val();
        var con_nuevo = $("#newpassword").val();
        var con_confirm = $("#confirmpassword").val();

        if (con_actual == "") {} else if (con_nuevo == "") {} else if (con_confirm == "") {} else {

            if (con_nuevo == con_confirm) {

                if (con_actual == con_nuevo) {
                    Mensaje_Error("Error", "La Contraseña es igual a la actual");

                } else {

                    var data = {
                        con_actual: con_actual,
                        con_nuevo: con_nuevo
                    }

                    console.log(data);

                    AjaxSendReceive(urlActualizar_Contrasena_usuario, data, function(response) {
                        console.log(response);
                        if (response == true) {
                            Swal.fire(
                                'Exito',
                                'La Contraseña correctamente',
                                'success'
                            )
                        } else if (response == 0) {
                            Mensaje_Error("Error", "La contraseña Actual no coincide");

                        }
                    });
                }

            } else {
                Mensaje_Error("Error", "Las contraseñas no coinciden");
            }


        }

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