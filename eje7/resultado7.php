<?php

if (!$_POST || !isset($_POST['usd'])) {
    echo "<div class='container'><h1>Error</h1><p>No se ha enviado la cantidad en USD.</p></div>";
    exit();
}

$usd = $_POST['usd'];

// Nueva URL correcta de la API
$url = "https://api.exchangerate-api.com/v4/latest/USD";

// Obtener la respuesta de la API
$respuesta = file_get_contents($url);
$respuesta = json_decode($respuesta, true);

// Verificar si la respuesta contiene las tasas de cambio
if (!$respuesta || !isset($respuesta['rates'])) {
    echo "<div class='container'><h1>Error</h1><p>No se pudo obtener la tasa de cambio.</p></div>";
    exit();
}

// Obtener las tasas de cambio para DOP y otras monedas
$tasa_dop = $respuesta['rates']['DOP'];  // USD a DOP
$tasa_eur = $respuesta['rates']['EUR'];  // USD a EUR
$tasa_gbp = $respuesta['rates']['GBP'];  // USD a GBP

// Realizar la conversión
$converted_dop = round($usd * $tasa_dop, 2);
$converted_eur = round($usd * $tasa_eur, 2);
$converted_gbp = round($usd * $tasa_gbp, 2);

// Mostrar los resultados
echo "<div class='container'>";
echo "<h1 class='title'>Conversión de Monedas</h1>";
echo "<div class='clima-resultados'>";
echo "<h3>💵 USD: <span class='resaltado'>{$usd} USD</span></h3>";
echo "<h3>💰 Pesos Dominicanos (DOP): <span class='resaltado'>{$converted_dop} DOP</span></h3>";
echo "<h3>💶 Euros (EUR): <span class='resaltado'>{$converted_eur} EUR</span></h3>";
echo "<h3>💷 Libras Esterlinas (GBP): <span class='resaltado'>{$converted_gbp} GBP</span></h3>";
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
