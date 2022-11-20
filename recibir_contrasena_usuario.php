<?

    $cookie=$_COOKIE['nombre'];

  if (isset( $_COOKIE['nombre']) ) {

    include("funciones.php");
    Encabezado();




$contra_antigua=$_POST['contra_1'];
$contra_nueva=$_POST['contra_2'];



if($conexion=mysql_connect ("localhost","root","")){
	# echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>"; 

$base="b3_web";




mysql_select_db($base,$conexion); 

$resultado= mysql_query("SELECT contrasena FROM usuarios WHERE nombre='$cookie'" ,$conexion); 
$fila=mysql_fetch_row($resultado);


if (strlen($contra_antigua)==0 OR strlen($contra_nueva)==0){

  echo "Resultados incorrectos.<a href='contrasena_usuario.php'>Vuelve a intentarlo</a>";

  }else{



    if($fila[0]==$contra_antigua){

    

    /*****************************************
       Comprovación de la contraseña nueva

    ******************************************/
      $contra_nueva2=strlen($contra_nueva);

      # echo $contrabuena;

      $vector[1]=0;
      $vector[2]=0;
      $vector[3]=0;

      for($i=0; $i<=$contra_nueva2; $i++) {
      $b=substr($contra_nueva,$i,1);
      # echo "<br>";
      # echo $b."-->";

      $a=ord($b);
      $a=trim($a);

      # echo $a;



      if (48<=$a AND 57>=$a) {
          $vector[1]++;
      }
          if(65<=$a AND $a<=90) {
          $vector[2]++;
      }
          if(97<=$a AND $a<=122) {
          $vector[3]++;
      }


      }


      if ($vector[1]==0 OR $vector[2]==0 OR $vector[3]==0) {
                  echo "Comprueba tu contrase&ntilde;a. No cumple los requisitos, comprueba 
                  que has usado may&uacute;sculas, min&uacute;sculas y n&uacute;meros. 
                  <a href='contrasena_usuario.php'>Prueba otra </a>";
          }else{

            echo "Tu contrase&ntilde;a es v&aacute;lida<br>";
        
            echo "Tu contrase&ntilde;a se ha cambiado correctamente. 
            Vuelve a la <a href='pagina.php'>p&aacute;gina principal</a>";

             $resultado2= mysql_query("UPDATE usuarios SET contrasena='$contra_nueva' WHERE (nombre='$cookie')" ,$conexion);
      }

      

      }else{
      echo "La contrase&ntilde;a antigua no es correcta. <a href='contrasena_usuario.php'>Vuelve a intentarlo </a>";
  }   



  }
    







}else{
  echo "No ha sido posible establecer la conexión";
}


}else{
    echo "Tu tiempo de sesi&oacute;n ha expirado, vuelve a <a href='inicio.php'>iniciar sesi&oacute;n</a>";
}




Cierre();

?>