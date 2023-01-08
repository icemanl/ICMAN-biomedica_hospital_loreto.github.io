<?php
session_start();
?>
<?php
$usr=$_POST['usr'];
$pass=$_POST['pass'];
$tipo=$_POST['tipo'];

include 'connect.php';
$conn=conectarse();

	if($tipo=='paciente'){
		$sql="select * from pacientes where email='$usr' and clave='$pass'";
	}
	if($tipo=='clinica'){
		$sql="select * from clinicas where email='$usr' and clave='$pass'";
	}
	if($tipo=='admin'){
		$sql="select * from usuarios where usuario='$usr' and clave='$pass'";
	}
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0){

		$row = $result->fetch_array();

		$_SESSION['usr']=$usr;
		$_SESSION['tipo']=$tipo;
		
		if($tipo=='admin'){
			echo "<script>window.location.href='admin/index.php'</script>";
		}
		if($tipo=='clinica'){
			$_SESSION['idClinica']=$row[0];
			echo "<script>window.location.href='clinica/index.php'</script>";
		}
		if($tipo=='paciente'){
			$_SESSION['idPaciente']=$row[0];
			echo "<script>window.location.href='paciente/index.php'</script>";
		}
	}
	else{
		echo "<script>alert('Usuario no encontrado');</script>";
		echo "<script>window.location.href='index.html'</script>";
	}
?>