<?php

require 'views/header.php';
$TIPOUS_ID = $_SESSION["TIPOUS_ID"];
$AREA_NOM = $_SESSION["AREA_NOM"];
$AREA_ID = $_SESSION["AREA_ID"];

?>


<div class="row gy-5 g-xl-8">

    <div class="col-12">
        <h4>Area</h4>
        <div class="col-12 col-md-6">
            <div class="m-0">

                <?php
                if ($TIPOUS_ID == 1) {
                ?>
                    <select style="width: 100%;" id="Poa_Filter" onchange="POA_FILTRAR_DEPTS(this.value)" name="status" class="form-select form-select bg-body border-body fw-bolder w-160px select_Filter">
                        <option value="Todos">TODOS</option>
                        <?php
                        foreach ($this->areas as $row) {
                        ?>

                            <option value=<?php echo str_replace(' ', '', $row["AREA_ID"]); ?>><?php echo ($row["AREA_NOM"]); ?></option>
                        <?php
                        }
                        ?>
                    </select>
                <?php

                } else if ($TIPOUS_ID == 4) {
                ?>
                    <select disabled="true" style="width: 100%;" id="Poa_Filter" onchange="POA_FILTRAR_DEPTS(this.value)" name="status" class="form-select form-select bg-body border-body fw-bolder w-160px select_Filter">
                        <option value="<?php echo $AREA_ID ?>"><?php echo $AREA_NOM ?></option>
                    </select>

                <?php
                }
                ?>




            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12" id="Seccion_Perspectivas">
        <!--begin::Tables widget 6-->
        <div class="card card-flush h-xl-100">


            <div class="card-body">
                <h3 class="card-title align-items-start flex-column" style="display: none;">
                    <span class="card-label fw-bolder text-gray-800">Perspectivas</span>
                </h3>
                <ul id="PERSPECTIVAS_LIST" class="nav nav-pills nav-pills-custom mb-3" style="display:none;">

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

                    <?php

                    if ($TIPOUS_ID == 1) {
                    ?>
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
                    <?php

                    }
                    ?>




                    <!--begin::Item-->

                </ul>

                <div class="row">
                    <div class="col-md-4 col-12" style="display: none;">
                        <div class="table-responsive border-gray-200">
                            <div class="d-flex flex-wrap flex-stack my-5">
                                <!--begin::Heading-->
                                <h2 class="fs-2 fw-bold my-2">Criterios
                                    <span class="fs-6 text-gray-400 ms-1"></span>
                                </h2>
                                <!--end::Heading-->
                                <!--begin::Controls-->

                                <!--end::Controls-->
                            </div>
                            <table style="width: 100%; font-weight: bold; font-size: 16px;" id="TablaListaCriterios" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                                </thead>
                                <tbody class="fw-6 fw-bold text-gray-600">

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="col-md-12 col-12">

                        <div class="table-responsive border-gray-200">
                            <div class="d-flex flex-wrap flex-stack my-5">
                                <!--begin::Heading-->
                                <h2 class="fs-2 fw-bold my-2">Objetivos Estrategicos
                                    <span class="fs-6 text-gray-400 ms-1"></span>
                                </h2>
                                <!--end::Heading-->
                                <!--begin::Controls-->
                                <div class="d-flex flex-wrap my-1">
                                    <!--begin::Select wrapper-->

                                    <!--end::Select wrapper-->
                                </div>
                                <!--end::Controls-->
                            </div>
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
    </div>

    <div class="col-xl-12" id="Seccion_Proyectos" style="display: none;">
        <div class="row">
            <div class="card-body">
                <button style="width: 100%;" onclick="Limpiar_Proyectos()" data-bs-toggle="modal" data-bs-target="#kt_modal_Nuevo_Proyecto" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Nuevo Proyecto</button>
            </div>
        </div>
        <div class="d-flex flex-wrap flex-stack my-5">
            <!--begin::Heading-->
            <h2 class="fs-2 fw-bold my-2">Proyectos
                <span class="fs-6 text-gray-400 ms-1"></span>
            </h2>
            <!--end::Heading-->
            <!--begin::Controls-->
            <div class="d-flex flex-wrap my-1">
                <!--begin::Select wrapper-->
                <div class="m-0">
                    <!--begin::Select-->
                    <select onchange="BTN_Filtrar_pry(this.value)" name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body fw-bolder w-125px">
                        <option value="1">Todos</option>
                        <option value="2" selected="selected">Activo</option>
                        <option value="3">Desactivados</option>
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

            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h2>Proyecto</h2>

                </div>
                <div class="card-toolbar">
                    <button onclick="Back_to_proyects()" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> regresar</button>

                </div>
            </div>
            <div class="card-body pt-1 pb-0">
                <!--begin::Details-->
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
                                    <a id="Proyecto_nom" href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">CRM Dashboard</a>
                                    <span class="badge badge-light-primary me-auto">Activo</span>
                                </div>
                                <!--end::Status-->
                                <!--begin::Description-->
                                <div id="PROYECTOA_INDICADOR" class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">#1 Tool to get started with Web Apps any Kind &amp; size</div>
                                <!--end::Description-->
                            </div>

                        </div>
                        <!--end::Head-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap justify-content-start">
                            <div class="d-flex flex-wrap">
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="FCREADO" class="fs-4 fw-bolder"></div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Creado</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="PROYECTOA_RESPONSABLE" class="fs-4 fw-bolder"></div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Responsable</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="PROYECTOA_CRITERIO" class="fs-4 fw-bolder"></div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Criterio</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="PROYECTOA_AREA" class="fs-4 fw-bolder"></div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Area</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="PROYECTOA_DEPARTAMENTO" class="fs-4 fw-bolder"></div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">Departamento</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="PROYECTOA_POA" class="fs-4 fw-bolder"></div>
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-400">POA</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Details-->
                <div class="separator"></div>
                <!--begin::Nav-->

                <!--end::Nav-->
            </div>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="card-body">
                    <button style="width: 100%;" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear Nueva Actividad</button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <div class="mb-9">
                        <div class="d-flex flex-stack">
                            <div class="fw-bolder fs-4">En Revision
                                <span id="ACT_COUNT_REV" class="fs-6 text-gray-400 ms-2"></span>
                            </div>
                            <!--begin::Menu-->
                            <div>
                                <!-- <button type="button" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </button> -->
                                <!-- <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_620792f3e9ec4">
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                    </div>
                                    <div class="separator border-gray-200"></div>
                                    <div class="px-7 py-5">
                                        <div class="mb-10">
                                            <label class="form-label fw-bold">Status:</label>
                                            <div>
                                                <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_620792f3e9ec4" data-allow-clear="true">
                                                    <option></option>
                                                    <option value="1">Approved</option>
                                                    <option value="2">Pending</option>
                                                    <option value="2">In Process</option>
                                                    <option value="2">Rejected</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fw-bold">Member Type:</label>
                                            <div class="d-flex">
                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                    <span class="form-check-label">Author</span>
                                                </label>
                                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                    <span class="form-check-label">Customer</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fw-bold">Notifications:</label>
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                <label class="form-check-label">Enabled</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="h-3px w-100 bg-warning"></div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-9">
                        <div class="d-flex flex-stack">
                            <div class="fw-bolder fs-4">En Progreso
                                <span id="ACT_COUNT_PRO" class="fs-6 text-gray-400 ms-2"></span>
                            </div>
                            <!--begin::Menu-->
                            <div>


                            </div>
                            <!--end::Menu-->
                        </div>
                        <div class="h-3px w-100 bg-primary"></div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-9">
                        <div class="d-flex flex-stack">
                            <div class="fw-bolder fs-4">terminados
                                <span id="ACT_COUNT_TER" class="fs-6 text-gray-400 ms-2"></span>
                            </div>
                            <!--begin::Menu-->
                            <div>

                            </div>
                            <!--end::Menu-->
                        </div>
                        <div class="h-3px w-100 bg-success"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="row">

                <div class="col-4" id="Pr_En_Revision">

                </div>

                <div class="col-4" id="Pr_En_Progreso">

                </div>

                <div class="col-4" id="Pr_Terminados">

                </div>
            </div>


        </div>

    </div>


    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Nueva Actividad</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_mo">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre De la Actividad</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="ACT_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>



                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Responsable</label>
                                <!--end::Label-->
                                <select id="ACT_Responsable" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Responsable" name="target_assign" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($this->resp as $row) {
                                    ?>
                                        <option value=<?php echo ($row["US_ID"]); ?>><?php echo ($row["US_APELLNOM"]); ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Fecha de Finalizacion</label>
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="datepicker" id="datepicker2" />

                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Observacion</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="ACT_Obs" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Observacion" required />
                                <!--end::Input-->
                            </div>

                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button onclick="Btn_Nueva_Actividad()" class="btn btn-primary" data-kt-users-modal-action="submit">
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


    <div class="modal fade" id="kt_modal_Nuevo_Proyecto" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 id="PROY_MD_NUEVO" class="fw-bolder">Nuevo Proyecto</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_mo_2"">
                            <svg xmlns=" http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                <label class="required fw-bold fs-6 mb-2">Nombre Del Proyecto</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Nombre" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>



                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Responsable</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select id="PRY_Responsable" class="form-select form-select-solid select23" name="target_assign">
                                    <option value=""></option>
                                    <?php
                                    foreach ($this->resp as $row) {
                                    ?>
                                        <option value=<?php echo $row["US_ID"]; ?>><?php echo ($row["US_APELLNOM"]); ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>


                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Indicador</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_indicador" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Indicador" required />

                                <!-- <select id="PRY_indicador" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Seleccione Indicador" name="target_assign" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($this->Indica as $row) {
                                    ?>
                                        <option value=<?php echo ($row["DESCRIPCION"]); ?>><?php echo ($row["DESCRIPCION"]); ?></option>
                                    <?php
                                    }
                                    ?>
                                </select> -->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2022</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2022" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2022" required />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2023</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2023" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2023" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2024</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2024" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2024" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2025</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2025" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2025" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2026</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2026" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2026" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2027</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2027" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2027" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2028</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2028" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2028" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2029</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2029" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2029" />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Meta 2030</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="PRY_Meta2030" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Meta 2030" />
                                <!--end::Input-->
                            </div>



                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button id="Btn_Nuevo_Proyecto_b" onclick="Btn_Nuevo_Proyecto()" style="display: none;" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Guardar Proyecto</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>

                            <button id="Btn_Actualizar_Proyecto_b" onclick="Btn_Actualizar_Proyecto()" style="display: none;" class="btn btn-warning" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Actualizar Proyecto</span>
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

    <div class="modal fade" id="kt_modal_Actividad_Edit" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header_edit">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Actualizar Actividad</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1 btn_close_mo_3"">
                            <svg xmlns=" http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                <label class="required fw-bold fs-6 mb-2">Estado</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select id="ACTV_ACT_ESTADO" class="form-select form-select-solid" data-placeholder="Select option" data-allow-clear="true">
                                    <option value="1">Revision</option>
                                    <option value="2">En Progreso</option>
                                    <option value="3">Terminado</option>
                                </select>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Nombre De la Actividad</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" id="ACT_Nombre_edit" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre" required />
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Responsable</label>
                                <!--end::Label-->
                                <select id="ACT_Responsable_edit" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Responsable" name="target_assign" required>
                                    <option value=""></option>
                                    <?php
                                    foreach ($this->resp as $row) {
                                    ?>
                                        <option value=<?php echo ($row["US_ID"]); ?>><?php echo ($row["US_APELLNOM"]); ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>


                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Progreso Responsable</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div id="slider"></div>
                                <br>
                                <span id="slider1-span"></span>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Progreso Surpevisor</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div disable id="slider_2"></div>
                                <br>
                                <span id="slider2-span"></span>
                                <!--end::Input-->
                            </div>


                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">

                            <button onclick="Btn_Actualizar_Actividad()" class="btn btn-primary" data-kt-users-modal-action="submit">
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

    <?php require 'views/footer.php'; ?>
    <?php require 'funciones/poajs.php'; ?>
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

    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>public/assets/css/nouislider.min.css">
    <script src="<?php echo constant('URL') ?>public/assets/js/nouislider.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.select23').select2({
            dropdownParent: $('#kt_modal_Nuevo_Proyecto')
        });

        $('.select_Filter').select2({
            // dropdownParent: $('#kt_modal_Nuevo_Proyecto')
        });

        var TARGET_ID;
        dragula([document.getElementById('Pr_En_Revision'), document.getElementById('Pr_En_Progreso'), document.getElementById('Pr_Terminados')], {
            revertOnSpill: true,
            accepts: function(el, target, source, sibling) {
                //console.log(el);
                // TARGET_ID = target.id
                // Actualizar_Arrastrando();
                // console.log(source);
                // console.log(sibling);
                return true; // elements can be dropped in any of the `containers` by default
            },
            moves: function(el, source, handle, sibling) {
                // TARGET_ID = source.id
                // Actualizar_Arrastrando();
                return true; // elements are always draggable by default
            }
        }).on('drop', function(el, source) {
            console.log("droppp", source.id);
            // if ($('drop-target').children.length > 0) {
            // $('display').innerHTML = $('drop-target').innerHTML;
            // } else {
            // $('display').innerHTML = "Display";
            // }
            TARGET_ID = source.id
            Actualizar_Arrastrando();

        });
        /**
         * OBTENEMOS LOS CRITERIOS AL PRESIONAR EL BOTON DE CADA PERSPECTIVA
         * */
        function Btn_Perspectivas(id, nombre) {
            Get_Criterios(id, nombre);
        }
        Get_Criterios(1, "Direccion");

        var tipo_us = '<?php echo $TIPOUS_ID ?>';
        if (tipo_us == 1) {
            Get_Poa();

        } else if (tipo_us == 4) {
            var are = '<?php echo $AREA_ID ?>';
            POA_FILTRAR_DEPTS(are);
        }


        $(document).ready(function() {
            $(this).scrollTop(0);
        });

        /***BOTON PARA REGRESAR A LA LISTA DE PROYECTOS */
        function Back_to_proyects() {
            $("#Seccion_Proyectos").show(100);
            $("#Seccion_Proyectos_Detalle").hide(100);
            $("#Pr_En_Revision").empty();
            $("#Pr_En_Progreso").empty();
            $("#Pr_Terminados").empty();

            $("#Seccion_Perspectivas").show(100);
            $("#Seccion_Perspectivas").show(100);


            $('html, body').animate({
                scrollTop: $("#Seccion_Proyectos").offset().top
            }, 1000);
        }

        $(".btn_close_mo").click(function() {
            $("#kt_modal_add_user").modal('hide');
        });

        $(".btn_close_mo_2").click(function() {
            $("#kt_modal_Nuevo_Proyecto").modal('hide');
            $("#PRY_Nombre").val("");
            $("#PRY_Meta2022").val("");
            $("#PRY_Meta2023").val("");
            $("#PRY_Meta2024").val("");
            $("#PRY_Meta2025").val("");
            $("#PRY_Meta2026").val("");
            $("#PRY_Meta2027").val("");
            $("#PRY_Meta2028").val("");
            $("#PRY_Meta2029").val("");
            $("#PRY_Meta2030").val("");
            $("#PRY_Responsable").val(0).change();
            // $("#PRY_indicador").val(0).change();
            $("#PRY_indicador").val("");

        });
        $(".btn_close_mo_3").click(function() {
            $("#kt_modal_Actividad_Edit").modal('hide');
        });

        $(".btn_close_perspectiva").click(function() {
            $("#kt_modal_add_Perspectiva").modal('hide');
        });

        /**DATE PICKER NUEVA ACTIVIDAD */
        var FECHA;
        $('#datepicker2').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            minDate: moment().add(1, "day"),
            // maxDate: moment(),
            "drops": "up",

        }, function(start, end, label) {
            FECHA = start.format('YYYY-MM-DD')
        });

        function Btn_Nueva_Actividad() {
            if (FECHA == undefined) {
                FECHA = moment().add(1, "day").format("YYYY-MM-DD");
            }

            Nueva_Actividad(FECHA);
        }

        function Btn_Nuevo_Proyecto() {

            Nuevo_Proyecto();
        }

        function Btn_Actualizar_Actividad() {
            Actualizar_Actividad();
        }

        function BTN_Filtrar_pry(id) {

            PRY_filtrar_Proyectos_Estado(id);
        }

        function Btn_Nueva_Perspectiva() {
            Nueva_Perspectiva();
        }

        function Btn_Actualizar_Proyecto() {
            Actualizar_Proyecto();
        }

        var TIPOUS_ID = '<?php echo $TIPOUS_ID ?>';
    </script>