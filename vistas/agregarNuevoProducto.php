<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar nuevo producto</title>
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
  /* Imagen de fondo */
  body {
    background-image: url(../img/fondo-agregar.jpg);
    background-size: cover;
  }

  /* Estilo para las columnas */
  .columna-vacia {
    height: 100vh;
  }
  .columna-medio {
    margin: 10vh 0 10vh 0;
    height: 80vh;
    background-color: #31D1E7;
    border-radius: 5%;
    border: 1px solid black;
  }
  .form-titulo {
    height: 10vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .ubicacion-form {
    height: 70vh;
  }
  form {
    height: 70vh;
  }
  .form-info-imagen {
    height: 60vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .form-info-datos {
    height: 60vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .ubicacion-btn {
    height: 10vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* Estilo para texto */
  .titulo {
    font-size: 40px;
    font-family: 'Rubik Wet Paint', cursive;
    padding-bottom: 20px ;
    padding-top: 20px;
  }
  label {
    font-size: 20px;
    font-weight: bold;
  }
  .form-control {
    font-size: 20px;
    height: 40px;
    width: 450px;
  }
  /* Estilo para los botones */
  .boton {
    margin: 20px 0 20px 0;
    margin-bottom: 70px;
    font-weight: bold;
    font-size: 22px;
    border: 1px solid black;
  }
  .boton-volver {
    margin: 20px 0 20px 0;
    font-weight: bold;
    font-size: 22px;
    border: 1px solid black;
  }

  /* Estilo para el contenedor de la bandeja de carga */
  .file-upload-container {
    width: 400px;
    height: 400px;
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 10%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* Estilo para el botón de carga */
  .file-upload-button {
    background-color: #007bff; 
    color: #fff; 
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    border: 1px solid black;
  }

  /* Estilo para ocultar el input real */
  .file-upload-input {
    display: none;
  }
  #selected-image {
    max-width: 100%;
    max-height: 200px; /* Altura máxima deseada para la imagen */
  }

</style>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <!-- Vacio -->
      </div>
      <div class="col-8 columna-medio">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-2">
                <button class="btn btn-primary boton-volver" onclick="redirectToURL()">VOLVER</button>
              </div>
              <div class="col-8 form-titulo">            
                <h2 class="titulo">NUEVO PRODUCTO</h2>
              </div>
              <div class="col-2"><!-- Vacio --></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 ubicacion-form">
            <form action="../php/agregar.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-6 form-info-imagen">
                  <div class="form-group">
                    <div class="file-upload-container">
                      <label for="imagen" class="file-upload-button" id="select-button">Seleccionar Imagen</label>
                      <input type="file" id="imagen" name="imagen" accept="image/png" class="file-upload-input" onchange="validarImagen()" required>
                      <img id="selected-image" src="#" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-6 form-info-datos">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" minlength="3" maxlength="25" required>
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" name="descripcion" minlength="10" maxlength="300" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="precio_unitario">Precio Unitario:</label>
                    <input type="number" class="form-control" name="precio_unitario" step="0.01" min="0" required>
                  </div>
                  <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control" name="stock" min="0" step="1" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 ubicacion-btn form-group">
                  <button type="submit" class="btn btn-primary boton" name="guardar-producto">GUARDAR</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-2 columna-vacia">
        <!-- Vacio -->
      </div>
    </div>
  </div>
  <script>

    function validarImagen() {
      const imagenInput = document.getElementById('imagen');
      const imagen = imagenInput.files[0]; // Obtén la imagen seleccionada
      const selectedImage = document.getElementById('selected-image');
      const selectButton = document.getElementById('select-button');

      if (imagen) {
        const imagenObj = new Image();
        imagenObj.src = URL.createObjectURL(imagen);

        imagenObj.onload = function () {
          const ancho = imagenObj.width;
          const alto = imagenObj.height;

          // Define las dimensiones máximas y mínimas permitidas
          const anchoMaximo = 750;
          const altoMaximo = 750;
          const anchoMinimo = 300;
          const altoMinimo = 300;

          if (ancho > anchoMaximo || alto > altoMaximo || ancho < anchoMinimo || alto < altoMinimo) {
            alert(`La imagen seleccionada no cumple con los requisitos.`);
            // Limpia el campo de entrada de archivo
            imagenInput.value = '';
            // Limpia la vista previa
            selectedImage.src = '';
            // Muestra el botón de selección
            selectButton.style.display = 'block';
          } else {
            // La imagen cumple con los requisitos, muestra la vista previa y oculta el botón de selección
            selectedImage.src = URL.createObjectURL(imagen);
            selectButton.style.display = 'none';
          }
        };
      }
    }

    // Funcionamiento del boton de volver
    function redirectToURL() {
      window.location.href = "../index.php"; 
    }

  </script>
</body>
</html>