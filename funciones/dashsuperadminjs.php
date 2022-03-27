<?php

$urlGet_perspectiva = constant("URL") . "dashsuperadmin/Get_Perspectivas";
$urlGet_Criterios = constant("URL") . "dashsuperadmin/Get_Criterios";

?>

<script>
    var urlGet_perspectiva = '<?php echo $urlGet_perspectiva ?>';
    var urlGet_Criterios = '<?php echo $urlGet_Criterios ?>';

    function Get_Perspectivas() {

        AjaxSendReceive(urlGet_perspectiva, data = [], function(response) {
            console.log(response);
        });

    }

    function Get_Criterios(id) {

        var data = {
            id_criterio: id
        }

        AjaxSendReceive(urlGet_Criterios, data, function(response) {
            console.log(response);
            Tabla_criterios(response);
        });

    }

    function Tabla_criterios(data) {

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
                "width": "5%",
                "targets": 0
            }],
            "drawCallback": function() {
                $(this.api().table().header()).hide();
            },
            columns: [{
                data: "CRITERIO_NOM",
                title: ""
            }, {
                data: "CRITERIO_NOM",
                title: ""
            }, {
                data: null,
                title: "",
                className: "dt-center  btn_edit",
                defaultContent: '<button class="btn btn-icon btn-sm w-30px h-30px btn-active-light-primary btn-active-color-primary btn-light" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true"><span class="svg-icon svg-icon-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" /><path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" /></svg></span></button>',
                orderable: false
            }],
            "createdRow": function(row, data, index, cell) {

                if (data["CRITERIO_NOM"]) {
                    var char = data["CRITERIO_NOM"];
                    char = char.substring(0, 1);
                    var r = Math.floor(Math.random() * 10) + 1;
                    var color = "bg-danger";
                    if (r >= 1 && r < 3) {
                        color = "bg-primary";
                    } else if (r >= 3 && r < 6) {
                        color = "bg-info";
                    } else if (r >= 6 && r < 9) {
                        color = "bg-warning";
                    } else {
                        color = "bg-danger";
                    }

                    $('td', row).eq(0).html("<div class='symbol symbol-40px me-4'><div class='symbol-label fs-2 fw-bold " + color + " text-inverse-danger'>" + char + "</div></div>");
                }
            }


        });
        new $.fn.dataTable.FixedHeader(table);
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 1000);
    }

    function AjaxSendReceive(url, data, callback) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                data = JSON.parse(data);
                //console.log(data);
                callback(data);
            }
        }

        data = JSON.stringify(data);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    }
</script>