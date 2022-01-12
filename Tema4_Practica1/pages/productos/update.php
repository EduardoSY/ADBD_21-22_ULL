<?php
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
if(isset($_POST['update']))
{    
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $familia = $_POST['familia'];
  $descripcion = $_POST['descripcion'];
  $stock = $_POST['stock'];
  $size = $_POST['size'];
  $precio = $_POST['precio'];
  $peso = $_POST['peso'];

  $sql = "UPDATE PRODUCTOS SET nombre='$nombre', familia='$familia', descripcion='$descripcion', stock='$stock', precio='$precio', peso='$peso' WHERE ID='$id'";
  if ($db->query($sql) === TRUE) {
    echo'<script type="text/javascript">
    alert("Producto actualizado exitosamente");
    window.location.href="../../index.php";
    </script>';
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }
}
mysqli_close($db);
?>