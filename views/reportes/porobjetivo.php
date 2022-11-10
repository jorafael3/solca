<?php

require 'views/header.php';

?>
<div class="row gy-5 g-xl-10">
    <!--begin::Col-->
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body row">
                <div class="col-12 row">
                    <div class="col-4">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">Perspectiva</label>
                                <select onchange="Get_Criterios(this.value)" id="REP_PERS" class="form-control form-control-solid" placeholder="modelo">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fv-row mb-7">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">Criterio</label>
                                <select onchange="Get_Objetivos_Estrategicos(this.value)" id="REP_CRIT" class="form-control form-control-solid" placeholder="12345678">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fv-row mb-7">
                            <div class="mb-10 mt-8">
                            <button onclick="CARGAR_REPORTE_POR_OBJETIVO()" class="btn btn-primary">Cargar</button>

                            </div>
                        </div>
                    </div>

                </div>

            </div>



        </div>
    </div>
    <div class="col-12" style="display: none;" id="SECCCION_POR_OBJETIVO">
        <div class="card shadow-sm">

            <div class="card-body">
                <div class="table-responsive">
                    <table style="width: 100%; font-weight: bold; font-size: 16px;" id="REP_REPORTES" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
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
    Get_Perspectivas();


</script>