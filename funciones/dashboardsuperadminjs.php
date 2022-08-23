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
        // var x = [{
        //     "DATO1": "asd",
        //     "DATO2": "add",
        //     "DATO3": "aassd",
        //     "DATO6": 10,
        //     "DATO7": 20,
        //     "DATO8": 30,
        // }];
        // Tabla_Datos_Totales(x)

        AjaxSendReceive(urlGet_data_totales, [], function(x) {
            console.log("x", x);
            Tabla_Datos_Totales(x)
        });
    }
    Get_Datos_Totales();

    function Tabla_Datos_Totales(data) {
        var tb = $('#DASH_TABLA_DATOS');

        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'frtip',
            scrollY: 500,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            // "drawCallback": function() {
            //     // $(this.api().table().header()).hide();
            // },

            order: [
                [0, "desc"]
            ],
            "columnDefs": [{
                "target": 1,
                "visible": false,
                "searchable": false,
            }],
            columns: [{
                    data: "PERSPECTIVA_NOM",
                    title: "PERSPECTIVA",
                },
                {
                    data: "CRITERIO_NOM",
                    title: "CRITERIO",
                    "visible": false,
                    "searchable": true,

                },
                {
                    data: "OBJEST_ID",
                    title: "OBJEST_ID ",
                    "visible": false,
                    "searchable": true,

                }, {
                    data: "OBJEST_NOM",
                    title: "OBJEST",
                    "visible": false,
                    "searchable": true,

                }, {
                    data: "proyectos",
                    title: "proyectos",
                    "visible": false,

                }, {
                    data: "actividades",
                    title: "actividades",
                    "visible": false,
                    "searchable": true,

                }, {
                    data: "CREADO",
                    title: "CREADO",
                    "visible": false,
                    "searchable": true,

                }, {
                    data: "INICIADO",
                    title: "INICIADO",
                    "visible": false,

                }, {
                    data: "FINALIZADO",
                    title: "FINALIZADO",
                    "visible": false,
                    "searchable": true,

                }, {
                    data: "PorcentajeFinalizado",
                    title: "% Finalizado",
                    "visible": false,
                    "searchable": true,

                }, {
                    data: "PorcentajeIniciadoOfinalizado",
                    title: "% Iniciado/finalizado",
                    "visible": false,
                    "searchable": true,

                }, {
                    data: "PorcentajeSinIniciar",
                    title: "% Sin Iniciar",
                    "visible": false,
                    "searchable": true,

                }

            ],
            "createdRow": function(row, data, index, cell) {

                var a = `
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#">
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                    <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                                    <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">Perspectiva: ` + data["PERSPECTIVA_NOM"] + `</a>

                                    </div>
                                    <div class="d-flex flex-wrap fw-bold fs-4 mb-4 pe-2">
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <a href="#" class="d-flex align-items-center text-gray-600 text-hover-primary me-5 mb-2">
                                            Criterio 
                                            </a>
                                            <div class="fw-bold fs-6 text-gray-800">` + data["CRITERIO_NOM"] + `</div>
                                        </div>
                                        
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <a href="#" class="d-flex align-items-center text-gray-600 text-hover-primary me-5 mb-2">
                                            Objetivo Estrategico 
                                            </a>
                                            <div class="fw-bold fs-6 text-gray-800">` + data["OBJEST_NOM"] + `</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap flex-stack">
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <div class="d-flex flex-wrap">

                                        <div class="border border-gray-500 border-dashed rounded min-w-50px py-3 px-4 me-3 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-3 fw-bolder" data-kt-countup="true" data-kt-countup-value="` + data["proyectos"] + `" data-kt-countup-prefix="">0</div>
                                            </div>
                                            <div class="fw-bold fs-7 text-gray-600">Proyectos</div>
                                        </div>
                                        <div class="border border-gray-500 border-dashed rounded min-w-80px py-3 px-4 me-3 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="` + data["actividades"] + `" data-kt-countup-prefix="">0</div>
                                            </div>
                                            <div class="fw-bold fs-7 text-gray-600">Actividades</div>
                                        </div>
                                        <div class="border border-gray-500 border-dashed rounded min-w-80px py-3 px-4 me-3 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="` + data["CREADO"] + `" data-kt-countup-prefix="">0</div>
                                            </div>
                                            <div class="fw-bold fs-7 text-gray-600">Creados</div>
                                        </div>
                                        <div class="border border-gray-500 border-dashed rounded min-w-80px py-3 px-4 me-3 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="` + data["INICIADO"] + `" data-kt-countup-prefix="">0</div>
                                            </div>
                                            <div class="fw-bold fs-7 text-gray-600">Iniciados</div>
                                        </div>
                                        <div class="border border-gray-500 border-dashed rounded min-w-80px py-3 px-4 me-3 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="` + data["FINALIZADO"] + `" data-kt-countup-prefix="">0</div>
                                            </div>
                                            <div class="fw-bold fs-7 text-gray-600">Finalizados</div>
                                        </div>
                                       
                                       
                                        <div class="border border-gray-500 border-dashed rounded min-w-100px py-3 px-4 me-3 mb-3">
                                            <div class="d-flex align-items-center w-150px w-sm-150px flex-column mt-3">
                                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                    <span class="fw-bold fs-6 text-gray-600">Sin Iniciar</span>
                                                    <span class="fw-bolder fs-6">` + parseFloat(data["PorcentajeSinIniciar"]).toFixed(2) + `%</span>
                                                </div>
                                                <div class="h-6px mx-3 w-100 bg-light mb-3">
                                                    <div class="bg-info rounded h-5px" role="progressbar" style="width: ` + parseFloat(data["PorcentajeSinIniciar"]).toFixed(2) + `%;" aria-valuenow="` + parseFloat(data["PorcentajeSinIniciar"]).toFixed(2) + `" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border border-gray-500 border-dashed rounded min-w-100px py-3 px-4 me-3 mb-3">
                                            <div class="d-flex align-items-center w-150px w-sm-150px flex-column mt-3">
                                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                    <span class="fw-bold fs-6 text-gray-600">Iniciado finalizado</span>
                                                    <span class="fw-bolder fs-6">` + parseFloat(data["PorcentajeIniciadoOfinalizado"]).toFixed(2) + `%</span>
                                                </div>
                                                <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                    <div class="bg-primary rounded h-5px" role="progressbar" style="width: ` + parseFloat(data["PorcentajeIniciadoOfinalizado"]).toFixed(2) + `%;" aria-valuenow="` + parseFloat(data["PorcentajeIniciadoOfinalizado"]).toFixed(2) + `" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border border-gray-500 border-dashed rounded min-w-100px py-3 px-4 me-3 mb-3">
                                            <div class="d-flex align-items-center w-150px w-sm-120px flex-column mt-3">
                                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                    <span class="fw-bold fs-6 text-gray-600">Finalizados</span>
                                                    <span class="fw-bolder fs-6">` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `%</span>
                                                </div>
                                                <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                    <div class="bg-success rounded h-5px" role="progressbar" style="width: ` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `%;" aria-valuenow="` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`

                $('td', row).eq(0).html(a);
                // if (data["PorcentajeFinalizado"]) {
                //     var texto = parseFloat(data["PorcentajeFinalizado"]).toFixed(2);

                //     var valor = parseFloat(data["PorcentajeFinalizado"]).toFixed(2);

                //     var fecha = `
                //         <div class="d-flex flex-column w-100 me-2">
                //             <div class="d-flex flex-stack mb-2">
                //                 <span class="text-muted me-2 fs-7 fw-bold">` + texto + `%</span>
                //             </div>
                //             <div class="progress h-6px w-100">
                //                 <div class="progress-bar bg-primary" role="progressbar" style="width: ` + valor + `%" aria-valuenow="` + valor + `" aria-valuemin="0" aria-valuemax="100"></div>
                //             </div>
                //         </div>`;
                //     $('td', row).eq(9).html(fecha);

                // }
                // if (data["PorcentajeIniciadoOfinalizado"]) {
                //     var texto = parseFloat(data["PorcentajeIniciadoOfinalizado"]).toFixed(2);
                //     var valor = parseFloat(data["PorcentajeIniciadoOfinalizado"]).toFixed(2);

                //     var fecha = `
                //         <div class="d-flex flex-column w-100 me-2">
                //             <div class="d-flex flex-stack mb-2">
                //                 <span class="text-muted me-2 fs-7 fw-bold">` + texto + `%</span>
                //             </div>
                //             <div class="progress h-6px w-100">
                //                 <div class="progress-bar bg-success" role="progressbar" style="width: ` + valor + `%" aria-valuenow="` + valor + `" aria-valuemin="0" aria-valuemax="100"></div>
                //             </div>
                //         </div>`;
                //     $('td', row).eq(10).html(fecha);

                // }
                // if (data["PorcentajeSinIniciar"]) {
                //     var texto = parseFloat(data["PorcentajeSinIniciar"]).toFixed(2);
                //     var valor = parseFloat(data["PorcentajeSinIniciar"]).toFixed(2);
                //     var fecha = `
                //         <div class="d-flex flex-column w-100 me-2">
                //             <div class="d-flex flex-stack mb-2">
                //                 <span class="text-muted me-2 fs-7 fw-bold">` + texto + `%</span>
                //             </div>
                //             <div class="progress h-8px w-100">
                //                 <div class="progress-bar bg-info" role="progressbar" style="width: ` + valor + `%" aria-valuenow="` + valor + `" aria-valuemin="0" aria-valuemax="100"></div>
                //             </div>
                //         </div>`;
                //     $('td', row).eq(11).html(fecha);
                // }
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