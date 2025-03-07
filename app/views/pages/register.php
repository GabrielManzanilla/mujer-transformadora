<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</head>
<body>
	<?php require __DIR__ . '/../components/navbar.php'; ?>
	<main class="mt-5 pt-3 container">
		<div class="mt-5 container-fluid">
			<form action="">
				<fieldset> 
					<legend>Datos Personales</legend>
					<div class="mb-3">
						<label for="curp_usuario" class="form-label">CURP</label>
						<input type="text" class="form-control" id="curp_usuario" aria-describedby="emailHelp">
						<div id="emailHelp" class="form-text">Proporcione el curp para realizar la busqueda</div>
						<button type="button" class="btn btn-primary mt-2" onclick="buscarPorCurp()">Buscar</button>
					</div>
					<div class="mb-3">
						<label for="apellido_paterno" class="form-label">Apellido Paterno</label>
						<input type="text" class="form-control" id="apellido_paterno">
					</div>
					<div class="mb-3">
						<label for="apellido_materno" class="form-label">Apellido Materno</label>
						<input type="text" class="form-control" id="apellido_materno">
					</div>
					<div class="mb-3">
						<label for="nombres_usuario" class="form-label">Nombre(s)</label>
						<input type="text" class="form-control" id="nombres_usuario">
					</div>
					<div class="mb-3">
						<select class="sexo_usuario" aria-label="Default select example">
							<option selected>Sexo</option>
							<option value="Mujer">Mujer</option>
							<option value="Hombre">Hombre</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="mayahablante" class="form-label">Maya hablante</label>
						<input class="form-check-input" type="checkbox" id="mayahablante" value="True" aria-label="Checkbox for following text input">
					</div>
					<div>
						<label for="detalles_nacimiento_usuario">Lugar Nacimiento</label>
						<select class="form-select" aria-label="Default select example">
							<option selected>Estado</option>
						</select>
						<select class="form-select" aria-label="Default select example">
							<option selected>Municipio</option>
						</select>
						<select class="form-select" aria-label="Default select example">
							<option selected>Localidad</option>
						</select>
					</div>
				</fieldset> 
				<hr>
				<fieldset class="mb-3">
					<legend class="form-label">Domicilio(s)</legend>
						<div class="mb-3">
							<div class="mb-3">
								<label for="curp_usuario" class="form-label">Codigo Postal</label>
								<input type="text" class="form-control" id="curp_usuario" aria-describedby="emailHelp">
								<button type="button" class="btn btn-primary mt-2" onclick="buscarPorCodigoPostal()">Buscar</button>
							</div>
							<label for="direccion_usuario" class="form-label"> Ingresar direccion</label>
							<input type="text" class="form-control" id="direccion_usuario">
							<select class="form-select" aria-label="Default select example">
								<option selected>Estado</option>
							</select>
							<select class="form-select" aria-label="Default select example">
								<option selected>Municipio</option>
							</select>
							<select class="form-select" aria-label="Default select example">
								<option selected>Localidad</option>
							</select>
							<button type="button" class="btn btn-primary mt-2">Añadir</button>
						</div>
						<h5 for="direcciones">Direcciones</h5>
						<div class="mb-3 w-100 border rounded p-2 pt-3">
							<div class="w-100 d-flex px-3 justify-content-between">
								<p>C ## ### x## ## | Colonia Ejemplo | Merida | Yucatan</p> 
								<button type="button" class="btn-close" aria-label="Cerrar"></button>
							</div> 
						</div>
				</fieldset>
				<hr>
				<fieldset>
					<legend>Datos Fiscales</legend>
					<div class="mb-3">
						<label for="actividad_economica_usuario" class="form-label"> Seleccione la Actividad economica</label>
							<select class="form-select" aria-label="Default select example">
								<option selected>Actividad Economica</option>
							</select>
					</div>
					<div class="mb-3">
						<label for="razon_social_usuario" class="form-label">Razon Social</label>
						<input type="text" class="form-control" id="razon_social_usuario">
					</div>
					<div class="mb-3">
						<label for="nombre_comercial" class="form-label">Nombre comercial</label>
						<input type="text" class="form-control" id="apellido_materno">
					</div>
					<div class="mb-3">
						<label for="tiempo_ejerciendo" class="form-label">Tiempo ejerciendo</label>
						<input type="number" class="form-control" id="nombres_usuario">
						<div class="form-text">**Tiempo en años</div>
					</div>
					<div class="mb-3">
						<label for="establecimiento_usuario" class="form-label"> Establecimiento</label>
							<select class="form-select" aria-label="Default select example">
								<option selected>Direccion</option>
							</select>
					</div>
					<div class="mb-3">
						<label for="registro_affy_usuario" class="form-label">Registro estatal de contribuyentes (AAFY)</label>
						<input type="text" class="form-control" id="registro_affy_usuario">
					</div>
					<div class="mb-3">
						<label for="registro_sat_usuario" class="form-label">Registro federal de contribuyentes (SAT)</label>
						<input type="text" class="form-control" id="registro_sat_usuario">
					</div>
					<div class="mb-3">
						<label for="regimen" class="form-label"> Regimen</label>
							<select class="form-select" aria-label="Default select example">
								<option selected>Regimen</option>
							</select>
					</div>
					<div class="mb-3">
						<label for="numero_empleados" class="form-label">Numero de empleados</label>
						<input type="number" class="form-control" id="numero_empleados">
					</div>
					<div class="mb-3">
						<label for="registro_impi_usuario" class="form-label">Registro de marca (IMPI)</label>
						<input type="text" class="form-control" id="registro_impi_usuario">
					</div>
					<div class="mb-3">
						<label for="registro_imss_usuario" class="form-label">Registro patronal (IMSS)</label>
						<input type="text" class="form-control" id="registro_imss_usuario">
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" id="registro_imss_usuario" placeholder="Nombre del registro">
						<input type="text" class="form-control" id="registro_imss_usuario" placeholder="Clave del registro">
						<button type="button" class="btn btn-primary mt-2">Añadir</button>
					</div>
					<h5 for="direcciones">Otros Registros</h5>
						<div class="mb-3 w-100 border rounded p-2 pt-3">
							<div class="w-100 d-flex px-3 justify-content-between">
								<p>Nombre Registro | Clave Registro</p> 
								<button type="button" class="btn-close" aria-label="Cerrar"></button>
							</div> 
						</div>
				</fieldset>
				<hr>
				<fieldset>
					<legend>Produccion y Ventas</legend>
					<div class="mb-3">
						<input type="text" class="form-control" id="registro_imss_usuario" placeholder="Producto">
						<input type="text" class="form-control" id="registro_imss_usuario" placeholder="Produccion al mes">
						<input type="text" class="form-control" id="registro_imss_usuario" placeholder="Ventas mensuales">
						<input type="text" class="form-control" id="registro_imss_usuario" placeholder="Ventas anuales">
						<button type="button" class="btn btn-primary mt-2">Añadir</button>
					</div>
					<h5 for="direcciones">Produccion</h5>
						<div class="mb-3 w-100 border rounded p-2 pt-3">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Producto</th>
									<th scope="col">Produccion al mes</th>
									<th scope="col">Ventas mensuales</th>
									<th scope="col">Ventas anuales</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Producto 1</td>
									<td>000000</td>
									<td>$$$$$</td>
									<td>$$$$$</td>
								</tr>
							</tbody>
						</table>
						</div>
				</fieldset>
				<hr>
				<fieldset>
					<legend> Medios Digitales</legend>
					<div class="mb-3">
						<label for="facebook_usuario"  class="form-label">Facebook</label>
						<input type="text" class="form-control" id="facebook_usuario" placeholder="Facebook">
					</div>
					<div class="mb-3">
						<label for="facebook_empresarial"  class="form-label">Facebook Empresarial</label>
						<input type="text" class="form-control" id="facebook_empresarial" placeholder="Facebook Empresarial">
					</div>
					<div class="mb-3">
						<label for="facebook_marketplace"  class="form-label">Marketplace</label>
						<input type="text" class="form-control" id="facebook_marketplace" placeholder="Marketplace">
					</div>
					<div class="mb-3">
						<label for="pagina_web"  class="form-label">Pagina WEB</label>
						<input type="text" class="form-control" id="pagina_web" placeholder="Pagina WEB">
					</div>
					<div class="mb-3">
						<label for="whatsapp_empresarial"  class="form-label">Whatsapp Empresarial</label>
						<input type="text" class="form-control" id="whatsapp_empresarial" placeholder="Whatsapp Empresarial">
					</div>
					<div class="mb-3">
						<label for="mercado_libre"  class="form-label">Mercado Libre</label>
						<input type="text" class="form-control" id="mercado_libre" placeholder="Mercado Libre">
					</div>
					<div class="mb-3">
						<label for="mercado_pago"  class="form-label">Mercado Pago</label>
						<input type="text" class="form-control" id="mercado_pago" placeholder="Mercado Pago">
					</div>
					
					<div class="mb-3">
						<input type="text" class="form-control" id="medio_adicional" placeholder="Medio digital">
						<input type="text" class="form-control" id="medio_adicional_registro" placeholder="Nombre en el medio">
						<button type="button" class="btn btn-primary mt-2">Añadir</button>
					</div>
					<h5 for="direcciones">Otros Medios Digitales</h5>
					<div class="mb-3 w-100 border rounded p-2 pt-3">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Medio Digital</th>
									<th scope="col">Nombre del medio</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Medio Adicional</td>
									<td>Nombre en el medio</td>
								</tr>
							</tbody>
						</table>
					</div>
				</fieldset>
				<hr>
				<fieldset class="">
					<legend>Subida de Archivos</legend>
					<div class="mb-3">
						<label for="ine_file" class="form-label">INE</label> 
						<div class="input-group">
							<input type="file" class="form-control" id="ine_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
						</div>
					</div>
					<div class="mb-3">
						<label for="acta_nacimiento_file" class="form-label">Acta de Nacimiento</label> 
						<div class="input-group">
							<input type="file" class="form-control" id="acta_nacimiento_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="acta_nacimiento_file">Button</button>
						</div>
					</div>
					<div class="mb-3">
						<label for="comprobante_domicilio_file" class="form-label">Comprobante de Domicilio</label> 
						<div class="input-group">
							<input type="file" class="form-control" id="comprobante_domicilio_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="comprobante_domicilio_file">Button</button>
						</div>
					</div>
					<div class="mb-3">
						<label for="cif_file" class="form-label">Constancia de Situacion Fiscal (CIF)</label> 
						<div class="input-group">
							<input type="file" class="form-control" id="cif_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="cif_file">Button</button>
						</div>
					</div>
					<div class="mb-3">
						<label for="affy_file" class="form-label">Registro AFFY</label> 
						<div class="input-group">
							<input type="file" class="form-control" id="affy_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="affy_file">Button</button>
						</div>
					</div>
					<div class="mb-3">
						<label for="impi_file" class="form-label">Registro IMPI</label> 
						<div class="input-group">
							<input type="file" class="form-control" id="impi_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="impi_file">Button</button>
						</div>
					</div>
					<div class="mb-3">
						<label for="impi_file" class="form-label">Registro IMPI</label> 
						<div class="input-group">
							<input type="file" class="form-control" id="impi_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="impi_file">Button</button>
						</div>
					</div>
					<div class="mb-3">
						<label for="imss_file" class="form-label">Registro IMSS</label> 
						<div class="input-group">
							<input type="file" class="form-control" id="imss_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="imss_file">Button</button>
						</div>
					</div>
					<div class="mb-3">
						<label for="registro_adicional_file" class="form-label">Registros Adicionales</label> 
						<div class="input-group">
							<input type="text" name="registro_adicional" id="registro_adicional" class="form-control" placeholder="Nombre del registro">
							<input type="file" class="form-control" id="registro_adicional_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							<button class="btn btn-outline-secondary" type="button" id="imss_file">Button</button>
						</div>
					</div>
					<h5 for="direcciones">Otros Medios Digitales</h5>
					<div class="mb-3 w-100 border rounded p-2 pt-3">
							<label for="registro_adicional_file" class="form-label">Entidad Registro</label>
					</div>
				</fieldset>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</main>
</body>
</html>