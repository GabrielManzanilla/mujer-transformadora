@extends ('layouts.base')
@section ('content')
	<h2>Registro</h2>
	<form method="POST" action="{{ route('make.register') }}">
			@csrf
			<fieldset>
				<input type="text" name="name" placeholder="Nombre" required><br>
				<input type="email" name="email" placeholder="Email" required><br>
				<input type="password" name="password" placeholder="Contraseña" required><br>
				<input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required><br>
			</fieldset>
			<fieldset>
				<input type="text" name="curp" id="curp" placeholder="CURP" required><br>
				<input type="text" name="nombres" id="nombres" placeholder="Nombres" required><br>
				<input type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" required><br>
				<input type="text" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno" required><br>
				<label for="fecha_nacimiento">Fecha Nacimiento
					<input type="text" name="estado_nacimiento" id="estado_nacimiento" placeholder="Estado de Nacimiento" required><br>
					<input type="text" name="municipio_nacimiento" id="municipio_nacimiento" placeholder="Municipio de Nacimiento" required><br>
				</label>
				<input type="date" name="fecha_nacimiento" id="fecha nacimiento" required><br>
				<select name="sexo" id="sexo">
					<option value="Hombre">Hombre</option>
					<option value="Mujer">Mujer</option>
				</select>
				<label for="mayahablante">
					<input type="hidden" name="mayahablante" value="0">
					<input type="checkbox" name="mayahablante" id="mayahablante" value="1">
				¿Habla Maya?</label>
				<input type="tel" name="telefono" id="telefono" placeholder="Teléfono" required><br>
			</fieldset>
			<button type="submit">Registrarse</button>


	</form>
	<a href="/register">¿Ya tienes cuenta? Inicia Secion</a>
@endsection