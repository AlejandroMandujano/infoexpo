<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
	<form action="php/validar-login.php" method="post">
		<div class="container">
			<div class="container-login">
				<div class="wrap-login">
					<form class="login-form">
						<span class="login-form-title">
							Bienvenido
						</span>
						<h1></h1>
						<div class="wrap-input margin-top-35 margin-bottom-35">
							<input class="input-form" type="email" name="usuario" autocomplete="off">
							<span class="focus-input-form" data-placeholder="Email"></span>
						</div>
	
						<div class="wrap-input margin-bottom-35">
							<input class="input-form" type="password" name="clave">
							<span class="focus-input-form" data-placeholder="Contraseña"></span>
						</div>
	
						<div class="container-login-form-btn">
							<input type="submit" value="Iniciar sesión" name="btningresar" class="login-form-btn">
						</div>
						<div class="container-login-form-btn" style="padding-top: 10px;">
							<div class="login-form-btn">
								<a href="php/registrar.php">Registrarse</a>
							</div>
						</div>
					</form>
				</div>
				<img src="images/gatito.webp" width="300" height="300" class="margin-left-50" />
			</div>
		</div>
	</form>

	<script>
		let inputs = document.getElementsByClassName('input-form');
		for (let input of inputs) {
			input.addEventListener("blur", function() {
				if(input.value.trim() != ""){
					input.classList.add("has-val");
				} else {
					input.classList.remove("has-val");
				}
			});
		}
	</script>
</body>
</html>