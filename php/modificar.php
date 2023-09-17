<?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    include 'conexion.php';

    // Obtén los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_unitario = $_POST['precio_unitario'];
    $stock = $_POST['stock'];

    // Actualiza la imagen solo si se proporcionó una nueva
    if (isset($_FILES['nueva_imagen']) && $_FILES['nueva_imagen']['error'] === UPLOAD_ERR_OK) {
      // Ruta donde se guardarán las imágenes
      $ruta_almacenamiento = "../uploads/";

      // Nombre del archivo en el servidor
      $nombre_archivo = $_FILES['nueva_imagen']['name'];

      // Ruta completa del archivo en el servidor
      $ruta_completa = $ruta_almacenamiento . $nombre_archivo;

      // Mueve el archivo del directorio temporal al directorio de almacenamiento
      if (move_uploaded_file($_FILES['nueva_imagen']['tmp_name'], $ruta_completa)) {
        // Actualiza la ruta de la imagen en la base de datos
        $sql = "UPDATE producto SET imagen = '$ruta_completa' WHERE id = $id";
        $rta = mysqli_query($conexion, $sql);

        if (!$rta) {
          echo "Error al actualizar la imagen del producto: " . mysqli_error($conexion);
        }
      } else {
        echo "Error al cargar la nueva imagen.";
      }
    }

    // Actualiza los otros campos del producto
    $sql = "UPDATE producto
      SET nombre = '$nombre', descripcion = '$descripcion', precio_unitario = '$precio_unitario', stock = '$stock'
      WHERE id = $id";
    
    $rta = mysqli_query($conexion, $sql);

    if (!$rta) {
      echo "Error al actualizar el producto: " . mysqli_error($conexion);
    } else {
      header("Location: ../vistas/modificarBorrar.php");
    }

    mysqli_close($conexion);
  }
?>