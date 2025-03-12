import { FormNavigator } from './formNavigation.js';
import { CurpService } from './curpService.js';
import { PostalCodeService } from './postalCodeService.js';
import { AddressManager } from './addressManager.js';
import { FillInputs } from './fillInputs.js';

document.addEventListener('DOMContentLoaded', () => {
  const formNavigator = new FormNavigator(document.querySelector('form'), '#progressBar');
  const curpService = new CurpService('pruebas');
  const postalService = new PostalCodeService('pruebas');
  const addressManager = new AddressManager('#address_table');
	const fillInputs = new FillInputs();

  // Eventos
  document.getElementById('search_curp_btn').addEventListener('click', async () => {
    const curpInput = document.getElementById('curp_usuario');
    if (CurpService.validarCurpFormato(curpInput.value)) {
      const data = await curpService.consultarCurp(curpInput.value);
      fillInputs.fillInputsCurp(data);
			curpInput.classList.add('is-valid');	
    } else {
      curpInput.classList.add('is-invalid');
    }
  });

  document.getElementById('search_cp_btn').addEventListener('click', async () => {
    const cp = document.getElementById('codigo_postal').value;
    const {estados, municipios, localidades} = await postalService.consultarCodigoPostal(cp);
    fillInputs.fillInputsCodePostal(estados, municipios, localidades);
  });

  document.getElementById('add_address').addEventListener('click', () => {
    const direccion = document.getElementById('direccion_usuario').value;
    const municipio = document.getElementById('municipio_usuario').value;
    const localidad = document.getElementById('localidad_usuario').value;
    const estado = document.getElementById('estado_usuario').value;
    addressManager.addAddress(direccion, municipio, localidad, estado);
  });

  addressManager.checkEmpty(); // Mostrar mensaje vacío inicial
});
