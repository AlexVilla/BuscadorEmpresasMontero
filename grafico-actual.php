<!DOCTYPE html>
<?php
include 'inc/function.php';
	$function = new Reads;
	if (isset($_POST['empresa'])) {
	    $par = trim($_POST['empresa']);
		$fun = $function->contar_calificacion(strtoupper($par));
	}
?>

<html lang="es">
<head>
   <?php include 'inc/common_head.php'; ?>
   <style>
    .info-empresas{
        margin-left: 0 !important;
        margin-top: 100px;
    }
    .info-empresas h1{
        margin-left: 124px !important;
        margin-bottom: 30px;
    }
   </style>
</head>

<body>
    <a href="index.php">Home</a><br>
    <div class="info-empresas text-left">
        <h1><?php  echo $fun[0]['nombre_empresa']; ?> </h1>
            <div class="container">
                <div id="canvas-holder">
                    <canvas id="chart-area3" width="400" height="100"></canvas>
                </div>
            </div>     
    </div>
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

var ctx3 = document.getElementById("chart-area3").getContext("2d");
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
</script>
</body>
</html>