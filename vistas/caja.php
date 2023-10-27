<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pedidos</title>
  <!-- Favicon -->
  <link rel="icon" href="../img/caja-registradora.png" type="image/png">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Tipos de letra -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<style>
  /* Tamaño de la ventana */
  .contenedor {
    height: 100vh;
    background-color: #ECFEF6;
  }
  /* Tamaño de las filas */
  .fila-superior {
    height: 30vh;
  }
  .fila-central {
    height: 45vh;
  }
  .fila-inferior {
    height: 25vh;
  }
  /* Formato de los rectangulos */
  .rectangulo {
    height: 15vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .codigo {
    height: 13vh;
    width: 87%;
    background-color: beige;
    color: black;
  }
  /* Formato logo */
  .contenedor-logo {
    display: flex;
    align-items: self-start;
    justify-content: start;
  }
  .texto-titulo {
    font-size: 40px;
    font-family: 'Rubik Wet Paint', cursive;
  }
  /* Formato buscador */
  .contenedor-buscador {
    height: 15vh;
    display: flex;
    align-items: end;
    justify-content: center;
  }
  .buscador {
    margin-bottom: 20px;
    border: 1px solid black;
  }
  .lupita {
    margin-bottom: 20px;
    font-size: 30px;
    margin-left: 10px;
  }
  /* Formato boton estadisticas */
  .contenedor-estadisticas {
    height: 15vh;
    display: flex;
    align-items: center;
    justify-content: end;
  }
  .icono-estadisticas {
    font-size: 40px;
    color: black;
  }
  #botonesContainer {
    display: flex;
    flex-wrap: wrap;
    justify-content: start;
  }
  .miBoton {
    width: calc(25% - 10px); /* 25% para que entren 4 botones en el ancho, -10px para el espacio entre botones */
    margin: 5px; /* Espacio entre botones */
    padding: 10px;
    font-size: 16px;
    text-decoration: none;
    color: black;
    border: 1px solid black;
    text-align: center;
    background-color: #B1FEEC;
    font-weight: bold;
  }
  .miBoton:hover{
    background-color: #F8EE70;
  }
</style>
<body>
  <div class="container-fluid contenedor">
    <div class="row">
      <div class="col-4 fila-superior contenedor-logo">
        <span class="texto-titulo">CHOCO FACTORY</span>
      </div>
      <div class="col-8 fila-superior">  
        <div class="row">
          <div class="col-12 contenedor-estadisticas">
            <a href="estadisticas.php"><i class="bi bi-bar-chart-fill icono-estadisticas"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-12 contenedor-buscador">
            <input type="text" class="form-control buscador" placeholder="Ingresa tu codigo"><i class="bi bi-search lupita"></i>
          </div>
        </div>     
      </div>
    </div>
    <div class="row" id="botonesContainer">
      <?php include '../php/buscarPedidos.php'; ?>
    </div>
    <div class="row">
      <div class="col-12 fila-inferior">
        <!-- Vacio -->
      </div>
    </div>
  </div>
  <script>
    var botones = document.querySelectorAll('.miBoton');
    botones.forEach(function(boton) {
      boton.addEventListener('click', function() {
        var codigo = boton.textContent;
        alert("¿ Quieres realizar la venta correspondiente al pedido " + codigo + " ?");
      });
    });
  </script>
</body>
</html>