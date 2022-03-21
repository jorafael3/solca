<?php

require 'views/header.php';
$data = $this->User_data;

$nombre = $data[0]["US_APELLNOM"];
$acceso = $data[0]["TIPOUS_ID"];
$cedula = $data[0]["US_NCED"];
$telefono = $data[0]["US_CEL"];
$ciudad = $data[0]["CIUDAD_NOM"];
$email = $data[0]["US_EMAIL"];

?>
<?php require 'funciones/perfilusuariosjs.php'; ?>

<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">

        <?php require 'usuariocard.php'; ?>

        <!--end::Navbar-->
        <!--begin::details View-->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Detalles del Perfil</h3>
                </div>
                <!--end::Card title-->
                <!--begin::Action-->
                <a href="<?php echo constant("URL")?>cuenta/Ajustes_usuario" class="btn btn-primary align-self-center">Editar Perfil</a>
                <!--end::Action-->
            </div>
            <!--begin::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Row-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Nombre</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span id="Txt_ovw_nombre" class="fw-bolder fs-6 text-gray-800"><?php echo $nombre ?></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Correo</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <span id="Txt_ovw_mail" class="fw-bold text-gray-800 fs-6"><?php echo $email ?></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Cedula</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 d-flex align-items-center">
                        <span id="Txt_ovw_dni" class="fw-bolder fs-6 text-gray-800 me-2"><?php echo $cedula ?></span>
                        <!-- <span class="badge badge-success">Verified</span> -->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Telefono
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Telefono activo"></i></label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span id="Txt_ovw_telf" class="fw-bolder fs-6 text-gray-800 me-2"><?php echo $telefono ?></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Ciudad
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Ciudad de origen"></i></label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span id="Txt_ovw_city" class="fw-bolder fs-6 text-gray-800"><?php echo $ciudad ?></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <!-- <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Communication</label>
                 
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800">Email, Phone</span>
                    </div>
                </div>
                <div class="row mb-10">
                    <label class="col-lg-4 fw-bold text-muted">Allow Changes</label>
                    <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800">Yes</span>
                    </div>
                </div> -->
                <!--end::Input group-->
                <!--begin::Notice-->
                <!-- <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                        </svg>
                    </span>

                    <div class="d-flex flex-stack flex-grow-1">
                        <div class="fw-bold">
                            <h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
                            <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
                                <a class="fw-bolder" href="../../demo1/dist/account/billing.html">Add Payment Method</a>.
                            </div>
                        </div>
                    </div>

                </div> -->
                <!--end::Notice-->
            </div>
            <!--end::Card body-->
        </div>

    </div>
</div>


<?php require 'views/footer.php'; ?>

<script>
	$("#set").removeClass("active");
    $("#ovw").addClass("active");
</script>