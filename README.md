 Para poder correr el proyecto es necesario seguir los siguientes pasos:
1. Clonar el repositorio en la carpeta htdocs de xampp
~~~
cd C:\xampp\htdocs
git clone https://github.com/GabrielManzanilla/mujer-transformadora.git
~~~

2. Correr el node para poder cargar los scripts y las configuraciones de tailwind para los estilos.

~~~
npm install
npm run build
~~~
_OJO: Este paso es adicional en caso de que los estilos no esten funcionando._


3. Ejecutar servicio de XAMPP para Apache2 y MySQL

	- Puede buscar en el navegador
	[http://localhost/mujer-transformadora/]

	- Puede ejecutar `php artisan serve` en la capeta del proyecto y consultar [http://localhost:8000]

4. Crear un .env en la raiz del proyecto con la sig estructura 
~~~
DB_CONNECTION=mysql
DB_HOST=									#aqui la ip del host
DB_PORT=3306
DB_DATABASE=							#aqui nombre de la base de datos
DB_USERNAME=						#aqui el usuario manejador
DB_PASSWORD=							#aqui la contraseña de la base de datos
~~~

5. Realizar las migraciones (Para realizar la carga en la base de datos)
~~~
php artisan migrate
~~~
_Dato: laravel cuenta con su ORM eloquent para poder manejar las bases de datos, las migraciones se explian en la parte de abajo_

---

## Datos adicionales
El proyecto cuenta con un archivo ``index.php`` en la raiz del proyecto que permite redireccionar de forma automatica a `public/` para que se carguen las vistas desde xampp o manejador de apache que se use.


## Migraciones
La estructura de las tablas se encuentra en la carpeta `mujer-transformadora/database/migrations`.
En esta se puede encontrar la estrucutra de las tablas que emplea la db, cada migracion corresponde a una tabla o un conjunto de tablas en el mismo ambito.

_OJO: Si se realiza alguna modificacion se debe usar el comando `php artisan migrate:fresh` para poder volver a cargar las tablas (como un rebuild)._


## Seguridad
- Laravel usa Eloquent ORM y Query Builder con binding de parámetros, lo cual evita que los datos del usuario se inserten directamente en la consulta SQL.
- Laravel genera y valida tokens CSRF automáticamente en formularios HTML. Esto evita que formularios falsos externos hagan peticiones en nombre del usuario autenticado.
-  XSS (Cross-Site Scripting) Laravel escapa automáticamente el contenido impreso en las vistas Blade.  Esto evita que scripts maliciosos se inyecten en el navegador del usuario.
- Laravel ofrece un sistema de validación robusta que previene que lleguen datos maliciosos a tu lógica.
- Laravel usa bcrypt o argon2 para encriptar contraseñas.
