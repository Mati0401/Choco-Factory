<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Estadísticas</title>
  <!-- Tipos de letra -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <!-- Incluye la librería Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
  /* Grilla */
  .contenedor-titulo {
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #7FE8D7;
  }
  .contenedor-titulo-grafico {
    height: 10vh;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    background-color: #f5f5dc; /* Beige */
  }
  .contenedor-grafico {
    height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f5f5dc;
  }
  .contenedor-descripcion {
    height: 20vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background-color: #7FE8D7;
  }
  /* Estilo para los textos */
  .texto-titulo {
    font-size: 40px;
    font-family: 'Rubik Wet Paint', cursive;
  }
  .titulo-grafico {
    font-size: 30px;
    font-family: 'Kanit', sans-serif;
  }
  /* Estilo para que las referencias se muestren uno debajo del otro */
  #referencias div {
    display: block;
  }
  #graficoBarras {
    max-width: 100%; 
    max-height: 100%; 
    border: 1px solid #ccc; /* Agrega un borde opcional al canvas */
  }
  .descripcion-barra {
    font-size: 20px;
    font-weight: bold;
  }

  /* PRUEBA */
  .etiqueta-eje-x {
    text-align: center;
    font-weight: bold;
    margin-top: 10px;
  }
  .etiqueta-eje-y {
    text-align: center;
    transform: rotate(-90deg);
    font-weight: bold;
    margin-top: 20px;
    margin-left: 20px; /* Ajusta este valor según necesites */
  }

</style>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 contenedor-titulo">
        <h1 class="texto-titulo">Estadísticas</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-6 contenedor-titulo-grafico">
        <h2 class="titulo-grafico">GANANCIAS DIARIAS</h2>
      </div>
      <div class="col-6 contenedor-titulo-grafico">
        <h2 class="titulo-grafico">PRODUCTOS MÁS POPULARES</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-6 contenedor-grafico">
        <!--<div class="etiqueta-eje-y">Ganancias</div>-->
        <canvas id="graficoBarras" width="600" height="300"></canvas>
        <!--<div class="etiqueta-eje-x"><br>Días</div>-->
      </div>
      <div class="col-6 contenedor-grafico">
        <canvas id="graficoTorta" width="300" height="300"></canvas>
      </div>
    </div>
    <div class="row">
      <div class="col-6 contenedor-descripcion">
        <h3 class="descripcion-barra">El eje Y representa las Ganancias</h3>
        <h3 class="descripcion-barra">El eje X representa los días del mes de Septiembre</h3>
      </div>
      <div class="col-6 contenedor-descripcion">
        <div id="descripcionGrafico">
          <div id="referencias"></div>
        </div>
      </div>
    </div>
  </div>
  <script>

    document.addEventListener("DOMContentLoaded", function () {
    
      function crearGraficoTorta() {
        // Obtén el elemento canvas y su contexto
        var canvas = document.getElementById("graficoTorta");
        var ctx = canvas.getContext("2d");

        // Definir los colores antes de su uso
        var colores = ["red", "blue", "yellow"];
    
        // Realizar una solicitud Ajax para obtener los productos más vendidos
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/productoMasVendido.php", true);
    
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Parsear los datos JSON obtenidos
            var topProductos = JSON.parse(xhr.responseText);

            // Coordenadas del centro del gráfico
            var centerX = canvas.width / 2;
            var centerY = canvas.height / 2;

            // Radio del gráfico de torta
            var radius = Math.min(centerX, centerY) - 10;

            // Ángulo inicial para dibujar los segmentos
            var startAngle = 0;

            // Calcular porcentajes (esto es solo un ejemplo)
            var totalCantidad = topProductos.reduce(function (total, producto) {
              return total + producto.cantidad_vendida;
            }, 0);

            var descripcion = document.getElementById("descripcionGrafico");
            var referencias = document.getElementById("referencias");

            for (var i = 0; i < topProductos.length; i++) {
              var producto = topProductos[i];
              var porcentaje = (producto.cantidad_vendida / totalCantidad) * 100;
              var sliceAngle = (2 * Math.PI * porcentaje) / 100;

              ctx.fillStyle = colores[i]; // Debes definir los colores apropiados
              ctx.beginPath();
              ctx.moveTo(centerX, centerY);
              ctx.arc(centerX, centerY, radius, startAngle, startAngle + sliceAngle);
              ctx.closePath();
              ctx.fill();

              // Agregar referencia debajo del gráfico
              referencias.innerHTML +=
              '<div style="margin-bottom: 10px; font-size: 20px;">' +
              '<span style="display: inline-block; width: 10px; height: 10px; background-color: ' + colores[i] + '; border-radius: 50%; margin-right: 5px;"></span>' +
              '<strong>' + producto.nombre + ': ' + producto.cantidad_vendida + '</strong> ' +
              '</div>';

              // Actualizar el ángulo de inicio para el próximo segmento
              startAngle += sliceAngle;
            }
          }
        };
  
        xhr.send();
      }

      function dibujarGraficoBarras() {
        // Obtén el elemento canvas y su contexto
        var canvas = document.getElementById("graficoBarras");
        var ctx = canvas.getContext("2d");

        // Definir los colores antes de su uso
        var colores = ["red", "blue", "yellow"];

        // Realizar una solicitud Ajax para obtener las ganancias diarias
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../php/gananciaDiaria.php", true);

        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Parsear los datos JSON obtenidos
            var gananciasDiarias = JSON.parse(xhr.responseText);

            // Configuración de la barra
            var barWidth = 30; // Ancho de cada barra
            var barSpacing = 20; // Espacio entre las barras
            var barHeight = canvas.height - 50; // Altura máxima de las barras

            // Calcular el valor máximo en el conjunto de datos
            var maxGanancia = Math.max.apply(Math, gananciasDiarias.map(function(o) { return o.ganancias_diarias; }));

            // Dibujar la escala en el eje y
            var scaleYStep = maxGanancia / 5; // Divide la escala en 5 pasos
            for (var i = 0; i <= 5; i++) {
              var scaleValue = i * scaleYStep;
              var scaleY = canvas.height - (scaleValue / maxGanancia * barHeight);
              ctx.fillText(scaleValue.toFixed(2), 10, scaleY);
              ctx.beginPath();
              ctx.moveTo(40, scaleY);
              ctx.lineTo(canvas.width, scaleY);
              ctx.strokeStyle = "#ccc";
              ctx.stroke();
            }

            // Dibujar las barras
            for (var i = 0; i < gananciasDiarias.length; i++) {
              var gananciaDiaria = gananciasDiarias[i];
              var x = (barWidth + barSpacing) * (i + 1); // Mover una unidad en el eje x
              var y = canvas.height - (gananciaDiaria.ganancias_diarias / maxGanancia * barHeight);

              ctx.fillStyle = colores[i % colores.length]; // Alternar colores
              ctx.fillRect(x, y, barWidth, canvas.height - y);

              // Etiquetas (solo el día)
              ctx.fillStyle = "black";
              var fecha = new Date(gananciaDiaria.fecha);
              fecha.setDate(fecha.getDate() + 1); // Sumar 1 día para corregir la zona horaria
              var etiquetaFecha = fecha.getDate().toString(); // Obtener solo el día
              ctx.fillText(etiquetaFecha, x + barWidth / 2 - 5, canvas.height - 10);
            }
            
          }
        };

        xhr.send();
      }

      crearGraficoTorta();
      dibujarGraficoBarras();

    });

  </script>
</body>
</html>