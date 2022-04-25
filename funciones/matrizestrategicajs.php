<?php

$urlGet_perspectiva = constant("URL") . "matrizestrategica/Get_Perspectivas";
$urlGet_Criterios = constant("URL") . "matrizestrategica/Get_Criterios";
$urlObjetivos_Estrategicos = constant("URL") . "matrizestrategica/Get_Objetivos_Estrategicos";
$urlGet_Indicadores = constant("URL") . "matrizestrategica/Get_Indicadores";
$urlGet_Riesgos = constant("URL") . "matrizestrategica/Get_Riesgos";
$urlGet_Fortalezas = constant("URL") . "matrizestrategica/Get_Fortalezas";
$urlGet_Oportunidades = constant("URL") . "matrizestrategica/Get_Oportunidades";
$urlGet_Debilidades = constant("URL") . "matrizestrategica/Get_Debilidades";
$urlGet_Amenazas = constant("URL") . "matrizestrategica/Get_Amenazas";

$urlNueva_perspectiva = constant("URL") . "matrizestrategica/Nueva_perspectiva";
$urlNuevo_criterio = constant("URL") . "matrizestrategica/Nuevo_criterio";
$urlNuevo_Obj_Estrategico = constant("URL") . "matrizestrategica/Nuevo_Obj_Estrategico";

?>

