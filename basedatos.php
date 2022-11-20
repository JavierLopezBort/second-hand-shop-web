<?

    include("funciones.php");
    Encabezado();

?>





<?


if($conexion=mysql_connect ("localhost","root","")){  
        #echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>";  
        if(mysql_query("CREATE DATABASE b3_web")){  
                echo "<h2> Base de datos 'B3 web' creada</h2><br>";  
        }else{  
                echo "<h2> No ha sido posible crear la base de datos</h2><br>";  
        }

   		if(mysql_close($conexion)){  
           # echo "<h2> Conexi&oacute;n cerrada con exito</h2><br>";  
           # echo "El identificador de conexion es:",$conexion;  
        }else{  
            echo "<h2> No se ha cerrado la conexi&oacute;n</h2>";  
        } 
}else{  
        echo "<h2> NO HA SIDO POSIBLE ESTABLECER LA CONEXI&OACUTE;N</h2>";  
}  




?>

</div>
</body>
</html>