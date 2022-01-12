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
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
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