export class TableManager{

	//obtencion del id de la tabla (objeto), definimos un array que nos servira para almacenar el conjunto de datos
	constructor (table_data){
		this.tableElement = table_data.table;
		this.message = table_data.message;
		this.inputs = table_data.inputs;
		this.json = table_data.json;
		this.tableBody = this.tableElement.getElementsByTagName('tbody')[0];
		this.array_data = []; // conjunto de datos

		this.comprobation_empty_json(); //verificamos si el json tiene datos para llenar la tabla
	}
	comprobation_empty_json(){
		if(this.json.value != ''){
			this.array_data = JSON.parse(this.json.value);
			this.array_data.forEach((data)=>{
				this.addRow(data);
			});
		}
	}

	fillTable(){
		const data = []
		this.inputs.forEach((input)=>{
			data.push(input.value);
			input.value = ''
		});
		this.array_data.push((data))

		
		this.addRow(data);
		console.log(JSON.stringify(this.array_data))
		this.json.value = JSON.stringify(this.array_data)
	}

	//metodo para agregar una fila a la tabla, recibe un array con los datos de la fila
	addRow (data){
		//elimina el mensaje de tabla vacia si existe
		this.clearMessage();


		//Creacion de la nueva fila y llenado de celdas con los datos
		const newRow = this.tableBody.insertRow();
		data.forEach((cellData, i) => {
			const newCell = newRow.insertCell();
			newCell.textContent = cellData;
		});

		//boton para eliminar la fila
		const optionsCell = newRow.insertCell();
		const deleteButton = document.createElement('button');
		deleteButton.textContent = 'Eliminar';
		deleteButton.classList.add('bg-red-500', 'rounded-md', 'text-white', 'font-bold', 'px-2', 'py-1', 
															 'hover:bg-red-700', 'hover:cursor-pointer');

		//añadir funcionalidad para eliminar la fila del boton
		deleteButton.addEventListener('click', (i) => {
			this.array_data.splice(newRow.rowIndex - 1, 1); 
			this.json.value = JSON.stringify(this.array_data)
			newRow.remove();
			this.checkEmptyTable();
		}); 
		optionsCell.appendChild(deleteButton);

		// FUNCIONALIDAD DE EDITAR PARA PROXIMOS PLANES
		const editButton = document.createElement('button');
		editButton.textContent = 'Editar';
		editButton.classList.add('bg-green-500', 'rounded-md', 'text-white', 'font-bold', 'px-2', 'py-1', 
		 													 'hover:bg-green-700', 'hover:cursor-pointer');
		editButton.addEventListener('click', () => {
		
			this.inputs.forEach((input, index) => {
				input.value = newRow.cells[index].textContent;
			});
			this.array_data.splice(newRow.rowIndex - 1, 1); // Eliminar la fila del array de datos
			newRow.remove();
			this.checkEmptyTable();
		}); 
		optionsCell.appendChild(editButton);
	}


	//metodo para agregar un mensaje de tabla vacia
	showEmptyTableMessage (){
		const emptyRow = this.tableBody.insertRow();
		emptyRow.id = `message_${this.tableElement.id}_empty`;
		console.log(emptyRow.id)
		const emptyCell = emptyRow.insertCell();
		emptyCell.colSpan = this.tableElement.rows[0].cells.length;
		emptyCell.textContent = 'No hay datos disponibles';
		emptyCell.classList.add('px-6','py-4', 'whitespace-nowrap', 'text-center', 'text-sm', 'text-gray-500');
	}

	//metodo para eliminar el mensaje de tabla vacia
	clearMessage (){
		const message = document.getElementById(`message_${this.tableElement.id}_empty`)
		if (message) {
			message.remove();
		}
	}

	//metodo para verificar si la tabla esta vacia y mostrar el mensaje correspondiente
	checkEmptyTable (){
		if (this.tableBody.rows.length === 0) {
			this.showEmptyTableMessage();
		}
		else {
			this.clearMessage();
		}
	} 

	
}