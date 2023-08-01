<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto Existente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos-abm.css">
</head>
<body>
    
    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-2 columna-vacia-agg"></div>

            <div class="col-sm-8 columna-izquierda">
                <h4>Seleccione el producto que desea eliminar</h4>
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
                        <a class='BotonesTeam3' href=\"../php/eliminar.php?id=$mostrar[id]\" onClick=\"return confirm('¿Estás seguro de eliminar el producto $mostrar[nombre]?')\">&#10006;</a>
                        </td>"; 

                    }

                    ?>

                </table>

            </div>
            
            <div class="col-sm-2 columna-vacia-agg"></div>
            
        </div>

    </div>
    
    <script src="../funcionalidad.js"></script>

</body>
</html>