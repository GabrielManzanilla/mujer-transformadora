@extends('layouts.base')
@section('content')
	<div class="w-full h-full px-4 pt-4">

		<div class="w-full bg-gray-200 rounded-full h-5 dark:bg-gray-400">
			<div id="progress_bar" class="bg-[#6D1528] h-5 rounded-full text-center text-[#c2995c] font-bold pb-5"
				style="width: 0%">0%</div>
		</div>
		<form action="" id="registerForm" class="flex flex-row w-full h-full gap-2 px-5 ">
			<div class="flex flex-col flex-1 mt-8">
				<div class="w-full">
					<ul id="indicatorsSection" class="w-full text-lg space-y-2">
					</ul>
				</div>
			</div>
			<div class="flex-col flex-6 md:flex-3 h-full w-full relative py-2 ">
				<div class="block h-full w-full overflow-auto pb-26 ocultar-scroll" id="stepsForm">
					<fieldset class="step hidden border border-gray-300 p-2 rounded-lg mb-4" data-step="1">
						<legend class="text-lg font-medium px-2">Datos Personales</legend>
						<div class="mb-4">
							<label for="curp_usuario" class="block text-sm font-medium text-gray-700 mb-1">CURP</label>
							<div class="flex">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="curp_usuario" aria-describedby="curpHelp" required>
								<button type="button"
									class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-r-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="search_curp_btn">Buscar</button>
							</div>
							<div id="curpHelp" class="mt-1 text-sm text-gray-500">Proporcione el curp para realizar la busqueda
							</div>
						</div>
						<div class="mb-4">
							<label for="apellido_paterno" class="block text-sm font-medium text-gray-700 mb-1">Nombre
								Completo</label>
							<div class="flex space-x-2">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="apellido_paterno" placeholder="Apellido Paterno">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="apellido_materno" placeholder="Apellido Materno">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="nombres_usuario" placeholder="Nombre(s)">
							</div>
						</div>
						<div class="mb-4">
							<label for="fecha_nacimiento_usuario" class="block text-sm font-medium text-gray-700 mb-1">Lugar de
								Nacimiento</label>
							<div class="flex space-x-2">
								<select
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="municipio_nacimiento">
									<option selected>Municipio</option>
								</select>
								<select
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="entidad_nacimiento">
									<option selected>Estado</option>
								</select>
								<input
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									type="date" name="fecha_nacimiento_usuario" id="fecha_nacimiento_usuario">
							</div>
						</div>
						<div class="mb-4">
							<label for="sexo_usuario" class="block text-sm font-medium text-gray-700 mb-1">Seleccione su
								Sexo</label>
							<select
								class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								id="sexo_usuario">
								<option selected>Sexo</option>
								<option value="Mujer">Mujer</option>
								<option value="Hombre">Hombre</option>
							</select>
							<div class="mt-2 flex items-center">
								<input class="h-4 w-4 text-[#6D1528] focus:ring-[#6D1528] border-gray-300 rounded" type="checkbox"
									id="mayahablante" value="True">
								<label for="mayahablante" class="ml-2 block text-sm text-gray-700">Maya hablante</label>
							</div>
							<div class="mt-2 flex items-center space-x-2 flex-row md:flex-row">
								<input type="email" name="email_user" id="email_user"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Email">
								<input type="tel" name="tel_usuario" id="tel_usuario"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Número Telefonico">
							</div>
							<div class="mt-2 flex items-center space-x-2 flex-row md:flex-row">
								<select
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="estado_perfil_usuario">
									<option selected>Estado Perfil</option>
								</select>
								<select
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="estado_candidato">
									<option selected>Candidato</option>
								</select>

							</div>
					</fieldset>

					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4" data-step="2">
						<legend class="text-lg font-medium px-2">Datos Fiscales</legend>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="actividad_economica_usuario" class="block text-sm font-medium text-gray-700 mb-1">Seleccione
									la
									Actividad economica</label>
								<select
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="actividad_economica_usuario">
									<option selected>Actividad Economica</option>
								</select>
							</div>
							<div class="mb-4">
								<label for="regimen" class="block text-sm font-medium text-gray-700 mb-1">Regimen</label>
								<select
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="regimen_fiscal">
									<option selected>Regimen</option>
								</select>
							</div>

						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="nombre_comercial" class="block text-sm font-medium text-gray-700 mb-1">Nombre
									comercial</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="nombre_comercial">
							</div>
							<div class="mb-4">
								<label for="tiempo_ejerciendo" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Inicio
									Labores</label>
								<input type="date"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="tiempo_ejerciendo">
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="registro_imss_usuario" class="block text-sm font-medium text-gray-700 mb-1">Registro
									patronal
									(IMSS)</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="registro_imss_usuario">
							</div>
							<div class="mb-4">
								<label for="registro_affy_usuario" class="block text-sm font-medium text-gray-700 mb-1">Registro
									estatal de
									contribuyentes (AAFY)</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="registro_affy_usuario">
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="registro_sat_usuario" class="block text-sm font-medium text-gray-700 mb-1">Registro
									federal de
									contribuyentes (RFC)</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="registro_sat_usuario">
							</div>
							<div class="mb-4">
								<label for="razon_social_usuario" class="block text-sm font-medium text-gray-700 mb-1">Razon
									Social</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="razon_social_usuario">
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="numero_empleados" class="block text-sm font-medium text-gray-700 mb-1">Numero de
									empleados</label>
								<input type="number"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="numero_empleados">
							</div>
							<div class="mb-4">
								<label for="registro_impi_usuario" class="block text-sm font-medium text-gray-700 mb-1">Registro de
									marca
									(IMPI)</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="registro_impi_usuario">
							</div>
						</div>

						<div class="mb-4">
							<label for="nombre_registro" class="block text-sm font-medium text-gray-700 mb-1">Añadir registros
								adicionales</label>
							<div class="flex space-x-2">
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
							<table class="min-w-full divide-y divide-gray-200" id="registros_fiscales_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Nombre Registro</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Clave Registro</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="fila_mensaje_registros_fiscales_table">
										<td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											registros
											agregados</td>
									</tr>
								</tbody>
							</table>
						</div>

					</fieldset>

					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4 " data-step="3">
						<legend class="text-lg font-medium px-2">Domicilio(s)</legend>
						<div class="mb-4">
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
							<div class="flex space-x-2">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="direccion_usuario" placeholder="Calle, Numero y Cruzamientos">
								<select
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="estado_usuario">
									<option selected>Estado</option>
								</select>
								<select
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="municipio_usuario">
									<option selected>Municipio</option>
								</select>
								<select
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="localidad_usuario">
									<option selected>Localidad</option>
								</select>
								<button type="button"
									class="px-4 py-2 border border-[#6D1528] bg-white text-[#6D1528] rounded-md hover:bg-[#9e2b4428] focus:outline-none focus:ring-2 focus:ring-[#9e2b44]"
									id="add_address">Añadir</button>
							</div>
						</div>
						<h5 class="text-lg font-medium mb-2">Direcciones</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<table class="min-w-full divide-y divide-gray-200" id="address_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Direccion</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Colonia</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Municipio</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Estado</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="fila_mensaje_address_table">
										<td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											direcciones
											agregadas</td>
									</tr>
								</tbody>
							</table>
						</div>
					</fieldset>

					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4" data-step="4">
						<legend class="text-lg font-medium px-2">Produccion y Ventas</legend>
						<div class="mb-4 flex space-x-2">
							<input type="text"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								id="nombre_producto" placeholder="Producto">
							<input type="text"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								id="nombre_producto" placeholder="Descripción del producto">
						</div>
						<div class="mb-4 flex space-x-2">
							<input type="text"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								id="produccion_mensual" placeholder="Produccion al mes">
							<input type="text"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								id="ventas_mensuales" placeholder="Ventas mensuales">
							<input type="text"
								class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								id="ventas_anuales" placeholder="Ventas anuales">
							<button type="button"
								class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
								id="add_producto">Añadir</button>
						</div>
						<h5 class="text-lg font-medium mb-2">Produccion</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<table class="min-w-full divide-y divide-gray-200" id="productos_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Producto</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-wrap">
											Descripcion</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Produccion al mes</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Ventas mensuales</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Ventas anuales</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="fila_mensaje_productos_table">
										<td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											productos
											agregados</td>
									</tr>
								</tbody>
							</table>
						</div>

					</fieldset>

					<fieldset class="step hidden border border-gray-300 p-4 rounded-lg mb-4" data-step="5">
						<legend class="text-lg font-medium px-2">Medios Digitales</legend>
						<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
							<div class="mb-4">
								<label for="facebook_usuario" class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="facebook_usuario" placeholder="Facebook">
							</div>
							<div class="mb-4">
								<label for="facebook_empresarial" class="block text-sm font-medium text-gray-700 mb-1">Facebook
									Empresarial</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="facebook_empresarial" placeholder="Facebook Empresarial">
							</div>
							<div class="mb-4">
								<label for="facebook_marketplace" class="block text-sm font-medium text-gray-700 mb-1">Marketplace</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="facebook_marketplace" placeholder="Marketplace">
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="pagina_web" class="block text-sm font-medium text-gray-700 mb-1">Pagina WEB</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="pagina_web" placeholder="Pagina WEB">
							</div>
							<div class="mb-4">
								<label for="whatsapp_empresarial" class="block text-sm font-medium text-gray-700 mb-1">Whatsapp
									Empresarial</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="whatsapp_empresarial" placeholder="Whatsapp Empresarial">
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="mercado_libre" class="block text-sm font-medium text-gray-700 mb-1">Mercado Libre</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="mercado_libre" placeholder="Mercado Libre">
							</div>
							<div class="mb-4">
								<label for="mercado_pago" class="block text-sm font-medium text-gray-700 mb-1">Mercado Pago</label>
								<input type="text"
									class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="mercado_pago" placeholder="Mercado Pago">
							</div>
						</div>
						<div class="mb-4">
							<label for="nombre_medio_adicional" class="block text-sm font-medium text-gray-700 mb-1">Medio
								Adicional</label>
							<div class="flex space-x-2">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="nombre_medio_adicional" placeholder="Medio digital">
								<input type="text"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="medio_adicional_registro" placeholder="Nombre en el medio">
								<button type="button"
									class="px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="add_medio_digital">Añadir</button>
							</div>
						</div>
						<h5 class="text-lg font-medium mb-2">Otros Medios Digitales</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<table class="min-w-full divide-y divide-gray-200" id="medios_digitales_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Medio Digital</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Nombre del medio</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="fila_mensaje_medios_digitales_table">
										<td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											medios
											agregados</td>
									</tr>
								</tbody>
							</table>
						</div>
					</fieldset>
					<fieldset class="step border border-gray-300 p-4 rounded-lg mb-4" data-step="6">
						<legend class="text-lg font-medium px-2">Carga de Archivos</legend>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="ine_file" class="block text-sm font-medium text-gray-700 mb-1">INE</label>
								<div class="flex">
									<input type="file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										id="ine_file" aria-describedby="ine_file">

								</div>
							</div>
							<div class="mb-4">
								<label for="acta_nacimiento_file" class="block text-sm font-medium text-gray-700 mb-1">Acta de
									Nacimiento</label>
								<div class="flex">
									<input type="file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										id="acta_nacimiento_file">
								</div>
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="comprobante_domicilio_file" class="block text-sm font-medium text-gray-700 mb-1">Comprobante
									de
									Domicilio</label>
								<div class="flex">
									<input type="file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										id="comprobante_domicilio_file">
								</div>
							</div>
							<div class="mb-4">
								<label for="cif_file" class="block text-sm font-medium text-gray-700 mb-1">Constancia de Situacion
									Fiscal
									(CIF)</label>
								<div class="flex">
									<input type="file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										id="cif_file">
								</div>
							</div>
						</div>
						<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
							<div class="mb-4">
								<label for="affy_file" class="block text-sm font-medium text-gray-700 mb-1">Registro AFFY</label>
								<div class="flex">
									<input type="file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										id="affy_file">
								</div>
							</div>
							<div class="mb-4">
								<label for="impi_file" class="block text-sm font-medium text-gray-700 mb-1">Registro IMPI</label>
								<div class="flex">
									<input type="file"
										class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
										id="impi_file">
								</div>
							</div>
						</div>
						<div class="mb-4">
							<label for="imss_file" class="block text-sm font-medium text-gray-700 mb-1">Registro IMSS</label>
							<div class="flex">
								<input type="file"
									class="w-full px-3 py-2 border border-gray-300 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="imss_file">
							</div>
						</div>
						<div class="mb-4">
							<label for="denominacion_documento_adicional" class="block text-sm font-medium text-gray-700 mb-1">Registros
								Adicionales</label>
							<div class="flex space-x-2">
								<input type="text" name="registro_adicional" id="denominacion_documento_adicional"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									placeholder="Nombre del registro">
								<input type="file"
									class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									id="nombre_documento_adicional" placeholder="Documento">
								<button
									class="px-4 py-2 border border-[#6D1528] bg-white text-[#6D1528] rounded-md hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-[#6D1528]"
									type="button" id="add_documento_adicional">Añadir</button>
							</div>
						</div>
						<h5 class="text-lg font-medium mb-2">Documentos Adicionales</h5>
						<div class="mb-4 w-full border border-gray-300 rounded-lg p-2 pt-3">
							<table class="min-w-full divide-y divide-gray-200" id="documentos_adicionales_table">
								<thead class="bg-gray-50">
									<tr>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Entidad</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Registro</th>
										<th scope="col"
											class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
											Opciones</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">
									<tr id="fila_mensaje_documentos_adicionales_table">
										<td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">No hay
											productos
											agregados</td>
									</tr>
								</tbody>
							</table>
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
	<!-- <script src="{{ asset('js/register.js') }}"></script>
		<script>
				document.addEventListener('DOMContentLoaded', () => {
						const form = new MultiStepForm();
				});
		</script> -->
@endsection