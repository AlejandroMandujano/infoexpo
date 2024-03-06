<?php
session_start();
if(empty($_SESSION["cliente"])){
    header("Location: ./../login.php");
}else{
    include("./../php/res-admin.php");
}

?>


<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-3">
  <div class="row">
    <div class="col-md-9">
      <table class="table table-bordered" border="1">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Telefono</th>
            <th>Fecha Nacimiento</th>
            <th>Correo</th>
            <th>Tipo Usuario</th>
            <th>Aciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT u.id_usuario, u.nombre, u.apellido_paterno, u.apellido_materno, u.telefono, u.fechaNacimento, u.email, tu.nombre_Tipo tipo_usuario
                      FROM usuario u
                      join tipo_usuario tu on u.tipo_usuario = tu.tipo_usuario";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id_usuario']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido_paterno']; ?></td>
            <td><?php echo $row['apellido_materno']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['fechaNacimento']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['tipo_usuario']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id_usuario']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['id_usuario']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div>
    <a href="../php/cerrar.php">Cerrar Sesion</a>
  </div>
  <div>
    <a href="panel_admin.php">Panel de control</a>
  </div>
  
</main>

<?php include('includes/footer.php'); ?>
