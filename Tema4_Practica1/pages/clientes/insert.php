<?php
// Credenciales y conexion 
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
if(isset($_POST['submit']))
{    
  $email = $_POST['email'];
  $DNI = $_POST['DNI'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tlfno = $_POST['tlfno'];
  $CP = $_POST['CP'];
  
  // Sentencia a insertar en db
  $sql = "INSERT INTO CLIENTES (email, DNI, CP, tlfno, nombre, apellido) VALUES ('$email','$DNI','$CP', '$tlfno', '$nombre', '$apellido')";
  if ($db->query($sql) === TRUE) {
    echo'<script type="text/javascript">
    alert("Nuevo cliente guardado exitosamente");
    window.location.href="clientes.php";
    </script>';
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }
}
mysqli_close($db);
?>