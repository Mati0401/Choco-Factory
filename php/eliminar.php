<?php

  include("conexion.php");

  $id = $_GET['id'];

  $rta = mysqli_query($conexion, "DELETE FROM producto WHERE id='$id'");

  if(!$rta){
    echo "No se elimino el producto!";
  } 
  else {
    header("Location: ../vistas/modificarBorrar.php");
  }

?>