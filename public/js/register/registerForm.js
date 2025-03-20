export class SubmitFormRegister{
  constructor() {
    this.form = document.querySelector("form");
    this.form.addEventListener("submit", this.submit.bind(this));
  }

  submit() {
    //Datos de la primera seccion 'Datos Personales'
		const datos_personales =['curp_usuario','apellido_paterno','apellido_materno','nombres_usuario','fecha_nacimiento_usuario','entidad_nacimiento_usuario','municipio_nacimiento_usuario','sexo_usuario'];
		const datos_personales_json=this.getElementsValues(datos_personales);

    const mayahablante = document.getElementById("mayahablante").checked;
		datos_personales_json['mayahablante']=mayahablante;

    //Datos de la segunda seccion 'Domicilios'
    const domicilios=this.getTableContent("address_table");


    //Datos de la tercera seccion 'Registros Fiscales'
		const registros_fiscales =['actividad_economica_usuario','razon_social_usuario','nombre_comercial','tiempo_ejerciendo','establecimiento_usuario','registro_affy_usuario','registro_sat_usuario','regimen_fiscal','numero_empleados','registro_impi_usuario','registro_imss_usuario'];
		const registros_fiscales_json=this.getElementsValues(registros_fiscales);

		const registros_fiscales_adicionales=this.getTableContent("registros_fiscales_table");

		//Datos de la cuarta seccion 'Productos'
		const productos= this.getTableContent("productos_table");
		
		//Datos de la quinta seccion 'Medios Digitales'
		const medios_digitales=['facebook_usuario','facebook_empresarial','facebook_marketplace','pagina_web','whatsapp_empresarial','mercado_libre','mercado_pago'];
		const medios_digitales_json=this.getElementsValues(medios_digitales);
		
		const medios_digitales_adicionales=this.getTableContent("medios_digitales_table");

		//Datos de la sexta seccion 'Documentos'
		const documentos=['ine_file','acta_nacimiento_file','comprobante_domicilio_file','cif_file','affy_file','impi_file','imss_file'];
		const documentos_json=this.getFilesValues(documentos);

		const documentos_adicionales=this.getTableContent("documentos_adicionales_table");

		//Se crea un objeto FormData para enviar los datos al servidor
		const formSubmit ={}
		formSubmit.datos_personales=datos_personales_json;
		formSubmit.domicilios=domicilios;

		formSubmit.registros_fiscales=registros_fiscales_json;
		formSubmit.registros_fiscales_adicionales=registros_fiscales_adicionales;

		formSubmit.productos=productos;

		formSubmit.medios_digitales=medios_digitales_json;
		formSubmit.medios_digitales_adicionales=medios_digitales_adicionales;

		formSubmit.documentos=documentos_json;
		formSubmit.documentos_adicionales=documentos_adicionales;


		console.log(formSubmit);
  }


  getTableContent(table_id) {
    const array = [];
    const table = document.getElementById(table_id);

    //este segmento comprueba que no se agregue los la fila de mensaje
    table.querySelectorAll("tr").forEach((tr) => {
			if (tr.id !== `fila_mensaje_${table_id}`) {

				// este ciclo recorre las filas de la tabla de domicilios y agrega los datos a la lista a excepcion del boton para eliminar
				if (tr.rowIndex > 0) {  // Skip the first row (header)
					const columns = Array.from(tr.children)
									.slice(0, -1)
									.map(td => td.textContent.trim());
					array.push(columns);
				}
      }
    });
    return array;
  }

	//elemenst es un array de ids de los elementos del formulario que se quieren obtener 
	// se obtiene el valor de cada elemento y se almacena en un objeto, devolviendo un json
	getElementsValues(inputs_id){
		const formInputs = {};
		inputs_id.forEach(input_id=>{
			const input=document.getElementById(input_id);
			if(input && input.value.trim() !== ''){
				formInputs[input_id]=input.value.trim();
			}
			else{
				console.warn(`Elemento ${input_id} no encontrado o está vacío`);
			}
		});
		console.log(formInputs);
		return formInputs;
	}

	getFilesValues(inputs_file){
		const fileInputs = {}
		inputs_file.forEach(input_file=>{
			const input=document.getElementById(input_file);
			if(input_file){	
				fileInputs[input_file]=input.files[0];
			}
			else{
				console.warn(`Elemento ${input_file} no encontrado`);
			}
		});
		return fileInputs;
	}
}
