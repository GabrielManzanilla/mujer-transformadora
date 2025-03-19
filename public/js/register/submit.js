export class Submit {
  constructor() {
    this.form = document.querySelector("form");
    this.form.addEventListener("submit", this.submit.bind(this));
  }

  submit(e) {
    //Datos de la primera seccion 'Datos Personales'
    curp_usuario = document.getElementById("curp_usuario").value;
    apellido_paterno = document.getElementById("apellido_paterno").value;
    apellido_materno = document.getElementById("apellido_materno").value;
    nombres_usuario = document.getElementById("nombres_usuario").value;
    fecha_nacimiento = document.getElementById(
      "fecha_nacimiento_usuario"
    ).value;
    entidad_nacimiento = document.getElementById(
      "entidad_nacimiento_usuario"
    ).value;
    municipio_nacimiento = document.getElementById(
      "municipio_nacimiento_usuario"
    ).value;
    sexo = document.getElementById("sexo").value;
    mayahablante = document.getElementById("mayahablante").checked;

    //Datos de la segunda seccion 'Domicilios'
    domicilios=this.getTableContent("address_table");

    //Datos de la tercera seccion 'Registros Fiscales'
    actividad_economica = document.getElementById("actividad_economica").value;
    razon_social = document.getElementById("razon_social_usuario").value;
    nombre_comercial = document.getElementById("nombre_comercial").value;
    tiempo_ejerciendo = document.getElementById("tiempo_ejerciendo").value;
    establecimiento_usuario = document.getElementById(
      "establecimiento_usuario"
    ).value;
    registro_affy_usuario = document.getElementById(
      "registro_affy_usuario"
    ).value;
    registro_sat_usuario = document.getElementById(
      "registro_sat_usuario"
    ).value;
    regimen_fiscal = document.getElementById("regimen_fiscal").value;
    numero_empleados = document.getElementById("numero_empleados").value;
    registro_impi_usuario = document.getElementById(
      "registro_impi_usuario"
    ).value;
    registro_imss_usuario = document.getElementById(
      "registro_imss_usuario"
    ).value;
		registros_fiscales_adicionales=this.getTableContent("registros_fiscales_table");

		//Datos de la cuarta seccion 'Productos'
		productos= this.getTableContent("productos_table");
		
		//Datos de la quinta seccion 'Medios Digitales'
		facebook_usuario = document.getElementById("facebook_usuario").value;
		facebook_empresarial = document.getElementById("facebook_empresarial").value;
		facebook_marketplace = document.getElementById("facebook_marketplace").value;
		pagina_web = document.getElementById("pagina_web").value;
		whatsapp_empresarial = document.getElementById("whatsapp_empresarial").value;
		mercado_libre = document.getElementById("mercado_libre").value;
		mercado_pago = document.getElementById("mercado_pago").value;
		medios_digitales_adicionales=this.getTableContent("medios_digitales_table");

		//Datos de la sexta seccion 'Documentos'
		ine_file = document.getElementById("ine_file").files[0];
		acta_nacimiento_file = document.getElementById("acta_nacimiento_file").files[0];
		comprobante_domicilio_file = document.getElementById("comprobante_domicilio_file").files[0];
		cif_file = document.getElementById("cif_file").files[0];
		affy_file = document.getElementById("affy_file").files[0];
		impi_file = document.getElementById("impi_file").files[0];
		imss_file = document.getElementById("imss_file").files[0];
		documentos_adicionales=this.getTableContent("documentos_adicionales_table");

		//Se crea un objeto FormData para enviar los datos al servidor
		const formData = new FormData();
		formData.append("curp_usuario", curp_usuario);
		formData.append("apellido_paterno", apellido_paterno);
		formData.append("apellido_materno", apellido_materno);
		formData.append("nombres_usuario", nombres_usuario);
		formData.append("fecha_nacimiento", fecha_nacimiento);
		formData.append("entidad_nacimiento", entidad_nacimiento);
		formData.append("municipio_nacimiento", municipio_nacimiento);
		formData.append("sexo", sexo);
		formData.append("mayahablante", mayahablante);
		formData.append("domicilios", JSON.stringify(domicilios));
		formData.append("actividad_economica", actividad_economica);
		formData.append("razon_social", razon_social);
		formData.append("nombre_comercial", nombre_comercial);
		formData.append("tiempo_ejerciendo", tiempo_ejerciendo);
		formData.append("establecimiento_usuario", establecimiento_usuario);
		formData.append("registro_affy_usuario", registro_affy_usuario);
		formData.append("registro_sat_usuario", registro_sat_usuario);
		formData.append("regimen_fiscal", regimen_fiscal);
		formData.append("numero_empleados", numero_empleados);
		formData.append("registro_impi_usuario", registro_impi_usuario);
		formData.append("registro_imss_usuario", registro_imss_usuario);
		formData.append("registros_fiscales_adicionales", JSON.stringify(registros_fiscales_adicionales));
		formData.append("productos", JSON.stringify(productos));
		formData.append("facebook_usuario", facebook_usuario);
		formData.append("facebook_empresarial", facebook_empresarial);
		formData.append("facebook_marketplace", facebook_marketplace);
		formData.append("pagina_web", pagina_web);
		formData.append("whatsapp_empresarial", whatsapp_empresarial);
		formData.append("mercado_libre", mercado_libre);
		formData.append("mercado_pago", mercado_pago);
		formData.append("medios_digitales_adicionales", JSON.stringify(medios_digitales_adicionales));
		formData.append("ine_file", ine_file);
		formData.append("acta_nacimiento_file", acta_nacimiento_file);
		formData.append("comprobante_domicilio_file", comprobante_domicilio_file);
		formData.append("cif_file", cif_file);
		formData.append("affy_file", affy_file);
		formData.append("impi_file", impi_file);
		formData.append("imss_file", imss_file);
		formData.append("documentos_adicionales", JSON.stringify(documentos_adicionales));
  }


  getTableContent(table_id) {
    const array = [];
    const table = document.getElementById(table_id);

    //este ciclo recorre las filas de la tabla de domicilios y agrega los datos a la lista, excepto la fila de mensaje
    table.querySelectorAll("tr").forEach((tr) => {
      if (row.id !== `fila_mensaje_${table_id}`) {
        const direccion = tr.children[0].textContent;
        const municipio = tr.children[1].textContent;
        const localidad = tr.children[2].textContent;
        const estado = tr.children[3].textContent;
        array.push({ direccion, municipio, localidad, estado });
      }
    });
    return array;
  }
}
