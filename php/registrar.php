<?php $conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'roles'
) or die(mysqli_erro($mysqli)); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Document</title>
</head>
<body>
<form action="validar-registro.php" method="post" onsubmit="return validarFormulario()">
		<div class="container">
			<div class="container-login">
				<div class="wrap-login">
					<form class="login-form">
						<span class="login-form-title">
							Registrarse
						</span>
						<h1></h1>
						<div class="wrap-input margin-top-35 margin-bottom-35">
							<input class="input-form" type="text" name="nombre" autocomplete="off">
							<span class="focus-input-form" data-placeholder="Nombre"></span>
						</div>
	
						<div class="wrap-input margin-bottom-35">
							<input class="input-form" type="text" name="apellidoPaterno">
							<span class="focus-input-form" data-placeholder="Apellido Paterno"></span>
						</div>

                        <div class="wrap-input margin-top-35 margin-bottom-35">
							<input class="input-form" type="text" name="apellidoMaterno" autocomplete="off">
							<span class="focus-input-form" data-placeholder="Apellido Materno"></span>
						</div>
	
						<div class="wrap-input margin-bottom-35">
							<input class="input-form" type="text" name="telefono">
							<span class="focus-input-form" data-placeholder="Telefono"></span>
						</div>

                        <div class="wrap-input margin-top-35 margin-bottom-35">
							<input class="input-form" type="date" name="fechaNacimiento" autocomplete="off">
							<span class="focus-input-form" data-placeholder="Fecha Nacimiento"></span>
						</div>
	
						<div class="wrap-input margin-bottom-35">
							<input class="input-form" type="email" name="email">
							<span class="focus-input-form" data-placeholder="Email"></span>
						</div>

                        <div class="wrap-input margin-bottom-35">
							<input class="input-form" type="password" name="clave">
							<span class="focus-input-form" data-placeholder="Contraseña"></span>
						</div>

                        <div class="wrap-input margin-bottom-35">
							<input class="input-form" type="password" name="confirmaClave">
							<span class="focus-input-form" data-placeholder="Confirma contraseña"></span>
						</div>

                        <div class="wrap-input margin-bottom-35">
            <select class="form-control" aria-label="Default select example" name="tipo_usuario" required>
                <option selected value="">Tipo usuario</option>
                <?php
                  $variale = mysqli_query($conn, "SELECT * FROM tipo_usuario");
                  while($tipo_usuario = mysqli_fetch_row($variale)){
                ?>
                <option value="<?php echo $tipo_usuario[0] ?>"><?php echo $tipo_usuario[1]?></option>
                <?php } ?>
            </select>
          </div>
	
						<div class="container-login-form-btn">
							<input type="submit" value="Registrarse" name="btnregistrar" class="login-form-btn">
						</div>
				
					</form>
				</div>
				<img src="../images/gatito.webp" width="300" height="300" class="margin-left-50" alt="No hay vista previa"/>
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

        function validarFormulario() {
            var clave = document.getElementById('clave').value;
            var confirmaClave = document.getElementById('confirmaClave').value;

            if (clave !== confirmaClave) {
                alert('Las contraseñas no coinciden');
                return false; // Evita que se envíe el formulario
            }

            return true; // Permite que se envíe el formulario
        }
	</script>
</body>
</html>