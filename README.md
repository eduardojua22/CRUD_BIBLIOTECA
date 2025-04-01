=============================================
SISTEMA DE GESTIÓN BIBLIOTECARIA (MVC PHP)
=============================================

📂 ESTRUCTURA DEL PROYECTO
----------------------------
biblioteca_mvc/
├── app/
│   ├── controladores/
│   │   ├── Libros.php       # Controlador principal
│   │   └── UnLibro.php      # Controlador para vista individual
│   ├── modelos/
│   │   ├── LibrosModelo.php # Modelo para operaciones CRUD
│   │   └── UnLibroModelo.php
│   ├── vistas/
│   │   ├── libros/
│   │   │   ├── crear.php    # Vista de creación
│   │   │   ├── editar.php   # Vista de edición
│   │   │   └── LibrosVista.php # Vista principal
│   │   └── unlibro/
│   │       └── UnLibroVista.php
│   ├── libs/                # Librerías core
│   │   ├── Controlador.php  # Clase base
│   │   └── MySQLdb.php      # Conexión DB
│   └── inicio.php           # Bootstrap
└── public/
    ├── css/                 # Estilos
    ├── js/                  # Scripts
    ├── assets/              # Imágenes/fuentes
    └── index.php            # Punto de entrada

🚀 INSTALACIÓN
------------------
1. Clonar repositorio:
   git clone [url_repositorio]
   
2. Configurar base de datos:
   - Importar estructura SQL desde /database/biblioteca.sql
   - Configurar credenciales en app/libs/MySQLdb.php

3. Configurar rutas:
   Editar app/libs/defineConstantes.php:
   define('RUTA_APP', 'http://tu-dominio/biblioteca_mvc/public');

4. Permisos:
   chmod 755 -R app/cache/ (si existe)

🛠️ DEPENDENCIAS
------------------
- PHP 7.4+ (con PDO MySQL)
- MySQL 5.7+
- Apache/Nginx con mod_rewrite
- Bootstrap 5 (CDN)
- FontAwesome 6 (CDN)

🛠 FUNCIONALIDADES PRINCIPALES
--------------------------------
✅ CRUD completo de libros
✅ Vista individual de libros
✅ Validación de formularios
✅ Confirmación para eliminación
✅ Diseño responsive
✅ Paginación (opcional)

🌐 RUTAS PRINCIPALES
-----------------------
- /libros              # Listado
- /libros/alta         # Formulario creación
- /libros/modificar/id # Formulario edición
- /libros/borrar/id    # Eliminar (POST)
- /libro/id            # Vista individual

⚙️ CONFIGURACIÓN DB
----------------------
Tabla 'libros' requiere:
- id (INT PK AI)
- titulo (VARCHAR 255)
- autor (VARCHAR 255)
- editorial (VARCHAR 255)
- anio (INT)
- created_at (TIMESTAMP)

💻 DESARROLLO
---------------
Requisitos para desarrollo:
1. XDebug para PHP
2. Composer (autoloading)
3. Git Flow para gestión

📝 NOTAS ADICIONALES
-----------------------
- El sistema usa Bootstrap 5 mediante CDN
- FontAwesome para iconos
- Implementa patrón MVC personalizado
- No requiere composer inicialmente

📧 SOPORTE
------------
Contacto: ejuarezsanchez91@gmail.com

📁 SOBRE MÍ
------------------
Hola, soy Eduardo (edu), desarrollador apasionado por el backend y la arquitectura de software. Actualmente, estoy profundizando en PHP y en la implementación de patrones de diseño como MVC. Este proyecto es un sistema de gestión bibliotecaria construido para mejorar mis habilidades en el desarrollo web y proporcionar una base estructurada para futuras aplicaciones.

Si tienes alguna sugerencia, duda o simplemente quieres discutir sobre desarrollo, ¡no dudes en contactarme!

📑 REFERENCIAS
------------------
- Documentación oficial de PHP: https://www.php.net/docs.php
- MySQL: https://dev.mysql.com/doc/
- Apache HTTP Server: https://httpd.apache.org/docs/
- Bootstrap 5: https://getbootstrap.com/docs/5.0/
- FontAwesome: https://fontawesome.com/docs/
- Patrón MVC en PHP: https://www.phptherightway.com/pages/Design-Patterns.html

