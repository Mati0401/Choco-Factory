<?php
  
  include("conexion.php");
  
  $codigoPedido = $_GET['codigoPedido'];
  
  $rtaDetalle = mysqli_query($conexion, "DELETE FROM detalle_pedido WHERE pedido_codigo='$codigoPedido'");
  $rtaPedido = mysqli_query($conexion, "DELETE FROM pedido WHERE codigo='$codigoPedido'");
  
  if ($rtaDetalle && $rtaPedido) {
    header("Location: ../vistas/caja.php");
  } else {
    echo "No se pudo cancelar la venta.";
  }
  
?>



