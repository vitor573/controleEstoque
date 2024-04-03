@extends('layout')
@section('content')

@if (isset($msg))
<h3 style="color: red">Produto não encontrado!</h3>
@else
{{-- senão, mostra os dados --}}
<h2>Detalhes do produto</h2>
<div>
    <table id="product-details" class="data-table" style="width: 100%;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Peso</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th>ID</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $produtos->name }}</td>
                <td>{{ $produtos->price }}</td>
                <td>{{ $produtos->weight }}</td>
                <td>{{ $produtos->category }}</td>
                <td>{{ $produtos->quantity }}</td>
                <td>{{ $produtos->id }}</td>
                <td>{{ $produtos->description }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div style="display: flex; justify-content: center; margin-top: 20px;">
    <a href="{{ route('produtos.index') }}" class="btn">Voltar</a>
    <a href="{{ route('produtos.edit', $produtos->id) }}" class="btn">Editar</a>
    <a href="{{ route('produtos.destroy', $produtos->id) }}" class="btn" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Excluir</a>
    <form method="POST" id="delete-form" action="{{ route('produtos.destroy', $produtos->id) }}" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

</div>
@endif
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#product-details').DataTable();
    });
</script>
<script>
    var table = new DataTable('#product-details', {
    language: {
        url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/pt-BR.json',
    },
});
</script>
@endsection
