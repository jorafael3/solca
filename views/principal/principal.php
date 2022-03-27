<?php

require 'views/header.php';
$nivel = $_SESSION["TIPOUS_ID"];

if ($nivel == 1) {
    require 'views/principal/dashsuperadmin.php';
}else if ($nivel == 2) {
    require 'views/principal/dasharea.php';
}else if ($nivel == 3) {
    require 'views/principal/dashadmin.php';
}else if ($nivel == 4) {
    require 'views/principal/dashpoa.php';
}

?>


<?php require 'views/footer.php'; ?>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.bootstrap4.min.css" />


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            // responsive: true,
            scrollX: true,
            scrollCollapse: true,

        });
    });

    // document.oncontextmenu = function(){return false}
</script>