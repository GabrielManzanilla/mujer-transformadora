<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

	<style>
		fieldset{
			display: none;
		}
		fieldset.active{
			display: block;
		}
	</style>
</head>
<body>
	<?php require __DIR__ . '/../components/navbar.php'; ?>
	<main class="mt-5 pt-3 container">
		<div class="mt-5 container-fluid">
			<div class="progress mb-4 ">
				<div id="progressBar" title="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
			</div>

			<form action="" id="registerForm">
				<fieldset class="active"> 
					<legend>Datos Personales</legend>
					<div class="mb-3">
						<label for="curp_usuario" class="form-label">CURP</label>
						<div class="input-group">
							<input type="text" class="form-control" id="curp_usuario" aria-describedby="curpHelp" required>
							<button type="button" class="btn btn-outline-secondary" id="search_curp_btn">Buscar</button>
						</div>
						<div id="curpHelp" class="form-text">Proporcione el curp para realizar la busqueda</div>
					</div>
					<div class="mb-3 wrapper">
						<label for="apellido_paterno" class="form-label">Nombre Completo</label>
						<div class="input-group">
							<input type="text" class="form-control" id="apellido_paterno" placeholder="Apellido Paterno">
							<input type="text" class="form-control" id="apellido_materno" placeholder="Apellido Materno">
							<input type="text" class="form-control" id="nombres_usuario" placeholder="Nombre(s)">
						</div>
					</div>
					<div class="mb-3">
						<label for="fecha_nacimiento_usuario">Lugar de Nacimiento</label>
						<div class="input-group">
							<select class="form-select" id="municipio_nacimiento_usuario" aria-label="Default select example">
								<option selected>Municipio</option>
							</select>
							<select class="form-select" id="entidad_nacimiento_usuario" aria-label="Default select example">
								<option selected>Estado</option>
							</select>
							<input class="form-control" type="date" name="fecha_nacimiento_usuario" id="fecha_nacimiento_usuario">
						</div>
					</div>
					<div class="mb-3">
						<label for="sexo_usuario">Seleccione su Sexo</label>
						<select class="form-select" id="sexo_usuario" aria-label="Default select example">
							<option selected>Sexo</option>
							<option value="Mujer">Mujer</option>
							<option value="Hombre">Hombre</option>
						</select>
						<input class="form-check-input" type="checkbox" id="mayahablante" value="True" aria-label="Checkbox for following text input">
						<label for="mayahablante" class="form-label">Maya hablante</label>
					</div>
					<div class="d-flex justify-content-end px-3">
						<button type="button" class="btn btn-primary next">Continuar</button>
					</div>
				</fieldset>
				<fieldset>
					<legend class="form-label">Domicilio(s)</legend>
						<div class="mb-3">
							<div class="mb-3">
								<label for="codigo_postal" class="form-label">Codigo Postal</label>
								<div class="input-group">
									<input type="text" class="form-control" id="codigo_postal" placeholder="Codigo Postal">
									<button type="button" class="btn btn-outline-secondary" id="search_cp_btn">Buscar</button>
								</div>
							</div>
							<div class="input-group">
								<input type="text" class="form-control" id="direccion_usuario" placeholder="Calle, Numero y Cruzamientos">
								<select class="form-select" id="estado_usuario" aria-label="Default select example">
									<option selected>Estado</option>
								</select>
								<select class="form-select" id="municipio_usuario" aria-label="Default select example">
									<option selected>Municipio</option>
								</select>
								<select class="form-select" id="localidad_usuario" aria-label="Default select example">
									<option selected>Localidad</option>
								</select>
								<button type="button" class="btn btn-outline-primary" id="add_address">Añadir</button>
							</div>
						</div>
						<h5>Direcciones</h5>
						<div class="mb-3 w-100 border rounded p-2 pt-3">
							<table class="table table-hover" id="address_table">
								<thead>
									<tr>
										<th scope="col">Direccion</th>
										<th scope="col">Colonia</th>
										<th scope="col">Municipio</th>
										<th scope="col">Estado</th>
										<th scope="col">Opciones</th>
									</tr>
								</thead>
								<tbody>
									<tr id="fila_mensaje_address_table" >
										<td colspan="5" class="text-center">No hay direcciones agregadas</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="d-flex justify-content-between px-3">
							<button type="button" class="btn btn-secondary previous">Regresar</button>
							<button type="button" class="btn btn-primary next">Continuar</button>
						</div>
				</fieldset>
				<fieldset>
					<legend>Datos Fiscales</legend>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="actividad_economica_usuario" class="form-label"> Seleccione la Actividad economica</label>
								<select class="form-select" aria-label="Default select example" id="actividad_economica_usuario">
									<option selected>Actividad Economica</option>
								</select>
						</div>
						<div class="mb-3 col-6">
							<label for="razon_social_usuario" class="form-label">Razon Social</label>
							<input type="text" class="form-control" id="razon_social_usuario">
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="nombre_comercial" class="form-label">Nombre comercial</label>
							<input type="text" class="form-control" id="nombre_comercial">
						</div>
						<div class="mb-3 col-6">
							<label for="tiempo_ejerciendo" class="form-label">Tiempo ejerciendo</label>
							<input type="number" class="form-control" id="tiempo_ejerciendo">
							<div class="form-text">**Tiempo en años</div>
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="establecimiento_usuario" class="form-label"> Establecimiento</label>
								<select class="form-select" aria-label="Default select example" id="establecimiento_usuario">
									<option selected>Direccion</option>
								</select>
						</div>
						<div class="mb-3 col-6">
							<label for="registro_affy_usuario" class="form-label">Registro estatal de contribuyentes (AAFY)</label>
							<input type="text" class="form-control" id="registro_affy_usuario">
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="registro_sat_usuario" class="form-label">Registro federal de contribuyentes (SAT)</label>
							<input type="text" class="form-control" id="registro_sat_usuario" >
						</div>
						<div class="mb-3 col-6">
							<label for="regimen" class="form-label"> Regimen</label>
								<select class="form-select" aria-label="Default select example" id="regimen_fiscal">
									<option selected>Regimen</option>
								</select>
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="numero_empleados" class="form-label">Numero de empleados</label>
							<input type="number" class="form-control" id="numero_empleados">
						</div>
						<div class="mb-3 col-6">
							<label for="registro_impi_usuario" class="form-label">Registro de marca (IMPI)</label>
							<input type="text" class="form-control" id="registro_impi_usuario">
						</div>
					</div>
					<div class="mb-3">
						<label for="registro_imss_usuario" class="form-label">Registro patronal (IMSS)</label>
						<input type="text" class="form-control" id="registro_imss_usuario">
					</div>
					<div class="mb-3">
						<label for="nombre_registro" class="form-label">Añadir registros adicionales</label>
						<div class="input-group">
							<input type="text" class="form-control" id="nombre_registro" placeholder="Nombre del registro">
							<input type="text" class="form-control" id="clave_registro" placeholder="Clave del registro">
							<button type="button" class="btn btn-outline-secondary" id="add_registro_fiscal">Añadir</button>
						</div>
					</div>
					<h5 for="registros_fiscales">Registros Adicionales</h5>
						<div class="mb-3 w-100 border rounded p-2 pt-3">
							<table class="table table-hover" id="registros_fiscales_table">
								<thead>
									<tr>
										<th scope="col">Nombre Registro</th>
										<th scope="col">Clave Registro</th>
										<th scope="col">Opciones</th>
									</tr>
								</thead>
								<tbody>
									<tr id="fila_mensaje_registros_fiscales_table" >
										<td colspan="3" class="text-center">No hay registros agregados</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="d-flex justify-content-between px-3">
							<button type="button" class="btn btn-secondary previous">Regresar</button>
							<button type="button" class="btn btn-primary next">Continuar</button>
						</div>
				</fieldset>
				<fieldset>
					<legend>Produccion y Ventas</legend>
					<div class="mb-3 input-group">
						<input type="text" class="form-control" id="nombre_producto" placeholder="Producto">
						<input type="text" class="form-control" id="produccion_mensual" placeholder="Produccion al mes">
						<input type="text" class="form-control" id="ventas_mensuales" placeholder="Ventas mensuales">
						<input type="text" class="form-control" id="ventas_anuales" placeholder="Ventas anuales">
						<button type="button" class="btn btn-outline-secondary" id="add_producto">Añadir</button>
					</div>
					<h5 for="produccion_ventas_table">Produccion</h5>
						<div class="mb-3 w-100 border rounded p-2 pt-3">
						<table class="table table-hover" id="productos_table">
							<thead>
								<tr>
									<th scope="col">Producto</th>
									<th scope="col">Produccion al mes</th>
									<th scope="col">Ventas mensuales</th>
									<th scope="col">Ventas anuales</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<tr id="fila_mensaje_productos_table" >
									<td colspan="5" class="text-center">No hay productos agregados</td>
								</tr>
							</tbody>
						</table>
						</div>
						<div class="d-flex justify-content-between px-3">
							<button type="button" class="btn btn-secondary previous">Regresar</button>
							<button type="button" class="btn btn-primary next">Continuar</button>
						</div>
				</fieldset>
				<fieldset>
					<legend> Medios Digitales</legend>
					<div class="row">
						<div class="mb-3 col-4">
							<label for="facebook_usuario"  class="form-label">Facebook</label>
							<input type="text" class="form-control" id="facebook_usuario" placeholder="Facebook">
						</div>
						<div class="mb-3 col-4">
							<label for="facebook_empresarial"  class="form-label">Facebook Empresarial</label>
							<input type="text" class="form-control" id="facebook_empresarial" placeholder="Facebook Empresarial">
						</div>
						<div class="mb-3 col-4">
							<label for="facebook_marketplace"  class="form-label">Marketplace</label>
							<input type="text" class="form-control" id="facebook_marketplace" placeholder="Marketplace">
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="pagina_web"  class="form-label">Pagina WEB</label>
							<input type="text" class="form-control" id="pagina_web" placeholder="Pagina WEB">
						</div>
						<div class="mb-3 col-6">
							<label for="whatsapp_empresarial"  class="form-label">Whatsapp Empresarial</label>
							<input type="text" class="form-control" id="whatsapp_empresarial" placeholder="Whatsapp Empresarial">
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="mercado_libre"  class="form-label">Mercado Libre</label>
							<input type="text" class="form-control" id="mercado_libre" placeholder="Mercado Libre">
						</div>
						<div class="mb-3 col-6">
							<label for="mercado_pago"  class="form-label">Mercado Pago</label>
							<input type="text" class="form-control" id="mercado_pago" placeholder="Mercado Pago">
						</div>
					</div>
					<div class="mb-3">
						<label for="nombre_medio_adicional" class="form-label">Medio Adicional</label>
						<div class="input-group">
							<input type="text" class="form-control" id="nombre_medio_adicional" placeholder="Medio digital">
							<input type="text" class="form-control" id="medio_adicional_registro" placeholder="Nombre en el medio">
							<button type="button" class="btn btn-outline-secondary" id="add_medio_digital">Añadir</button>
						</div>
					</div>
					<h5 for="direcciones">Otros Medios Digitales</h5>
					<div class="mb-3 w-100 border rounded p-2 pt-3">
						<table class="table table-hover" id="medios_digitales_table">
							<thead>
								<tr>
									<th scope="col">Medio Digital</th>
									<th scope="col">Nombre del medio</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<tr id="fila_mensaje_medios_digitales_table" >
									<td colspan="3" class="text-center">No hay medios agregados</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="d-flex justify-content-between px-3">
							<button type="button" class="btn btn-secondary previous">Regresar</button>
							<button type="button" class="btn btn-primary next">Continuar</button>
					</div>
				</fieldset>
				<fieldset>
					<legend>Subida de Archivos</legend>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="ine_file" class="form-label">INE</label> 
							<div class="input-group">
								<input type="file" class="form-control" id="ine_file" aria-describedby="ine_file" aria-label="Upload">
							</div>
						</div>
						<div class="mb-3 col-6">
							<label for="acta_nacimiento_file" class="form-label">Acta de Nacimiento</label> 
							<div class="input-group">
								<input type="file" class="form-control" id="acta_nacimiento_file">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="comprobante_domicilio_file" class="form-label">Comprobante de Domicilio</label> 
							<div class="input-group">
								<input type="file" class="form-control" id="comprobante_domicilio_file">
							</div>
						</div>
						<div class="mb-3 col-6">
							<label for="cif_file" class="form-label">Constancia de Situacion Fiscal (CIF)</label> 
							<div class="input-group">
								<input type="file" class="form-control" id="cif_file">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-6">
							<label for="affy_file" class="form-label">Registro AFFY</label> 
							<div class="input-group">
								<input type="file" class="form-control" id="affy_file" >
							</div>
						</div>
						<div class="mb-3 col-6">
							<label for="impi_file" class="form-label">Registro IMPI</label> 
							<div class="input-group">
								<input type="file" class="form-control" id="impi_file" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="mb-3">
							<label for="imss_file" class="form-label">Registro IMSS</label> 
							<div class="input-group">
								<input type="file" class="form-control" id="imss_file" >
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="denominacion_documento_adicional" class="form-label">Registros Adicionales</label> 
						<div class="input-group">
							<input type="text" name="registro_adicional" id="denominacion_documento_adicional" class="form-control" placeholder="Nombre del registro">
							<input type="file" class="form-control" id="nombre_documento_adicional" placeholder="Documento">
							<button class="btn btn-outline-primary" type="button" id="add_documento_adicional">Button</button>
						</div>
					</div>
					<h5 for="direcciones">Otros Medios Digitales</h5>
					<div class="mb-3 w-100 border rounded p-2 pt-3">
						<table class="table table-hover" id="documentos_adicionales_table">
							<thead>
								<tr>
									<th scope="col">Entidad</th>
									<th scope="col">Registro</th>
									<th scope="col">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<tr id="fila_mensaje_documentos_adicionales_table" >
									<td colspan="3" class="text-center">No hay productos agregados</td>
								</tr>
							</tbody>
						</table>
						</div>
					<div class="d-flex justify-content-between px-3">
							<button type="button" class="btn btn-secondary previous">Regresar</button>
							<button type="submit" class="btn btn-primary next" id="submit_btn">Continuar</button>
					</div>
				</fieldset>
			</form>
		</div>
	</main>
</body>
<script src="\mujer-transformadora\public\js\register\main.js" type="module"></script>
</html>