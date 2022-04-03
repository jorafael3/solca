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
        });
    }

    function Get_Proyectos(data) {
        console.log(data);
        var data = {
            id_poa: data["POA_ID"]
        }
        AjaxSendReceive(urlGet_Proyectos, data, function(response) {
            console.log(response);
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