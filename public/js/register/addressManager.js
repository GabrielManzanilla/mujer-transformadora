export class AddressManager {
  constructor(tableSelector) {
    this.tableBody = document.querySelector(`${tableSelector} tbody`);
  }

  addAddress(direccion, municipio, localidad, estado) {
    this.clearMessage();
    const row = this.tableBody.insertRow();
    [direccion, municipio, localidad, estado].forEach(text => row.insertCell().textContent = text);

    const deleteCell = row.insertCell();
    const btn = document.createElement('button');
    btn.textContent = 'Eliminar';
    btn.classList.add('btn', 'btn-danger');
    btn.addEventListener('click', () => {
      row.remove();
      this.checkEmpty();
    });
    deleteCell.appendChild(btn);
  }

  showEmptyMessage() {
    const row = this.tableBody.insertRow();
    row.id = 'fila_mensaje';
    const cell = row.insertCell();
    cell.colSpan = 5;
    cell.classList.add('text-center');
    cell.textContent = 'Nada para mostrar';
  }

  clearMessage() {
    const msg = document.getElementById('fila_mensaje');
    if (msg) msg.remove();
  }

  checkEmpty() {
    if (!this.tableBody.children.length) this.showEmptyMessage();
  }
}
