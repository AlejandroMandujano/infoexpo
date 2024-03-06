<?php 
session_start();
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'roles'
) or die(mysqli_erro($mysqli));

?>
