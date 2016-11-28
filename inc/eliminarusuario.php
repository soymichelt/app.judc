<?php
  require('conexion.php');
  $mysqli->set_charset("utf8");
  $userID=$_GET['id'];

  $consulta="DELETE FROM usuarios WHERE userID=".$userID;
  $resultado=$mysqli->query($consulta);
  if($resultado)
  {
  	header("Location: ../usuarios.php");
  }
  else
  {
  	echo "error";
  }
  exit();
?>