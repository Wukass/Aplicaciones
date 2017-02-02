<?php
session_start();
$cod=  isset($_GET['cod']) ? $_GET['cod']:"";
include_once'funciones.php';
?>

<html>
    <head><meta charset="utf-8">
	<link rel="stylesheet" href="decoracion.css" type="text/css">
        <style type="text/css">

        footer{margin-top: 467px}

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
            <form method="POST" align="center" action="">
                Para eliminar el Producto pulse el Boton:<br>
                <input type="submit" value="Borrar" name="Borrar">
            </form>
            <?php
            try{
                $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
                $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
                $stmt=$con->prepare('select * from productos where cod_producto=:cod');
                $stmt->execute(array(':cod'=>$cod));

                 echo '<table border align="center">';
                 echo "<tr><th>Codigo</th><th>Producto</th><th>Categoria</th>
                 <th>Precio</th><th>Codigo del Proveedor</th><th>Proveedor</th></tr>";
                 while($filas=$stmt->fetch(PDO::FETCH_ASSOC)){
                     echo "<tr><td>".$filas['cod_producto']."</td><td>"
                             .$filas['nombre_producto']."</td><td>"
                             .$filas['categoria']."</td><td>"
                             .$filas['precio']."</td><td>"
                             .$filas['proveedor']."</td><td>"
                             .$filas['nom_prov']."</td></tr>";
                 }
                 echo "</table>";
            }catch (PDOException $ex){
                $ex->getMessage();
            }
            ?>
        <article><?php Eliminar($cod)?></article>
        </section>
        <footer>Diego Vera 2º Desarrollo aplicaciones WEB</footer>
    </body>
</html>