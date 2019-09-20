<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<title>Registro MediEmergencias</title>
		<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/simple-sidebar.css" rel="stylesheet">
	  	<link href="../../css/estilos.css" rel="stylesheet">
	  	<link href="" rel="shortcut icon">
	  	<script src="../../vendor/js/validar.js"></script>	
	</head>

	<body>
			
		<div class="container div color2">
			<div class="row" style="background: #F2F2F2; border-bottom: 1px solid #000">
				<div class="col-sm-3">
					<a href="../../index.php">
						<img src="../../files/img/logoem2.jpg" class="logo">
					</a>
				</div>
				<div class="col-sm-9 titulos">
					Formulario de registro
				</div>	
			</div>

			<form action="../models/registro.php" method="POST" onsubmit="return validar();">

				<div class="row espacio">
					<div class="col-sm-2">
						<label for="tdocumento" class="col-form-label font">Tipo de documento:</label>
					</div>
					
					<div class="col-sm-4" style="margin-top: 10px;">
						<?php  
							include("../models/tipo_documento.php");
						?>
					</div>

					<div class="col-sm-2">
						<label for="ndocumento" class="col-form-label font">Numero de documento:</label>
					</div>
					<div class="col-sm-4" style="">
						<input type="text" class="form-control inputs" id="ndocumento" placeholder="documento.." name="ndocumento" >
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2">
						<label for="pNombre" class="col-form-label font">Primer nombre:</label>
					</div>
					<div class="col-sm-4" style="">
						<input type="text" class="form-control inputs" id="pNombre" placeholder="primer nombre" name="primerNombre">
					</div>

					<div class="col-sm-2">
						<label for="sNombre" class="col-form-label font">Segundo nombre:</label>
					</div>
					<div class="col-sm-4" style="">
						<input type="text" class="form-control inputs" id="sNombre" placeholder="segundo nombre" name="segundoNombre">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2">
						<label for="pApellido" class="col-form-label font">Primer apellido:</label>
					</div>
					<div class="col-sm-4" style="">
						<input type="text" class="form-control inputs" id="pApellido" placeholder="primer apellido" name="primerApellido">
					</div>

					<div class="col-sm-2">
						<label for="sApellido" class="col-form-label font">Segundo apellido:</label>
					</div>
					<div class="col-sm-4" style="">
						<input type="text" class="form-control inputs" id="sApellido" placeholder="segundo apellido" name="segundoApellido">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2">
						<label for="direccion" class="col-form-label font">Direccion:</label>
					</div>
					<div class="col-sm-4" style="">
						<input type="text" class="form-control inputs" id="direccion" placeholder="Ingrese direccion" name="direccion">
					</div>
					<div class="col-sm-2">
						<label for="fnacimiento" class="col-form-label font">Fecha de nacimiento:</label>
					</div>
					<div class="col-sm-4" style="">
						<input type="date" class="form-control inputs" id="fnacimiento" placeholder="Ingrese fecha de nacimiento" name="fnacimiento">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2 " style="">
						<label for="sexo" class="col-form-label font">Sexo:</label>
					</div>
					<div class="col-sm-4 " style="">
						<?php  
							include("../models/sexo.php");
						?>
					</div>
					<div class="col-sm-2 " style="">
						<label for="telefono" class="col-form-label font">Telefono:</label>
					</div>
					<div class="col-sm-4 ">
						<input type="text" class="form-control inputs" id="telefono" placeholder="Ingrese telefono" name="telefono">
					</div>
				</div>

				<div class="row espacio">
					<div class="col-sm-2 ">
						<label for="password" class="col-form-label font">Contraseña:</label>
					</div>
					<div class="col-sm-10 ">
						<input type="password" class="form-control " id="password" placeholder="Ingrese contraseña" name="password">
					</div>
				</div>

				<div class="row espacio" style="justify-content: center;">
          			<input type="submit" class="btn btn-sm btn-dark inputs" value="Registrarse"></input>
        		</div>

        		<div class="row espacio" style="justify-content: center;">
          			<button type="reset" class="btn btn-sm btn-danger inputs" value="Cancelar">Cancelar</button>	
        		</div>
			</form>

		</div>
		<br>
		<br>
		<br>
		<br>

		

		<script src="../../vendor/jquery/jquery.min.js"></script>
      	<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>