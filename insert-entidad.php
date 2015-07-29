<!DOCTYPE html>
<html lang="es">
<head>
    <title>Insert Entidad</title>
	<?php include 'inc/common_head.php'; ?>
</head>

<?php 
  include 'inc/function.php';
  $function = new Reads;
  $fun = $function->read_all_categories();
  

  if (isset($_POST['nombreEntidad']) AND isset($_POST['Categoria'])) {
    $function2 = new Insert;
    $ins = $function2->insert_entidad($_POST['nombreEntidad'], $_POST['Categoria']);
  }
?>


<body>
    <a href="index.php">Home</a><br>
    <a href="graficos.php">Graficos</a><br>
    <a href="insert-categoria.php">Categoria</a>
    <div class="row formulario-ingreso">
        <form role="form" method="POST">
          <div class="form-group">
            <label for="nombreEntidad">Ingrese nueva Empresa</label>
            <input type="text" class="form-control" id="ejemplo_email_1" name="nombreEntidad" 
                   placeholder="Nombre o rol de empresa" required>
          </div>
            <label for="Categoria">Tipo empresa</label>
          <div class="select">
            <select class="form-control" name="Categoria">
              <option selected></option>
            <?php 
              for ($i=0; $i < count($fun) ; $i++) { 
                echo '<option value="'.$fun[$i]['idCategoria'].'">'. $fun[$i]['tipo'].'</option>';
              }
             ?> 
            </select>
          </div>
            <br>
          <button type="submit" class="btn btn-default">Insertar Nuevo</button>
        </form>
        </div>
<!--    Importamos las scripts al final de la pagina-->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
</body>
</html>
