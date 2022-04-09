# API

API para el proyecto de ciclo DAM + ASIR en Birt.
Curso 2º cuatrimestre 2021-2022.

## Repositorio

<https://github.com/DAMASIR/API>

## Requisitos técnicos

### Servidor producción

* Apache 2.4
* MySQL 8.0
* PHP 8.1

### Desarrollo

* Docker Engine + Docker Compose para crear servidores virtuales
* Git para acceder al repositorio de GitHub
* IDE: cualquier editor de texto plano. Recomendado Visual Studio Code.

## Ejecución en entorno de pruebas

Instrucciones para levantar el entorno de pruebas del proyecto:

* Ejecutar "docker-compose up -d" para levantar los servicios de Apache+PHP y MySQL
* Acceder a la consola del servidor web ejecutando "docker-compose exec web bash"
* Una vez en la consola del servidor web ejecutamos, dentro del directorio /var/www:
  * "composer install" para instalar los paquetes de los que depende el desarrollo
  * "symfony console doctrine:migrations:migrate" para crear la base de datos y las tablas necesarias

El servidor y la aplicacación están listos para usarse en las url:

* Desde tu equipo abrir la url <http://127.0.0.1/api> para acceder al servidor web Apache de la API
* Desde tu equipo abrir la url <http://127.0.0.1/admin> para acceder al panel que permite gestionar los datos vía web

## TODO:

* ¿Logo como fichero en vez de url?
