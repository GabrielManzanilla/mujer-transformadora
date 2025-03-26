import { ManagerElements } from "../main/managerElements";
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
    const managerSelects = new ManagerElements();
    const selects = managerSelects.clearSelects(["estado_usuario", "municipio_usuario", "localidad_usuario"]);


    estados.forEach((estado) => this.fillSelectInput(selects[0], estado));
    municipios.forEach((municipio) =>
      this.fillSelectInput(selects[1], municipio)
    );
    localidades.forEach((localidad) =>
      this.fillSelectInput(selects[2], localidad)
    );

    const codigo_postal = document.getElementById("codigo_postal");
    codigo_postal.classList.add("is-valid");
  }

  fillInputsCurp(data) {
    const curpManager = new ManagerElements()
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
    const elements = curpManager.get_and_clear(["entidad_nacimiento_usuario","municipio_nacimiento_usuario"])
    
    this.fillSelectInput(
      elements[0],
      dataProbatorio.EntidadRegistrante
    );
    this.fillSelectInput(
      elements[1],
      dataProbatorio.MunicipioRegistro
    );
  }
}
