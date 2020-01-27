<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>
<p align="center">Búsqueda y Filtrado de Información con paginación</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Acerca de Laravel Search

Aplicación desarrollada con el Framework Laravel 6 que permite buscar, filtrar y paginar información, dentro de un catálogo de registros genéricos.

- Framework Backend - Laravel 6.x.
- Framework CSS - Bootstrap 4.
- Base de datos - MySQL 5.x.
- Componente HTML/Form de LaravelCollective 6.x
- Librería de Iconos - FontAwesome

#### Instalación
Configurar permisos en el directorio storage de la aplicación
~~~
sudo chmod 755 -R storage
~~~

Instalar las dependencias del proyecto
~~~
composer install
~~~

Crear una copia del archivo .env.example con la configuración correcta del proyecto. **Por ejemplo, credenciales de acceso a la Base de Datos**
~~~
cp .env.example .env
~~~

Crear un nuevo API Key para la aplicación
~~~
php artisan key:generate
~~~

Crear la base de datos para el proyecto mediante algún Sistema Administrador de Bases de Datos Relacionales soportado por Laravel. **Por ejemplo, MySQL**. Finalmente, registre las credenciales de acceso en el archivo de configuración .env
~~~
mysql> CREATE DATABASE nombre_db;
~~~

Ejecutar las migraciones y sembrar los datos de prueba
~~~
php artisan migrate --seed
~~~

Ejecutar la aplicación. **Por ejemplo, mediante el servidor HTTP integrado**
~~~
php artisan serve
~~~