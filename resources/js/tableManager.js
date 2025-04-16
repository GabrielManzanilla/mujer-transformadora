export class TableManager{

	//obtencion del id de la tabla, extraccion del elemento tabla y de su body
	constructor (tableId){
		this.tableId = tableId;
		this.tableElement = document.getElementById(tableId);
		this.tableBody = this.tableElement.getElementsByTagName('tbody')[0];
	}

	//metodo para agregar una fila a la tabla, recibe un array con los datos de la fila
	addRow (data){
		//elimina el mensaje de tabla vacia si existe
		this.clearMessage();


		//Creacion de la nueva fila y llenado de celdas con los datos
		const newRow = this.tableBody.insertRow();
		data.forEach((cellData) => {
			const newCell = newRow.insertCell();
			newCell.textContent = cellData;
		});

		//boton para eliminar la fila
		const deleteCell = newRow.insertCell();
		const deleteButton = document.createElement('button');
		deleteButton.textContent = 'Eliminar';
		deleteButton.classList.add('btn', 'btn-danger');

		//añadir funcionalidad para eliminar la fila del boton
		deleteButton.addEventListener('click', () => {
			newRow.remove();
			this.checkEmptyTable();
		}); 
		deleteCell.appendChild(deleteButton);
	}


	//metodo para agregar un mensaje de tabla vacia
	showEmptyTableMessage (){
		const emptyRow = this.tableBody.insertRow();
		emptyRow.id = `message-${this.tableId}-empty`;
		const emptyCell = emptyRow.insertCell();
		emptyCell.colSpan = this.tableElement.rows[0].cells.length;
		emptyCell.textContent = 'No hay datos disponibles';
		emptyCell.classList.add('text-center', 'text-danger');
	}

	//metodo para eliminar el mensaje de tabla vacia
	clearMessage (){
		const emptyRow = document.getElementById(`message-${this.tableId}-empty`);
		if (emptyRow) {
			emptyRow.remove();
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