<?php
  
  require('conexion.php');
  $mysqli->set_charset("utf8");
// Subida de archivo nuevo ///
 // $trabajoID=$_POST['trabajoID'];
  $Nombre=$_POST['Nombre'];
  $Descripcion=$_POST['Descripcion'];
  $coordinador=$_POST['coordinador'];
  $enlace=$_POST['enlace'];
  $local=$_POST['local'];

  // $pdf=$_POST['pdf'];

  $consulta= "INSERT INTO salas(Nombre, Descripcion, coordinador, enlace, local) 
              VALUES ('$Nombre','$Descripcion','$coordinador','$enlace','$local')";
  // $consul="INSERT INTO salas(nombresala) VALUES ('$nombresala')";
  echo $consulta;
  $resultado=$mysqli->query($consulta);
  if($resultado){
    //header("Location: ver.php");
    header("Location: ../Sala.php?Id=".$mysqli->insert_id);

  }
  else{
    echo "No guardado";
  }
  exit(); 
?>