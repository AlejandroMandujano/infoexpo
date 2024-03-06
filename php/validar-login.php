<?php
    include('basedatos.php');
    $usuario =  $_POST['usuario'];
    $clave =  $_POST['clave'];

    $verificacion = mysqli_query($conn, "SELECT * FROM usuario WHERE email ='$usuario' and clave = '$clave'");

    $fila = mysqli_num_rows($verificacion);

    if ($fila > 0) {
        session_start();
        $_SESSION['cliente'] = $usuario;
        header("Location: ../validar-roles.php");
    } else {
        $verificacionEmail = mysqli_query($conn, "SELECT * FROM usuario WHERE email ='$usuario'");
        $filaEmail = mysqli_num_rows($verificacionEmail);
        $verificacionClave = mysqli_query($conn, "SELECT * FROM usuario WHERE clave ='$clave'");
        $filaClave = mysqli_num_rows($verificacionClave);

        if ($filaEmail === 0 && $filaClave === 0) {
            echo'
                <script>
                    alert("Email y clave incorrectos");
                    location.href = "../login.php";
                </script>
            ';
        } else if ($filaEmail === 0) {
            echo'
                <script>
                    alert("Email incorrecto");
                    location.href = "../login.php";
                </script>
            ';
        } else {
            echo'
                <script>
                    alert("Clave incorrecta");
                    location.href = "../login.php";
                </script>
            ';
        }
    }
?>
