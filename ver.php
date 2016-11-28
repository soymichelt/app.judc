<?php
//Archivo PHP para la conexion
  require('inc/conexion.php');
   //$consulta="SELECT * FROM usuarios NATURAL LEFT JOIN trabajos";
    $consulta="SELECT * FROM trabajos";
    $resultado=$mysqli->query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
  <!--Import materialize.css-->
  <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <title>Sitio Web</title>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/estilos.css"media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/dataTables.min.css"media="screen,projection"/>
  
      <nav>
      <div class="nav-wrapper">
      <a href="index.php" class="brand-logo"><img src="img/unan.png"  WIDTH=50 HEIGHT=64></a>
      <!-- <IMG SRC="..img/unan.png"> -->
      <a href="index.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="administrador.php">Administador</a></li>
        <li><a href="contactos.php">Contactos</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="administrador.php">Adminstrador</a></li>
        <li><a href="contactos.php">Contactos</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
      </div>
    </nav>

  <h1 align="center">Usuarios</h1>
  <h3 align="center"><a data-toggle="modal" href="index.php">NUEVO USUARIOS</a></h3>

  <table id="example" class="table table-hover condensed striped" >
    <thead>
      <tr>--
        <th>ID</th>
        <th>Tema</th>
        <th>Tipo trabajo</th>
        <th>Departamento</th>
        <th>Carrera</th>
        <th>PDF *</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    
    <tbody>
      <?php while($fila=$resultado->fetch_assoc()){ 
      ?>
      <tr>
        <td><?php echo $fila['trabajoID']; ?></td>    
        <td><?php echo $fila['tema']; ?></td>
        <td><?php echo $fila['tipotrabajo']; ?></td>
        <td><?php echo $fila['departamento']; ?></td>
        <td><?php echo $fila['carrera']; ?></td>
        <td><?php echo $fila['pdf']; ?></td>
        <td>
          <a class="btn-floating green darken-1" href="modificar.php?id=<?php echo $fila['trabajoID']; ?>" role="button" data-toggle="modal">
             <i class="mdi-editor-mode-edit prefix"></i>
          </a>
        </td>
        <td>
          <a class="btn-floating red darken-1" href="inc/eliminar.php?id=<?php echo $fila['trabajoID']; ?>" role="button" data-toggle="modal">
            <i class="mdi-action-delete prefix"></i>
          </a>
        </td>
      </tr>       
      <?php 
        } 
      ?>
    </tbody>
  </table>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/dataTables.min.js"></script>
  
  <script>
    $(document).ready(function() {
    $('#example').DataTable();
  });
  </script>
</html>