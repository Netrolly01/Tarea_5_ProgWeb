<?php
require_once("../libreria/motor.php");
plantilla::aplicar();

$n1 = 4;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio) {
    echo '<h1 class="title">Ejercicio no encontrado</h1>
          <p class="subtitle">El ejercicio que busca no existe</p>
          <a href="./">Volver al inicio</a>';
    exit();
}

$ejercicio = (object) $ejercicio;

// Coordenadas de Santo Domingo, República Dominicana
$latitud = 18.48;
$longitud = -69.94;

// Obtener el clima con Open-Meteo usando las coordenadas
$weather_url = "https://api.open-meteo.com/v1/forecast?latitude={$latitud}&longitude={$longitud}&current_weather=true";
$weather_respuesta = file_get_contents($weather_url);
$weather_respuesta = json_decode($weather_respuesta, true);

// Verificar si se encontró información del clima
if (!$weather_respuesta || !isset($weather_respuesta['current_weather'])) {
    echo "<div class='container'><h1>Error</h1><p>No se pudo obtener el clima.</p></div>";
    exit();
}

// Obtener los datos del clima
$temperatura = round($weather_respuesta['current_weather']['temperature']); // Temperatura en °C
$viento = round($weather_respuesta['current_weather']['windspeed']); // Velocidad del viento en km/h
$direccion_viento = $weather_respuesta['current_weather']['winddirection']; // Dirección del viento en grados
$zona_horaria = $weather_respuesta['timezone']; // Zona horaria

?>

<h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
<p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

<div class="container">
    <h1 class="title">🌦️ Clima en Santo Domingo</h1>
    <div class="clima-resultados">
        <h3>🌡️ Temperatura: <span class="resaltado"><?php echo $temperatura; ?>°C</span></h3>
        <h3>💨 Viento: <span class="resaltado"><?php echo $viento; ?> km/h</span></h3>
        <h3>🧭 Dirección del viento: <span class="resaltado"><?php echo $direccion_viento; ?>°</span></h3>
        <h3>🌍 Zona Horaria: <span class="resaltado"><?php echo $zona_horaria; ?></span></h3>
    </div>
</div>

<script>
    window.onload = function () {
        let page = document.querySelector('html');
        page.style.background = "url('https://images.visitarepublicadominicana.org/clima-en-republica-dominicana.jpg')";
        page.style.backgroundSize = "cover";
        page.style.backgroundAttachment = "fixed";

        let body = document.querySelector('body');
        body.style.background = "linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85))";
        body.style.borderRadius = "10px";
        body.style.margin = "90px auto";
        body.style.width = "80%";
        body.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";

        // let container = document.querySelector('.container');
        // container.style.background = "rgba(255, 255, 255, 0.95)";
        // container.style.padding = "20px";
        // container.style.borderRadius = "10px";
        // container.style.boxShadow = "0px 4px 10px rgba(0, 0, 0, 0.2)";
        // container.style.textAlign = "center";
        // container.style.width = "50%";
        // container.style.margin = "40px auto";

        let title = document.querySelector('.title');
        title.style.color = "#007bff";
        title.style.fontSize = "28px";
        title.style.fontWeight = "bold";
        title.style.marginBottom = "10px";

        let resaltados = document.querySelectorAll('.resaltado');
        resaltados.forEach(function (res) {
            res.style.color = "#ff6b6b";
            res.style.fontWeight = "bold";
            res.style.fontSize = "20px";
        });
    };
</script>
