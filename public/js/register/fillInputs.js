export class FillInputs {
  fillTextInput(target, txt_value) {
    document.getElementById(target).value = txt_value;
  }

  fillSelectInput(target, txt_value) {
    let option = document.createElement("option");
    option.textContent = txt_value;
    target.appendChild(option);
  }

  fillDateInput(target, date_value) {
    let partes = date_value.split("/");
    let date_Formated = `${partes[2]}-${partes[1]}-${partes[0]}`;
    document.getElementById(target).value = date_Formated;
  }

  fillInputsCodePostal(data_location) {
    const [estados, municipios, localidades] = data_location;
    console.log(estados, municipios, localidades);
    const select_estado = document.getElementById("estado_usuario");
    const select_municipio = document.getElementById("municipio_usuario");
    const select_localidad = document.getElementById("localidad_usuario");

    select_estado.innerHTML = "";
    select_municipio.innerHTML = "";
    select_localidad.innerHTML = "";

    estados.forEach((estado) => this.fillSelectInput(select_estado, estado));
    municipios.forEach((municipio) =>
      this.fillSelectInput(select_municipio, municipio)
    );
    localidades.forEach((localidad) =>
      this.fillSelectInput(select_localidad, localidad)
    );

    const codigo_postal = document.getElementById("codigo_postal");
    codigo_postal.classList.add("is-valid");
  }

  fillInputsCurp(data) {
    let dataSolicitnate = data.Solicitante;
    let dataProbatorio = data.DocProbatorio;

    this.fillTextInput("nombres_usuario", dataSolicitnate.Nombres);
    this.fillTextInput("apellido_paterno", dataSolicitnate.ApellidoPaterno);
    this.fillTextInput("apellido_materno", dataSolicitnate.ApellidoMaterno);
    this.fillTextInput("sexo_usuario", dataSolicitnate.Sexo);
    this.fillDateInput(
      "fecha_nacimiento_usuario",
      dataSolicitnate.FechaNacimiento
    );

    const entidad_nacimiento_usuario = document.getElementById(
      "entidad_nacimiento_usuario"
    );
    const municipio_nacimiento_usuario = document.getElementById(
      "municipio_nacimiento_usuario"
    );
    this.fillSelectInput(
      entidad_nacimiento_usuario,
      dataProbatorio.EntidadRegistrante
    );
    this.fillSelectInput(
      municipio_nacimiento_usuario,
      dataProbatorio.MunicipioRegistro
    );
  }
}
