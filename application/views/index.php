<!DOCTYPE html>
<html>

<head>
    <title>QT Textil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section>
        <div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-6">
					<div class="card border-primary" style="max-width: 30rem;">
						<div class="card-body">
							<?php
								$retornoError = $this->session->flashdata('error');
								if(empty($retornoError)){
									$retornoError = $this->session->flashdata('usuario_incorrecto');
								}
								if ($retornoError) { ?>
									<div class="alert alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
												aria-hidden="true">&times;</span></button>
										<span class="glyphicon glyphicon-exclamation-sign center" aria-hidden="true"></span>
										<?php echo $retornoError; ?>
									</div>
									<?php
								}
							?>
							<hr>
							<div class="form-group text-center">
								<img src="<?php echo './assets/images/LogoMQ.jpg'; ?>" alt="LogoMQ" width="150" height="150" align="center"/>
							</div>
							<h4 style="text-align: center;">v1.0</h4>
							<form id="LoginForm" method="post" action="<?php echo base_url('validar/'); ?>">
								<input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>">
								<div class="form-group">
									<label>Usuario</label>
									<input type="text" name="usuario" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control">
								</div>
								<div class="form-group">
									<label>Ingrese código de seguridad</label>
									<br>
									<div id="captchaImg" class="input-group">
										<?php
											echo $captcha['image'];
										?>
										<input id="codSeg" type="text" name="codSeg" class="form-control" required>
										<button type="button" class="btn btn-primary" onclick="location.reload()">
											<i class="fa fa-refresh text-white"></i>
										</button>
									</div>
								</div>
								<div>
									<ul style="display: flex;justify-content: space-around;">
										<?= create_gcaptcha();?>
										<div class="error"><?= gcaptcha_error();?></div>
									</ul>
								</div>
								<button id="BtnOpen" class="btn btn-primary" style="width:100%;margin:0 auto;">
									<i class="fa fa-sign-in" style="padding-right: 10px;"></i>Ingresar al Sistema
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
	<script>
		$("#codSeg").focus();
		setTimeout("location.reload()", 60000);

		function validarCaptcha() 
		{
			var codigoAsignado = $("#token").val();
			var codigoDigitado = $("#codSeg").val();

			if (codigoAsignado == codigoDigitado) {
				return true;
			}
			else {
				Swal.fire(
					'CONFIRME LA INFORMACIÓN',
					'El código de verificación no coincide.',
					'warning'
				);
				return false;
			}
		}
		
		$("#LoginForm").submit(function (e) {
			e.preventDefault();
			if(validarCaptcha()){
				$("#BtnOpen").attr("disabled",true);
				this.submit();
			}else{
				return false;
			}
		});
	</script>
</body>

</html>