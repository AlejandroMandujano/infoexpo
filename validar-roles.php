<?php
    include('php/basedatos.php');
    session_start();

    $session = $_SESSION['cliente'];
    $datos = mysqli_query($conn, "SELECT * FROM usuario WHERE email ='$session'");
    while($consulta = mysqli_fetch_array($datos)){
        $rol = $consulta['tipo_usuario'];

    }

    if($rol == 1){
        header("Location: admin/panel_admin.php");
    }elseif($rol == 2){
        header("Location: invitado/panel_invitado.php");
    }

?>