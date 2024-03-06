<?php
    include('basedatos.php');
    if(isset($_POST['btnregistrar'])){
        $clave =  $_POST['clave'];
        $confirmaClave =  $_POST['confirmaClave'];
        echo strlen($clave);
        if($confirmaClave == $clave){
            if(strlen($clave) >= 8){
                $nombre =  $_POST['nombre'];
                $apellidoPaterno =  $_POST['apellidoPaterno'];
                $apellidoMaterno =  $_POST['apellidoMaterno'];
                $telefono =  $_POST['telefono'];
                $fechaNacimiento =  $_POST['fechaNacimiento'];
                $email =  $_POST['email'];
                $clave =  $_POST['clave'];
                $tipo_usuario = $_POST['tipo_usuario'];
                $query = "INSERT INTO usuario (id_usuario, nombre, apellido_paterno, apellido_materno, telefono, fechaNacimento, email, clave, tipo_usuario) 
                                        VALUES (NULL, '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$telefono', '$fechaNacimiento', '$email', '$clave', '$tipo_usuario')";
                $result = mysqli_query($conn, $query);
                if(!$result) {
                    die("Algo fallo... Sorry");
                }
    
                header('Location: ../login.php');
                }
                else{
                    echo'
                        <script>
                            alert("Las contraseñas deben de ser mayor a 8 caracteres");
                            location.href = "registrar.php";
                        </script>
                    ';
                }
            }else{
                echo'
                <script>
                    alert("Las contraseñas deben de ser iguales... Verifica");
                    location.href = "registrar.php";
                </script>
            ';
            }
            
    }else{
        echo ("Datos del formulario vacios, verifique");
    }
?>