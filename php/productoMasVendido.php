<?php
  include("conexion.php");

  // Realizar la consulta SQL para obtener los productos más vendidos
  $query = "SELECT p.nombre AS producto, SUM(dv.cantidad) AS cantidad_vendida
            FROM producto AS p
            INNER JOIN detalle_venta AS dv ON p.id = dv.producto_id
            GROUP BY p.nombre
            ORDER BY cantidad_vendida DESC
            LIMIT 3";

  $result = $conexion->query($query);

  $topProductos = array();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $producto = array(
        "nombre" => $row["producto"],
        "cantidad_vendida" => (int)$row["cantidad_vendida"]
      );
      $topProductos[] = $producto;
    }
  }

  // Devolver los resultados en formato JSON
  echo json_encode($topProductos);

  $conexion->close();
?>
