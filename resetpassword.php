<?php

include_once("./utils/reset.php");

$res = new Reset();

$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$u = "$_SERVER[HTTP_HOST]";
define('URLR', 'http://' . $u . '/solca/'); // ip local:puerto

if (isset($_POST["email"])) {
	$email = $_POST["email"];
	if ($email == "") {
	} else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "verifique que haya ingresado un correo valido";
		} else {
			$res->res();
			echo ($email);
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../../">
	<title>Recuperar contraseña</title>
	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?php echo constant('URLR') ?>public/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo constant('URLR') ?>public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Password reset -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="../../demo1/dist/index.html" class="mb-12">
					<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<!--begin::Form-->
					<form class="form w-100" action="" novalidate="novalidate" id="kt_password_reset_form" method="POST">
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Forgot Password ?</h1>
							<!--end::Title-->
							<!--begin::Link-->
							<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
							<!--end::Link-->
						</div>
						<!--begin::Heading-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
							<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
							<?php
							if (isset($emailErr)) {
								echo '<span class="text-danger">';
								echo $emailErr . "<br>";
								echo ' </span>';
							}
							?>
						</div>
						<!--end::Input group-->
						<!--begin::Actions-->
						<div class="d-flex flex-wrap justify-content-center pb-lg-0">
							<button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
								<span class="indicator-label">Submit</span>
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
			<!--begin::Footer-->
			<div class="d-flex flex-center flex-column-auto p-10">
				<!--begin::Links-->
				<div class="d-flex align-items-center fw-bold fs-6">
					<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
					<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
					<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
				</div>
				<!--end::Links-->
			</div>
			<!--end::Footer-->
		</div>
		<!--end::Authentication - Password reset-->
	</div>
	<!--end::Root-->
	<!--end::Main-->
	<!--begin::Javascript-->
	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="<?php echo constant('URLR') ?>public/assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo constant('URLR') ?>public/assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<!-- <script src="<?php echo constant('URLR') ?>public/assets/js/custom/authentication/password-reset/password-reset.js"></script> -->
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>