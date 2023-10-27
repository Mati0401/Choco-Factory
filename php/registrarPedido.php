<?php
  // Incluye el archivo de conexión a la base de datos
  include("conexion.php");

  // Recibe los datos enviados desde JavaScript
  $data = json_decode(file_get_contents("php://input"), true);

  $total = $data['total'];
  $codigoAlfanumerico = $data['codigoAlfanumerico'];

  // Inserta el pedido en la tabla 'pedido'
  $sql = "INSERT INTO pedido (codigo, total) VALUES ('$codigoAlfanumerico', $total)";

  if ($conexion->query($sql) === TRUE) {
    $pedidoId = $conexion->insert_id; // Obtén el ID del pedido insertado

    // Inserta los detalles del pedido en la tabla 'detalle_pedido'
    foreach ($data['data'] as $item) {
      $cantidad = $item['cantidad'];
      $producto = $item['producto'];
      $precioUnitario = $item['precioUnitario'];
      $importe = $item['importe'];

      $sql = "INSERT INTO detalle_pedido (pedido_codigo, cantidad, producto_nombre, precio_unidad, subtotal)
        VALUES ('$codigoAlfanumerico', $cantidad, '$producto', $precioUnitario, $importe)";

      $conexion->query($sql);
    }

    // Envía una respuesta de éxito
    echo json_encode(["success" => true]);
  } else {
    echo json_encode(["success" => false]);
  }

  $conexion->close();
?>



