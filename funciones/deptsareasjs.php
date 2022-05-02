<?php

$urlGetDepartamentos = constant("URL") . "mantenimiento/Cargar_Departamentos";
$urlGetAreas = constant("URL") . "mantenimiento/Cargar_Areas";
$urlGetServicios = constant("URL") . "mantenimiento/Cargar_Servicio";
$urlGetCiudades = constant("URL") . "mantenimiento/Cargar_Ciudades";
$urlGetPaises = constant("URL") . "mantenimiento/Cargar_Paises";

$urlNuevoDepartamentos = constant("URL") . "mantenimiento/Nuevo_Departamento";
$urlActualizarDepartamentos = constant("URL") . "mantenimiento/Actualizar_Departamento";



?>

<script>
    var urlGetDepartamentos = '<?php echo $urlGetDepartamentos ?>';
    var urlGetAreas = '<?php echo $urlGetAreas ?>';
    var urlGetServicios = '<?php echo $urlGetServicios ?>';
    var urlGetCiudades = '<?php echo $urlGetCiudades ?>';
    var urlGetPaises = '<?php echo $urlGetPaises ?>';
    var urlNuevoDepartamentos = '<?php echo $urlNuevoDepartamentos ?>';
    var urlActualizarDepartamentos = '<?php echo $urlActualizarDepartamentos ?>';


    var DEPTO_ID;
    //*DEPARTAMENTOS **/
    function get_departamentos() {

        AjaxSendReceive(urlGetDepartamentos, data = [], function(response) {
            console.log("DEPARTAMENTOS", response);
            Crear_Tabla_Departamentos(response);
        })
    }

    function Crear_Tabla_Departamentos(data) {
        $('#MN_Tabla_Departamentos').empty();
        $('#MN_Tabla_Departamentos tbody').empty();

        var table = $('#MN_Tabla_Departamentos').DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 400,
            scrollX: true,
            scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        $("#kt_modal_add_Departamento").modal('show');
                        $("#DEPT_Nombre").val("");
                        $("#btn_Nuevos_Departamento_b").show();
                        $("#btn_Actualizar_Departamento_b").hide();

                    }
                },
                {
                    extend: "excelHtml5",
                    text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                    className: 'btn btn-success btn-fill',
                    messageTop: "Departamentos",
                    title: "Departamentos"
                }
            ],
            "order": [
                [1, "desc"]
            ],
            "columnDefs": [{
                "width": "50%",
                "targets": 0
            }],
            columns: [{
                    data: "DEPTO_NOM",
                    title: "Departamento"
                }, {
                    data: "FCREADO",
                    title: "Fecha de Creacion "
                }, {
                    data: "DEPTO_ACTIVO",
                    title: "Estado "
                },
                {
                    data: null,
                    title: "Editar",
                    className: "dt-center  btn_edit",
                    defaultContent: '<button type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Departamento"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" ><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                if (data["DEPTO_ACTIVO"] == "S") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["DEPTO_ACTIVO"] == "N") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#MN_Tabla_Departamentos tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            console.log(data["DEPTO_NOM"]);
            $("#DEPT_Nombre").val(data["DEPTO_NOM"]);
            DEPTO_ID = data["DEPTO_ID"]
            $("#btn_Actualizar_Departamento_b").show();
            $("#btn_Nuevos_Departamento_b").hide();

            // Validar_Actualizar_Datos_usuario(data);
        });
    }

    function Nuevos_Departamento() {
        var Nombre = $("#DEPT_Nombre").val();
        if (Nombre == "") {

        } else {
            var data = {
                Nombre: Nombre
            }

            AjaxSendReceive(urlNuevoDepartamentos, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Departamento").modal('hide');
                    get_departamentos();
                }
            })
        }

    }

    function Actualizar_Departamento() {
        var DEPTO_NOM = $("#DEPT_Nombre").val();

        var data = {
            DEPTO_NOM: DEPTO_NOM,
            DEPTO_ID: DEPTO_ID
        }

        AjaxSendReceive(urlActualizarDepartamentos, data, function(response) {
            console.log(response);
            if (response == true) {
                $("#kt_modal_add_Departamento").modal('hide');
                get_departamentos();
            }
        })
    }


    //** AREAS **/

    function get_Areas() {

        AjaxSendReceive(urlGetAreas, data = [], function(response) {
            console.log("AREAS", response);
            Crear_Tabla_Areas(response);
        })
    }

    function Crear_Tabla_Areas(data) {
        var tb = $('#MN_Tabla_Areas');
        $('#MN_Tabla_Areas tbody').empty();

        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 400,
            scrollX: true,
            scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        alert('Button activated');
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                    className: 'btn btn-success btn-fill',
                    messageTop: "Areas",
                    title: "Areas"
                },

            ],
            "columnDefs": [{
                "width": "50%",
                "targets": 0
            }],
            columns: [{
                data: "AREA_NOM",
                title: "Nombre "
            }, {
                data: "FCREADO",
                title: "Fecha de Creacion "
            }, {
                data: "AREA_ACTIVO",
                title: "Estado "
            }],
            "createdRow": function(row, data, index, cell) {

                if (data["AREA_ACTIVO"] == "S") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["AREA_ACTIVO"] == "N") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        }).clear().rows.add(data).draw();
        // new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);
    }

    //** SERVICIOS */

    function get_Servicios() {

        AjaxSendReceive(urlGetServicios, data = [], function(response) {
            console.log("SERVICIOS", response);
            Crear_Tabla_Servicios(response);
        })
    }

    function Crear_Tabla_Servicios(data) {
        var tb = $('#MN_Tabla_Servicios');
        $('#MN_Tabla_Servicios tbody').empty();

        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 400,
            scrollX: true,
            scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        alert('Button activated');
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                    className: 'btn btn-success btn-fill',
                    messageTop: "Servicios",
                    title: "Servicios"
                },

            ],
            "columnDefs": [{
                "width": "50%",
                "targets": 0
            }],
            columns: [{
                data: "SERV_NOM",
                title: "Nombre "
            }, {
                data: "FCREADO",
                title: "Fecha de Creacion "
            }, {
                data: "SERV_ACTIVO",
                title: "Estado "
            }],
            "createdRow": function(row, data, index, cell) {

                if (data["SERV_ACTIVO"] == "S") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["SERV_ACTIVO"] == "N") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        }).clear().rows.add(data).draw();
        // new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 500);
    }
    //** CIUDADES */

    function get_Ciudades() {

        AjaxSendReceive(urlGetCiudades, data = [], function(response) {
            console.log("Ciudades", response);
            Crear_Tabla_Ciudades(response);
        })
    }

    function Crear_Tabla_Ciudades(data) {
        var tb = $('#MN_Tabla_Ciudades');
        $('#MN_Tabla_Ciudades tbody').empty();

        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 400,
            scrollX: true,
            scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        alert('Button activated');
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                    className: 'btn btn-success btn-fill',
                    messageTop: "Ciudades",
                    title: "Ciudades"
                },

            ],
            "columnDefs": [{
                "width": "50%",
                "targets": 0
            }],
            columns: [{
                data: "CIUDAD_NOM",
                title: "Nombre "
            }, {
                data: "FCREADO",
                title: "Fecha de Creacion "
            }, {
                data: "CIUDAD_ACTIVO",
                title: "Estado "
            }],
            "createdRow": function(row, data, index, cell) {

                if (data["CIUDAD_ACTIVO"] == "S") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["CIUDAD_ACTIVO"] == "N") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        }).clear().rows.add(data).draw();
        // new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 500);
    }
    //** PAISES */

    function get_Paises() {

        AjaxSendReceive(urlGetPaises, data = [], function(response) {
            console.log("PAises", response);
            Crear_Tabla_Paises(response);
        })
    }

    function Crear_Tabla_Paises(data) {
        var tb = $('#MN_Tabla_Paises ');
        $('#MN_Tabla_Paises tbody').empty();

        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 400,
            scrollX: true,
            scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        alert('Button activated');
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                    className: 'btn btn-success btn-fill',
                    messageTop: "Paises",
                    title: "Paises"
                },

            ],
            "columnDefs": [{
                "width": "50%",
                "targets": 0
            }],
            // order: [
            //     // [groupColumn, 'asc'],
            //     [[ 0, "desc" ]]
            // ],
            columns: [{
                data: "PAIS_NOM",
                title: "Nombre "
            }, {
                data: "FCREADO",
                title: "Fecha de Creacion "
            }, {
                data: "PAIS_ACTIVO",
                title: "Estado "
            }],
            "createdRow": function(row, data, index, cell) {

                if (data["PAIS_ACTIVO"] == "S") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["PAIS_ACTIVO"] == "N") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        }).clear().rows.add(data).draw();
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