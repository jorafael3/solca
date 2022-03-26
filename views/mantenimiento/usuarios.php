<?php

require 'views/header.php';


?>

<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Mixed Widget 2-->
        <div class="card">
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Agregar Usuario
                    </button>
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">

                </div>
                <!--end::Card toolbar-->
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table style="width: 100%; font-weight: bold; font-size: 16px;" id="TablaUsuarios" class="table table-striped table-hover table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead class="border-gray-200 fs-5 fw-bold bg-lighten">

                        </thead>
                        <tbody class="fw-6 fw-bold text-gray-600">

                        </tbody>
                    </table>
                </div>

            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 2-->
    </div>

</div>


<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Agregar Usuario</h2>
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
                <form id="form" onsubmit="return false">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <!-- <label class="d-block fw-bold fs-6 mb-5">Foto</label> -->

                            <!-- <div class="image-input image-input-outline" data-kt-image-input="true" style="
                                        background-image: url('assets/media/svg/avatars/blank.svg');
                                      ">
                                <div class="image-input-wrapper w-125px h-125px" style="
                                          background-image: url(assets/media/avatars/300-6.jpg);
                                        "></div>
                               
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                              
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                               
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div> -->
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <!-- <div class="form-text">
                                Allowed file types: png, jpg, jpeg.
                            </div> -->
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Nombre Completo</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="user_name" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nombre Completo" required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" id="user_email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" required />
                            <!--end::Input-->
                        </div>

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Cedula</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="user_Cedula" name="user_Cedula" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Cedula" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Celular</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="user_Celular" name="user_Celular" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Celular" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Ciudad</label>
                            <select id="user_ciudad" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una ciudad" name="target_assign" required>
                                <option value=""></option>

                                <?php
                                foreach ($this->ciud as $row) {
                                ?>
                                    <option value=<?php echo ($row["CIUDAD_ID"]); ?>><?php echo ($row["CIUDAD_NOM"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-5">Roles</label>
                            <!--end::Label-->
                            <!--begin::Roles-->
                            <!--begin::Input row-->

                            <?php
                            foreach ($this->tip_usu as $row) {

                            ?>
                                <div class="d-flex fv-row">


                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="<?php echo ($row["TIPOUS_ID"]); ?>" id="kt_modal_update_role_option_<?php echo ($row["TIPOUS_ID"]); ?>" checked="checked" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_update_role_option_0">
                                            <div class="fw-bolder text-gray-800">
                                            <?php echo ($row["TIPOUS_NOM"]); ?>
                                            </div>

                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Input row-->
                                <div class="separator separator-dashed my-5"></div>
                            <?php
                            }
                            ?>

                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Contraseña</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="password" id="user_Contrasena" name="user_Contrasena" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Contraseña" required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button id="BtnReset" type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                            Discard
                        </button>
                        <button onclick="BtnNueoUSuario()" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
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
<?php require 'funciones/usuariosjs.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/datatables.min.css" />


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="<?php echo constant("URL") ?>public/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?php echo constant("URL") ?>public/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="<?php echo constant("URL") ?>public/assets/js/custom/utilities/modals/users-search.js"></script>
<script>
    $(".btn_close_mo").click(function() {
        $("#kt_modal_add_user").modal('hide');
    });
    $("#form").validate();

    function BtnNueoUSuario() {
        validarNUevoUsuario();
    }

    ListarUsuarios();



    function btn() {

        var data = {
            id: "asd",
            num: 3
        }

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                data = JSON.parse(data);
                console.log(data);
            }
        }

        data = JSON.stringify(data);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);

    }
</script>