<script>
    var urlGet_perspectiva = '<?php echo $urlGet_perspectiva ?>';
    var urlGet_Criterios = '<?php echo $urlGet_Criterios ?>';
    var urlObjetivos_Estrategicos = '<?php echo $urlObjetivos_Estrategicos ?>';
    var urlGet_Indicadores = '<?php echo $urlGet_Indicadores ?>';
    var urlGet_Riesgos = '<?php echo $urlGet_Riesgos ?>';
    var urlGet_Fortalezas = '<?php echo $urlGet_Fortalezas ?>';
    var urlGet_Oportunidades = '<?php echo $urlGet_Oportunidades ?>';
    var urlGet_Debilidades = '<?php echo $urlGet_Debilidades ?>';
    var urlGet_Amenazas = '<?php echo $urlGet_Amenazas ?>';

    var urlNueva_perspectiva = '<?php echo $urlNueva_perspectiva ?>';
    var urlNuevo_criterio = '<?php echo $urlNuevo_criterio ?>';
    var urlNuevo_Obj_Estrategico = '<?php echo $urlNuevo_Obj_Estrategico ?>';


    var PERSPECTIVA_ID;
    var CRITERIO_ID;
    var OBJEST_ID;

    //***** PERSPECTIVAS */

    function Get_Perspectivas() {

        AjaxSendReceive(urlGet_perspectiva, data = [], function(response) {
            console.log(response);
            $("#PERSPECTIVAS_LIST").empty();
            var con = 1;
            jQuery.each(response, function(key, value) {
                var PERSPECTIVA_ID_ = value.PERSPECTIVA_ID;
                var PERSPECTIVA_NOM = value.PERSPECTIVA_NOM;
                var active = "";

                if (PERSPECTIVA_ID == PERSPECTIVA_ID_) {
                    active = "active"
                }
                var Proyect_card = ` 
                <li class="nav-item mb-3 me-3 me-lg-6">
                    <a onclick="Btn_Perspectivas(` + PERSPECTIVA_ID_ + `)" class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2 ` + active + ` " data-bs-toggle="pill" href="#kt_stats_widget_6_tab_` + con + ` ">
                    <div class="nav-icon mb-3">
                        <i class="fa fa-th-large fs-4 p-0"></i>
                    </div>
                        <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">` + PERSPECTIVA_NOM + `</span>
                        <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                    </a>
                
                
                </li>`;
                $("#PERSPECTIVAS_LIST").append(Proyect_card);

            });

            var nueva = ` <li class="nav-item mb-3">
                        <a class="nav-link d-flex flex-center overflow-hidden w-80px h-85px" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Perspectiva" href="#">
                            <div class="nav-icon">
                                <span class="svg-icon svg-icon-2hx svg-icon-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                        </a>
                    </li>`
            $("#PERSPECTIVAS_LIST").append(nueva);

        });

    }

    function Nueva_Perspectiva() {
        var Nombre_perspe = $("#PERS_Nombre").val();
        if (Nombre_perspe != "") {

            var data = {
                PERSPECTIVA_NOM: Nombre_perspe
            }

            AjaxSendReceive(urlNueva_perspectiva, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Perspectiva").modal('hide');
                    $("#PERS_Nombre").val("");
                    Get_Perspectivas();
                }

            })

        }
    }

    //***** CRITERIOS */
    function Get_Criterios(id, nombre) {

        PERSPECTIVA_ID = id
        console.log(PERSPECTIVA_ID);

        var data = {
            id_perspectiva: id
        }
        PERSPECTIVA_ID = id;
        PERSPECTIVA_NOM = nombre;
        AjaxSendReceive(urlGet_Criterios, data, function(response) {
            console.log("CRITERIOS", response);
            Tabla_criterios(response);
            $("#TablaListaPoa").hide();

        });

    }

    function Nuevo_criterio() {
        var Nombre_cri = $("#CRIT_Nombre").val();
        if (Nombre_cri != "") {

            var data = {
                CRITERIO_NOM: Nombre_cri
            }

            AjaxSendReceive(urlNuevo_criterio, data, function(response) {
                console.log(response);
            })

        }
    }

    function Tabla_criterios(data) {
        $('#TablaListaCriterios').empty();
        var table = $('#TablaListaCriterios').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "100%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                data: null,
                title: "",
                className: "dt-left  btn_poa",
                defaultContent: '<button></button>',
                orderable: false
            }],
            "createdRow": function(row, data, index, cell) {

                if (data["CRITERIO_NOM"]) {
                    $('td', row).eq(0).html(`
                        <button class="btn btn-active-color-success" style="text-align:left;">

                            <div class="ps-6 pe-3 py-2 text-left">

                                    <i class="fa fa-check"></i>
                                        <a href="#" class="mb-1 text-muted   fw-bolder">Criterio</a>
                                    <div class="fs-4  text-dark fw-bolder text-hover-primary">` + data["CRITERIO_NOM"] + `</div>
                           
                            </div>
                        </button>

                            `);

                }


            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#TablaListaCriterios tbody').on('click', 'td.btn_poa', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Objetivos_Estrategicos(data);
        });

    }


    //***** OBJETIVOS ESTRATEGICOS */

    function Get_Objetivos_Estrategicos(data) {
        var criterio_id = data["CRITERIO_ID"];
        CRITERIO_NOM = data["CRITERIO_NOM"];
        CRITERIO_ID = criterio_id;
        var data = {
            criterio_id: criterio_id,
            perspectiva_id: PERSPECTIVA_ID
        }

        AjaxSendReceive(urlObjetivos_Estrategicos, data, function(response) {
            console.log("Objetivos_Estrategicos", response);
            if (response.length != 0) {

                $("#TablaListaPoa").show();
                Tabla_Objetivos_Estrategicos(response);
                $("#Seccion_Proyectos").hide();

            } else {
                Mensaje_Info("Oops", "Este criterio no contiene datos", "info");
                Tabla_Objetivos_Estrategicos(response);

            }
        });
    }

    function Nuevo_OBj_Estrategico() {
        var OBJ_Nombre = $("#OBJ_Nombre").val();
        var OBJ_Indicador = $("#OBJ_Indicador").val();
        var OBJ_Medio = $("#OBJ_Medio").val();

        if (OBJ_Nombre == "") {

        } else if (OBJ_Indicador == "") {

        } else if (OBJ_Medio == "") {

        } else {

            var data = {
                OBJEST_NOM: OBJ_Nombre,
                OBJEST_INDICADOR: OBJ_Indicador,
                OBJEST_MEDIO_VERIF: OBJ_Medio,
                PERSPECTIVA_ID: PERSPECTIVA_ID,
                CRITERIO_ID: CRITERIO_ID,
            }

            if (CRITERIO_ID == undefined) {
                Mensaje_Info("Error","No ha seleccionado un Criterio");
            } else {
                console.log(data);

                AjaxSendReceive(urlNuevo_Obj_Estrategico, data, function(response) {
                    console.log(response);
                })
            }

        }

    }

    function Tabla_Objetivos_Estrategicos(data) {
        $('#TablaListaPoa').empty();
        var table = $('#TablaListaPoa').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                data: null,
                title: "",
                className: "dt-center  btn_poa",
                defaultContent: '<button class="btn btn-icon  w-50px h-50px btn-active-light-primary btn-active-color-primary btn-light" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true"><span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"><path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" /><path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" /></svg></span></button>',
                orderable: false
            }],
            "createdRow": function(row, data, index, cell) {


                if (data["OBJEST_ID"]) {
                    var html = `
                    
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <button class="btn btn-active-light-primary btn-active-color-primary">
											<div class="flex-grow-1">

												<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
													<div class="d-flex flex-column">
														<div class="d-flex align-items-center mb-1">
															<a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">Objetivo Estrategico</a>
														</div>
														<div class="d-flex flex-wrap fw-bold mb-4 fs-4 text-gray-700">` + data["OBJEST_NOM"] + `</div>
													</div>
												</div>
												<div class="d-flex flex-wrap justify-content-start">
													<div class="d-flex flex-wrap">
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<div class="d-flex align-items-center">
																<div class="fs-4 fw-bolder">Indicador</div>
															</div>
															<div class="fw-bold fs-6 text-gray-600">` + data["OBJEST_INDICADOR"] + `</div>
														</div>
                                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<div class="d-flex align-items-center">
																<div class="fs-4 fw-bolder">Medio de Verificacion</div>
															</div>
															<div class="fw-bold fs-6 text-gray-600">` + data["OBJEST_MEDIO_VERIF"] + `</div>
														</div>
													</div>
												</div>
											</div>
                                            </button>
										</div>`;
                    $('td', row).eq(0).html(html);

                }
            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#TablaListaPoa tbody').on('click', 'td.btn_poa', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Indicadores(data);
            Get_Riesgos(data);
            Get_Fortalezas(data);
            Get_Oportunidades(data);
            Get_Debilidades(data);
            Get_Amenazas(data);
            $("#Seccion_Indicadores").show();
        });
    }

    //***** INDICADORES ******/

    function Get_Indicadores(data) {
        var object_id = data["OBJEST_ID"];
        var data = {
            OBJEST_ID: object_id,
        }
        OBJEST_ID = object_id;
        AjaxSendReceive(urlGet_Indicadores, data, function(response) {
            console.log("Indicadores", response);
            Tabla_Indicadores(response);
            $('html, body').animate({
                scrollTop: $("#Seccion_Indicadores").offset().top
            }, 1000);
        });
    }

    function Tabla_Indicadores(data) {
        $('#Tabla_indicadores').empty();
        var table = $('#Tabla_indicadores').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "100%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                    data: "DESCRIPCION",
                    title: "Descripcion",
                },
                {
                    data: null,
                    title: "",
                    className: "dt-left  btn_edit",
                    defaultContent: '<button class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                // if (data["CRITERIO_NOM"]) {
                $('td', row).eq(0).html(`
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Descripcion</div>
                                    </div>
                                    <div class="fs-4 fw-bolder ">` + data["DESCRIPCION"] + `</div>
                                </div>
                            `);

                // }


            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#TablaListaCriterios tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Objetivos_Estrategicos(data);
        });
    }

    //***** RIESGPS ******/

    function Get_Riesgos(data) {
        var object_id = data["OBJEST_ID"];
        var data = {
            OBJEST_ID: object_id,
        }
        OBJEST_ID = object_id;
        AjaxSendReceive(urlGet_Riesgos, data, function(response) {
            console.log("riesgos", response);
            Tabla_Riesgos(response);
        });
    }

    function Tabla_Riesgos(data) {
        $('#Tabla_Riesgos').empty();
        var table = $('#Tabla_Riesgos').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "100%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                    data: "RIESGO_NOM",
                    title: "RIESGO_NOM",
                }, {
                    data: "INDICE",
                    title: "INDICE",
                },
                {
                    data: null,
                    title: "",
                    className: "dt-left  btn_edit",
                    defaultContent: '<button class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                // if (data["CRITERIO_NOM"]) {
                $('td', row).eq(0).html(`
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Riesgo Nombre</div>
                                    </div>
                                    <div class="fs-4 fw-bolder ">` + data["RIESGO_NOM"] + `</div>
                                </div>
                            `);
                $('td', row).eq(1).html(`
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Indice</div>
                            </div>
                            <div class="fs-4 fw-bolder ">` + data["INDICE"] + `</div>
                        </div>
                `);

                // }


            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#Tabla_Riesgos tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Objetivos_Estrategicos(data);
        });
    }

    //***** FORTALEZAS ******/

    function Get_Fortalezas(data) {
        var object_id = data["OBJEST_ID"];
        var data = {
            OBJEST_ID: object_id,
        }
        OBJEST_ID = object_id;
        AjaxSendReceive(urlGet_Fortalezas, data, function(response) {
            console.log("Get_Fortalezas", response);
            Tabla_Fortalezas(response);
        });
    }

    function Tabla_Fortalezas(data) {
        $('#Tabla_Fortalezas').empty();
        var table = $('#Tabla_Fortalezas').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "100%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                    data: "FORTALEZA_NOM",
                    title: "FORTALEZA_NOM",
                }, {
                    data: "INDICE",
                    title: "INDICE",
                },
                {
                    data: null,
                    title: "",
                    className: "dt-left  btn_edit",
                    defaultContent: '<button class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                // if (data["CRITERIO_NOM"]) {
                $('td', row).eq(0).html(`
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Fortaleza Nombre</div>
                                    </div>
                                    <div class="fs-4 fw-bolder ">` + data["FORTALEZA_NOM"] + `</div>
                                </div>
                            `);
                $('td', row).eq(1).html(`
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Indice</div>
                            </div>
                            <div class="fs-4 fw-bolder ">` + data["INDICE"] + `</div>
                        </div>
                `);

                // }


            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#Tabla_Fortalezas tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Objetivos_Estrategicos(data);
        });
    }

    //***** OPORTUNIDADDES ******/

    function Get_Oportunidades(data) {
        var object_id = data["OBJEST_ID"];
        var data = {
            OBJEST_ID: object_id,
        }
        OBJEST_ID = object_id;
        AjaxSendReceive(urlGet_Oportunidades, data, function(response) {
            console.log("Get_Oportunidades", response);
            Tabla_Oportunidades(response);
        });
    }

    function Tabla_Oportunidades(data) {
        $('#Tabla_oportunidades').empty();
        var table = $('#Tabla_oportunidades').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "100%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                    data: "OPORTUNIDAD_NOM",
                    title: "OPORTUNIDAD_NOM",
                }, {
                    data: "INDICE",
                    title: "INDICE",
                },
                {
                    data: null,
                    title: "",
                    className: "dt-left  btn_edit",
                    defaultContent: '<button class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                // if (data["CRITERIO_NOM"]) {
                $('td', row).eq(0).html(`
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Oportunidad Nombre</div>
                                    </div>
                                    <div class="fs-4 fw-bolder ">` + data["OPORTUNIDAD_NOM"] + `</div>
                                </div>
                            `);
                $('td', row).eq(1).html(`
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Indice</div>
                            </div>
                            <div class="fs-4 fw-bolder ">` + data["INDICE"] + `</div>
                        </div>
                `);

                // }


            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#Tabla_oportunidades tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Objetivos_Estrategicos(data);
        });
    }

    //***** DEBILIDADES ******/

    function Get_Debilidades(data) {
        var object_id = data["OBJEST_ID"];
        var data = {
            OBJEST_ID: object_id,
        }
        OBJEST_ID = object_id;
        AjaxSendReceive(urlGet_Debilidades, data, function(response) {
            console.log("Get_Debilidades", response);
            Tabla_Debilidades(response);
        });
    }

    function Tabla_Debilidades(data) {
        $('#Tabla_Debilidades').empty();
        var table = $('#Tabla_Debilidades').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "100%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                    data: "DEBILIDAD_NOM",
                    title: "DEBILIDAD_NOM",
                }, {
                    data: "INDICE",
                    title: "INDICE",
                },
                {
                    data: null,
                    title: "",
                    className: "dt-left  btn_edit",
                    defaultContent: '<button class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                // if (data["CRITERIO_NOM"]) {
                $('td', row).eq(0).html(`
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Debilidad Nombre</div>
                                    </div>
                                    <div class="fs-4 fw-bolder ">` + data["DEBILIDAD_NOM"] + `</div>
                                </div>
                            `);
                $('td', row).eq(1).html(`
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Indice</div>
                            </div>
                            <div class="fs-4 fw-bolder ">` + data["INDICE"] + `</div>
                        </div>
                `);

                // }


            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#Tabla_Debilidades tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Objetivos_Estrategicos(data);
        });
    }


    //***** AMENAZAS ******/

    function Get_Amenazas(data) {
        var object_id = data["OBJEST_ID"];
        var data = {
            OBJEST_ID: object_id,
        }
        OBJEST_ID = object_id;
        AjaxSendReceive(urlGet_Amenazas, data, function(response) {
            console.log("Get_Amenazas", response);
            Tabla_Amenazas(response);
        });
    }

    function Tabla_Amenazas(data) {
        $('#Tabla_Amenazas').empty();
        var table = $('#Tabla_Amenazas').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "100%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                    data: "AMENAZA_NOM",
                    title: "AMENAZA_NOM",
                }, {
                    data: "INDICE",
                    title: "INDICE",
                },
                {
                    data: null,
                    title: "",
                    className: "dt-left  btn_edit",
                    defaultContent: '<button class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                // if (data["CRITERIO_NOM"]) {
                $('td', row).eq(0).html(`
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Amenaza Nombre</div>
                                    </div>
                                    <div class="fs-4 fw-bolder ">` + data["AMENAZA_NOM"] + `</div>
                                </div>
                            `);
                $('td', row).eq(1).html(`
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Indice</div>
                            </div>
                            <div class="fs-4 fw-bolder ">` + data["INDICE"] + `</div>
                        </div>
                `);

                // }


            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#Tabla_Amenazas tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Objetivos_Estrategicos(data);
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