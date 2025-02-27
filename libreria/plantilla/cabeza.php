<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Tarea 5: Apis</title>

    <style>
        /* Estilos mejorados para el navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            background: rgba(21, 20, 20, 0.65);
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 9999;
            transition: background 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            padding: 15px 20px;
        }

        /* Cambia el fondo al hacer scroll */
        .navbar.scrolled {
            background: rgba(75, 72, 72, 0.66);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);
        }

        /* Ajustar margen del contenido */
        .section {
            padding-top: 100px;
        }

        /* Estilos opcionales para los enlaces dentro del navbar */
        .navbar a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px 15px;
            transition: color 0.3s ease-in-out;
        }

        .navbar a:hover {
            color: #007BFF;
        }
    </style>

</head>

<body>

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                Tarea 5
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="index.php">
                    Inicio
                </a>

                <a class="navbar-item" href="acercade.php">
                    Acerca de
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Ejercicio
                    </a>

                    <div class="navbar-dropdown">
                        <?php
                        $ejercicios = get_lista_ejercicios();
                        foreach ($ejercicios as $ejercicio) {
                            echo '<a class="navbar-item" href="' . $ejercicio['url'] . '">' . $ejercicio['nombre'] . '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    Netanel De Jesus 20231103 - DEV en Proceso
                </div>
            </div>
        </div>
    </nav>

    <section class="section">
        <div class="container">
            <!-- Contenido aquí -->
        </div>
    </section>

    <script>
        window.addEventListener("scroll", function () {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>

</body>

</html>
