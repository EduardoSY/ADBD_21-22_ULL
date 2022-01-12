<?php
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
if(isset($_POST['update']))
{    
  $email = $_POST['email'];
  $DNI = $_POST['DNI'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tlfno = $_POST['tlfno'];
  $CP = $_POST['CP'];
  
  // echo $email."\n";
  // echo $DNI."\n";
  // echo $nombre."\n";
  // echo $apellido."\n";
  // echo $tfno."\n";
  // echo $CP."\n";

  $sql = "UPDATE CLIENTES SET DNI='$DNI', CP='$CP', tlfno='$tlfno', nombre='$nombre', apellido='$apellido' WHERE email='$email'";
  if ($db->query($sql) === TRUE) {
    echo'<script type="text/javascript">
    alert("Cliente actualizado exitosamente");
    window.location.href="clientes.php";
    </script>';
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }
}
mysqli_close($db);
?>