<?php
  //Si ya ha iniciado sesion
  require("VerifiedSecurity.php");
  $tmp = VerifiedSesion();
  if($tmp == 0) {
    header("Location: Signin.php");
  }

  if(isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["passwd"]) && isset($_POST["rol"])) {
    if(empty($_POST["fullname"]) || empty($_POST["email"]) || empty($_POST["passwd"]) || empty($_POST["rol"])) {
      header("Location: ../UsuarioAgregar.php?Err=1");
    }
  }
  else {
    header("Location: ../UsuarioAgregar.php?Err=1");
  }


  require('conexion.php');
  $mysqli->set_charset("utf8");
  $fullname=$_POST["fullname"];
  $email=$_POST["email"];
  $passwd=$_POST["passwd"];
  $rol = $_POST["rol"];

  $consulta= "INSERT INTO usuarios(fullname, email, password, rol) VALUES ('$fullname','$email','$passwd', $rol)";

  $resultado=$mysqli->query($consulta);

  echo $consulta;

  if($resultado){
    header("Location: ../Usuario.php");
  }
  else{
    header("Location: ../UsuarioAgregar.php?Err=2");
  }
  
  exit();
?>

