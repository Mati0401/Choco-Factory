<?php

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_unitario = $_POST['precio_unitario'];
    $stock = $_POST['stock'];

    include 'conexion.php';

    $sql = "INSERT INTO producto (nombre, descripcion, precio_unitario, stock)
    VALUES ('$nombre', '$descripcion','$precio_unitario','$stock')";

    $rta = mysqli_query($conexion, $sql);

    if(!$rta){
        echo "No se guardo el producto!";
    } 
    else {
        header("Location: index.html");
    }

?>