export class ManagerElements{
	get_and_clear(list_id_elements){
		const elements = []
		list_id_elements.forEach((id_element) => {
			let element = document.getElementById(id_element);
			elements.push(element.value);
			element.value= "";
		});
		return elements;
	}
}