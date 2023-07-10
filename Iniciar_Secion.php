<?php
session_start();
if (isset($_SESSION['correo'])) {
    if ($_SESSION['rol'] == 'ESTUDIANTE' || $_SESSION['rol'] == 'PROFESOR' || $_SESSION['rol'] == 'JEFE DE DIVICION') {
        header('Location:./Portafolio.php');
    } else {
        header('Location:./Admin/PrincipalAdmin.php');
    }
} else {
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Iniciar Secion</title>
	<link rel="stylesheet" href="css/estilos2.css">
	<link rel="stylesheet" href="css/normalize2.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="./assets/buho.png">
</head>
<body>
	<form action="" class="login form-register" method="POST">
		<h3 class="text-center">Inicio de sesión</h3>
		<div class="form-group">
			<input type="email" class="controls" name="correo" id="Nombre" placeholder="Correo">
		</div>
		<div class="form-group">
			<input type="password" class="controls" name="contrasenia" id="Pass" placeholder="Contraseña">
		</div>
		<p class="form-group">
			<input type="submit" value="Iniciar Secion" name="iniciar" class="btn" />
		</p>
		<p>
			<a href="./Registrar_Usuario.php">Registrarme</a>
		</p>
		<p>
			<a href="./Olvide_Contraseña.php">Olvide Mi Contraseña</a>
		</p>
		<?php
if (isset($_POST["iniciar"])) {
        include "./conexion.php";
        $usuario = $_POST["correo"];
        $contrasenia = $_POST["contrasenia"];
        $queryval = "CALL Acceder('$usuario', '$contrasenia');";
        $ejctval = mysqli_query($conexion, $queryval);
        $validar = mysqli_fetch_array($ejctval);
        if ($usuario != null || $contrasenia != null) {
            if ($validar[1] == $usuario) {
                if ($validar[2] == $contrasenia) {
                    session_start();
                    $_SESSION['usuario'] = $validar[0];
                    $_SESSION['roles'] = $validar[3];
                    if ($_SESSION['roles'] == 'ADMINISTRADOR') {
                        header("Location:./Inicio2");
                    } else {
                        header("Location:./Admin/PrincipalAdmin.php");
                    }
                } else {
                    header("Location:./Iniciar_Secion.php");
                }
            } else {
                header("Location:./Iniciar_Secion.php");
            }
        } else {

        }
    }
    ?>
	</form>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>