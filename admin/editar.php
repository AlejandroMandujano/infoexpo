<?php
session_start();
if(empty($_SESSION["cliente"])){
}else{
    include("./../php/res-admin.php");
}

include("db.php");
$nombre = '';
$apellido_paterno = '';
$apellido_materno = '';
$correo = '';
$clave = '';
$tipo_usuario = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuario WHERE id_usuario=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido_paterno = $row['apellido_paterno'];
    $apellido_materno = $row['apellido_materno'];
    $correo = $row['email'];
    $clave = $row['clave'];
    $tipo_usuario = $row['tipo_usuario'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $apellido_materno = $_POST['apellido_materno'];
  $correo = $_POST['email'];
  $clave = $_POST['clave'];
  $tipo_usuario = $_POST['tipo_usuario'];

  $query = "UPDATE usuario set nombre = '$nombre ', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', email = '$correo', clave = '$clave', tipo_usuario = '$tipo_usuario'
                  WHERE id_usuario=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Visitante modificado correctamente !!';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" placeholder="Nombre" value="<?php echo $nombre; ?>">
        </div>
        <div class="form-group">
          <input name="apellido_paterno" type="text" class="form-control" placeholder="Apellido Paterno" value="<?php echo $apellido_paterno; ?>">
        </div>  
        <div class="form-group">
            <input type="text" name="apellido_materno" class="form-control" placeholder="Apellido Materno" autofocus value="<?php echo $apellido_materno; ?>">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Usuario" autofocus value="<?php echo $correo; ?>">
          </div>
          <div class="form-group">
            <input type="text" name="clave" class="form-control" placeholder="Contraseña" autofocus value="<?php echo $clave; ?>">
          </div>
          <div class="form-group">
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
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
