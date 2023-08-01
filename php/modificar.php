<?php 

    include 'conexion.php';

    $sql = "SELECT nombre, descripcion, precio_unitario, stock FROM producto WHERE id='$id'";

    $rta = mysqli_query($conexion, $sql);

    if(!$rta){
        echo "No se modifico el producto!";
    } 
    else {
        header("Location: ../vistas/modificar-producto.php");
    }

?>