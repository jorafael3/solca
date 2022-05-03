<?php



$urlGet_perspectiva = constant("URL") . "mantenimiento/Get_Perspectivas";
$urlNueva_perspectiva = constant("URL") . "mantenimiento/Nueva_perspectiva";
$urlActualizar_perspectiva = constant("URL") . "mantenimiento/Actualizar_perspectiva";
$urlGet_Criterios = constant("URL") . "mantenimiento/Get_Criterios";
$urlNuevo_Criterios = constant("URL") . "mantenimiento/Nuevo_Criterios";
$urlActualizar_Criterio = constant("URL") . "mantenimiento/Actualizar_Criterio";
$urlGet_Medios = constant("URL") . "mantenimiento/Get_Medios";
$urlNuevo_Medio = constant("URL") . "mantenimiento/Nuevo_Medio";
$urlActualizar_Medio = constant("URL") . "mantenimiento/Actualizar_Medio";


?>
<script>
    var urlGet_perspectiva = '<?php echo $urlGet_perspectiva ?>';
    var urlNueva_perspectiva = '<?php echo $urlNueva_perspectiva ?>';
    var urlActualizar_perspectiva = '<?php echo $urlActualizar_perspectiva ?>';
    var urlGet_Criterios = '<?php echo $urlGet_Criterios ?>';
    var urlNuevo_Criterios = '<?php echo $urlNuevo_Criterios ?>';
    var urlActualizar_Criterio = '<?php echo $urlActualizar_Criterio ?>';
    var urlGet_Medios = '<?php echo $urlGet_Medios ?>';
    var urlNuevo_Medio = '<?php echo $urlNuevo_Medio ?>';
    var urlActualizar_Medio = '<?php echo $urlActualizar_Medio ?>';


    var PERSPECTIVA_ID;
    var CRITERIO_ID;
    var MVERIFICACION_ID;
    //*** PERSPECTIVAS */

    function Get_Perspectivas() {

        AjaxSendReceive(urlGet_perspectiva, data = [], function(response) {
            console.log("PERSPECTIVAS", response);
            Tabla_Perspectivas(response);
        });

    }

    function Tabla_Perspectivas(data) {
        var tb = $('#MN_Tabla_Perspectivas');
        $('#MN_Tabla_Perspectivas').empty();
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $.fn.dataTable.tables({
                visible: true,
                api: true
            }).columns.adjust();
        })
        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        $("#kt_modal_add_Perspectiva").modal('show');
                        $("#PERS_Nombre").val("");
                        $("#btn_Nuevos_Perspectivas_b").show();
                        $("#btn_Actualizar_Perspectivas_b").hide();
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                    className: 'btn btn-success btn-fill',
                    messageTop: "Perspectivas",
                    title: "Perspectivas"
                },

            ],
            order: [
                [1, "desc"]
            ],
            "columnDefs": [{
                "width": "50%",
                "targets": 0
            }],
            columns: [{
                    data: "PERSPECTIVA_NOM",
                    title: "Nombre "
                }, {
                    data: "FCREADO",
                    title: "Fecha de Creacion "
                }, {
                    data: "PERSPECTIVA_ACTIVO",
                    title: "Estado "
                },
                {
                    data: null,
                    title: "Editar",
                    className: "dt-center  btn_edit",
                    defaultContent: '<button type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Perspectiva"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" ><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                if (data["PERSPECTIVA_ACTIVO"] == "S") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["PERSPECTIVA_ACTIVO"] == "N") {
                    $('td', row).eq(2).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        }).clear().rows.add(data).draw();
        // new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 100);

        $('#MN_Tabla_Perspectivas tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            $("#PERS_Nombre").val(data["PERSPECTIVA_NOM"]);
            PERSPECTIVA_ID = data["PERSPECTIVA_ID"]
            $("#btn_Actualizar_Perspectivas_b").show();
            $("#btn_Nuevos_Perspectivas_b").hide();

            // Validar_Actualizar_Datos_usuario(data);
        });
    }

    function Nueva_Perspectivas() {
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

    function Actualizar_Perspectiva() {
        var Nombre_perspe = $("#PERS_Nombre").val();
        if (Nombre_perspe != "") {

            var data = {
                PERSPECTIVA_NOM: Nombre_perspe,
                PERSPECTIVA_ID: PERSPECTIVA_ID
            }

            AjaxSendReceive(urlActualizar_perspectiva, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Perspectiva").modal('hide');
                    $("#PERS_Nombre").val("");
                    Get_Perspectivas();
                }

            })

        }
    }

    //** CRITERIOS */

    function Get_Criterios() {

        AjaxSendReceive(urlGet_Criterios, data = [], function(response) {
            console.log("CRITERIOS", response);
            Tabla_Criterios(response);
        });

    }

    function Tabla_Criterios(data) {
        var tb = $('#MN_Tabla_Criterios');
        $('#MN_Tabla_Criterios').empty();
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $.fn.dataTable.tables({
                visible: true,
                api: true
            }).columns.adjust();
        })
        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        $("#kt_modal_add_Criterio").modal('show');
                        $("#CRIT_Nombre").val("");
                        $("#CRIT_tipo").val(0).change();
                        $("#btn_Nuevos_Criterio_b").show();
                        $("#btn_Actualizar_Criterio_b").hide();
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                    className: 'btn btn-success btn-fill',
                    messageTop: "CRITERIOs",
                    title: "CRITERIOs"
                },

            ],
            order: [
                [2, "desc"]
            ],
            "columnDefs": [{
                "width": "35%",
                "targets": 0
            }],
            columns: [{
                    data: "CRITERIO_NOM",
                    title: "Nombre "
                }, {
                    data: "PERSPECTIVA_NOM",
                    title: "Perspectiva "
                }, {
                    data: "FCREADO",
                    title: "Fecha de Creacion "
                }, {
                    data: "CRITERIO_ACTIVO",
                    title: "Estado "
                },
                {
                    data: null,
                    title: "Editar",
                    className: "dt-center  btn_edit",
                    defaultContent: '<button type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Criterio"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" ><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {

                if (data["CRITERIO_ACTIVO"] == "S") {
                    $('td', row).eq(3).html("<span style='font-size:16px;' class='badge badge-light-success fw-bolder'>ACTIVO</span>");
                }
                if (data["CRITERIO_ACTIVO"] == "N") {
                    $('td', row).eq(3).html("<span style='font-size:16px;' class='badge badge-light-danger'>INACTIVO</span>");
                }
            }


        }).clear().rows.add(data).draw();
        // new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).css('width', '100%');
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        }, 1000);

        $('#MN_Tabla_Criterios tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            $("#CRIT_Nombre").val(data["CRITERIO_NOM"]);
            $("#CRIT_tipo").val(data["PERSPECTIVA_ID"]).change();
            PERSPECTIVA_ID = data["PERSPECTIVA_ID"]
            CRITERIO_ID = data["CRITERIO_ID"]
            $("#btn_Actualizar_Criterio_b").show();
            $("#btn_Nuevos_Criterio_b").hide();

            // Validar_Actualizar_Datos_usuario(data);
        });
    }

    function Nuevo_Criterio() {
        var CRIT_Nombre = $("#CRIT_Nombre").val();
        var CRIT_tipo = $("#CRIT_tipo").val();
        if (CRIT_Nombre == "") {

        } else if (CRIT_tipo == "") {

        } else {

            var data = {
                CRITERIO_NOM: CRIT_Nombre,
                PERSPECTIVA_ID: CRIT_tipo
            }

            AjaxSendReceive(urlNuevo_Criterios, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Criterio").modal('hide');
                    $("#CRIT_Nombre").val("");
                    $("#CRIT_tipo").val(0).change();
                    Get_Criterios();
                }

            })

        }
    }

    function Actualizar_Criterio() {
        var CRIT_Nombre = $("#CRIT_Nombre").val();
        var CRIT_tipo = $("#CRIT_tipo").val();
        if (CRIT_Nombre == "") {

        } else if (CRIT_tipo == "") {

        } else {

            var data = {
                CRITERIO_NOM: CRIT_Nombre,
                PERSPECTIVA_ID: CRIT_tipo,
                CRITERIO_ID: CRITERIO_ID
            }

            AjaxSendReceive(urlActualizar_Criterio, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Criterio").modal('hide');
                    $("#CRIT_Nombre").val("");
                    Get_Criterios();
                }
            })

        }
    }

    /*** MEDIOS VERIFICAION */

    function Get_Medios() {

        AjaxSendReceive(urlGet_Medios, data = [], function(response) {
            console.log("MEDIOS VERIFICAION", response);
            Tabla_Medios(response);
        });

    }

    function Tabla_Medios(data) {
        var tb = $('#MN_Tabla_Medios');
        $('#MN_Tabla_Medios').empty();

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $.fn.dataTable.tables({
                visible: true,
                api: true
            }).columns.adjust();
        })

        var table = tb.DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 300,
            scrollX: true,
            //scrollCollapse: true,
            buttons: [{
                    text: "<i class='fa fa-plus'></i>Crear Nuevo",
                    className: 'btn btn-primary btn-fill',
                    action: function(e, dt, node, config) {
                        $("#kt_modal_add_Medio").modal('show');
                        $("#MED_Nombre").val("");
                        $("#btn_Nuevos_Medio_b").show();
                        $("#btn_Actualizar_Medio_b").hide();
                    }
                },
                {
                    extend: "excelHtml5",
                    text: "<i class='fa fa-file-excel'></i>Imprimir Excel",
                    className: 'btn btn-success btn-fill',
                    messageTop: "Medios Verificacion",
                    title: "Medios Verificacion"
                },

            ],
            // order: [
            //     [2, "desc"]
            // ],
            "columnDefs": [{
                "width": "70%",
                "targets": 0
            }],
            columns: [{
                    data: "DESCRIPCION",
                    title: "Nombre "
                },
                {
                    data: null,
                    title: "Editar",
                    className: "dt-center  btn_edit",
                    defaultContent: '<button type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Medio"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" ><i class="fa fa-edit"></i></button>',
                    orderable: false
                }
            ],
            "createdRow": function(row, data, index, cell) {


            }
        });

        // new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);

        $('#MN_Tabla_Medios tbody').on('click', 'td.btn_edit', function(e) {
            e.preventDefault();
            var data = table.row(this).data();
            $("#MED_Nombre").val(data["DESCRIPCION"]);
            MVERIFICACION_ID = data["MVERIFICACION_ID"]
            $("#btn_Actualizar_Medio_b").show();
            $("#btn_Nuevos_Medio_b").hide();

            // Validar_Actualizar_Datos_usuario(data);
        });
    }

    function Nuevo_Medio() {
        var MED_Nombre = $("#MED_Nombre").val();
        if (MED_Nombre == "") {

        } else {

            var data = {
                DESCRIPCION: MED_Nombre,
                // MVERIFICACION_ID: MVERIFICACION_ID
            }

            AjaxSendReceive(urlNuevo_Medio, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Medio").modal('hide');
                    $("#MED_Nombre").val("");
                    Get_Medios();
                }

            })

        }
    }

    function Actualizar_Medio() {
        var MED_Nombre = $("#MED_Nombre").val();
        if (MED_Nombre == "") {

        } else {

            var data = {
                DESCRIPCION: MED_Nombre,
                MVERIFICACION_ID: MVERIFICACION_ID
            }

            AjaxSendReceive(urlActualizar_Medio, data, function(response) {
                console.log(response);
                if (response == true) {
                    $("#kt_modal_add_Medio").modal('hide');
                    $("#MED_Nombre").val("");
                    Get_Medios();
                }

            })

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