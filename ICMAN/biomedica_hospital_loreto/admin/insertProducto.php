<?php
	include 'connect.php';
	$conn=conectarse();

	$idproducto=$_POST['idproducto'];
	$equipo=$_POST['equipo'];
	$descripcion=$_POST['descripcion'];
	$marca=$_POST['marca'];
	$modelo=$_POST['modelo'];
	$serie=$_POST['serie'];
	$ubicacion=$_POST['ubicacion'];
	$estadodelaparato=$_POST['estado del aparato'];
	$ultimomantenimiento=$_POST['ultimo mantenimiento'];
	$proximomantenimiento=$_POST['proximo mantenimiento'];
	$responsabledeldeptodeequipomedico=$_POST['responsable del depto. de equipo medico'];
	
	$sql = "select * from productos where idproducto='$idproducto'";
	$result=$conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<script>alert("Ingrese otra clave de producto");window.location.href="nuevoProducto.php";</script>';
	}
	else{
		$sql = "insert into productos (idproducto,producto,descripcion,cantidad,precioventa) 
						values ('$idproducto','$producto','$descripcion','$marca','$modelo','$serie','$ubicacion','$estadodelaparato','$ultimomantenimiento','$proximomantenimiento','$responsabledeldeptodeequipomedico','')";
		//echo $sql;
	}
	$conn->close();
?>