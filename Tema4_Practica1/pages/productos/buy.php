<?php
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
//Etapa1. Crear la variable $db y asignar a la cadena de conexión
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
if(isset($_POST['buy']))
{    
  $cantidad = $_POST['cantidad'];
  $valor_cliente = $_POST['select_clientes'];
  $precio = $_POST['precio'];
  $producto = $_POST['id_producto'];

  
  echo $cantidad;
  echo $valor_cliente;
  echo $precio;
  echo $producto;


  $sql = "INSERT INTO COMPRAS (email, IDProduct, cantidad, totalPrice, fechaCompra) VALUES ('$valor_cliente','$producto','$cantidad', '".$precio * $cantidad."', CURRENT_TIMESTAMP)";
  
  if ($db->query($sql) === TRUE) {
    //echo "New record has been added successfully !";
    echo'<script type="text/javascript">
    alert("Compra realizada exitosamente");
    window.location.href="../../index.php";
    </script>';
  } else {
    echo "Error: " . $sql . ":-" . mysqli_error($db);
  }
}
mysqli_close($db);
?>