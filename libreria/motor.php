<?php
require('plantilla.php');

function get_ejercicio($numero){
    $ejercicios = get_lista_ejercicios();
    return $ejercicios[$numero];
}

function get_lista_ejercicios() {
    return array(
        1 => array(
            'nombre' => '🔍 Adivina tu género',
            'descripcion' => 'Descubre si tu nombre suena más masculino o femenino 👦👧',
            'url'=> '/eje1'
        ),
        array(
            'nombre' => '🎂 ¿Cuántos años tienes?',
            'descripcion' => 'Predicción de edad basada en tu nombre 🎉',
            'url'=> '/eje2'
        ),
        array(
            'nombre' => '🏫 Explora Universidades',
            'descripcion' => 'Encuentra universidades en cualquier país 🌎',
            'url'=> '/eje3'
        ),
        array(
            'nombre' => '⛅ ¿Cómo está el clima?',
            'descripcion' => 'Consulta el clima en República Dominicana en tiempo real 🌦️',
            'url'=> '/eje4'
        ),
        array(
            'nombre' => '⚡ ¡Atrápalos todos!',
            'descripcion' => 'Obtén información detallada de cualquier Pokémon 🕵️‍♂️',
            'url'=> '/eje5'
        ),
        array(
            'nombre' => '📰 Noticias al instante',
            'descripcion' => 'Recibe las últimas noticias desde WordPress 📢',
            'url'=> '/eje6'
        ),
        array(
            'nombre' => '💰 Dinero sin fronteras',
            'descripcion' => 'Convierte monedas de cualquier parte del mundo 🌍',
            'url'=> '/eje7'
        ),
        array(
            'nombre' => '🎨 Creador de Arte IA',
            'descripcion' => 'Genera imágenes con inteligencia artificial 🎭',
            'url'=> '/eje8'
        ),
        array(
            'nombre' => '🌍 Datos curiosos de países',
            'descripcion' => 'Conoce información interesante sobre cualquier nación 📊',
            'url'=> '/eje9'
        ),
        array(
            'nombre' => '🤣 Generador de Risas',
            'descripcion' => 'Déjate sorprender con chistes aleatorios 😆',
            'url'=> '/eje10'
        ),
    );
}
?>
