<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/estilos2.css">
	<link rel="stylesheet" href="css/normalize2.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<form action="" class="login form-register" method="POST">
		<h3 class="text-center">Cambiar Contraseña</h3>
		<div class="form-group">
			<input type="email" class="controls" name="correo" id="Nombre" placeholder="Correo">
		</div>
		<div class="form-group">
			<input type="password" class="controls" name="contrasena2" id="Pass" placeholder="Contraseña">
		</div>
		<div class="form-group">
			<input type="password" class="controls" name="contrasena1" id="Pass" placeholder="Verificar Contraeña">
		</div>
		<p class="form-group">
			<input type="submit" name="cambiarcon" value="Guardar Cambios" class="btn" />
		</p>
		<?php
        if(isset($_POST["cambiarcon"])){
          $correo = $_POST["correo"];
          $contrasena = $_POST["contrasena2"];
          $contrasena1=$_POST["contrasena1"];
          if($contrasena == $contrasena1){
            include ("./conexion.php");
            $queryupdate  = "CALL actcontr ('$correo','$contrasena');";
            if($ejectQueryinsert = mysqli_query($conexion, $queryupdate)){
				header("location:./Iniciar_Secion.php");
			}else{
		?>
				<script>
                    alert("Error al Actualizar la Contraseña");
            	</script>
		<?php
			}
          }else{
        ?>
			<script>
                    alert("Las Contraseñas no Concuerdan");
            </script>
		<?php
          }
        }
      ?>
	</form>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>