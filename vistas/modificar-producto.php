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
                    
                    include '../php/conexion.php';
                    include '../php/mostrarDatos.php';

                    while($mostrar=mysqli_fetch_array($datos)){
                    
                        echo "<tr>";
                        echo "<td>".$mostrar['id']."</td>";
                        echo "<td>".$mostrar['nombre']."</td>";
                        echo "<td>".$mostrar['descripcion']."</td>";
                        echo "<td>".$mostrar['precio_unitario']."</td>";
                        echo "<td>".$mostrar['stock']."</td>";
                        echo "<td style='width:24%'>
                        <a class='BotonesTeam3' href=\"../php/modificar.php?id=$mostrar[id]\" onClick=\"return confirm('¿Estás seguro de modificar el producto $mostrar[nombre]?')\">&#9997;</a>
                        </td>"; 

                    }

                    ?>

                </table>

            </div>
            <div class="col-sm-6 columna-derecha">
                <form action="../php/modificar.php" method="post">
    
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" readonly value="<?php echo $nombre; ?>" required>
                    </div>
            
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" readonly value="<?php echo $descripcion; ?>" required></textarea>
                    </div>
            
                    <div class="form-group">
                        <label for="precio_unitario">Precio Unitario:</label>
                        <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" step="0.01" readonly value="<?php echo $precio_unitario; ?>" required>
                    </div>
            
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" min="0" readonly value="<?php echo $stock; ?>" required>
                    </div>
    
                    <div class="form-group ubicacion-btn p-3">
                    <button type="submit" class="btn btn-primary boton" name="guardar-producto">Modificar</button>
                </div>
                  
                </form>
            </div>
            
        </div>

    </div>

</body>
</html>