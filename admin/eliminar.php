<?php

session_start();
if(empty($_SESSION["cliente"])){
    header("Location: ./../login.php");
}else{
    include("./../php/res-admin.php");
}

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM usuario WHERE id_usuario = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Algo ha pasado, verifique....");
  }

  $_SESSION['message'] = 'Visiante eliminado eliminado !!!';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
