<!DOCTYPE html>
<html>
  <head>
    <title>Eliminar cliente</title>
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

$url_email = $_GET['email'];

$sql = "DELETE FROM CLIENTES WHERE email='$url_email'";
  if ($db->query($sql) === TRUE) {
    echo'<script type="text/javascript">
    alert("Cliente eliminado exitosamente");
    window.location.href="clientes.php";
    </script>';
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }

mysqli_close($db);
?>