<?php
    include ('basedatos.php');




    if(!empty($_POST["enviar"])){
      if(!empty($_POST["nombre_publicador"]) && !empty($_POST["apellidos_publicador"]) && !empty($_POST["correo_publicador"]) && !empty($_POST["cont_comentario"])){
        $nombre = $_POST['nombre_publicador'];
        $apellidos = $_POST['apellidos_publicador'];
        $correo = $_POST['correo_publicador'];
        $comentario = $_POST['cont_comentario'];
        $query = "INSERT INTO comentario (nombre_publicador, apellidos_publicador, correo_publicador, cont_comentario) 
                              VALUES ('$nombre', '$apellidos', '$correo', '$comentario')";
        $result = mysqli_query($conn, $query);
        if(!$result) {
          die("Algo fallo... Sorry");
        }
        
        header('Location: ./../blog/entradas/bpm.php');
        
      } else{
        echo "<div class='alert alert-danger' role='alert'>
                No ingresaste ningún dato, como quieres iniciar sesión!
            </div>";
      }

    }











































    /*if (empty($_POST['enviar'])) {
        
      
      }else{
        echo '<script>
                alert("Ingresa algo");
                window.location.replace("../blog/entradas/bpm.php");
            </script>';
      }*/
?>