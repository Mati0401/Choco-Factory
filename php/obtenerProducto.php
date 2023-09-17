<?php
  include 'conexion.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos aquí

  if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $producto_id = $_GET["id"];

    // Prepara la consulta SQL para obtener los datos del producto
    $sql = "SELECT * FROM producto WHERE id = ?";
    
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $producto_id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
      $producto = [
        "id" => $fila["id"],
        "nombre" => $fila["nombre"],
        "descripcion" => $fila["descripcion"],
        "precio_unitario" => $fila["precio_unitario"],
        "stock" => $fila["stock"],
        "imagen" => $fila["imagen"]
      ];

      // Devuelve los datos del producto como JSON
      header('Content-Type: application/json');
      echo json_encode($producto);
    } else {
      // El producto no se encontró en la base de datos
      echo "Producto no encontrado";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
  } else {
    // No se proporcionó un ID válido o la solicitud no es GET
    echo "Solicitud no válida";
  }
?>
