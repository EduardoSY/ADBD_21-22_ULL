<?php

$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
//Etapa1. Crear la variable $db y asignar a la cadena de conexión
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');

// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('email','DNI','CP', 'tlfno', 'nombre', 'apellido');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// Get the result...
if ($result = $db->query('SELECT * FROM CLIENTES ORDER BY ' .  $column . ' ' . $sort_order)) {
  // Some variables we need for the table.
  $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order);
  $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
  $add_class = ' class="highlight"';
?>
<!DOCTYPE html>
  <html>

  <head>
    <title>ADBD P6 - CLIENTES</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <!--<link rel="icon" href="./assets/images/image.png" type="image/x-icon">-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  </head>

  <body style="margin:10px;padding:0;">
    <div class="header">
      <h1>SECCION DE CLIENTES REGISTRADOS</h1>
      <hr>
          <div>
            <a class="btn btn-primary" href="../../index.php">Productos</a>
            <a class="active btn btn-primary" href="clientes.php">Clientes</a>
            <a class="btn btn-primary" href="../compras/compras.php">Compras</a>
          </div>
       <hr>
    </div>
    <div class="buttonDiv">
      <a class="btn btn-outline-success" href="./new_cliente.php">Nuevo Cliente <i class="material-icons">person_add</i></a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Email</th>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Telefono</th>
          <th>Codigo Postal</th>
          <th style="text-align: center;">Compras</th>
          <th style="text-align: center;">Editar</th>
          <th style="text-align: center;">Eliminar</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($row = $result->fetch_assoc()) : ?>
        
          <tr>
            <td<?php echo $column == 'email' ? $add_class : ''; ?>><?php echo $row['email']; ?></td>
            <td<?php echo $column == 'DNI' ? $add_class : ''; ?>><?php echo $row['DNI']; ?></td>
            <td<?php echo $column == 'nombre' ? $add_class : ''; ?>><?php echo $row['nombre']; ?></td>
            <td<?php echo $column == 'apellido' ? $add_class : ''; ?>><?php echo $row['apellido']; ?></td>   
            <td<?php echo $column == 'tlfno' ? $add_class : ''; ?>><?php echo $row['tlfno']; ?></td>
            <td<?php echo $column == 'CP' ? $add_class : ''; ?>><?php echo $row['CP']; ?></td>
            <td style="text-align: center;"><a href="./compras_cliente.php?email=<?php echo $row['email']; ?>"><i class="material-icons">shopping_bag</i></a></td>
            <td style="text-align: center;"><a href="./edit_cliente.php?email=<?php echo $row['email']; ?>"><i class="material-icons">edit</i></a></td>
            <td style="text-align: center;"><a href="./delete.php?email=<?php echo $row['email']; ?>"><i class="material-icons">delete_forever</i></a></td>
          </tr>

        
        <?php endwhile; ?>
        <tbody>
    </table>
  </body>

  </html>
<?php
  $result->free();
}

//Etapa 4. Cierre conexión
mysqli_close($db);
?>