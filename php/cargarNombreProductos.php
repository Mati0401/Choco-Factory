<?php

    include("conexion.php");

    $sql = "SELECT nombre FROM producto";
    $result = $conexion->query($sql);

    $nombresProductos = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombresProductos[] = $row["nombre"];
        }
    }

    $conexion->close();

    // Devolver los nombres de productos como JSON
    header("Content-Type: application/json");
    echo json_encode($nombresProductos);
?>
