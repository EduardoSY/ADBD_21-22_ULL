<?php
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
//Etapa1. Crear la variable $db y asignar a la cadena de conexión
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

  //email, dni cp tlfno, nombre apellido
  //$sql = "INSERT INTO CLIENTES (email, DNI, CP, tlfno, nombre, apellido) VALUES ('$email','$DNI','$CP', '$tlfno', '$nombre', '$apellido')";
  // $sqltest = "INSERT INTO `CLIENTES` (`email`, `DNI`, `CP`, `tlfno`, `nombre`, `apellido`) VALUES ('pacotest@gmail.com', '39871554Y', '38111', 933961861 , 'Pacotest', 'Goomez')";
  $sql = "UPDATE PRODUCTOS SET nombre='$nombre', familia='$familia', descripcion='$descripcion', stock='$stock', precio='$precio', peso='$peso' WHERE ID='$id'";
  if ($db->query($sql) === TRUE) {
    //echo "New record has been added successfully !";
    echo'<script type="text/javascript">
    alert("Producto actualizado exitosamente");
    window.location.href="../../index.php";
    </script>';
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }
}
echo "Fail";
mysqli_close($db);
?>