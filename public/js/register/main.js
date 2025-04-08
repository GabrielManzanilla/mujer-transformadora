import { FormNavigator } from "./formNavigation.js";
import { CurpService } from "./curpService.js";
import { PostalCodeService } from "./postalCodeService.js";
import { TableManager } from "./tableManager.js";
import { FillInputs } from "./fillInputs.js";
import { SubmitFormRegister } from "./registerForm.js";

import { managerElements } from "./managerElements.js?v=1";



document.addEventListener("DOMContentLoaded", () => {
  const formNavigator = new FormNavigator(
    document.querySelector("form"),
    "#progressBar"
  );
  const curpService = new CurpService("pruebas");
  const postalService = new PostalCodeService("pruebas");
  const fillInputs = new FillInputs();

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
    const addressManagerElements = new managerElements();
    addressManager.addRow(
      addressManagerElements.get_and_clear([
        "direccion_usuario",
        "municipio_usuario",
        "localidad_usuario",
        "estado_usuario",
      ])
    );
  });

  document
    .getElementById("add_registro_fiscal")
    .addEventListener("click", () => {
      const fiscalManager = new TableManager("#registros_fiscales_table");
      const fiscalManagerElements = new managerElements();
      const elements = fiscalManagerElements.get_and_clear([
        "nombre_registro",
        "clave_registro",
      ]);
      fiscalManager.addRow(elements);
    });

  document.getElementById("add_producto").addEventListener("click", () => {
    const productManager = new TableManager("#productos_table");
    const productManagerElements = new managerElements();
    productManager.addRow(
      productManagerElements.get_and_clear([
        "nombre_producto",
        "produccion_mensual",
        "ventas_mensuales",
        "ventas_anuales",
      ])
    );
  });

  document.getElementById("add_medio_digital").addEventListener("click", () => {
    const digitalManager = new TableManager("#medios_digitales_table");
    const digitalManagerElements = new managerElements();
    digitalManager.addRow(
      digitalManagerElements.get_and_clear([
        "nombre_medio_adicional",
        "medio_adicional_registro",
      ])
    );
  });

  document
    .getElementById("add_documento_adicional")
    .addEventListener("click", () => {
      const documentManager = new TableManager("#documentos_adicionales_table");
      const documentManagerElements = new managerElements();
      documentManager.addRow(
        documentManagerElements.get_and_clear([
          "denominacion_documento_adicional",
          "nombre_documento_adicional",
        ])
      );
    });

  document.querySelector("form").addEventListener("submit", (event) => {
    event.preventDefault();
    const submitForm = new SubmitFormRegister();
    submitForm.submitData();
  });
});
