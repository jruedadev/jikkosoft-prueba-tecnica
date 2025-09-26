# Prueba técnica Johan Roberto Rueda Guinea

Este proyecto es un sistema básico para gestionar bibliotecas, libros y miembros, con funcionalidades de préstamos de libros. Incluye control de acceso basado en roles usando Spatie/laravel-permission y está construido con Laravel y Bootstrap 5.

Se puede consultar el proyecto en [https://jikkosoft-prueba-tecnica-main-leg1ml.laravel.cloud](https://jikkosoft-prueba-tecnica-main-leg1ml.laravel.cloud).

Por tiempo no habilité el sistema de autenticación/autorización de usuarios.

Adicionalmente, se incluye la carpeta `docs` con un archivo `Punto1-ER.sql` que contiene la estructura de datos para el problema planteado y un ACL general, si desea ver el modelo Entidad Relación completo tiene a disposición el archivo `Punto1-ER.png`.

El punto dos se encuentra en el archivo `Punto2-Funcion.php` que contiene una función para calcular los indices de los números que sumados den el número objetivo.

se puede ejecutar con:

```bash
php docs/Punto2-Funcion.php
```

y ver el resultado en la consola.

---

## Requisitos

- PHP >= 8.0
- Composer
- Base de datos (MySQL, PostgreSQL, Sqlite o similar)
- Node.js y npm (opcional para assets)

---

## Instalación y configuración

1. Clonar el repositorio o descargar el código.

2. Copiar y configurar el archivo de entorno:

```bash
cp .env.example .env
```

3. Instalar dependencias:

```bash
composer install
```

4. Generar clave de aplicación:

```bash
php artisan key:generate
```

5. Ejecutar migraciones y seeders para crear tablas y datos iniciales:

```bash
php artisan migrate
php artisan db:seed
```

6. Ejecutar el servidor de desarrollo:

```bash
php artisan serve
```

---

## Acceso y uso

- Acceder a `http://localhost:8000` para ver la página de bienvenida con enlaces al sistema.
- Navegar a través del menú para administrar:
  - Libraries (Bibliotecas)
  - Members (Miembros)
  - Books (Libros)
  - Book Loans (Préstamos de libros)

---

---

## Autor

Creado por Johan Roberto Rueda Guinea.
Email: <a href="mailto:me@jrueda.dev">me@jrueda.dev</a>

---

## Licencia

Proyecto abierto bajo licencia MIT.