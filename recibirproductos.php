<? 

  $cookie=$_COOKIE['nombre'];
  
?>


<?

    include("funciones.php");
    Encabezado();

?>


<?

$producto=$_POST['producto'];
$tipo=$_POST['tipo'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];









# echo $producto.",".$tipo.",".$cantidad.",".$precio;


$consulta2="INSERT b3_web.productos (producto,tipo,cantidad,precio,estado,vendedor) VALUES 
('".$producto."','".$tipo."','".$cantidad."','".$precio."','disponible','".$cookie."')";


if($conexion=mysql_connect ("localhost","root","")){  
      # echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>";  
        
    if(strlen($producto)==0 OR strlen($tipo)==0 OR 
        strlen($cantidad)==0 OR strlen($precio)==0
        ){
        echo "Datos incorrectos<br>";
        echo "Vuelva a la <a href='subirproductos.php'>p&aacute;gina de subida de productos</a> ";
    }else{



 	if(mysql_query($consulta2,$conexion)){
        print "Se han introducido los datos de la tabla productos de la base B3 web<br>
        Subida de productos realizada con &eacute;xito. <a href='inventario.php'>Ve al inventario</a>";

         






        }else{
        print "Se ha producido un error al introducir los datos de la tabla productos";
        ;
    
        } 

    }   
        





     
        if(mysql_close($conexion)){  
         #   echo "<h2> Conexi&oacute;n cerrada con exito</h2><br>";  
         #   echo "El identificador de conexion es:",$conexion;  
                 }else{  
            echo "<h2> No se ha cerrado la conexión</h2>";  
             };  
    }else{  
        echo "<h2> NO HA SIDO POSIBLE ESTABLECER LA CONEXIÓN</h2>";  
} 









Cierre();

?>


