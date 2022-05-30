<!DOCTYPE html>
<html lang="en">

<head>
    <title>Solca</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?php echo constant('URL') ?>public/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo constant('URL') ?>public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo constant('URL') ?>public/assets/css/lg.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Signup Free Trial-->
        <div class="d-flex flex-column flex-xl-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="col-xl-5 col-md-12">
                <!--begin::Content-->
                <div class="d-flex align-items-start flex-column p-3 p-lg-5">
                    <!-- 
                    <h1 class="text-dark fs-2x mb-3">Welcome, Guest!</h1>

                    <div class="fw-bold fs-4 text-gray-400 mb-10">Plan your blog post by choosing a topic creating
                        <br />an outline and checking facts
                    </div> -->

                    <div class="col-12 p-5">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div style="background-color: #27AE60;" class="card-body rounded shadow-sm d-flex flex-center flex-column pt-5 p-3">
                                <div class="symbol symbol-115px symbol-circle mb-1">
                                    <i style="font-size: 45px;" class="fa fa-eye text-light"></i>
                                </div>
                                <a href="#" class="fs-1 text-light text-hover-light fw-bolder mb-0 p-1">Visión del futuro</a>
                                <div class="d-flex flex-center flex-wrap">
                                    <div class="border border-gray-700 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                        <div class="fs-5  text-light">
                                            <span>
                                                Nos vemos al 2022 reconocidos por el estado,
                                                la sociedad ecuatoriana y los pacientes como un
                                                instituto médico oncológico de vanguardia,
                                                eficiente, con atencion sensible y servivios de excelencia.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>

                    <div class="col-12 p-5">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div style="background-color: #2980B9;" class="rounded card-body bg-primary shadow-sm d-flex flex-center flex-column pt-5 p-3">
                                <div class="symbol symbol-115px symbol-circle mb-1">
                                    <i style="font-size: 45px;" class="fa fa-users text-light"></i>
                                </div>
                                <a href="#" class="fs-1 text-light text-hover-light fw-bolder mb-0 p-1">Propósito</a>
                                <div class="d-flex flex-center flex-wrap">
                                    <div class="border border-gray-700 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                        <div class="fs-5  text-light">
                                            <span>
                                                Salvar la mayor cantidad de vidas.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>

                    <div class="col-12 p-5">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div style="background-color: #27AE60;" class="rounded card-body shadow-sm d-flex flex-center flex-column pt-5 p-3">
                                <div class="symbol symbol-115px symbol-circle mb-1">
                                    <i style="font-size: 45px;" class="fa fa-bullseye text-light"></i>
                                </div>
                                <a href="#" class="fs-1 text-light text-hover-light fw-bolder mb-0 p-1">Misión</a>
                                <div class="d-flex flex-center flex-wrap">
                                    <div class="border border-gray-700 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                        <div class="fs-5  text-light">
                                            <span>
                                                Prevenir y detectar precozmente el cáncer y atender a los pacientes oncológicos
                                                de manera oportuna y solicitaria con tecnoloía, tratamientos adecuados
                                                y transparencia de gestión.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>

                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->
            <!--begin::Content-->
            <div class="col-xl-7 col-md-12 flex-row-fluid d-flex flex-center justfiy-content-xl-first p-20">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center p-15 shadow-sm bg-body rounded w-120 w-md-550px mx-auto ms-xl-20">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="<?php echo constant('URL') ?>" method="POST">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <a href="#" class="mb-5">

                                <img alt="Logo" src="<?php echo constant('URL') ?>public/assets/images/log2.png" class="h-150px" />
                            </a>
                            <h1 class="text-dark mb-3">Inicia Sesion</h1>

                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <!--begin::Input-->
                            <input id="email" class="form-control form-control-lg form-control-solid" type="text" name="email" />
                            <!-- <div class="">
                                    <?php
                                    if (isset($errorlogin)) {
                                        echo '<span class="text-danger">';
                                        echo $erroruser . "<br>";
                                        echo ' </span>';
                                    }
                                    ?>
                                </div> -->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <!-- <a name="rset" href="resetpassword.php" class="link-primary fs-6 fw-bolder">recuperar contraseña ?</a> -->

                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
                            <!-- <div class="">
                                        <?php
                                        if (isset($errorlogin)) {
                                            echo '<span class="text-danger">';
                                            echo $errorpass . "<br>";
                                            echo ' </span>';
                                        }
                                        ?>
                                    </div> -->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Iniciar sesion</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Submit button-->
                            <!--begin::Separator-->
                            <div class="text-center text-muted text-uppercase fw-bolder mb-5">

                                <?php
                                if (isset($errorlogin)) {
                                    echo '<div class="alert alert-danger">';
                                    echo $errorlogin . "<br>";
                                    echo ' </div>';
                                }
                                ?>
                            </div>

                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Right Content-->
        </div>
        <!--end::Authentication - Signup Free Trial-->
    </div>



    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="<?php echo constant('URL') ?>public/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo constant('URL') ?>public/assets/js/scripts.bundle.js"></script>


    <script>
        $("#email").focus();

        function reset() {
            window.location.href = "./resetpassword.php";

        }
    </script>

    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>