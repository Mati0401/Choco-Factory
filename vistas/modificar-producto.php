<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto Existente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos-abm.css">
    
</head>
<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-6 columna-izquierda">
                <h4>Seleccione el producto que desea modificar</h4>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio Unitario</th>
                        <th>Stock</th>
                    </tr>

                    <?php
                    $sql="SELECT * FROM producto";
                    $result=mysqli_query($conexion,$sql);

                    while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    
                    <tr>
                        <th><?php echo $mostrar['id'] ?></th>
                        <th><?php echo $mostrar['nombre'] ?></th>
                        <th><?php echo $mostrar['descripcion'] ?></th>
                        <th><?php echo $mostrar['precio_unitario'] ?></th>
                        <th><?php echo $mostrar['stock'] ?></th>
                    </tr>

                    <?php
                    }
                    ?>

                </table>

            </div>
            <div class="col-sm-6 columna-derecha">
                <form>
    
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
            
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>
            
                    <div class="form-group">
                        <label for="precio_unitario">Precio Unitario:</label>
                        <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" step="0.01" required>
                    </div>
            
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" min="0" required>
                    </div>
    
                    <div class="ubicacion-btn">
                        <button type="submit" class="btn btn-primary mt-3 boton">Modificar</button>
                    </div>
                  
                </form>
            </div>
            
        </div>

    </div>

</body>
</html>