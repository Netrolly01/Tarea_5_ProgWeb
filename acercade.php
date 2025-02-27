<?php
require_once("libreria/motor.php");
plantilla::aplicar();
?>

<h1 class="title">🌐 Tarea 5: APIs</h1>
<p class="subtitle">📌 Explorando el poder de las APIs y su impacto en el desarrollo web.</p>

<div class="container">
    <div class="content">
        <p>
            En esta tarea, hemos explorado el uso de <strong>APIs</strong> para enriquecer las aplicaciones web con datos dinámicos y funcionalidades avanzadas.  
            A través de diversas tecnologías, hemos integrado servicios en tiempo real para ofrecer una experiencia más interactiva y eficiente.
        </p>

        <p>🔍 <strong>¿Qué aprenderás en esta tarea?</strong></p>
        <ul class="technologies">
            <li>🌍 <strong>APIs Externas:</strong> Implementamos servicios como OpenWeatherMap, RestCountries y Google Translate API para obtener datos en tiempo real.</li>
            <li>🎨 <strong>Diseño Responsivo:</strong> Aplicamos CSS y el framework Bootstrap para garantizar una presentación atractiva en cualquier dispositivo.</li>
            <li>⚡ <strong>Interactividad:</strong> Usamos JavaScript para manejar eventos, realizar peticiones a APIs y actualizar dinámicamente el contenido.</li>
            <li>💻 <strong>Backend con PHP:</strong> Implementamos lógica de servidor para procesar datos y generar contenido dinámico.</li>
            <li>📄 <strong>Estructura HTML:</strong> Organizamos la información con HTML semántico para mejorar la accesibilidad y la navegabilidad.</li>
        </ul>
    </div>
</div>

<style>
/* Fondo general */
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
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
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

/* Contenido */
.content {
    background: rgba(255, 255, 255, 0.15);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Lista de tecnologías */
.technologies {
    list-style: none;
    padding: 0;
    text-align: left;
}

.technologies li {
    font-size: 18px;
    background: rgba(255, 255, 255, 0.15);
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.technologies li:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.03);
}
</style>
