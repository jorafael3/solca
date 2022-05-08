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
            <!-- <div class="card-header pt-7">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-gray-800">Delivery Tracking</span>
                    <span class="text-gray-400 mt-1 fw-bold fs-6">56 deliveries in progress</span>
                </h3>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-light" data-bs-toggle='tooltip' data-bs-dismiss='click' data-bs-custom-class="tooltip-dark" title="Delivery App is coming soon">View All</a>
                </div>
            </div> -->
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-4 px-0">
                <!--begin::Nav-->
                <ul class="nav nav-pills nav-pills-custom item position-relative mx-9 mb-9">
                    <!--begin::Item-->
                    <li class="nav-item mx-0 p-0">
                        <!--begin::Link-->
                        <a data-toggle="tab" class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_1">
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
                    <li class="nav-item mx-0 px-0">
                        <!--begin::Link-->
                        <a data-toggle="tab" class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_2">
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
                    <li class="nav-item mx-0 px-0">
                        <!--begin::Link-->
                        <a data-toggle="tab" class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_3">
                            <!--begin::Subtitle-->
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Servicios</span>
                            <!--end::Subtitle-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <li class="nav-item  mx-0 px-0">
                        <!--begin::Link-->
                        <a data-toggle="tab" class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_4">
                            <!--begin::Subtitle-->
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Ciudades</span>
                            <!--end::Subtitle-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <li class="nav-item mx-0 px-0">
                        <!--begin::Link-->
                        <a data-toggle="tab" class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_5">
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
                <div class="tab-content px-9 hover-scroll-overlay-y pe-7 me-3 mb-2" style="height: 500px">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_list_widget_16_tab_1">
                        <div class="table-responsive">
                            <table style="width: 100%; font-weight: bold; font-size: 16px;" id="MN_Tabla_Departamentos" class="display table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_list_widget_16_tab_2">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Areas" style="width: 100%; font-weight: bold; font-size: 16px;" class="display table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_list_widget_16_tab_3">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Servicios" style="width: 100%; font-weight: bold; font-size: 16px;" class="display table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="kt_list_widget_16_tab_4">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Ciudades" style="width: 100%; font-weight: bold; font-size: 16px;" class="display table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="kt_list_widget_16_tab_5">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Paises" style="width: 100%; font-weight: bold; font-size: 16px;" class="display table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
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


<div class="modal fade" id="kt_modal_add_Departamento" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header_edit">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Nuevo Departamento</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1 btn_close_departamento">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="form2" onsubmit="return false">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">



                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Nombre</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="DEPT_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                            <!--end::Input-->
                        </div>

                        <div id="CHECK_DEPARTAMENTOS" style="display: none;">


                            <div class="d-flex fv-row">


                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input id="Check_estado_activo_Dep" class="form-check-input me-3" name="user_role_e" type="radio" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">
                                            Activo
                                        </div>

                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                            <!--end::Input row-->
                            <div class="separator separator-dashed my-5"></div>
                            <div class="d-flex fv-row">


                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input id="Check_estado_inactivo_Dep" class="form-check-input me-3" name="user_role_e" type="radio" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">
                                            Inactivo
                                        </div>

                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>


                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">

                        <button id="btn_Nuevos_Departamento_b" onclick="btn_Nuevos_Departamento()" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button id="btn_Actualizar_Departamento_b" onclick="btn_Actualizar_Departamento()" class="btn btn-warning" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Actualizar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>

                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

<div class="modal fade" id="kt_modal_add_Area" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header_edit">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Nueva Area</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1 btn_close_area">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="form2" onsubmit="return false">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">



                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Nombre</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="AREA_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                            <!--end::Input-->
                        </div>

                        <div id="CHECK_AREAS" style="display: none;">


                            <div class="d-flex fv-row">


                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input id="Check_estado_activo_Area" class="form-check-input me-3" name="user_role_e" type="radio" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">
                                            Activo
                                        </div>

                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                            <!--end::Input row-->
                            <div class="separator separator-dashed my-5"></div>
                            <div class="d-flex fv-row">


                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input id="Check_estado_inactivo_Area" class="form-check-input me-3" name="user_role_e" type="radio" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">
                                            Inactivo
                                        </div>

                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>



                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">

                        <button id="btn_Nuevos_Areas_b" onclick="btn_Nuevos_Areas()" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button id="btn_Actualizar_Areas_b" onclick="btn_Actualizar_Areas()" class="btn btn-warning" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Actualizar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>

                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

<div class="modal fade" id="kt_modal_add_Servicio" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header_edit">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Nuevo Servicio</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1 btn_close_Serv">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="form2" onsubmit="return false">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">



                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Nombre</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="SERV_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                            <!--end::Input-->
                        </div>

                        <div id="CHECK_SERV" style="display: none;">


                            <div class="d-flex fv-row">


                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input id="Check_estado_activo_Serv" class="form-check-input me-3" name="user_role_e" type="radio" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">
                                            Activo
                                        </div>

                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                            <!--end::Input row-->
                            <div class="separator separator-dashed my-5"></div>
                            <div class="d-flex fv-row">


                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input id="Check_estado_inactivo_Serv" class="form-check-input me-3" name="user_role_e" type="radio" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                        <div class="fw-bolder text-gray-800">
                                            Inactivo
                                        </div>

                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                        </div>



                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">

                        <button id="btn_Nuevos_Servicio_b" onclick="btn_Nuevos_Servicio()" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button id="btn_Actualizar_Servicio_b" onclick="btn_Actualizar_Servicio()" class="btn btn-warning" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Actualizar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>

                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
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

    $(".btn_close_departamento").click(function() {
        $("#kt_modal_add_Departamento").modal('hide');
    });


    $(".btn_close_area").click(function() {
        $("#kt_modal_add_Area").modal('hide');
    });
    $(".btn_close_Serv").click(function() {
        $("#kt_modal_add_Servicio").modal('hide');
    });

    

    function btn_Nuevos_Departamento() {
        Nuevos_Departamento();
    }

    function btn_Actualizar_Departamento() {
        Actualizar_Departamento();
    }

    function btn_Nuevos_Areas() {
        Nueva_Area();
    }

    function btn_Actualizar_Areas() {
        Actualizar_Area();
    }

    function btn_Nuevos_Servicio() {
        Nueva_Servicio();
    }

    function btn_Actualizar_Servicio() {
        Actualizar_Servicio();
    }



    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $.fn.dataTable.tables({
            visible: true,
            api: true
        }).columns.adjust();
    })
</script>