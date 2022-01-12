<?php
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');
$url_email = $_GET['email'];
$result = $db->query("SELECT * FROM `COMPRAS` WHERE email='$url_email'");
?>

<!DOCTYPE html>
<html>

<head>
  <title>ADBD P6 - CLIENTES</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="products-edit.css">
  <link rel="icon" href="../../assets/images/image.png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="margin: 10px; padding:0;">
  <div class="buttonDiv">
    <a class="btn btn-outline-danger" href="clientes.php">Volver sin guardar</a>
  </div>
  <hr>
  <div class="header">
    <h2>Compras realizadas por el cliente con email: <?php echo $url_email; ?></h2>
  </div>
  <table class="table table-striped">
      <thead>
        <tr>
          <th>ID Compra</th>
          <th>ID PRODUCTO</th>
          <th>CLIENTE</th>
          <th>CANTIDAD</th>
          <th>PRECIO</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($row = $result->fetch_assoc()) : ?>
        
          <tr>
            <td<?php echo $column == 'IDPurchase' ? $add_class : ''; ?>><?php echo $row['IDPurchase']; ?></td>
            <td<?php echo $column == 'IDProduct' ? $add_class : ''; ?>><?php echo $row['IDProduct']; ?></td>
            <td<?php echo $column == 'email' ? $add_class : ''; ?>><?php echo $row['email']; ?></td>
            <td<?php echo $column == 'cantidad' ? $add_class : ''; ?>><?php echo $row['cantidad']; ?></td>   
            <td<?php echo $column == 'totalPrice' ? $add_class : ''; ?>><?php echo $row['totalPrice']; ?></td>
          </tr>
        <?php endwhile; ?>
        <tbody>
    </table>
</body>

</html>

<?php
mysqli_close($db);
?>