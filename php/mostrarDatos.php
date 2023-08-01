<?php 

    include 'conexion.php';

    $sql="SELECT * FROM producto";
    $datos=mysqli_query($conexion,$sql);

?>