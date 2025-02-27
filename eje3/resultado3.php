<?php

if (!$_POST || !isset($_POST['nombre'])) {
    echo "<div class='container'><h1>Error</h1><p>No se ha enviado el nombre.</p></div>";
    exit();
}

$nombre = $_POST['nombre'];

// Codificar la URL correctamente
$url = "http://universities.hipolabs.com/search?country=" . urlencode($nombre);

// Obtener la respuesta de la API
$respuesta = file_get_contents($url);
$respuesta = json_decode($respuesta, true); // Convertir a array asociativo

// Verificar si se encontraron universidades
if (!$respuesta || count($respuesta) === 0) {
    echo "<div class='container'><h1>Error</h1><p>No se encontraron universidades en este país.</p></div>";
    exit();
}

// Convertir el nombre del país a mayúsculas
$nombre = strtoupper($nombre);

// Mostrar resultados
echo "<div class='container'>";
echo "<h1 class='title'>Universidades en $nombre</h1>";

foreach ($respuesta as $universidad) {
    $nombre_uni = $universidad['name'];
    $dominio = implode(", ", $universidad['domains']); // Puede haber múltiples dominios
    $webpage = implode(", ", $universidad['web_pages']); // Puede haber múltiples enlaces

    echo "<div class='universidad'>";
    echo "<h3>📚 Nombre: <span class='resaltado'>$nombre_uni</span></h3>";
    echo "<h3>🌐 Dominio: <span class='resaltado'>$dominio</span></h3>";
    echo "<h3>🔗 Web: <a href='$webpage' target='_blank'>$webpage</a></h3>";
    echo "<hr>";
    echo "</div>";
}

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
