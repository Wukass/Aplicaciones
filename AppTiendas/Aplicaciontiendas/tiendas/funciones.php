<?php

function Mostrarcompras() {
 
 
 try {

    $conn=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('select * from productos,compras,clientes 
                           where compras.cod_producto=productos.cod_producto and compras.usu=clientes.usu');
    $stmt->execute();
    
         echo '<table border align="center">';
         echo '<tr><th>Cantidad</th><th>Producto</th><th>Cliente</th><th>Fecha</th></tr>';
         while($filas=$stmt->fetch(PDO::FETCH_ASSOC)){
             echo "<tr><td>".$filas['cantidad']."</td><td>".$filas['nombre_producto'].
                  "</td><td>".$filas['usu']."</td><td>".$filas['fecha']."</tr>";
         }
         echo "</table>";
 }catch(PDOException $e){
     $e->getMessage();
 }
}
function sabertotal(){
    try {
    
    $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $con->prepare('select * from productos');
    $stmt->execute();
    $total=$stmt->rowCount();
         
 }catch(PDOException $e){
     $e->getMessage();
 }
    return $total;
}

function Mostrarproveedores() {
 
 
 try {

    $conn=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('select distinct proveedor,nom_prov from productos');
    $stmt->execute();
    
         echo '<table border align="center">';
         echo '<tr><th>Codigo del Proveedor</th><th>Proveedor</th></tr>';
         while($filas=$stmt->fetch(PDO::FETCH_ASSOC)){
             echo "<tr></td><td>".$filas['proveedor']."</td><td>".$filas['nom_prov']."</tr>";
         }
         echo "</table>";
 }catch(PDOException $e){
     $e->getMessage();
 }
}

function Prodmodificar($cod){
   
            try{
                $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
                $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
                $stmt=$con->prepare('select * from productos where cod_producto=:cod');
                $stmt->execute(array(':cod'=>$cod));

                 echo '<table border align="center">';
                 
                 while($filas=$stmt->fetch(PDO::FETCH_ASSOC)){
                     echo 
'
    <tr>
<th>Codigo</th><th>Codigo del Proveedor</th><th>Proveedor</th></tr>
    <tr>
    <td><input type="text" value="'.$filas['cod_producto'].'" name="codigo" readonly="readonly"></td>
    <td><input type="text" value="'.$filas['proveedor'].'" name="prov" readonly="readonly"></td>
    <td><input type="text" value="'.$filas['nom_prov'].'" name="nom_prov" readonly="readonly"></td>
</tr>
<tr><th>Producto</th><th>Categoria</th><th>Precio</th></tr>
<tr>
    <td><input type="text" value="'.$filas['nombre_producto'].'" name="nombre" ></td>  
    <td><input type="text" value="'.$filas['categoria'].'" name="categoria" ></td>   
    <td><input type="text" value="'.$filas['precio'].'" name="precio" ></td>

</form></tr>';
                 }
                 echo "</table>";
                }catch(PDOException $e){
            $e->getMessage();
            }
}

function sacarselect(){
         try{
         $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
         $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
         $stmt=$con->query('select distinct proveedor,nom_prov,categoria from productos');
                
         while($filas=$stmt->fetch(PDO::FETCH_ASSOC)){
             echo '<option value='.$filas['proveedor'].'>'.$filas['proveedor'].' - '.$filas['nom_prov'].' - '.$filas['categoria'].'</option>';
         }
         }catch (PDOException $ex){
        $ex->getMessage();
    } 

}

function sacarproveedor(){
         try{
         $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
         $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
         $stmt=$con->query('select distinct proveedor from productos');
                
        $filas=$stmt->rowCount();
        echo '<input type="text" value="P'.($filas+1).'" name="prov" readonly="readonly">';

         }catch (PDOException $ex){
        $ex->getMessage();
    } 

}

function sacarcodigo(){
         try{
         $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
         $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
         $stmt=$con->query('select * from productos');
                
        $filas=$stmt->rowCount();
        echo '<input type="text" value="'.($filas+1).'" name="codigo" readonly="readonly">';
         
         }catch (PDOException $ex){
        $ex->getMessage();
    } 

}

function Mostrarproductos(){
         try{
            $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
            $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
            $stmt=$con->query('select * from productos');

         echo '<table border align="center">';
         echo '<tr><th>Codigo</th><th>Proveedor</th><th>Producto</th><th colspan="2">Accion</th></tr>';
         while($filas=$stmt->fetch(PDO::FETCH_ASSOC)){
             echo "<tr><td>".$filas['cod_producto']."</td><td>".$filas['nom_prov'].
                  "</td><td>".$filas['nombre_producto'].'</td>
                    <td>
                    <a  href="baja_total.php?cod='.$filas['cod_producto'].'">Eliminar</a>
                    </td>
                    <td>
                    <a  href="Modificar.php?cod='.$filas['cod_producto'].'">Modificar</a></td></tr>';
         }
         echo "</table>";
         }catch (PDOException $ex){
        $ex->getMessage();
    }
}

function Modificar(){
    if(isset($_POST['Actualizar'])){
                $cod= isset($_POST['codigo'])? $_POST['codigo']:"";
                $nom= isset($_POST['nombre'])? $_POST['nombre']:"";
                $cat= isset($_POST['categoria'])? $_POST['categoria']:"";
                $precio= isset($_POST['precio'])? $_POST['precio']:"";
                
        try{
            $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
            $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
            $stmt3=$con->prepare('Update productos set
                                    nombre_producto=:nom,
                                    categoria=:cat,
                                    precio=:precio
                                    where cod_producto=:cod ');
            $stmt3->execute(array(':cod'=>$cod,':nom'=>$nom,':cat'=>$cat,
                ':precio'=>$precio));

            if($stmt3==true){
                echo '<p align="center">Modificacion Correcta del Producto</p>';
            }
        }catch (PDOException $ex){
            $ex->getMessage();
        }   
    }
}

function Eliminar($cod){
     if(isset($_POST['Borrar'])){
        try{
            $con=new PDO('mysql:dbname=tiendas;host=localhost;charset=utf8','tiendas','tiendas');
            $con->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
            $stmt3=$con->prepare('delete from productos where cod_producto=:cod ');
            $stmt3->execute(array(':cod'=>$cod));

            if($stmt3->rowCount()==1){
                echo '<p align="center">Eliminacion Correcta del producto</p>';
            }
         }catch (PDOException $ex){
        $ex->getMessage();
    }
     }
}

?>
