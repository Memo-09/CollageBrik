<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['correo'])){
    session_destroy();
    header("Location:./Iniciar_Secion.php");
}else{
  header("Location:./Iniciar_Secion.php");;
}
?>
</body>
</html>