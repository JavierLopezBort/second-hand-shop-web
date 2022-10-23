<?


  $cookie=$_COOKIE['nombre'];

  if (isset( $_COOKIE['nombre']) ) {

    include("funciones.php");
    Encabezado();
    $id=$_GET['id'];

    echo"<br><center>&#191Est&aacute;s segur@ de comprar este producto?<br>";
    echo "<center><a href='comprar.php?id=".$id."'><input type='button' name='si' value='Si'></a> <a href='inventario.php'><input type='button' name='no' value='No'></a><br><BR>" ;
}

?>