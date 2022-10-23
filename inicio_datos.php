<?

    include("funciones.php");
    Encabezado();

?>

<?

$nombre=$_POST['usu'];
$contra=$_POST['contra'];


# $mysql_server="localhost";
# $mysql_login="pepe";
# $mysql_pass="pepa"; 

if($conexion=mysql_connect ("localhost","root","")){   
        #echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 
       mysql_select_db("b3_web",$conexion);   

        
        
   if(strlen($nombre)==0 OR strlen($contra)==0){

      echo "No has rellenado todos los campos. Rev&iacute;salo.<br> Vuelve a la <a href='inicio.php'>p&aacute;gina de inicio</a>";


   }else{

      $resultado=mysql_query("SELECT contrasena FROM usuarios WHERE nombre='$nombre'",$conexion);

      if ($resultado) {
       echo "Resultados obtenidos<br>";
        $fila=mysql_fetch_row($resultado); 
        /*strlen longitud de fila con if para saber si el usuario exite no no*/
        if ($contra==$fila[0]) {
          echo "HAS ENTRADO. Ve a la <a href='pagina.php'>p&aacute;gina principal.</a>";
          echo " Bienvenido ".$nombre.".";

          setcookie("nombre","$nombre",time()+3600);

      
          

        }else{
          echo "No es correcto. Vuelve a la <a href='inicio.php'>p&aacute;gina de inicio</a><h2>";
        }

    }else{
      echo "Usuario inexistente. Vuelve a la <a href='inicio.php'>p&aacute;gina de inicio</a><br>";
    }
  }
    
}else{
  echo "No se ha podido establecer la conexi&oacute;n";
}
   
     if($c=mysql_close($conexion)){
         # print "<br>Conexi&oacute;n cerrada<br>";
    }else{
        print "<br>No ha podido cerrarse la conexi&oacute;n<br>";
 }



 Cierre();
?>
