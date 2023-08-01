<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar nuevo producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos-abm.css">
</head>
<body>
    
    <div class="container-fluid">
        
        <div class="row">

          <div class="col-sm-4 columna-vacia-agg"><!-- Vacio --></div>

          <div class="col-sm-4 columna-medio">
  
            <form action="../php/agregar.php" method="post">

                <h2 class="p-3">Producto Nuevo</h2>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
        
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" name="descripcion" required></textarea>
                </div>
        
                <div class="form-group">
                    <label for="precio_unitario">Precio Unitario:</label>
                    <input type="number" class="form-control" name="precio_unitario" step="0.01" required>
                </div>
        
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control" name="stock" min="0" required>
                </div>

                <div class="form-group ubicacion-btn p-3">
                    <button type="submit" class="btn btn-primary boton" name="guardar-producto">Guardar Producto</button>
                </div>
              
            </form>

          </div>

          <div class="col-sm-4 columna-vacia-agg"><!-- Vacio --></div>

        </div>

      </div>

      <script src="../funcionalidad.js"></script>

</body>
</html>