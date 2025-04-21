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

---

## Datos adicionales
El proyecto cuenta con un archivo ``index.php`` en la raiz del proyecto que permite redireccionar de forma automatica a `public/` para que se carguen las vistas desde xampp o manejador de apache que se use.


