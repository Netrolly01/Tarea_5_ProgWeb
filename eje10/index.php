<?php
require_once("../libreria/motor.php");
plantilla::aplicar();

$n1 = 10;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio) {
    echo '<h1 class="title">Ejercicio no encontrado</h1>
          <p class="subtitle">El ejercicio que busca no existe</p>
          <a href="./">Volver al inicio</a>';
    exit();
}

$ejercicio = (object) $ejercicio;

// URL para obtener un chiste aleatorio
$url = "https://official-joke-api.appspot.com/random_joke";

// Obtener la respuesta de la API
$respuesta = file_get_contents($url);
$respuesta = json_decode($respuesta, true);

// Verificar si se obtuvo un chiste
if (!$respuesta || !isset($respuesta['setup'])) {
    echo "<div class='container'><h1>Error</h1><p>No se pudo obtener un chiste.</p></div>";
    exit();
}

// Obtener el chiste en inglés
$setup = $respuesta['setup'];  // Pregunta del chiste
$punchline = $respuesta['punchline'];  // Respuesta del chiste
?>

<h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
<p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

<div class='container'>
    <div class='chiste'>
        <h3>🔍 Pregunta: <span class='resaltado' id="setup"><?php echo $setup; ?></span></h3>
        <h3>😂 Respuesta: <span class='resaltado' id="punchline"><?php echo $punchline; ?></span></h3>
        <h3>🌎 Traducción:</h3>
        <h3>🔍 Pregunta: <span class='resaltado' id="translated-setup">Traduciendo...</span></h3>
        <h3>😂 Respuesta: <span class='resaltado' id="translated-punchline">Traduciendo...</span></h3>
    </div>
</div>

<script>
window.onload = function () {
    let setup = document.getElementById("setup").innerText;
    let punchline = document.getElementById("punchline").innerText;

    function translateText(text, targetElement) {
        let url = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=es&dt=t&q=${encodeURIComponent(text)}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data && data[0] && data[0][0]) {
                    document.getElementById(targetElement).innerText = data[0][0][0];
                } else {
                    document.getElementById(targetElement).innerText = "⚠️ Error al traducir.";
                }
            })
            .catch(error => {
                document.getElementById(targetElement).innerText = "⚠️ Error al traducir.";
            });
    }

    translateText(setup, "translated-setup");
    translateText(punchline, "translated-punchline");

    // Aplicar estilos sin afectar la funcionalidad
    document.documentElement.style.background = "url('https://s3.amazonaws.com/arc-wordpress-client-uploads/infobae-wp/wp-content/uploads/2017/09/27205257/sonrisas.jpg')";
    document.documentElement.style.backgroundSize = "cover";
    document.documentElement.style.backgroundAttachment = "fixed";

    let body = document.body;
    body.style.background = "linear-gradient(rgba(82, 80, 80, 0.85), rgba(76, 75, 75, 0.85))";
    body.style.borderRadius = "10px";
    body.style.margin = "90px auto";
    body.style.width = "80%";
    body.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";
    body.style.padding = "20px";

    let resaltados = document.querySelectorAll('.resaltado');
    resaltados.forEach(res => {
        res.style.color = "#ff6b6b";
        res.style.fontWeight = "bold";
        res.style.fontSize = "20px";
    });
};
</script>
