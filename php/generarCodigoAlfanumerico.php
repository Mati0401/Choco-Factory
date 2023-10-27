<?php

  function generarCodigoPedido($longitud = 8) {
      $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $codigo = '';

      for ($i = 0; $i < $longitud; $i++) {
          $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
      }

      return $codigo;
  }

  $codigo_pedido = generarCodigoPedido(8);

  // Devolver el código de pedido como respuesta en formato JSON
  echo json_encode(array("codigo_pedido" => $codigo_pedido));
  
?>