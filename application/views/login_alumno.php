<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V14</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="lib/login-theme/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login-theme/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login-theme/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login-theme/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login-theme/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lib/login-theme/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login-theme/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login-theme/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lib/login-theme/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/login-theme/css/util.css">
	<link rel="stylesheet" type="text/css" href="lib/login-theme/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<?php
				$attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
				echo form_open("login_alumno/index", $attributes);?>
				<form class="login100-form validate-form flex-sb flex-w" accept-charset="UTF-8" action="" role="form" method="post">
					<span class="login100-form-title p-b-32">
						Ingreso alumno
					</span>

					<span class="txt1 p-b-11">
						Correo electrónico
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Ingresa un correo">
						<input class="input100" type="email" name="txt_username" id="txt_username" value="<?php echo set_value('txt_username'); ?>" required="true">
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Contraseña
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Ingresa una contraseña">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="txt_password" id="txt_password" value="<?php echo set_value('txt_password'); ?>" required="true">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Recordar
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								¿Olvidaste contraseña?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="btn_login" name="btn_login" type="submit" value="Login">
							Ingresar
						</button>
					</div>

				</form>
				<?php echo form_close(); ?>
				<div class="row"> <p style="color:white;">.</p> </div>
				<?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="lib/login-theme/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/login-theme/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/login-theme/vendor/bootstrap/js/popper.js"></script>
	<script src="lib/login-theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/login-theme/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/login-theme/vendor/daterangepicker/moment.min.js"></script>
	<script src="lib/login-theme/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="lib/login-theme/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="lib/login-theme/js/main.js"></script>

</body>
</html>