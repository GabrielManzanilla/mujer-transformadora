//Script para modificar la visibilidad de las etapas del formulario de registro
document.addEventListener("DOMContentLoaded", function () {
  // Selecciona todos los enlaces del navbar
  const form = document.querySelector("form");
  const sectionsForm = document.querySelectorAll("fieldset");
  let activeSection = 0;
  localStorage.setItem("activeSection", activeSection);

  function updateProgress() {
    const progress = document.getElementById("progressBar");
    const percentage = (activeSection / sectionsForm.length) * 100;
    progress.style.width = percentage + "%";
    progress.setAttribute("aria-valuenow", percentage);
  }

  //funcion para mostrar la seccion activa
  function showSection(index) {
    sectionsForm.forEach((section, i) => {
      section.classList.toggle("active", i === index);
    });
    updateProgress();
  }
  //avanzar a la sig seccion
  form.querySelectorAll(".next").forEach((button) => {
    button.addEventListener("click", () => {
      const currentInputs =
        sectionsForm[activeSection].querySelectorAll("input, select");
      let isValid = true;
      // currentInputs.forEach(input => {
      // 	if(!input.checkValidity()){
      // 		isValid=false;
      // 	}
      // 	else{
      // 		input.classList.remove('is-invalid');
      // 	}
      // });

      if (isValid && activeSection < sectionsForm.length - 1) {
        activeSection++;
        localStorage.setItem("activeSection", activeSection);
        showSection(activeSection);
      } else {
        currentInputs.forEach((input) => {
          if (!input.checkValidity()) {
            input.classList.add("is-invalid");
          }
        });
      }
    });
  });

  //retroceder a la seccion anterior
  form.querySelectorAll(".previous").forEach((button) => {
    button.addEventListener("click", () => {
      if (activeSection > 0) {
        activeSection--;
        localStorage.setItem("activeSection", activeSection);
        showSection(activeSection);
      }
    });
  });

  //LA SECCION A CONTINUACION SE ENCARGA DE LA AUTOMATIZACION DE LA CONSULTA Y LLENADO DE LOS CAMPOS DEL FORMULARIO
	const curp = document.getElementById("curp_usuario");
  const search_curp_btn = document.getElementById("search_curp_btn");
	search_curp_btn.addEventListener("click", () => {
			validarCurpYConsultar(curp);
	});

	//SECCION PARA CONSULTAR EL CODIGO POSTAL
	const codigo_postal = document.getElementById("codigo_postal");
	const search_cp_btn = document.getElementById("search_cp_btn");
	search_cp_btn.addEventListener("click", () => {
		consultarCodigoPostal(codigo_postal.value);
	});

	//ESTA FUNCION SE ENCARGA DE AGREGAR LA INFORMACION RETOMA LOS DATOS SELECCIONADOS EN "DIRECCION", "MUNICIPIO" "LOCALIDAD" Y "ESTADO", para agregarlos a un arreglo y mostrarlos en la tabla de direcciones
	const add_address_btn = document.getElementById("add_address");
	add_address_btn.addEventListener("click", () => {
		const direccion = document.getElementById("direccion_usuario").value;
		const municipio = document.getElementById("municipio_usuario").value;
		const localidad = document.getElementById("localidad_usuario").value;
		const estado = document.getElementById("estado_usuario").value;

		const address_table = document.getElementById("address_table").getElementsByTagName("tbody")[0];
		const fila_mensaje= document.getElementById("fila_mensaje");
		if (fila_mensaje){
			fila_mensaje.remove();
		}

		const row = address_table.insertRow();
		const cell_direccion = row.insertCell(0);
		const cell_municipio = row.insertCell(1);
		const cell_localidad = row.insertCell(2);
		const cell_estado = row.insertCell(3);
		const cell_delete = row.insertCell(4);

		cell_direccion.textContent = direccion;
		cell_municipio.textContent = municipio;
		cell_localidad.textContent = localidad;
		cell_estado.textContent = estado;
		
		const delete_button = document.createElement("button");
		delete_button.textContent = "Eliminar";
		delete_button.classList.add("btn", "btn-danger");
		delete_button.addEventListener("click", () => {
			row.remove();
		});
		cell_delete.appendChild(delete_button);
	});

	
});

//Esta funcion obtiene el valor de la curp, valida con regex si tiene el formato correcto y si es asi, consulta la curp
function validarCurpYConsultar(curp_input) {
	const curp_value = curp_input.value;
	const curp_regex = /^[A-Z]{4}\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])[HM][A-Z]{5}[0-9A-Z]\d$/;

	if (curp_regex.test(curp_value)) {
			consultarCurp(curp_value);
			curp_input.classList.add("is-valid");
			curp_input.classList.remove("is-invalid");
	} else {
			curp_input.classList.add("is-invalid");
			curp_input.classList.remove("is-valid");
	}
}

