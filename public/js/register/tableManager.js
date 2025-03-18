export class TableManager {
  constructor(tableSelector) {

    this.tableSelector = tableSelector.replace(/^#/, '');
    this.tableBody = document.querySelector(`${tableSelector} tbody`);
  }

  addRow(eachColumn) {
    this.clearMessage();
    const row = this.tableBody.insertRow();
    eachColumn.forEach(text => row.insertCell().textContent = text);

    const deleteCell = row.insertCell();
    const btn = document.createElement('button');
    btn.textContent = 'Eliminar';
    btn.classList.add('btn', 'btn-danger','text-center');
    btn.addEventListener('click', () => {
      row.remove();
      this.checkEmpty();
    });
    deleteCell.appendChild(btn);
  }

  showEmptyMessage() {
    const row = this.tableBody.insertRow();
    row.id = `fila_mensaje_${this.tableSelector}`;
    const cell = row.insertCell();
    cell.colSpan = 5;
    cell.classList.add('text-center');
    cell.textContent = 'Nada para mostrar';
  }

  clearMessage() {
    const msg = document.getElementById(`fila_mensaje_${this.tableSelector}`);
    if (msg) msg.remove();
  }

  checkEmpty() {
    if (!this.tableBody.children.length) this.showEmptyMessage();
  }
}
