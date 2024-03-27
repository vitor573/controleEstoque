@extends('layout')
@section('content')

    @if (isset($msg))
        <h3 style="color: red">Produto não encontrado!</h3>
    @else
    {{-- senão, mostra os daddos --}}
        <h2>Detalhes do produto</h2>
        <p><strong>Nome:</strong> {{ $produtos->name }} </p>
        <p><strong>Descrição:</strong> {{ $produtos->description }} </p>
        <p><strong>Preço:</strong> {{ $produtos->price }} </p>
        <p><strong>Peso:</strong> {{ $produtos->weight }} </p>
        <p><strong>Categoria:</strong> {{ $produtos->category }} </p>
        <p><strong>Quantidade:</strong> {{ $produtos->quantity }} </p>
        <a href="{{ route('produtos.index') }}">Voltar</a>
    @endif
@endsection
