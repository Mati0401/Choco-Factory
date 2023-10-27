<?php
    include("conexion.php");

    $sql = "SELECT nombre, precio_unitario FROM producto";
    $result = $conexion->query($sql);

    $productos = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $productos[] = array(
          'nombre' => $row["nombre"],
          'precio_unitario' => $row["precio_unitario"]
        );
      }
    }

    $conexion->close();
?>