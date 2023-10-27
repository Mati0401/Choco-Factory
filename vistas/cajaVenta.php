<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Caja</title>
  <!-- Favicon -->
  <link rel="icon" href="../img/caja-registradora.png" type="image/png">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Tipos de letra -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <!-- Biblioteca QRcode -->
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
  body {
    background-color: #ECFEF6;
    font-family: 'Oswald', sans-serif;
  }
  .contenedor-superior {
    height: 10vh;
  }
  .contenedor-central {
    height: 80vh;
  }
  .contenedor-inferior {
    height: 10vh;
  }
  .contenedor-total {
    height: 7vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #7FE8D7;
  }
  .contenedor-tabla {
    height: 66vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background-color: #7FE8D7;
  }
  .contenedor-opciones-pago {
    height: 7vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #7FE8D7;
  }
  .contenedor-logo {
    background-color: #7FE8D7;
  }
  .contenedor-boton-registrar {
    background-color: #7FE8D7;
  }
  /* Formato logo */
  .texto-titulo {
    font-size: 40px;
    font-family: 'Rubik Wet Paint', cursive;
  }
  /* Formato Boton Volver */
  .boton-volver {
    margin: 20px 0 20px 0;
    font-weight: bold;
    font-size: 20px;
    border: 1px solid black;
    background-color: #B1FEEC;
    color: black;
    padding: 5px 20px 5px 20px;
    font-family: 'Oswald', sans-serif;
  }
  .boton-volver:hover {
    background-color: #F8EE70;
    color: black;
  }
  .boton-volver:active {
    background-color: #F8EE70;
    color: black;
  }
  /* Formato boton Cancelar Compra */
  .boton-cancelar-compra {
    margin: 15px 0 15px 0;
    font-weight: bold;
    font-size: 20px;
    border: 1px solid black;
    background-color: #B1FEEC;
    color: black;
    padding: 5px 20px 5px 20px;
    font-family: 'Oswald', sans-serif;
  }
  .boton-cancelar-compra:hover {
    background-color: #F96C50;
    color: black;
  }
  .boton-cancelar-compra:active {
    background-color: #F96C50;
    color: black;
  }
  /* Formato boton Registrar Venta */
  .boton-registrar-venta {
    font-weight: bold;
    font-size: 20px;
    border: 1px solid black;
    background-color: #B1FEEC;
    color: black;
    padding: 5px 305px 5px 305px;
    font-family: 'Oswald', sans-serif;
  }
  .boton-registrar-venta:hover {
    background-color: #13E155;
    color: black;
  }
  .boton-registrar-venta:active {
    background-color: #13E155;
    color: black;
  }
  /* Formato para el titulo de la lista */
  .titulo-lista {
    font-size: 20px;
    font-weight: bold;
  }
  /* Formato para mostrar el total */
  #totalVentas {
    width: 100px;
    margin-left: 20px;
    text-align: center;
  }
  .label-total {
    font-weight: bold;
  }
  /* Formato de metodos de pago */
  .texto-pago {
    font-weight: bold;
    margin: 2px;
  }
