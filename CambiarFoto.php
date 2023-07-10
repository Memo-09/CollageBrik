<?php
session_start();
if(isset($_SESSION['correo'])){
  if($_SESSION['rol'] == 'ESTUDIANTE' || $_SESSION['rol'] == 'PROFESOR' || $_SESSION['rol'] == 'JEFE DE DIVICION'){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/style4.css" />
    <link rel="icon" type="image/png" href="../assets/buho.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Cambiar Foto</title>
  </head>
  <body>
  <div class="container">
      <div class="form">
        <div class="contact-form">
          <form method="POST" enctype="multipart/form-data">
            <center><img src="<?php echo $_SESSION['imagen'] ?>" class="presentation__picture"></center>
            <br>
            <center><h3 class="title">Subir Nueva Imagen </h3></center>
            <br>
            <center><input id="fichero" type="file" name="file"><label for="fichero" class="circle">--SELECCIONA UNA IMAGEN--</label></center>
            <br>
            <center><p>La imagen sera aplicado como..</p></center>
            <center><select name="cmbCambio" class="controls" aria-label=".form-select-lg example"></center>
              <option value = 'SELECCINE'>-SELECCIONE--</option>
              <option value = 'IMAGEN_FONDO_USUARIO'>FONDO DE PANTALLA</option>
              <option value = 'IMAGEN_USUARIO_PORTAFOLIO'>IMAGEN DE PERFIL</option>
            <br>
            <center><input type="submit" name="cambiar" values="Subir Archivo" class="btn2"></center>
            <?php
              if(isset($_POST["cambiar"])){
                $opcionimagen= $_POST["cmbCambio"];
                $nombre2=basename($_FILES["file"]["name"]);
                $directorio2="assets/";
                $nombre2=basename($_FILES["file"]["name"]);
                $archivo2=$directorio2.basename($_FILES["file"]["name"]);
                $tipoarchivo2=strtolower(pathinfo($archivo2,PATHINFO_EXTENSION));
                if($tipoarchivo2== "png" || $tipoarchivo2== "jpg" || $tipoarchivo2== "webp"){
                  if($opcionimagen == "SELECCINE"){
            ?>
                  <script>
                    alert("No se ha seleccionado en donde se mostrara la Imagen");
                  </script>
            <?php
                  }else{
                    move_uploaded_file($_FILES["file"]["tmp_name"], $archivo2);
                    require("./conexion.php");
                    $consultaMatricula2= "SELECT MATRICULA_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE CORREO_PORTAFOLIO_REGISTRO='".$_SESSION['correo']."'";
                    $ejecutarconsultaMatricula2=mysqli_query($conexion, $consultaMatricula2);
                    $tablaMatricula2=mysqli_fetch_array($ejecutarconsultaMatricula2);

                    $consultaImagen2= "UPDATE registro_portafolio SET $opcionimagen='$archivo2' WHERE MATRICULA_PORTAFOLIO_REGISTRO=$tablaMatricula2[0]";
                    if($ejecutarconsultaImagen2=mysqli_query($conexion, $consultaImagen2)){
                      header("Location:./Portafolio.php");
                    }else{ 
            ?>
                      <script>
                          alert("Error al Editar la Imagen");
                      </script>
            <?php
                    }
                  }
                }else{
            ?>
                  <script>
                    alert("No es el formato Correcto");
                  </script>
            <?php
                }
              }
            ?>
          </form>
        </div>
        <div class="contact-form">
          <section>
          <img src="./pexels-photo-2479946.jpeg" alt="">
          </section>
        </div>
      </div>

      
  </div>
  </body>
</html>
<?php
   }
  }else{
    header('Location:./Iniciar_Secion.php');
  }
?>
