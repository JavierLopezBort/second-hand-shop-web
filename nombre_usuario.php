<?

    include("funciones.php");
    Encabezado();

?>
	 Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a><br>

<form ENCTYPE="multipart/form-data" ACTION="recibir_nombre_usuario.php" METHOD="post">

<h1>Seleccionar el nuevo nombre de ususario</h1>

<input type="text" name="usu_nuevo" value="Nombre"><br><br>
<input type="submit" name="Enviar" value="Aceptar">



<?

Cierre()

?>