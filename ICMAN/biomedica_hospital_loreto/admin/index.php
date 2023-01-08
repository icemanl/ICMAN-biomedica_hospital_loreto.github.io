<?php
session_start();
if(isset($_SESSION['tipo'])){
	if($_SESSION['tipo']!='admin'){
		header("Location: ../index.html");
	}
}else{
	header("Location: ../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INVENTARIO BIOMEDICA HOSPITAL GENERAL LORETO</title>
	<link rel="stylesheet" type="text/css" href="../_css/estilo.css">
</head>
<body>
<ul>
	<li><a class="active" href="index.php">Inicio</a></li>
	<li class="dropdown">
		<a href="verEquipo.php">INVENTARIO DE APARATOS BIOMEDICOS DEL HOSPITAL GENERAL LORETO</a>
		<div class="dropdown-content">
		
		</div>
	</li>
	
	<li class="dropdown">
		<a href="calendario.php">CRONOGRAMA DE MANTENIMIENTO DE BIOMEDICA</a>
		<div class="dropdown-content">
		</div>
	<li><a href="../cerrar.php">Salir</a></li>
</ul>
<?php
echo "<h2>Bienvenido Administrador: ";
echo $_SESSION['usr'];
echo "</h2>";
?>
</body>
</html>