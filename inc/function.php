<?php  
	#Clase y Metodo para establecer la conexion
	class db_conect{
		
		function conectar(){

				$con = mysqli_connect("127.0.0.1","root","","db_montero_puntuacion");

				if ($con->connect_errno) {
    				printf("Connect failed: %s\n", $con->connect_error);
    				exit();
				}				
			return $con;
		}
	
	}
##############################################################################################
	# Clase y Metodo para las query
##############################################################################################

class Reads
{

	function __construct()
	{
		$this->empresas=array();
		$this->empresas2=array();
		$this->categorias=array();
		$this->calificaciones=array();
		$this->name_empresa=array();
		$this->resumen=array();
	}

	function read_all_empresas(){
	 	$cnx = new db_conect;
	 	$con=$cnx->conectar();
	 	
		$sql = "select nombre_empresa from di_empresa";
		$res = mysqli_query($con, $sql);


		while ($reg = mysqli_fetch_object($res))
                {
                    $empresas2[]=$reg->nombre_empresa;
                }
                return $empresas2;
        mysqli_close($con);
	}

	function read_all_categories(){
	 	$cnx = new db_conect;
	 	$con=$cnx->conectar();
	 	
		$sql = "select * from di_categoria order by tipo asc";
		$res = mysqli_query($con, $sql);


		while ($reg = mysqli_fetch_assoc($res))
                {
                    $this->categorias[]=$reg;                
                }
        return $this->categorias;
        mysqli_close($con);
	}

	function read_all_califications(){
		$cnx = new db_conect;
		$con=$cnx->conectar();
		
		$sql = "select * from di_calificacion order by idCalificacion asc";
		$res = mysqli_query($con, $sql);

		while ($reg = mysqli_fetch_assoc($res))
                {
                    $this->calificaciones[]=$reg;                
                }
	        return $this->calificaciones;
	        mysqli_close($con);	
		}

	function read_empresa_by_name($name){
		$cnx = new db_conect;
		$con=$cnx->conectar();
		
		$sql = "SELECT `nombre_empresa` FROM `di_empresa` WHERE `nombre_empresa` LIKE '".$name."'";
		$res = mysqli_query($con, $sql);

		while ($reg = mysqli_fetch_assoc($res))
                {
                    $this->name_empresa[]=$reg;                
                }
	        return $this->name_empresa;
	        mysqli_close($con);	
		}

	function contar_calificacion($nombre){
		$cnx = new db_conect;
		$con=$cnx->conectar();
		
		$sql = "SELECT nombre_empresa, valor as 'nota', count(valor) as 'cantidad' FROM `di_calificacion` NATURAL JOIN `di_empresa` WHERE idEmpresa = di_Empresa_idEmpresa AND nombre_empresa LIKE '".$nombre."'group by valor order by nota";
		$res = mysqli_query($con, $sql);

		while ($reg = mysqli_fetch_assoc($res))
                {
                    $this->resumen[]=$reg;                
                }
	        return $this->resumen;
	        mysqli_close($con);	
		}
}

Class Insert{
	function insert_entidad($nombre_empresa, $id_categoria){
		$cnx = new db_conect;
		$con = $cnx->conectar();
		$ne = strtoupper($nombre_empresa);
		$sql = "INSERT INTO di_empresa values ('null','$ne','$id_categoria')";
		$res = mysqli_query($con, $sql);

		$error_code = addslashes(mysqli_errno($con));
		$error_msg = addslashes(mysqli_error($con));
		if ("0" != mysqli_errno($con)) {
			echo "<script type='text/javascript'>
			alert('ERROR $error_code : $error_msg');
			</script> "	;	
		}else {
			echo "<script type='text/javascript'>
			alert('Inserción realizada correctamente');
			</script> "	;	
		}
	}

	function insert_categoria($categoria){
		$cnx = new db_conect;
		$con = $cnx->conectar();
		$cat = ucfirst($categoria);
		$sql = "INSERT INTO di_categoria(idCategoria, tipo) values ('null','$cat')";
		$res = mysqli_query($con, $sql);
		$error_code = addslashes(mysqli_errno($con));
		$error_msg = addslashes(mysqli_error($con));
		if ("0" != mysqli_errno($con)) {
			echo "<script type='text/javascript'>
			alert('ERROR $error_code : $error_msg');
			</script> "	;	
		}else {
			echo "<script type='text/javascript'>
			alert('Inserción realizada correctamente');
			</script> "	;	
		}
	}

	function insert_nota($empresa, $nota){
		$cnx = new db_conect;
		$con = $cnx->conectar();
		$cat = ucfirst($categoria);
		$sql = "INSERT INTO di_calificacion(idCalificacion, valor, di_Empresa_idEmpresa) values ('null','".$nota."','".$empresa."' )";
		$res = mysqli_query($con, $sql);
		$error_code = addslashes(mysqli_errno($con));
		$error_msg = addslashes(mysqli_error($con));
		if ("0" != mysqli_errno($con)) {
			echo "<script type='text/javascript'>
			alert('ERROR $error_code : $error_msg');
			</script> "	;	
		}else {
			echo "<script type='text/javascript'>
			alert('Inserción realizada correctamente');
			</script> "	;	
		}
	}

}
