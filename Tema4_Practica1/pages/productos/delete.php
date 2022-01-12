<!DOCTYPE html>
<html>
  <head>
    <title>Eliminar producto</title>
    <meta charset="utf-8">
  </head>
  <body>
  </body>
</html>

<?php
//INSERT INTO `app_web_adbd`.`PRODUCTOS` (`ID`, `nombre`, `familia`, `descripcion`, `stock`, `size`, `precio`, `peso`, `image`) VALUES (DEFAULT, 'iPhone 13 Pro Max', 'Movil', NULL, 56, 45.57, 1000.43, 48, NULL);
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
//Etapa1. Crear la variable $db y asignar a la cadena de conexión
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');

$url_id = $_GET['id'];

$sql = "DELETE FROM PRODUCTOS WHERE id='$url_id'";
  if ($db->query($sql) === TRUE) {
    echo'<script type="text/javascript">
    alert("Producto eliminado correctamente");
    window.location.href="../../index.php";
    </script>';
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }

  

mysqli_close($db);
?>