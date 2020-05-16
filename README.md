<h3>Instalacion</h3>
<ul>
	<li>
		<h5>Clonar respositorio</h5>
		<p>Agregar repositorio en la carpeta raiz de tu servidor local</p>
	</li>
	<li>
		<h5>Crear base de datos</h5>
		<p>Crea base de datos con el nombre deseado. Se debe procurar que nuestra base de datos tipo sea 'InnoDB'</p>
	</li>
	<li>
		<h5>Configurar archivo .env</h5>
		<p>Crear archivo .env basado en .env.example. Modificar informacion de la base de datos creada en este archivo (.env)</p>
	</li>
	<li>
		<h5>Crear tablas y datos de prueba</h5>
		<p>Abrir terminar de su preferencia y ubicarse dentro del proyecto, una vez aqui se deben instalar los paquetes necesario y proveedores, para esto ejecutar el comando <pre>composer install</pre> Luego creamos las tablas de nuestra base de datos con el comando <pre> php artisan migrate</pre> ahora el comando para crear los datos de prueba <pre>php artisan db:seed</pre> Y finalizando creando clave para la palicacion <pre>php artisan key:generate</pre></p>
	</li>
	<li>
		<h5>Abrir proyecto en el navegador</h5>
		<p>Ahora esta tu proyecto configurado. Si realizo todo al pie de la letra deberia ingresar con este link: <a href="http://localhost/CRUD-tienda-master/public/">http://localhost/CRUD-tienda-master/public/</a></p>
	</li>
</ul>