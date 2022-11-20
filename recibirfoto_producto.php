<?

    include("funciones.php");
    Encabezado();

?>
   
<?

/*******************************************************
         IMAGEN
        *******************************************************/
$id=$_POST['id'];

  if(!($_FILES['archivo']['type']=="image/pjpeg" OR 
                   $_FILES['archivo']['type']=="image/jpeg" OR 
                 $_FILES['archivo']['type']=="image/gif" OR
                 $_FILES['archivo']['type']=="image/jpg")){
     print "El formato ".$_FILES['archivo']['type'].
                                     " no est&aacute; permitido";
      echo "<br><a href='foto_usuario.php'>Prueba otra imagen</a>";
     exit();
 }else{
   print "El formato ".$_FILES['archivo']['type'].
                                     "  est&aacute; permitido";

              /*anidamos este segundo condicional
              para guardar en una variable
              la extensión real del fichero
              mas adelante la utilizaremos*/
  if ($_FILES['archivo']['type']=="image/pjpeg" OR
               $_FILES['archivo']['type']=="image/jpeg" ){
    $extension=".jpg";
  }else{
    $extension=".gif";
  }
 }


$base="b3_web";


$nuevo_nombre=$id;

$nuevo_nombre .=$extension;

$nuevo_nombre="img_productos/".$nuevo_nombre;

# echo $nuevo_nombre."<br>";



if ($_FILES['archivo']['tmp_name'] != "none" ){

  if (copy($_FILES['archivo']['tmp_name'], $nuevo_nombre)) {
                echo "<h2>Se ha transferido el archivo a htdocs</h2>"; 
      
    }else{
    echo "<h2>No ha podido transferirse el fichero</h2>";  
  }

}else{
  echo "hola";
}


/*******************************************************
      IMAGEN
*******************************************************/









if (file_exists('img_productos/'.$id.'.jpg')) {
              $imagen="img_productos/".$id.'.jpg';
  
  
            }elseif(file_exists('img_productos/'.$id.'.gif')){
               $imagen='img_productos/'.$id.'.gif';
  
          }else{
             $imagen="img_productos/imagendefecto.jpg";
          }

echo "Vuelve al <a href='misproductos.php'>inventario de tus productos</a><br>";






Cierre();
?>


