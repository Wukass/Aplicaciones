<?php
session_start();
?>
<html>
    <head><meta charset="utf-8">
	<link rel="stylesheet" href="decoracion.css" type="text/css">
        <style type="text/css">

        footer{margin-top: 443px}

        section{text-align: center;font-size: 5em}
        </style>
    </head>
    <body>
        <header>
        <h3>Has iniciado sesion como:<?php  echo $_SESSION['usuario'];?></h3>
            <ul>
            <li><a href="Consultar.php">Consulta</a></li>
            <li><a href="Alta_producto.php">Alta</a></li>
            <li><a href="Baja_producto.php">Baja Y Modificacion</a></li>
            <li><a href="cerrar.php">Cerrar Sesion</a></li>
        </ul>
        </header>
        <section >Aplicacion DAW Tiendas</section>
        <footer>Diego vera 2º Desarrollo aplicaciones WEB</footer>
    </body>
</html>