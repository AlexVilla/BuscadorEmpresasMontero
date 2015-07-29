<?php 
	require_once('../conn/connect.php');

	//sleep(1);

	$search = '';
	if (isset($_POST['search'])){
		$search = strtolower($_POST['search']);
	}

	$consulta = "SELECT * FROM di_empresa natural join di_categoria WHERE Categoria_idCategoria = idCategoria AND nombre_empresa LIKE '%".$search."%'";
	$resultado = $connect->query($consulta);
	$fila = mysqli_fetch_assoc($resultado);
	$total = mysqli_num_rows($resultado);
?>
<?php if ($total>0 && $search!='') { ?>
	<h2>Resultados de la búsqueda</h2>
	<?php do { ?>
		<div class="art">
			<span class="titulo"><?php echo str_replace($search, '<strong>'.$search.'</strong>', utf8_encode($fila['nombre_empresa'])) ?></span><br>
			<span class="titulo"><?php echo str_replace($search, '<strong>'.$search.'</strong>', utf8_encode($fila['tipo'])) ?></span><br>
			<form class="form-inline" method="POST" action="validar_nota.php">
			<input type="hidden" name="empresa" value="<?php echo  $fila['nombre_empresa']?>">
			<input type="hidden" name="id_empresa" value="<?php echo $fila['idEmpresa'] ?>">
             <label>
                            <input type="radio" name="point" value="1">1
                            <input type="radio" name="point" value="2">2
                            <input type="radio" name="point" value="3">3
                            <input type="radio" name="point" value="4">4
                            <input type="radio" name="point" value="5">5
                            <input type="radio" name="point" value="6">6
                            <input type="radio" name="point" value="7">7
                            <input type="radio" name="point" value="8">8
                            <input type="radio" name="point" value="9">9
                            <input type="radio" name="point" value="10">10
                <button type="submit" class="btn btn-info">Puntuar</button>
            </form>
            </label>
		</div>
	<?php } while ($fila=mysqli_fetch_assoc($resultado)); ?>
<?php } 
elseif($total>0 && $search=='') echo '<h2>Ingresa un parámetro de búsqueda</h2><p>Ingresa palabras clave relacionadas con nombre de empresas</p>';
else echo '<h2>No se han encontrado resultados</h2><p>Inténta realizar tu búsqueda con palabras más especificas...</p>';
?>