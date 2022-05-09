<?php

$urlGet_perspectiva = constant("URL") . "poa/Get_Perspectivas";
$urlGet_Criterios = constant("URL") . "poa/Get_Criterios";
$urlGet_Poa = constant("URL") . "poa/Get_Poa";
$urlGet_Proyectos = constant("URL") . "poa/Get_Proyectos";
$urlGet_Proyectos_detalles = constant("URL") . "poa/Get_Proyectos_Detalles";

$urlNueva_Actividad = constant("URL") . "poa/Nueva_Actividad";
$urlNuevo_Proyecto = constant("URL") . "poa/Nuevo_Proyecto";
$urlActualizar_Actividad = constant("URL") . "poa/Actualizar_Actividad";
$urlEliminar_Actividad = constant("URL") . "poa/Eliminar_Actividad";

$urlNueva_perspectiva = constant("URL") . "matrizestrategica/Nueva_perspectiva";

?>

<script>
    var urlGet_perspectiva = '<?php echo $urlGet_perspectiva ?>';
    var urlGet_Criterios = '<?php echo $urlGet_Criterios ?>';
    var urlGet_Poa = '<?php echo $urlGet_Poa ?>';
    var urlGet_Proyectos = '<?php echo $urlGet_Proyectos ?>';
    var urlGet_Proyectos_detalles = '<?php echo $urlGet_Proyectos_detalles ?>';
    var urlNueva_Actividad = '<?php echo $urlNueva_Actividad ?>';
    var urlNuevo_Proyecto = '<?php echo $urlNuevo_Proyecto ?>';
    var urlActualizar_Actividad = '<?php echo $urlActualizar_Actividad ?>';
    var urlEliminar_Actividad = '<?php echo $urlEliminar_Actividad ?>';
    var urlNueva_perspectiva = '<?php echo $urlNueva_perspectiva ?>';

    var PERSPECTIVA_ID;
    var CRITERIO_ID;
    var ARR_PROYECTOS;
    var ARR_POAS;
    var PERSPECTIVA_NOM;
    var CRITERIO_NOM;
    var POA_NOM;
    var POA_AREA;
    var POA_DEPT;

    var ARRAY_DATA_PROYECT;
    var PROYECTO_ID;
    var ARRAY_DATA_ACTIVIDADES;
    var ARRAY_DATA_POA;
    var FILTER_ID_DEPT;

    function Mensaje_Info(mensaje1, mensaje2, icono) {
        Swal.fire(
            mensaje1,
            mensaje2,
            icono
        )
    }

    //********* */ PERSPECTIVAS **********/

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

    //********* */ CRITERIOS **********/

    function Get_Criterios(id, nombre) {



        var data = {
            id_perspectiva: id
        }
        PERSPECTIVA_ID = id;
        PERSPECTIVA_NOM = nombre;
        AjaxSendReceive(urlGet_Criterios, data, function(response) {

            Tabla_criterios(response);
            $("#TablaListaPoa").hide();

        });

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

                // if (data["CRITERIO_NOM"]) {
                //     var char = data["CRITERIO_NOM"];
                //     char = char.substring(0, 1);
                //     var r = Math.floor(Math.random() * 10) + 1;
                //     var color = "bg-danger";
                //     if (r >= 1 && r < 3) {
                //         color = "bg-primary";
                //     } else if (r >= 3 && r < 6) {
                //         color = "bg-info";
                //     } else if (r >= 6 && r < 9) {
                //         color = "bg-warning";
                //     } else {
                //         color = "bg-danger";
                //     }

                //     $('td', row).eq(0).html("<div class='symbol symbol-40px me-4'><div class='symbol-label fs-2 fw-bold " + color + " text-inverse-danger'>" + char + "</div></div>");
                // }
            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#TablaListaCriterios tbody').on('click', 'td.btn_poa', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            Get_Poa(data);
        });

    }

    //********* */ POAS **********/
    function POA_FILTRAR_DEPTS(id) {
        FILTER_ID_DEPT = id;
        // var arrdata = JSON.parse(JSON.stringify(ARR_POAS));
        // let DATA_FILTRADA = arrdata.filter(id_d => (id_d.DEPTO_ID) == id);
        // if (id == "") {
        //     DATA_FILTRADA = ARR_POAS;
        // }
        // console.log(DATA_FILTRADA);
        // Tabla_Poa(DATA_FILTRADA);

    }

    function Get_Poa(data) {
        var criterio_id = data["CRITERIO_ID"];
        CRITERIO_NOM = data["CRITERIO_NOM"];
        CRITERIO_ID = criterio_id;
        var data = {
            criterio_id: criterio_id,
            perspectiva_id: PERSPECTIVA_ID
        }
        console.log(data);

        AjaxSendReceive(urlGet_Poa, data, function(response) {

            if (response.length != 0) {
                ARR_POAS = response;

                var arrdata = JSON.parse(JSON.stringify(response));
                var Data_filtrada;
                if (FILTER_ID_DEPT == "Todos" || FILTER_ID_DEPT == undefined) {
                    Data_filtrada = arrdata;
                    Tabla_Poa(response);

                } else {
                    Data_filtrada = arrdata.filter(pr => (pr.AREA_ID) == FILTER_ID_DEPT);
                    Tabla_Poa(Data_filtrada);

                }
                console.log("POA", Data_filtrada);

                $("#TablaListaPoa").show();
                $("#Seccion_Proyectos").hide();
                // var resArr = [];
                // arrdata.filter(function(item) {
                //     var i = resArr.findIndex(x => x.DEPTO_NOM == item.DEPTO_NOM);
                //     if (i <= -1) {
                //         resArr.push({
                //             DEPTO_ID: item.DEPTO_ID,
                //             DEPTO_NOM: item.DEPTO_NOM
                //         });
                //     }
                //     return null;
                // });
                // var cbDeps = document.getElementById("Poa_Filter");
                // $('#Poa_Filter option').remove(); // clear all values 
                // $('#Poa_Filter ').append('<option value="">Todos</option>');
                // jQuery.each(resArr, function(key, value) {
                //     option = document.createElement("option");
                //     option.value = value.DEPTO_ID;
                //     option.text = value.DEPTO_NOM;
                //     cbDeps.appendChild(option);
                // });


            } else {
                Mensaje_Info("Oops", "Este criterio no contiene datos", "info");
                Tabla_Poa(response);
                ARR_POAS = response;

            }
        });
    }

    function Tabla_Poa(data) {
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


                if (data["POA_ID"]) {
                    var html = `
                    
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <button class="btn btn-active-light-primary btn-active-color-primary">
											<div class="flex-grow-1">

												<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
													<div class="d-flex flex-column">
														<div class="d-flex align-items-center mb-1">
															<a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">POA</a>
														</div>
														<div class="d-flex flex-wrap fw-bold mb-4 fs-4 text-gray-700">` + data["OBJEST_NOM"] + `</div>
													</div>
												</div>
												<div class="d-flex flex-wrap justify-content-start">
													<div class="d-flex flex-wrap">
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<div class="d-flex align-items-center">
																<div class="fs-4 fw-bolder">Area</div>
															</div>
															<div class="fw-bold fs-6 text-gray-400">` + data["AREA_NOM"] + `</div>
														</div>
                                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<div class="d-flex align-items-center">
																<div class="fs-4 fw-bolder">Departamento</div>
															</div>
															<div class="fw-bold fs-6 text-gray-400">` + data["DEPTO_NOM"] + `</div>
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
            Get_Proyectos(data);
            $("#Seccion_Proyectos").show();

        });
    }

    //********* */ PROYECTOS **********/

    /**@abstract
     * OBTEMENOS LOS DIFRENETS PROYECTOS DEPENDIENDO DEL POA SELECCIONADO
     */

    function Get_Proyectos(data) {
        ARRAY_DATA_POA = data;
        POA_NOM = data["OBJEST_NOM"];
        POA_AREA = data["AREA_NOM"];
        POA_DEPT = data["DEPTO_NOM"];



        var data = {
            id_poa: data["POA_ID"]
        }

        AjaxSendReceive(urlGet_Proyectos, data, function(response) {

            ARR_PROYECTOS = [];
            ARR_PROYECTOS = response;
            var arrdata = JSON.parse(JSON.stringify(response));
            let Proyect_info = arrdata.filter(pr => (pr.PROYECTOA_ACTIVO) == "S");

            Crear_proyectos(Proyect_info);
            console.log("PROYECTOS", ARR_PROYECTOS);

            /**
             * VAMOS  A LA SECCION PROYECTOS AUTOMATICAMENTE
             */
            $('html, body').animate({
                scrollTop: $("#Seccion_Proyectos").offset().top
            }, 1000);
        });

    }

    /**@abstract
     * CREEAMOS LAS CARTILLAS CON LOS DIFERENTES PROYECTOS DE POA
     */


    function Crear_proyectos(data) {
        var arrdata = JSON.parse(JSON.stringify(data));
        $("#Lista_proyectos").empty();
        ARRAY_DATA_PROYECT = [];
        jQuery.each(arrdata, function(key, value) {

            var estado = value.PROYECTOA_ACTIVO;
            var estado_color = "badge-light-primary";
            var nombre = value.PROYECTOA_NOM;
            var indicador = value.PROYECTOA_INDICADOR;
            var Fecha_creacion = value.FCREADO;
            var Responsable = value.PROYECTOA_RESPONSABLE;
            var ID_PROYECTO = value.PROYECTOA_ID;

            var data = {
                ID_PROYECTO: ID_PROYECTO,
                PROYECTOA_ACTIVO: estado,
                CRITERIO_ID: value.CRITERIO_ID,
                POA_ID: value.POA_ID,
                OBJEST_ID: value.OBJEST_ID,
                PERSPECTIVA_ID: value.PERSPECTIVA_ID
            };

            ARRAY_DATA_PROYECT.push(data);

            var funcion = "Proyecto_info(" + ID_PROYECTO + ");";
            var funcionELiminar = "Proyecto_Eliminar(" + ID_PROYECTO + ");";
            var funcionedit = "Proyecto_Edit(" + ID_PROYECTO + ");";

            if (estado == "S") {
                estado = "Activo";
            } else if (estado == "N") {
                estado = "Desactivado";
                estado_color = "badge-light-danger";
                funcion = "";
            }

            var Proyect_card = `<div class="col-md-6 col-xl-4" >
											<div class="card-header border-0 pt-9">
												<div class="card-title m-0">
                                                    <button onclick="` + funcionELiminar + `return false;" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-danger" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        <span class="svg-icon svg-icon-2">
                                                        <i class="fa fa-trash"></i>
                                                        </span>
                                                    
                                                    </button>
                                                    <button onclick="` + funcionedit + `return false;" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
												</div>
												<div class="card-toolbar">
													<span class="badge ` + estado_color + ` fw-bolder me-auto px-4 py-3">` + estado + `</span>
												</div>
											</div>
                                        <a disabled href="#" onclick="` + funcion + `return false;" class="card border-hover-primary">

											<div class="card-body p-9">
												<div class="fs-5 fw-bolder text-dark">` + nombre + `</div>
												<p class="text-gray-600 fw-bold fs-7 mt-1 mb-7">` + indicador + `</p>
												<div class="d-flex flex-wrap mb-5">
													<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
														<div class="fs-6 text-gray-800 fw-bolder">` + Fecha_creacion + `</div>
														<div class="fw-bold text-gray-400">Creado</div>
													</div>
													
												</div>
												<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 50% completed">
													<div class="bg-primary rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<div class="symbol-group symbol-hover">
                                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
														<div class="fs-6 text-gray-800 fw-bolder">` + Responsable + `</div>
														<div class="fw-bold text-gray-400">Responsable</div>
													</div>
												</div>
											</div>
										</a>
									</div>`;
            $("#Lista_proyectos").append(Proyect_card);

        });
    }

    function PRY_filtrar_Proyectos_Estado(id) {
        console.log(id);
        var arrdata = JSON.parse(JSON.stringify(ARR_PROYECTOS));

        var arr;
        if (id == 1) {
            arr = ARR_PROYECTOS;
        } else if (id == 2) {
            let Proyect_info = arrdata.filter(pr => (pr.PROYECTOA_ACTIVO) == "S");
            arr = Proyect_info;

        } else if (id == 3) {
            let Proyect_info = arrdata.filter(pr => (pr.PROYECTOA_ACTIVO) == "N");
            arr = Proyect_info;
        }

        Crear_proyectos(arr);

    }

    function Nuevo_Proyecto() {
        var PROYECTOA_NOM = $("#PRY_Nombre").val();
        var PROYECTOA_RESPONSABLE = $("#PRY_Responsable option:selected").text();
        var PROYECTOA_RESPONSABLE_ID = $("#PRY_Responsable").val();
        // var PROYECTOA_INDICADOR = $("#PRY_indicador option:selected").text();
        var PROYECTOA_INDICADOR = $("#PRY_indicador").val();
        var PROYECTOA_META_2022 = $("#PRY_Meta2022").val();
        var PROYECTOA_META_2023 = $("#PRY_Meta2023").val();
        var PROYECTOA_META_2024 = $("#PRY_Meta2024").val();
        var PROYECTOA_META_2025 = $("#PRY_Meta2025").val();
        var PROYECTOA_META_2026 = $("#PRY_Meta2026").val();
        var PROYECTOA_META_2027 = $("#PRY_Meta2027").val();
        var PROYECTOA_META_2028 = $("#PRY_Meta2028").val();
        var PROYECTOA_META_2029 = $("#PRY_Meta2029").val();
        var PROYECTOA_META_2030 = $("#PRY_Meta2030").val();

        var FCREADO = moment().format("YYYY-MM-DD");
        var HCREADO = moment().format("hh:mm:ss");
        var PROYECTOA_ACTIVO = "S";
        var PROYECTOA_ELIMINADO = "N";

        console.log(PROYECTOA_RESPONSABLE_ID);
        if (PROYECTOA_NOM == "") {

        } else if (PROYECTOA_RESPONSABLE == "") {

        } else if (PROYECTOA_INDICADOR == "") {

        } else {

            var DATA_TO_SEND = {
                PROYECTOA_NOM: PROYECTOA_NOM,
                PROYECTOA_RESPONSABLE: PROYECTOA_RESPONSABLE,
                PROYECTOA_RESPONSABLE_ID:PROYECTOA_RESPONSABLE_ID,
                PROYECTOA_INDICADOR: PROYECTOA_INDICADOR,
                PERSPECTIVA_ID: PERSPECTIVA_ID,
                CRITERIO_ID: CRITERIO_ID,
                POA_ID: ARRAY_DATA_POA["POA_ID"],
                OBJEST_ID: ARRAY_DATA_POA["OBJEST_ID"],
                PROYECTOA_META_2022: PROYECTOA_META_2022,
                PROYECTOA_META_2023: PROYECTOA_META_2023,
                PROYECTOA_META_2024: PROYECTOA_META_2024,
                PROYECTOA_META_2025: PROYECTOA_META_2025,
                PROYECTOA_META_2026: PROYECTOA_META_2026,
                PROYECTOA_META_2027: PROYECTOA_META_2027,
                PROYECTOA_META_2028: PROYECTOA_META_2028,
                PROYECTOA_META_2029: PROYECTOA_META_2029,
                PROYECTOA_META_2030: PROYECTOA_META_2030
            }

            console.log("SEND",DATA_TO_SEND);

            AjaxSendReceive(urlNuevo_Proyecto, DATA_TO_SEND, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_Nuevo_Proyecto").modal('hide');
                    Mensaje_Guardado_ok();
                    Get_Proyectos(ARRAY_DATA_POA);
                }
            })
        }


    }

    function Proyecto_Edit(id) {
        //Limpiar_Proyectos();
        var arrdata = JSON.parse(JSON.stringify(ARR_PROYECTOS));
        let Proyect_info = arrdata.filter(pr => (pr.PROYECTOA_ID) == id);
        console.log(Proyect_info);
        var PROYECTOA_NOM = Proyect_info[0]["PROYECTOA_NOM"];
        var PROYECTOA_RESPONSABLE = Proyect_info[0]["USUARIOS_ID"];
        var PROYECTOA_INDICADOR = Proyect_info[0]["PROYECTOA_INDICADOR"];
        var PROYECTOA_META_2022 = Proyect_info[0]["PROYECTOA_META_2022"];
        var PROYECTOA_META_2023 = Proyect_info[0]["PROYECTOA_META_2023"];
        var PROYECTOA_META_2024 = Proyect_info[0]["PROYECTOA_META_2024"];
        var PROYECTOA_META_2025 = Proyect_info[0]["PROYECTOA_META_2025"];
        var PROYECTOA_META_2026 = Proyect_info[0]["PROYECTOA_META_2026"];
        var PROYECTOA_META_2027 = Proyect_info[0]["PROYECTOA_META_2027"];
        var PROYECTOA_META_2028 = Proyect_info[0]["PROYECTOA_META_2028"];
        var PROYECTOA_META_2029 = Proyect_info[0]["PROYECTOA_META_2029"];
        var PROYECTOA_META_2030 = Proyect_info[0]["PROYECTOA_META_2030"];


        // const dd = document.getElementById('PRY_Responsable');
        // dd.selectedIndex = [...dd.options].findIndex(option => option.text === PROYECTOA_RESPONSABLE);
        // $("#PRY_Responsable option").filter(function() {
        //     //may want to use $.trim in here
        //     return $(this).text() == PROYECTOA_RESPONSABLE;
        // }).attr('selected', true).change();

        // $("#PRY_indicador option").filter(function() {
        //     //may want to use $.trim in here
        //     return $(this).text() == PROYECTOA_INDICADOR;
        // }).attr('selected', true).change();
        // $("#PRY_Responsable").select2("val", PROYECTOA_RESPONSABLE.replaceAll(" ",""));
        $('#PRY_Responsable').val(PROYECTOA_RESPONSABLE).change();
        $("#PRY_indicador").val(PROYECTOA_INDICADOR)
        $("#PRY_Nombre").val(PROYECTOA_NOM);
        $("#PRY_Meta2022").val(PROYECTOA_META_2022);
        $("#PRY_Meta2023").val(PROYECTOA_META_2023);
        $("#PRY_Meta2024").val(PROYECTOA_META_2024);
        $("#PRY_Meta2025").val(PROYECTOA_META_2025);
        $("#PRY_Meta2026").val(PROYECTOA_META_2026);
        $("#PRY_Meta2027").val(PROYECTOA_META_2027);
        $("#PRY_Meta2028").val(PROYECTOA_META_2028);
        $("#PRY_Meta2029").val(PROYECTOA_META_2029);
        $("#PRY_Meta2030").val(PROYECTOA_META_2030);

        $("#kt_modal_Nuevo_Proyecto").modal('show');


    }

    function Actualizar_Proyecto(){
        var PROYECTOA_NOM = $("#PRY_Nombre").val();
        var PROYECTOA_RESPONSABLE = $("#PRY_Responsable option:selected").text();
        var PROYECTOA_RESPONSABLE_ID = $("#PRY_Responsable").val();
        // var PROYECTOA_INDICADOR = $("#PRY_indicador option:selected").text();
        var PROYECTOA_INDICADOR = $("#PRY_indicador").val();
        var PROYECTOA_META_2022 = $("#PRY_Meta2022").val();
        var PROYECTOA_META_2023 = $("#PRY_Meta2023").val();
        var PROYECTOA_META_2024 = $("#PRY_Meta2024").val();
        var PROYECTOA_META_2025 = $("#PRY_Meta2025").val();
        var PROYECTOA_META_2026 = $("#PRY_Meta2026").val();
        var PROYECTOA_META_2027 = $("#PRY_Meta2027").val();
        var PROYECTOA_META_2028 = $("#PRY_Meta2028").val();
        var PROYECTOA_META_2029 = $("#PRY_Meta2029").val();
        var PROYECTOA_META_2030 = $("#PRY_Meta2030").val();
    }

    function Proyecto_Eliminar(id) {
        var arrdata = JSON.parse(JSON.stringify(ARR_PROYECTOS));
        let Proyect_info = arrdata.filter(pr => (pr.PROYECTOA_ID) == id);
        console.log(Proyect_info);
    }

    function Limpiar_Proyectos() {
        $("#PRY_Nombre").val("");
        $("#PRY_Meta2022").val("");
        $("#PRY_Meta2023").val("");
        $("#PRY_Meta2024").val("");
        $("#PRY_Meta2025").val("");
        $("#PRY_Meta2026").val("");
        $("#PRY_Meta2027").val("");
        $("#PRY_Meta2028").val("");
        $("#PRY_Meta2029").val("");
        $("#PRY_Meta2030").val("");
        $("#PRY_Responsable").val(0).change();
        // $("#PRY_indicador").val(0).change();
        $("#PRY_indicador").val("");
    }

    //********* */ ACTIVIDADES **********/

    /**@abstract
     * MUESTRA LAS ACTIVIDADES DEL PROYECTO AL HACER CLIK SOBRE EL
     */
    function Proyecto_info(id) {
        PROYECTO_ID = id;


        $("#Seccion_Proyectos").hide(100);
        $("#Seccion_Proyectos_Detalle").show(100);
        $("#Seccion_Perspectivas").hide(100);


        var arrdata = JSON.parse(JSON.stringify(ARR_PROYECTOS));
        let Proyect_info = arrdata.filter(pr => (pr.PROYECTOA_ID) == id);

        var nombre = Proyect_info[0]["PROYECTOA_NOM"];
        var indicador = Proyect_info[0]["PROYECTOA_INDICADOR"];
        var Fecha_creacion = Proyect_info[0]["FCREADO"];
        var Responsable = Proyect_info[0]["PROYECTOA_RESPONSABLE"];
        var ID_PROYECTO = Proyect_info[0]["PROYECTOA_ID"];

        $("#Proyecto_nom").text(nombre);
        $("#PROYECTOA_INDICADOR").text(indicador);
        $("#FCREADO").text(Fecha_creacion);
        $("#PROYECTOA_RESPONSABLE").text(Responsable);
        $("#PROYECTOA_CRITERIO").text(CRITERIO_NOM);
        $("#PROYECTOA_AREA").text(POA_AREA);
        $("#PROYECTOA_DEPARTAMENTO").text(POA_DEPT);
        $("#PROYECTOA_POA").text(POA_NOM);

        var data = {
            id_proyecto: ID_PROYECTO
        };
        AjaxSendReceive(urlGet_Proyectos_detalles, data, function(response) {

            create_proyect_targets_cards(response);
            ARRAY_DATA_ACTIVIDADES = response;
            console.log("Actividades", ARRAY_DATA_ACTIVIDADES);
            $('html, body').animate({
                scrollTop: $("#Seccion_Proyectos_Detalle").offset().top
            }, 1000);

        });

    }

    function Proyecto_info_Drag(id) {
        PROYECTO_ID = id;
        $("#Seccion_Proyectos").hide(100);
        $("#Seccion_Proyectos_Detalle").show(100);
        $("#Seccion_Perspectivas").hide(100);


        var arrdata = JSON.parse(JSON.stringify(ARR_PROYECTOS));
        let Proyect_info = arrdata.filter(pr => (pr.PROYECTOA_ID) == id);

        var nombre = Proyect_info[0]["PROYECTOA_NOM"];
        var indicador = Proyect_info[0]["PROYECTOA_INDICADOR"];
        var Fecha_creacion = Proyect_info[0]["FCREADO"];
        var Responsable = Proyect_info[0]["PROYECTOA_RESPONSABLE"];
        var ID_PROYECTO = Proyect_info[0]["PROYECTOA_ID"];

        $("#Proyecto_nom").text(nombre);
        $("#PROYECTOA_INDICADOR").text(indicador);
        $("#FCREADO").text(Fecha_creacion);
        $("#PROYECTOA_RESPONSABLE").text(Responsable);
        $("#PROYECTOA_CRITERIO").text(CRITERIO_NOM);
        $("#PROYECTOA_AREA").text(POA_AREA);
        $("#PROYECTOA_DEPARTAMENTO").text(POA_DEPT);
        $("#PROYECTOA_POA").text(POA_NOM);

        var data = {
            id_proyecto: ID_PROYECTO
        };
        AjaxSendReceive2(urlGet_Proyectos_detalles, data, function(response) {
            create_proyect_targets_cards(response);
            ARRAY_DATA_ACTIVIDADES = response;
            console.log("Actividades", ARRAY_DATA_ACTIVIDADES);
        });

    }

    /**@abstract
     * CREA LAS CARTILLAS DE LAS ACTIVIDADES DEL PROYECTO
     */
    function create_proyect_targets_cards(data) {

        var arrdata = JSON.parse(JSON.stringify(data));
        $("#Pr_En_Revision").empty();
        $("#Pr_En_Progreso").empty();
        $("#Pr_Terminados").empty();
        var CON_REV = 0;
        var CON_PRO = 0;
        var CON_TER = 0;
        jQuery.each(arrdata, function(key, value) {

            var ACTIV_NOM = value.ACTIV_NOM;
            var ACTIV_FINICIO = value.ACTIV_FINICIO;
            var ACTIV_FFINAL = value.ACTIV_FFINAL;
            var AVANCE_PORCENTAJE = value.AVANCE_PORCENTAJE;
            var ULTIMO_AVANCE = value.ULTIMO_AVANCE;
            var ACTV_ESTADO = value.ACTV_ESTADO;
            var ACTIV_ID = value.ACTIV_ID;
            var ACTIV_ACTIVO = value.ACTIV_ACTIVO;
            if (AVANCE_PORCENTAJE == "") {
                AVANCE_PORCENTAJE = "0";
            }

            if (ACTIV_ACTIVO != "N") {


                var con = 1;
                var funcion = "Actividad_Edit(" + ACTIV_ID + ");";
                var funcionD = "Drag(" + ACTIV_ID + ");";
                var funcionELiminar = "Actividad_Eliminar(" + ACTIV_ID + ");";

                var Proyect_card = `
            
            <div class="col-12 border border-gray-600 bg-light" style="margin-bottom:15px">
                <a disabled href="#!" onmousedown="` + funcionD + `return false;" class="card border-hover-primary" style="cursor:grab;">
                    <div class="card-header border-0 pt-9">
                        <div class="card-title m-0">
                            <div class="symbol  bg-light">
                                <div class="badge badge-light">Actividad</div>
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <button onclick="` + funcion + `return false;" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                            </button>
                            <button onclick="` + funcionELiminar + `return false;" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-danger" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <span class="svg-icon svg-icon-2">
                                <i class="fa fa-trash"></i>
                                </span>
                            
                            </button>

                        </div>
                    </div>
                    <div class="card-body" style="margin-top:-20px">
                        <div class="d-flex flex-wrap justify-content-start">
                            <div class="fs-5 fw-bolder text-dark">` + ACTIV_NOM + `</div>

                            <div class="d-flex flex-wrap">
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="" class="fs-4 fw-bolder">Inicio</div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-700">` + ACTIV_FINICIO + `</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="" class="fs-6 fw-bolder">Fin</div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-700">` + ACTIV_FFINAL + `</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="" class="fs-6 fw-bolder">Ultima Actualizacion</div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-700">` + ULTIMO_AVANCE + `</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>`;

                if (ACTV_ESTADO == 1) {
                    $("#Pr_En_Revision").append(Proyect_card);
                    CON_REV = CON_REV + 1
                } else if (ACTV_ESTADO == 2) {
                    $("#Pr_En_Progreso").append(Proyect_card);
                    CON_PRO = CON_PRO + 1

                } else {
                    $("#Pr_Terminados").append(Proyect_card);
                    CON_TER = CON_TER + 1
                }
                con = con + 1;
            }


        });

        $("#ACT_COUNT_REV").text(CON_REV);
        $("#ACT_COUNT_PRO").text(CON_PRO);
        $("#ACT_COUNT_TER").text(CON_TER);

    }

    var ACTV_ID_DRAG;

    function Actualizar_Arrastrando() {


        var ACTV_ID = ACTV_ID_DRAG[0]["ACTIV_ID"];
        var AV_RESPONSABLE = ACTV_ID_DRAG[0]["max(AV.AVANCE_PORCENTAJE)"];
        var AV_SUPERVISOR = ACTV_ID_DRAG[0]["max(AV.AVANCE_SUPERVISION)"];

        var estado;
        var id = TARGET_ID;
        var progreso = ""
        if (id == "Pr_En_Revision") {
            estado = 1;
            Progreso_respo = 0;
            Progreso_superv = AV_SUPERVISOR;

        } else if (id == "Pr_En_Progreso") {
            estado = 2;
            Progreso_respo = 0;
            Progreso_superv = AV_SUPERVISOR;

        } else if (id == "Pr_Terminados") {
            estado = 3;
            Progreso_respo = 100
            Progreso_superv = AV_SUPERVISOR
        }
        var data = {
            ACTV_ID: ACTV_ID,
            ACTV_ESTADO: estado,
            Progreso_respo: Progreso_respo,
            Progreso_superv: Progreso_superv,
        }
        console.log(data);

        AjaxSendReceive2(urlActualizar_Actividad, data, function(response) {
            console.log(response);
            if (response == true) {
                Proyecto_info_Drag(PROYECTO_ID);
            }
        });
    }

    function Drag(id) {
        // ACTV_ID_DRAG = id;
        var arrdata = JSON.parse(JSON.stringify(ARRAY_DATA_ACTIVIDADES));
        let Proyect_info = arrdata.filter(pr => (pr.ACTIV_ID) == id);
        console.log("ARASTRANDO", Proyect_info);
        ACTV_ID_DRAG = Proyect_info;
    }


    function Nueva_Actividad(fecha) {

        var ACTIV_FFINAL = fecha;
        var ACTIV_FINICIO = moment().format("YYYY-MM-DD");
        var ANIO_ACTUAL = moment().format("YYYY");
        var MES_ACTUAL = moment().format("MM");
        var ACTIV_NOM = $("#ACT_Nombre").val();
        var ACT_Obs = $("#ACT_Obs").val();
        var ACTIV_RESPONSABLE = $("#ACT_Responsable option:selected").text();
        var Pr_ID = PROYECTO_ID;
        var arrdata = JSON.parse(JSON.stringify(ARRAY_DATA_PROYECT));
        let POA_INFO = arrdata.filter(id => id.ID_PROYECTO == Pr_ID);
        var ACTIV_ACTIVO = "S";
        var ACTIV_ELIMINADO = "N";
        var HCREADO = moment().format("hh:mm:ss");

        var DATA_TO_SEND = {
            ACTIV_NOM: ACTIV_NOM,
            ACTIV_RESPONSABLE: ACTIV_RESPONSABLE,
            ACTIV_FFINAL: ACTIV_FFINAL,
            ACTIV_FINICIO: ACTIV_FINICIO,
            CRITERIO_ID: POA_INFO[0]["CRITERIO_ID"],
            PROYECTOA_ID: POA_INFO[0]["ID_PROYECTO"],
            POA_ID: POA_INFO[0]["POA_ID"],
            PROYECTOA_ACTIVO: POA_INFO[0]["PROYECTOA_ACTIVO"],
            OBJEST_ID: POA_INFO[0]["OBJEST_ID"],
            PERSPECTIVA_ID: POA_INFO[0]["PERSPECTIVA_ID"],
            ACTIV_ACTIVO: ACTIV_ACTIVO,
            ACTIV_ELIMINADO: ACTIV_ELIMINADO,
            HCREADO: HCREADO,
            ANIO_ACTUAL: ANIO_ACTUAL,
            MES_ACTUAL: MES_ACTUAL,
            ACT_Obs: ACT_Obs
        }

        if (ACTIV_NOM == "") {

        } else if (ACTIV_RESPONSABLE == "") {

        } else if (ACTIV_FFINAL == "") {

        } else {

            console.log(DATA_TO_SEND);

            AjaxSendReceive(urlNueva_Actividad, DATA_TO_SEND, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_user").modal('hide');
                    Mensaje_Guardado_ok();
                    Proyecto_info(PROYECTO_ID);

                }
            });
        }
    }

    var ACTV_ACTUAL_EDIT;

    function Actividad_Edit(id) {
        var ACTV_ID = id;
        var arrdata = JSON.parse(JSON.stringify(ARRAY_DATA_ACTIVIDADES));
        let ACTIVIDAD_INFO = arrdata.filter(id => id.ACTIV_ID == ACTV_ID);
        var ACTV_ESTADO = ACTIVIDAD_INFO[0]["ACTV_ESTADO"];
        var AVANCE_RESPONSABLE = ACTIVIDAD_INFO[0]["max(AV.AVANCE_PORCENTAJE)"];
        var AVANCE_SUPERVISION = ACTIVIDAD_INFO[0]["max(AV.AVANCE_SUPERVISION)"];
        if (AVANCE_SUPERVISION == "") {
            AVANCE_SUPERVISION = 0;
        }
        $('#ACTV_ACT_ESTADO').val(ACTV_ESTADO);

        var slider = document.getElementById('slider');
        var slider_2 = document.getElementById('slider_2');
        var slider1Value = document.getElementById('slider1-span');
        var slider1Value_2 = document.getElementById('slider2-span');
        sliderActive = false;
        $('.sliderContainer').attr('class', 'sliderContainer');
        $('.noUi-base').remove();
        delete slider.noUiSlider;
        delete slider_2.noUiSlider;

        noUiSlider.create(slider, {
            start: AVANCE_RESPONSABLE,
            connect: true,
            step: 1,
            range: {
                'min': 0,
                'max': 100
            },
            format: {
                to: (v) => v | 0,
                from: (v) => v | 0
            }
        });

        slider.noUiSlider.on('update', function(values, handle) {
            $("#slider1-span").text(values[handle] + "%")
            // slider1Value.innerHTML = values[handle] + "%";
        });
        noUiSlider.create(slider_2, {
            start: AVANCE_SUPERVISION,
            connect: true,
            step: 1,
            range: {
                'min': 0,
                'max': 100
            },
            format: {
                to: (v) => v | 0,
                from: (v) => v | 0
            }
        });
        if (TIPOUS_ID != 1) {
            slider_2.setAttribute('disabled', true);
        }
        slider_2.noUiSlider.on('update', function(values, handle) {
            $("#slider2-span").text(values[handle] + "%")

            // slider1Value_2.innerHTML = values[handle] + "%";
        });
        // $("#ACTV_ACT_ESTADO option[value="+ACTV_ESTADO+"]").attr('selected', 'selected');
        $("#kt_modal_Actividad_Edit").modal('show');

        ACTV_ACTUAL_EDIT = ACTV_ID;



    }

    function Actualizar_Actividad() {
        var ACTV_ID = ACTV_ACTUAL_EDIT;
        var estado = $("#ACTV_ACT_ESTADO").val();
        var slider = document.getElementById('slider');
        var slider_2 = document.getElementById('slider_2');
        var Progreso_respo = slider.noUiSlider.get();
        var Progreso_superv = slider_2.noUiSlider.get();

        var data = {
            ACTV_ID: ACTV_ID,
            ACTV_ESTADO: estado,
            Progreso_respo: Progreso_respo,
            Progreso_superv: Progreso_superv,
        }
        console.log(data);

        AjaxSendReceive(urlActualizar_Actividad, data, function(response) {
            console.log(response);
            if (response == true) {
                $("#kt_modal_Actividad_Edit").modal('hide');
                Mensaje_Guardado_ok();
                Proyecto_info(PROYECTO_ID);
            }
        });
    }

    function Actividad_Eliminar(id) {
        console.log(id);

        Swal.fire({
            title: 'Estas Seguro?',
            text: "Si eliminas esta actividad no lo podras revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminarla!'
        }).then((result) => {
            if (result.isConfirmed) {

                var data = {
                    ACTV_ID: id,
                }
                AjaxSendReceive(urlEliminar_Actividad, data, function(response) {
                    console.log(response);
                    if (response == true) {
                        Swal.fire(
                            'Eliminada!',
                            'La Actividad se elimino',
                            'success'
                        )
                        Proyecto_info(PROYECTO_ID);

                    }
                })

            }
        })
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

    function AjaxSendReceive2(url, data, callback) {


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                data = JSON.parse(data);
                callback(data);
            }
        }
        data = JSON.stringify(data);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    }
</script>