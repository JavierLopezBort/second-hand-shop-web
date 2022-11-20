<?
include("funciones.php");
    Encabezado();


?>
<h3>Introduce el saldo que quieres a&ntilde;adir</h3>
<form name="saldo" action="recibir_saldo.php" method="POST">
<select name="saldo"><br><br>

<option>5</option>
<option>10</option>
<option>20</option>
<option>50</option>
<option>100</option>
<option>500</option>



</select><br><br>
<input type="submit" name="Enviar">
<input type="reset" name="Borrar">





</form>
<?
Cierre();

?>