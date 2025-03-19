import { FormNavigator } from "./formNavigation.js";
import { CurpService } from "./curpService.js";
import { PostalCodeService } from "./postalCodeService.js";
import { TableManager } from "./tableManager.js";
import { FillInputs } from "./fillInputs.js";
import { SubmitForm } from "./submit.js";

document.addEventListener("DOMContentLoaded", () => {
  const formNavigator = new FormNavigator(
    document.querySelector("form"),
    "#progressBar"
  );
  const curpService = new CurpService("pruebas");
  const postalService = new PostalCodeService("pruebas");
  const fillInputs = new FillInputs();
  const submitForm = new SubmitForm();

  // Eventos
  document
    .getElementById("search_curp_btn")
    .addEventListener("click", async () => {
      const curpInput = document.getElementById("curp_usuario");
      if (CurpService.validarCurpFormato(curpInput.value)) {
        const data = await curpService.consultarCurp(curpInput.value);
        fillInputs.fillInputsCurp(data);
        curpInput.classList.add("is-valid");
      } else {
        curpInput.classList.add("is-invalid");
      }
    });

  document
    .getElementById("search_cp_btn")
    .addEventListener("click", async () => {
      const cp = document.getElementById("codigo_postal").value;
      const data_location = await postalService.consultarCodigoPostal(cp);
      fillInputs.fillInputsCodePostal(data_location);
    });

  document.getElementById("add_address").addEventListener("click", () => {
    const addressManager = new TableManager("#address_table");
    addressManager.checkEmpty(); // Mostrar mensaje vacío inicial
    const direccion = document.getElementById("direccion_usuario").value;
    const municipio = document.getElementById("municipio_usuario").value;
    const localidad = document.getElementById("localidad_usuario").value;
    const estado = document.getElementById("estado_usuario").value;
    addressManager.addRow([direccion, municipio, localidad, estado]);
  });

  document
    .getElementById("add_registro_fiscal")
    .addEventListener("click", () => {
      const fiscalManager = new TableManager("#registros_fiscales_table");
      fiscalManager.checkEmpty(); // Mostrar mensaje vacío inicial
      const nombre_registro = document.getElementById("nombre_registro").value;
      const clave_registro = document.getElementById("clave_registro").value;
      fiscalManager.addRow([nombre_registro, clave_registro]);
    });

  document.getElementById("add_producto").addEventListener("click", () => {
    const productManager = new TableManager("#productos_table");
    productManager.checkEmpty(); // Mostrar mensaje vacío inicial
    const nombre_producto = document.getElementById("nombre_producto").value;
    const produccion_mensual =
      document.getElementById("produccion_mensual").value;
    const ventas_mensuales = document.getElementById("ventas_mensuales").value;
    const ventas_anuales = document.getElementById("ventas_anuales").value;
    productManager.addRow([
      nombre_producto,
      produccion_mensual,
      ventas_mensuales,
      ventas_anuales,
    ]);
  });

  document.getElementById("add_medio_digital").addEventListener("click", () => {
    const digitalManager = new TableManager("#medios_digitales_table");
    digitalManager.checkEmpty(); // Mostrar mensaje vacío inicial
    const nombre_medio = document.getElementById(
      "nombre_medio_adicional"
    ).value;
    const registro_medio = document.getElementById(
      "medio_adicional_registro"
    ).value;
    digitalManager.addRow([nombre_medio, registro_medio]);
  });

  document
    .getElementById("add_documento_adicional")
    .addEventListener("click", () => {
      const documentManager = new TableManager("#documentos_adicionales_table");
      documentManager.checkEmpty(); // Mostrar mensaje vacío inicial
      const denominacion_documento = document.getElementById(
        "denominacion_documento_adicional"
      ).value;
      const documento = document.getElementById("nombre_documento_adicional")
        .files[0].name;
      documentManager.addRow([denominacion_documento, documento]);
    });

  // document.getElementById('submitForm').addEventListener('click', () => {

  // });
});
