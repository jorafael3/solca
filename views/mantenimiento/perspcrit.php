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
                    <span class="card-label fw-bolder text-gray-800"></span>
                    <span class="text-gray-400 mt-1 fw-bold fs-6"></span>
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
                        <li class="nav-item  mx-0 p-0 bg-light">
                            <!--begin::Link-->
                            <a data-toggle="tab" class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_1">
                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Perspectivas</span>
                                <!--end::Subtitle-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>


                        <li class="nav-item mx-0 px-0 bg-light">
                            <!--begin::Link-->
                            <a data-toggle="tab" class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_2">
                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Criterios</span>
                                <!--end::Subtitle-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>

                    <!--end::Item-->
                    <!--begin::Item-->

                        <li class="nav-item mx-0 px-0 bg-light">
                            <!--begin::Link-->
                            <a data-toggle="tab" class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_3">
                                <!--begin::Subtitle-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Medios de Verificacion</span>
                                <!--end::Subtitle-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>

                    <!-- <li class="nav-item col-2 mx-0 px-0">
                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_4">
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Ciudades</span>
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                        </a>
                    </li>
                    <li class="nav-item col-2 mx-0 px-0">
                        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_16_tab_5">
                            <span class="nav-text text-gray-800 fw-bolder fs-6 mb-3">Paises</span>
                            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                        </a>
                    </li> -->
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
                            <table style="width: 100%; font-weight: bold; font-size: 16px;" id="MN_Tabla_Perspectivas" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_list_widget_16_tab_2">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Criterios" style="width: 100%; font-weight: bold; font-size: 16px;" class="display table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_list_widget_16_tab_3">
                        <div class="table-responsive">
                            <table id="MN_Tabla_Medios" style="width: 100%; font-weight: bold; font-size: 16px;" class="display table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- <div class="tab-pane fade" id="kt_list_widget_16_tab_4">
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

                    </div> -->
                    <!--end::Tap pane-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end::List widget 16-->
    </div>
</div>


<div class="modal fade" id="kt_modal_add_Perspectiva" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header_edit">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Nueva Perspectivas</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1 btn_close_Perspectiva">
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
                            <input type="text" id="PERS_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                            <!--end::Input-->
                        </div>


                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">

                        <button id="btn_Nuevos_Perspectivas_b" onclick="btn_Nuevos_Perspectivas()" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button id="btn_Actualizar_Perspectivas_b" onclick="btn_Actualizar_Perspectivas()" class="btn btn-warning" data-kt-users-modal-action="submit">
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


<div class="modal fade" id="kt_modal_add_Criterio" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header_edit">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Nuevo Criterio</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1 btn_close_Criterio">
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
                            <input type="text" id="CRIT_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                            <!--end::Input-->
                        </div>


                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Perspectiva</label>
                            <select id="CRIT_tipo" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Seleccione tipo de riesgo" name="target_assign" required>
                                <option value=""></option>

                                <?php
                                foreach ($this->Perspect as $row) {
                                ?>
                                    <option value=<?php echo ($row["PERSPECTIVA_ID"]); ?>><?php echo ($row["PERSPECTIVA_NOM"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">

                        <button id="btn_Nuevos_Criterio_b" onclick="btn_Nuevos_Criterio()" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button id="btn_Actualizar_Criterio_b" onclick="btn_Actualizar_Criterio()" class="btn btn-warning" data-kt-users-modal-action="submit">
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

<div class="modal fade" id="kt_modal_add_Medio" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header_edit">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Nuevo Medio</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1 btn_close_Medio">
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
                            <input type="text" id="MED_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                            <!--end::Input-->
                        </div>

                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">

                        <button id="btn_Nuevos_Medio_b" onclick="btn_Nuevos_Medio()" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Guardar</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button id="btn_Actualizar_Medio_b" onclick="btn_Actualizar_Medio()" class="btn btn-warning" data-kt-users-modal-action="submit">
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
<?php require 'funciones/perspcritjs.php'; ?>

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
        Get_Perspectivas();
        Get_Criterios();
        Get_Medios();
    }
    Tb_Depart();

    $(".btn_close_Perspectiva").click(function() {
        $("#kt_modal_add_Perspectiva").modal('hide');
    });

    $(".btn_close_Criterio").click(function() {
        $("#kt_modal_add_Criterio").modal('hide');
    });
    $(".kt_modal_add_Medio").click(function() {
        $("#btn_close_Medio").modal('hide');
    });

    function btn_Nuevos_Perspectivas() {
        Nueva_Perspectivas();
    }

    function btn_Actualizar_Perspectivas() {
        Actualizar_Perspectiva();
    }


    function btn_Nuevos_Criterio() {
        Nuevo_Criterio();
    }

    function btn_Actualizar_Criterio() {
        Actualizar_Criterio();
    }

    function btn_Nuevos_Medio() {
        Nuevo_Medio();
    }

    function btn_Actualizar_Medio() {
        Actualizar_Medio();
    }
</script>