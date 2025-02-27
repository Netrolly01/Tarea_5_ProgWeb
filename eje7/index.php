<?php
require_once("../libreria/motor.php");
plantilla::aplicar();



$n1 = 7;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio){

    echo'<h1 class="title">Ejercicio no encoentrado</h1>

    <p class="subtitle">El ejercicio que busca no existe</p>

    <a href="./">Volver al inicia</a>';

    exit() ;
}

$ejercicio = (object) $ejercicio;

?>

<h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
<p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

<form action="/eje7/resultado7.php" method="post" target="resultado">
    <div class="field">
        <label class="label">Cantidad en USD</label>
        <div class="control">
            <input class="input" type="number" step="0.01" placeholder="Escribe la cantidad en USD" name="usd" required />
        </div>
    </div>

    <div class="control">
        <button class="button is-primary">Convertir</button>
    </div>
</form>

<iframe name="resultado" style="width: 100%; height: 380px;"></iframe>


<script>
    window.onload = function () {
        // Fondo de la página con imagen fija
        let page = document.querySelector('html');
        page.style.background = "url('https://d1gtq9mqg5x3oe.cloudfront.net/hermes/images/news/insights/2022/09-september/26-money/promo/money-promo-3840x2160.jpg')";
        page.style.backgroundSize = "cover";
        page.style.backgroundAttachment = "fixed";

        // Fondo con transparencia para el cuerpo
        let body = document.body;
        body.style.background = "linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85))";
        body.style.padding = "20px";
        body.style.borderRadius = "10px";
        body.style.margin = "90px auto";
        body.style.width = "80%";
        body.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";
        body.style.textAlign = "center";

        // Estilos para el formulario
        let form = document.querySelector("form");
        form.style.background = "rgba(255, 255, 255, 0.9)";
        form.style.padding = "20px";
        form.style.borderRadius = "10px";
        form.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";
        form.style.marginTop = "20px";
        form.style.maxWidth = "500px";
        form.style.marginLeft = "auto";
        form.style.marginRight = "auto";

        // Estilos para el título
        let title = document.querySelector(".title");
        title.style.color = "#007bff";
        title.style.fontSize = "28px";
        title.style.fontWeight = "bold";

        let subtitle = document.querySelector(".subtitle");
        subtitle.style.color = "#555";
        subtitle.style.fontSize = "18px";

        // Estilos para los inputs
        let inputs = document.querySelectorAll("input");
        inputs.forEach(input => {
            input.style.padding = "10px";
            input.style.width = "100%";
            input.style.borderRadius = "5px";
            input.style.border = "1px solid #ccc";
            input.style.boxSizing = "border-box";
            input.style.marginBottom = "10px";
        });

        // Estilos para el botón de enviar
        let button = document.querySelector(".button");
        button.style.background = "#007bff";
        button.style.color = "white";
        button.style.padding = "10px 20px";
        button.style.borderRadius = "5px";
        button.style.fontSize = "16px";
        button.style.cursor = "pointer";
        button.style.border = "none";
        button.style.transition = "0.3s";
        button.style.marginTop = "10px";

        button.onmouseover = function () {
            button.style.background = "#0056b3";
        };
        button.onmouseout = function () {
            button.style.background = "#007bff";
        };

        // Estilos para el iframe
        let iframe = document.querySelector("iframe[name='resultado']");
        iframe.style.display = "block";
        iframe.style.margin = "20px auto";
        iframe.style.width = "80%";
        iframe.style.maxWidth = "900px";
        iframe.style.height = "500px";
        iframe.style.border = "2px solid #007bff";
        iframe.style.borderRadius = "10px";
        iframe.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.1)";
        iframe.style.opacity = "0";
        iframe.style.transform = "translateY(10px)";
        iframe.style.transition = "opacity 0.5s ease, transform 0.5s ease";

        // Mostrar el iframe cuando se envíe el formulario
        document.querySelector("form").addEventListener("submit", function () {
            setTimeout(() => {
                iframe.style.opacity = "1";
                iframe.style.transform = "translateY(0)";
            }, 200);
        });
    };
</script>