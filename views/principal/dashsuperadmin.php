<?php

require 'views/header.php';

?>


<div class="row gy-5 g-xl-8">

    <div class="col-xl-12">
        <!--begin::Tables widget 6-->
        <div class="card card-flush h-xl-100">


            <div class="card-body">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-gray-800">Perspectivas</span>
                </h3>
                <ul class="nav nav-pills nav-pills-custom mb-3">

                    <?php
                    $con = 1;
                    foreach ($this->Perspect as $row) {

                    ?>
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->

                            <?php
                            if ($con == 1) {


                            ?>
                                <a onclick="Btn_Perspectivas(<?php echo $row['PERSPECTIVA_ID'] ?>)" class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2 active " data-bs-toggle="pill" href="#kt_stats_widget_6_tab_<?php echo $con ?>">
                                <?php
                            } else {

                                ?>

                                    <a onclick="Btn_Perspectivas(<?php echo $row['PERSPECTIVA_ID'] ?>)" class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2 " data-bs-toggle="pill" href="#kt_stats_widget_6_tab_<?php echo $con ?>">


                                    <?php


                                }
                                    ?>
                                    <div class="nav-icon mb-3">
                                        <i class="fa fa-th-large fs-1 p-0"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1"><?php echo $row["PERSPECTIVA_NOM"] ?></span>
                                    <!--end::Title-->
                                    <!--begin::Bullet-->
                                    <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                    <!--end::Bullet-->
                                    </a>
                                    <!--end::Link-->
                        </li>
                    <?php
                        $con += 1;
                    }
                    ?>
                    <!--begin::Item-->

                </ul>

                <div class="row">
                    <div class="table-responsive col-5 border-gray-200">
                        <table style="width: 100%; font-weight: bold; font-size: 16px;" id="TablaListaCriterios" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                            </thead>
                            <tbody class="fw-6 fw-bold text-gray-600">

                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive col-7 border-gray-200">
                        <table style="width: 100%; font-weight: bold; font-size: 16px;" id="TablaListaPoa" class="table table-striped table-row-dashed table-row-gray-600 align-middle gs-0 gy-4">
                            <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                            </thead>
                            <tbody class="fw-6 fw-bold text-gray-600">

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="d-flex flex-wrap flex-stack my-5">
            <!--begin::Heading-->
            <h2 class="fs-2 fw-bold my-2">Projectos
                <span class="fs-6 text-gray-400 ms-1">by Status</span>
            </h2>
            <!--end::Heading-->
            <!--begin::Controls-->
            <div class="d-flex flex-wrap my-1">
                <!--begin::Select wrapper-->
                <div class="m-0">
                    <!--begin::Select-->
                    <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body fw-bolder w-125px">
                        <option value="Active" selected="selected">Active</option>
                        <option value="Approved">In Progress</option>
                        <option value="Declined">To Do</option>
                        <option value="In Progress">Completed</option>
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Select wrapper-->
            </div>
            <!--end::Controls-->
        </div>
    </div>


</div>

<?php require 'views/footer.php'; ?>
<?php require 'funciones/dashsuperadminjs.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.css" />


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo constant('URL') ?>funciones/utils/mensajes.js"></script>

<script>
    /**
     * OBTENEMOS LOS CRITERIOS AL PRESIONAR EL BOTON DE CADA PERSPECTIVA
     *  */
    function Btn_Perspectivas(id) {
        Get_Criterios(id);
    }
    Get_Criterios(1);
</script>