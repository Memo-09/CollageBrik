<?php
session_start();
if(isset($_SESSION['correo'])){
  if($_SESSION['rol'] == 'ESTUDIANTE' || $_SESSION['rol'] == 'PROFESOR' || $_SESSION['rol'] == 'JEFE DE DIVICION'){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portafolio CollageBrieke</title>
    <link rel="stylesheet" href="css/normalize3.css" />
    <link rel="stylesheet" href="css/estilos3.css" />
    <link rel="stylesheet" href="css/main3.css">
    <link rel="stylesheet" href="css/footer3.css">
    <link rel="icon" type="image/png" href="../assets/buho.png">
  </head>
  <body>
    <?php
        require("./conexion.php");
        $consultaMatricula= "SELECT MATRICULA_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE CORREO_PORTAFOLIO_REGISTRO='".$_SESSION['correo']."'";
        $ejecutarconsultaMatricula=mysqli_query($conexion, $consultaMatricula);
        $tablaMatricula=mysqli_fetch_array($ejecutarconsultaMatricula);

        $consultaImagen= "SELECT IMAGEN_USUARIO_PORTAFOLIO  FROM registro_portafolio WHERE MATRICULA_PORTAFOLIO_REGISTRO=$tablaMatricula[0]";
        $ejecutarconsultaImagen=mysqli_query($conexion, $consultaImagen);
        $tablaImagen=mysqli_fetch_array($ejecutarconsultaImagen);
        $_SESSION['imagen'] = $tablaImagen[0];

        $consultaImagen1= "SELECT IMAGEN_FONDO_USUARIO  FROM registro_portafolio WHERE MATRICULA_PORTAFOLIO_REGISTRO=$tablaMatricula[0]";
        $ejecutarconsultaImagen1=mysqli_query($conexion, $consultaImagen1);
        $tablaImagen1=mysqli_fetch_array($ejecutarconsultaImagen1);
        $_SESSION['fondo'] = $tablaImagen1[0];

        $consultaDatos= "SELECT NOMBRE_PORTAFOLIO_REGISTRO FROM registro_portafolio WHERE MATRICULA_PORTAFOLIO_REGISTRO=$tablaMatricula[0]";
        $ejecutarconsultaDatos=mysqli_query($conexion, $consultaDatos);
        $tablaDatos=mysqli_fetch_array($ejecutarconsultaDatos);
        $_SESSION['nombre'] = $tablaDatos[0];

        $consultaInformacion= "SELECT * FROM infromacion_usuario WHERE MATRICULA_PORTAFOLIO_REGISTRO=$tablaMatricula[0]";
        $ejecutarconsultaInformacion=mysqli_query($conexion, $consultaInformacion);
        $tablaInformacion=mysqli_fetch_array($ejecutarconsultaInformacion);
        $_SESSION['informacion1'] = $tablaInformacion[1];
        $_SESSION['informacion2'] = $tablaInformacion[2];
        $_SESSION['informacion3'] = $tablaInformacion[3];
    ?>
    <header class="hero">
      <style>
        .hero {
          height: 100vh;
          background-image: var(--background), url("<?php echo $_SESSION['fondo'] ?>");
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;
          background-position: center;
          position: relative;
        }
      </style>
      <div class="container">
        <nav class="nav">
          <a href="cerrarsecion.php" class="nav__items nav__items--cta">Cerrar Sesion</a>
          <a href="#about"" class="nav__items">Sobre mi</a>
          <a href="#proyectos" class="nav__items">Proyectos</a>
        </nav>

        <section class="hero__container">
          <div class="hero__texts">
            <h1 class="hero__title">
              Hola soy <?php echo $_SESSION['nombre']?> 
            </h1>
            <h2 class="hero__subtitle">Transformando ideas a realidades</h2>
            <a href="./CambiarFoto.php" class="presentation__cta">Cambiar Imagen de Fondo</a>
          </div>
        </section>
      </div>
      <div class="hero__wave" style="overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>


<main>
  <section class="presentation container">
      <img src="<?php echo $_SESSION['imagen'] ?>" class="presentation__picture">
      <h2 class="subtitle">Mi nombre es: <?php echo $_SESSION['nombre']?></h2>
      <center><p class="proyect_card_text about__paragraph container_top_icons"><?php echo $_SESSION['informacion1'] ?></p></center>
      <a href="./CambiarFoto.php" class="presentation__cta">Cambiar Imagen de Perfil</a>
    </section>

    <section class="about container">
      <div class="about__texts">
      
        <h2 class="subtitle" id="about">Mis habilidades</h2>
        <p class="proyect_card_text2 about__paragraph Section-cards container_top_icons"><?php echo $_SESSION['informacion2'] ?></p>
      </div>
      <figure class="about__img">
        <img src="assets/dev.svg" class="about__picture">
      </figure>
      <figure class="about__img about__img--left">
        <img src="assets/dev2.svg" class="about__picture">
        <a href="./Cambiar_Informacion.php" class="presentation__cta">Editar Informacion</a>
      </figure>

      <div class="about__texts">
        <h2 class="subtitle">Sobre mi trabajo</h2>
        <p class="proyect_card_text2 about__paragraph Section-cards container_top_icons"><?php echo $_SESSION['informacion3'] ?></p>
      </div>
    </section>
    <section class="projects">
      <div class="container">
      <section class="home">
    <span class="Section-cards">
        <section class="card">
            <section class="form-register" method ="POST" >
              <div class="container_subtitle_cards">
                  <p id="proyectos">Mis Proyectos</p>
              </div>

              <div class="container_cards">

                <?php
                  $consulta= "SELECT * FROM proyectos_portafolio WHERE MATRICULA_PORTAFOLIO_REGISTRO='$tablaMatricula[0]'";
                  $ejecutarconsulta=mysqli_query($conexion, $consulta);
                  while($tabla=mysqli_fetch_array($ejecutarconsulta)){
                ?>
                <div class="proyect_card">
                  <div class="container_top_icons">
                    <svg class="folder" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><title>Folder</title><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                    <a href="<?php echo $tabla[1] ?>" target="_blank" class="icon_github">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></svg>
                    </a>
                  </div>
                  <div class="card_name">
                    <h3><?php echo $tabla[2] ?></h3>
                  </div>
                  <div class="card_details">
                      <h5><?php echo $tabla[3] ?></h5>
                  </div>
                  <div class="card_programings">
                    <ul>
                      <li>REACT</li>
                      <li>JAVASCRIPT</li>
                      <li>CSS</li>
                    </ul>
                  </div>
                </div>
                <?php
                  }
                ?>

              </div>
            </section>
        </section>
    </span>
        </section>
        <a href="./Subir_Archivos.php" class="presentation__cta">Agregar Nuevo Proyecto</a>
      </div>
    </section>
    <footer class="footer">
      <div class="container footer__grid">
          <nav class="nav nav--footer">
            <a class="nav__items nav__items--footer" href="#">Inicio</a>
            <a class="nav__items nav__items--footer" href="#about">Sobre mi</a>
            <a class="nav__items nav__items--footer" href="#proyectos">Proyectos</a>
          </nav>

          <section class="footer__contact">
            <h3 class="footer__title">Contactame</h3>
            <div class="footer__icons">
              <span class="footer__container-icons">
                <a class="fab fa-facebook footer__icon" href="https://es-la.facebook.com"></a>
              </span>
              <span class="footer__container-icons">
                <a class="fab fa-twitter footer__icon" href=""></a>
              </span>
              <span class="footer__container-icons">
                <a class="fab fa-github footer__icon" href="https://github.com"></a>
              </span>
            </div>
          </section>
      </div>
    </footer>
</main>

    <!-- en <a> # = colocan los cuatro URL del las redes sociales  -->
    
    <script
      src="https://kit.fontawesome.com/22c7458622.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php
  }else if($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'SUPERVISOR'){
    header('Location:../Admin/PrincipalAdmin.php');
  }
}else{
  header('Location:./Iniciar_Secion.php');
}
?>
