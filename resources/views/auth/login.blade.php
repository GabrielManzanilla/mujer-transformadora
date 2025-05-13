@extends ('layouts.base')
@section ('content')
<div class="w-full h-full bg-gray-100 flex flex-col items-center justify-center ">
	<div class="w-full lg:w-1/2 bg-gray-200 rounded-4xl  h-3/4 flex flex-col items-center justify-evenly">
		<h2 class=" my-10 font-bold uppercase text-2xl text-[#6D1528]">Iniciar Secion</h2>
		<form method="POST" action="{{ route('make.login') }}" class="flex flex-col gap-2 w-3/4">
				@csrf
				<input type="email" name="email" id="email" placeholder="Email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
				<input type="password" name="password" id="password" placeholder="Contraseña" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
				<button type="submit" class="px-4 py-2 bg-[#6D1528] text-white rounded-md hover:bg-[#9e2b44] focus:outline-none focus:ring-2 focus:bg-[#9e2b44]" id="nextBtn">Ingresar</button>
		</form>
		<a href="/register">¿No tienes cuenta? <span class="text-[#c2995c]">Regístrate</span></a>
	</div>
</div>
@endsection