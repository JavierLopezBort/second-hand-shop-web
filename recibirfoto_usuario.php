<?

    include("funciones.php");
    Encabezado();

?>
	Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a><br>


 <? 

 $cookie=$_COOKIE['nombre'];

 if (isset( $_COOKIE['nombre']) ) {


$imagen=$_FILES['archivo']['type'];



	if(!($_FILES['archivo']['type']=="image/pjpeg" OR 
                   $_FILES['archivo']['type']=="image/jpeg" OR 
	               $_FILES['archivo']['type']=="image/gif" OR
	               $_FILES['archivo']['type']=="image/jpg")){
     print "El formato ".$_FILES['archivo']['type'].
	                                   " no est&aacute; permitido";
	 echo "<br><a href='foto_usuario.php'>Prueba otra imagen</a>";
     exit();
 }else{
 	 print "El formato ".$_FILES['archivo']['type'].
	                                   "  est&aacute; permitido";

	            # anidamos este segundo condicional
	            # para guardar en una variable
	            # la extensión real del fichero
	            # mas adelante la utilizaremos
	if ($_FILES['archivo']['type']=="image/pjpeg" OR
	             $_FILES['archivo']['type']=="image/jpeg" ){
		$extension=".jpg";
	}else{
		$extension=".gif";
	}
 }


$nuevo_nombre=$cookie;

$nuevo_nombre .=$extension;

$nuevo_nombre="img_usuarios/".$nuevo_nombre;

# echo $nuevo_nombre."<br>";



if ($_FILES['archivo']['tmp_name'] != "none" ){

	if (copy($_FILES['archivo']['tmp_name'], $nuevo_nombre)) {
	              echo "<h2>Se ha transferido el archivo a htdocs</h2>"; 
		}   
    }else{
    echo "<h2>No ha podido transferirse el fichero</h2>";  
}

echo "Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a>";






}else{
	echo "Tu tiempo de sesi&oacute;n ha expirado, vuelve a <a href='inicio.php'>iniciar sesi&oacute;n</a>";
}



Cierre();
?>

