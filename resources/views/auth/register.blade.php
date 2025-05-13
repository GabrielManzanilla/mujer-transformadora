@extends ('layouts.base')
@section ('content')
	<h2 class="text-2xl font-bold text-center mb-4">Registro</h2>
	
	<div class="w-full h-full px-1 md:px-4 pt-4">
		<div class="w-full bg-gray-200 rounded-full h-5 dark:bg-gray-400">
			<div id="progress_bar" class="bg-[#6D1528] h-5 rounded-full text-center text-[#c2995c] font-bold pb-5"
				style="width: 0%">0%</div>
		</div>
		
		<form method="POST" action="{{ route('make.registro') }}" enctype="multipart/form-data" id="registerForm" class="flex flex-row w-full h-full gap-2 md:px-5 max-w-screen">
			@csrf
			
			<div class="flex flex-col flex-0 mt-8">
				<div class="w-full">
					<ul id="indicatorsSection" class="w-full text-lg space-y-2">
					</ul>
				</div>
			</div>
			
			<div class="flex-col flex-1 md:flex-4 h-full w-full relative py-2">
				<div class="block h-full w-full overflow-auto pb-26 ocultar-scroll" id="stepsForm">
					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4" data-step="1">
						<legend class="text-lg font-medium px-2">Datos de Acceso</legend>
						<div class="mb-4">
							<label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
							<input type="email" name="email" id="email" placeholder="Email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
							<input type="password" name="password" id="password" placeholder="Contraseña" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
							<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
					</fieldset>
					
					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4" data-step="2">
						<legend class="text-lg font-medium px-2">Datos Personales</legend>
						<div class="mb-4">
							<label for="curp" class="block text-sm font-medium text-gray-700 mb-1">CURP</label>
							<input type="text" name="curp" id="curp" placeholder="CURP" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="nombres" class="block text-sm font-medium text-gray-700 mb-1">Nombres</label>
							<input type="text" name="nombres" id="nombres" placeholder="Nombres" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="apellido_paterno" class="block text-sm font-medium text-gray-700 mb-1">Apellido Paterno</label>
							<input type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="apellido_materno" class="block text-sm font-medium text-gray-700 mb-1">Apellido Materno</label>
							<input type="text" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label>
							<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="sexo" class="block text-sm font-medium text-gray-700 mb-1">Sexo</label>
							<select name="sexo" id="sexo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
								<option value="Hombre">Hombre</option>
								<option value="Mujer">Mujer</option>
							</select>
						</div>
					</fieldset>
					
					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4" data-step="3">
						<legend class="text-lg font-medium px-2">Ubicación y Contacto</legend>
						<div class="mb-4">
							<label for="estado_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Estado de Nacimiento</label>
							<input type="text" name="estado_nacimiento" id="estado_nacimiento" placeholder="Estado de Nacimiento" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="municipio_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Municipio de Nacimiento</label>
							<input type="text" name="municipio_nacimiento" id="municipio_nacimiento" placeholder="Municipio de Nacimiento" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
							<input type="tel" name="telefono" id="telefono" placeholder="Teléfono" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="mayahablante" class="flex items-center">
								<input type="hidden" name="mayahablante" value="0">
								<input type="checkbox" name="mayahablante" id="mayahablante" value="1" class="mr-2">
								<span>¿Habla Maya?</span>
							</label>
						</div>
					</fieldset>
					
					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4" data-step="4">
						<legend class="text-lg font-medium px-2">Documentos</legend>
						<div class="mb-4">
							<label for="acta_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Acta de Nacimiento</label>
							<input type="file" name="acta_nacimiento" id="acta_nacimiento" accept="application/pdf,image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="curp_file" class="block text-sm font-medium text-gray-700 mb-1">CURP</label>
							<input type="file" name="curp_file" id="curp_file" accept="application/pdf,image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
						</div>
						<div class="mb-4">
							<label for="comprobante_domicilio" class="block text-sm font-medium text-gray-700 mb-1">Comprobante de Domicilio</label>
							<input type="file" name="comprobante_domicilio" id="comprobante_domicilio" accept="application/pdf,image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
						</div>
						<div class="mb-4">
							<label for="foto_perfil" class="block text-sm font-medium text-gray-700 mb-1">Foto de Perfil</label>
							<input type="file" name="foto_perfil" id="foto_perfil" accept="application/pdf,image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]" required>
						</div>
						<div class="mb-4">
							<label for="ine" class="block text-sm font-medium text-gray-700 mb-1">INE</label>
							<input type="file" name="ine" id="ine" accept="application/pdf,image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
						</div>
					</fieldset>
				</div>
				
				<div class="w-full px-3 sticky bottom-0 bg-white flex justify-between py-2">
					<button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-[#6D1528]" id="prevBtn">Regresar</button>
					<button type="button" class="px-4 py-2 bg-[#6D1528] text-white rounded-md hover:bg-[#9e2b44] focus:outline-none focus:ring-2 focus:bg-[#9e2b44]" id="nextBtn">Continuar</button>
				</div>
			</div>
		</form>
	</div>
	
	<div class="mt-4 text-center">
		<a href="/login" class="text-[#6D1528] hover:underline">¿Ya tienes cuenta? Inicia Sesión</a>
	</div>
@endsection

@section('scripts')
<script type="module">
	import { MultiStepForm } from '/js/register/navigateForm.js'
	document.addEventListener('DOMContentLoaded', function() {
		const form = new MultiStepForm();
	});
</script>
@endsection