<?php

require 'views/header.php';

?>


<div class="row gy-5 g-xl-8">

    <div class="col-xl-12" id="Seccion_Perspectivas">
        <!--begin::Tables widget 6-->
        <div class="card card-flush h-xl-100">


            <div class="card-body">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-gray-800">Perspectivas</span>
                </h3>
                <ul id="PERSPECTIVAS_LIST" class="nav nav-pills nav-pills-custom mb-3">

                    <?php
                    $con = 1;
                    foreach ($this->Perspect as $row) {

                        $Perspectiva_ID = $row['PERSPECTIVA_ID'];
                        $Perspectiva_Nom = $row["PERSPECTIVA_NOM"];
                    ?>
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->

                            <?php
                            if ($con == 1) {


                            ?>
                                <a onclick="Btn_Perspectivas('<?php echo $Perspectiva_ID ?>','<?php echo $Perspectiva_Nom ?>')" class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2 active " data-bs-toggle="pill" href="#kt_stats_widget_6_tab_<?php echo $con ?>">
                                <?php
                            } else {

                                ?>

                                    <a onclick="Btn_Perspectivas('<?php echo $Perspectiva_ID ?>','<?php echo $Perspectiva_Nom ?>')" class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2 " data-bs-toggle="pill" href="#kt_stats_widget_6_tab_<?php echo $con ?>">


                                    <?php


                                }
                                    ?>
                                    <div class="nav-icon mb-3">
                                        <i class="fa fa-th-large fs-4 p-0"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1"><?php echo $Perspectiva_Nom ?></span>
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
                    <li class="nav-item mb-3">
                        <!--begin::Link-->
                        <a class="nav-link d-flex flex-center overflow-hidden w-80px h-85px" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Perspectiva" href="#">
                            <!--begin::Icon-->
                            <div class="nav-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                <span class="svg-icon svg-icon-2hx svg-icon-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Icon-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                </ul>

                <div class="row">
                    <div class="table-responsive col-4 border-gray-200">
                        <h4>Criterios</h4>
                        <button data-bs-toggle="modal" data-bs-target="#kt_modal_add_Criterio" style="margin-bottom: 10px;" class="btn btn-light-success"><i class="fa fa-plus"></i> Nuevo</button>
                        <br>
                        <table style="width: 100%; font-weight: bold; font-size: 16px;" id="TablaListaCriterios" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                            </thead>
                            <tbody class="fw-6 fw-bold text-gray-600">

                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive col-8 border-gray-200">
                        <h4>Objetivos Estrategicos</h4>
                        <button data-bs-toggle="modal" data-bs-target="#kt_modal_add_Obj_estrategicos" style="margin-bottom: 10px;" class="btn btn-light-primary"><i class="fa fa-plus"></i> Nuevo</button>

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


    <div class="col-xl-12" id="Seccion_Indicadores" style="display: none;">
        <div class="col">
            <!--begin::Chart widget 10-->
            <div class="card card-flush h-xxl-100">
                <!--begin::Header-->

                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body d-flex flex-column justify-content-between pb-5">
                    <!--begin::Nav-->
                    <ul class="nav nav-pills nav-pills-custom mb-3">
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2 active" data-bs-toggle="pill" id="kt_charts_widget_10_tab_1" href="#kt_charts_widget_10_tab_content_1">
                                <!--begin::Icon-->
                                <div class="nav-icon mb-3">
                                    <i class="fa fa-file fs-1 p-0"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 lh-2">Indicadores</span>
                                <!--end::Title-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_10_tab_2" href="#kt_charts_widget_10_tab_content_2">
                                <!--begin::Icon-->
                                <div class="nav-icon mb-3">
                                    <i class="fonticon-truck fs-1 p-0"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Riesgos</span>
                                <!--end::Title-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_10_tab_3" href="#kt_charts_widget_10_tab_content_3">
                                <!--begin::Icon-->
                                <div class="nav-icon mb-3">
                                    <i class="fa fa-lock fs-1 p-0"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Fortalezas</span>
                                <!--end::Title-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-120px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_10_tab_4" href="#kt_charts_widget_10_tab_content_4">
                                <!--begin::Icon-->
                                <div class="nav-icon mb-3">
                                    <i class="fa fa-circle fs-1 p-0"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Oportunidades</span>
                                <!--end::Title-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-120px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_10_tab_4" href="#kt_charts_widget_10_tab_content_5">
                                <!--begin::Icon-->
                                <div class="nav-icon mb-3">
                                    <i class="fa fa-life-ring fs-1 p-0"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Debilidades</span>
                                <!--end::Title-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <li class="nav-item mb-3 me-3 me-lg-6">
                            <!--begin::Link-->
                            <a class="nav-link btn btn-outline btn-flex btn-active-color-primary flex-column overflow-hidden w-120px h-85px pt-5 pb-2" data-bs-toggle="pill" id="kt_charts_widget_10_tab_4" href="#kt_charts_widget_10_tab_content_6">
                                <!--begin::Icon-->
                                <div class="nav-icon mb-3">
                                    <i class="fa fa-exclamation-triangle fs-1 p-0"></i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <span class="nav-text text-gray-800 fw-bolder fs-6 lh-1">Amenazas</span>
                                <!--end::Title-->
                                <!--begin::Bullet-->
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                <!--end::Bullet-->
                            </a>
                            <!--end::Link-->
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->
                    <!--begin::Tab Content-->
                    <div class="tab-content" style=" height: 500px;">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade active show" id="kt_charts_widget_10_tab_content_1">

                            <button onclick="btn_indicadores_show()" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Indicador" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Indicador</button>
                            <div class="table-responsive" style="margin-top: 15px;">
                                <table id="Tabla_indicadores" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                    </thead>
                                    <tbody class="fw-6 fw-bold text-gray-600">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_charts_widget_10_tab_content_2">

                            <button onclick="btn_riesgos_show()" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Riesgo" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Riesgo</button>

                            <div class="table-responsive" style="margin-top: 15px;">
                                <table id="Tabla_Riesgos" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                    </thead>
                                    <tbody class="fw-6 fw-bold text-gray-600">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_charts_widget_10_tab_content_3">
                            <button onclick="btn_fortalezas_show()" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Fortaleza" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva Fortaleza</button>

                            <div class="table-responsive" style="margin-top: 15px;">
                                <table id="Tabla_Fortalezas" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                    </thead>
                                    <tbody class="fw-6 fw-bold text-gray-600">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_charts_widget_10_tab_content_4">
                            <button onclick="btn_oportunidades_show()" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Oportunidad" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva Oportunidad</button>

                            <div class="table-responsive" style="margin-top: 15px;">
                                <table id="Tabla_oportunidades" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                    </thead>
                                    <tbody class="fw-6 fw-bold text-gray-600">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_charts_widget_10_tab_content_5">
                            <button onclick="btn_debilidades_show()" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Debilidad" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva Debilidad</button>

                            <div class="table-responsive" style="margin-top: 15px;">
                                <table id="Tabla_Debilidades" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                    </thead>
                                    <tbody class="fw-6 fw-bold text-gray-600">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="kt_charts_widget_10_tab_content_6">
                            <button onclick="btn_amenazas_show()" data-bs-toggle="modal" data-bs-target="#kt_modal_add_Amenaza" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva Amenaza</button>

                            <div class="table-responsive" style="margin-top: 15px;">
                                <table id="Tabla_Amenazas" style="width: 100%; font-weight: bold; font-size: 16px;" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
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
            <!--end::Chart widget 10-->
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
                    <h2 class="fw-bolder">Nueva Perspectiva</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_perspectiva">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre De la Perspectiva</label>
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

                            <button onclick="Btn_Nueva_Perspectiva()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
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
                        <span class="svg-icon svg-icon-1 btn_close_criterio">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre Del Criterio</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="CRIT_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button onclick="Btn_Nuevo_Criterio()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
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
                        <span class="svg-icon svg-icon-1 btn_close_criterio">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre Del Criterio</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="CRIT_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button onclick="Btn_Nuevo_Criterio()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
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

    <div class="modal fade" id="kt_modal_add_Obj_estrategicos" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Nuevo Objetivo Estrategico</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_Obj">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre Del Objetivo</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="OBJ_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Indicador</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="OBJ_Indicador" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Medio de Verificacion</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="OBJ_Medio" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button onclick="Btn_Nuevo_obj_estrategico()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
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




    <div class="modal fade" id="kt_modal_add_Indicador" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Nuevo Indicador</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_indicador">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre Del Indicador</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="IND_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Medio de Verificacion</label>
                            <select id="MED_VER" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Seleccione Medio de Verificacion" name="target_assign" required>
                                <option value=""></option>

                                <?php
                                foreach ($this->medios as $row) {
                                ?>
                                    <option value=<?php echo ($row["MVERIFICACION_ID"]); ?>><?php echo ($row["DESCRIPCION"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button id="Btn_Nuevo_Indicador_b" style="display: none;" onclick="Btn_Nuevo_Indicador()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>

                            <button id="Btn_Actualizar_Indicador_b" style="display: none;" onclick="Btn_Actualizar_Indicador()" class="btn btn-warning" data-kt-users-modal-action="submit">
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

    <div class="modal fade" id="kt_modal_add_Riesgo" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Nuevo Riesgo</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_riesgo">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre Del Riesgo</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="RIES_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Indice</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="RIES_Indice" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Tipo</label>
                                <select id="RIES_tipo" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Seleccione tipo de riesgo" name="target_assign" required>
                                    <option value=""></option>

                                    <?php
                                    foreach ($this->ries_tip as $row) {
                                    ?>
                                        <option value=<?php echo ($row["RIESGOTIPO_ID"]); ?>><?php echo ($row["RIESGOTIPO_NOM"]); ?></option>
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

                            <button id="Btn_Nuevo_Riesgo_b" style="display: none;" onclick="Btn_Nuevo_Riesgo()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>

                            <button id="Btn_Actualizar_Riesgo_b" style="display: none;" onclick="Btn_Actualizar_Riesgo()" class="btn btn-warning" data-kt-users-modal-action="submit">
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

    <div class="modal fade" id="kt_modal_add_Fortaleza" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Nuevo Fortaleza</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_fortaleza">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre de la Fortaleza</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="FOR_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Indice</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="FOR_Indice" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button id="Btn_Nuevo_Fortaleza_b" style="display: none;" onclick="Btn_Nuevo_Fortaleza()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>

                            <button id="Btn_Actualizar_Fortaleza_b" style="display: none;" onclick="Btn_Actualizar_Fortaleza()" class="btn btn-warning" data-kt-users-modal-action="submit">
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

    <div class="modal fade" id="kt_modal_add_Oportunidad" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Nueva Oportunidad</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_oportunidad">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre de la Oportunidad</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="OPOR_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Indice</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="OPOR_Indice" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button id="Btn_Nuevo_Oportunidad_b" onclick="Btn_Nuevo_Oportunidad()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>

                            <button id="Btn_Actualizar_Oportunidad_b" onclick="Btn_Actualizar_Oportunidad()" class="btn btn-warning" data-kt-users-modal-action="submit">
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

    <div class="modal fade" id="kt_modal_add_Debilidad" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Nueva Debilidad</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_debilidad">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre de la Debilidad</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="DEB_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Indice</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="DEB_Indice" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button id="Btn_Nuevo_Debilidad_b" onclick="Btn_Nuevo_Debilidad()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>

                            <button id="Btn_Actualizar_Debilidad_b" onclick="Btn_Actualizar_Debilidad()" class="btn btn-warning" data-kt-users-modal-action="submit">
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

    <div class="modal fade" id="kt_modal_add_Amenaza" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Nueva Amenaza</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_amenaza">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre de la Amenaza</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="AME_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Indice</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="AME_Indice" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button onclick="Btn_Nuevo_Amenaza()" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar</span>
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
    <?php require 'funciones/matrizestrategicajs.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.css" />


    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo constant('URL') ?>funciones/utils/mensajes.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/assets/css/dragula.css">
    <script src="<?php echo constant('URL') ?>public/assets/js/dragula.min.js"></script>

    <script>
        /**
         * OBTENEMOS LOS CRITERIOS AL PRESIONAR EL BOTON DE CADA PERSPECTIVA
         *  */
        function Btn_Perspectivas(id, nombre) {
            Get_Criterios(id, nombre);
        }
        Get_Criterios(1, "Direccion");
        $(document).ready(function() {
            $(this).scrollTop(0);
        });

        /***BOTON PARA REGRESAR A LA LISTA DE PROYECTOS */


        $(".btn_close_perspectiva").click(function() {
            $("#kt_modal_add_Perspectiva").modal('hide');
        });

        $(".btn_close_criterio").click(function() {
            $("#kt_modal_add_Criterio").modal('hide');
        });
        $(".btn_close_Obj").click(function() {
            $("#kt_modal_add_Obj_estrategicos").modal('hide');
        });

        $(".btn_close_indicador").click(function() {
            $("#kt_modal_add_Indicador").modal('hide');
        });
        $(".btn_close_riesgo").click(function() {
            $("#kt_modal_add_Riesgo").modal('hide');
        });

        $(".btn_close_fortaleza").click(function() {
            $("#kt_modal_add_Fortaleza").modal('hide');
        });

        $(".btn_close_oportunidad").click(function() {
            $("#kt_modal_add_Oportunidad").modal('hide');
        });

        $(".btn_close_debilidad").click(function() {
            $("#kt_modal_add_Debilidad").modal('hide');
        });

        $(".btn_close_amenaza").click(function() {
            $("#kt_modal_add_Amenaza").modal('hide');
        });


        /**DATE PICKER NUEVA ACTIVIDAD */
        function Btn_Nueva_Perspectiva() {
            Nueva_Perspectiva();
        }

        function Btn_Nuevo_Criterio() {
            Nuevo_criterio();
        }

        function Btn_Nuevo_obj_estrategico() {
            Nuevo_OBj_Estrategico();
        }

        function btn_indicadores_show() {
            $("#Btn_Nuevo_Indicador_b").show();
            $("#Btn_Actualizar_Indicador_b").hide();
            $("#IND_Nombre").val("");
            $("#MED_VER").val(-1).change();
        }

        function btn_riesgos_show() {
            $("#Btn_Nuevo_Riesgo_b").show();
            $("#Btn_Actualizar_Riesgo_b").hide();
            $("#RIES_Nombre").val("");
            $("#RIES_Indice").val("");
            $("#RIES_tipo").val(-1).change();
        }

        function btn_fortalezas_show() {
            $("#Btn_Nuevo_Fortaleza_b").show();
            $("#Btn_Actualizar_Fortaleza_b").hide();
            $("#FOR_Indice").val("");
            $("#FOR_Nombre").val("");
        }

        function btn_oportunidades_show() {
            $("#Btn_Nuevo_Oportunidad_b").show();
            $("#Btn_Actualizar_Oportunidad_b").hide();
            $("#OPOR_Nombre").val("");
            $("#OPOR_Indice").val("");
        }

        function btn_debilidades_show() {
            $("#Btn_Nuevo_Debilidad_b").show();
            $("#Btn_Actualizar_Debilidad_b").hide();
            $("#DEB_Nombre").val("");
            $("#DEB_Indice").val("");
        }

        function btn_amenazas_show() {
            $("#Btn_Nuevo_Amenazas_b").show();
            $("#Btn_Actualizar_Amenazas_b").hide();
            $("#IND_Nombre").val("");
            $("#MED_VER").val(-1).change();
        }

        function Btn_Nuevo_Indicador() {
            Nuevo_Indicador();
        }

        function Btn_Actualizar_Indicador() {
            Actualizar_Indicador();
        }

        function Btn_Nuevo_Riesgo() {
            Nuevo_Riesgo();
        }

        function Btn_Actualizar_Riesgo() {
            Actualizar_Riesgos();
        }

        function Btn_Nuevo_Fortaleza() {
            Nuevo_Fortaleza();
        }

        function Btn_Actualizar_Fortaleza() {
            Actualizar_Fortalezas();
        }


        function Btn_Nuevo_Oportunidad() {
            Nuevo_Oportunidad();
        }

        function Btn_Actualizar_Oportunidad() {
            Actualizar_Oportunidad();
        }

        function Btn_Nuevo_Debilidad() {
            Nuevo_Debilidad();
        }
        function Btn_Actualizar_Debilidad() {
            Actualizar_Debilidad();
        }
        

        function Btn_Nuevo_Amenaza() {
            Nuevo_Amenaza();
        }
    </script>