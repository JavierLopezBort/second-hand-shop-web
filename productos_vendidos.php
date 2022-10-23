<? 

  $cookie=$_COOKIE['nombre'];
  
?>

<?

    include("funciones.php");
    Encabezado();

?>




<?

if($conexion=mysql_connect ("localhost","root","")){
#	echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 

$base="b3_web";




mysql_select_db($base,$conexion); 

# establecemos el criterio de SELECCION 
# en este caso los campos Contador, Nombre, Apellido1, Apellido2 unicamente 
# añadimos el LIMITE que indica CUANTOS REGISTROS DEBEN APARECER (8) 
# y a partir de cual de ellos (6) ya que escribimos un (5) 


$resultado= mysql_query("SELECT producto, tipo, cantidad, precio, estado, vendedor, ID, comprador FROM productos WHERE (estado='agotado' AND vendedor='$cookie') LIMIT 0, 4" ,$conexion); 



# CREAMOS UNA CABECERA DE UNA TABLA (codigo HTML) 


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
    
		

while($fila=mysql_fetch_row($resultado)){

      
      
echo "<tr>";

      

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



echo "<img class='imagen_producto'src='$imagen'></a>";


  echo "</td>";
  echo "</tr>";


 

}
echo "</table>";
echo "Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a><br><br>";


}

Cierre();

?>