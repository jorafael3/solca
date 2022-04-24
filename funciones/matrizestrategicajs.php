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

    var PERSPECTIVA_ID;
    var CRITERIO_ID;
    var OBJEST_ID;

    function Get_Perspectivas() {

        AjaxSendReceive(urlGet_perspectiva, data = [], function(response) {
            console.log(response);
        });

    }

    function Get_Criterios(id, nombre) {



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
            $("#Seccion_Proyectos").show();

        });
    }

    function Get_Indicadores(data) {
        var object_id = data["OBJEST_ID"];
        var data = {
            OBJEST_ID: object_id,
        }
        OBJEST_ID = object_id;
        AjaxSendReceive(urlGet_Indicadores, data, function(response) {
            console.log("Indicadores", response);
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