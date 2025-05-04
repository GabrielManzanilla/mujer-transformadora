@extends ('layouts.base')
@section ('content')
	<h2>Registro</h2>
	<form method="POST" action="{{ route('make.register') }}">
			@csrf
			<input type="text" name="name" placeholder="Nombre" required><br>
			<input type="email" name="email" placeholder="Email" required><br>
			<input type="password" name="password" placeholder="Contraseña" required><br>
			<button type="submit">Registrarse</button>
	</form>
	<a href="/register">¿Ya tienes cuenta? Inicia Secion</a>
@endsection