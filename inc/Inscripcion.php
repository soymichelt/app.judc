<?php
  //Si ya ha iniciado sesion
  require("VerifiedSecurity.php");
  $tmp = VerifiedSesion();
  if($tmp == 0) {
    header("Location: Signin.php");
  }



  require('conexion.php');
  if(!isset($_POST['salaID']) || !isset($_POST['tema']) || !isset($_POST['autor1']) || !isset($_POST['tutor1']) || !isset($_POST['asesor1']) || !isset($_POST['jurado1']) || !isset($_POST['jurado2']) || !isset($_POST['anioesc']) || !isset($_POST['tipotrabajo']) || !isset($_POST['departamento']) || !isset($_POST['carrera'])) {
    //header("Location: ../Inscripcion.php");
    echo "error 1";
  }
  else {
    if(empty($_POST['salaID']) || empty($_POST['tema']) || empty($_POST['autor1']) || empty($_POST['tutor1']) || empty($_POST['jurado1']) || empty($_POST['jurado2']) || empty($_POST['anioesc']) || empty($_POST['tipotrabajo']) || empty($_POST['departamento']) || empty($_POST['carrera'])) {
      //header("Location: ../Inscripcion.php");
      echo "error 2";
    }
  }

// Subida de archivo nuevo ///
  $salaID = $_POST['salaID'];
  $tema=$_POST['tema'];
  $autor1=$_POST['autor1'];
  $autor2=$_POST['autor2'];
  $autor3=$_POST['autor3'];
  $autor4=$_POST['autor4'];
  $autor5=$_POST['autor5'];
  $autor6=$_POST['autor6'];
  $tutor1=$_POST['tutor1'];
  $tutor2=$_POST['tutor2'];
  $tutor3=$_POST['tutor3'];
  $asesor1=$_POST['asesor1'];
  $asesor2=$_POST['asesor2'];
  $jurado1=$_POST['jurado1'];
  $jurado2=$_POST['jurado2'];
  $jurado3="";
  $anioesc=$_POST['anioesc'];
  $tipotrabajo=$_POST['tipotrabajo'];
  $departamento=$_POST['departamento'];
  $carrera=$_POST['carrera'];

  // $pdf=$_POST['pdf'];

  $consulta="INSERT INTO trabajos(salaID, UserId, tema, State, autor1, autor2, autor3, autor4, autor5, autor6, tutor1, tutor2, tutor3, asesor1, asesor2, jurado1, jurado2, cargo1, cargo2, anioesc, tipotrabajo, departamento, carrera, nota1,nota2, promedio) 
            VALUES ($salaID, NULL, '$tema', 2,'$autor1','$autor2','$autor3','$autor4','$autor5','$autor6','$tutor1','$tutor2','$tutor3',
            '$asesor1','$asesor2','$jurado1','$jurado2','Presidente','Secretario','$anioesc','$tipotrabajo','$departamento','$carrera', 0, 0, 0)";

  // $consul="INSERT INTO salas(nombresala) VALUES ('$nombresala')";
  echo $consulta;
  $resultado=$mysqli->query($consulta);
  if($resultado){
    header("Location: ../Subir.php?Id=".$mysqli->insert_id);
  }
  else{
    echo "No guardado";
  }
  // $resultado=$mysqli->query($consul);
  
  //$ruta ="../pdfs/";
  //opendir($ruta);
  //$destino = $ruta.$_FILES['pdf']['name'];
  //copy($_FILES['pdf']['tmp_name'],$destino);
  //$nombre=$_FILES['pdf']['name'];
  //mysqli_query("INSERT INTO trabajos(pdf)VALUES ('$nombre');

  
  exit(); 
?>

