<?php
include("basedatos.php");
$session = $_SESSION['cliente'];

$datos = mysqli_query($conn, "SELECT * FROM usuario WHERE email ='$session'");
    while($consulta = mysqli_fetch_array($datos)){
        $rol = $consulta['tipo_usuario'];

    }

    if($rol == 2){
        echo'
            <script>
                alert("A donde vas!!! \nNo tienes acceso");
                location.href = "./../invitado/panel_invitado.php";
            </script>
        ';
        die();
    }/*
    else{
        echo'
        <script>    
            alert("No hay categorias!!!");
            location.href = "./../login.php";
        </script>
    ';
        die();
    }*/


?>