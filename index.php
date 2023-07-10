<?php
session_start();
if(isset($_SESSION['correo'])){
  if($_SESSION['rol'] == 'ESTUDIANTE' || $_SESSION['rol'] == 'PROFESOR' || $_SESSION['rol'] == 'JEFE DE DIVICION'){
    header('Location:/Portafolio.php');
  }else{
    header('Location:Admin/PrincipalAdmin.php');
  }
}else{
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Collegebrick</title>
    <link rel="stylesheet" href="CSS/estilos.css" />
    <link rel="stylesheet" href="CSS/normalize.css" />
    <link rel="icon" type="image/png" href="assets/buho.png">
  </head>
  <body>
    <header class="hero">
      <div class="container">
        <nav class="nav">
          <a href="./Iniciar_Secion.php" class="nav__items nav__items--cta">Inicio Sesión</a>
          <a href="./Registrar_Usuario.php" class="nav__items">Registro</a>
        </nav>

        <section class="hero__container">
          <div class="hero__texts">
            <h1 class="hero__title">
              CollegeBric
            </h1>
            <h2 class="hero__subtitle">“Dime y lo olvido, enséñame y lo recuerdo, involúcrame y lo aprendo”</h2>
          </div>
        </section>
      </div>
      <div class="hero__wave" style="overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>


<main>
  <section class="presentation container">
      <img src="./GS20220711155915.gif" class="presentation__picture">
      <h2 class="subtitle">Anllemel Inc</h2>
      <p class="presentation__copy">Es una empresa que se encarga al desarrollo de software, especializada en el ámbito estudiantil, ofreciendo compartir imágenes y videos de tu día a día en tu institución el cual contiene herramientas para el ámbito profesional y laboral fuera de la institución.</p> 
    </section>

    <section class="about container">
      <div class="about__texts">
      
        <h2 class="subtitle">Portafolio Profesional
        </h2>
        <p class="about__paragraph">Es un documento físico o digital de presentación que no solo incluye datos personales, experiencia laboral y formación, sino que también ofrece muestras reales de nuestro trabajo con el fin de demostrar las habilidades y aptitudes que afirmamos poseer.</p>
        <p class="about__paragraph">CollegeBric te ofrece la oportunidad de tener tu propio portafolio profesional el cual podrás llenar con la experiencia adquirida a lo largo de tu estancia estudiantil. </p>
      </div>
      <figure class="about__img">
        <img src="./assets/undraw_folder_re_apfp.svg" class="about__picture">
      </figure>
      <figure class="about__img about__img--left">
        <img src="./assets/undraw_group_hangout_re_4t8r.svg" class="about__picture">
      </figure>

      <div class="about__texts">
        <h2 class="subtitle">¿Es una red social?</h2>
        <p class="about__paragraph">En general no, esta pagina se podria decir que es como un Curriculum Vitae pero en pagina web donde podras subir tus proyectos y ser vizualisados</p>
        <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima odio quod tempora eum nemo nesciunt molestiae. Necessitatibus, recusandae itaque sunt accusamus omnis sint accusantium voluptates cumque, dicta, ipsam quia quam?</p>
      </div>

    </section>

    
    <footer class="footer">
      <div class="container footer__grid">
          <nav class="nav nav--footer">
            
            <a class="nav__items nav__items--footer" href="./Inicio_sesion/FormularioInicio.php">Inicio Sesión</a>
            <a class="nav__items nav__items--footer" href="./Registro_sesion/FormularioRegistro.php">Registrarse</a>
          </nav>

          <section class="footer__contact">
            <h3 class="footer__title">Contactos</h3>
            <div class="footer__icons">
              <span class="footer__container-icons">
                <a class="fab fa-facebook footer__icon" href="https://es-la.facebook.com"></a>
              </span>
              <span class="footer__container-icons">
                <a class="fab fa-twitter footer__icon" href="https://twitter.com/?lang=es"></a>
              </span>
              <span class="footer__container-icons">
                <a class="fab fa-github footer__icon" href="https://github.com"></a>
              </span>
              <span class="footer__container-icons">
                <a class="fab fa-whatsapp footer__icon" href="https://web.whatsapp.com"></a>
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
    }
?>
