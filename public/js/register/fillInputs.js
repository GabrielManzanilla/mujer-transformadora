import { ManagerDate } from "../managerDate.js";

export class FillInputs {

	fillInputsCodePostal(estados, municipios, localidades) {
		const select_estado = document.getElementById("estado_usuario");
		const select_municipio = document.getElementById("municipio_usuario");
		const select_localidad = document.getElementById("localidad_usuario");

		// Clear existing options

		estados.forEach((estado) => {
			let option = document.createElement("option");
			option.textContent = estado;
			select_estado.appendChild(option);
		});

		municipios.forEach((municipio) => {
			let option = document.createElement("option");
			option.textContent = municipio;
			select_municipio.appendChild(option);
		});

		localidades.forEach((localidad) => {
			let option = document.createElement("option");
			option.textContent = localidad;
			select_localidad.appendChild(option);
		});
		const codigo_postal = document.getElementById("codigo_postal");
		codigo_postal.classList.add("is-valid");
	};

	fillInputsCurp(data) {
		let dataSolicitnate = data.Solicitante;
		let dataProbatorio = data.DocProbatorio;
		
		document.getElementById("nombres_usuario").value = dataSolicitnate.Nombres;
		document.getElementById("apellido_paterno").value = dataSolicitnate.ApellidoPaterno;
		document.getElementById("apellido_materno").value = dataSolicitnate.ApellidoMaterno;
		document.getElementById("sexo_usuario").value = dataSolicitnate.Sexo;
		const managerDate = new ManagerDate();
		document.getElementById("fecha_nacimiento_usuario").value = managerDate.formatDateToForm(dataSolicitnate.FechaNacimiento);


		document.getElementById("entidad_nacimiento_usuario").value =
			dataProbatorio.entidad_nacimiento;
		document.getElementById("municipio_nacimiento_usuario").value =
			dataProbatorio.municipio_nacimiento;
	};

}