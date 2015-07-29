<!DOCTYPE>
<html>
<head>
    <title>Puntuador</title>
<!--    importamos los elementos css de la pagina-->
    <?php 
    include 'inc/common_head.php'; 
    include 'inc/function.php';
    ?>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script> 
</head>

<?php 
if (isset($_POST['point'])) {
  $function = new Insert;
  $ins = $function->insert_nota($_POST['id_empresa'],$_POST['point']);
}elseif (isset($_POST['empresa']) AND isset($_POST['id_empresa']) AND !isset($_POST['point'])) {
  echo "<script type='text/javascript'>
      alert('DEBE SELECCIONAR UNA NOTA PARA PODER CONTINUAR');
      </script> " ; 
}
 ?>
<body>
<div class="posicionador">
    <div class="container">
    <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="form-group"  style="text-aling: center;">
                    Buscador de Empresas
                    <form action="" method="post" name="search_form" id="search_form">
                        <input type="text" name="search" id="search" class="form-control">               
                    </form>
                </div>
                <div id="resultados"></div>
            </div>
        </div>
        <div class="col-md-3"></div>    
    </div>
</div>
    
    
<!--    Importamos las scripts al final de la pagina-->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
       

</body>
</html>