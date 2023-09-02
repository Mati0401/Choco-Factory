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

  /* Estilos generales del modal */
  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    display: none;
    z-index: 9999; /* Asegúrate de que el modal esté en la parte superior */
  }
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

  /* Estilos para el contenido dentro del modal */
  #modal form {
    width: 300px; /* Ajusta el ancho según tu diseño */
    margin: 0 auto;
    color: black;
    text-align: center;
  }
  .close {
    position: absolute; /* Added "position" property */
    top: 1em; /* Adjusted for better visibility */
    right: 1em; /* Added to control the horizontal position */
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
              echo "<td class='td-izquierda'>".$mostrar['nombre']."</td>";
              echo "<td class='td-izquierda'>".$mostrar['descripcion']."</td>";
              echo "<td class='td-centrado'>".$mostrar['precio_unitario']."</td>";
              echo "<td class='td-centrado'>".$mostrar['stock']."</td>";
              echo '<td class="td-centrado">
              <button class="btn abrirModal"><i class="bi bi-pen"></i></button>
              <a href="../php/eliminar.php?id=' . $mostrar['id'] . '" onClick="return confirm(\'¿Estás seguro de eliminar el producto ' . $mostrar['nombre'] . '?\')"><i class="bi bi-x-circle"></i></a>
              </td>';
              echo '</tr>';

            }
            
            ?>
          </table> 
          </div>
          <!-- Modal -->
          <div class="overlay" id="modal" style="display: none;">
            <div class="modal-content"> 
              <form class="form-control" method="post" action="../php/modificar.php">
                <h1 class="text-center">Modificar</h1>
                <div class="form-control border-white">
                  <label for="">Id :</label>
                  <input type="text" name="id" class="form-control" readonly>
                </div>
                <div class="form-control border-white">
                  <label for="">Nombre :</label>
                  <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="form-control border-white">
                  <label for="">Descripcion :</label>
                  <input type="text" name="descripcion" class="form-control" required>
                </div>
                <div class="form-control border-white">
                  <label for="">Precio unitario :</label>
                  <input type="number" name="precio_unitario" class="form-control" required>
                </div>
                <div class="form-control border-white">
                  <label for="">Stock :</label>
                  <input type="number" name="stock" class="form-control" required>
                </div>
                <div class="form-control border-white">
                  <button class="btn btn-primary">Guardar</button>
                  <button class="position-absolute btn btn-danger close">Cerrar</button>
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

    const table = document.getElementById("table");
    const modal = document.getElementById("modal");
    const openButtons = document.querySelectorAll(".abrirModal");
    const closeButton = modal.querySelector(".btn-danger");
    const inputs = modal.querySelectorAll("input");
    let count = 0;

    for (const button of openButtons) {
        button.addEventListener("click", (e) => {
        let data = e.target.parentElement.parentElement.children;
        fillData(data);
        modal.style.display = "block";

        // Reiniciar el contador después de un breve período de tiempo
        setTimeout(() => {
            count = 0;
        }, 100); // Puedes ajustar el tiempo según sea necesario
        });
    }

    closeButton.addEventListener("click", () => {
        modal.style.display = "none";
        count = 0;
    });

    const fillData = (data) => {
        for (let index of inputs) {
        index.value = data[count].textContent;
        count ++;
        }
    };

    // Funcionamiento del boton de volver
    function redirectToURL() {
      window.location.href = "../index.php"; 
    }

  </script>
</body>
</html>
