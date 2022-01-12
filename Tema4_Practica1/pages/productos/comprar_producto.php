<?php

$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
//Etapa1. Crear la variable $db y asignar a la cadena de conexión
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
$url_id = $_GET['id'];
$result = $db->query("SELECT * FROM `PRODUCTOS` WHERE id='$url_id'");
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
    width:150px;
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
    <h2>Comprando el articulo <?php echo $url_id; ?> : <?php echo $row['nombre']; ?></h2>
  </div>
  <hr>
  <form method="post" action="buy.php" 
  oninput="precio_final.value=(parseFloat(cantidad.value)*parseFloat(<?php echo $row['precio']; ?>)).toFixed(2)">
  <div class="form-group">
      <label>Precio por unidad</label>
      <input name="precio" type="number" placeholder="precio" value="<?php echo $row['precio']; ?>" readonly required>
    </div>
    <div class="form-group">
      <label>Cantidad</label>
      <input name="cantidad" type="number" placeholder="Cantidad" min="1" max="<?php echo $row['stock']; ?>" required>
    </div>
    <div class="form-group">
      <label>Asignar a cliente:</label>
      <select name="select_clientes" required>
        <option value="" disable>Seleccione:</option>
        <?php
// Realizamos la consulta para extraer los datos
          $query = $db -> query ("SELECT * FROM CLIENTES");
          while ($valores = mysqli_fetch_array($query)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
            echo '<option value="'.$valores[email].'">'.$valores[nombre].' '.$valores[apellido].'</option>';
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label>Precio total (€): </label>
      <output name="precio_final">
      </div>
    
    <input type="hidden" name="id_producto" value="<?php echo $url_id; ?>">  
    <input type="submit" name="buy" value="Comprar" class="btn btn-primary">
    <a class="btn btn-outline-danger" href="../../index.php">Volver sin guardar</a>
  </form>
</body>

</html>

<?php
mysqli_close($db);
?>