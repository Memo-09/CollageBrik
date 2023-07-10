<?php 
    include ("../Inicio_sesion/conexion.php");
    $nombreusr = $_POST["nombres"];
    $apellido = $_POST["apellidos"];
    $matricula = $_POST["matricula"];
    $correo = $_POST["correo"];
    $contrasenia = $_POST["contrasenia"];
    $contrasenia2 = $_POST["contrasenia2"];
    $rol = $_POST["cmbRoles"];
    if($contrasenia == $contrasenia2){
        $queryinsert  = "CALL Insertar_Registros('$nombreusr','$apellido','$matricula','$correo','$contrasenia','$rol')";
        $ejectQueryinsert = mysqli_query($conexion, $queryinsert);
        header("location:../Admin/RegistroAdministrador.php");
        echo "Se registro con exitos";
    }else{
        echo "Las contraseñas son incorrecta";
    }
?>