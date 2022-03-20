<?php

$urlCargar_Datos_usuario = constant("URL") . "cuenta/Cargar_datos_usuario";

?>

<script>
    /**
     * FUNCION QUE CARGA LOS DATOS DE USUARIIO BASADO EN EL ID
     * DEL INICIO DE SESION
     */
    function Cargar_Datos_usuario(id) {




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