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

    <div class="col-xl-12" id="Seccion_Proyectos" style="display: none;">
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

        <div class="row g-6 g-xl-9" id="Lista_proyectos">

        </div>

    </div>

    <div class="col-xl-12" id="Seccion_Proyectos_Detalle" style="display: none;">
        <div class="card mb-6 mb-xl-9">
            <div class="card-body pt-9 pb-0">
            <button onclick="Back_to_proyects()" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> regresar</button>
                <!--begin::Details-->
                <br>
                <div class="d-flex flex-wrap flex-sm-nowrap mb-6" style="margin-top: 20px;">
                    <!--begin::Image-->
                   
                    <!--end::Image-->
                    <!--begin::Wrapper-->
                    <div class="flex-grow-1">
                        <!--begin::Head-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::Details-->
                            <div class="d-flex flex-column">
                                <!--begin::Status-->
                                <div class="d-flex align-items-center mb-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">CRM Dashboard</a>
                                    <span class="badge badge-light-success me-auto">In Progress</span>
                                </div>
                                <!--end::Status-->
                                <!--begin::Description-->
                                <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">#1 Tool to get started with Web Apps any Kind &amp; size</div>
                                <!--end::Description-->
                            </div>

                        </div>
                        <!--end::Head-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap justify-content-start">
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap">
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <div class="fs-4 fw-bolder">29 Jan, 2022</div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6 text-gray-400">Due Date</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="fs-4 fw-bolder" data-kt-countup="true" data-kt-countup-value="75">0</div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6 text-gray-400">Open Tasks</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="fs-4 fw-bolder" data-kt-countup="true" data-kt-countup-value="15000" data-kt-countup-prefix="$">0</div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6 text-gray-400">Budget Spent</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                            </div>
                            <!--end::Stats-->
                            <!--begin::Users-->

                            <!--end::Users-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Details-->
                <div class="separator"></div>
                <!--begin::Nav-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6 active" href="../../demo1/dist/apps/projects/project.html">Overview</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6" href="../../demo1/dist/apps/projects/targets.html">Targets</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6" href="../../demo1/dist/apps/projects/budget.html">Budget</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6" href="../../demo1/dist/apps/projects/users.html">Users</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6" href="../../demo1/dist/apps/projects/files.html">Files</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6" href="../../demo1/dist/apps/projects/activity.html">Activity</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6" href="../../demo1/dist/apps/projects/settings.html">Settings</a>
                    </li>
                    <!--end::Nav item-->
                </ul>
                <!--end::Nav-->
            </div>
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
    $(document).ready(function() {
        $(this).scrollTop(0);
    });

    function Back_to_proyects(){
        $("#Seccion_Proyectos").show(100);
        $("#Seccion_Proyectos_Detalle").hide(100);
    }
</script>