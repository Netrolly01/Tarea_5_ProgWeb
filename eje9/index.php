<?php
require_once("../libreria/motor.php");
plantilla::aplicar();



$n1 = 9;
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


<!-- Formulario para buscar un país -->
<form id="countryForm" class="field">
    <div class="field">
        <label class="label">Ingrese el nombre del país:</label>
        <div class="control">
            <input type="text" id="country" class="input" placeholder="Ejemplo: Dominican Republic" required>
        </div>
    </div>
    <div class="control">
        <button type="button" id="fetchCountryBtn" class="button is-primary">Buscar País</button>
    </div>
</form>

<!-- Contenedor donde se mostrará la información del país -->
<div id="country-container"></div>

<script>
document.getElementById("fetchCountryBtn").addEventListener("click", function() {
    let countryContainer = document.getElementById("country-container");
    let countryName = document.getElementById("country").value.trim();

    if (countryName === "") {
        countryContainer.innerHTML = "<div class='alert alert-warning'>Por favor, ingrese un nombre de país válido.</div>";
        return;
    }

    let apiUrl = `https://restcountries.com/v3.1/name/${encodeURIComponent(countryName)}`;

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error("Error al conectar con la API de países.");
            }
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data) || data.length === 0) {
                countryContainer.innerHTML = "<div class='alert alert-warning'>No se encontraron datos para el país ingresado.</div>";
                return;
            }

            let country = data[0]; // Tomar el primer resultado

            let flag = country.flags?.png || "";
            let name = country.name?.common || "Desconocido";
            let capital = (country.capital && country.capital.length > 0) ? country.capital[0] : "N/A";
            let population = country.population ? country.population.toLocaleString() : "N/A";
            let currencies = country.currencies ? Object.keys(country.currencies).join(", ") : "N/A";
            let languages = country.languages ? Object.values(country.languages).join(", ") : "N/A";

            let html = `
                <div class="container">
                    <h1 class="title">${name}</h1>
                    <div class="country-info">
                        ${flag ? `<img src="${flag}" alt="Bandera de ${name}" class="country-flag" />` : ""}
                        <h3>🌆 Capital: <span class="resaltado">${capital}</span></h3>
                        <h3>👥 Población: <span class="resaltado">${population}</span></h3>
                        <h3>💰 Moneda(s): <span class="resaltado">${currencies}</span></h3>
                        <h3>🗣️ Idioma(s): <span class="resaltado">${languages}</span></h3>
                    </div>
                </div>
            `;

            countryContainer.innerHTML = html;
        })
        .catch(error => {
            countryContainer.innerHTML = `<div class="alert alert-danger">${error.message}</div>`;
        });
});

window.onload = function () {
    // Fondo de la página con imagen fija
    document.documentElement.style.background = "url('https://static5.depositphotos.com/1030167/526/v/450/depositphotos_5262438-stock-illustration-the-world-map.jpg')";
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
