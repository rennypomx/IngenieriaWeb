<?php
/**
 * class mysql i
 */
class class_mysqli{
	
	//var de conexion de la db
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;

	//variales de eror
	var $Error="";
	var $Errno=0;

	//variables de conexion
	var $Conexion_ID=0;
	var $Consulta_ID=0;

	public function __construct($host="", $user="", $pass="", $db="")
	{
		$this->BaseDatos=$db;
		$this->Usuario=$user;
		$this->Clave=$pass;
		$this->Servidor=$host;
	}

	function conectar($host, $user, $pass, $db){
		if ($db != "") $this->BaseDatos=$db; 
		if ($user != "") $this->Usuario=$user; 
		if ($pass != "") $this->Clave=$pass; 
		if ($host != "") $this->Servidor=$host;

		//parametos de conexion a la db
		$this->Conexion_ID=new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
		if (!$this->Conexion_ID) {
		 	$this->Error="La conexion a fallado :(";
		 	return 0;
		} 	
		return $this->Conexion_ID;
	}
	
	function consulta($sql=""){
		if ($sql=="") {
			$this->Error="No hay sql";
			return 0;
		}
		//ejecuta la sql
		$this->Consulta_ID=mysqli_query($this->Conexion_ID, $sql);
		if (!$this->Consulta_ID) {
			print($this->Conexion_ID->error);
			return 0;
		}
		return $this->Conexion_ID;
	}

	function numcampos(){
		return mysqli_num_fields($this->Consulta_ID);
	}

	function numregistros(){
		return mysqli_num_rows($this->Consulta_ID);
	}

	function verconsulta(){
		echo "<table border='1'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos(); $i++) { 
			echo "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function verconsultaCRUD(){
		echo "<table border='1'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos(); $i++) { 
			echo "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		
		echo "<td>Actualizar</td>";
		echo "<td>Borrar</td>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".$row[$i]."</td>";
			}
			echo "<td><a href='update.php?idUser=$row[0]'>Actualizar</a></td>";
			echo "<td><a href='deleteUser.php?pepito=$row[0]'>Borrar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	function nombreMascota(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			echo "<option value=$row[0]>".$row[1]."</option>";
		}
	}

	function consultaDato($sql=""){
		if ($sql=="") {
			$this->Error="No hay sql";
			return 0;
		}
		//ejecuta la sql
		$consulta = mysqli_query($this->Conexion_ID, $sql);
		return $consulta->fetch_array();
	}

	function ejecutarSQL($sql='')
	{
		$resSQL=$this->consulta($sql);
		if ($resSQL=="") {
			echo "Problemas de ejecución del SQL";
		}else{
			echo '<script>alert("Sentencia ejecutada..");</script>';
			echo "<script>location.href='../'</script>";
		}
	}

	function verPostulaciones(){
		echo "<table>";
		echo "<tr>";
		echo "<th>Nombres</th>";
		echo "<th>Apellidos</th>";
		echo "<th>Cédula</th>";
		echo "<th>Mascota</th>";
		echo "<th>Raza</th>";
		echo "<th>Postulaciones</th>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
}
?>