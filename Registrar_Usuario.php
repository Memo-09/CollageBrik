<?php
session_start();
if(isset($_SESSION['correo'])){
  if($_SESSION['rol'] == 'ESTUDIANTE' || $_SESSION['rol'] == 'PROFESOR' || $_SESSION['rol'] == 'JEFE DE DIVICION'){
	header('Location:./Portafolio.php');
  }else{
	header('Location:./Admin/PrincipalAdmin.php');
  }
}else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrate</title>
    <link rel="stylesheet" href="./CSS/style3.css" />
    <link rel="icon" type="image/png" href="./assets/buho.png">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="contact-form">
          <form method="POST">
            <h3 class="title">Registro de Ususario</h3>
            <div class="input-container">
              <input type="text" name="matricula" class="input" placeholder="Clave u Matricula" />
            </div>
            <div class="input-container">
              <input type="tel" name="nombres" class="input" placeholder="Nombre(s)" />
            </div>
            <div class="input-container textarea">
              <input type="tel" name="apellidos" class="input" placeholder="Apellidos(s)" />
            </div>
            <div class="input-container">
              <input type="text" name="correo" class="input" placeholder="Correo Electronico" />
            </div>
            <div class="input-container">
              <input type="password" name="contrasenia" class="input"  placeholder="Contraseña"/>
            </div>
            <div class="input-container">
              <input type="password" name="contrasenia2" class="input" placeholder="Verificar Contraseña" />
            </div>
            <br>
            <select name="cmbRoles" class="controls" aria-label=".form-select-lg example">
            <option selected>-SELECCIONE--</option>
              <?php
                include ("conexion.php");
                $queryrol = "SELECT * FROM roles_escolares_portafolio WHERE ID_ROL_PORTAFOLIO <=3";
                $ejecutarrol=mysqli_query($conexion, $queryrol);
                while ($roles =  mysqli_fetch_array($ejecutarrol)){
                    echo "<option value = '$roles[0]'>$roles[1]</option>";
                }
              ?>
            <input type="submit" value="Aceptar" name="registro" class="btn" />
          </form>
          <?php 
              if(isset($_POST["registro"])){
                  $nombreusr = $_POST["nombres"];
                  $apellido = $_POST["apellidos"];
                  $matricula = $_POST["matricula"];
                  $correo = $_POST["correo"];
                  $contrasenia = $_POST["contrasenia"];
                  $contrasenia2 = $_POST["contrasenia2"];
                  $rol = $_POST["cmbRoles"];
                  if($nombreusr == "" || $apellido =="" || $matricula=="" || $correo=="" || $contrasenia=="" ||  $contrasenia2==""){
            ?>      <script>
                      alert("Faltan datos por Rellenar");
                    </script>
            <?php
                  }else{
                    if($contrasenia == $contrasenia2){
                        $queryinsert  = "CALL Insertar_Registros('$nombreusr','$apellido','$matricula','$correo','$contrasenia','$rol')";
                        $ejectQueryinsert = mysqli_query($conexion, $queryinsert);
                        header('Location:./Iniciar_Secion.php');
                    }else{
            ?>
                    <script>
                        alert("Las Contraseñas no Concuerdan");
                    </script>
            <?php
                    }
                  }
              }
            ?>
        </div>
        <div class="contact-form">
          <section action="index.html" autocomplete="off">
            <img src="./chico-alegre-susurra-secreto-su-novia-comparte-chismes-diviertete-despues-clases-excitada-mujer-cabello-rizado-sostiene-telefono-celular-recibe-informacion-interesante-su-companero-grupo-dos-estudia.jpg" alt="">
          </section>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
<?php 
}
?>
