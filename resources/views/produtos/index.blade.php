@extends('layout')
@section('content')
    <h2>Produtos Cadastrados</h2>
    @if (!isset($produtos))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Peso</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                {{-- itera sobre a coleção de veículos --}}
                @foreach ($produtos as $v)
                    <tr>
                        <td>{{ $v->name }} </td>
                        <td> {{ $v->description }} </td>
                        <td> {{ $v->price }} </td>
                        <td> {{ $v->weight }} </td>
                        <td> {{ $v->category }} </td>
                        <td> {{ $v->quantity }} </td>
                        {{-- vai para a rota show, passando o id como parâmetro --}}
                        <td> <a href="{{ route('produtos.show', $v->id) }}">Exibir</a> </td>
                        <td> <a href="{{ route('produtos.edit', $v->id) }}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Produtos Cadastrados: {{ $produtos->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection
