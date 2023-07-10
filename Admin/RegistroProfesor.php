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
                        <a href="../Admin/RegistroAlumnos.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Alumnos</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
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
                <h4>Registrar Profesores</h4>
                <label>Nombre</label>
                <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre"/>
                <label>Apellidos</label>
                <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido"/>
                <label>CLave</label>
                <input class="controls" type="text" name="matricula" id="matricula" placeholder="Ingrese tú Matricula"/>
                <label>Correo</label>
                <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo"/>
                <label>Contraseña</label>
                <input class="controls" type="password" name="contrasenia2" id="password1" placeholder="Ingrese su Contraseña"/>
                <label>Vuelve a Ingresar su Contraseña:</label>
                <input class="controls" type="password" name="contrasenia" id="contrasenia" placeholder="Confirme su Contraseña"/>
                <select name="cmbRoles" class="controls" aria-label=".form-select-lg example">
                <option selected>-SELECCIONE--</option>
                <?php 
                    include ("../conexion.php");
                    $queryrol = "CALL Mostrar_Roles_Profesor";
                    $ejecutarrol=mysqli_query($conexion, $queryrol);
                    while ($roles =  mysqli_fetch_array($ejecutarrol)){
                        echo "<option value = '$roles[0]'>$roles[1]</option>";
                    }
                ?>
                <input href ="registro.php" class="botons" type="submit" name="profesor" value="Registrar">
                <?php 
                    if(isset($_POST["profesor"])){
                        include ("../conexion.php");
                        $nombreusr = $_POST["nombres"];
                        $apellido = $_POST["apellidos"];
                        $matricula = $_POST["matricula"];
                        $correo = $_POST["correo"];
                        $contrasenia = $_POST["contrasenia"];
                        $contrasenia2 = $_POST["contrasenia2"];
                        $rol = $_POST["cmbRoles"];
                        if($nombreusr == "" || $apellido =="" || $matricula=="" || $correo=="" || $contrasenia=="" ||  $contrasenia2==""){
                ?>
                                <script>
                                    alert("Hay elementos sin LLenar");
                                </script>
                <?php
                        }else{
                            if($contrasenia == $contrasenia2){
                                $queryinsert  = "CALL Insertar_Registros('$nombreusr','$apellido','$matricula','$correo','$contrasenia','$rol')";
                                $ejectQueryinsert = mysqli_query($conexion, $queryinsert);
                ?>
                                <script>
                                    alert("Se registro con exitos");
                                </script>
                <?php
                            }else{
                ?>
                                <script>
                                    alert("Las contraseñas son incorrecta");
                                </script>              
                <?php
                            }
                        }
                    }
                ?>
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