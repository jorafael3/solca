<?php

$urlCargar_Datos_usuario = constant("URL") . "cuenta/Cargar_datos_usuario";

?>

<script>
    /**
     * FUNCION QUE CARGA LOS DATOS DE USUARIIO BASADO EN EL ID
     * DEL INICIO DE SESION
     */
    var urlCargar_Datos_usuario = '<?php echo $urlCargar_Datos_usuario ?>';

    function Cargar_Datos_usuario(id) {
        console.log(id);
        var data = {
            id: id
        };

        AjaxSendReceive(urlCargar_Datos_usuario, data, function(response) {
            console.log(response);
            llenar_card(response);
            llenar_Overview(response);
        });
    }

    function llenar_card(data) {
        $("#Txt_user_Access").text(data[0]["TIPOUS_ID"]);
        $("#Txt_user_city").text(data[0]["CIUDAD_NOM"]);
        $("#Txt_user_mail").text(data[0]["US_EMAIL"]);
    }

    function llenar_Overview(data) {

        $("#Txt_ovw_nombre").text(data[0]["US_APELLNOM"]);
        $("#Txt_ovw_mail").text(data[0]["US_EMAIL"]);
        $("#Txt_ovw_telf").text(data[0]["US_CEL"]);
        $("#Txt_ovw_dni").text(data[0]["US_NCED"]);
        $("#Txt_ovw_city").text(data[0]["CIUDAD_NOM"]);

        

    }

    function llenar_Ajustes(data) {

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