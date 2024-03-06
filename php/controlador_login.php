<?php
session_start();
if(!empty($_POST["btningresar"])){
    if (!empty($_POST["usuario"]) && !empty($_POST["clave"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["clave"];
        $sql = $conexion->query("SELECT *FROM registros WHERE usuario='$usuario' AND clave='$password'");
        if ($datos=$sql->fetch_object()) {
            $_SESSION["id"]=$datos->id_usuario;
            $_SESSION["usuario"]=$datos->usuario;
            $_SESSION["nombre"]=$datos->nombre;
            header("Location: home.php");
        } else{
            echo "<div class='alert alert-danger' role='alert'>
                    Datos incorrectos, usuario y/o contraseña incorrecta!
                </div>";
        }
        
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                No ingresaste ningún dato, como quieres iniciar sesión!
            </div>";
    }
    
}

?>