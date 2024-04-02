import 'bootstrap';
import { DataTable } from 'simple-datatables';
window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    let dataTable = new DataTable("#datatablesSimple", {
        searchable: false,
        fixedHeight: true,
    });
});
