<?php

if (!$_POST || !isset($_POST['pokemon'])) {
    echo "<div class='container'><h1>Error</h1><p>No se ha enviado el nombre del Pokémon.</p></div>";
    exit();
}

$pokemon = strtolower($_POST['pokemon']);
$url = "https://pokeapi.co/api/v2/pokemon/{$pokemon}";

// Obtener la respuesta de la API
$respuesta = file_get_contents($url);
$respuesta = json_decode($respuesta, true);

// Verificar si se encontró información del Pokémon
if (!$respuesta || !isset($respuesta['name'])) {
    echo "<div class='container'><h1>Error</h1><p>No se pudo obtener la información del Pokémon.</p></div>";
    exit();
}

// Obtener los datos necesarios
$nombre = ucfirst($respuesta['name']); // Nombre del Pokémon
$imagen = $respuesta['sprites']['front_default']; // Imagen del Pokémon
$exp = $respuesta['base_experience']; // Experiencia base
$habilidades = implode(', ', array_map(function($h) { return ucfirst($h['ability']['name']); }, $respuesta['abilities'])); // Habilidades

// Mostrar resultados
echo "<div class='container'>";
echo "<h1 class='title'>Información de {$nombre}</h1>";
echo "<div class='pokemon-info'>";
echo "<img src='{$imagen}' alt='{$nombre}' class='pokemon-img' />";
echo "<h3>⚡ Experiencia base: <span class='resaltado'>{$exp}</span></h3>";
echo "<h3>💡 Habilidades: <span class='resaltado'>{$habilidades}</span></h3>";
echo "</div>";
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
