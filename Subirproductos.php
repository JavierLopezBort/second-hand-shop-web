<? 

  $cookie=$_COOKIE['nombre'];
  
?>

<?

    include("funciones.php");
    Encabezado();

?>
<?


if (isset( $_COOKIE['nombre']) ) {
 

?>

<h1>Sube tu producto aqu&iacute;</h1>

Vuelve a la <a href="pagina.php">p&aacute;gina principal</a><br><br>

<form name="subidaproductos" method="post" ENCTYPE="multipart/form-data" action="recibirproductos.php">

	<center>Nombre de producto:</center> <br>
	<center><input type="text" name="producto" value=''></center>

	<br><center> Tipo de producto</center> <br>

	<center><input type="radio" checked name="tipo" value='ropa'> Ropa</center><br>

	<center><input type="radio" name="tipo" value='hogar'> Hogar </center><br>

	<center><input type="radio" name="tipo" value='elec_video'> Electr&oacute;nica y videojuegos </center><br>

	<center><input type="radio" name="tipo" value='vehiculos'> Veh&iacute;culos </center><br>

	<center><input type="radio" name="tipo" value='deportes'> Deportes </center><br>

	<center><input type="radio" name="tipo" value='ind_emp_cien'> Industria, empresas y ciencia </center><br>

	<center><input type="radio" name="tipo" value='cine_tv_mus'> Cine, TV y m&uacute;sica </center><br>

	<center><input type="radio" name="tipo" value='libros'> Libros </center><br>

	<center><input type="radio" name="tipo" value='juguetes_bebe'> Juguetes y beb&eacute; </center><br>


	<br><center>Cantidad:</center> <br>
	<center><input type="text" name="cantidad" value=''></center>

	<br><center>Precio:</center> <br>
	<center><input type="text" name="precio" value=''></center>

	

	

	<br><br>

	<center><input type="submit" value="Enviar"></center><br>
	<center><input type="reset" value="Borrar"></center>

<?

}else{
		echo "Tu tiempo de sesi&oacute;n ha expirado, vuelve a <a href='inicio.php'>iniciar sesi&oacute;n</a>";
}


?>






</form>
</div>
</body>
</html>