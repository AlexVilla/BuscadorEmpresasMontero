<!DOCTYPE html>
<?php
include 'inc/function.php';
	$function = new Reads;
	if (isset($_POST['empresa'])) {
	    $par = trim($_POST['empresa']);
	    $fun2 = $function->read_empresa_by_name($par);
		$fun = $function->contar_calificacion(strtoupper($par));
	}
?>

<html lang="es">
<head>
   <?php include 'inc/common_head.php'; ?>
   <style>
    .info-empresas{
        margin-left: 0 !important;
    }
    .info-empresas h3{
        margin-left: 124px !important;
        margin-bottom: 30px;
    }
   </style>
</head>
<body>
    <a href="index.php">Home</a><br>
    <a href="insert-entidad.php">Agregar entiedad</a><br>
    <a href="insert-categoria.php">Agregar Categoria</a>
    <div class="row formulario-ingreso">
        <form role="form" method="POST">
          <div class="form-group">
            <label for="nombreEntidad">Nombre de Empresa a Buscar</label>
            <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Nombre o rol de empresa a buscar" required>
          </div>

          <button type="submit" class="btn btn-default">Buscar info</button>
        </form>
        </div>

    <div class="info-empresas text-left">
    
    <?php 
    #Validamos si la empresa existe o no, y en el caso de existir que contenga notas
    if (!empty($fun2) AND empty($fun)) { ?>
        <h3>No hay notas para esta empresa</h3> 
    <?php }elseif (empty($fun2) AND empty($fun) AND isset($_POST['empresa'])) { ?>
        <h3>No existe esta empresa</h3>      
    <?php } 
    elseif (!empty($fun)) { ?>
        <h3><?php  echo $fun[0]['nombre_empresa']; ?> </h3>
        

        <div class="container">
            <div id="canvas-holder">
                <!-- <canvas id="chart-area" width="300" height="300"></canvas> -->
                <!-- <canvas id="chart-area2" width="300" height="300"></canvas> -->
                <canvas id="chart-area3" width="400" height="100"></canvas>
            </div>
        </div>     
    </div>
   <?php } ?>
<!--    Importamos las scripts al final de la pagina-->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script>

    var barChartData = {
        labels : ["Nota 1","Nota 2","Nota 3","Nota 4","Nota 5","Nota 6","Nota 7","Nota 8","Nota 9","Nota 10"],
        datasets : [

            {
                fillColor : "#e9e225",
                strokeColor : "#ffffff",
                highlightFill : "#ee7f49",
                highlightStroke : "#ffffff",
                data :[
                    <?php 
                        for ($i=0; $i<10 ; $i++) {
                            $j = $i + 1;
                            $flag = false;
                            for ($k=0; $k < count($fun) ; $k++) { 
                                if($fun[$k]['nota']==$j ){
                                    $flag = true;
                                    echo $fun[$k]['cantidad'].',';
                                }
                            }

                            if(!$flag){
                                 echo "0,";
                            }
                        } ?>
                ]
            }
        ]
            }
    
// var ctx = document.getElementById("chart-area").getContext("2d");
//var ctx2 = document.getElementById("chart-area2").getContext("2d");
var ctx3 = document.getElementById("chart-area3").getContext("2d");
// window.myPie = new Chart(ctx).Pie(pieData); 
// window.myPie = new Chart(ctx2).Doughnut(pieData);               
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
</script>
</body>
</html>