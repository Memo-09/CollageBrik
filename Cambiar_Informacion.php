<?php
session_start();
if(isset($_SESSION['correo'])){
  if($_SESSION['rol'] == 'ESTUDIANTE' || $_SESSION['rol'] == 'PROFESOR' || $_SESSION['rol'] == 'JEFE DE DIVICION'){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="./CSS/style3.css" />
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
            <h3 class="title">Cambiar Informacion</h3>
            <div class="input-container textarea">
              <textarea name="descripxion1" class="input2" placeholder="Sobre Mi"></textarea>
            </div>
            <div class="input-container textarea">
              <textarea name="descripxion2" class="input2" placeholder="Descripcion del Proyecto"></textarea>
            </div>
            <div class="input-container textarea">
              <textarea name="descripxion3" class="input2" placeholder="Descripcion del Proyecto"></textarea>
            </div>
            <input type="submit" value="Aceptar" name="registro" class="btn" />
          </form>
          <?php 
            require("./conexion.php");
            if(isset($_POST["registro"])){
              $informacion1=$_POST["descripxion1"];
              $informacion2=$_POST["descripxion2"];
              $informacion3=$_POST["descripxion3"];
              if($informacion1== "" || $informacion2== "" || $informacion3 == ""){
          ?>
                <script>
                  alert("Falto Agregar algunos elementos");
                </script>

          <?php
              }else{
                $consultaMatricula= "SELECT MATRICULA_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE CORREO_PORTAFOLIO_REGISTRO='".$_SESSION['correo']."'";
                $ejecutarconsultaMatricula=mysqli_query($conexion, $consultaMatricula);
                $tablaMatricula=mysqli_fetch_array($ejecutarconsultaMatricula);

                $consulta= "CALL Editar_Informacion('$informacion1','$informacion2','$informacion3',$tablaMatricula[0])";
                if($ejecutarconsulta=mysqli_query($conexion, $consulta)){
                  header('Location:../Portafolio.php');
                }else{
          ?>
                  <script>
                      alert("Fallo al editar la Informacion");
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
}else{
  header('Location:./Iniciar_Secion.php');
}
?>
