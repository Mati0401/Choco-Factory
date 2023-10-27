<?php
  include 'conexion.php';

  $sql = "SELECT codigo FROM pedido";
  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {
    echo "<div id='botonesContainer'>"; // Abre el contenedor de botones
    while ($row = $result->fetch_assoc()) {
      $columnValue = $row["codigo"];
      echo "<a href='../vistas/cajaVenta.php?codigo=$columnValue' class='miBoton'>$columnValue</a>";
    }
    echo "</div>"; // Cierra el contenedor de botones
  } else {
    echo "No se encontraron resultados.";
  }

  $conexion->close();
?>
