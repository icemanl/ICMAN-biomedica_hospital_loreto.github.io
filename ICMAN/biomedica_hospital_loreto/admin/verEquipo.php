<!DOCTYPE html>
<html lang="en">
<head>
  <title>INVENTARIO BIOMEDICA HOSPITAL GENERAL LORETO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery/jquery-3.4.1.min.js"></script>
  <script src="popper/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body background="fondo - Editado (1).png">
<?php
$buscar =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $buscar = test_input($_POST["buscar"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="container">
	<h1 align="center">INVENTARIO FUNCIONAL DE EQUIPO BIOMEDICO DEL HOSPITAL GENERAL LORETO</h1>
	
	<br>
	<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
	style="width:550px;margin:0 auto;" method="POST" name="form1">
	</form>
	<br>
	
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr style="background:rgb(0,0,0); color:rgb(240,255,255);">
				<th>Clave</th>
				<th>Equipo</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(isset($_POST['buscar'])){
					$buscar=$_POST['buscar'];
				}else{
					$buscar="";
				}					
				include 'connect.php';
				$conn=conectarse();
				$sql = "select * from productos where producto like '%$buscar%';";
				$result=$conn->query($sql);
				if ($result->num_rows > 0) {
					$x=1;
					while($row = $result->fetch_array()) {
						echo "<tr data-toggle='modal' data-target='#myModal".$x."' title='Clic para detalles'>";
						echo "<td >".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "</tr>";
						$x+=1;
					}
				} else {
					echo "0 Resultados";
				}
			?>
		</tbody>
	</table>
	
	<?php
		$sql = "select * from productos";
		$result=$conn->query($sql);
		if ($result->num_rows > 0) {
			$x=1;
			while($row = $result->fetch_array()) {
				echo "<div class='modal' id='myModal".$x."'>";
				echo "<div class='modal-dialog'>";
				echo "<div class='modal-content'>";
				echo "<div class='modal-header'>";
				echo "<h4 class='modal-title'>Id del Producto: ".$row[0]."</h4>";
				echo "<button type='button' class='close' data-dismiss='modal'>
				&times;</button>";
				echo "</div>";
				echo "<div class='modal-body'>";
				echo "<b>EQUIPO: </b>".$row[1];
				echo "<br><b>DESCRIPCION: </b>".$row[2];
				echo "<br><b>MARCA: </b>".$row[3];
				echo "<br><b>MODELO: </b>".$row[4];
				echo "<br><b>SERIE: </b>".$row[5];
				echo "<br><b>UBICACION: </b>".$row[6];
				echo "<br><b>ESTADO DEL APARATO: </b>".$row[7];
				echo "<br><b>ULTIMO MANTENIMIENTO: </b>".$row[8];
				echo "<br><b>PROXIMO MANTENIMIENTO: </b>".$row[9];
				echo "<br><b>RESPONSABLE DEL DEPTO. DE EQUIPO MEDICO: </b>".$row[10];
				echo "</div>";
				echo "<div class='modal-footer'>";
				echo "<button type='button' class='btn btn-danger' 
				data-dismiss='modal'>Close</button>";
				echo "</div>";        
				echo "</div>";
				echo "</div>";
				echo "</div>";
				$x+=1;
			}
		}
	?>
</div>
</body>
</html>