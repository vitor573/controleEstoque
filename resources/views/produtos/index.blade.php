@extends('layout')
@section('content')
    <h2>Produtos Cadastrados</h2>
    @if (!isset($produtos))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
    @else
        <table id="list-products" class="data-table" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Peso</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Peso</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                </tr>
            </tfoot>
        </table>
    @endif
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="{{ asset('js/datatables-init.js') }}"></script>
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection
