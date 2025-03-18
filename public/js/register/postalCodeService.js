export class PostalCodeService {
  constructor(apiToken) {
    this.token = apiToken;
  }

  async consultarCodigoPostal(cp) {
    const url = `https://api.copomex.com/query/info_cp/${cp}?token=${this.token}`;
    try {
      const response = await fetch(url);
      if (!response.ok) throw new Error("Error al consultar CP");

			
			const estados = [];
			const municipios = [];
			const localidades = [];
			
			const data = await response.json();
			
      data.map(item => {
				this.checkOption(item.response.estado, estados);
				this.checkOption(item.response.municipio, municipios);
				this.checkOption(item.response.asentamiento, localidades);
			});

			return [estados, municipios, localidades];	
    } catch (error) {
      console.error(error);
    }
  }

	checkOption(option, array){
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
}
