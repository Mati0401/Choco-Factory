// Carga de la imagen y Ocultamiento
document.getElementById('image-upload').addEventListener('change', function (e) {
    var imagePreview = document.getElementById('image-preview');
    imagePreview.style.display = 'block'; // Muestra la vista previa de la imagen

    var h1Element = document.querySelector('.frame-box p');
    h1Element.style.display = 'none'; // Oculta el título

    var inputElement = document.getElementById('image-upload');
    inputElement.style.display = 'none'; // Oculta el input

    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function (event) {
        imagePreview.src = event.target.result;
    };

    reader.readAsDataURL(file);
});

// Boton Producto
function mostrarOpciones() {
    var opcionesDiv = document.getElementById("opciones");
    if (opcionesDiv.style.display === "none") {
      opcionesDiv.style.display = "block";
    } else {
      opcionesDiv.style.display = "none";
    }
}

// Redireccionar a las opciones de Producto
function redireccionar(url) {
    window.location.href = url;
}

// Efecto para las opciones de Producto
function cambiarColor(elemento) {
    elemento.style.backgroundColor = "rgba(255, 165, 0, 0.5)"; // Cambiar a cualquier color deseado
}

function restaurarColor(elemento) {
    elemento.style.backgroundColor = ""; // Restaurar el color original
}

// Elimina la fila al apretar el boton Eliminar
function eliminarFila(boton) {
    // Obtener la fila a la que pertenece el botón
    var fila = boton.parentNode.parentNode;

    // Obtener la tabla a la que pertenece la fila
    var tabla = fila.parentNode;

    // Eliminar la fila de la tabla
    tabla.removeChild(fila);
}


