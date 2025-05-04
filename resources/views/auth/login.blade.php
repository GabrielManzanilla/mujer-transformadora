@extends ('layouts.base')
@section ('content')
	<h2>Login</h2>
	<form method="POST" action="{{ route('make.login') }}">
			@csrf
			<input type="email" name="email" placeholder="Email" required><br>
			<input type="password" name="password" placeholder="Contraseña" required><br>
			<button type="submit">Ingresar</button>
	</form>
	<a href="/register">¿No tienes cuenta? Regístrate</a>
@endsection