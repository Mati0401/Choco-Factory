<?php

    include 'conexion.php';

    // Obtén el nombre del producto de la solicitud
    $nombre = $_GET['nombre'];

    // Realiza la consulta para obtener el precio
    $sql = "SELECT precio_unitario FROM producto WHERE nombre = '$nombre'";

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Obtiene el precio de la fila de resultados
        $row = $result->fetch_assoc();
        $precio_unitario = $row['precio_unitario'];

        // Devuelve el precio como una respuesta JSON
        echo json_encode(['precio_unitario' => $precio_unitario]);
    } else {
        // Si no se encontró el producto, devuelve un mensaje de error
        echo json_encode(['error' => 'Producto no encontrado']);
    }

    // Cierra la conexión a la base de datos
    $conexion->close();

?>
