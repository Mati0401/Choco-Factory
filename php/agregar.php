<?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ruta donde se guardarán las imágenes
    $ruta_almacenamiento = "../uploads/";

    // Nombre del archivo en el servidor
    $nombre_archivo = $_FILES['imagen']['name'];

    // Ruta completa del archivo en el servidor
    $ruta_completa = $ruta_almacenamiento . $nombre_archivo;

    // Mueve el archivo del directorio temporal al directorio de almacenamiento
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa)) {
      // El archivo se ha cargado correctamente

      // Guarda la ruta del archivo en la base de datos
      include 'conexion.php';
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $precio_unitario = $_POST['precio_unitario'];
      $stock = $_POST['stock'];

      $sql = "INSERT INTO producto (imagen, nombre, descripcion, precio_unitario, stock)
        VALUES ('$ruta_completa', '$nombre', '$descripcion', '$precio_unitario', '$stock')";

      $rta = mysqli_query($conexion, $sql);

      if (!$rta) {
        echo "No se guardo el producto!";
      } else {
        header("Location: ../index.php");
      }

      mysqli_close($conexion);
    } else {
      echo "Error al cargar la imagen.";
    }
  }
?>
