<?php
  require('conexion.php');

  $trabajoID=$_GET['id'];

  $consulta="DELETE FROM trabajos WHERE trabajoID=".$trabajoID;
  $resultado=$mysqli->query($consulta);
  if($resultado)
  {
  	header("Location: ../index.php");
  }
  else
  {
  	echo "error";
  }
  exit();
?>