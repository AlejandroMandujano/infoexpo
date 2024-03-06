<?php 
if(empty($_SESSION["cliente"])){
    header("Location: ./../login.php");
}else{
    include("./../php/res-admin.php");
}

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'roles'
) or die(mysqli_erro($mysqli));

?>
