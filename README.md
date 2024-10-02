//////////////////////////////

#url git hub: https://github.com/acevedovv/Proyecto_web_escenarios.git

//////////////////////////

Proyecto Web Escenarios
Este proyecto es una aplicación web desarrollada con Laravel.

Integrantes
Julian Acevedo
Juan Manuel Garcia
Jhon Edison Muñoz
Configuración del Proyecto
Clona el repositorio:

git clone https://github.com/acevedovv/Proyecto_web_escenarios.git
Navega al directorio del proyecto:

cd tu_repositorio
Instala las dependencias:

composer install
Copia el archivo .env.example a .env y configura tus variables de entorno:

cp .env.example .env
Genera la clave de la aplicación:

php artisan key:generate
Configura la base de datos en el archivo .env.

Ejecuta las migraciones:

php artisan migrate
Inicia el servidor de desarrollo:

php artisan serve
