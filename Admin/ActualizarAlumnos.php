<!-- Coding by CodingLab | www.codinglabweb.com -->
<?php
session_start();
if(isset($_SESSION['correo'])){
    $clave =$_GET["clave"];
  if($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'SUPERVISOR' ){
    if($clave == null){
        header("location:../Admin/PrincipalAdmin.php");
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style2.css">
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
                        <a href="#">
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
            <?php
                require("../conexion.php");
                $consulta= "CALL Seleccionar_Usuario('$clave')";
                $ejecutarconsulta=mysqli_query($conexion, $consulta);
                $tabla=mysqli_fetch_array($ejecutarconsulta);
            ?>
            <form class="form-register" method ="POST" action ="Operacion_Actualizar.php?clave=<?php echo $tabla[2]?>">
                <h4>Actualizar Alumnos</h4>
                <label>Nombre</label>
                <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" value=<?php echo $tabla[0] ?>>
                <label>Apellidos</label>
                <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido" value=<?php echo $tabla[1] ?>>
                <label>CLave</label>
                <input class="controls" type="text" name="matricul1" id="matricula" placeholder="Ingrese tú Matricula" disabled=false value=<?php echo $clave; ?> >
                <label>Correo</label>
                <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" value=<?php echo $tabla[3] ?>>
                <input class="botons" name="alumnos" type="submit" value="Actualizar">
            </form>
        </section>
    </span>
    </section>
    <script src="script.js"></script>
</body>
</html>
<?php
        }
    }
  }else{
    header('Location:../Iniciar_Secion.php');
  }
?>