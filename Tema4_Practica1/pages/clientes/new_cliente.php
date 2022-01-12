<!DOCTYPE html>
<html>

<head>
  <title>ADBD P6 - CLIENTES</title>
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
    <h2>Añadir cliente</h2>
  </div>
  <hr>
  <form action="insert.php" method="post">
    <div class="form-group">
      <label>Email*</label>
      <input type="email" name="email" placeholder="Email del cliente"  required>
    </div>
    <div class="form-group">
      <label>DNI*</label>
      <input type="text" placeholder="DNI" name="DNI" maxlenght="9" minlenght="9" required>
    </div>
    <div class="form-group">
      <label>Nombre*</label>
      <input type="text" name="nombre" placeholder="Nombre del cliente" required>
    </div>
    <div class="form-group">
      <label>Apellido*</label>
      <input type="text" name="apellido" placeholder="Apellido del cliente" required>
    </div>
    <div class="form-group">
      <label>Telefono</label>
      <input type="tel" name="tlfno" placeholder="Telefono del cliente">
    </div>
    <div class="form-group">
      <label>Código Postal</label>
      <input type="text" name="CP" placeholder="Ej. 38312">
    </div>
    <input type="submit" name="submit" value="Subir" class="btn btn-primary">
    <a class="btn btn-outline-danger" href="clientes.php">Volver sin guardar</a>
  </form>
</body>

</html>