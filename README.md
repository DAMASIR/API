# API

API para el proyecto de ciclo DAM + ASIR en Birt.
Curso 2º cuatrimestre 2021-2022.

## Repositorio

<https://github.com/DAMASIR/API>

## Requisitos técnicos

* MySQL 8.0
* PHP 8.0
* Servidor web: Apache 2.4

### Desarrollo

* Docker
* Cliente MySQL, ej. MySQL Workbench
* Git para acceder al repositorio de GitHub
* IDE: cualquier editor de texto plano. Recomendado Visual Studio Code.

## Entorno de pruebas

Instrucciones para levantar el entorno de pruebas del proyecto:

* Ejecutar "docker-compose up -d" para levantar el servidor de Apache+PHP y MySQL
* Acceder a la consola del servidor web ejecutando "docker-compose exec web"
* Una vez en la consola del servidor web ejecutamos "symfony console doctrine:migrations:migrate" para crear la base de datos
* Desde tu equipo abrir la url <https://127.0.0.1> para acceder al servidor web Apache de la API