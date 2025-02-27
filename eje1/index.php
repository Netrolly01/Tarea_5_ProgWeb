<?php
require_once("../libreria/motor.php");
plantilla::aplicar();



$n1 = 1;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio) {

    echo '<h1 class="title">Ejercicio no encoentrado</h1>

    <p class="subtitle">El ejercicio que busca no existe</p>

    <a href="./">Volver al inicia</a>';

    exit();
}

$ejercicio = (object) $ejercicio;

?>

<h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
<p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

<form action="/eje1/resultado1.php" method="post" target="resultado">

    <div class="field">
        <label class="label">Nombre</label>
        <div class="control">
            <input class="input" type="text" placeholder="Escriba el nombre de la persona" name="nombre" />
        </div>
    </div>

    <!-- buton enviar -->

    <div class="control">
        <button class="button is-primary">Enviar</button>
    </div>

</form>

<iframe name="resultado" style="width: 100%; height: 300px;">

</iframe>

<script>
    window.onload = function () {
        // Fondo de la página con imagen fija
        let page = document.querySelector('html');
        page.style.background = "url('https://sneakpeektest.com/wp-content/uploads/2020/02/What-is-a-Gender-Reveal-min.jpg')";
        page.style.backgroundSize = "cover";
        page.style.backgroundAttachment = "fixed";

        // Degradado para el body
        let body = document.querySelector('body');
        body.style.background = "linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85))";

        body.style.borderRadius = "10px";
        body.style.margin = "90px auto"; // Mueve todo el contenido hacia abajo
        body.style.width = "80%";
        body.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";

        // Estilos para el formulario
        let form = document.querySelector("form");
        form.style.background = "rgba(255, 255, 255, 0.9)";
        form.style.padding = "15px";
        form.style.borderRadius = "10px";
        form.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";
        form.style.marginTop = "20px";

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

        button.onmouseover = function () {
            button.style.background = "#0056b3";
        };
        button.onmouseout = function () {
            button.style.background = "#007bff";
        };

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

        // Estilo para el iframe donde aparecerá el resultado
        let iframe = document.querySelector("iframe[name='resultado']");
        iframe.style.border = "2px solid #007bff";
        iframe.style.borderRadius = "10px";
        iframe.style.marginTop = "20px";
    };
</script>