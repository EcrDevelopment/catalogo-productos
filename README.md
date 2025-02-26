# Catálogo de Productos

Este es un proyecto de un catálogo de productos desarrollado con Laravel 9, Livewire y Tailwind CSS. Implementa autenticación con Laravel Jetstream y un sistema de roles donde los usuarios registrados por defecto son clientes, mientras que los administradores pueden ser creados mediante un comando de Artisan.

## Requisitos

Para ejecutar este proyecto, asegúrate de tener instalados los siguientes requisitos:

- PHP >= 8.0
- Composer
- Laravel 9
- MySQL (configurable en .env)
- Node.js y NPM (para compilar assets de Tailwind CSS)

## Instalación

1. Clona el repositorio:
   ```sh
   git clone https://github.com/EcrDevelopment/catalogo-productos.git
   cd catalogo-productos
   ```
2. Instala las dependencias de PHP:
   ```sh
   composer update
   composer install
   ```
3. Copia el archivo de entorno y configura la base de datos:
   ```sh
   cp .env.example .env
   ```
   Configura la conexión a la base de datos en `.env`:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_bd
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```
4. Genera la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```
5. Ejecuta las migraciones y los seeders:
   ```sh
   php artisan migrate --seed
   ```
6. Instala las dependencias de NPM y compila los assets:
   ```sh
   npm install && npm run build
   ```
7. Levanta el servidor de desarrollo:
   ```sh
   php artisan serve
   ```

## Creación de Usuarios Administradores

Para crear un usuario administrador, ejecuta el siguiente comando:
```sh
php artisan create:admin
```
Esto te pedirá un correo y contraseña para el nuevo usuario administrador.

> [!TIP]
> Ejemplo:
> ```php artisan make:admin admin@ejemplo.com "Juan Perez" "12345678" ```

## Características

- CRUD de productos con Livewire
- Autenticación con Laravel Jetstream
- Sistema de roles (Administrador y Cliente)
- Diseño responsivo con Tailwind CSS
- Búsqueda por nombre y paginación de productos

## Uso

1. Regístrate o inicia sesión como administrador.
2. Accede a la sección de gestión de productos.
3. Agrega, edita o elimina productos según sea necesario.
4. Los usuarios clientes pueden ver el catálogo pero no modificarlo.


---
Desarrollado con ❤️ usando Laravel, Livewire y Tailwind CSS.

