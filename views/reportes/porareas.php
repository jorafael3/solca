<?php

require 'views/header.php';

?>
<div class="row gy-5 g-xl-10">
    <!--begin::Col-->
   
    <div class="col-12" style="display: none;" id="SECCCION_POR_AREAS">
        <div class="card shadow-sm">

            <div class="card-body">
                <div class="table-responsive">
                    <table style="width: 100%; font-weight: bold; font-size: 16px;" id="REP_REPORTES_AREAS" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
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


</script>