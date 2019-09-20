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

          class Datos{
            public function mostrar($doc_paciente){

              include("../models/conexion.php");

              $_SESSION["documento"] = $doc_paciente;
              $cont = "0";

              $sql = "SELECT * FROM usuario_paciente WHERE documento = '$doc_paciente'";

              if(!$result = $db ->query($sql)){
                die ('Hay un error en la consulta [' .$db->error .']');
              }

              while($row = $result->fetch_assoc()){
                $ttipo_documento = stripcslashes($row["tipo_documento"]);
                $ddocumento = stripcslashes($row["documento"]);
                $pprimer_nombre = stripcslashes($row["primer_nombre"]);
                $ssegundo_nombre = stripcslashes($row["segundo_nombre"]);
                $pprimer_apellido = stripcslashes($row["primer_apellido"]);
                $ssegundo_apellido = stripcslashes($row["segundo_apellido"]);
                $ssexo = stripcslashes($row["sexo"]);
                $ffecha_nacimiento = stripcslashes($row["fecha_nacimiento"]);
                $ddireccion = stripcslashes($row["direccion"]);
                $ttelefono = stripcslashes($row["telefono"]);
                $cont=$cont+1;
              }

              if ($cont == "0") {
                include("../views/a_danger.html");
              }

              if ($cont!="0") {
?>  
         <div class="container table-responsive">
            <table class='table table-striped historia'>
            <thead>
              <tr>
              <td colspan="2" class="color3">
                    <a href="../views/home.php">
                    <img src="../../files/img/logoem3.png" style="width:40%; height: 40px">
                  </a>
              </td>
                <td colspan="3" class="color3">
                  <label style="margin-top: 1%; margin-right: 40%; text-shadow: 1px 1px 1px #000; color:#fff; font-size: 20px">INFORMACION DEL PACIENTE</label>
                </td>
              </tr>
            </thead>

            <tbody>
          <tr>
            <td class="td negrilla" colspan="1" style="width: 10%">Tipo documento</td>
            <td class="td negrilla" colspan="1" style="width: 10%">Documento</td>
            <td class="td negrilla" colspan="1" style="width: 10%">Primer nombre</td>
            <td class="td negrilla" colspan="1" style="width: 10%">Segundo nombre</td>
            <td class="td negrilla" colspan="1" style="width: 10%">Primer apellido</td>
          </tr>
          <tr>
            <td class="td" colspan="1">
              <?php 
                $sql = "SELECT tp.tipo_documento FROM usuario_paciente AS up INNER JOIN tipo_documento as tp ON up.tipo_documento = tp.id_tipo_documento WHERE documento = $doc_paciente";

                  if(!$result = $db ->query($sql)){
                    die ('Hay un error en la consulta [' .$db->error .']');
                  }

                  while($row = $result->fetch_assoc()){
                    $ttipo_documento = stripcslashes($row["tipo_documento"]);
                  }

                  echo $ttipo_documento;
              ?>
              </td>

              <td class="td" colspan="1">
                <?php echo $ddocumento ?>
              </td>

              <td class="td" colspan="1">
                <?php echo $pprimer_nombre ?>
              </td>

              <td class="td" colspan="1">
                <?php echo $ssegundo_nombre ?>
              </td>

              <td class="td" colspan="1">
                <?php echo $pprimer_apellido ?>
              </td>
          </tr>
          <tr>
            <td class="td negrilla" colspan="1">Segundo apellido</td>
            <td class="td negrilla" colspan="1">Sexo</td>
            <td class="td negrilla" colspan="1">Fecha nacimiento</td>
            <td class="td negrilla" colspan="1">Direccion</td>
            <td class="td negrilla" colspan="1">Telefono</td>
          </tr>
          <tr>
              <td class="td" colspan="1">
                <?php echo $ssegundo_apellido ?>
              </td>

              <td class="td" colspan="1">
                <?php
                  $sql = "SELECT sx.sexo FROM usuario_paciente AS up INNER JOIN sexo AS sx ON up.sexo = sx.id_sexo WHERE documento = '$doc_paciente'";

                  if(!$result = $db ->query($sql)){
                    die ('Hay un error en la consulta [' .$db->error .']');
                  }

                  while($row = $result->fetch_assoc()){
                    $ssexo = stripcslashes($row["sexo"]);
                  }

                  echo $ssexo;
                ?>
              </td>

              <td class="td" colspan="1">
                <?php echo $ffecha_nacimiento ?>
              </td>

              <td class="td" colspan="1">
                <?php echo $ddireccion ?>
              </td>

              <td class="td" colspan="1">
                <?php echo $ttelefono ?>
              </td>

              <tr>
                <td class="td" colspan="5">
                  <a href="../views/home.php" class="btn btn-sm btn-dark">Volver</a>
                </td>
              </tr>
              </tbody>
              </table>
<?php             
      } 
    }
  }
            $nuevo = new Datos();
            $nuevo->mostrar($_POST['dpaciente']);   
?>
          </div>
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
