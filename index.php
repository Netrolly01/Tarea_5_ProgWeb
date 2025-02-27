<?php
require_once("libreria/motor.php");
plantilla::aplicar();
?>

<h1 class="title">🌐 Tarea 5: APIs</h1>
<p class="subtitle">📌 Explorando el uso de APIs en aplicaciones web.</p>

<div class="container">
    <div class="content">
        <p>📝 Selecciona una de las opciones para ver los ejercicios:</p>
        <ul id="exercise-list">
            <?php
            $ejercicios = get_lista_ejercicios();
            foreach ($ejercicios as $ejercicio) {
                echo '<li class="exercise-item">
                        <a href="' . $ejercicio['url'] . '">
                            ' . $ejercicio['nombre'] . '
                        </a> 
                        <span class="description">🖥️ ' . $ejercicio['descripcion'] . '</span>
                      </li>';
            }
            ?>
        </ul>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let items = document.querySelectorAll(".exercise-item");
    items.forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateY(20px)";
        setTimeout(() => {
            item.style.transition = "all 0.6s ease-out";
            item.style.opacity = "1";
            item.style.transform = "translateY(0)";
        }, index * 100);
    });

    let links = document.querySelectorAll(".exercise-item a");
    links.forEach(link => {
        link.style.transition = "color 0.3s ease, text-decoration 0.3s ease";
        link.addEventListener("mouseover", () => {
            link.style.color = "#ff6b6b";
            link.style.textDecoration = "underline";
        });
        link.addEventListener("mouseout", () => {
            link.style.color = "#1e88e5";
            link.style.textDecoration = "none";
        });
    });
});
</script>

<style>
/* Estilos generales */
body {
    background: linear-gradient(to right, #2c3e50, #4ca1af);
    font-family: 'Poppins', sans-serif;
    color: #fff;
    margin: 0;
    padding: 0;
}

/* Contenedor principal */
.container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    box-shadow: 0px 8px 20px rgba(237, 228, 228, 0.3);
}

/* Títulos */
.title {
    font-size: 36px;
    font-weight: 700;
    text-align: center;
    color: #ffcc00;
    margin-bottom: 10px;
}

.subtitle {
    font-size: 20px;
    text-align: center;
    color: #ddd;
    margin-bottom: 20px;
}

/* Lista de ejercicios */
#exercise-list {
    list-style: none;
    padding: 0;
}

.exercise-item {
    font-size: 18px;
    background: rgba(255, 255, 255, 0.15);
    margin: 10px 0;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
    text-align: center;
}

.exercise-item:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.05);
}

/* Enlaces */
.exercise-item a {
    text-decoration: none;
    color: #1e88e5;
    font-weight: 600;
    transition: color 0.3s ease-in-out;
    font-size: 20px;
}

/* Descripción */
.description {
    display: block;
    font-size: 14px;
    color: #f1f1f1;
    margin-top: 5px;
    font-style: italic;
}
</style>
