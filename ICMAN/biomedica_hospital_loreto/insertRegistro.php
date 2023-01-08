<?php
	$paciente=$_POST['paciente'];
	$apellidoM=$_POST['apellidoM'];
	$apellidoF=$_POST['apellidoF'];
	$email=$_POST['email'];
	$clave=$_POST['clave'];
		
	include 'connect.php';
	$conn=conectarse();
	$sql = "insert into pacientes (paciente,apellidoM,apellidoF,direccion,telefono,sexo,email,fechaNacimiento,clave,activo) 
		values ('$paciente','$apellidoM','$apellidoF','$email',');";
	echo $sql;
		if($conn->query($sql))
		{
			echo "<script>alert('Datos Guardados')</script>";
			echo "<script>window.location.href='index.html'</script>";
			return 0;
		}
		else
		{
			echo "<script>alert('Error al Guardar')</script>";
			echo "<script>window.location.href='index.html'</script>";
			return 1;
		}
?>