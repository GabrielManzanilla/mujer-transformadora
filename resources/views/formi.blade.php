
<form action="{{ route('register.store') }}" method="post">
	@csrf
	<input type="text" name="nombre" id="">
	<input type="text" name="apellido" id="">
	<input type="tel" name="numero" id="">
	<input type="email" name="correo" id="">
	<input type="submit" value="Enviar">
</form>