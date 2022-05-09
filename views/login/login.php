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
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-5 pb-lg-5 bg-light">
                <!--begin::Logo-->
                <a href="#" class="mb-5">

                    <img alt="Logo" src="<?php echo constant('URL') ?>public/assets/images/log2.png" class="h-150px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="<?php echo constant('URL') ?>" method="POST">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
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
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <!-- <a name="rset" href="resetpassword.php" class="link-primary fs-6 fw-bolder">recuperar contraseña ?</a> -->

                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
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
            <!--end::Content-->
            <!--begin::Footer-->
            <!-- <div class="d-flex flex-center flex-column-auto p-10">
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
						<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
				</div> -->
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
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
        $( "#email" ).focus();
        function reset() {
            window.location.href = "./resetpassword.php";

        }
    </script>

    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>