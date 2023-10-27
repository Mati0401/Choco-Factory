<?php
  include("conexion.php");

  // Verificar la conexión
  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  // Obtener datos de la solicitud AJAX
  $ventas = json_decode($_POST['ventas'], true);
  $total = $_POST['total'];

  // Insertar la venta en la tabla "venta"
  $fecha = date("Y-m-d");
  $sql = "INSERT INTO venta (fecha, total) VALUES ('$fecha', $total)";
  if ($conexion->query($sql) === TRUE) {
    $venta_id = $conexion->insert_id; // Obtener el ID de la venta recién insertada
  } else {
    echo "Error al insertar la venta: " . $conexion->error;
  }

  // Insertar los detalles de venta en la tabla "detalle_venta"
  foreach ($ventas as $venta) {
    $cantidad = $venta['cantidad'];
    $producto = $venta['producto'];
    $precio = $venta['precio'];

    // Obtener el ID del producto a partir de su nombre (asumiendo que hay una tabla "producto")
    $producto_id = obtenerIdProducto($conexion, $producto);

    $sql = "INSERT INTO detalle_venta (cantidad, producto_id, precio, venta_id) 
            VALUES ($cantidad, $producto_id, $precio, $venta_id)";

    if ($conexion->query($sql) !== TRUE) {
      echo "Error al insertar los detalles de la venta: " . $conexion->error;
    }
  }

  // Cerrar la conexión a la base de datos
  $conexion->close();

  echo "Venta registrada con éxito";

  // Función para obtener el ID del producto a partir de su nombre
  function obtenerIdProducto($conexion, $nombreProducto) {
    $sql = "SELECT id FROM producto WHERE nombre = '$nombreProducto'";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row['id'];
    } else {
      return null; // Maneja el caso si el producto no se encuentra en la base de datos
    }
  }
?>

