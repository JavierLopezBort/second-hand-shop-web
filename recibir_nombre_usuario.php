<?

    $cookie=$_COOKIE['nombre'];

  if (isset( $_COOKIE['nombre']) ) {

    include("funciones.php");
    Encabezado();




$usu_nuevo=$_POST['usu_nuevo'];

# echo $usu_nuevo."<br>";
# echo $cookie."<br>";


if($conexion=mysql_connect ("localhost","root","")){
	# echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 

$base="b3_web";




mysql_select_db($base,$conexion); 

$resultado= mysql_query("SELECT contrasena FROM usuarios WHERE nombre='$usu_nuevo'" ,$conexion); 
$fila=mysql_fetch_row($resultado);
# echo $fila[0];

 if(strlen($fila[0])>0){
  echo "El nombre de usuario '".$usu_nuevo."' ya est&aacute; en uso. Prueba otro <a href='nombre_usuario.php'>aqu&iacute;</a>";

}else{
  

   $resultado2= mysql_query("UPDATE usuarios SET nombre='$usu_nuevo' WHERE (nombre='$cookie')" ,$conexion);
   echo "Tu nombre se ha cambiado correctamente de ".$cookie." a ".$usu_nuevo." .Vuelve a <a href='inicio.php'>iniciar sesi&oacute;n</a>";


}   

    

  






}else{
  echo "No ha sido posible establecer la conexión";
}


}else{
    echo "Tu tiempo de sesi&oacute;n ha expirado, vuelve a <a href='inicio.php'>iniciar sesi&oacute;n</a>";
}




Cierre();

?>