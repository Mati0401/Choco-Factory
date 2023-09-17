<?php
  include("conexion.php");

  // Realiza la consulta SQL para obtener las ganancias diarias
  $query = "SELECT DATE(v.fecha) AS fecha, SUM(dv.cantidad * p.precio_unitario) AS ganancias_diarias
            FROM venta AS v
            INNER JOIN detalle_venta AS dv ON v.id = dv.venta_id
            INNER JOIN producto AS p ON dv.producto_id = p.id
            GROUP BY DATE(v.fecha)
            ORDER BY DATE(v.fecha)";

  $result = $conexion->query($query);

  $gananciasDiarias = array();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $gananciaDiaria = array(
        "fecha" => $row["fecha"],
        "ganancias_diarias" => (float)$row["ganancias_diarias"]
      );
      $gananciasDiarias[] = $gananciaDiaria;
    }
  }

  // Devolver los resultados en formato JSON
  echo json_encode($gananciasDiarias);

  $conexion->close();
?>

