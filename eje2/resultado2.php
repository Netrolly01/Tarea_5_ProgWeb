<?php

if (!$_POST || !isset($_POST['nombre'])) {
    echo "<div class='container'><h1>Error</h1><p>No se ha enviado el nombre.</p></div>";
    exit();
}

$nombre = $_POST['nombre'];

$url = "https://api.agify.io/?name={$nombre}";

$respuesta = file_get_contents($url);
$respuesta = json_decode($respuesta);

// Si no se encuentra edad, mostrar error
if (!isset($respuesta->age) || $respuesta->age === null) {
    echo "<div class='container'><h1>Error</h1><p>No se pudo determinar la edad.</p></div>";
    exit();
}

// Convertir nombre a mayúsculas
$nombre = strtoupper($nombre);

// Clasificar edad con mensaje y emoji
$edad = $respuesta->age;
$mensaje = "";
$imagen = "";

if ($edad < 18) {
    $mensaje = "Eres joven 👶";
    $imagen = "/imagen/joven.jpg"; // Asegúrate de tener esta imagen
} elseif ($edad <= 59) {
    $mensaje = "Eres un adulto 🧑";
    $imagen = "/imagen/adulto.jpg"; // Asegúrate de tener esta imagen
} else {
    $mensaje = "Eres un anciano 👴";
    $imagen = "/imagen/anciano.jpg"; // Asegúrate de tener esta imagen
}

// Mostrar resultados
echo "<div class='container'>";
echo "<h1 class='title'>Resultado</h1>";
echo "<h3>Nombre: <span class='resaltado'>$nombre</span></h3>";
echo "<h3>Edad estimada: <span class='resaltado'>$edad años</span></h3>";
echo "<h3>$mensaje</h3>";
echo "<img src='$imagen' alt='$mensaje' class='imagen-edad'>";
echo "</div>";
?>

<script>
window.onload = function () {
    // Estilo para el contenedor principal
    let container = document.querySelector('.container');
    container.style.background = "rgba(255, 255, 255, 0.95)";
    container.style.padding = "20px";
    container.style.borderRadius = "10px";
    container.style.boxShadow = "0px 4px 10px rgba(0, 0, 0, 0.2)";
    container.style.textAlign = "center";
    container.style.width = "50%";
    container.style.margin = "40px auto";

    // Estilo para el título
    let title = document.querySelector('.title');
    title.style.color = "#007bff";
    title.style.fontSize = "28px";
    title.style.fontWeight = "bold";
    title.style.marginBottom = "10px";

    // Estilo para los textos resaltados
    let resaltados = document.querySelectorAll('.resaltado');
    resaltados.forEach(function (res) {
        res.style.color = "#ff6b6b";
        res.style.fontWeight = "bold";
        res.style.fontSize = "20px";
    });

    // Estilo para la imagen de la edad
    let imagen = document.querySelector('.imagen-edad');
    imagen.style.width = "200px";
    imagen.style.height = "auto";
    imagen.style.borderRadius = "10px";
    imagen.style.marginTop = "20px";
    imagen.style.boxShadow = "0px 4px 10px rgba(0, 0, 0, 0.2)";

    // Agregar una animación a la imagen
    imagen.style.transition = "transform 0.3s ease-in-out";
    imagen.onmouseover = function () {
        imagen.style.transform = "scale(1.1)";
    };
    imagen.onmouseout = function () {
        imagen.style.transform = "scale(1)";
    };
};
</script>
