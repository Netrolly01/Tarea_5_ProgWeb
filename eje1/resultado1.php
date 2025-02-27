<?php

if (!$_POST || !isset($_POST['nombre'])) {
    echo "<div class='container'><h1>Error</h1><p>No se ha enviado el nombre.</p></div>";
    exit();
}

$nombre = $_POST['nombre'];

$url = "https://api.genderize.io/?name={$nombre}";

$respuesta = file_get_contents($url);
$respuesta = json_decode($respuesta);

if (!isset($respuesta->gender)) {
    echo "<div class='container'><h1>Error</h1><p>No se pudo determinar el género.</p></div>";
    exit();
}

$respuesta->gender = ($respuesta->gender == 'male') ? 'Masculino' : 'Femenino';
$probabilidad = round($respuesta->probability * 100, 2);
$nombre = strtoupper($nombre);

echo "<h1 class='title'>Resultado</h1>";
echo "<h3>Nombre: <span class='resaltado'>$nombre</span></h3>";
echo "<h3>Género más probable: <span class='resaltado'>{$respuesta->gender}</span></h3>";
echo "<h3>Probabilidad: <span class='resaltado'>{$probabilidad}%</span></h3>";

?>

<script>
window.onload = function () {
    // Aplicar estilos al body para centrar el contenido
    let body = document.querySelector('body');
    body.style.display = "flex";
    body.style.flexDirection = "column";
    body.style.alignItems = "center";
    body.style.justifyContent = "center";
    body.style.minHeight = "100vh";
    body.style.background = "linear-gradient(to right, #f8f9fa, #e9ecef)";
    body.style.margin = "0";

    // Estilos para el contenedor del resultado
    let container = document.querySelector('.container');
    container.style.background = "#ffffff";
    container.style.padding = "25px";
    container.style.borderRadius = "10px";
    container.style.boxShadow = "0px 4px 10px rgba(0, 0, 0, 0.2)";
    container.style.textAlign = "center";
    container.style.width = "50%";
    container.style.marginTop = "40px";

    // Estilos para el título principal
    let title = document.querySelector('.title');
    title.style.color = "#007bff";
    title.style.fontSize = "28px";
    title.style.fontWeight = "bold";
    title.style.marginBottom = "10px";

    // Estilos para los resultados resaltados (nombre, género y probabilidad)
    let resaltados = document.querySelectorAll('.resaltado');
    resaltados.forEach(el => {
        el.style.fontWeight = "bold";
        el.style.color = "#ff5733"; // Color naranja para resaltar
        el.style.fontSize = "18px";
    });

    // Agregar margen inferior para evitar que quede pegado al borde inferior de la pantalla
    let resultadoContainer = document.querySelector('.container');
    resultadoContainer.style.marginBottom = "20px";
};

</script>
