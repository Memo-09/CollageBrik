<!-- Coding by CodingLab | www.codinglabweb.com -->
<?php
session_start();
if(isset($_SESSION['correo'])){
  if($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'SUPERVISOR' ){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="../assets/buho.png">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    
    <title>Dashboard Sidebar Menu</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../Admin/img/logo Collegebrick.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Collegebirck</span>
                    <span class="profession">Anllemel</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> -->

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../Admin/RegistroAlumnos.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Alumnos</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../Admin/RegistroProfesor.php">
                            <i class='bx bx-pencil icon' ></i>
                            <span class="text nav-text">Profesores</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="../Admin/RegistroAdministrador.php">
                            <i class='bx bx-code icon' ></i>
                            <span class="text nav-text">Administrador</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../cerrarsecion.php">
                        <i class='bx bxs-institution icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
    <span class="Section-cards">
        <section class="card">
            <div class="card__perfil">
                <div class="card__nombre">
                    <img src="../Admin/img/Alumno2.jpg" alt="" class="hola">
                    <h2>ALUMNOS</h2>
                    <p>Seccion de los Alumnos</p>
                </div>
                <hr>
                <div class="card__descripcion">
                    <p>Informacion de los Registros de Los Alumnos asi mismo de sus respectivas Carreras que estan crusando</p>
                    <br>
                    <p>“Lo poco que he aprendido carece de valor, comparado con lo que ignoro y no desespero en aprender”</p>
                </div>
                <hr>
                <div class="card__button">
                    <a class="enlace" href="../Admin/Consultar_Alumnos.php">Alumnos</a>
                    <a class="enlace" href="./Crear Reporte/Alumnos.php">Estadisticas</a>
                </div>
            </div>
            <div class="card__perfil">
                <div class="card__nombre">
                    <img src="../Admin/img/Profesor.jpg" alt="" class="hola">
                    <h2>PROFESORES</h2>
                    <p>Seccion de los Profesores</p>
                </div>
                <hr>
                <div class="card__descripcion">
                    <p>Informacion de los Registros de Los Profesores asi mismo de sus respectivas Carreras en las que trabajan</p>
                    <br>
                    <p>“Estoy en deuda con mi padre por vivir, pero con mi maestro por vivir bien”</p>
                    <br>
                </div>
                <hr>
                <div class="card__button">
                    <a class="enlace" href="../Admin/Consultar_Profesores.php">Profesores</a>
                    <a class="enlace" href="./Crear Reporte/Profesores.php">Estadisticas</a>
                </div>
            </div>
            <div class="card__perfil">
                <div class="card__nombre">
                    <img src="../Admin/img/Admin.jpg" alt="" class="hola">
                    <h2>ADMIN</h2>
                    <p>Seccion de los Administradores</p>
                </div>
                <hr>
                <div class="card__descripcion">
                    <p>Aqui es en donde nosotros podremos agregar, eliminar los usuarios de los alumnos  y de los profesores, 
                        asi como poder agregar a mas miembros de nuestro equipo</p>
                        <br>
                        <br>
                        <br>
                </div>
                <hr>
                <div class="card__button">
                    <a class="enlace" href="./Consultar_Administradores.php">Administrador</a>
                </div>
            </div>
        </section>
    </span>
       
    </section>
    <script src="script.js"></script>
</body>
</html>
<?php
    }
  }else{
    header('Location:../Iniciar_Secion.php');
  }
?>