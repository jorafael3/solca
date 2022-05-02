<?php

require 'views/header.php';

// $departamentos = $this->depts;
// $areas = $this->areas;
// $servicios = $this->servicios;
// $ciudades = $this->ciudades;
// $paises = $this->paises;

?>

<div class="row gy-5 g-xl-10">
    <!--begin::Col-->
    <div class="col-12">
        <!--begin::List widget 16-->
        <div class="card card-flush h-xl-100">
            <!--begin::Header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-gray-800">Delivery Tracking</span>
                    <span class="text-gray-400 mt-1 fw-bold fs-6">56 deliveries in progress</span>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-light" data-bs-toggle='tooltip' data-bs-dismiss='click' data-bs-custom-class="tooltip-dark" title="Delivery App is coming soon">View All</a>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-4 px-0">
                <!--begin::Nav-->
                <ul class="nav nav-pills nav-pills-custom item position-relative mx-9 mb-9">
                    <!--begin::Item-->
                    <li class="nav-item col-2 mx-0 p-0">
                        <!--begin::Link-->
                        <a class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_1">
                            <!--begin::Subtitle-->
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Departamentos</span>
                            <!--end::Subtitle-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item col-2 mx-0 px-0">
                        <!--begin::Link-->
                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_2">
                            <!--begin::Subtitle-->
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Areas</span>
                            <!--end::Subtitle-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item col-2 mx-0 px-0">
                        <!--begin::Link-->
                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_3">
                            <!--begin::Subtitle-->
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Servicios</span>
                            <!--end::Subtitle-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <li class="nav-item col-2 mx-0 px-0">
                        <!--begin::Link-->
                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_4">
                            <!--begin::Subtitle-->
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Ciudades</span>
                            <!--end::Subtitle-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <li class="nav-item col-2 mx-0 px-0">
                        <!--begin::Link-->
                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_5">
                            <!--begin::Subtitle-->
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Paises</span>
                            <!--end::Subtitle-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Bullet-->
                    <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
                    <!--end::Bullet-->
                </ul>
                <!--end::Nav-->
                <!--begin::Tab Content-->
                <div class="tab-content px-9 hover-scroll-overlay-y pe-7 me-3 mb-2" style="height: 454px">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_list_widget_16_tab_1">
                        <div class="table-responsive">
                            <table style="width: 100%; font-weight: bold; font-size: 16px;" id="MN_Tabla_Departamentos" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_list_widget_16_tab_2">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Areas" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_list_widget_16_tab_3">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Servicios" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="kt_list_widget_16_tab_4">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Ciudades" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="kt_list_widget_16_tab_5">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Paises" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--end::Tap pane-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end::List widget 16-->
    </div>
</div>
<?php require 'views/footer.php'; ?>
<?php require 'funciones/deptsareasjs.php'; ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.css" />


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>

<script>
    // console.log(JSON.parse(ciudades));
    // console.log(JSON.parse(paises));

    function Tb_Depart() {
        // var data =  JSON.parse(Departamentos);
        get_departamentos();
        get_Areas();
        get_Servicios();
        get_Ciudades();
        get_Paises();
    }
    Tb_Depart();
</script>