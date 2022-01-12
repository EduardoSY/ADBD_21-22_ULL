<?php

$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
//Etapa1. Crear la variable $db y asignar a la cadena de conexión
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
$url_id = $_GET['id'];
$result = $db->query("SELECT * FROM `PRODUCTOS` WHERE ID='$url_id'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
  <title>ADBD P6 - PRODUCTOS</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="products-edit.css">
  <link rel="icon" href="../../assets/images/image.png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style type="text/css">
  label{
    width:100px;
    display: inline-block;
  }

  #form{
    border-radius: 10px;
    width:290px;
    padding:4px;
  }
</style>
</head>

<body style="margin: 10px; padding:0;">
  <div class="header">
    <h2>Añadir producto</h2>
  </div>
  <hr>
  <form method="post" action="insert.php">
    <div class="form-group">
      <label>Nombre *</label>
      <input type="text" name="nombre" placeholder="Nombre del producto" required>
    </div>
    <div class="form-group">
      <label>Stock *</label>
      <input type="number" name="stock" min=1 placeholder="Cantidad disponible" required>
    </div>
    <div class="form-group">
      <label>Precio *</label>
      <input type="number" name="precio" min=0.01 step=0.01 placeholder="Precio de venta" required>
    </div>
    <div class="form-group">
      <label>Familia *</label>
      <input type="text" name="familia" placeholder="Familia del producto"  required>
    </div>
    <div class="form-group">
      <label>Descripción</label>
      <input type="text" name="descripcion" placeholder="Descripción del producto">
    </div>
    <div class="form-group">
      <label>Tamaño</label>
      <input type="number" name="size" min=0.01 step=0.01 placeholder="Tamaño">
    </div>
    <div class="form-group">
      <label>Peso</label>
      <input type="number" name="peso" min=0.001 step=0.01 placeholder="Peso en Kg">
    </div>
    <div class="form-group">
      <label>Imagen</label>
      <input type="file" name="imagen">
    </div>
    <input type="submit" name="submit" value="Insertar" class="btn btn-primary">
    <a class="btn btn-outline-danger" href="../../index.php">Volver sin guardar</a>
  </form>
</body>

</html>

<?php

//Etapa 4. Cierre conexión
mysqli_close($db);
?>