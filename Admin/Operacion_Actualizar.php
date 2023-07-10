<?php 
    include ("../conexion.php");
    $nombreusr = $_POST["nombres"];
    $apellido = $_POST["apellidos"];
    $matricula = $_GET["clave"];
    $correo = $_POST["correo"];
    $rol = 1;
    if($nombreusr == "" || $apellido=="" || $correo==""){
?>
        <script>
            alert("Error al Actualizar Los datos");
        </script>
<?php
        header("location:./ActualizarAlumnos.php?clave=$matricula");
    }else{
        try{
            $queryinsert  = "CALL actualizarRegistro('$nombreusr','$apellido',$matricula,'$correo',$rol)";
            if(mysqli_query($conexion, $queryinsert)){
    ?>
                <script>
                     alert("Se Actalizo los Datos Con exito");
                </script>
    <?php
                header("location:./PrincipalAdmin.php");
            }
        }catch(Exception $e){
            echo "Error al enviar los Datos";
        }

    }
?>