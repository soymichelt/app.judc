<?php
  //require('inc/VerifiedSecurity.php');
  //$tmp = VerifiedSesion();

  if($tmp == 1) {
?>
<ul id="slide-out" class="side-nav">
  <li>
    <div class="userView">
      <img class="background" src="img/Background/12928301_10153693639495326_2341979282073055357_n.jpg">
      <br />
      <a href="#!name">
        <span class="white-text name">
          <?php echo $_SESSION["UserName"]; ?>
        </span>
      </a>
      <a href="#!email">
        <span class="white-text email">
          <?php echo $_SESSION["UserEmail"]; ?>
        </span>
      </a>
      <br />
    </div>
  </li>
  <li>
    <a class="subheader">Administrar</a>
  </li>
  <li>
    <a class="waves-effect" href="Sala.php">
      <i class="material-icons green-text text-darken-1">library_books</i>
      Salas
    </a>
  </li>


  <li>
    <a class="subheader">Listado de Salas</a>
  </li>
  <li>
    <?php
      require("inc/conexion.php");
      $rSal = $mysqli->query("SELECT * FROM salas");
      if($rSal) {
        while($iSal = $rSal->fetch_assoc()) {
    ?>
    <a href="Trabajo.php?Id=<?php echo $iSal['salaID']; ?>" class="waves-effect" href="#!">
      <i class="material-icons blue-grey-text text-darken-1">playlist_add</i>
      <?php echo $iSal["Nombre"]; ?>
    </a>
    <?php
        }
      }
    ?>
  </li>
  <?php

  ?>
  <li>
    <a class="subheader">Accesos</a>
  </li>
  <li>
    <a class="waves-effect" href="UsuarioAgregar.php">
      <i class="material-icons teal-text text-darken-1">assignment_ind</i>
      Agregar
    </a>
    <a class="waves-effect" href="Usuario.php">
      <i class="material-icons purple-text text-darken-1">supervisor_account</i>
      Usuarios
    </a>
  </li>

  <li>
    <a class="subheader">
      Sesi&oacute;n
    </a>
  </li>
  <li>
    <a class="waves-effect" href="inc/Signup.php">
      <i class="material-icons red-text text-darken-1">power_settings_new</i>
      Salir
    </a>
  </li>
</ul>


<div class="navbar-fixed menu">
  <div class="indigo  darken-1">
    <div class="container" style="line-height:40px;padding-top:15px;padding-bottom:15px;">
      <a href="#" data-activates="slide-out" class="button-collapse white-text left btn-floating btn-flat">
        <i class="material-icons">menu</i>
      </a>
      <a href="Index.php" data-activates="slide-out" class="white-text" style="font-size:1.5rem;">
          +JUDC 2016
      </a>
    </div>
  </div>
</div>
<?php
  }
  else {
?>
<ul id="slide-out" class="side-nav">
  <li>
    <div class="userView">
      <img class="background" src="img/Background/12928301_10153693639495326_2341979282073055357_n.jpg">
      <br />
      <a href="Signin.php" class="btn deep-orange darken-1">
        Entrar
      </a>
      <br />
    </div>
  </li>
  <li>
    <a class="subheader">Administrar</a>
  </li>
  <li>
    <a class="waves-effect" href="Sala.php">
      <i class="material-icons green-text text-darken-1">library_books</i>
      Salas
    </a>
  </li>
  <li>
    <a class="subheader">Listado de Salas</a>
  </li>
  <li>
    <?php
      require("inc/conexion.php");
      $rSal = $mysqli->query("SELECT * FROM salas");
      if($rSal) {
        while($iSal = $rSal->fetch_assoc()) {
    ?>
    <a href="Trabajo.php?Id=<?php echo $iSal['salaID']; ?>" class="waves-effect" href="#!">
      <i class="material-icons blue-grey-text text-darken-1">playlist_add</i>
      <?php echo $iSal["Nombre"]; ?>
    </a>
    <?php
        }
      }
    ?>
  </li>
</ul>


<div class="navbar-fixed menu">
  <div class="indigo  darken-1">
    <div class="container" style="line-height:40px;padding-top:15px;padding-bottom:15px;">
      <a href="#" data-activates="slide-out" class="button-collapse white-text left btn-floating btn-flat">
        <i class="material-icons">menu</i>
      </a>
      <a href="Index.php" data-activates="slide-out" class="white-text" style="font-size:1.5rem;">
          +JUDC 2016
      </a>
      <div class="right">
        <a href="Signin.php" class=" waves-effect waves-light btn deep-orange darken-1">
          Entrar
        </a>
      </div>
    </div>
  </div>
</div>
<?php
  }
?>

<script type="text/javascript">
    $(document).ready(function(){
      $(".button-collapse").sideNav();
    });
</script>