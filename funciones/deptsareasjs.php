<script>
    function Crear_Tabla_Departamentos(data) {
       $('#MN_Tabla_Departamentos').empty();

        var table = $('#MN_Tabla_Departamentos').DataTable({
            destroy: true,
            data: data,
            dom: 'frtip',
            scrollY: 450,
            scrollX: true,
            scrollCollapse: true,
            columns: [{
                data: "DEPTO_NOM",
                title: "DEPTO_NOM "
            }, {
                data: "FCREADO",
                title: "FCREADO "
            }, {
                data: "DEPTO_ACTIVO",
                title: "DEPTO_ACTIVO "
            }],
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
    }

    function Crear_Tabla_Areas(data) {
       $('#MN_Tabla_Departamentos').empty();

        var table = $('#MN_Tabla_Departamentos').DataTable({
            destroy: true,
            data: data,
            dom: 'frtip',
            scrollY: 450,
            scrollX: true,
            scrollCollapse: true,
            columns: [{
                data: "DEPTO_NOM",
                title: "DEPTO_NOM "
            }, {
                data: "FCREADO",
                title: "FCREADO "
            }, {
                data: "DEPTO_ACTIVO",
                title: "DEPTO_ACTIVO "
            }],
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
    }
</script>