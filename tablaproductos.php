<?

    include("funciones.php");
    Encabezado();

?>




<?


if($conexion=mysql_connect ("localhost","root","")){
	#echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 
	 if(mysql_query("CREATE TABLE IF NOT EXISTS b3_web.productos (producto VARCHAR(30), tipo ENUM('ropa','hogar','elec_video','vehiculos','deportes','ind_emp_cien','cine_tv_mus','libros','jueguetes_bebe'), cantidad INTEGER, precio FLOAT,estado ENUM('disponible','agotado'),vendedor VARCHAR(8),ID TINYINT(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, PRIMARY KEY(ID), comprador VARCHAR(8))",$conexion)){
        	print "Se ha creado la tabla productos en la base de datos B3 web<br>";
     }else{
        print "Se ha producido un error al crear la tabla";
     }


if(mysql_close($conexion)){  
    #        echo "<h2> Conexi&oacute;n cerrada con exito</h2><br>";  
    #        echo "El identificador de conexion es:",$conexion;  
        }else{  
     #       echo "<h2> No se ha cerrado la conexi&oacute;n</h2>";  
        } 
}else{  
      #  echo "<h2> NO HA SIDO POSIBLE ESTABLECER LA CONEXI&OACUTE;N</h2>";  
}


?>

</div>
</body>
</html>