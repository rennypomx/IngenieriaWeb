<?php
 	include("../dll/config.php");
 	include("../dll/class_mysqli.php");
 	$miconexion= new class_mysqli();
 	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $cedula=$_POST['cedula'];
	$mascotas=$_POST['mascota'];

	$sql1="insert into personal(nombres, apellidos, cedula, direccion, correo) values('$nombres','$apellidos','$cedula','$direccion','$correo')";
	$miconexion->ejecutarSQL($sql1);

	$id="select MAX(id) AS max_id from personal";
	$persona = $miconexion->consultaDato($id)['max_id'];
	foreach ($mascotas as &$mascota) {
		$sql2="insert into postula values('',$persona, $mascota)";
		$miconexion->ejecutarSQL($sql2);
		$postu="select postulaciones from mascota where id = $mascota";
		$numPostu = $miconexion->consultaDato($postu)['postulaciones'] + 1;
		$sql3="update mascota set postulaciones=$numPostu where id =$mascota";
		$miconexion->ejecutarSQL($sql3);
	}
?>