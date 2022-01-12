<?php
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');

if ($result = $db->query('SELECT * FROM COMPRAS')) {
?>
<!DOCTYPE html>
  <html>

  <head>
    <title>ADBD P6 - COMPRAS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  </head>

  <body style="margin: 10px;padding:0;">
    <div class="header">
      <h1>HISTORIAL DE COMPRAS REALIZADAS</h1>
      <hr>
          <div>
            <a class="btn btn-primary" href="../../index.php">Productos</a>
            <a class="btn btn-primary" href="../clientes/clientes.php">Clientes</a>
            <a class="active btn btn-primary" href="compras.php">Compras</a>
          </div>
       <hr>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID Compra</th>
          <th>ID Producto</th>
          <th>Cliente</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($row = $result->fetch_assoc()) : ?>
        
          <tr>
            <td<?php echo $column == 'ID Compra' ? $add_class : ''; ?>><?php echo $row['IDPurchase']; ?></td>
            <td<?php echo $column == 'ID Producto' ? $add_class : ''; ?>><?php echo $row['IDProduct']; ?></td>
            <td<?php echo $column == 'Cliente' ? $add_class : ''; ?>><?php echo $row['email']; ?></td>
            <td<?php echo $column == 'Cantidad' ? $add_class : ''; ?>><?php echo $row['cantidad']; ?></td>   
            <td<?php echo $column == 'Precio' ? $add_class : ''; ?>><?php echo $row['totalPrice']; ?></td>
            <td<?php echo $column == 'Fecha' ? $add_class : ''; ?>><?php echo $row['fechaCompra']; ?></td>
          </tr>

        
        <?php endwhile; ?>
        <tbody>
    </table>
  </body>

  </html>
<?php
  $result->free();
}
mysqli_close($db);
?>