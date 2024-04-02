$(document).ready(function() {
    $('#list-products').DataTable({
        ajax: '/produtos/datatables', // Caminho para a rota que você criou
        processing: true,
        serverSide: true,
        columns: [
            { data: 0, name: 'nome' }, // Acessa o primeiro elemento do array
            { data: 1, name: 'descricao' }, // Acessa o segundo elemento do array
            { data: 2, name: 'preco' }, // Acessa o terceiro elemento do array
            { data: 3, name: 'peso' }, // Acessa o quarto elemento do array
            { data: 4, name: 'categoria' }, // Acessa o quinto elemento do array
            { data: 5, name: 'quantidade' } // Acessa o sexto elemento do array
           ]
    });
});
