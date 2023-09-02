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
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #31D1E7;
    border-radius: 5%;
    border: 1px solid black;
  }
  /* Estilo para texto */
  .titulo {
    font-size: 40px;
    font-family: 'Rubik Wet Paint', cursive;
    padding-bottom: 20px ;
  }
  label {
    font-size: 15px;
    font-weight: bold;
  }
  /* Estilo para los botones */
  .ubicacion-btn {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .boton {
    margin: 20px 0 20px 0;
    font-weight: bold;
    font-size: 20px;
    border: 1px solid black;
  }
</style>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-4 columna-vacia">
        <!-- Vacio -->
      </div>
      <div class="col-4 columna-medio">
        <form action="../php/agregar.php" method="post">
          <h2 class="titulo">NUEVO PRODUCTO</h2>
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
          <div class="form-group ubicacion-btn">
            <button type="submit" class="btn btn-primary boton" name="guardar-producto">GUARDAR</button>
          </div>
        </form>
      </div>
      <div class="col-4 columna-vacia">
        <!-- Vacio -->
      </div>
    </div>
  </div>
</body>
</html>