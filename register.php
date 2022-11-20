<?

    include("funciones.php");
    Encabezado();

?>
		<center><h1>Registro</h1></center>

<!-- Aquí falta poner la imagen del logo -->

<center>Vuelve a la <a href="inicio.php">p&aacute;gina de inicio</a></center><br>

<form name="registro" method="post" action="registro_datos.php">

	<center>Nombre de usuario:</center> <br>
	<center><input type="text" name="usu2" value=''></center>
	<br>
	<center>Nombre real:</center> <br>
	<center><input type="text" name="nombre_real" value=''></center>

	<br><center>Apellidos:</center> <br>
	<center><input type="text" name="apellido1" value=''></center>
	<center><br><input type="text" name="apellido2" value=''></center>

	<br><center>Contrase&ntilde;a:<br>Utilizar may&uacute;sculas, min&uacute;sculas y n&uacute;meros</center> <br>
	<center><input type="password" name="contra" value=''></center>

	<br><center> Correo electr&oacute;nico: </center><br>
	<center><input type="text" name="correo" value=''></center> 

	<br><center> Localidad:</center> <br>
	<center><input type="text" name="localidad" value=''></center>

	<br><center> Indica el tipo de via:</center> <br>
	<center><input type="radio" checked name="tipo" value='calle'> Calle</center> 
	<center><input type="radio" name="tipo" value='plaza'> Plaza </center>
	<center><input type="radio" name="tipo" value='barrio'> Barrio </center><br>

	<br><center> Nombre de la v&iacute;a:</center> <br>
	<center><input type="text" name="via" value=''></center>

	<br><center> N&uacute;mero del edificio:</center>
	<center><input type="text" name="edificio" value='' size='5'></center>
	<center> N&uacute;mero de la puerta:</center> 
	<center><input type="text" name="puerta" value='' size='5'></center>
	<center> N&uacute;mero de la planta:</center> 
	<center><input type="text" name="planta" value='' size='5'></center>



	<br><center> Elige sexo:</center> <br>
	<center><input type="radio" checked name="sexo" value='Hombre'> Hombre</center> 
	<center><input type="radio" name="sexo" value='Mujer'> Mujer </center><br>

	<center><input type="submit" value="Enviar"></center><br>
	<center><input type="reset" value="Borrar"></center>


</form>

<?

Cierre();

?>