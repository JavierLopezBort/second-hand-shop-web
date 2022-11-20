<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="General.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="inventario.css" media="screen" />
    
</head>
<title></title>
    <body><center>
        <div class="logo">
            <img class="img_logo" src="Logo.jpg">
        </div>  
    </center>
    <div class="text">
            Bueno, bonito, barato
        </div>
        <br>
<div class="general">



<?


if($conexion=mysql_connect ("localhost","root","")){
	#echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 

$base="b3_web";




mysql_select_db($base,$conexion); 

# establecemos el criterio de SELECCION 
# en este caso los campos Contador, Nombre, Apellido1, Apellido2 unicamente 
# añadimos el LIMITE que indica CUANTOS REGISTROS DEBEN APARECER (8) 
# y a partir de cual de ellos (6) ya que escribimos un (5) 


$resultado= mysql_query("SELECT producto, tipo, cantidad, precio, estado, vendedor, ID FROM productos LIMIT 0, 4" ,$conexion); 



# CREAMOS UNA CABECERA DE UNA TABLA (codigo HTML) 
echo "<h1>Para comprar cualquier producto, por favor, pinchar en la imagen deseada.<br>";

echo "<table background_colour=white align=center text_align=center border=2>";

  echo "<tr>
		<td>Producto</td>
		<td>Tipo</td>
		<td>Cantidad</td>
		<td>Precio</td>
		<td>Estado</td>
    <td>Vendedor</td>
    <td>Imagen</td>
	</tr>
		";
    
		

# establecemos un bucle que recoge en un array 
# cada una de las LINEAS DEL RESULTADO DE LA CONSULTA 
# utilizamos en esta ocasión «mysql_fetch_row» 
# en vez de «mysql_fetch_array» para EVITAR DUPLICADOS 
# recuerda que esta ultima función devuelve un array escalar 
# y otro asociativo con los resultados 

while($fila=mysql_fetch_row($resultado)){

       # insertamos un salto de línea en la tabla HTML 
      
echo "<tr>";



       # establecemos el bucle de lectura del ARRAY 
       # con los resultados de cada LINEA 
       # y encerramos cada valor en etiquetas <td></td> 
       # para que aparezcan en celdas distintas de la tabla 

       for ($i=0; $i<=5; $i++) { 
                echo "<td>".$fila[$i]."</td>";
            }

   echo "<td>";
  

if (file_exists('img_productos/'.$fila[6].'.jpg')) {
  $imagen="img_productos/".$fila[6].'.jpg';
  
  
}elseif(file_exists('img_productos/'.$fila[6].'.gif')){
  $imagen='img_productos/'.$fila[6].'.gif';
  
}else{

  $imagen="img_productos/imagendefecto.jpg";
  
}



echo "<a href='pagina_intermediaria.php?id=".$fila[6]."'><img class='imagen_producto'src='$imagen'></a>";


  echo "</td>";
  echo "</tr>";


 

}
echo "</table>";
echo "Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a><br><br>";


/*cerramos la conexion 
*/


if(mysql_close($conexion)){  
          #  echo "<h2> Conexi&oacute;n cerrada con exito</h2><br>";  
           # echo "El identificador de conexion es:",$conexion;  
        }else{  
           # echo "<h2> No se ha cerrado la conexi&oacute;n</h2>";  
        }
}else{              
       # echo "<h2> NO HA SIDO POSIBLE ESTABLECER LA CONEXI&OACUTE;N</h2>";  
}


?>