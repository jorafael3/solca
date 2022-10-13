<?php

$urlGet_perspectiva = constant("URL") . "matrizestrategica/Get_Perspectivas";
$urlGet_Criterios = constant("URL") . "matrizestrategica/Get_Criterios";
$urlObjetivos_Estrategicos = constant("URL") . "matrizestrategica/Get_Objetivos_Estrategicos";
$url_CARGAR_REPORTE = constant("URL") . "reportes/Cargar_Reportes";


?>


<script>
    $('#REP_PERS').select2({
        placeholder: "Seleccione"
    });


    var urlGet_perspectiva = '<?php echo $urlGet_perspectiva ?>';
    var urlGet_Criterios = '<?php echo $urlGet_Criterios ?>';
    var urlObjetivos_Estrategicos = '<?php echo $urlObjetivos_Estrategicos ?>';
    var url_CARGAR_REPORTE = '<?php echo $url_CARGAR_REPORTE ?>';

    var PERSPECTIVA_ID;
    var OBJET_ID;

    function Get_Perspectivas() {
        AjaxSendReceive(urlGet_perspectiva, data = [], function(response) {
            console.log(response);
            let selectSub = document.getElementById("REP_PERS");
            $('#REP_PERS option').remove(); // clear all values 
            $('#REP_OBJ_EST option').remove();
            $('#REP_PERS ').append('<option value="s">Seleccione</option>');
            jQuery.each(response, function(key, value) {
                //alert(value.Marca);
                option = document.createElement("option");
                option.value = value.PERSPECTIVA_ID;
                option.text = value.PERSPECTIVA_NOM;
                selectSub.appendChild(option);
            });
        });
    }
    Get_Perspectivas();

    function Get_Criterios(id) {

        var data = {
            id_perspectiva: id
        }
        if (id != "s") {
            PERSPECTIVA_ID = id;
            AjaxSendReceive(urlGet_Criterios, data, function(response) {
                console.log("CRITERIOS", response);
                let selectSub = document.getElementById("REP_CRIT");
                $('#REP_CRIT option').remove(); // clear all values 
                $('#REP_CRIT ').append('<option value="s">Seleccione</option>');
                jQuery.each(response, function(key, value) {
                    //alert(value.Marca);
                    option = document.createElement("option");
                    option.value = value.CRITERIO_ID;
                    option.text = value.CRITERIO_NOM;
                    selectSub.appendChild(option);
                });
            });
        } else {
            $('#REP_OBJ_EST option').remove();
            $('#REP_CRIT option').remove(); // clear all values 

        }

    }

    function Get_Objetivos_Estrategicos(id) {
        var data = {
            criterio_id: parseInt(id),
            perspectiva_id: parseInt(PERSPECTIVA_ID)
        }
        if (id != "s") {
            AjaxSendReceive(urlObjetivos_Estrategicos, data, function(response) {
                console.log("Objetivos_Estrategicos", response);
                let selectSub = document.getElementById("REP_OBJ_EST");
                $('#REP_OBJ_EST option').remove(); // clear all values 
                $('#REP_OBJ_EST ').append('<option value="s">Seleccione</option>');
                jQuery.each(response, function(key, value) {
                    //alert(value.Marca);
                    option = document.createElement("option");
                    option.value = value.OBJEST_ID;
                    option.text = value.OBJEST_NOM;
                    selectSub.appendChild(option);
                });
            });
        }
    }

    function CARGAR_REPORTE() {
        var parametros = {
            id: $("#REP_OBJ_EST").val()
        }
        console.log('parametros: ', parametros);
        AjaxSendReceive(url_CARGAR_REPORTE, parametros, function(x) {
            console.log('x: ', x);
            TABLA_REPORTES(x)
        });
    }

    function TABLA_REPORTES(data) {
        $('#REP_REPORTES').empty();
        var table = $('#REP_REPORTES').DataTable({
            destroy: true,
            data: data,
            dom: 'Brtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            buttons:[
                'excel'
            ],
            // "drawCallback": function() {
            //     $(this.api().table().header()).hide();
            // },
            columns: [
                {
                    data:"proyectos",
                    title:"Proyectos"
                },{
                    data:"AREA_NOM",
                    title:"Area"
                },{
                    data:"actividades",
                    title:"# Act Totales"
                },{
                    data:"FINALIZADO",
                    title:"# Act. finalizadas"
                },{
                    data:"PorcentajeFinalizado",
                    title:"% Avance",
                    render: $.fn.dataTable.render.number(',', '.', 2, "%")

                }
            ],
            "createdRow": function(row, data, index, cell) {
                if(data["PorcentajeFinalizado"] >=100){
                    $('td', row).eq(4).addClass("text-success");
                }
                if(data["PorcentajeFinalizado"] == 0){
                    $('td', row).eq(4).addClass("text-danger");
                }
            }
        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);
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
                //
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