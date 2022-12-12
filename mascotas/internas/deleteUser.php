<?php
 	include("../dll/config.php");
 	include("../dll/class_mysqli.php");
 	$miconexion= new class_mysqli();
 	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

	$idUser=$_GET['pepito'];



	$sql="delete from personal where id=$idUser";
	//$sql="update personal set nombres='Daniela', apellidos='Pardo' where id=7";

	$resSQL=$miconexion->consulta($sql);
	if ($resSQL=="") {
		echo "Problemas de ejecución del SQL";
	}else{
		echo '<script>alert("Sentencia ejecutada..");</script>';
		echo "<script>location.href='personal.php'</script>";
	}



	

?>