<?php
require_once("../libreria/motor.php");
plantilla::aplicar();



$n1 = 8;
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

<!-- Formulario para generar imágenes -->
<form id="imageForm" class="field">
    <div class="field">
        <label class="label">Ingrese una palabra clave en inglés:</label>
        <div class="control">
            <input type="text" id="keyword" class="input" placeholder="Ejemplo: sunset, dog, mountain" required>
        </div>
    </div>
    <div class="control">
        <button type="button" id="fetchImageBtn" class="button is-primary">Generar Imagen</button>
    </div>
</form>

<!-- Contenedor donde se mostrará la imagen -->
<div id="image-container"></div>

<script>
    document.getElementById("fetchImageBtn").addEventListener("click", function () {
        let imageContainer = document.getElementById("image-container");
        let keyword = document.getElementById("keyword").value.trim();

        if (keyword === "") {
            imageContainer.innerHTML = "<div class='alert alert-warning'>⚠️ Por favor, ingrese una palabra clave válida.</div>";
            return;
        }

        let apiUrl = `https://api.unsplash.com/photos/random?query=${encodeURIComponent(keyword)}&client_id=pTKb4MwnbtonJbM394JhbnhYZNgWE98JqSun8z_Y0lY`;

        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error("⚠️ Error al conectar con la API de Unsplash.");
                }
                return response.json();
            })
            .then(data => {
                if (!data || !data.urls || !data.urls.regular) {
                    imageContainer.innerHTML = "<div class='alert alert-warning'>⚠️ No se encontraron imágenes. Intente con otra palabra clave en inglés.</div>";
                    return;
                }

                let imageUrl = data.urls.regular;
                let author = data.user.name;
                let authorLink = data.user.links.html;
                let downloadLink = data.links.download;

                let html = `
                <div class="container">
                    <h1 class="title">Resultado para: ${keyword}</h1>
                    <div class="image-result">
                        <img src="${imageUrl}" alt="Imagen generada para ${keyword}" class="generated-image" />
                        <p class="text-muted">📸 Foto por: 
                            <a href="${authorLink}?utm_source=tu_app&utm_medium=referral" target="_blank">
                                ${author}
                            </a> en <a href="https://unsplash.com/?utm_source=tu_app&utm_medium=referral" target="_blank">Unsplash</a>
                        </p>
                        <a href="${downloadLink}" class="button is-primary btn-sm" download>📥 Descargar</a>
                    </div>
                </div>
            `;

                imageContainer.innerHTML = html;
            })
            .catch(error => {
                imageContainer.innerHTML = `<div class="alert alert-danger">${error.message}</div>`;
            });
    });

    window.onload = function () {
        // Fondo de la página con imagen fija
        document.documentElement.style.background = "url('https://media.es.wired.com/photos/641a2d5971f5d923845f34d9/16:9/w_2560%2Cc_limit/image%2520creator%2520bing%2520microsoft%2520dalle.jpg')";
        document.documentElement.style.backgroundSize = "cover";
        document.documentElement.style.backgroundAttachment = "fixed";

        // Degradado para el body
        let body = document.body;
        body.style.background = "linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85))";
        body.style.borderRadius = "10px";
        body.style.margin = "90px auto";
        body.style.width = "80%";
        body.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";
        body.style.padding = "20px";

        // Estilos para el formulario
        let form = document.querySelector("form");
        if (form) {
            form.style.background = "rgba(255, 255, 255, 0.9)";
            form.style.padding = "15px";
            form.style.borderRadius = "10px";
            form.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";
            form.style.marginTop = "20px";
        }

        // Estilos para el botón de enviar
        let button = document.querySelector(".button");
        if (button) {
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
        }

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

        // Ajustar el tamaño de las imágenes de banderas
        let flags = document.querySelectorAll(".country-flag");
        flags.forEach(flag => {
            flag.style.maxWidth = "200px";
            flag.style.borderRadius = "10px";
            flag.style.marginTop = "20px";
            flag.style.boxShadow = "0px 4px 6px rgba(0, 0, 0, 0.1)";
        });

        // Resaltado de datos importantes
        let resaltados = document.querySelectorAll('.resaltado');
        resaltados.forEach(res => {
            res.style.color = "#ff6b6b";
            res.style.fontWeight = "bold";
            res.style.fontSize = "20px";
        });
    };
</script>