<?php
// Credenciales y conectar con la db
$user = "app_user";
$password = "4ppUs3.r";
$database = "app_web_adbd";
$db = mysqli_connect("localhost", $user, $password, $database) or die('Error al conectar al servidor MySQL.');

$columns = array('ID','nombre','familia', 'descripcion', 'stock', 'size', 'precio', 'peso');

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

// Resultado de la consulta
if ($result = $db->query('SELECT * FROM PRODUCTOS ' . $where)) {
?>
<!DOCTYPE html>
  <html>

  <head>
    <title>ADBD P6 - PRODUCTOS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  
  <!-- BODY -->
  <body style="margin: 10px;padding:0;">
    <div class="header">
      <h1>SECCION DE PRODUCTOS</h1>
        <hr>
          <div>
            <a class="active btn btn-primary" href="./index.php">Productos</a>
            <a class="btn btn-primary" href="./pages/clientes/clientes.php">Clientes</a>
            <a class="btn btn-primary" href="./pages/compras/compras.php">Compras</a>
          </div>
       <hr>
    </div>
 
    <div class="buttonDiv">
      <a class="btn btn-outline-success" href="./pages/productos/new_producto.php">Añadir producto</a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th><a style="color: black;" href="index.php?column=<?php echo 'id';?>&action=<?php echo $action;?>">ID<i class="fa fa-fw fa-sort"></i></a></th>
          <th>Imagen</th>
          <th><a style="color: black;" href="index.php?column=<?php echo 'nombre';?>&action=<?php echo $action;?>">Nombre<i class="fa fa-fw fa-sort"></i></a></th>
          <th><a style="color: black;" href="index.php?column=<?php echo 'familia';?>&action=<?php echo $action;?>">Familia<i class="fa fa-fw fa-sort"></i></a></th>
          <th>Descripción</th>
          <th><a style="color: black;" href="index.php?column=<?php echo 'stock';?>&action=<?php echo $action;?>">Stock<i class="fa fa-fw fa-sort"></i></a></th>
          <th><a style="color: black;" href="index.php?column=<?php echo 'size';?>&action=<?php echo $action;?>">Tamaño<i class="fa fa-fw fa-sort"></i></a></th>
          <th><a style="color: black;" href="index.php?column=<?php echo 'precio';?>&action=<?php echo $action;?>">Precio €<i class="fa fa-fw fa-sort"></i></a></th>
          <th><a style="color: black;" href="index.php?column=<?php echo 'peso';?>&action=<?php echo $action;?>">Peso<i class="fa fa-fw fa-sort"></i></a></th>
          <th style="text-align: center;">Comprar</th>
          <th style="text-align: center;">Editar</th>
          <th style="text-align: center;">Eliminar</th>
        </tr>
      </thead>
      <tbody>
      <!-- Insertar los productos en la tabla -->
      <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td<?php echo $column == 'ID' ? $add_class : ''; ?>><?php echo $row['ID']; ?></td>
            <td<?php echo $column == 'Imagen' ? $add_class : ''; ?>><img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" /></td>
            <td<?php echo $column == 'nombre' ? $add_class : ''; ?>><?php echo $row['nombre']; ?></td>
            <td<?php echo $column == 'familia' ? $add_class : ''; ?>><?php echo $row['familia']; ?></td>
            <td<?php echo $column == 'descripcion' ? $add_class : ''; ?>><?php echo $row['descripcion']; ?></td>
            <td<?php echo $column == 'stock' ? $add_class : ''; ?>><?php echo $row['stock']; ?></td>
            <td<?php echo $column == 'size' ? $add_class : ''; ?>><?php echo $row['size']; ?></td>
            <td<?php echo $column == 'precio' ? $add_class : ''; ?>><?php echo $row['precio']; ?></td>
            <td<?php echo $column == 'peso' ? $add_class : ''; ?>><?php echo $row['peso']; ?></td>
            <td style="text-align: center;"><a href="./pages/productos/comprar_producto.php?id=<?php echo $row['ID']; ?>"><i class="material-icons">shopping_cart</i></a></td>
            <td style="text-align: center;"><a href="./pages/productos/edit_productos.php?id=<?php echo $row['ID']; ?>"><i class="material-icons">edit</i></a></td>
            <td style="text-align: center;"><a href="./pages/productos/delete.php?id=<?php echo $row['ID']; ?>"><i class="material-icons">delete_forever</i></a></td>
          </tr>
        <?php endwhile; ?>
        <tbody>
    </table>
  </body>

  </html>
<?php
  $result->free();
}
// Cerrar conexion
mysqli_close($db);
?>