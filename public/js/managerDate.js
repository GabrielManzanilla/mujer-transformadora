export class ManagerDate {
	formatDateToForm(date){
		let partes = date.split("/");
    let date_Formated = `${partes[2]}-${partes[1]}-${partes[0]}`;
		return date_Formated;
	}	

}