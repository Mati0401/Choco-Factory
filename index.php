<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Titulo -->
  <title>Choco Factory</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <!-- Favicon -->
  <link rel="icon" href="img/icono-index.png" type="image/png">
  <!-- Tipos de letra -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Script para generar el QR -->
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>
<style>
  body {
    font-family: 'Oswald', sans-serif;
  }
  /* Estilo para el fondo */
  .fondo {
    background-color: #ECFEF6;
  }
  /* Division de la ventana */
  .fila-uno {
    height: 10vh;
  }
  .fila-dos {
    height: 80vh;
  }
  .fila-tres {
    height: 10vh;
  }
  /* Formato para las columnas */
  .columna-izquierda {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .columna-derecha {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: start;
    padding: 10px 25px 0 25px;
  }
  /* Estilo de la bandeja de carga de imagen */
  .contenedor-caja {
    height: 80vh;
  }
  .frame-box {
    border: 1px solid black;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }
  .titulo-bandeja-carga {
    font-weight: bold;
    font-size: 30px;
  }
  .input-field {
    margin-top: 10px;
  }
  #image-preview {
    max-width: 100%;
    max-height: 100%;
    display: block;
    margin: 0 auto;
  }
  /* Estilo para la lista de productos */
  .contenedor-titulo {
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: start;
  }
  .contenedor-tabla {
    height: 60vh;
  }
  .contenedor-total {
    height: 10vh;
  }
  .titulo-lista {
    font-size: 24px;
    font-weight: bold;
    font-family: 'Oswald', sans-serif;
  }
  .tabla-productos {
    width: 700px;
  }
  /* Formato para el Logo */
  .contenedor-logo {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .texto-titulo {
    font-size: 40px;
    font-family: 'Rubik Wet Paint', cursive;
  }
  /* Formato para los botones */
  .botones {
    font-weight: bold;
    font-size: 20px;
    border: 1px solid black;
    background-color: #B1FEEC;
    color: black;
    padding: 5px 20px 5px 20px;
    font-family: 'Oswald', sans-serif;
  }
  .botones:hover {
    background-color: #F8EE70;
    color: black;
  }
  .botones:active {
    background-color: #F8EE70;
    color: black;
  }
  /* Formato para opciones*/
  .opcion {
    font-weight: bold;
    font-family: 'Oswald', sans-serif;
    font-size: 18px;
  }
  .opcion:hover {
    background-color: #F8EE70;
    color: black;
  }
  .opcion:active {
    background-color: #F8EE70;
    color: black;
  }
  /* Formato boton eliminar */
  .contenedor-boton-eliminar {
    display: flex;
    align-items: center;
    justify-content: end;
  }
  .boton-eliminar {
    font-weight: bold;
    font-size: 20px;
    border: 1px solid black;
    background-color: #B1FEEC;
    color: black;
    padding: 5px 20px 5px 20px;
    font-family: 'Oswald', sans-serif;
  }
  .boton-eliminar:hover {
    background-color: #F8EE70;
    color: black;
  }
  .boton-eliminar:active {
    background-color: #F8EE70;
    color: black;
  }

</style>
<body>
  <div class="container-fluid fondo">
    <!-- Contenido de la primera fila -->
    <div class="row fila-uno">
      <div class="col-4 d-flex align-items-center justify-content-start">
        <div class="btn-group" role="group">
          <button type="button" class="dropdown-toggle botones" data-bs-toggle="dropdown" aria-expanded="false">
            Producto
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item opcion" href="vistas/agregarNuevoProducto.php">Agregar</a></li>
            <li><a class="dropdown-item opcion" href="vistas/modificarBorrar.php">Borrar y Modificar</a></li>
          </ul>
        </div>
      </div>
      <div class="col-4 contenedor-logo">
        <div class="logo">
          <span class="texto-titulo">CHOCO FACTORY</span>
        </div>
      </div>
      <div class="col-4">
        <!-- Vacio -->
      </div>
    </div>
    <!-- Contenido de la segunda fila -->
    <div class="row fila-dos">
      <!-- Contenido de la columna izquierda -->
      <div class="col-6 columna-izquierda">
        <div class="container contenedor-caja">
          <div class="frame-box">
            <p class="titulo-bandeja-carga">Cargar imagen</p>
            <input class="input-field" type="file" id="image-upload" accept="image/*">
            <br>
            <img id="image-preview" src="#" alt="Vista previa de la imagen" style="max-width: 500px; max-height: 500px; display: none;">
          </div>
        </div>
      </div>
      <!-- Contenido de la columna derecha -->
      <div class="col-6 columna-derecha">
        <div class="row" style="width: 724px;">
          <div class="col-8 contenedor-titulo">
            <p class="titulo-lista d-flex flex-row">
              Carrito
              <i class="bi bi-cart3"></i>
            </p>
          </div>
          <div class="col-4 contenedor-boton-eliminar" id="botonEliminarContainer">
            <button id="btnEliminar" class="boton-eliminar" onclick="eliminarFilas()" style="display: none;">Eliminar</button>
          </div>
        </div>
        <div class="row">
          <div class="col-12 contenedor-tabla">
            <table id="tablaProductos" class="table table-striped table-bordered tabla-productos">
              <thead>
                <tr>
                  <th>Cantidad</th>
                  <th>Producto</th>
                  <th>Precio Unitario</th>
                  <th>Importe</th>
                </tr>
              </thead>
              <tbody>
                <!-- Aqui se añaden los productos reconocidos o cargados manualmente -->
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-12 contenedor-total">
            <input type="text" id="inputTotal" class="form-control" placeholder="Total" readonly>
          </div>
        </div>
      </div>
    </div>
    <!-- Contenido de la ultima fila -->
    <div class="row fila-tres">
      <div class="col-3 d-flex align-items-center justify-content-start">
        <button type="button" class="botones" data-bs-toggle="modal" data-bs-target="#modalCargarManualmente">
          Cargar Manualmente
          <i class="bi bi-hand-index"></i>
        </button>
        <!-- Modal Cargar Manualmente -->
        <div class="modal fade" id="modalCargarManualmente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 texto-titulo" id="exampleModalLabel">Cargar Manualmente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table id="tablaCargarManualmente" class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Producto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <input type="number" min="1" step="1" class="form-control" placeholder="Cantidad">
                      </td>
                      <td>
                        <select class="form-select">
                          <option selected>Seleccione un producto</option>
                          <?php
                            include("php/cargarNombreProductos.php");
                            foreach ($productos as $producto) {
                              echo "<option value=\"$producto[nombre]\" data-precio=\"$producto[precio_unitario]\">$producto[nombre]</option>";
                            }
                          ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <input type="number" min="1" step="1" class="form-control" placeholder="Cantidad">
                      </td>
                      <td>
                        <select class="form-select">
                          <option selected>Seleccione un producto</option>
                          <?php
                            include("php/cargarNombreProductos.php");
                            foreach ($productos as $producto) {
                              echo "<option value=\"$producto[nombre]\" data-precio=\"$producto[precio_unitario]\">$producto[nombre]</option>";
                            }
                          ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <input type="number" min="1" step="1" class="form-control" placeholder="Cantidad">
                      </td>
                      <td>
                        <select class="form-select">
                          <option selected>Seleccione un producto</option>
                          <?php
                            include("php/cargarNombreProductos.php");
                            foreach ($productos as $producto) {
                              echo "<option value=\"$producto[nombre]\" data-precio=\"$producto[precio_unitario]\">$producto[nombre]</option>";
                            }
                          ?>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button id="btnCargar" class="btn btn-primary w-100" type="button">Cargar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-1"><!-- Vacio --></div>
      <div class="col-2 d-flex align-items-center justify-content-end">
        <button type="button" class="botones" id="volver-a-cargar">
          Volver a Cargar
          <i class="bi bi-arrow-repeat"></i>
        </button>
      </div>
      <div class="col-3">

      </div>
      <div class="col-3 d-flex align-items-center justify-content-end">
        <button type="button" class="botones" data-bs-toggle="modal" data-bs-target="#modalTicket" onclick="generarQR()">
          Enviar a caja
          <i class="bi bi-arrow-right"></i>
        </button>
        <!-- Modal Ticket -->
        <div class="modal fade" id="modalTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ticket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div id="qrContainer" class="d-flex align-items-center justify-content-center">
                  <!-- Aquí se mostrará el QR -->
                </div>
                <div id="codigoPedidoContainer" class="text-center mt-3">
                  <!-- Aquí se mostrará el código alfanumérico -->
                </div>              
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary w-100" type="button" id="btnImprimir" onclick="capturarDatosTabla()">Imprimir</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    
    document.addEventListener("DOMContentLoaded", function(){
      // Carga de la imagen y Ocultamiento
      document.getElementById('image-upload').addEventListener('change', function (e) {
        var imagePreview = document.getElementById('image-preview');
        imagePreview.style.display = 'block'; // Muestra la vista previa de la imagen

        var h1Element = document.querySelector('.frame-box p');
        h1Element.style.display = 'none'; // Oculta el título

        var inputElement = document.getElementById('image-upload');
        inputElement.style.display = 'none'; // Oculta el input

        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function (event) {
          imagePreview.src = event.target.result;
        };

        reader.readAsDataURL(file);
      });

      // Botón "Volver a Cargar"
      document.getElementById('volver-a-cargar').addEventListener('click', function () {
        var imagePreview = document.getElementById('image-preview');
        imagePreview.style.display = 'none'; // Oculta la vista previa de la imagen

        var h1Element = document.querySelector('.frame-box p');
        h1Element.style.display = 'block'; // Muestra el título

        var inputElement = document.getElementById('image-upload');
        inputElement.style.display = 'block'; // Muestra el input

        // Limpiar la imagen seleccionada
        inputElement.value = '';
      });

      // Función para manejar el clic en el botón "Cargar"
      function cargarFila() {
        var tabla = document.querySelector('#tablaCargarManualmente');
        var filas = tabla.querySelectorAll('tbody tr');
        var total = 0;

        // Calcular el total incluyendo todas las filas existentes
        var filasProductos = document.querySelectorAll('#tablaProductos tbody tr');
        filasProductos.forEach(function(filaProducto) {
          var subtotal = parseFloat(filaProducto.cells[3].textContent);
          if (!isNaN(subtotal)) {
            total += subtotal;
          }
        });

        filas.forEach(function(fila) {
          var cantidad = fila.querySelector('input[type="number"]').value;
          var productoSelect = fila.querySelector('select');
          var producto = productoSelect.value;
          var precio = parseFloat(productoSelect.options[productoSelect.selectedIndex].getAttribute('data-precio'));

          if (cantidad !== '' && producto !== 'Seleccione un producto' && !isNaN(precio)) {
            var subtotal = cantidad * precio;
            total += subtotal;

            var nuevaTabla = document.querySelector('#tablaProductos tbody');
            var nuevaFila = nuevaTabla.insertRow();
            var celdaCantidad = nuevaFila.insertCell(0);
            var celdaProducto = nuevaFila.insertCell(1);
            var celdaPrecio = nuevaFila.insertCell(2);
            var celdaSubtotal = nuevaFila.insertCell(3);

            // Agregar checkbox
            var celdaCheckbox = nuevaFila.insertCell(4);
            celdaCheckbox.innerHTML = '<input type="checkbox" class="form-check-input">';

            celdaCantidad.textContent = cantidad;
            celdaProducto.textContent = producto;
            celdaPrecio.textContent = precio;
            celdaSubtotal.textContent = subtotal;

            fila.querySelector('input[type="number"]').value = '';
            fila.querySelector('select').value = 'Seleccione un producto';
          }
        });

        var inputTotal = document.getElementById('inputTotal');
        inputTotal.value = total.toFixed(2);

        // Ocultar el modal después de cargar los productos
        $('#modalCargarManualmente').modal('hide');
      }

      // Agregar un evento de clic al botón "Cargar"
      var btnCargar = document.getElementById('btnCargar');
      btnCargar.addEventListener('click', cargarFila);

    });

    // Genera el QR a partir de los datos obtenidos
    function generarQR() {
      // Obtener los datos de la tabla
      var datosTabla = obtenerDatosTabla();

      // Crear el QR
      var qrContainer = document.getElementById('qrContainer');
      qrContainer.innerHTML = ''; // Limpiar cualquier QR anterior

      var qrcode = new QRCode(qrContainer, {
        text: JSON.stringify(datosTabla),
        width: 256,
        height: 256
      });
      // Abrir el modal después de que se ha generado el QR
      $('#modalTicket').modal('show');
    }

    // Obtiene los datos de la tabla para generar el QR
    function obtenerDatosTabla() {
      var datos = [];
      var filas = document.querySelectorAll('#tablaProductos tbody tr');

      filas.forEach(function(fila) {
        var cantidad = fila.cells[0].textContent;
        var producto = fila.cells[1].textContent;
        var precio = parseFloat(fila.cells[2].textContent);
        var subtotal = parseFloat(fila.cells[3].textContent);

        datos.push({
          cantidad: cantidad,
          producto: producto,
          precio: precio,
          subtotal: subtotal
        });
      });

      return datos;
    }

    // Escuchar cambios en el contenedor de la tablaProductos
    var tablaProductos = document.getElementById('tablaProductos');
    tablaProductos.addEventListener('change', function(event) {
      var target = event.target;
      if (target && target.type === 'checkbox') {
        actualizarBotonEliminar();
      }
    });

    // Si se marca un checkbox se muestra el boton Eliminar
    function actualizarBotonEliminar() {
      var filasSeleccionadas = document.querySelectorAll('#tablaProductos tbody input[type="checkbox"]:checked');
      var botonContainer = document.getElementById('btnEliminar');

      if (filasSeleccionadas.length > 0) {
        botonContainer.style.display = 'block';
      } else {
        botonContainer.style.display = 'none';
      }
    }

    // Elimina la fila marcada al dar al boton Eliminar
    function eliminarFilas() {
      var filasSeleccionadas = document.querySelectorAll('#tablaProductos tbody input[type="checkbox"]:checked');

      filasSeleccionadas.forEach(function (fila) {
        fila.closest('tr').remove();
      });

      // Ocultar el botón después de eliminar
      var botonContainer = document.getElementById('botonEliminarContainer');
      botonContainer.style.display = 'none';

      // Recalcular el total después de eliminar filas
      calcularTotal();
    }

    // Actualiza el valor del total al eliminar filas
    function calcularTotal() {
      var filas = document.querySelectorAll('#tablaProductos tbody tr');
      var total = 0;

      filas.forEach(function(fila) {
          var subtotal = parseFloat(fila.cells[3].textContent); // Suponemos que el subtotal está en la celda 3
          total += subtotal;
      });

      // Actualizar el valor del input de total
      document.getElementById('inputTotal').value = total;
    }

    // Función para mostrar el código de pedido en el modal
    function mostrarCodigoEnModal(codigoPedido) {
      document.getElementById("codigoPedidoContainer").innerText = codigoPedido;
    }

    // Llama a la función cuando se muestra el modal
    $('#modalTicket').on('shown.bs.modal', function () {
      // Realiza una solicitud AJAX para obtener el código de pedido
      $.ajax({
        url: 'php/generarCodigoAlfanumerico.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          mostrarCodigoEnModal(data.codigo_pedido);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });

    function capturarDatosTabla() {
      const table = document.getElementById("tablaProductos");
      const rows = table.getElementsByTagName("tr");
      const data = [];

      for (let i = 1; i < rows.length; i++) { // Empezamos desde 1 para omitir la fila de encabezados
        const row = rows[i];
        const cells = row.getElementsByTagName("td");

        const cantidad = cells[0].innerText;
        const producto = cells[1].innerText;
        const precioUnitario = cells[2].innerText;
        const importe = cells[3].innerText;

        data.push({ cantidad, producto, precioUnitario, importe });
      }

      const total = document.getElementById("inputTotal").value;
      const codigoAlfanumerico = document.getElementById("codigoPedidoContainer").innerText;

      // Envía los datos a PHP
      fetch("php/registrarPedido.php", {
        method: "POST",
        body: JSON.stringify({ data, total, codigoAlfanumerico }),
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert("Pedido guardado con éxito");
            location.reload();
          } else {
            alert("Error al guardar el pedido");
          }
        })
        .catch(error => {
          console.error("Error:", error);
        });
    }

  </script>
</body>
</html>