<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio_unitario = $_POST["precio_unitario"];
    $stock = $_POST["stock"];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE producto
            SET nombre = '$nombre', descripcion = '$descripcion', precio_unitario = '$precio_unitario', stock = '$stock'
            WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: ../vistas/modificarBorrar.php");
    } else {
        echo "Datos actualizados correctamente.";
    }

}

?>