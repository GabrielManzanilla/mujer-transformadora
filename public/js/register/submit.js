export class SubmitForm {
  constructor() {
    this.form = document.querySelector("form");
    this.form.addEventListener("submit", this.submit.bind(this));
  }

  submit(e) {
    //Datos de la primera seccion 'Datos Personales'
		const datos_personales =['curp_usuario','apellido_paterno','apellido_materno','nombres_usuario','fecha_nacimiento_usuario','entidad_nacimiento_usuario','municipio_nacimiento_usuario','sexo'];
		const formDatas=this.getElementsValues(datos_personales);

    mayahablante = document.getElementById("mayahablante").checked;

    //Datos de la segunda seccion 'Domicilios'
    domicilios=this.getTableContent("address_table");


    //Datos de la tercera seccion 'Registros Fiscales'
		const registros_fiscales =['actividad_economica','razon_social_usuario','nombre_comercial','tiempo_ejerciendo','establecimiento_usuario','registro_affy_usuario','registro_sat_usuario','regimen_fiscal','numero_empleados','registro_impi_usuario','registro_imss_usuario'];
		const formDatas2=this.getElementsValues(registros_fiscales);

		registros_fiscales_adicionales=this.getTableContent("registros_fiscales_table");

		//Datos de la cuarta seccion 'Productos'
		productos= this.getTableContent("productos_table");
		
		//Datos de la quinta seccion 'Medios Digitales'
		const medios_digitales=['facebook_usuario','facebook_empresarial','facebook_marketplace','pagina_web','whatsapp_empresarial','mercado_libre','mercado_pago'];
		const formDatas3=this.getElementsValues(medios_digitales);
		
		medios_digitales_adicionales=this.getTableContent("medios_digitales_table");

		//Datos de la sexta seccion 'Documentos'
		const documentos=['ine_file','acta_nacimiento_file','comprobante_domicilio_file','cif_file','affy_file','impi_file','imss_file'];
		const formDatas4=this.getFilesValues(documentos);

		documentos_adicionales=this.getTableContent("documentos_adicionales_table");

		//Se crea un objeto FormData para enviar los datos al servidor
		const formData = new FormData();
		formDatas.forEach((value,key)=>formData.append(key,value));
		formData.append('mayahablante',mayahablante);
		formDatas2.forEach((value,key)=>formData.append(key,value));
		formData.append('domicilios',JSON.stringify(domicilios));
		formDatas3.forEach((value,key)=>formData.append(key,value));
		formData.append('registros_fiscales_adicionales',JSON.stringify(registros_fiscales_adicionales));
		formData.append('productos',JSON.stringify(productos));
		formData.append('medios_digitales_adicionales',JSON.stringify(medios_digitales_adicionales));
		formData.append('documentos_adicionales',JSON.stringify(documentos_adicionales));
		
  }


  getTableContent(table_id) {
    const array = [];
    const table = document.getElementById(table_id);

    //este segmento comprueba que no se agregue los la fila de mensaje
    table.querySelectorAll("tr").forEach((tr) => {
			if (tr.id !== `fila_mensaje_${table_id}`) {

				// este ciclo recorre las filas de la tabla de domicilios y agrega los datos a la lista a excepcion del boton para eliminar
				const columns=Array.from(tr.children)
														.slice(0,-1)
														.map(td=>td.textContent.trim());
        array.push(columns);
      }
    });
    return array;
  }

	//elemenst es un array de ids de los elementos del formulario
	getElementsValues(elements){
		const formDatas = new FormData();
		elements.forEach(element=>{
			const input=document.getElementById(element);
			if(input){
				formDatas.append(element,input.value);
			}
			else{
				console.warn(`Elemento ${element} no encontrado`);
			}
		});
		return formDatas;
	}

	getFilesValues(elements){
		const formDatas = new FormData();
		elements.forEach(element=>{
			const input=document.getElementById(element);
			if(input){
				formDatas.append(element,input.files[0]);
			}
			else{
				console.warn(`Elemento ${element} no encontrado`);
			}
		});
		return formDatas;
	}
}
