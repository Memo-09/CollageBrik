<?php 
    include ("../conexion.php");
    $nombreusr = $_POST["nombres"];
    $apellido = $_POST["apellidos"];
    $matricula = $_GET["clave"];
    $correo = $_POST["correo"];
    $rol = $_POST["cmbRoles"];
    try{
        $queryinsert  = "CALL actualizarRegistro('$nombreusr','$apellido',$matricula,'$correo',$rol)";
        if(mysqli_query($conexion, $queryinsert)){
?>
            <script>
                 alert("Se Actalizo los Datos Con exito");
            </script>
<?php
            header("location:./PrincipalAdmin.php");
        }else{
?>
            <script>
                 alert("Error Al Actualizar los Datos");
            </script>
<?php
        }
    }catch(Exception $e){
        echo "Error al enviar los Datos";
    }
?>