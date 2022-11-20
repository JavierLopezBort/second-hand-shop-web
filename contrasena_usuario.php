<?

    include("funciones.php");
    Encabezado();

?>
	 Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a><br>




<form ENCTYPE="multipart/form-data" ACTION="recibir_contrasena_usuario.php" METHOD="post">

<h1>Escribir la antigua contrase&ntilde;a</h1>

<input type="password" name="contra_1" value=""><br>

<h1>Escribir la nueva contrase&ntilde;a</h1>
	(recuerda que debe tener may&uacute;sculas, min&uacute;sculas y n&uacute;meros)<br>
<input type="password" name="contra_2" value=""><br><br>

<input type="submit" name="Enviar" value="Aceptar">



<?

Cierre()

?>