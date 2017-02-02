<?php
session_start();
include_once'funciones.php';
?>
<html>
    <head><meta charset="utf-8">
        <style type="text/css">
            body{width:800px;height:768px; }
            h3,footer{text-align:center}
            header{background-color:gainsboro;}
        header ul{width:500px;height:50px;background-color: greenyellow;
            margin-left: 120px;margin-top: 20px}
        header ul li{float:left; width:100px;height:20px;margin-left:20px;
                     list-style-type: none}   
        section{clear: both}
        section table{margin-top:20px}
        footer{background-color: greenyellow;margin-top: 550px;height: 30px;
        position: absolute;width:800px}
        a,footer{text-decoration:none;color:gray;}
        section{text-align: center;font-size: 3em}
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
            <article>
                <table align="center">
                <form action="" method="POST">
                    <tr><td>Proveedores Contratados:</td><td><input type="radio" name="eleccion" value="prov"></td></tr>
                    <tr><td>Productos a la venta:</td><td><input type="radio" name="eleccion" value="prod"></td></tr>
                    <tr><td>Ventas realizadas:</td><td><input type="radio" name="eleccion" value="ventas"></td></tr>
                   <tr><td><input type="submit" name="Consultar" value="Consultar"></td></tr>
                </form>
                </table>
                <?php
                if(isset($_POST['Consultar'])){
                    $sitio=isset($_POST['eleccion'])?$_POST['eleccion']:"";
                    if($sitio==""){
                        echo "Debe elegir una opcion";
                    }else{
                        if($sitio=="prov"){
                            header("location: Prov_consulta.php");
                        }else{
                            if($sitio=="prod"){
                            header("location: Prod_consulta.php");
                            }else{
                                header("location: Ventas_consulta.php");
                            }
                            
                            }
                    }
                }
                ?>
            </article>
        </section>
        <footer>Diego Vera 2º Desarrollo aplicaciones WEB</footer>
    </body>
</html>
