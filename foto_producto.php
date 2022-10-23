<?
	$id=$_GET[id];
    include("funciones.php");
    Encabezado();

?>
	 Vuelve al <a href='misproductos.php'>inventario de tus productos</a><br>

<form ENCTYPE="multipart/form-data" ACTION="recibirfoto_producto.php" METHOD="post">

<h1>Seleccionar foto producto</h1>
<input type="hidden" name="id" value="<? echo $id ?>">
<input type="file" name="archivo"><br><br>
<input type="submit" name="Enviar" value="Aceptar">





</form>

<?
	Cierre();
?>