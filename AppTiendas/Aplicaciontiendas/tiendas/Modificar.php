<?php
session_start();
$cod=  isset($_GET['cod']) ? $_GET['cod']:"";
include_once'funciones.php';
?>

<html>
    <head><meta charset="utf-8">
	<link rel="stylesheet" href="decoracion.css" type="text/css">
        <style type="text/css">
          
        footer{margin-top: 397px}

        </style>
    </head>
    <body>
        <header>
        <h3>Has iniciado sesion como:<?php  echo $_SESSION['usuario'];?></h3>
        <ul>
            <li><a href="Consultar.php">Consulta</a></li>
            <li><a href="Alta_producto.php">Alta</a></li>
            <li><a href="Baja_producto.php">Baja Y Modificacion</a></li>
            <li><a href="menu2.php">Ir al Inicio</a></li>
        </ul>
        </header>
        <section>
            <form method="POST" align="center" action="conf_modificar.php">
                Para modificar el Producto pulse el Boton:<br>
                <?php
                echo '<p align="center">Cambie el contenido en la Tabla inferior</p>';
                Prodmodificar($cod);
                ?>
                <br><input type="submit" value="Actualizar" name="Actualizar">
            </form>
        <article></article>
        </section>
        <footer>Diego Vera 2º Desarrollo aplicaciones WEB</footer>
    </body>
</html>