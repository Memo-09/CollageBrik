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
    <link rel="stylesheet" href="style3.css">
    <link rel="icon" type="image/png" href="../assets/buho.png">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/8900d5ba3d.js" crossorigin="anonymous"></script>
    
    <title>Dashboard Sidebar Menu</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo Collegebrick.png" alt="">
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
                        <a href="../Admin/PrincipalAdmin.php">
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
            <form class="form-register" method ="POST" >
                <h1>LISTA DE PROFESORES REGISTRADOS</h1>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">MATRICULA</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">EDITAR</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        require("../conexion.php");
                        $consulta= "CALL Mostrar_Profesores";
                        $ejecutarconsulta=mysqli_query($conexion, $consulta);
                        while($tabla=mysqli_fetch_array($ejecutarconsulta)){
                            echo "<tr>";
                            echo "<td>".$tabla[0]."</td>";
                            echo "<td>".$tabla[1]."</td>";
                            echo "<td>".$tabla[2]."</td>";
                            echo "<td>".$tabla[3]."</td>";;
                            echo "<td><a href='ActualizarProfesores.php?clave=$tabla[2]'><i class='fas fa-edit' title='Editar'></i><a></td>";
                            
                            echo "</tr>";
                        }
                    ?>
                    </tbody>   
            </form>
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