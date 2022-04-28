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
$urlNuevo_Indicador = constant("URL") . "matrizestrategica/Nuevo_Indicador";
$urlNuevo_Riesgo = constant("URL") . "matrizestrategica/Nuevo_Riesgo";
$urlNuevo_Fortaleza = constant("URL") . "matrizestrategica/Nuevo_Fortaleza";
$urlNuevo_Oportunidad = constant("URL") . "matrizestrategica/Nuevo_Oportunidad";
$urlNuevo_Debilidad = constant("URL") . "matrizestrategica/Nuevo_Debilidad";
$urlNuevo_Amenaza = constant("URL") . "matrizestrategica/Nuevo_Amenaza";


$urlActualizar_Indicador = constant("URL") . "matrizestrategica/Actualizar_Indicador";
$urlActualizar_Riesgo = constant("URL") . "matrizestrategica/Actualizar_Riesgo";
$urlActualizar_Fortaleza = constant("URL") . "matrizestrategica/Actualizar_Fortaleza";
$urlActualizar_Oportunidad = constant("URL") . "matrizestrategica/Actualizar_Oportunidad";
$urlActualizar_Debilidad = constant("URL") . "matrizestrategica/Actualizar_Debilidad";
$urlActualizar_Amenaza = constant("URL") . "matrizestrategica/Actualizar_Amenaza";

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
    var urlNuevo_Indicador = '<?php echo $urlNuevo_Indicador ?>';
    var urlNuevo_Riesgo = '<?php echo $urlNuevo_Riesgo ?>';
    var urlNuevo_Fortaleza = '<?php echo $urlNuevo_Fortaleza ?>';
    var urlNuevo_Oportunidad = '<?php echo $urlNuevo_Oportunidad ?>';
    var urlNuevo_Debilidad = '<?php echo $urlNuevo_Debilidad ?>';
    var urlNuevo_Amenaza = '<?php echo $urlNuevo_Amenaza ?>';

    var urlActualizar_Indicador = '<?php echo $urlActualizar_Indicador ?>';
    var urlActualizar_Riesgo = '<?php echo $urlActualizar_Riesgo ?>';
    var urlActualizar_Fortaleza = '<?php echo $urlActualizar_Fortaleza ?>';
    var urlActualizar_Oportunidad = '<?php echo $urlActualizar_Oportunidad ?>';
    var urlActualizar_Debilidad = '<?php echo $urlActualizar_Debilidad ?>';
    var urlActualizar_Amenaza = '<?php echo $urlActualizar_Amenaza ?>';


    var PERSPECTIVA_ID;
    var CRITERIO_ID;
    var OBJEST_ID;
    var INDICADOR_ID;
    var PERSPECTIVA_NOM;
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
                CRITERIO_NOM: Nombre_cri,
                PERSPECTIVA_ID: PERSPECTIVA_ID
            }

            AjaxSendReceive(urlNuevo_criterio, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Criterio").modal('hide');
                    $("#CRIT_Nombre").val("");
                    Get_Criterios(PERSPECTIVA_ID, PERSPECTIVA_NOM)
                }
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
        var OBJ_Indicador = $("#OBJ_Indicador option:selected").text();
        var OBJ_Medio = $("#OBJ_Medio option:selected").text();

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
                Mensaje_Info("Error", "No ha seleccionado un Criterio");
            } else {
                console.log(data);

                AjaxSendReceive(urlNuevo_Obj_Estrategico, data, function(response) {
                    console.log(response);
                    if (response == true) {
                        Get_Objetivos_Estrategicos(data)
                        $("#kt_modal_add_Obj_estrategicos").modal('hide');
                        $("#OBJ_Nombre").val("");
                        $("#OBJ_Indicador").val(-1).change();
                        $("#OBJ_Medio").val(-1).change();

                    }
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
                }, {
                    data: "MEDIO_VERIFICACION",
                    title: "MEDIO_VERIFICACION",
                },
                {
                    data: null,
                    title: "",
                    className: "dt-left  btn_edit",
                    defaultContent: '<button data-bs-toggle="modal" data-bs-target="#kt_modal_add_Indicador" class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
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
                $('td', row).eq(1).html(`
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 text-muted   fw-bolder">Medio de Verificacion</div>
                                    </div>
                                    <div class="fs-4 fw-bolder ">` + data["MEDIO_VERIFICACION"] + `</div>
                                </div>
                            `);

                // }


            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#Tabla_indicadores tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Set_Data_To_Update_Indicadores(data);
        });
    }

    function Nuevo_Indicador() {
        var nombre = $("#IND_Nombre").val();
        var medio = $("#MED_VER").val();

        if (nombre == "") {

        } else if (medio == "") {

        } else {

            var data = {
                DESCRIPCION: nombre,
                MVERIFICACION_ID: medio,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlNuevo_Indicador, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Indicador").modal('hide');
                    Get_Indicadores(data);
                }
            });
        }

    }

    function Set_Data_To_Update_Indicadores(data) {
        console.log(data);
        $("#Btn_Nuevo_Indicador_b").hide();
        $("#Btn_Actualizar_Indicador_b").show();
        var DESCRIPCION = data["DESCRIPCION"];
        var MVERIFICACION_ID = data["MVERIFICACION_ID"];
        INDICADOR_ID = data["INDICADOR_ID"]
        $('#MED_VER').val(MVERIFICACION_ID).change();
        $("#IND_Nombre").val(DESCRIPCION);

    }

    function Actualizar_Indicador() {
        var nombre = $("#IND_Nombre").val();
        var medio = $("#MED_VER").val();

        if (nombre == "") {

        } else if (medio == "") {

        } else {

            var data = {
                DESCRIPCION: nombre,
                MVERIFICACION_ID: medio,
                OBJEST_ID: OBJEST_ID,
                INDICADOR_ID: INDICADOR_ID
            }
            console.log(data);

            AjaxSendReceive(urlActualizar_Indicador, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Indicador").modal('hide');
                    Get_Indicadores(data);
                }
            });
        }

    }


    //***** RIESGOS ******/

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
                    defaultContent: '<button data-bs-toggle="modal" data-bs-target="#kt_modal_add_Riesgo" class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
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
            Set_Data_To_Update_Riesgos(data);
        });
    }

    function Nuevo_Riesgo() {
        var nombre = $("#RIES_Nombre").val();
        var indice = $("#RIES_Indice").val();
        var riesgotipo = $("#RIES_tipo").val();

        if (nombre == "") {

        } else if (indice == "") {

        } else {

            var data = {
                INDICE: indice.toUpperCase(),
                RIESGO_NOM: nombre,
                RIESGOTIPO_ID: riesgotipo,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlNuevo_Riesgo, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Riesgo").modal('hide');
                    Get_Riesgos(data);
                }
            });
        }
    }

    function Set_Data_To_Update_Riesgos(data) {
        console.log(data);
        $("#Btn_Nuevo_Riesgo_b").hide();
        $("#Btn_Actualizar_Riesgo_b").show();
        var RIESGO_NOM = data["RIESGO_NOM"];
        var INDICE = data["INDICE"];
        var RIESGOTIPO_ID = data["RIESGOTIPO_ID"];
        INDICADOR_ID = data["RIESGO_ID"]
        $('#RIES_tipo').val(RIESGOTIPO_ID).change();
        $("#RIES_Indice").val(INDICE);
        $("#RIES_Nombre").val(RIESGO_NOM);

    }

    function Actualizar_Riesgos() {
        var RIES_Nombre = $("#RIES_Nombre").val();
        var RIES_Indice = $("#RIES_Indice").val();
        var RIES_tipo = $("#RIES_tipo").val();

        if (RIES_Nombre == "") {

        } else if (RIES_Indice == "") {

        } else {

            var data = {
                RIESGO_NOM: RIES_Nombre,
                INDICE: RIES_Indice,
                RIESGOTIPO_ID: RIES_tipo,
                RIESGO_ID: INDICADOR_ID,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlActualizar_Riesgo, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Riesgo").modal('hide');
                    Get_Riesgos(data);
                }
            });
        }

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
                    defaultContent: '<button data-bs-toggle="modal" data-bs-target="#kt_modal_add_Fortaleza" class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
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
            Set_Data_To_Update_Fortalezas(data);
        });
    }

    function Nuevo_Fortaleza() {
        var nombre = $("#FOR_Nombre").val();
        var indice = $("#FOR_Indice").val();

        if (nombre == "") {

        } else if (indice == "") {

        } else {

            var data = {
                INDICE: indice.toUpperCase(),
                FORTALEZA_NOM: nombre,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlNuevo_Fortaleza, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Fortaleza").modal('hide');
                    Get_Fortalezas(data);
                }
            });
        }
    }

    function Set_Data_To_Update_Fortalezas(data) {
        console.log(data);
        $("#Btn_Nuevo_Fortaleza_b").hide();
        $("#Btn_Actualizar_Fortaleza_b").show();
        var FORTALEZA_NOM = data["FORTALEZA_NOM"];
        var INDICE = data["INDICE"];
        INDICADOR_ID = data["FORTALEZA_ID"]
        $("#FOR_Indice").val(INDICE);
        $("#FOR_Nombre").val(FORTALEZA_NOM);

    }

    function Actualizar_Fortalezas() {
        var FOR_Nombre = $("#FOR_Nombre").val();
        var FOR_Indice = $("#FOR_Indice").val();

        if (FOR_Nombre == "") {

        } else if (FOR_Indice == "") {

        } else {

            var data = {
                FOR_Nombre: FOR_Nombre,
                FOR_Indice: FOR_Indice,
                FORTALEZA_ID: INDICADOR_ID,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlActualizar_Fortaleza, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Fortaleza").modal('hide');
                    Get_Fortalezas(data);
                }
            });
        }

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
                    defaultContent: '<button data-bs-toggle="modal" data-bs-target="#kt_modal_add_Oportunidad" class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
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
            Set_Data_To_Update_Oportunidad(data);
        });
    }

    function Nuevo_Oportunidad() {
        var nombre = $("#OPOR_Nombre").val();
        var indice = $("#OPOR_Indice").val();

        if (nombre == "") {

        } else if (indice == "") {

        } else {

            var data = {
                INDICE: indice.toUpperCase(),
                OPORTUNIDAD_NOM: nombre,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlNuevo_Oportunidad, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Oportunidad").modal('hide');
                    Get_Oportunidades(data);
                }
            });
        }
    }

    function Set_Data_To_Update_Oportunidad(data) {
        console.log(data);
        $("#Btn_Nuevo_Oportunidad_b").hide();
        $("#Btn_Actualizar_Oportunidad_b").show();
        var OPORTUNIDAD_NOM = data["OPORTUNIDAD_NOM"];
        var INDICE = data["INDICE"];
        INDICADOR_ID = data["OPORTUNIDAD_ID"]
        $("#OPOR_Indice").val(INDICE);
        $("#OPOR_Nombre").val(OPORTUNIDAD_NOM);

    }

    function Actualizar_Oportunidad() {
        var OPOR_Nombre = $("#OPOR_Nombre").val();
        var OPOR_Indice = $("#OPOR_Indice").val();

        if (OPOR_Nombre == "") {

        } else if (OPOR_Indice == "") {

        } else {

            var data = {
                OPOR_Nombre: OPOR_Nombre,
                OPOR_Indice: OPOR_Indice,
                OPORTUNIDAD_ID: INDICADOR_ID,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlActualizar_Oportunidad, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Oportunidad").modal('hide');
                    Get_Oportunidades(data);
                }
            });
        }

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
                    defaultContent: '<button  data-bs-toggle="modal" data-bs-target="#kt_modal_add_Debilidad" class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
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
            Set_Data_To_Update_Debilidad(data);
        });
    }


    function Nuevo_Debilidad() {
        var nombre = $("#DEB_Nombre").val();
        var indice = $("#DEB_Indice").val();

        if (nombre == "") {

        } else if (indice == "") {

        } else {

            var data = {
                INDICE: indice.toUpperCase(),
                DEBILIDAD_NOM: nombre,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlNuevo_Debilidad, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Debilidad").modal('hide');
                    Get_Debilidades(data);
                }
            });
        }
    }


    function Set_Data_To_Update_Debilidad(data) {
        console.log(data);
        $("#Btn_Nuevo_Debilidad_b").hide();
        $("#Btn_Actualizar_Debilidad_b").show();
        var DEBILIDAD_NOM = data["DEBILIDAD_NOM"];
        var INDICE = data["INDICE"];
        INDICADOR_ID = data["DEBILIDAD_ID"]
        $("#DEB_Indice").val(INDICE);
        $("#DEB_Nombre").val(DEBILIDAD_NOM);

    }

    function Actualizar_Debilidad() {
        var DEB_Nombre = $("#DEB_Nombre").val();
        var DEB_Indice = $("#DEB_Indice").val();

        if (DEB_Nombre == "") {

        } else if (DEB_Indice == "") {

        } else {

            var data = {
                DEB_Nombre: DEB_Nombre,
                DEB_Indice: DEB_Indice,
                OPORTUNIDAD_ID: INDICADOR_ID,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlActualizar_Debilidad, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Debilidad").modal('hide');
                    Get_Debilidades(data);
                }
            });
        }

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
                    defaultContent: '<button data-bs-toggle="modal" data-bs-target="#kt_modal_add_Amenaza"  class="btn btn-active-color-primary"><i class="fa fa-edit"></i></button>',
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
            Set_Data_To_Update_Amenaza(data);
        });
    }

    function Nuevo_Amenaza() {
        var nombre = $("#AME_Nombre").val();
        var indice = $("#AME_Indice").val();

        if (nombre == "") {

        } else if (indice == "") {

        } else {

            var data = {
                INDICE: indice.toUpperCase(),
                AMENAZA_NOM: nombre,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlNuevo_Amenaza, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Amenaza").modal('hide');
                    Get_Amenazas(data);
                }
            });
        }
    }

    function Set_Data_To_Update_Amenaza(data) {
        console.log(data);
        $("#Btn_Nuevo_Amenaza_b").hide();
        $("#Btn_Actualizar_Amenaza_b").show();
        var AMENAZA_NOM = data["AMENAZA_NOM"];
        var INDICE = data["INDICE"];
        INDICADOR_ID = data["AMENAZA_ID"]
        $("#AME_Indice").val(INDICE);
        $("#AME_Nombre").val(AMENAZA_NOM);

    }

    function Actualizar_Amenaza() {
        var AME_Nombre = $("#AME_Nombre").val();
        var AME_Indice = $("#AME_Indice").val();

        if (AME_Nombre == "") {

        } else if (AME_Indice == "") {

        } else {

            var data = {
                AME_Nombre: AME_Nombre,
                AME_Indice: AME_Indice,
                AMENAZA_ID: INDICADOR_ID,
                OBJEST_ID: OBJEST_ID
            }
            console.log(data);

            AjaxSendReceive(urlActualizar_Amenaza, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Amenaza").modal('hide');
                    Get_Amenazas(data);
                }
            });
        }

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