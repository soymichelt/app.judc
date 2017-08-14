<?php
    //Si ya ha iniciado sesion
    require("VerifiedSecurity.php");
    $tmp = VerifiedSesion();
    if($tmp == 0) {
    header("Location: Signin.php");
    }

    require('conexion.php');

    if(!isset($_POST['nombre']) || !isset($_POST['descripcion']) || !isset($_POST['coordinador']) || !isset($_POST['enlace']) || !isset($_POST['local']))
    {

        header("Location: ../SalaAgregar.php?Err=1");
        echo "error 1";

    }
    else
    {

        if(empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['coordinador']) || empty($_POST['enlace']) || empty($_POST['local']))
        {

            header("Location: ../SalaAgregar.php?Err=2");
            echo "error 2";

        }
        else
        {

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $coordinador = $_POST['coordinador'];
            $enlace = $_POST['enlace'];
            $local = $_POST['local'];

            $consulta = "INSERT INTO salas
                            (nombre, descripcion, coordinador, enlace, local, filename)
                        VALUES
                            ('$nombre', '$descripcion', '$coordinador', '$enlace', '$local', '')";
            
            echo $consulta;
            
            $resultado=$mysqli->query($consulta);

            if($resultado)
            {

                header("Location: ../Sala.php");

            }
            else
            {

                header("Location: ../SalaAgregar.php?Err=3");

            }

        }

    }

?>