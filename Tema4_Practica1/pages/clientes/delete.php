<?php

$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
//Etapa1. Crear la variable $db y asignar a la cadena de conexión
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
$url_email = $_GET['email'];
echo "Hola";
echo $url_email;
$sql = "DELETE FROM CLIENTES WHERE email='$url_email'";
  // $sqltest = "INSERT INTO `CLIENTES` (`email`, `DNI`, `CP`, `tlfno`, `nombre`, `apellido`) VALUES ('pacotest@gmail.com', '39871554Y', '38111', 933961861 , 'Pacotest', 'Goomez')";
  if ($db->query($sql) === TRUE) {
    echo "Cliente eliminado con exito";
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }

mysqli_close($db);
?>