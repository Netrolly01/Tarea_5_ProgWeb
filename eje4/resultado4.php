<?php

if (!$_POST || !isset($_POST['ciudad'])) {
    echo "<div class='container'><h1>Error</h1><p>No se ha enviado el nombre de la ciudad.</p></div>";
    exit();
}

$ciudad = urlencode($_POST['ciudad']); // Codificar la ciudad para URL
$pais = "Dominican Republic"; // Ajusta el país si es necesario
$pais = urlencode($pais);

// Obtener las coordenadas de la ciudad con Nominatim
$nominatim_url = "https://nominatim.openstreetmap.org/search?city={$ciudad}&country={$pais}&format=json";
$nominatim_respuesta = file_get_contents($nominatim_url);
$nominatim_respuesta = json_decode($nominatim_respuesta, true);

// Verificar si se encontraron resultados en Nominatim
if (!$nominatim_respuesta || count($nominatim_respuesta) === 0) {
    echo "<div class='container'><h1>Error</h1><p>No se pudo obtener la ubicación de la ciudad.</p></div>";
    exit();
}

// Extraer latitud y longitud
$latitud = $nominatim_respuesta[0]['lat'];
$longitud = $nominatim_respuesta[0]['lon'];

// Obtener el clima con Open-Meteo usando las coordenadas
$weather_url = "https://api.open-meteo.com/v1/forecast?latitude={$latitud}&longitude={$longitud}&current_weather=true";
$weather_respuesta = file_get_contents($weather_url);
$weather_respuesta = json_decode($weather_respuesta, true);

// Verificar si se encontró información del clima
if (!$weather_respuesta || !isset($weather_respuesta['current_weather'])) {
    echo "<div class='container'><h1>Error</h1><p>No se pudo obtener el clima de la ciudad.</p></div>";
    exit();
}

// Obtener los datos del clima
$temperatura = round($weather_respuesta['current_weather']['temperature']); // Temperatura en °C
$viento = round($weather_respuesta['current_weather']['windspeed']); // Velocidad del viento en km/h
$direccion_viento = $weather_respuesta['current_weather']['winddirection']; // Dirección del viento en grados
$zona_horaria = $weather_respuesta['timezone']; // Zona horaria

// Mostrar resultados
echo "<div class='container'>";
echo "<h1 class='title'>Clima en {$_POST['ciudad']}</h1>";
echo "<div class='clima-resultados'>";
echo "<h3>🌡️ Temperatura: <span class='resaltado'>{$temperatura}°C</span></h3>";
echo "<h3>💨 Viento: <span class='resaltado'>{$viento} km/h</span></h3>";
echo "<h3>🧭 Dirección del viento: <span class='resaltado'>{$direccion_viento}°</span></h3>";
echo "<h3>🌍 Zona Horaria: <span class='resaltado'>{$zona_horaria}</span></h3>";
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
