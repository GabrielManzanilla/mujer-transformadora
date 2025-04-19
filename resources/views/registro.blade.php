@extends('layouts.base')
@section('content')
	<div class="w-full h-full px-1 md:px-4 pt-4">

		<div class="w-full bg-gray-200 rounded-full h-5 dark:bg-gray-400">
			<div id="progress_bar" class="bg-[#6D1528] h-5 rounded-full text-center text-[#c2995c] font-bold pb-5"
				style="width: 0%">0%</div>
		</div>
		<form form action="{{ route('register.store') }}" method="post" id="registerForm" class="flex flex-row w-full h-full gap-2 md:px-5 max-w-screen">
			@csrf
			<div class="flex flex-col flex-0 mt-8">
				<div class="w-full">
					<ul id="indicatorsSection" class="w-full text-lg space-y-2">
					</ul>
				</div>
			</div>
			<div class="flex-col flex-1 md:flex-4 h-full w-full relative py-2 ">
				<div class="block h-full w-full overflow-auto pb-26 ocultar-scroll" id="stepsForm">
					<fieldset class="step hidden border border-gray-300 p-2 rounded-lg mb-4" data-step="1">
						<legend class="text-lg font-medium px-2">Datos Personales</legend>
						<div class="mb-4">
							<label for="curp_usuario" class="block text-sm font-medium text-gray-700 mb-1">CURP</label>
							<div class="flex">
								<input type="text" name="curp_usuario" id="curp_usuario"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									required>
								<button type="button"
									class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-r-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="search_curp_btn">Buscar</button>
							</div>
							<div id="curpHelp" class="mt-1 text-sm text-gray-500">Proporcione el curp para realizar la busqueda
							</div>
						</div>
						<div class="mb-4">
							<label class="block text-sm font-medium text-gray-700 mb-1">Nombre
								Completo</label>
							<div class="flex gap-2 flex-wrap">
								<input type="text" name="apellido_paterno" id="apellido_paterno"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Apellido Paterno">
								<input type="text" name="apellido_materno" id="apellido_materno"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Apellido Materno">
								<input type="text" name="nombres_usuario" id="nombres_usuario"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Nombre(s)">
							</div>
						</div>
						<div class="mb-4">
							<label for="fecha_nacimiento_usuario" class="block text-sm font-medium text-gray-700 mb-1">Lugar de
								Nacimiento</label>
							<div class="flex gap-2 flex-wrap">
								<select name="municipio_nacimiento" id="municipio_nacimiento"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
									<option selected>Municipio</option>
								</select>
								<select name="estado_nacimiento" id="estado_nacimiento"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
									<option selected>Estado</option>
								</select>
								<input name="fecha_nacimiento_usuario" id="fecha_nacimiento_usuario"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									type="date">
							</div>
						</div>
						<div class="mb-4">
							<label for="sexo_usuario" class="block text-sm font-medium text-gray-700 mb-1">Seleccione su
								Sexo</label>
							<select name="sexo_usuario" id="sexo_usuario"
								class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
								<option selected>Sexo</option>
								<option value="Mujer">Mujer</option>
								<option value="Hombre">Hombre</option>
							</select>
							<div class="mt-2 flex items-center">
								<input class="h-4 w-4 text-[#6D1528] focus:ring-[#6D1528] border-gray-300 rounded" type="checkbox"
									id="mayahablante" name="mayahablante" value="True">
								<label for="mayahablante" class="ml-2 block text-sm text-gray-700">Maya hablante</label>
							</div>
							<div class="flex gap-2 flex-wrap mt-2">
								<input type="email_usuario" name="email_usuario" id="email_user"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Email">
								<input type="tel" name="telefono_usuario" id="tel_usuario"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Número Telefonico">
							</div>
							<div class="mt-2 flex gap-2 flex-wrap">
								<select id="estado_perfil_usuario" name="estado_perfil_usuario"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
									<option selected>Estado Perfil</option>
								</select>
								<select id="estado_candidato" name="estado_candidato"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
									<option selected>Candidato</option>
								</select>

							</div>
					</fieldset>

					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4 overflow-x-hidden" data-step="2">
						<legend class="text-lg font-medium px-2">Datos Fiscales</legend>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 md:flex-1">
								<label for="actividad_economica" class="block text-sm font-medium text-gray-700 mb-1">Seleccione
									la
									Actividad economica</label>
								<select id="actividad_economica" name="actividad_economica_usuario"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
									<option selected>Actividad Economica</option>
								</select>
							</div>
							<div class="mb-4 md:flex-1">
								<label for="regimen" class="block text-sm font-medium text-gray-700 mb-1">Regimen</label>
								<select id="regimen_fiscal" name="regimen_fiscal"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
									<option selected>Regimen</option>
								</select>
							</div>

						</div>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 md:flex-1">
								<label for="nombre_comercial" class="block text-sm font-medium text-gray-700 mb-1">Nombre
									comercial</label>
								<input type="text" id="nombre_comercial" name="nombre_comercial"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
							</div>
							<div class="mb-4 md:flex-1">
								<label for="tiempo_ejerciendo" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Inicio
									Labores</label>
								<input type="date" id="tiempo_ejerciendo" name="tiempo_ejerciendo"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]">
							</div>
						</div>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 md:flex-1">
								<label for="registro_imss" class="block text-sm font-medium text-gray-700 mb-1">Registro
									patronal
									(IMSS)</label>
								<input type="text" id="registro_imss" name="registro_imss"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
							</div>
							<div class="mb-4 md:flex-1">
								<label for="registro_affy" class="block text-sm font-medium text-gray-700 mb-1">Registro
									estatal de
									contribuyentes (AAFY)</label>
								<input type="text" id="registro_affy" name="registro_affy"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
							</div>
						</div>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 md:flex-1">
								<label for="registro_sat_usuario" class="block text-sm font-medium text-gray-700 mb-1">Registro
									federal de
									contribuyentes (RFC)</label>
								<input type="text" id="registro_sat" name="registro_sat"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
							</div>
							<div class="mb-4 md:flex-1">
								<label for="razon_social" class="block text-sm font-medium text-gray-700 mb-1">Razon
									Social</label>
								<input type="text" id="razon_social" name="razon_social"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
							</div>
						</div>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 md:flex-1">
								<label for="numero_empleados" class="block text-sm font-medium text-gray-700 mb-1">Numero de
									empleados</label>
								<input type="number" id="numero_empleados" name="numero_empleados"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
							</div>
							<div class="mb-4 md:flex-1">
								<label for="registro_impi" class="block text-sm font-medium text-gray-700 mb-1">Registro de
									marca
									(IMPI)</label>
								<input type="text" id="registro_impi" name="registro_impi"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
							</div>
						</div>
						<div class="mb-4">
							<!-- PENDIENTE REVISAR ESTA TABLA -->
							<label for="nombre_registro" class="block text-sm font-medium text-gray-700 mb-1">Añadir registros
								adicionales</label>
							<div class="flex flex-col w-full md:flex-row gap-2">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="nombre_registro" placeholder="Nombre del registro">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="clave_registro" placeholder="Clave del registro">
								<button type="button"
									class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="add_registro_fiscal">Añadir</button>
							</div>
						</div>
						<h5 class="text-lg font-medium mb-2">Registros Adicionales</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<table class="min-w-full divide-y divide-gray-200 w-78 md:w-full overflow-x-auto" id="registros_fiscales_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Nombre Registro</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Clave Registro</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="message_registros_fiscales_table_empty">
										<td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											datos disponibles</td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="registros_adicionales" id="registros_json">
						</div>

					</fieldset>

					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4 " data-step="3">
						<legend class="text-lg font-medium px-2">Domicilio(s)</legend>
						<div class="mb-4 ">
							<div class="mb-4">
								<label for="codigo_postal" class="block text-sm font-medium text-gray-700 mb-1">Codigo Postal</label>
								<div class="flex">
									<input type="text"
										class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										id="codigo_postal" placeholder="Codigo Postal">
									<button type="button"
										class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-r-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										id="search_cp_btn">Buscar</button>
								</div>
							</div>
							<div class="flex flex-col w-full lg:flex-row gap-2">
								<input type="text" id="direccion" name="direccion"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Calle, Numero y Cruzamientos">
								<select id="estado_domiclio" name="estado_domiclio"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
									<option selected value="0">Estado</option>
								</select>
								<select id="municipio_domicilio" name="municipio_domicilio"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
									<option selected value="0">Municipio</option>
								</select>
								<select
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="localidad_domicilio" name="localidad_domicilio">
									<option selected value="0">Localidad</option>
								</select>
								<button type="button"
									class="px-4 py-2 border border-[#6D1528] bg-white text-[#6D1528] rounded-md hover:bg-[#9e2b4428] focus:outline-none focus:ring-2 focus:ring-[#9e2b44]"
									id="add_domicilio">Añadir</button>
							</div>
						</div>	
						<h5 class="text-lg font-medium mb-2">Direcciones</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<!-- REVISAR TABLA DE DOMICILIOS -->
							<table class="min-w-full divide-y divide-gray-200 w-76 overflow-x-auto" id="domicilios_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Direccion</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Colonia</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Municipio</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Estado</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="message_domicilios_table_empty">
										<td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											datos disponibles</td>
									</tr> 
								</tbody>
							</table>
							<input type="hidden" name="domicilios_json" id="domicilios_json">
						</div>
					</fieldset>

					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4 overflow-x-hidden" data-step="4">
						<legend class="text-lg font-medium px-2">Produccion y Ventas</legend>
						<div class="flex flex-col w-full flex-wrap md:flex-row gap-2">
							<input type="text" id="nombre_producto" name="nombre_producto"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								placeholder="Producto">
							<input type="text" id="descripcion_producto" name="descripcion_producto"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								placeholder="Descripción del producto">
						</div>
						<div class="flex flex-col w-full flex-wrap md:flex-row gap-2 mt-2">
							<input type="text" id="produccion_mensual" name="produccion_mensual"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								placeholder="Produccion al mes">
							<input type="text" id="ventas_mensuales" name="ventas_mensuales"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								placeholder="Ventas mensuales">
							<input type="text" id="ventas_anuales" name="ventas_anuales"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								 placeholder="Ventas anuales">
							<button type="button"
								class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								id="add_producto">Añadir</button>
						</div>
						<h5 class="text-lg font-medium mb-2">Produccion</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<!-- REVISAR TABLA DE PRODUCTOS -->
							<table class="min-w-full divide-y divide-gray-200 w-76 overflow-x-auto" id="productos_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Producto</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider text-wrap">
											Descripcion</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Produccion al mes</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Ventas mensuales</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Ventas anuales</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="message_productos_table_empty">
										<td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											datos</td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="productos_json" id="productos_json">
						</div>

					</fieldset>

					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4" data-step="5">
						<legend class="text-lg font-medium px-2">Medios Digitales</legend>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 md:flex-1">
								<label for="facebook_usuario" class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
								<input type="text" id="facebook_usuario" name="facebook_usuario"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Facebook">
							</div>
							<div class="mb-4 md:flex-1">
								<label for="facebook_empresarial" class="block text-sm font-medium text-gray-700 mb-1">Facebook
									Empresarial</label>
								<input type="text" id="facebook_empresarial" name="facebook_empresarial"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Facebook Empresarial">
							</div>
							<div class="mb-4 md:flex-1">
								<label for="facebook_marketplace" class="block text-sm font-medium text-gray-700 mb-1">Marketplace</label>
								<input type="text" id="facebook_marketplace" name="facebook_marketplace"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Marketplace">
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="pagina_web" class="block text-sm font-medium text-gray-700 mb-1">Pagina WEB</label>
								<input type="text" id="pagina_web" name="pagina_web"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Pagina WEB">
							</div>
							<div class="mb-4">
								<label for="whatsapp_empresarial" class="block text-sm font-medium text-gray-700 mb-1">Whatsapp
									Empresarial</label>
								<input type="text" id="whatsapp_empresarial" name="whatsapp_empresarial"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Whatsapp Empresarial">
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4"> 
								<label for="mercado_libre" class="block text-sm font-medium text-gray-700 mb-1">Mercado Libre</label>
								<input type="text" id="mercado_libre" name="mercado_libre"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Mercado Libre">
							</div>
							<div class="mb-4">
								<label for="mercado_pago" class="block text-sm font-medium text-gray-700 mb-1">Mercado Pago</label>
								<input type="text" id="mercado_pago" name="mercado_pago"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Mercado Pago">
							</div>
						</div>
						<div class="mb-4">
							<label for="nombre_medio_adicional" class="block text-sm font-medium text-gray-700 mb-1">Medio
								Adicional</label>
							<div class="flex flex-col w-full md:flex-row gap-2">
								<input type="text" id="nombre_medio_adicional" name="nombre_medio_adicional"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Medio digital">
								<input type="text" id="medio_adicional_registro" name="medio_adicional_registro"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									 placeholder="Nombre en el medio">
								<button type="button"
									class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="add_medio_digital">Añadir</button>
							</div>
						</div>
						<h5 class="text-lg font-medium mb-2">Otros Medios Digitales</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<!-- REVISAR TABLA DE MEDIOS DIGITALES -->
							<table class="min-w-full divide-y divide-gray-200 w-76 overflow-x-auto" id="medios_digitales_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Medio Digital</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Nombre del medio</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="message_medios_digitales_table_empty">
										<td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											datos disponibles</td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="medios_digitales_json" id="medios_digitales_json">
						</div>
					</fieldset>

					<fieldset class="step border border-gray-300 p-4 rounded-lg mb-4" data-step="6">
						<legend class="text-lg font-medium px-2">Carga de Archivos</legend>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 flex-1">
								<label for="ine_file" class="block text-sm font-medium text-gray-700 mb-1">INE</label>
								<div class="flex">
									<input type="file" id="ine_file" name="ine_file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										>

								</div>
							</div>
							<div class="mb-4 flex-1">
								<label for="acta_nacimiento_file" class="block text-sm font-medium text-gray-700 mb-1">Acta de
									Nacimiento</label>
								<div class="flex">
									<input type="file" id="acta_nacimiento_file" name="acta_nacimiento_file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										>
								</div>
							</div>
						</div>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 flex-1">
								<label for="comprobante_domicilio_file" class="block text-sm font-medium text-gray-700 mb-1">Comprobante
									de
									Domicilio</label>
								<div class="flex">
									<input type="file" id="comprobante_domicilio_file" name="comprobante_domicilio_file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										>
								</div>
							</div>
							<div class="mb-4 flex-1">
								<label for="cif_file" class="block text-sm font-medium text-gray-700 mb-1">Constancia de Situacion
									Fiscal
									(CIF)</label>
								<div class="flex">
									<input type="file" id="cif_file" name="cif_file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										>
								</div>
							</div>
						</div>
						<div class="flex flex-col w-full md:flex-row gap-2">
							<div class="mb-4 flex-1">
								<label for="affy_file" class="block text-sm font-medium text-gray-700 mb-1">Registro AFFY</label>
								<div class="flex">
									<input type="file" id="affy_file" name="affy_file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										>
								</div>
							</div>
							<div class="mb-4 flex-1">
								<label for="impi_file" class="block text-sm font-medium text-gray-700 mb-1">Registro IMPI</label>
								<div class="flex">
									<input type="file" id="impi_file" name="impi_file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										>
								</div>
							</div>
						</div>
						<div class="mb-4">
							<label for="imss_file" class="block text-sm font-medium text-gray-700 mb-1">Registro IMSS</label>
							<div class="flex">
								<input type="file" id="imss_file" name="imss_file"
									class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									>
							</div>
						</div>
						<div class="mb-4">
							<label for="denominacion_documento_adicional" class="block text-sm font-medium text-gray-700 mb-1">Registros
								Adicionales</label>
							<div class="flex flex-col w-full md:flex-row gap-2">
								<input type="text" name="denominacion_documento_adicional" id="denominacion_documento_adicional"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Nombre del registro">
								<input type="file"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="nombre_documento_adicional" name="nombre_documento_adicional" placeholder="Documento">
								<button
									class="px-4 py-2 border border-[#6D1528] bg-white text-[#6D1528] rounded-md hover:bg-[#6d15288f] focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									type="button" id="add_documento_adicional">Añadir</button>
							</div>
						</div>
						<h5 class="text-lg font-medium mb-2">Documentos Adicionales</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<!-- REVISAR TABLA DE DOCUMENTOS ADICIONALES -->
							<table class="min-w-full divide-y divide-gray-200 w-full overflow-x-auto" id="documentos_adicionales_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Entidad</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Registro</th>
										<th scope="col"
											class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="message_documentos_adicionales_table_empty">
										<td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											datos disponibles</td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="documentos_adicionales_json" id="documentos_adicionales_json">
						</div>
					</fieldset>
				</div>
				<div class="w-full px-3 sticky bottom-0 bg-white flex justify-between py-2">
					<button type="button"
						class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-[#6D1528] "
						id="prevBtn">Regresar</button>
					<button type="button"
						class="px-4 py-2 bg-[#6D1528] text-white rounded-md hover:bg-[#9e2b44] focus:outline-none focus:ring-2 focus:bg-[#9e2b44] "
						id="nextBtn">Continuar</button>
				</div>
			</div>
		</form>

	</div>



@endsection