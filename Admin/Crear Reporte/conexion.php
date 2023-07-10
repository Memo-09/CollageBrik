<?php
    //DATOS DEL SERVIDO BD
    $servidor="localhost";
    $usuario_bd="root";
    $password="";
    $namebd="portafolio";
    //$conexion = mysqli_connect($servidor,$usuario_bd,$password,$namebd);

    /*if($conexion){
        echo "<h3>CONEXION CON EXITO</h3>";
    }*/
    $conexion = mysqli_connect($servidor,$usuario_bd,$password,$namebd) 
    OR DIE ("<h3>ERROR AL CONECTAR, VUELVE A INTENTARLO</h3>");
    mysqli_query($conexion,"SET NAMES 'utf8'");
?>