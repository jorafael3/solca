<?php

$urlGet_perspectiva = constant("URL") . "dashsuperadmin/Get_Perspectivas";
$urlGet_Criterios = constant("URL") . "dashsuperadmin/Get_Criterios";
$urlGet_Poa = constant("URL") . "dashsuperadmin/Get_Poa";
$urlGet_Proyectos = constant("URL") . "dashsuperadmin/Get_Proyectos";

?>

<script>
    var urlGet_perspectiva = '<?php echo $urlGet_perspectiva ?>';
    var urlGet_Criterios = '<?php echo $urlGet_Criterios ?>';
    var urlGet_Poa = '<?php echo $urlGet_Poa ?>';
    var urlGet_Proyectos = '<?php echo $urlGet_Proyectos ?>';

    var PERSPECTIVA_ID;
    var ARR_PROYECTOS;

    function Mensaje_Info(mensaje1, mensaje2, icono) {
        Swal.fire(
            mensaje1,
            mensaje2,
            icono
        )
    }

    function Get_Perspectivas() {

        AjaxSendReceive(urlGet_perspectiva, data = [], function(response) {
            console.log(response);
        });

    }

    function Get_Criterios(id) {

        var data = {
            id_perspectiva: id
        }
        PERSPECTIVA_ID = id;
        AjaxSendReceive(urlGet_Criterios, data, function(response) {
            console.log(response);
            Tabla_criterios(response);
        });

    }

    function Tabla_criterios(data) {
        $('#TablaListaCriterios').empty();
        var table = $('#TablaListaCriterios').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 450,
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

    function Get_Poa(data) {
        var criterio_id = data["CRITERIO_ID"];
        console.log(criterio_id);
        var data = {
            criterio_id: criterio_id,
            perspectiva_id: PERSPECTIVA_ID
        }
        console.log(data);
        AjaxSendReceive(urlGet_Poa, data, function(response) {
            if (response.length != 0) {
                console.log(response);
                Tabla_Poa(response);
            } else {
                Mensaje_Info("Oops", "Este criterio no contiene datos", "info");
                Tabla_Poa(response);

            }
        });
    }

    function Tabla_Poa(data) {
        $('#TablaListaPoa').empty();
        var table = $('#TablaListaPoa').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            scrollY: 450,
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

    /**@abstract
     * OBTEMENOS LOS DIFRENETS PROYECTOS DEPENDIENDO DEL POA SELECCIONADO
     */
    function Get_Proyectos(data) {
        console.log(data);
        var data = {
            id_poa: data["POA_ID"]
        }
        AjaxSendReceive(urlGet_Proyectos, data, function(response) {
            console.log(response);
            ARR_PROYECTOS = [];
            ARR_PROYECTOS = response;
            Crear_proyectos(response);
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

        jQuery.each(arrdata, function(key, value) {

            var estado;
            var nombre = value.PROYECTOA_NOM;
            var indicador = value.PROYECTOA_INDICADOR;
            var Fecha_creacion = value.FCREADO;
            var Responsable = value.PROYECTOA_RESPONSABLE;
            var ID_PROYECTO = value.PROYECTOA_ID;
            var Proyect_card = `<div class="col-md-6 col-xl-4" >
										<a href="#" onclick="Proyecto_info(` + ID_PROYECTO + `);return false;" class="card border-hover-primary">
											<div class="card-header border-0 pt-9">
												<div class="card-title m-0">
													<div class="symbol  bg-light">
														<i class="fa fa-th symbol-50px w-50px"> </i>
													</div>
												</div>
												<div class="card-toolbar">
													<span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">` + estado + `</span>
												</div>
											</div>
											<div class="card-body p-9">
												<div class="fs-5 fw-bolder text-dark">` + nombre + `</div>
												<p class="text-gray-400 fw-bold fs-7 mt-1 mb-7">` + indicador + `</p>
												<div class="d-flex flex-wrap mb-5">
													<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
														<div class="fs-6 text-gray-800 fw-bolder">` + Fecha_creacion + `</div>
														<div class="fw-bold text-gray-400">Creado</div>
													</div>
													
												</div>
												<div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 50% completed">
													<div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<div class="symbol-group symbol-hover">
                                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
														<div class="fs-6 text-gray-800 fw-bolder">` + Responsable + `</div>
														<div class="fw-bold text-gray-400">Responsable</div>
													</div>
												</div>
											</div>
										</butt>
									</div>`;
            $("#Lista_proyectos").append(Proyect_card);

        });
    }

    /**@abstract
     * MUESTRA EL DETALLE DEL PROYECTO AL HACER CLIK SOBRE EL
     */
    function Proyecto_info(id) {
        $("#Seccion_Proyectos").hide(100);
        $("#Seccion_Proyectos_Detalle").show(100);

        var arrdata = JSON.parse(JSON.stringify(ARR_PROYECTOS));
        let Proyect_info = arrdata.filter(pr => (pr.PROYECTOA_ID) == id);

        var nombre = Proyect_info[0]["PROYECTOA_NOM"];
        var indicador = Proyect_info[0]["PROYECTOA_INDICADOR"];
        var Fecha_creacion = Proyect_info[0]["FCREADO"];
        var Responsable = Proyect_info[0]["PROYECTOA_RESPONSABLE"];
        var ID_PROYECTO = Proyect_info[0]["PROYECTOA_ID"];
        console.log(nombre);

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
                //console.log(data);
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