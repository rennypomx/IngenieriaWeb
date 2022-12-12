<?php
include("config.php");
$conexion= new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
if (!$conexion) {
	echo "hay un error de conexion a la db";
}
?>