</style>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-3 contenedor-superior d-flex align-items-center justify-content-start">
        <button class="boton-volver" onclick="volverAtras()">Volver</button>
      </div>
      <div class="col-6 contenedor-superior d-flex align-items-center justify-content-center contenedor-logo">
        <span class="texto-titulo">CHOCO FACTORY</span>
      </div>
      <div class="col-3 contenedor-superior">
        <!-- Vacio -->
      </div>
    </div>
    <div class="row">
      <div class="col-3 contenedor-central">
        <!-- Vacio -->
      </div>
      <div class="col-6 bg-light contenedor-central">
        <div class="row">
          <div class="col-12 contenedor-tabla">
          <div>
            <span class="titulo-lista">Pedido: </span><span id="codigoPedido" class="titulo-lista"></span>
          </div>
            <table class="table table-striped table-bordered" id="tablaVentas">
              <thead>
                <tr>
                  <th>Cantidad</th>
                  <th>Nombre del Producto</th>
                  <th>Precio Unitario</th>
                  <th>Importe</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include '../php/conexion.php'; // Asegúrate de que este archivo incluye tu conexión a la base de datos

                  if (isset($_GET['codigo'])) {
                    $codigoPedido = $_GET['codigo'];

                    // Realiza una consulta para obtener los productos relacionados con el pedido
                    $sql = "SELECT cantidad, producto_nombre, precio_unidad, subtotal FROM detalle_pedido WHERE pedido_codigo = '$codigoPedido'";
                    $result = $conexion->query($sql);

                    while ($row = $result->fetch_assoc()) {
                      // Llena las filas de la tabla con los datos de la base de datos
                      echo "<tr>";
                      echo "<td>" . $row['cantidad'] . "</td>";
                      echo "<td>" . $row['producto_nombre'] . "</td>";
                      echo "<td>" . $row['precio_unidad'] . "</td>";
                      echo "<td>" . $row['subtotal'] . "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "Código de pedido no proporcionado.";
                  }

                  $conexion->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-12 contenedor-total">
            <label for="total" class="label-total">TOTAL</label>
            <input type="number" name="total" id="totalVentas" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-6 contenedor-opciones-pago">
            <span class="texto-pago">Tarjeta</span>
            <i class="bi bi-credit-card-2-back texto-pago"></i>
          </div>
          <div class="col-6 contenedor-opciones-pago">
            <span class="texto-pago">Efectivo</span>
            <i class="bi bi-cash-coin texto-pago"></i>
          </div>
        </div>
      </div>
      <div class="col-3 contenedor-central">
        <!-- Vacio -->
      </div>
    </div>
    <div class="row">
      <div class="col-3 contenedor-inferior d-flex alig-items-center justify-content-start">
        <button type="button" class="boton-cancelar-compra" id="cancelarVenta">Cancelar Compra</button>
      </div>
      <div class="col-6 contenedor-inferior d-flex align-items-center justify-content-center contenedor-boton-registrar">
        <button type="button" class="boton-registrar-venta" id="registrarVenta">Registrar Venta</button>
      </div>
      <div class="col-3 contenedor-inferior">
        <!-- Vacio -->
      </div>
    </div>
  </div>
  <script>

    function volverAtras() {
      window.location.href = "caja.php"; 
    }

    document.addEventListener("DOMContentLoaded", function() {
      var url = window.location.href;
      var parametros = new URLSearchParams(new URL(url).search);
      var codigoDePedido = parametros.get("codigo");
      document.getElementById("codigoPedido").textContent = codigoDePedido;

      document.getElementById('cancelarVenta').addEventListener('click', function() {
        if (confirm('¿Estás seguro de que deseas cancelar la venta?')) {
          // Crear una instancia de XMLHttpRequest
          var xhr = new XMLHttpRequest();
          
          // Configurar la solicitud
          xhr.open('GET', '../php/eliminarPedido.php?codigoPedido=' + codigoDePedido, true);
          
          // Manejar la respuesta
          xhr.onload = function() {
            if (xhr.status === 200) {
              alert('La venta ha sido cancelada con éxito.');
              window.location.href = 'caja.php';  // Redirigir a la página deseada
            } else {
              alert('Ocurrió un error al cancelar la venta.');
            }
          };
          
          // Enviar la solicitud
          xhr.send();
        }
      });

      // Manejar el evento de clic en el botón "Registrar"
      $(document).ready(function() {
        $("#registrarVenta").click(function() {
          // Obtener los datos de la tabla
          var ventas = [];
          $("#tablaVentas tbody tr").each(function() {
            var cantidad = $(this).find("td:eq(0)").text();
            var producto = $(this).find("td:eq(1)").text();
            var precio = $(this).find("td:eq(2)").text();
            var importe = $(this).find("td:eq(3)").text();
            ventas.push({ cantidad, producto, precio, importe });
          });

          // Obtener el valor del total
          var total = $("#totalVentas").val();

          // Enviar datos al servidor (usando AJAX)
          $.ajax({
            type: "POST",
            url: "../php/registrarVenta.php", // El archivo PHP que procesará la venta
            data: { ventas: JSON.stringify(ventas), total: total },
            success: function(response) {
              // Manejar la respuesta del servidor, si es necesario
              alert(response);
            }
          });

          // Crear una instancia de XMLHttpRequest
          var xhr = new XMLHttpRequest();
          
          // Configurar la solicitud
          xhr.open('GET', '../php/eliminarPedido.php?codigoPedido=' + codigoDePedido, true);
          
          // Manejar la respuesta
          xhr.onload = function() {
            if (xhr.status === 200) {
              window.location.href = 'caja.php';  // Redirigir a la página deseada
            } 
            
          };
          
          // Enviar la solicitud
          xhr.send();

        });
      });

    });

    // Agrega un script JavaScript para calcular el total
    var tablaVentas = document.getElementById('tablaVentas');
    var totalVentasInput = document.getElementById('totalVentas');
    // Función para calcular el total
    function calcularTotal() {
      var filas = tablaVentas.querySelectorAll('tbody tr');
      var total = 0;

      filas.forEach(function(fila) {
        var importe = parseFloat(fila.querySelector('td:nth-child(4)').textContent);
        total += importe;
      });

      totalVentasInput.value = total.toFixed(2); // Mostrar el total con dos decimales
    }
    // Llama a la función para calcular el total
    calcularTotal();
    
    
    
  </script>
</body>
</html>