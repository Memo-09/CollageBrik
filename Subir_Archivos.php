<?php
session_start();
if(isset($_SESSION['correo'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subir Archivo</title>
    <link rel="stylesheet" href="CSS/style3.css" />
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
          <section action="index.html" autocomplete="off">
            <img src="./chico-alegre-susurra-secreto-su-novia-comparte-chismes-diviertete-despues-clases-excitada-mujer-cabello-rizado-sostiene-telefono-celular-recibe-informacion-interesante-su-companero-grupo-dos-estudia.jpg" alt="">
          </section>
        </div>

        <div class="contact-form">
          <form method="POST">
            <h3 class="title">Subir Link Repositorio</h3>
            <div class="input-container">
              <input type="text" name="nombres" class="input" placeholder="Nombre del Proyecto de Git Hub" />
            </div>
            <div class="input-container">
              <input type="link" name="links" class="input"  placeholder="Link de Repositorio"/>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" placeholder="Lenguajes de Programacion" />
            </div>
            <div class="input-container textarea">
              <textarea name="descripxion" class="input" placeholder="Descripcion del Proyecto"></textarea>
            </div>
            <input type="submit" name="subir_proyecto" value="Subir tu Repositorio" class="btn" />
            <?php 
              if(isset($_POST["subir_proyecto"])){
                require("./conexion.php");
                $link=$_POST["links"];
                $nombre=$_POST["nombres"];
                $descripcion=$_POST["descripxion"];
                if($link== "" || $nombre== "" || $descripcion == ""){
          ?>
                    <script>
                      alert("Faltan datos por Rellenar");
                    </script>
          <?php
                }else{
                  $consultaMatricula= "SELECT MATRICULA_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE CORREO_PORTAFOLIO_REGISTRO='".$_SESSION['correo']."'";
                  $ejecutarconsultaMatricula=mysqli_query($conexion, $consultaMatricula);
                  $tablaMatricula=mysqli_fetch_array($ejecutarconsultaMatricula);

                  $consulta= "CALL Agregar_Proyectos('$link','$nombre','$descripcion',$tablaMatricula[0]);";
                  if($ejecutarconsulta=mysqli_query($conexion, $consulta)){
                    header('Location:./Portafolio.php');
                  }else{
          ?>
                    <script>
                      alert("Fallo al Enviar el Proyecto");
                    </script>
          <?php
                  }
                }
              }
            ?>
          </form>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
<?php 
}
?>
