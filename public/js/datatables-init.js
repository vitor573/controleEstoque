$(document).ready(function() {
    $('#list-products').DataTable({
        ajax: '/produtos/datatables',
        processing: true,
        serverSide: true,
        columns: [
            { data: 0, name: 'nome' },
            { data: 1, name: 'descricao' },
            { data: 2, name: 'preco' },
            { data: 3, name: 'peso' },
            { data: 4, name: 'categoria' },
            { data: 5, name: 'quantidade' },
            { data: 6, name: 'id', visible: false }
           ],
           language: {
            url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/pt-BR.json',
        },
           createdRow: function (row, data, index) {
            $(row).attr('data-id', data.id);

            $(row).on('click', function () {
                var produtoId = data[data.length - 1];
                var url = produtoShowUrl.replace(':id', produtoId);
                console.log(produtoShowUrl);
                window.location.href = url;
            });
        }
    });
});
