<?php 
include 'function.php';

$mtd = new Reads;
$name='US';
$empresa = $mtd->read_all_empresas();
$categoria = $mtd->read_all_categories();
$calificacion = $mtd->read_all_califications();
$empresa_name = $mtd->read_empresa_by_name($name);
$contar = $mtd->contar_calificacion($name);
echo "<pre>";
print_r ($empresa);
echo "<br/>";
print_r ($categoria);
echo "<br/>";
print_r ($calificacion);
echo "<br/>";
print_r ($empresa_name);
echo "<br/>";
print_r ($contar);
echo "</pre>";
 ?>