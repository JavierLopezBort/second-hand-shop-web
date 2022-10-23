 <? 

  $cookie=$_COOKIE['nombre'];

  if (isset( $_COOKIE['nombre']) ) {

 ?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="General.css" media="screen" />
    
</head>
<title></title>
    <body><center>


<?
/***********************************************
					IMAGEN USUARIO
************************************************/

if (file_exists('img_usuarios/'.$cookie.'.jpg')) {
	$imagen="img_usuarios/".$cookie.'.jpg';
	
	
}elseif(file_exists('img_usuarios/'.$cookie.'.gif')){
	$imagen='img_usuarios/'.$cookie.'.gif';
	
}else{

	$imagen="img_usuarios/imagendefecto.jpg";
	
}


?>

<img class='fotoperfil' src='<?
 echo $imagen;?>'>


<?


/***********************************************
					CAJA 1
************************************************/


 if($conexion=mysql_connect ("localhost","root","")){
	# echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 

$base="b3_web";




mysql_select_db($base,$conexion); 

$resultado= mysql_query("SELECT saldo FROM usuarios WHERE (nombre='$cookie')" ,$conexion); 
$fila=mysql_fetch_row($resultado);

 }else{
 	echo "hola";
 }
echo "<div class='saldo'>";

echo "<h2>Bienvenid@ ".$cookie."</h2>";


echo "<h3>Saldo=".$fila[0]."</h3>";
# echo "<a href='rellenar_saldo.php'>Rellena tu saldo</a>";

echo "</div>";
 





/***********************************************
					CAJA 2
************************************************/

$resultado2= mysql_query("SELECT producto FROM productos WHERE (cantidad=agotado)" ,$conexion); 
while($fila=mysql_fetch_row($resultado)){

    
     
       # establecemos el bucle de lectura del ARRAY 
       # con los resultados de cada LINEA 
       # y encerramos cada valor en etiquetas <td></td> 
       # para que aparezcan en celdas distintas de la tabla 

       for ($i=0; $i<=5; $i++) { 
                echo $fila[$i];
            }

  





}

?>
</div>
<?

/***********************************************
					CAJA 2
************************************************/

echo "<div class='perfil'>";

echo "<h2>Configuraci&oacuten</h2>";
	
echo '<a  class="link" href="nombre_usuario.php"><div class="text2">Cambia el nombre de usuario</div></a><br><br>';

echo '<a  class="link" href="foto_usuario.php"><div class="text2">Cambia tu foto de perfil</a></div><br><br>';

echo '<a  class="link" href="contrasena_usuario.php"><div class="text2">Cambia la contrase&ntilde;a</a></div><br><br>';

echo '<a class="link" href="rellenar_saldo.php"><div class="text2">Rellena tu saldo</a></div><br><br>';

echo '<a class="link" href="inicio.php"><div class="text2">Cerrar sesi&oacute;n</a></div><br>';



echo "<h3></h3>";


echo "</div>";



?>




        <div class='logo'>
            <img class="img_logo" src="Logo.jpg">
        </div>  
    </center>
    <div class='text'>
            Bueno, bonito, barato
        </div>
        <br>




<div class="contenedor">


			

	
	<div class="encabezado"> 

		<div class="opcion">
			<a class="link" href="subirproductos.php">Vender productos</a>
		</div>

		<div class="opcion">
			<a class="link" href="inventario.php">Comprar productos</a>
		</div>

		<div class="opcion">
			<a class="link" href="misproductos.php">Mis Productos</a>
		</div>

		<div class="opcion">
			<a class="link" href="productos_vendidos.php">Productos vendidos</a>
		</div>

		<div class="opcion">
			<a class="link" href="productos_comprados.php">Productos comprados</a>
		</div>

		<div class="opcion">
			<a class="link" href="misproductos.php">Mis Productos</a>
		</div>
		



	</div>



<?


include("funciones.php");

echo "<br><br>";
Cierre();




}else{
		echo "Tu tiempo de sesi&oacute;n ha expirado, vuelve a <a href='inicio.php'>iniciar sesi&oacute;n</a>";
}


?>






