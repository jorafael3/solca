<?php

require 'views/header.php';

?>
<div class="row gy-5 g-xl-10">
    <!--begin::Col-->

    <div class="col-12">
        <div class="card shadow-sm">

            <div class="card-body">
                <div class="table-responsive">
                    <table style="width: 100%; font-weight: bold; font-size: 12px;" id="REP_REPORTES_UNIVERSAL" class="table table-striped table-row-dashed table-row-gray-600 align-middle gs-0 gy-4">
                        <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                        </thead>
                        <tbody class="fw-6 fw-bold text-gray-600">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            </div>

        </div>
    </div>
</div>

<?php require 'views/footer.php'; ?>
<?php require 'funciones/reportes_js.php'; ?>

<script>
    CARGAR_REPORTE_UNIVERSAL();

</script>