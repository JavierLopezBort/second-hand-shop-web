<?

	 $cookie=$_COOKIE['nombre'];

  if (isset( $_COOKIE['nombre']) ) {



include("funciones.php");
    Encabezado();



 if($conexion=mysql_connect ("localhost","root","")){
	# echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 

$base="b3_web";


$saldo_recibido=$_POST['saldo'];

# echo $saldo_recibido;

mysql_select_db($base,$conexion); 

$resultado= mysql_query("SELECT saldo FROM usuarios WHERE (nombre='$cookie')" ,$conexion); 
$saldo_inicial=mysql_fetch_row($resultado);

 }else{
 	echo "hola";
 }

# echo "<h3>Saldo inicial=".$saldo_inicial[0]."</h3>";
# echo "<a href='rellenar_saldo.php'>Rellena tu saldo</a>";


$saldo_nuevo=$saldo_inicial[0]+$saldo_recibido;

# echo $saldo_nuevo;

$resultado2= mysql_query("UPDATE usuarios SET saldo='$saldo_nuevo' WHERE (nombre='$cookie')" ,$conexion);

if ($resultado2){
	echo "Tu saldo se ha subido. Antes era de ".$saldo_inicial[0]." y ahora es de ".$saldo_nuevo."<br>";
	echo "Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a><br><br>";
}else{
	echo "Tu saldo no se ha subido y es ".$saldo_inicial;
	echo "Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a><br><br>";
}






}else{
		echo "Tu tiempo de sesi&oacute;n ha expirado, vuelve a <a href='inicio.php'>iniciar sesi&oacute;n</a>";

}





Cierre();



?>