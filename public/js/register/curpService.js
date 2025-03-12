export class CurpService {
  constructor(apiToken) {
    this.token = apiToken;
  }

  async consultarCurp(curp) {
    const url = `https://api.valida-curp.com.mx/curp/obtener_datos/?token=${this.token}&curp=${curp}`;
    try {
      const response = await fetch(url);
      if (!response.ok) throw new Error("Error al consultar CURP");
      const data = await response.json();
      return data.response;
    } catch (error) {
      console.error(error);
    }
  }

  static validarCurpFormato(curp) {
    const regex = /^[A-Z]{4}\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])[HM][A-Z]{5}[0-9A-Z]\d$/;
    return regex.test(curp);
  }
}
