<?php

$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');

$columns = array('email','DNI','CP', 'tlfno', 'nombre', 'apellido');

// Cadenas para hacer la consulta ordenada
$action = '';    
$where = '';

if(isset($_GET["column"]))
{
    
     $column = $_GET["column"];
     $action = $_GET["action"]; 
    
    if($action == 'ASC')
     { 
        $action='DESC';
     }
     else  
     { 
        $action='ASC';
     }
        $where = " ORDER BY  $column $action ";
    }

if ($result = $db->query('SELECT * FROM CLIENTES  ' . $where)) {
?>
<!DOCTYPE html>
  <html>

  <head>
    <title>ADBD P6 - CLIENTES</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

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
          <!-- email, DNI, CP, tlfno, nombre, apellido -->
          <th><a style="color: black;" href="clientes.php?column=<?php echo 'email';?>&action=<?php echo $action;?>">Email<i class="fa fa-fw fa-sort"></i></a></th>
          <th>DNI</th>
          <th><a style="color: black;" href="clientes.php?column=<?php echo 'nombre';?>&action=<?php echo $action;?>">Nombre<i class="fa fa-fw fa-sort"></i></a></th>
          <th><a style="color: black;" href="clientes.php?column=<?php echo 'apellido';?>&action=<?php echo $action;?>">Apellido<i class="fa fa-fw fa-sort"></i></a></th>
          <th><a style="color: black;" href="clientes.php?column=<?php echo 'tlfno';?>&action=<?php echo $action;?>">Telefono<i class="fa fa-fw fa-sort"></i></a></th>
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

//Cierre conexión
mysqli_close($db);
?>