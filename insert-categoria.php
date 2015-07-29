<!DOCTYPE html>
<html lang="es">
<head>
    <title>Insert Entidad</title>
	<?php include 'inc/common_head.php'; ?>
</head>
<?php
  include 'inc/function.php';
  $function = new Insert;
  if (isset($_POST['InsCategoria'])) {
    $ins = $function->insert_categoria($_POST['InsCategoria']);
  }
?>

<body>
    <a href="index.php">Home</a><br>
    <a href="graficos.php">Graficos</a><br>
    <a href="insert-entidad.php">Entidades</a>
    <div class="row formulario-ingreso">
        <form role="form" method="POST">
          <div class="form-group">
            <label for="nombreEntidad">Ingrese una nueva Categoria</label>
            <input type="text" class="form-control" id="ejemplo_email_1"
                   placeholder="Nombre de la Categoria" name="InsCategoria" required>
          </div>
          <button type="submit" class="btn btn-default">Insertar</button>
        </form>
        </div>
<!--    Importamos las scripts al final de la pagina-->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
</body>
</html>
