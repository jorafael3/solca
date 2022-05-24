<?php


$urlGetProjects = constant("URL") . "principal/Get_last_projects";


?>


<script>
    var urlGetProjects = '<?php echo $urlGetProjects ?>';

    function Get_last_projects() {

        AjaxSendReceive(urlGetProjects, data = [], function(response) {
            console.log(response);
            Tabla_proyectos_recientes(response);

        });
    }
    Get_last_projects();

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