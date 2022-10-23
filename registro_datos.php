<?

    include("funciones.php");
    Encabezado();

?>


<?

$usu=$_POST['usu2'];
$nombre_r=$_POST['nombre_real'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$contra=$_POST['contra'];
$correo=$_POST['correo'];
$localidad=$_POST['localidad'];
$tipo=$_POST['tipo'];
$via=$_POST['via'];
$edificio=$_POST['edificio'];
$puerta=$_POST['puerta'];
$planta=$_POST['planta'];
$sexo=$_POST['sexo'];


$contrabuena=strlen($contra);

# echo $contrabuena;

$vector[1]=0;
$vector[2]=0;
$vector[3]=0;

for($i=0; $i<=$contrabuena; $i++) {
    $b=substr($contra,$i,1);
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



    

#   48-57#  65-90#  97-122
}

    # echo $vector[1];
    # echo $vector[2];
    # echo $vector[3];








$consulta="INSERT b3_web.usuarios (nombre,nombre_real,apellido1,apellido2,contrasena,correo,localidad,tipo,via,edificio,puerta,planta,sexo,saldo) VALUES 
('".$usu."','".$nombre_r."','".$apellido1."','".$apellido2."','".$contra."','".$correo."','".$localidad."','".$tipo."','".$via."','".$edificio."','".$puerta."','".$planta."','".$sexo."','0')";



 # echo "<br><br>".$usu.",".$apellido1.",".$apellido2.",".$contra.",".$correo.",".$localidad.",".$tipo.",".$via.",".$edificio.",".$puerta.",".$planta.",".$sexo."<br>";



if($conexion=mysql_connect ("localhost","root","")){  
     #   echo "<h2> Conexi&oacute;n establecida con el servidor</h2><br>";  
    
    if(strlen($usu)==0 OR strlen($nombre_r)==0 OR strlen($apellido1)==0 OR strlen($apellido2)==0 OR strlen($contra)==0 OR strlen($correo)==0 OR strlen($localidad)==0 OR strlen($tipo)==0 OR strlen($via)==0 OR strlen($edificio)==0 OR strlen($puerta)==0 OR strlen($planta)==0 OR strlen($sexo)==0){
        echo "No has rellenado todos los campos. Rev&iacute;salo<br>";
        echo "Vuelva a la <a href='register.php'>p&aacute;gina de registro</a> ";

    }else{

        mysql_select_db("b3_web",$conexion);   

        $resultado=mysql_query("SELECT nombre FROM usuarios WHERE nombre='$usu'",$conexion);
        $fila=mysql_fetch_row($resultado);
        # echo $usu.", ".$fila[0]."<br>";

        if ($fila[0]==$usu) {
            
            echo "Este nombre ya est&aacute; en uso. Vuelve la <a href='register.php'>p&aacute;gina de registro</a>";

        }else{
                
            echo "Nombre de usuario v&aacute;lido. Hola ".$usu."<br>";
       

        if ($vector[1]==0 OR $vector[2]==0 OR $vector[3]==0) {
                echo "Comprueba tu contrase&ntilde;a. No cumple los requisitos, comprueba 
                que has usado may&uacute;sculas, min&uacute;sculas y n&uacute;meros.<br> Vuelve la <a href='register.php'>p&aacute;gina de registro</a>";
        }else{

        	echo " Tu contrase&ntilde;a es valida<br>";

           if(mysql_query($consulta,$conexion)){
            # print "Se han introducido tus datos de la tabla usuarios de la base B3 web";
            echo "Te has registrado correctamente.<br>Inicia sesi&oacute;n <a href='inicio.php'>aqu&iacute;</a>";






        
            }else{
            print "Se ha producido un error al introducir los datos de la tabla usuarios";
            } 
        }
        }        


    }

}else{
    echo "<h2> NO HA SIDO POSIBLE ESTABLECER LA CONEXIÓN</h2>";  
}
 


    if(mysql_close($conexion)){  
    # echo "<h2> Conexi&oacute;n cerrada con exito</h2><br>";  
    # echo "El identificador de conexion es:",$conexion; 

      }else{  
        echo "<h2> No se ha cerrado la conexión</h2>";  
    } 
     











 	    
        





      



Cierre();


?>

