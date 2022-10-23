<?

    include("funciones.php");
    Encabezado();

?>




 <?


if($conexion=mysql_connect ("localhost","root","")){
	#echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 
	 if(mysql_query("CREATE TABLE IF NOT EXISTS b3_web.usuarios (nombre VARCHAR(30), nombre_real VARCHAR(30),  apellido1 VARCHAR(30), apellido2 VARCHAR(30), contrasena VARCHAR(30), correo VARCHAR(30), localidad VARCHAR(30),tipo ENUM('calle','plaza','barrio'),via VARCHAR(30),edificio INTEGER,puerta INTEGER, planta INTEGER,sexo ENUM('hombre','mujer'),saldo FLOAT)",$conexion)){
        	print "Se ha creado la tabla usuarios en la base de datos B3 web<br>";
     }else{
        print "Se ha producido un error al crear la tabla";
     }


if(mysql_close($conexion)){  
       #     echo "<h2> Conexi&oacute;n cerrada con exito</h2><br>";  
       #    echo "El identificador de conexion es:",$conexion;  
        }else{  
            echo "<h2> No se ha cerrado la conexi&oacute;n</h2>";  
        } 
}else{  
        echo "<h2> NO HA SIDO POSIBLE ESTABLECER LA CONEXI&OACUTE;N</h2>";  
}



Cierre();

?>
