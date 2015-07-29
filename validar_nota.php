<meta charset="UTF-8">
<?php 
include 'inc/function.php';
if (isset($_POST['point'])) {
  $function = new Insert;
  $ins = $function->insert_nota($_POST['id_empresa'],$_POST['point']);
  echo "
		<form name=\"form\" action=\"grafico-actual.php\" method=\"POST\" accept-charset=\"utf-8\">
			<input type=\"hidden\" name=\"point\" value=\" ".$_POST['point']."\">
			<input type=\"hidden\" name=\"empresa\" value=\"".$_POST['empresa']."\">
			<input type=\"hidden\" name=\"id_empresa\" value=\"".$_POST['id_empresa']."\">
		</form>

		<script>
           document.form.submit();
		</script>
  "	;

}elseif (isset($_POST['empresa']) AND isset($_POST['id_empresa']) AND !isset($_POST['point'])) {
	echo "<script type='text/javascript'>
	    alert('DEBE SELECCIONAR UNA NOTA PARA PODER CONTINUAR');
	    window.location='index.php';
	    </script>"; 
}

 ?>

