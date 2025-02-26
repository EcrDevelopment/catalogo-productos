# Catálogo de Productos con Laravel, Livewire y Jetstream

Este es un sistema de catálogo de productos desarrollado con Laravel 9, Livewire y Tailwind CSS. Incluye autenticación con Laravel Jetstream y un sistema de roles para diferenciar entre administradores y clientes.

## Tecnologías Utilizadas
- **Laravel 9** - Framework principal
- **Livewire** - Para interactividad en tiempo real
- **Tailwind CSS** - Para el diseño responsive
- **Laravel Jetstream** - Para autenticación y gestión de usuarios
- **MySQL** - Base de datos

## Características
- Registro e inicio de sesión con Jetstream
- Roles de usuario (Administrador y Cliente)
- CRUD de productos con Livewire
- Paginación de productos
- Subida de imágenes
- Diseño responsivo con Tailwind CSS

## Instalación
### 1. Clonar el repositorio
```sh
 git clone https://github.com/tuusuario/catalogo-productos.git
 cd catalogo-productos
```

### 2. Instalar dependencias
```sh
composer install
npm install && npm run build
```

### 3. Configurar el archivo `.env`
```sh
cp .env.example .env
php artisan key:generate
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

### 4. Ejecutar migraciones y seeders
```sh
php artisan migrate --seed
```

### 5. Crear un usuario administrador
Ejecuta el siguiente comando para crear un usuario administrador:
```sh
php artisan make:admin
```
Sigue las instrucciones y proporciona los datos requeridos.

### 6. Iniciar el servidor
```sh
php artisan serve
```
Accede a `http://127.0.0.1:8000` en tu navegador.

## Uso
- Los clientes pueden registrarse desde `/register` y acceder como usuarios normales.
- Los administradores deben ser creados manualmente con el comando `php artisan make:admin`.
- Solo los administradores pueden acceder a `/productos` y gestionar el catálogo.

## Contribuciones
Si deseas contribuir, puedes enviar un Pull Request o abrir un Issue en el repositorio.

## Licencia
Este proyecto está bajo la licencia MIT.


