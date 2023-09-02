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
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- JQuery para AJAX -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 </head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  /* Estilo para el fondo */
  .fondo {
    background-color: #f0f0f0;
  }

  /* Tamaño de los row */
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

  /* Estilo adicional para la imagen */
  #image-preview {
    max-width: 100%;
    max-height: 100%;
    display: block;
    margin: 0 auto;
  }
  /* Estilo para ocultar el título y el input después de cargar la imagen */
  .hidden {
    display: none;
  }

  /* Estilo para la lista de productos */
  .titulo-lista {
    font-size: 28px;
    font-weight: bold;
  }
  table {
    width: 100%;
    border: colapse;
    background-color: rgba(223, 214, 197, 0.5);
  }
  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  th {
    font-weight: bold;
  } 
  td {
    white-space: nowrap; /* Evita que el contenido se corte en celdas pequeñas */
  }
  .cantidad {
    width: 20%;
  }
  .descripcion {
    width: 40%;
  }
  .precio_unitario {
    width: 20%;
  }
  .importe {
    width: 20%;
  }

  /* Estilo para el menu desplegable - Producto */
  #opciones {
    position: absolute;
    display: none;
    background-color: #f9f9f9;
    padding: 10px;
    border: 1px solid #ccc;
    z-index: 1; /* Asegura que el menú se superponga sobre otros elementos */
  }
  /* Formato para las opciones */
  #opciones p {
    margin: 0;
    padding: 5px 10px;
  }

  /* Estilo para el logo */
  .fondo-logo {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .texto-titulo {
    font-size: 40px;
    font-family: 'Rubik Wet Paint', cursive;
  }

  /* Formato para todos los botones */
  .botones {
    background-color: #8B0000;
    border-color: black;
    font-weight: bold;
  }
  .botones:hover {
    background-color: #D2691E;
  }
  .botones:active {
    background-color: rgba(223, 214, 197, 0.5); /* Este es el color que quieres cambiar */
    color: black;
  }
  /* Estilos generales del modal */
  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    display: none;
    z-index: 9999;
  }
  .modal-content {
    background-color: white;
    position: absolute;
    width: 500px;
    height: 500px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  }
  .close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
  }

  /* Estilos para modal Cargar Manualmente */
  .modalTabla {
    height: 80%;
  }
  .modalBoton {
    height: 20%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

</style>
<body>
  <div class="container-fluid fondo">
    <!-- Contenido de la primera fila -->
    <div class="row fila-uno">
      <div class="col-4 d-flex align-items-center justify-content-start">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary dropdown-toggle botones" data-bs-toggle="dropdown" aria-expanded="false">
            Producto
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" onmouseover="cambiarColor(this)" onmouseout="restaurarColor(this)" href="vistas/agregarNuevoProducto.php">Agregar</a></li>
            <li><a class="dropdown-item" onmouseover="cambiarColor(this)" onmouseout="restaurarColor(this)" href="vistas/modificarBorrar.php">Borrar y Modificar</a></li>
            <li><a class="dropdown-item" onmouseover="cambiarColor(this)" onmouseout="restaurarColor(this)" href="#">Solicitar fabricación</a></li>
          </ul>
        </div>
      </div>
      <div class="col-4 fondo-logo">
        <div class="logo">
          <span class="texto-titulo">CHOCO FACTORY</span>
        </div>
      </div>
      <div class="col-4"><!-- Vacio --></div>
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
        <p class="titulo-lista">LISTA DE PRODUCTOS</p>
        <table id="miTabla">
          <thead>
            <tr>
              <th>Cantidad</th>
              <th>Nombre del Producto</th>
              <th>Precio Unitario</th>
              <th>Importe</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
    <!-- Contenido de la ultima fila -->
    <div class="row fila-tres">
      <div class="col-3 d-flex align-items-center justify-content-start">
        <button id="abrirModalCargarManualmente" class="btn btn-primary botones">
          Cargar Manualmente
          <i class="bi bi-hand-index"></i>
        </button>
        <!-- Modal -->
        <div class="overlay" id="modalCargarManualmente">
          <div class="modal-content">
            <div class="modalTabla">
              <button class="close" id="cerrarModal">&times;</button>
              <button id="agregarCombobox">Agregar Combobox</button>
              <table class="tablaCargarManualmente">
                <thead>
                  <tr>
                    <th class="tablaColCantidad">Cantidad</th>
                    <th class="tablaColNombre">Nombre del Producto</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input type="number" class="cantidadInput" min="1">
                    </td>
                    <td>
                      <select id="productoSelect1" class="productoSelect"></select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div id="contenedorCombobox"></div>
                      <!-- Aquí puedes agregar filas si es necesario -->
                    </td>
                  </tr>
                </tbody>

              </table>
            </div>
            <div class="modalBoton">
              <button class="btn btn-primary">Cargar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-1"><!-- Vacio --></div>
      <div class="col-2 d-flex align-items-center justify-content-end">
        <button type="button" class="btn btn-primary botones">
          Volver a Cargar
          <i class="bi bi-arrow-repeat"></i>
        </button>
      </div>
      <div class="col-2"><!-- Vacio --></div>
      <div class="col-2"><!-- Vacio --></div>
      <div class="col-2 d-flex align-items-center justify-content-end">
        <button type="button" class="btn btn-primary botones">
          Enviar a Caja
          <i class="bi bi-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>
  <script>
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

    // Efecto para las opciones de Producto
    function cambiarColor(elemento) {
      elemento.style.backgroundColor = "rgba(255, 165, 0, 0.5)"; // Cambiar a cualquier color deseado
    }
    function restaurarColor(elemento) {
      elemento.style.backgroundColor = ""; // Restaurar el color original
    }

    document.addEventListener("DOMContentLoaded", function() {
      const abrirModalButton = document.getElementById("abrirModalCargarManualmente");
      const modal = document.getElementById("modalCargarManualmente");
      const cerrarModalButton = document.getElementById("cerrarModal");
      const tabla = document.querySelector(".tablaCargarManualmente tbody");

      // Función para restablecer el modal y la tabla
      function restablecerModal() {
        // Ocultar el modal
        modal.style.display = "none";
        
        // Limpiar todas las filas en la tabla, excepto la primera
        const filas = tabla.querySelectorAll("tr");
        for (let i = 1; i < filas.length; i++) {
          tabla.removeChild(filas[i]);
        }

        // Limpiar el input de cantidad en la primera fila
        const cantidadInput1 = tabla.querySelector(".cantidadInput");
        cantidadInput1.value = "";

        // Limpiar el combobox en la primera fila
        const productoSelect1 = tabla.querySelector(".productoSelect");
        productoSelect1.selectedIndex = -1; // Limpiar la selección

        contadorFilas = 1;
      }

      // Evento para cerrar el modal y restablecerlo al hacer clic en el botón "Cerrar Modal"
      cerrarModalButton.addEventListener("click", restablecerModal);

      // Evento para cerrar el modal al hacer clic fuera del modal y restablecerlo
      window.addEventListener("click", function(event) {
        if (event.target === modal) {
          restablecerModal();
        }
      });

      abrirModalButton.addEventListener("click", function() {
        modal.style.display = "block";
      });

      window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
      });
    });

    // Obtener referencias a los elementos Select por sus IDs
    const productoSelect1 = document.getElementById("productoSelect1");

    // Realizar una solicitud AJAX al archivo PHP para cargar datos en el primer combobox
    $.ajax({
      url: "php/cargarNombreProductos.php",
      type: "GET",
      dataType: "json",
      success: function(data) {
        // Llenar el primer combobox con los nombres de productos
        data.forEach(nombre => {
          const option = new Option(nombre, nombre);
          productoSelect1.appendChild(option);
        });

        // Inicializar Select2 en el primer combobox
        $(productoSelect1).select2();
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });

    const agregarFilaButton = document.getElementById("agregarCombobox");

    // Contador de filas
    let contadorFilas = 1;

    // Límite de filas
    const limiteFilas = 5; 

    // Función para agregar una nueva fila
    function agregarFila() {
      // Verificar si se ha alcanzado el límite de filas
      if (contadorFilas < limiteFilas) {
        // Crear un nuevo combobox
        const nuevoCombobox = $("<select class='productoSelect'></select>");

        // Agregar el nuevo combobox al contenedor
        const nuevaFila = $("<tr></tr>");
        nuevaFila.append("<td><input type='number' class='cantidadInput' min='1'></td>");
        nuevaFila.append("<td></td>"); // Espacio para el nuevo combobox
        nuevaFila.find("td:last-child").append(nuevoCombobox);

        $(".tablaCargarManualmente tbody").append(nuevaFila);

        // Realizar una solicitud AJAX para cargar datos en el nuevo combobox
        $.ajax({
          url: "php/cargarNombreProductos.php",
          type: "GET",
          dataType: "json",
          success: function (data) {
            // Llenar el nuevo combobox con los nombres de productos
            data.forEach(nombre => {
              const option = new Option(nombre, nombre);
              nuevoCombobox.append(option);
            });

            // Inicializar Select2 en el nuevo combobox
            nuevoCombobox.select2();
          },
          error: function (xhr, status, error) {
            console.error(error);
          }
        });

        // Incrementar el contador de filas
        contadorFilas++;
      } else {
        alert("Se ha alcanzado el límite de filas.");
      }
    }

    // Escuchar el clic en el botón "Agregar Combobox"
    agregarFilaButton.addEventListener("click", agregarFila);

  </script>
</body>
</html>