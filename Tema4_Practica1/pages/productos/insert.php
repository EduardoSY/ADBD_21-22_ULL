<!DOCTYPE html>
<html>
  <head>
    <title>Insertar producto</title>
    <meta charset="utf-8">
  </head>
  <body>
  </body>
</html>

<?php
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
if(isset($_POST['submit']))
{    
  $nombre = $_POST['nombre'];
  $familia = $_POST['familia'];
  $descripcion = $_POST['descripcion'];
  $stock = $_POST['stock'];
  $size = $_POST['size'];
  $precio = $_POST['precio'];
  $peso = $_POST['peso'];
  $imagen = null;
 
  if(!empty($_FILES["imagen"]["name"])) { 
    $foto= $_FILES["imagen"]["tmp_name"];
    $nombrefoto  = $_FILES["imagen"]["name"];
    $foto=mysql_real_escape_string(file_get_contents($_FILES["imagen"]["tmp_name"]));
    $imagen = $foto;
  }

  // Insertar en la db
  $sql = "INSERT INTO PRODUCTOS (nombre, familia, descripcion, stock, size, precio, peso, imagen) 
  VALUES ('$nombre','$familia','$descripcion', '$stock', '$size', '$precio', '$peso', '$imagen')";
  if ($db->query($sql) === TRUE) {
    echo'<script type="text/javascript">
    alert("Nuevo producto guardado correctamente");
    window.location.href="../../index.php";
    </script>';
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }
}
mysqli_close($db);
?>