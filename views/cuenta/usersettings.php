<?php

require 'views/header.php';
$data = $this->User_data;

$nombre = $data[0]["US_APELLNOM"];
$acceso = $data[0]["TIPOUS_ID"];
$cedula = $data[0]["US_NCED"];
$telefono = $data[0]["US_CEL"];
$ciudad = $data[0]["CIUDAD_NOM"];
$ciudad_id = $data[0]["CIUDAD_ID"];
$email = $data[0]["US_EMAIL"];
$TipoUSNom = $data[0]["TIPOUS_NOM"];

?>
<?php require 'funciones/perfilusuariosjs.php'; ?>

<div class="row gy-5 g-xl-8">
	<!--begin::Col-->
	<div class="col-xl-12">
		<?php require 'usuariocard.php'; ?>


		<div class="card mb-5 mb-xl-10">
			<!--begin::Card header-->
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
				<!--begin::Card title-->
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Detalles del perfil</h3>
				</div>
				<!--end::Card title-->
			</div>
			<!--begin::Card header-->
			<!--begin::Content-->
			<div id="kt_account_settings_profile_details" class="collapse show">
				<!--begin::Form-->
				<form id="kt_account_profile_details_form" id="formDatos" class="form" onsubmit="return false">
					<!--begin::Card body-->
					<div class="card-body border-top p-9">
						<!--begin::Input group-->

						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label required fw-bold fs-6">Nombre</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<!--begin::Row-->
								<div class="row">
									<!--begin::Col-->
									<div class="col-lg-12 fv-row">
										<input type="text" id="Txt_Set_name" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nombre Completo" value="<?php echo $nombre ?>" required />
									</div>

								</div>
								<!--end::Row-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->

						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-bold fs-6">
								<span class="required">Cedula</span>
							</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
								<input id="Txt_Set_Cedula" type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Cedula" value="<?php echo $cedula ?>" />
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-bold fs-6">Celular</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
								<input id="Txt_Set_celular" type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Celular" value="<?php echo $telefono ?>" />
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-bold fs-6">
								<span class="required">Ciudad</span>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Ciudad"></i>
							</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
								<select id="Txt_Set_user_ciudad" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una ciudad" name="target_assign" required>
									<option value="<?php echo $ciudad_id ?>" selected><?php echo $ciudad ?></option>

									<?php
									foreach ($this->ciud as $row) {
										if ($row["CIUDAD_ID"] != $ciudad_id) {


									?>
											<option value=<?php echo ($row["CIUDAD_ID"]); ?>><?php echo ($row["CIUDAD_NOM"]); ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<!--end::Col-->
						</div>
						<div class="row mb-6">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-bold fs-6">Tipo de Usuario
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Para cambiar el tipo de acceso consulte con un administrador"></i>

							</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
								<input type="text" name="website" class="form-control form-control-lg form-control-solid" value="<?php echo $TipoUSNom ?>" readonly />
							</div>
							<!--end::Col-->
						</div>

					</div>
					<!--end::Card body-->
					<!--begin::Actions-->
					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<button type="reset" class="btn btn-light btn-active-light-primary me-2">Decartar</button>
						<button onclick="BtnActualizarDatos()" type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Guardar Cambios</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Content-->
		</div>

		<div class="card mb-5 mb-xl-10">
			<!--begin::Card header-->
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Sign-in Method</h3>
				</div>
			</div>
			<!--end::Card header-->
			<!--begin::Content-->
			<div id="kt_account_settings_signin_method" class="collapse show">
				<!--begin::Card body-->
				<div class="card-body border-top p-9">
					<!--begin::Email Address-->
					<div class="d-flex flex-wrap align-items-center">
						<div id="kt_signin_email">
							<div class="fs-6 fw-bolder mb-1">Direccion de correo</div>
							<div class="fw-bold text-gray-600"><?php echo $email ?></div>
						</div>
						<div id="kt_signin_email_edit" class="flex-row-fluid d-none">
							<form id="kt_signin_change_email" class="form" novalidate="novalidate" onsubmit="return false">
								<div class="row mb-6">
									<div class="col-lg-6 mb-4 mb-lg-0">
										<div class="fv-row mb-0">
											<label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Ingresar Nuevo Email</label>
											<input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="emailaddress" value="<?php echo $email ?>" />
										</div>
									</div>
									<div class="col-lg-6">
										<div class="fv-row mb-0">
											<label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Confirmar Password</label>
											<input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
										</div>
									</div>
								</div>
								<div class="d-flex">
									<button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Actualizar Email</button>
									<button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
								</div>
							</form>
						</div>
						<div id="kt_signin_email_button" class="ms-auto">
							<button style="display: none;" class="btn btn-light btn-active-light-primary">Cambiar Email</button>
						</div>
					</div>
					<div class="separator separator-dashed my-6"></div>
					<!--end::Separator-->
					<!--begin::Password-->
					<div class="d-flex flex-wrap align-items-center mb-10">
						<!--begin::Label-->
						<div id="kt_signin_password">
							<div class="fs-6 fw-bolder mb-1">Password</div>
							<div class="fw-bold text-gray-600">************</div>
						</div>
						<!--end::Label-->
						<!--begin::Edit-->
						<div id="kt_signin_password_edit" class="flex-row-fluid" style="display: none;">
							<!--begin::Form-->
							<form id="kt_signin_change_password" class="form" onsubmit="return false">
								<div class="row mb-1">
									<div class="col-lg-4">
										<div class="fv-row mb-0">
											<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Password Actual</label>
											<input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" required />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="fv-row mb-0">
											<label for="newpassword" class="form-label fs-6 fw-bolder mb-3">Nuevo Password</label>
											<input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" required />
										</div>
									</div>
									<div class="col-lg-4">
										<div class="fv-row mb-0">
											<label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirmar Nuevo Password</label>
											<input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" required />
										</div>
									</div>
								</div>
								<div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
								<div class="d-flex">
									<button onclick="BtnActualizarPAss()" id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Actualizar Password</button>
									<button onclick="cancel()" id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
								</div>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Edit-->
						<!--begin::Action-->
						<div id="kt_signin_password_button" class="ms-auto">
							<button onclick="ShowPassIn()" class="btn btn-light btn-active-light-primary">Cambiar Password</button>
						</div>
						<!--end::Action-->
					</div>
					<!--end::Password-->
					<!--begin::Notice-->

					<!--end::Notice-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Content-->
		</div>
	</div>

</div>

<?php require 'views/footer.php'; ?>
<!-- <script src="<?php echo constant('URL') ?>public/assets/js/custom/account/settings/signin-methods.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
	$("#formDatos").validate();
	$("#kt_signin_change_password").validate();

	$("#ovw").removeClass("active");
	$("#set").addClass("active");


	function BtnActualizarDatos() {

		Validar_Actualizacion_datos();
	}

	function BtnActualizarPAss() {
		Validar_Actualizar_Contrasena();
	}

	function ShowPassIn() {
		$("#kt_signin_password").hide();
		$("#kt_signin_password_edit").show();
		$("#kt_signin_password_button").hide();

	}

	function cancel() {

		$("#kt_signin_password").show();
		$("#kt_signin_password_edit").hide();
		$("#kt_signin_password_button").show();

	}
</script>