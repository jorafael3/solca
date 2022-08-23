<?php


$urlGetProjects = constant("URL") . "principal/Get_last_projects";
$urlGet_Permanencia = constant("URL") . "principal/Get_Permanencia";
$urlGet_Atencion_Servicio = constant("URL") . "principal/Get_Atencion_Servicio";
$urlGet_Atencion_Servicio_tabla = constant("URL") . "principal/Get_Atencion_Servicio_tabla";
$urlGet_data_totales = constant("URL") . "principal/Get_data_totales";


?>


<script>
    var urlGetProjects = '<?php echo $urlGetProjects ?>';
    var urlGet_Permanencia = '<?php echo $urlGet_Permanencia ?>';
    var urlGet_Atencion_Servicio = '<?php echo $urlGet_Atencion_Servicio ?>';
    var urlGet_Atencion_Servicio_tabla = '<?php echo $urlGet_Atencion_Servicio_tabla ?>';
    var urlGet_data_totales = '<?php echo $urlGet_data_totales ?>';

    function Get_last_projects() {

        AjaxSendReceive(urlGetProjects, data = [], function(response) {
            console.log(response);
            Tabla_proyectos_recientes(response);

        });
    }
    // Get_last_projects();

    function Tabla_proyectos_recientes(data) {
        var tb = $('#DS_SU_TABLA_PR_RECIENTES');

        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 200,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "drawCallback": function() {
                // $(this.api().table().header()).hide();
            },

            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            order: [
                [0, "desc"]
            ],
            columns: [{
                data: "FCREADO",
                title: "Fecha "
            }, {
                data: "HCREADO",
                title: "Hora"
            }, {
                data: "PROYECTOA_NOM",
                title: "Proyecto "
            }, {
                data: "PROYECTOA_RESPONSABLE",
                title: "Responsable "
            }, {
                data: "US_APELLNOM",
                title: "Creado por "
            }],
            "createdRow": function(row, data, index, cell) {

                // var fecha = `
                //         <div class="border border-gray-300 border-dashed rounded min-w-120px py-3 px-4 me-1 mb-3">
                // 			<div class="d-flex align-items-center">
                // 				<div class="fs-4 fw-bolder"></div>
                // 			</div>
                // 			<div class="fw-bold fs-6 text-gray-800">` + data["FCREADO"] + `</div>
                // 		</div>`;
                // $('td', row).eq(0).html(fecha);

                // var hora = `
                //         <div class="border border-gray-300 border-dashed rounded min-w-90px py-3 px-4 me-1 mb-3">
                // 			<div class="d-flex align-items-center">
                // 				<div class="fs-4 fw-bolder"></div>
                // 			</div>
                // 			<div class="fw-bold fs-6 text-gray-800">` + data["HCREADO"] + `</div>
                // 		</div>`;
                // $('td', row).eq(1).html(hora);
                // var proy = `
                //         <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-1 mb-3">
                // 			<div class="d-flex align-items-center">
                // 				<div class="fs-4 fw-bolder"></div>
                // 			</div>
                // 			<div class="fw-bold fs-6 text-gray-800">` + data["PROYECTOA_NOM"] + `</div>
                // 		</div>`;
                // $('td', row).eq(2).html(proy);
                // var res = `
                //         <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-0 mb-3">
                // 			<div class="d-flex align-items-center">
                // 				<div class="fs-4 fw-bolder"></div>
                // 			</div>
                // 			<div class="fw-bold fs-6 text-gray-800">` + data["PROYECTOA_RESPONSABLE"] + `</div>
                // 		</div>`;
                // $('td', row).eq(3).html(res);
                // if(data["US_APELLNOM"] == null){
                //     data["US_APELLNOM"] = "";
                // }
                // var res = `
                //         <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-0 mb-3">
                // 			<div class="d-flex align-items-center">
                // 				<div class="fs-4 fw-bolder"></div>
                // 			</div>
                // 			<div class="fw-bold fs-6 text-gray-800">` + data["US_APELLNOM"] + `</div>
                // 		</div>`;
                // $('td', row).eq(4).html(res);
            }


        });
        // new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);
    }

    //**** PERMANECIA ****/

    function Get_Permanencia_OnLoad() {
        var ANIO = moment().format("YYYY");
        var data = {
            SERV: "TODOS",
            ANIO: ANIO
        }
        console.log(data);
        $("#DSA_PER_SER").text("Datos Generales Solca" + " " + ANIO);

        // AjaxSendReceive(urlGet_Permanencia, data, function(response) {
        //     console.log(response);
        //     $("#PER_PERMANENCIA").text(parseFloat(response[0]["permanencia"]).toFixed(0) + " d");

        // });
        AjaxSendReceive(urlGet_Atencion_Servicio_tabla, data, function(response) {
            console.log("ATENCION", response);
            Tabla_Atencion_por_servicio(response);
        });
        AjaxSendReceive(urlGet_Atencion_Servicio, data, function(response) {
            console.log(response);
            $("#DSA_PER_PACIENTES").text(response[0]["Pacientes"]);
            $("#DSA_PER_DOCTORES").text(response[0]["Doctores"]);
            $("#DSA_PER_AGENCIAS").text(response[0]["Agencias"]);
            $("#DSA_PER_SERVICIOS").text(response[0]["Servicios"]);
            $("#DSA_PER_ESPECIALIDADES").text(response[0]["Especialidades"]);

            $("#PER_Dias").text(parseFloat(response[0]["dias"]).toFixed(0));
            $("#DSA_PER_DIAS_SUB").text(parseFloat(response[0]["diasConsultaSubsecuente"]).toFixed(0));
            $("#DSA_PER_DIAS_PRIMERA_CON").text(parseFloat(response[0]["diasPrimeraConsulta"]).toFixed(0));
            $("#DSA_PER_PROCEDIMIENTOS").text(parseFloat(response[0]["diasProcedimiento"]).toFixed(0));

            // $("#PER_PERMANENCIA").text(parseFloat(response[0]["permanencia"]).toFixed(0));
            // $("#DSA_PER_SER").text("Permanencia General Solca");

        });
    }

    Get_Permanencia_OnLoad();

    function Btn_Get_Permanencia() {
        var Servicio = $("#DSA_SERVICIOS").val();
        var Servicio_text = $("#DSA_SERVICIOS option:selected").text();
        var ANIO = $("#DSA_SERVICIOS_ANIO").val();
        console.log(Servicio);
        var data = {
            SERV: Servicio,
            ANIO: ANIO
        }
        console.log(data);
        if (Servicio == "TODOS") {
            $("#DSA_PER_SER").text("Datos Generales Solca" + " " + ANIO);
        } else {
            $("#DSA_PER_SER").text(Servicio_text + " " + ANIO);
        }
        AjaxSendReceive(urlGet_Permanencia, data, function(response) {
            console.log(response);
            $("#PER_PERMANENCIA").text(parseFloat(response[0]["permanencia"]).toFixed(0) + " d");

        });

        AjaxSendReceive(urlGet_Atencion_Servicio_tabla, data, function(response) {
            console.log("ATENCION", response);
            Tabla_Atencion_por_servicio(response);

        });

        AjaxSendReceive(urlGet_Atencion_Servicio, data, function(response) {
            console.log(response);
            $("#DSA_PER_PACIENTES").text(response[0]["Pacientes"]);
            $("#DSA_PER_DOCTORES").text(response[0]["Doctores"]);
            $("#DSA_PER_AGENCIAS").text(response[0]["Agencias"]);
            $("#DSA_PER_SERVICIOS").text(response[0]["Servicios"]);
            $("#DSA_PER_ESPECIALIDADES").text(response[0]["Especialidades"]);

            $("#PER_Dias").text(parseFloat(response[0]["dias"]).toFixed(0));
            $("#DSA_PER_DIAS_SUB").text(parseFloat(response[0]["diasConsultaSubsecuente"]).toFixed(0));
            $("#DSA_PER_DIAS_PRIMERA_CON").text(parseFloat(response[0]["diasPrimeraConsulta"]).toFixed(0));
            $("#DSA_PER_PROCEDIMIENTOS").text(parseFloat(response[0]["diasProcedimiento"]).toFixed(0));
            // $("#PER_PERMANENCIA").text(parseFloat(response[0]["permanencia"]).toFixed(0));
            // if (Servicio == "TODOS") {
            //     $("#DSA_PER_SER").text("Permanencia General Solca");
            // } else {
            //     $("#DSA_PER_SER").text(Servicio);
            // }
        });

    }

    function Tabla_Atencion_por_servicio(data) {
        var tb = $('#DSA_TABLA_ATENCION_SERVICIO');
        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 200,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "drawCallback": function() {
                // $(this.api().table().header()).hide();
            },

            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            order: [
                [0, "asc"]
            ],
            columns: [{
                data: "TIPO_CONSULTA",
                // title: "Tipo Consulta"
            }, {
                data: "Pacientes",
                // title: "Pacientes"
            }, {
                data: "dias",
                // title: "Días de espera",
                render: $.fn.dataTable.render.number(',', '.', 0, '')

            }, {
                data: "minutos",
                title: "Promedio de minutos atención",
                render: $.fn.dataTable.render.number(',', '.', 0, '')

            }],
            "createdRow": function(row, data, index, cell) {

                $('td', row).eq(0).addClass("text-center");
                $('td', row).eq(1).addClass("text-center");
                $('td', row).eq(2).addClass("text-center");
                $('td', row).eq(3).addClass("text-center");
                // $('td', row).eq(4).addClass("text-center");
                // $('td', row).eq(5).addClass("text-center");
                // $('td', row).eq(6).addClass("text-center");
                // $('td', row).eq(7).addClass("text-center");
            }

        });
        // new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);
    }

    function Get_Datos_Totales() {
        var x = [{
            "DATO1": "asd",
            "DATO2": "add",
            "DATO3": "aassd",
            "DATO6": 10,
            "DATO7": 20,
            "DATO8": 30,
        }];
        Tabla_Datos_Totales(x)

        // AjaxSendReceive(urlGet_data_totales, [], function(x) {
        //     Tabla_Datos_Totales(x)
        // });
    }
    Get_Datos_Totales();

    function Tabla_Datos_Totales(data) {
        var tb = $('#DASH_TABLA_DATOS');

        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 200,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "drawCallback": function() {
                // $(this.api().table().header()).hide();
            },

            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            order: [
                [0, "desc"]
            ],
            columns: [{
                data: "DATO1",
                title: "DATO1 "
            }, {
                data: "DATO2",
                title: "DATO2"
            }, {
                data: "DATO3",
                title: "DATO3 "
            }, {
                data: "DATO6",
                title: "DATO6 "
            }, {
                data: "DATO7",
                title: "DATO7"
            }, {
                data: "DATO8",
                title: "DATO8"
            }],
            "createdRow": function(row, data, index, cell) {

                var texto;
                var valor;

                if (data["DATO6"]) {
                    texto = data["DATO6"];
                    valor = data["DATO6"];

                    var fecha = `
                        <div class="d-flex flex-column w-100 me-2">
                            <div class="d-flex flex-stack mb-2">
                                <span class="text-muted me-2 fs-7 fw-bold">` + texto + `%</span>
                            </div>
                            <div class="progress h-6px w-100">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: ` + valor + `%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>`;
                    $('td', row).eq(3).html(fecha);

                }
                if (data["DATO7"]) {
                    texto = data["DATO7"];
                    valor = data["DATO7"];

                    var fecha = `
                        <div class="d-flex flex-column w-100 me-2">
                            <div class="d-flex flex-stack mb-2">
                                <span class="text-muted me-2 fs-7 fw-bold">` + texto + `%</span>
                            </div>
                            <div class="progress h-6px w-100">
                                <div class="progress-bar bg-success" role="progressbar" style="width: ` + valor + `%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>`;
                    $('td', row).eq(4).html(fecha);

                }
                if (data["DATO8"]) {
                    texto = data["DATO8"];
                    valor = data["DATO8"];
                    var fecha = `
                        <div class="d-flex flex-column w-100 me-2">
                            <div class="d-flex flex-stack mb-2">
                                <span class="text-muted me-2 fs-7 fw-bold">` + texto + `%</span>
                            </div>
                            <div class="progress h-6px w-100">
                                <div class="progress-bar bg-info" role="progressbar" style="width: ` + valor + `%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>`;
                    $('td', row).eq(5).html(fecha);
                }



            }


        });
        // new $.fn.dataTable.FixedHeader(table);
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