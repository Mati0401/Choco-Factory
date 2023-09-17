<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABM</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Tipos de letra -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
</head>
<style>
  /* Estilos para las columnas */
  .columna-vacia {
    height: 100vh;
    background-image: url(../img/fondo-azul.jpg);
  }
  .columna-medio {
    height: 100vh;
    background-color: #F6EECB;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
  }
  .row-superior {
    height: 15vh;
  }
  .row-centro {
    height: 75vh;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
  }
  .row-inferior {
    height: 10vh;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
  }

  /* Titulo */
  .titulo {
    font-size: 40px;
    font-family: 'Rubik Wet Paint', cursive;
    padding: 20px 0 15px 0;
  }

  /* Estilos para la Tabla */
  table {
    width: 100%;
    border-collapse: collapse;
    background-color: #E5F1ED;
  }
  th {
    color: black;
    font-size: 20px;
    background-color: #000209;
    color: #E5F1ED;
  }
  td {
    border-bottom: 1px solid black;
    font-size: 15px;
    color: #282C30;
  }
  .table-container {
    max-height: 500px; /* Altura máxima del contenedor antes de que aparezca el scroll */
    overflow-y: auto; /* Agrega scroll vertical al contenedor si el contenido excede la altura máxima */
  }
  #tablaAccion {
    width: 100%; /* Tamaño completo de la tabla */
    border-collapse: collapse;
  }
  #tablaAccion th, #tablaAccion td {
    border: 1px solid black; /* Estilo de borde para celdas */
    padding: 8px;
    font-weight: bold;
  }
  .td-izquierda {
    text-align: left;
  }
  .td-centrado {
    text-align: center;
  }
  .th-numero {
    width: 8%;
  }
  .th-vacio {
    width: 0%;
  }
  .th-nombre {
    width: 16%
  }
  .th-descripcion {
    width: 45%;
  }
  .th-accion {
    width: 15%;
    text-align: center;
  }
  /* Oculta la columna imagen */
  .oculto {
    display: none;
  }

  /* Botones */
  .btn-volver {
    border: 1px solid blue;
    color: white;
    font-size: 15px;
    font-weight: bold;
    background-color:#000209;
  }
  .btn-volver:hover {
    border: 1px solid black;
    background-color: #E5F1ED;
    color: black;
  }

  /* Iconos */
  .bi-x-circle {
    font-size: 20px;
    color: black;
  }
  .bi-pen {
    font-size: 20px;
    color: black;
  }

  /* Estilos para modal*/
  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    display: none;
    z-index: 9999; /* Asegura de que el modal esté en la parte superior */
  }
  .eliminarProducto {
    text-decoration: none; 
    color: black;
    font-weight: bold;
    font-size: 15px;
    margin: 0;
    padding: 0;
    vertical-align: center;
    height: 25px;
    width: 70px;
  }
  .close {
    position: absolute; 
    top: 1em; 
    right: 1em;
    font-weight: bold;
    font-size: 22px;
    border: 1px solid black;
  }
  /* Formato para imagen del modal */
  .producto-imagen {
    max-width: 250px; 
    max-height: 250px; 
  }

  /* Estilos para el modal Modificar */
  .modal-content-modificar {
    background-color: white;
    position: absolute;
    width: 800px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  }
  .abrirModal {
    color: black;
    font-weight: bold;
    font-size: 15px;
    margin: 0;
    padding: 0;
    vertical-align: center;
    height: 25px;
    width: 70px;
  }
  #modal form {
    background-color: #31D1E7;
    width: 800px;
    height: 500px;
    margin: 0 auto;
    color: black;
    text-align: center;
  }
  .form-group {
    margin-bottom: 10px; 
    font-size: 20px;
    height: 40px;
    width: 350px;
  }
  .form-group label {
    display: inline-block;
    width: 100px; 
    text-align: left; 
    margin-right: 5px; 
    vertical-align: top;
    font-size: 18px;
    font-weight: bold;
  }
  .form-group input {
    display: inline-block;
    width: 200px; 
  }
  .col-mod-izq {
    height: 340px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .col-mod-der {
    height: 340px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .mod-titulo {
    height: 80px;
  }
  .col-mod-botones {
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .boton {
    margin: 20px 0 20px 0;
    margin-bottom: 70px;
    font-weight: bold;
    font-size: 22px;
    border: 1px solid black;
  }

  /* Estilo para el modal Ver */
  .modal-content {
    background-color: white;
    position: absolute;
    width: 500px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  }
  .abrirModalVer {
    color: black;
    font-weight: bold;
    font-size: 15px;
    margin: 0;
    padding: 0;
    vertical-align: center;
    height: 25px;
    width: 70px;
  }
  #modalVer form {
    width: 300px; /* Ajusta el ancho según tu diseño */
    margin: 0 auto;
    color: black;
    text-align: center;
  }

</style>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-1 columna-vacia">
        <!-- Vacio -->
      </div>
      <div class="col-10 columna-medio">
        <div class="row row-superior">
          <h4 class="titulo">PRODUCTOS</h4>
        </div>
        <div class="row row-centro w-100">
          <div class="table-container">
            <table id="tablaAccion">
              <tr>
                <th class="th-numero">ID</th>
                <th class="oculto">IMAGEN</th>
                <th class="th-nombre">NOMBRE</th>
                <th class="th-descripcion">DESCRIPCIÓN</th>
                <th class="th-numero">PRECIO</th>
                <th class="th-numero">STOCK</th>
                <th class="th-accion">ACCIÓN</th>
              </tr>
              <?php

              include '../php/conexion.php';
              include '../php/mostrarDatos.php';

              while($mostrar=mysqli_fetch_array($datos)){

                echo "<tr>";
                echo "<td class='td-izquierda'>".$mostrar['id']."</td>";
                $imagen_ruta = $mostrar['imagen'];
                echo "<td class='oculto'><img src='$imagen_ruta' alt='Imagen'></td>";
                echo "<td class='td-izquierda'>".$mostrar['nombre']."</td>";
                echo "<td class='td-izquierda'>".$mostrar['descripcion']."</td>";
                echo "<td class='td-centrado'>".$mostrar['precio_unitario']."</td>";
                echo "<td class='td-centrado'>".$mostrar['stock']."</td>";
                echo '<td class="td-centrado">
                <a href="#" class="btn abrirModalVer" data-id="'.$mostrar['id'].'">Ver</a>
                <a href="#" class="btn abrirModal" data-id="'.$mostrar['id'].'">Modificar</a>
                <a href="../php/eliminar.php?id=' . $mostrar['id'] . '" onClick="return confirm(\'¿Estás seguro de eliminar el producto ' . $mostrar['nombre'] . '?\')" class="btn eliminarProducto">Eliminar</a>
                </td>';
                echo '</tr>';

              }
              
              ?>
            </table> 
          </div>
          <!-- Modal-Ver -->
          <div class="overlay" id="modalVer" style="display: none;">
            <div class="modal-content"> 
              <form class="form-control">
                <div class="form-control border-white">
                  <input type="text" name="nombre" class="form-control input-ver" readonly>
                </div>
                <div class="form-control border-white">
                  <img src="" alt="Imagen del producto" class="producto-imagen">
                </div>
                <div class="form-control border-white">
                  <label for="">Descripcion :</label>
                  <input type="text" name="descripcion" class="form-control input-ver" readonly>
                </div>
                <div class="form-control border-white">
                  <label for="">Precio unitario :</label>
                  <input type="number" name="precio_unitario" class="form-control input-ver" readonly>
                </div>
                <div class="form-control border-white">
                  <label for="">Stock :</label>
                  <input type="number" name="stock" class="form-control input-ver" readonly>
                </div>
                <div class="form-control border-white">
                  <button class="position-absolute btn btn-danger close">Cerrar</button>
                </div>
              </form>
              <button id="mostrarMensaje" class="btn btn-primary">Solicitar Producción</button>
              <p id="mensaje" style="display: none;">Se ha solicitado a producción fabricar más unidades de este producto</p>
            </div>
          </div>
          <!-- Modal-Modificar -->
          <div class="overlay" id="modal" style="display: none;">
            <div class="modal-content-modificar"> 
              <form class="form-control" method="post" action="../php/modificar.php" enctype="multipart/form-data">
                <div class="row mod-titulo">
                  <h1 class="titulo">Modificar</h1>
                </div>
                <div class="row">
                  <div class="col-6 col-mod-izq">
                    <div class="border-white">
                      <input type="file" name="nueva_imagen" class="form-control input-imagen" accept="image/*">
                      <img src="" alt="Imagen del producto" class="producto-imagen">
                    </div>
                  </div>
                  <div class="col-6 col-mod-der">
                    <div class="form-group border-white">
                      <label for="">Id:</label>
                      <input type="number" name="id" class="form-control input-modificar" readonly>
                    </div>
                    <div class="form-group border-white">
                      <label for="">Nombre:</label>
                      <input type="text" name="nombre" class="form-control input-modificar" required>
                    </div>
                    <div class="form-group border-white">
                      <label for="">Descripcion:</label>
                      <input type="text" name="descripcion" class="form-control input-modificar" required>
                    </div>
                    <div class="form-group border-white">
                      <label for="">Precio:</label>
                      <input type="number" name="precio_unitario" class="form-control input-modificar" required>
                    </div>
                    <div class="form-group border-white">
                      <label for="">Stock:</label>
                      <input type="number" name="stock" class="form-control input-modificar" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-mod-botones">
                    <button class="btn btn-primary boton">Guardar</button>
                    <button type="button" class="position-absolute btn btn-danger close">Cerrar</button>
                  </div>
                </div>
              </form>         
            </div>
          </div>
        </div>
        <div class="row row-inferior">
          <button class="btn btn-primary btn-volver" onclick="redirectToURL()">VOLVER</button>
        </div>
      </div>   
      <div class="col-1 columna-vacia">
        <!-- Vacio -->
      </div>
    </div>
  </div>
  <script>

    function abrirModalModificar(){
      const openButtons = document.querySelectorAll(".abrirModal");
      const modal = document.getElementById("modal");
      const closeButton = modal.querySelector(".btn-danger");
      const productoImagen = modal.querySelector(".producto-imagen");
      const inputs = modal.querySelectorAll(".input-modificar");
      const inputImagenes = modal.querySelectorAll(".input-imagen"); 

      // Función para llenar el modal con los datos del producto
      const fillData = (data) => {
        inputs[0].value = data.id;
        inputs[1].value = data.nombre;
        inputs[2].value = data.descripcion;
        inputs[3].value = data.precio_unitario;
        inputs[4].value = data.stock;
        productoImagen.src = data.imagen;
      };

      // Evento para abrir el modal 
      for (const button of openButtons) {
        button.addEventListener("click", async (e) => {
          const productoId = e.target.parentElement.parentElement.children[0].textContent;
          
          // Realiza una solicitud AJAX para obtener los datos del producto por su ID
          try {
            const response = await fetch(`../php/obtenerProducto.php?id=${productoId}`);
            const data = await response.json();

            if (response.ok) {
              fillData(data);
              modal.style.display = "block";
            } else {
              console.error("Error al obtener los datos del producto");
            }
          } catch (error) {
            console.error("Error de red:", error);
          }
        });
      }

      // Cierra el modal al hacer clic en el botón "Cerrar"
      closeButton.addEventListener("click", () => {
        modal.style.display = "none";
      });

      // Agregar manejador de eventos para los campos de entrada de archivo
      inputImagenes.forEach((inputImagen) => {
        inputImagen.addEventListener("change", () => {
          // Actualizar la vista previa de la imagen con la imagen seleccionada
          const imagenSeleccionada = inputImagen.files[0];
          if (imagenSeleccionada) {
            const urlImagen = URL.createObjectURL(imagenSeleccionada);
            productoImagen.src = urlImagen;
          }
        });
      });
    }

    function abrirModalVer(){
      const openButtonsVer = document.querySelectorAll(".abrirModalVer");
      const modalVer = document.getElementById("modalVer");
      const closeButtonVer = modalVer.querySelector(".btn-danger");
      const productoImagen = modalVer.querySelector(".producto-imagen");
      const inputsVer = modalVer.querySelectorAll(".input-ver");

      // Función para llenar el modal con los datos del producto
      const fillDataVer = (dataVer) => {
        inputsVer[0].value = dataVer.nombre;
        inputsVer[1].value = dataVer.descripcion;
        inputsVer[2].value = dataVer.precio_unitario;
        inputsVer[3].value = dataVer.stock;
        productoImagen.src = dataVer.imagen;
      };

      // Evento para abrir el modal "ver" cuando se hace clic en un botón "Ver"
      for (const buttonVer of openButtonsVer) {
        buttonVer.addEventListener("click", async (e) => {
          const productoId = e.target.parentElement.parentElement.children[0].textContent;
          
          // Realiza una solicitud AJAX para obtener los datos del producto por su ID
          try {
            const response = await fetch(`../php/obtenerProducto.php?id=${productoId}`);
            const dataVer = await response.json();

            if (response.ok) {
              fillDataVer(dataVer);
              modalVer.style.display = "block";
            } else {
              console.error("Error al obtener los datos del producto");
            }
          } catch (error) {
            console.error("Error de red:", error);
          }
        });
      }

      // Cierra el modal al hacer clic en el botón "Cerrar"
      closeButtonVer.addEventListener("click", () => {
        modalVer.style.display = "none";
      });
    }

    document.addEventListener("DOMContentLoaded", function(){
      // Abrir Modal Modificar
      abrirModalModificar();

      // Abrir Modal Ver
      abrirModalVer();

      // Función para mostrar el mensaje cuando se presione el botón
      document.getElementById("mostrarMensaje").addEventListener("click", function() {
        document.getElementById("mensaje").style.display = "block";
      });
      // Obtén una lista de todos los elementos con la clase "modal-content"
      const modalContents = document.querySelectorAll(".modal-content");

      // Itera a través de los elementos y agrega un evento a cada uno
      modalContents.forEach((modalContent) => {
        modalContent.addEventListener("click", function(event) {
          event.stopPropagation();
        });
      });

    });

    // Funcionamiento del boton de volver
    function redirectToURL() {
      window.location.href = "../index.php"; 
    }

  </script>
</body>
</html>
