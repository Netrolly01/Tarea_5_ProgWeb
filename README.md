# 🌐 Plataforma de Ejercicios con APIs

Este proyecto es una **plataforma interactiva** diseñada para explorar diversas funcionalidades basadas en **APIs**. A través de esta herramienta, los usuarios pueden realizar diferentes consultas y pruebas en tiempo real.

## ✨ Características Principales

🔹 **Conversor de Monedas** – Realiza conversiones en tiempo real entre distintas divisas.
🔹 **Información de Países** – Consulta datos detallados sobre cualquier nación.
🔹 **Generador de Imágenes** – Utiliza IA para obtener imágenes según palabras clave.
🔹 **Noticias desde WordPress** – Accede a los titulares más recientes de diversas fuentes.
🔹 **Chistes Aleatorios** – Obtén chistes con opción de traducción automática.

---

## ⚙️ Requisitos Previos

Antes de iniciar el proyecto, asegúrate de contar con lo siguiente:

- **PHP 7.9 o superior** ✅
- **Servidor Web (Apache recomendado)** 🌎
- **Composer** (para la gestión de dependencias) 📦
- **Base de Datos MySQL** (opcional, dependiendo de la configuración del proyecto) 🗄️

---

## 🚀 Instalación

Sigue estos pasos para instalar y ejecutar la plataforma en tu entorno local:

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/tu_usuario/plataforma-apis.git
```

### 2️⃣ Acceder a la carpeta del proyecto

```bash
cd plataforma-apis
```

### 3️⃣ Instalar dependencias (si aplica)

```bash
composer install
```

### 4️⃣ Configurar la base de datos (opcional)

Si el proyecto utiliza una base de datos, crea un archivo `.env` y define los parámetros de conexión:

```bash
cp .env.example .env
```

Edita el archivo `.env` con la configuración adecuada:

```env
DB_HOST=localhost
DB_DATABASE=plataforma_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ Iniciar el servidor local

Si no cuentas con Apache configurado, puedes utilizar el servidor integrado de PHP:

```bash
php -S localhost:8010
```

### 6️⃣ Acceder a la plataforma

Abre tu navegador y visita:

```bash
http://localhost:8010
```

---

## 📂 Estructura del Proyecto

```bash
plataforma-apis/
│── libreria/            # Código reutilizable y utilidades PHP
│── modulos/             # Vistas y archivos PHP para cada funcionalidad
│── index.php            # Archivo principal de entrada
│── README.md            # Documentación del proyecto
│── composer.json        # Configuración de dependencias
└── assets/              # Imágenes, CSS y JavaScript
```

---

## 🛠️ Tecnologías Utilizadas

- **PHP** para la lógica del backend
- **JavaScript** para interactividad en el frontend
- **Bootstrap** para el diseño adaptable
- **APIs REST** para la obtención de datos dinámicos
- **MySQL** para almacenamiento de información (opcional)
- **CSS3 & Animaciones** para una experiencia visual moderna

---

## 📖 Recursos Útiles

- [Documentación de PHP](https://www.php.net/docs.php)
- [Bootstrap](https://getbootstrap.com/)
- [Lista de APIs utilizadas](https://restcountries.com, https://official-joke-api.appspot.com, https://unsplash.com)

---

👨‍💻 **Desarrollado por Netanel De Jesus**
📺 **Canal de YouTube : https://www.youtube.com/@netrolly01_xd45** 
📅 **Fecha de creación: 27/02/2025**  
📌 **Repositorio: [GitHub URL]**

