<?php
require_once("../libreria/motor.php");
plantilla::aplicar();

$n1 = 6;
$ejercicio = get_ejercicio($n1);
if (!$ejercicio) {
    echo '<h1 class="title">Ejercicio no encontrado</h1>
          <p class="subtitle">El ejercicio que busca no existe</p>
          <a href="./">Volver al inicio</a>';
    exit();
}

$ejercicio = (object) $ejercicio;
?>

<h1 class="title"><?php echo $ejercicio->nombre; ?></h1>
<p class="subtitle"><?php echo $ejercicio->descripcion; ?></p>

<!-- Formulario para seleccionar noticias -->
<form id="newsForm" class="field">
    <div class="field">
        <label class="label">Seleccione la página de noticias:</label>
        <div class="control">
            <select name="news_site" id="news_site" class="input">
                <option value="wordpress">WordPress News</option>
            </select>
        </div>
    </div>
    <div class="control">
        <button type="button" id="fetchNewsBtn" class="button is-primary">Obtener Noticias</button>
    </div>
</form>

<!-- Contenedor donde se mostrarán las noticias -->
<div id="news-container"></div>

<script>
document.getElementById("fetchNewsBtn").addEventListener("click", function() {
    let newsContainer = document.getElementById("news-container");
    let selectedNewsSite = document.getElementById("news_site").value;

    if (selectedNewsSite === "wordpress") {
        fetch("https://wordpress.org/news/wp-json/wp/v2/posts?per_page=3")
        .then(response => {
            if (!response.ok) {
                throw new Error("Error al conectar con la API de noticias.");
            }
            return response.json();
        })
        .then(posts => {
            if (posts.length === 0) {
                newsContainer.innerHTML = "<div class='alert alert-warning'>No se encontraron noticias.</div>";
                return;
            }

            let html = "<div class='row'>";
            posts.forEach(post => {
                let title = post.title.rendered;
                let excerpt = post.excerpt.rendered.replace(/(<([^>]+)>)/gi, "");
                let link = post.link;

                html += `
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="https://s.w.org/style/images/about/WordPress-logotype-wmark.png" class="card-img-top" alt="Logo WordPress">
                            <div class="card-body">
                                <h5 class="card-title">${title}</h5>
                                <p class="card-text">${excerpt}</p>
                                <a href="${link}" target="_blank" class="button is-primary btn-sm">Leer más</a>
                            </div>
                        </div>
                    </div>
                `;
            });
            html += "</div>";

            newsContainer.innerHTML = html;

            // Aplicar estilos adicionales
            let cards = document.querySelectorAll(".card");
            cards.forEach(card => {
                card.style.width = "90%";  // Reducción de tamaño
                card.style.margin = "auto";  // Centrar la tarjeta
                card.style.padding = "10px";
                card.style.borderRadius = "8px";
                card.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.1)";
            });

            // Reducir el tamaño de las imágenes
            let images = document.querySelectorAll(".card-img-top");
            images.forEach(img => {
                img.style.maxHeight = "120px";  // Limitar el tamaño de la imagen
                img.style.objectFit = "contain";  // Evita distorsión
            });

            // Ajustar el botón
            let buttons = document.querySelectorAll(".btn-sm");
            buttons.forEach(btn => {
                btn.style.padding = "8px 12px";  // Hacerlo más pequeño
                btn.style.fontSize = "14px";
            });

        })
        .catch(error => {
            newsContainer.innerHTML = `<div class="alert alert-danger">${error.message}</div>`;
        });
    }
});

window.onload = function () {
    // Fondo de la página con imagen fija
    document.documentElement.style.background = "url('https://i0.wp.com/themes.svn.wordpress.org/recent-news/1.0.4/screenshot.jpg')";
    document.documentElement.style.backgroundSize = "cover";
    document.documentElement.style.backgroundAttachment = "fixed";

    // Degradado para el body
    let body = document.body;
    body.style.background = "linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85))";
    body.style.borderRadius = "10px";
    body.style.margin = "90px auto"; // Mueve el contenido hacia abajo
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

    // Estilo para el iframe donde aparecerá el resultado
    let iframe = document.querySelector("iframe[name='resultado']");
    if (iframe) {
        iframe.style.border = "2px solid #007bff";
        iframe.style.borderRadius = "10px";
        iframe.style.marginTop = "20px";
        iframe.style.width = "100%";
        iframe.style.height = "400px";
    }
};
</script>
