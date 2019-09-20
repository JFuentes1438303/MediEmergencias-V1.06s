<?php  
  session_start();
  if ($_SESSION["usuario"] != "1") {
    header("Location: ../../index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

	    <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<title>MediEmergencias</title>
			<!-- Bootstrap core CSS -->
			<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<!-- Custom styles for this template -->
			<link href="../../css/simple-sidebar.css" rel="stylesheet">
			<link href="../../css/estilos.css" rel="stylesheet" >
			<script src="https:kit.fontawesome.com/2c36e9b7b1.js"></script>
	    </head>

	<body>
		<div class="d-flex toggled" id="wrapper">
	      <!-- Sidebar -->
			<div class="border-right" id="sidebar-wrapper">

		        <div style="text-align: center; border-bottom: 5px solid #818181; background: #000;">
		            <a href="../views/home.php">
		              <img src="../../files/img/logoem2.jpg" style="width:240px; height: 61px">
		            </a>
		        </div>

	        <div class="list-group list-group-flush">

          <a href="../views/pacientes.php" class="list-group-item list-group-item-action enlaces">
            Informacion del paciente
          </a>

          <a href="../views/historias.php" class="list-group-item list-group-item-action enlaces">
            Registrar historia clinica
          </a>

          <a href="../views/buscar_historia.php" class="list-group-item list-group-item-action enlaces">
            Buscar historia clinica
          </a>

          <a href="../views/triage.php" class="list-group-item list-group-item-action enlaces">
            Clasificacion de alertas 
          </a>

          <a href="../views/actualizar.php" class="list-group-item list-group-item-action enlaces">
            Actualizar usuario 
          </a>

          <div class="enlaces2">
          </div>

          <a href="../models/cerrar_sesion.php" class="list-group-item list-group-item-action enlaces">
            Cerrar sesion 
          </a>


          <div style="text-align: center; padding: 4% 2%; background: #f2f2f2">
            <label for="">Ponte en contacto con nosotros</label>
            <i class="far fa-hand-point-down fa-2x"></i>
          </div>

          <div style="text-align: center; background: #f2f2f2; padding-bottom: 5%">
            <a href="https://wa.me/573197039293" target="blanck">
              <i class="fab fa-whatsapp fa-4x icono"></i>
            </a>
          </div>

          <div style="background: #f2f2f2; padding-bottom: 2%;  text-align: center; font-size: 11px">
            MediEmergencias<br>
            &copy; Todos los derechos reservados <br>
            2019
          </div>
        </div>
			</div>
	    <!-- /#sidebar-wrapper -->

	    <!-- Page Content -->
	    <div id="page-content-wrapper">

	      <nav class="navbar navbar-expand-lg color1" style="border-bottom: 5px solid #818181;">
	        <button class="btn boton_menu" id="menu-toggle">
	          <i class="fas fa-bars"></i>
	        </button>

	          <div class="perfil" style="margin-left: 1%;">
	            <?php 
	              echo "Bienvenido(a) ".$_SESSION["primer_nombre"]." ".$_SESSION["primer_apellido"];
	            ?>
	          </div>
	      </nav>

	    <div class="container-fluid">
<?php 
	class Historias{
		public function mostrar($doc_paciente){

			include("../models/conexion.php");

			$_SESSION["documento"] = $doc_paciente;

			$cont = "0";

			$sql = "SELECT * FROM historias_clinicas WHERE documento = '$doc_paciente'";

			if(!$result = $db ->query($sql)){
            	die ('Hay un error en la consulta [' .$db->error .']');
          	}

          	while ($row = $result -> fetch_assoc()) {
          		$ttipo_documento = stripcslashes($row["tipo_documento"]);
          		$ddocumento = stripcslashes($row["documento"]);
          		$eedad = stripcslashes($row["edad"]);
          		$nnombres = stripcslashes($row["nombres"]);
          		$aapellidos = stripcslashes($row["apellidos"]);
          		$ffecha_nacimiento = stripcslashes($row["fecha_nacimiento"]);
          		$cciudad = stripcslashes($row["ciudad"]);
          		$ddepartamento = stripcslashes($row["departamento"]);
          		$ddireccion = stripcslashes($row["direccion"]);
          		$ssexo = stripcslashes($row["sexo"]);
          		$oocupacion = stripcslashes($row["ocupacion"]);
          		$eestado_civil = stripcslashes($row["estado_civil"]);
          		$eentidad = stripcslashes($row["entidad"]);
          		$rregimen = stripcslashes($row["regimen"]);
          		$rregion = stripslashes($row["region"]);
          		$eescolaridad = stripslashes($row["escolaridad"]);
          		$ttriage = stripslashes($row["triage"]);
          		$ssintomas = stripcslashes($row["sintomas"]);
          		$eenfermedades = stripcslashes($row["enfermedades"]);
          		$aantecedentes = stripcslashes($row["antecedentes"]);
          		$aantecedentes_personales = stripcslashes($row["antecedentes_personales"]);
          		$ffisiologicos = stripslashes($row["fisiologicos"]);
          		$eexamenes = stripcslashes($row["examenes"]);

          		$cont = $cont + 1;
      		}

      		if ($cont == "0") {
      			include("../views/ad_historia.html");
      		}

      		if($cont != "0"){
?>
			<div class="container table-responsive">
				<table class="table table-hover historia">
					<thead>
						<tr>
						<td colspan="1" class="color3">
        					<a href="../views/home.php">
  								<img src="../../files/img/logoem3.png" style="width:60%; height: 40px">
    						</a>
						</td>
							<td colspan="9" class="color3">
								<label style="margin-top: 1%; margin-left: 20%; text-shadow: 1px 1px 1px #000; color:#fff; font-size: 20px">HISTORIA CLINICA DEL PACIENTE</label>
							</td>
						</tr>
					</thead>

				<tbody>

				<tr>
					<td class="td negrilla" colspan="1">
						Tipo de documento
					</td>
					<td class="td" colspan="2">
<?php 
						$sql = "SELECT tp.tipo_documento FROM historias_clinicas AS hc INNER JOIN tipo_documento as tp ON hc.tipo_documento = tp.id_tipo_documento WHERE documento = $doc_paciente";

						if(!$result = $db ->query($sql)){
							die ('Hay un error en la consulta [' .$db->error .']');
						}

						while($row = $result->fetch_assoc()){
							$ttipo_documento = stripcslashes($row["tipo_documento"]);
						}

						echo $ttipo_documento;
?>
					</td>
					<td class="td negrilla" colspan="2">
						Documento
					</td>
					<td class="td" colspan="1">
						<?php  echo $ddocumento ?>	
					</td>
					<td class="td negrilla" colspan="2">
						Alerta
					</td>
					<td class="td" colspan="2">
<?php
						$sql = "SELECT tri.triage FROM historias_clinicas AS hc INNER JOIN triage AS tri ON hc.triage = tri.id_triage WHERE documento = '$doc_paciente'";

						if(!$result = $db ->query($sql)){
							die ('Hay un error en la consulta [' .$db->error .']');
						}

						while($row = $result->fetch_assoc()){
							$ttriage = stripcslashes($row["triage"]);
						}

						echo $ttriage;
?>
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="1">
						Nombres
					</td>
					<td class="td" colspan="2">
						<?php echo $nnombres ?>
					</td>
					<td class="td negrilla" colspan="1">
						Apellidos
					</td>
					<td class="td" colspan="2">
						<?php echo $aapellidos ?>
					</td>
					<td class="td negrilla" colspan="1">
						Edad
					</td>
					<td class="td" colspan="1">
						<?php echo $eedad ?>
					</td>
					<td class="td negrilla" colspan="1">
						Sexo	
					</td>
					<td class="td" colspan="1">
<?php
						$sql = "SELECT sx.sexo FROM historias_clinicas AS hc INNER JOIN sexo AS sx ON hc.sexo = sx.id_sexo WHERE documento = '$doc_paciente'";

						if(!$result = $db ->query($sql)){
							die ('Hay un error en la consulta [' .$db->error .']');
						}

						while($row = $result->fetch_assoc()){
							$ssexo = stripcslashes($row["sexo"]);
						}

						echo $ssexo;
?>
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="1">
						Fecha de nacimiento
					</td>
					<td class="td" colspan="1">
						<?php echo $ffecha_nacimiento ?>
					</td>
					<td class="td negrilla" colspan="2">
						Estado civil
					</td>
					<td class="td" colspan="1">
<?php
						$sql = "SELECT es.estado_civil FROM historias_clinicas AS hc INNER JOIN estado_civil AS es ON hc.estado_civil = es.id_estado_civil WHERE documento = '$doc_paciente'";

						if(!$result = $db ->query($sql)){
							die ('Hay un error en la consulta [' .$db->error .']');
						}

						while($row = $result->fetch_assoc()){
							$eestado_civil = stripcslashes($row["estado_civil"]);
						}

						echo $eestado_civil;
?>
					</td>
					<td class="td negrilla" colspan="2">
						Ocupacion
					</td>
					<td class="td" colspan="3">
						<?php echo $oocupacion ?>
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="1">
						Departamento
					</td>
					<td class="td" colspan="1">
						<?php echo $ddepartamento ?>
					</td>
					<td class="td negrilla" colspan="1">
						Ciudad
					</td>
					<td class="td" colspan="3">
						<?php echo $cciudad ?>
					</td>
					<td class="td negrilla" colspan="1">
						Direccion
					</td>
					<td class="td" colspan="3">
						<?php echo $ddireccion ?>
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="1">
						Region
					</td>
					<td class="td" colspan="1">
<?php
						$sql = "SELECT r.region FROM historias_clinicas AS hc INNER JOIN region AS r ON hc.region = r.id_region WHERE documento = '$doc_paciente'";

						if(!$result = $db ->query($sql)){
							die ('Hay un error en la consulta [' .$db->error .']');
						}

						while($row = $result->fetch_assoc()){
							$rregion = stripcslashes($row["region"]);
						}

						echo $rregion;
?>	
					</td>
					<td class="td negrilla" colspan="1">
						Regimen
					</td>
					<td class="td" colspan="1">
<?php
						$sql = "SELECT r.regimen FROM historias_clinicas AS hc INNER JOIN regimen AS r ON hc.regimen = r.id_regimen WHERE documento = '$doc_paciente'";

						if(!$result = $db ->query($sql)){
							die ('Hay un error en la consulta [' .$db->error .']');
						}

						while($row = $result->fetch_assoc()){
							$rregimen = stripcslashes($row["regimen"]);
						}

						echo $rregimen;
?>	
					</td>
						
					<td class="td negrilla" colspan="1">
						Entidad
					</td>
					<td class="td" colspan="2">
						<?php echo $eentidad ?>
					</td>
					<td class="td negrilla" colspan="1">
						Escolaridad
					</td>
					<td class="td" colspan="2">
						<?php echo $eescolaridad ?>
					</td>
				</tr>

				<tr>
					<td colspan="10" class="ths">
						<label style="margin-top: 1%">ANAMNESIS</label>
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="3">
						Sintomas	
					</td>
					<td class="td" colspan="7">
						<?php echo $ssintomas ?>
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="3">
						Enfermedad(es) actual(es)
					</td>
					<td class="td" colspan="7">
						<?php echo $eenfermedades ?>
					</td>
				</tr>

				<tr>
					<td class="ths" colspan="10">
						Antecedentes Heredofamiliares
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="3">
						Enfermedades heredadas
					</td>
					<td class="td" colspan="7">
						<?php echo $aantecedentes?>
					</td>
				</tr>

				<tr>
					<td colspan="10" class="ths">
						Antecedentes personales
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="3">
						Habitos toxicos
					</td>
					<td class="td" colspan="7">
						<?php echo $aantecedentes_personales ?>
					</td>
				</tr>

				<tr>
					<td class="td negrilla" colspan="1">
						Fisiologicos
					</td>
					<td class="td" colspan="4">
						<?php echo $ffisiologicos ?>
					</td>
					<td class="td negrilla" colspan="1">
						Examenes
					</td>
					<td class="td" colspan="4">
						<?php echo $eexamenes ?>
					</td>
				</tr>

				<tr>
					<td class="td" colspan="10" style="padding-bottom: 2%">
						<a href="../views/home.php" class="btn btn-sm btn-dark">
							Volver
						</a>
					</td>
				</tr>
			</tbody>
			</table>
			</div>
			<br>
<?php    		
      		}
		}
	}	

	$nuevo = new Historias();
	$nuevo -> mostrar($_POST["dpaciente"]);
?>
		<!-- Bootstrap core JavaScript -->
		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		  <!-- Menu Toggle Script -->
		<script>
			$("#menu-toggle").click(function(e) {
			  e.preventDefault();
			  $("#wrapper").toggleClass("toggled");
			});
		</script>

	</body>
</html>

