<?php
 	include("../dll/config.php");
 	include("../dll/class_mysqli.php");
 	$miconexion= new class_mysqli();
 	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$cedula=$_POST['cedula'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$fechaNacimiento=$_POST['fechaNacimiento'];
	$correo=$_POST['correo'];

	$sql="insert into personal values('','$nombres','$apellidos','$cedula','$telefono','$direccion','$fechaNacimiento','$correo')";
	//$sql="delete from personal where id=5";
	//$sql="update personal set nombres='Daniela', apellidos='Pardo' where id=7";

	$resSQL=$miconexion->consulta($sql);
	if ($resSQL=="") {
		echo "Problemas de ejecución del SQL";
	}else{
		echo '<script>alert("Sentencia ejecutada..");</script>';
		echo "<script>location.href='../'</script>";
	}



	

?>