//Esta funcion se encarga de consultar la curp en la api y llenar los campos del formulario con los datos obtenidos
async function consultarCurp(curp) {
  token = "pruebas";

	//si se obtiene una respuesta por parte de la api se guarda en un response, sino se muestra un error 
  try {
    const response = await fetch(
      `https://api.valida-curp.com.mx/curp/obtener_datos/?token=${token}&curp=${curp}`
    );

    if (!response.ok) {
      throw new Error("Error al consultar la CURP");
    }

		//se filtran los datos que se usaran para llenar los campos del formulario
  	const data = await response.json();
    let data_user = data.response.Solicitante;
    let nombres_usuario = data_user.Nombres;
    let apellido_paterno = data_user.ApellidoPaterno;
    let apellido_materno = data_user.ApellidoMaterno;
    let sexo_usuario = data_user.Sexo;
    let fecha_nacimiento = data_user.FechaNacimiento;
    let partes = fecha_nacimiento.split("/");
    let fecha_nacimiento_formated = `${partes[2]}-${partes[1]}-${partes[0]}`;

    let adicional_data = data.response.DocProbatorio;
    let entidad_nacimiento = adicional_data.EntidadRegistrante;
    let municipio_nacimiento = adicional_data.MunicipioRegistro;

		//llamado a la funcion con los datos para el llenado de los campos
    fillPersonalDataForm(
      nombres_usuario,
      apellido_paterno,
      apellido_materno,
      sexo_usuario,
      fecha_nacimiento_formated,
      entidad_nacimiento,
      municipio_nacimiento
    );
  } catch (error) {
    console.error("Error al obtener los datos", error);
  }
}

//Esta funcion se encarga de llenar los campos del formulario con los datos obtenidos de la curp
function fillPersonalDataForm(
  nombres_usuario,
  apellido_paterno,
  apellido_materno,
  sexo,
  fecha_nacimiento,
  entidad_nacimiento,
  municipio_nacimiento
) {
  document.getElementById("nombres_usuario").value = nombres_usuario;
  document.getElementById("apellido_paterno").value = apellido_paterno;
  document.getElementById("apellido_materno").value = apellido_materno;
  document.getElementById("sexo_usuario").value = sexo;
  document.getElementById("fecha_nacimiento_usuario").value = fecha_nacimiento;

  console.log(entidad_nacimiento, municipio_nacimiento);

  document.getElementById("entidad_nacimiento_usuario").value =
    entidad_nacimiento;
  document.getElementById("municipio_nacimiento_usuario").value =
    municipio_nacimiento;
}


//SECCION PARA CONSULTAR EL CODIGO POSTAL Y LLENAR LOS CAMPOS DE ESTADO, MUNICIPIO Y LOCALIDAD

//Esta funcion realiza la consulta del codigo postal en la api y obtiene los datos de los estados, municipios y localidades
async function consultarCodigoPostal(codigo_postal) {
  token = "pruebas";
  try {
    const response = await fetch(
      `https://api.copomex.com/query/info_cp/${codigo_postal}?token=pruebas`
    );

    if (!response.ok) {
      throw new Error("Error al consultar el codigo postal");
    }
    const estados = [];
    const municipios = [];
    const localidades = [];

		// se instancia los datos obtenidos de la api en un objeto data y se verifica con la funcion checkOption si ya existe en el array, si no existe se agrega. llamando a la funcion insertOptionsLocation para llenar los campos
    const data = await response.json();
    data.map((each_data) => {
      let data_cp = each_data.response;
      checkOption(data_cp.estado, estados);
      checkOption(data_cp.municipio, municipios);
      checkOption(data_cp.asentamiento, localidades);
    });
    insertOptionsLocation(estados, municipios, localidades);
  } catch (error) {
    console.error("Error al obtener los datos", error);
  }
}

//Esta funcion se encarga de validar si ya existe el dato actual (en analisis) en el array, si no existe se agrega
function checkOption(option, array){
	let check = false;
	array.forEach((element) => {
			if (element == option){
					check = true;
			}
	});
	if (!check){
			array.push(option);
	}
}

//Esta funcion se encarga de llenar los campos de estado, municipio y localidad con los datos obtenidos de la api
function insertOptionsLocation(estados, municipios, localidades) {
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
}

