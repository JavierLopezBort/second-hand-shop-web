<?

  $cookie=$_COOKIE['nombre'];

  if (isset( $_COOKIE['nombre']) ) {


?>



<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="General.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="inventario.css" media="screen" />
    
</head>
<title></title>
    <body><center>
        <div class="logo">
            <img class="img_logo" src="Logo.jpg">
        </div>  
    </center>
    <div class="text">
            Bueno, bonito, barato
        </div>
        <br>
<div class="general">

<?

$id=$_GET['id'];



if($conexion=mysql_connect ("localhost","root","")){


$base="b3_web";




mysql_select_db($base,$conexion); 


 $resultado= mysql_query("SELECT producto, tipo, cantidad, precio, estado, vendedor, ID FROM productos WHERE (ID='$id')" ,$conexion); 
 if ($resultado) {
       
        /*hay dos traductores para traducir 
        mysql_fetch_array
        mysql_fetch_row 
*/
                 while($fila=mysql_fetch_row($resultado)){
                       $producto=$fila[0];
                       $cantidad=$fila[2];
                       $precio=$fila[3];
                       $estado=$fila[4];
                       $vendedor=$fila[5];
                       $ID=$fila[6];
                         
                 }
        
    }
    }else{
      echo "Consulta desastosa<br>";
    }

    $resultado2= mysql_query("SELECT nombre, saldo FROM usuarios WHERE (nombre='$cookie')" ,$conexion); 
 if ($resultado2) {
     
        /*hay dos traductores para traducir 
        mysql_fetch_array
        mysql_fetch_row */

                 while($fila2=mysql_fetch_row($resultado2)){
                       $comprador=$fila2[0];
                       $saldo1=$fila2[1];
                      
                 }

        
    }
    }else{
      echo "Consulta desastosa<br>";
    }
$resultado2= mysql_query("SELECT nombre, saldo FROM usuarios WHERE (nombre='$vendedor')" ,$conexion); 
 if ($resultado2) {


                 while($fila2=mysql_fetch_row($resultado2)){
                       $comprador=$fila2[0];
                       $saldov=$fila2[1];
                     
                 }

        
   
    }else{
      echo "Consulta desastosa<br>";
    }


if ($cookie==$vendedor){
  echo "No esta permitido comprar su propio producto, gracias. ";
  echo "<a href='inventario.php'>Prueba otro productos</a>";


}else{

  if ($cantidad>0 AND $estado='disponible') {

 
    if ($saldo1>=$precio) {
      /* con esta condición se determina si se puede adquirir 
         economicamente el producto */
         
        
         $saldo=$saldo1-$precio;
         $saldovf=$saldov+$precio;
         
         echo "Su saldo actual es ".$saldo.".<br>";
         $resultado2= mysql_query("UPDATE usuarios SET saldo='$saldo' WHERE (nombre='$cookie')" ,$conexion);
         $resultadov= mysql_query("UPDATE usuarios SET saldo='$saldovf' WHERE (nombre='$vendedor')", $conexion);
         $resultadocomprador=mysql_query("UPDATE productos SET comprador='$cookie' WHERE(ID='$id')", $conexion);

              if ($resultado2){
                echo "Tu compra ha sido efectuada, se ha efectuado el cargo a su saldo. Antes era de ".$saldo1." y ahora es de ".$saldo."<br>";
              }else{
                echo "Tu saldo no se ha subido y es ".$saldo_inicial;
              }
                        
          $cantidad1=$cantidad-1;




       if ($cantidad1==0) {


            $resultado3= mysql_query("UPDATE productos SET cantidad='$cantidad1' WHERE (ID='$id')" ,$conexion);
             $resultado4= mysql_query("UPDATE productos SET estado='agotado' WHERE (ID='$id')" ,$conexion);


            echo "Vuelve a la <a href='inventario.php'>p&aacute;gina anterior</a> o a la <a href='pagina.php'>p&aacute;gina principal</a>.<br><br> ";

           
          }else{
            $consulta= mysql_query("UPDATE productos SET cantidad='$cantidad1' WHERE (id='$id')" ,$conexion);


         echo "Vuelve a la <a href='inventario.php'>p&aacute;gina anterior</a> o a la <a href='pagina.php'>p&aacute;gina principal</a>.<br><br> ";
            }

      }else{
         echo "No tiene saldo suficiente para comprar este producto.";
         echo "&#191;Quieres <a href='rellenar_saldo.php'>a&ntildeadir saldo</a>?";
          }

    }else{
      echo "El producto esta agotado. &#161;Vuelve a <a href='inventario.php'>inventario</a> para ver si te gusta alg&uacute;n producto m&aacute;s!";
    }
 }








?>