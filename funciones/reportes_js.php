<?php

$urlGet_perspectiva = constant("URL") . "matrizestrategica/Get_Perspectivas";
$urlGet_Criterios = constant("URL") . "matrizestrategica/Get_Criterios";
$urlObjetivos_Estrategicos = constant("URL") . "matrizestrategica/Get_Objetivos_Estrategicos";
$url_CARGAR_REPORTE = constant("URL") . "reportes/Cargar_Reportes";
$url_Cargar_Reportes_Objetivo = constant("URL") . "reportes/Cargar_Reportes_Objetivo";
$url_Cargar_Reportes_Areas = constant("URL") . "reportes/Cargar_Reportes_Areas";
$url_Cargar_Reportes_Uninversal = constant("URL") . "reportes/Cargar_Reportes_Universal";


?>


<script>
    $('#REP_PERS').select2({
        placeholder: "Seleccione"
    });


    var urlGet_perspectiva = '<?php echo $urlGet_perspectiva ?>';
    var urlGet_Criterios = '<?php echo $urlGet_Criterios ?>';
    var urlObjetivos_Estrategicos = '<?php echo $urlObjetivos_Estrategicos ?>';
    var url_CARGAR_REPORTE = '<?php echo $url_CARGAR_REPORTE ?>';
    var url_Cargar_Reportes_Objetivo = '<?php echo $url_Cargar_Reportes_Objetivo ?>';
    var url_Cargar_Reportes_Areas = '<?php echo $url_Cargar_Reportes_Areas ?>';
    var url_Cargar_Reportes_Uninversal = '<?php echo $url_Cargar_Reportes_Uninversal ?>';

    var PERSPECTIVA_ID;
    var OBJET_ID;

    function Get_Perspectivas() {
        AjaxSendReceive(urlGet_perspectiva, data = [], function(response) {
            console.log(response);
            let selectSub = document.getElementById("REP_PERS");
            $('#REP_PERS option').remove(); // clear all values 
            $('#REP_OBJ_EST option').remove();
            $('#REP_PERS ').append('<option value="s">Seleccione</option>');
            jQuery.each(response, function(key, value) {
                //alert(value.Marca);
                option = document.createElement("option");
                option.value = value.PERSPECTIVA_ID;
                option.text = value.PERSPECTIVA_NOM;
                selectSub.appendChild(option);
            });
        });
    }

    function Get_Criterios(id) {

        var data = {
            id_perspectiva: id
        }
        if (id != "s") {
            PERSPECTIVA_ID = id;
            AjaxSendReceive(urlGet_Criterios, data, function(response) {
                console.log("CRITERIOS", response);
                let selectSub = document.getElementById("REP_CRIT");
                $('#REP_CRIT option').remove(); // clear all values 
                $('#REP_CRIT ').append('<option value="s">Seleccione</option>');
                jQuery.each(response, function(key, value) {
                    //alert(value.Marca);
                    option = document.createElement("option");
                    option.value = value.CRITERIO_ID;
                    option.text = value.CRITERIO_NOM;
                    selectSub.appendChild(option);
                });
            });
        } else {
            $('#REP_OBJ_EST option').remove();
            $('#REP_CRIT option').remove(); // clear all values 

        }

    }

    function Get_Objetivos_Estrategicos(id) {
        var data = {
            criterio_id: parseInt(id),
            perspectiva_id: parseInt(PERSPECTIVA_ID)
        }
        if (id != "s") {
            AjaxSendReceive(urlObjetivos_Estrategicos, data, function(response) {
                console.log("Objetivos_Estrategicos", response);
                let selectSub = document.getElementById("REP_OBJ_EST");
                $('#REP_OBJ_EST option').remove(); // clear all values 
                $('#REP_OBJ_EST ').append('<option value="s">Seleccione</option>');
                jQuery.each(response, function(key, value) {
                    //alert(value.Marca);
                    option = document.createElement("option");
                    option.value = value.OBJEST_ID;
                    option.text = value.OBJEST_NOM;
                    selectSub.appendChild(option);
                });
            });
        }
    }

    function CARGAR_REPORTE() {
        var parametros = {
            id: $("#REP_OBJ_EST").val()
        }
        console.log('parametros: ', parametros);
        AjaxSendReceive(url_CARGAR_REPORTE, parametros, function(x) {
            console.log('x: ', x);
            TABLA_REPORTES(x);
            $("#SECCCION_POR_PROYECTO").show(100);

        });
    }

    function TABLA_REPORTES(data) {
        // $('#REP_REPORTES').empty();
        var table = $('#REP_REPORTES').DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            buttons: [
                'excel'
            ],
            // "drawCallback": function() {
            //     $(this.api().table().header()).hide();
            // },
            columns: [{
                data: "proyectos",
                title: "Proyectos"
            }, {
                data: "AREA_NOM",
                title: "Area"
            }, {
                data: "actividades",
                title: "# Act Totales"
            }, {
                data: "FINALIZADO",
                title: "# Act. finalizadas"
            }, {
                data: "PorcentajeFinalizado",
                title: "% Avance Proyectos",
                // render: $.fn.dataTable.render.number(',', '.', 2, "%")

            }],
            "createdRow": function(row, data, index, cell) {
                let color = "danger"
                if (data["PorcentajeFinalizado"] >= 100) {
                    color = "success"
                }
                if (data["PorcentajeFinalizado"] > 25 && data["PorcentajeFinalizado"] < 100) {
                    color = "warning"
                }

                let pr = `
                    <div class="d-flex align-items-center w-100 mw-125px">
						<div class="progress h-6px w-100 me-2 bg-light-warning">
							<div class="progress-bar bg-` + color + `" role="progressbar" style="width: ` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<span class="text-gray-400 fw-semibold">` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `%</span>
					</div>
                `
                $('td', row).eq(4).html(pr);
                $('td', row).eq(1).addClass("bg-light-warning");

            }
        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);
    }

    //*********************************************************** */
    //* POR OBJETIVO

    function CARGAR_REPORTE_POR_OBJETIVO() {
        var parametros = {
            id: $("#REP_CRIT").val()
        }
        console.log('parametros: ', parametros);
        AjaxSendReceive(url_Cargar_Reportes_Objetivo, parametros, function(x) {
            console.log('x: ', x);
            TABLA_REPORTES_OBJETIVO(x);
            $("#SECCCION_POR_OBJETIVO").show(100);
        });
    }

    function TABLA_REPORTES_OBJETIVO(data) {
        // $('#REP_REPORTES').empty();
        var table = $('#REP_REPORTES').DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            buttons: [
                'excel'
            ],
            // "drawCallback": function() {
            //     $(this.api().table().header()).hide();
            // },
            columns: [{
                data: "OBJEST_NOM",
                title: "Objetivo Estrategico"
            }, {
                data: "proyectos",
                title: "# Proyectos"
            }, {
                data: "areas",
                title: "Areas"
            }, {
                data: "actividades",
                title: "# Act. Totales"
            }, {
                data: "FINALIZADO",
                title: "# Act. Finalizadas"
            }, {
                data: "PorcentajeFinalizado",
                title: "% Avance Proyectos",
                // render: $.fn.dataTable.render.number(',', '.', 2, "%")

            }],
            "createdRow": function(row, data, index, cell) {
                let color = "danger"
                if (data["PorcentajeFinalizado"] >= 100) {
                    color = "success"
                }
                if (data["PorcentajeFinalizado"] > 25 && data["PorcentajeFinalizado"] < 100) {
                    color = "warning"
                }

                let areas = data["areas"].split(",");
                console.log('areas: ', areas);
                let ali = "";
                areas.map(function(x) {
                    ali = ali + '<li>' + x + '</li>'
                })
                $('td', row).eq(1).addClass("text-center fs-1");
                $('td', row).eq(3).addClass("text-center fs-1");
                $('td', row).eq(4).addClass("text-center fs-1");
                $('td', row).eq(2).html(`
                        <ul>
                            ` + ali + `
                        </ul>
                `);

                let pr = `
                    <div class="d-flex align-items-center w-100 mw-125px">
						<div class="progress h-6px w-100 me-2 bg-light-warning">
							<div class="progress-bar bg-` + color + `" role="progressbar" style="width: ` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<span class="text-gray-600 fw-semibold">` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `%</span>
					</div>
                `
                $('td', row).eq(5).html(pr);
                $('td', row).eq(1).addClass("bg-ligth-warning");

            }
        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 500);
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

    //************************************************************* */
    //* POR AREAS

    function CARGAR_REPORTE_POR_AREA() {
        // var parametros = {
        //     id: $("#REP_CRIT").val()
        // }
        // console.log('parametros: ', parametros);
        AjaxSendReceive(url_Cargar_Reportes_Areas, [], function(x) {
            console.log('x: ', x);
            TABLA_REPORTES_AREAS(x);
            $("#SECCCION_POR_AREAS").show(100);
        });
    }

    function TABLA_REPORTES_AREAS(data) {
        // $('#REP_REPORTES').empty();
        var table = $('#REP_REPORTES_AREAS').DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 350,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            buttons: [
                'excel'
            ],
            // "drawCallback": function() {
            //     $(this.api().table().header()).hide();
            // },
            columns: [{
                data: "area",
                title: "Area"
            }, {
                data: "objetivos",
                title: "# Objetivos"
            }, {
                data: "proyectos",
                title: "# Proyectos"
            }, {
                data: "actividades",
                title: "# Actividades"
            }, {
                data: "PorcentajeFinalizado",
                title: "% Avance Proyectos",
                // render: $.fn.dataTable.render.number(',', '.', 2, "%")
            }],
            "createdRow": function(row, data, index, cell) {
                let color = "danger"
                if (data["PorcentajeFinalizado"] >= 100) {
                    color = "success"
                }
                if (data["PorcentajeFinalizado"] < 50) {
                    color = "danger"
                }
                if (data["PorcentajeFinalizado"] >= 50 && data["PorcentajeFinalizado"] < 100) {
                    color = "info"
                }


                $('td', row).eq(1).addClass(" fs-1");
                $('td', row).eq(2).addClass(" fs-1");
                $('td', row).eq(3).addClass(" fs-1");
                $('td', row).eq(4).addClass(" fs-2");

                let pr = `
                    <div class="d-flex align-items-center w-100 mw-125px">
						<div class="progress h-6px w-100 me-2 bg-light-warning">
							<div class="progress-bar bg-` + color + `" role="progressbar" style="width: ` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<span class="text-gray-600 fw-semibold">` + parseFloat(data["PorcentajeFinalizado"]).toFixed(2) + `%</span>
					</div>
                `
                $('td', row).eq(4).html(pr);
                $('td', row).eq(1).addClass("bg-ligth-warning");

            }
        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 500);
    }

    //************************************************************* */
    //* POR UNIVERSAL

    function CARGAR_REPORTE_UNIVERSAL() {
        // var parametros = {
        //     id: $("#REP_CRIT").val()
        // }
        // console.log('parametros: ', parametros);
        AjaxSendReceive(url_Cargar_Reportes_Uninversal, [], function(x) {
            console.log('x: ', x);
            TABLA_REPORTES_UNIVERSAL(x) 
        });
    }

    function TABLA_REPORTES_UNIVERSAL(data) {
        // $('#REP_REPORTES').empty();
        var table = $('#REP_REPORTES_UNIVERSAL').DataTable({
            destroy: true,
            data: data,
            dom: 'Bfrtip',
            scrollY: 450,
            scrollX: true,
            scrollCollapse: true,
            // paging: false,
            "bInfo": false,
            "columnDefs": [{
                "width": "15%",
                "targets": 0
            }],
            buttons: [
                'excel'
            ],
            // "drawCallback": function() {
            //     $(this.api().table().header()).hide();
            // },
            columns: [{
                data: "CRITERIO_NOM",
                title: "Criteria"
            }, {
                data: "PERSPECTIVA_NOM",
                title: "Perspectiva"
            }, {
                data: "OBJEST_NOM",
                title: "Objetivo"
            }, {
                data: "AREA_NOM",
                title: "Area"
            }, {
                data: "PROYECTOA_NOM",
                title: "Proyecto",
                // render: $.fn.dataTable.render.number(',', '.', 2, "%")
            }, {
                data: "AVANCE_PROYECTO",
                title: "% Avance Proyecto",
                // render: $.fn.dataTable.render.number(',', '.', 2, "%")
            }, {
                data: "ACTIV_NOM",
                title: "Actividad",
                // render: $.fn.dataTable.render.number(',', '.', 2, "%")
            },
            {
                data: "AVANCE_ACTIVIDAD",
                title: "% Avance Actividad",
                // render: $.fn.dataTable.render.number(',', '.', 2, "%")
            }
        ],
            "createdRow": function(row, data, index, cell) {
                let color = "danger"
                if (data["AVANCE_PROYECTO"] >= 100) {
                    color = "success"
                }
                if (data["AVANCE_PROYECTO"] < 50) {
                    color = "danger"
                }
                if (data["AVANCE_PROYECTO"] >= 50 && data["AVANCE_PROYECTO"] < 100) {
                    color = "info"
                }
                let color2 = "danger"
                if (data["AVANCE_ACTIVIDAD"] >= 100) {
                    color2 = "success"
                }
                if (data["AVANCE_ACTIVIDAD"] < 50) {
                    color2 = "danger"
                }
                if (data["AVANCE_ACTIVIDAD"] >= 50 && data["AVANCE_ACTIVIDAD"] < 100) {
                    color2 = "info"
                }

                // $('td', row).eq(1).addClass(" fs-1");
                // $('td', row).eq(2).addClass(" fs-1");
                // $('td', row).eq(3).addClass(" fs-1");
                // $('td', row).eq(4).addClass(" fs-2");

                let pr = `
                    <div class="d-flex align-items-center w-100 mw-125px">
						<div class="progress h-6px w-100 me-2 bg-light-warning">
							<div class="progress-bar bg-` + color + `" role="progressbar" style="width: ` + parseFloat(data["AVANCE_PROYECTO"]).toFixed(2) + `%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<span class="text-gray-600 fw-semibold">` + parseFloat(data["AVANCE_PROYECTO"]).toFixed(2) + `%</span>
					</div>
                `
                $('td', row).eq(5).html(pr);

                let pr2 = `
                    <div class="d-flex align-items-center w-100 mw-125px">
						<div class="progress h-6px w-100 me-2 bg-light-warning">
							<div class="progress-bar bg-` + color2 + `" role="progressbar" style="width: ` + parseFloat(data["AVANCE_ACTIVIDAD"]).toFixed(2) + `%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<span class="text-gray-600 fw-semibold">` + parseFloat(data["AVANCE_ACTIVIDAD"]).toFixed(2) + `%</span>
					</div>
                `
                $('td', row).eq(7).html(pr2);

            }
        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 500);
    }
</script>