<?php
session_start();
include_once'funciones.php';  
?>
<html>
    <head><meta charset="utf-8">
	<link rel="stylesheet" href="decoracion.css" type="text/css">
        <style type="text/css">
        footer{margin-top: 345px}
        article{text-align: center;font-size: 2em}
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
        <table align="center">
                
            <form method="POST" action="formulario_alta.php">
            <tr>
                <td><input type="radio" name="proveedor" value="1">Proveedor creado</td>                        
                <td><input type="radio" name="proveedor" value="2">Proveedor nuevo</td>
                
            </tr>
            <tr>
                <td align="right">
                    <input type="submit" name="Alta">
                </td>
                <td>
                    <a href="menu2.php">Cancelar</a>
                </td>
            </tr>
            </form>
        </table>
        <article >Proveedores:<?php Mostrarproveedores();?></article>
        </section>
        <footer>Diego Vera 2º Desarrollo aplicaciones WEB</footer>
    </body>
</html>
