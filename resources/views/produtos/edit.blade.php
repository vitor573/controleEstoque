@extends('layout')
@section('content')
<h2>Atualizar um Veículo</h2>
    {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
    <form class="form" id="update-form" method="POST" action="{{ route('produtos.update', $produtos->id) }}">
        {{-- CSRF é um token de segurança para validar o formulário --}}
        @csrf
        {{-- o método de atualização é o PUT --}}
        @method('PUT')
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ $produtos->name }}">
        <label for="Nome">Descrição:</label>
        <input type="text" name="description" id="description" required value ="{{ $produtos->description }}">
        <label for="Nome">Preço:</label>
        <input type="double" name="price" id="price" required value="{{ $produtos->price }}">
        <label for="Nome">Peso:</label>
        <input type="double" name="weight" id="weight" required value="{{ $produtos->weight }}">
        <label for="Nome">Categoria:</label>
        <input type="double" name="category" id="category" required value="{{ $produtos->category }}">
        <label for="Nome">Quantidade:</label>
        <input type="double" name="quantity" id="quantity" required value="{{ $produtos->quantity }}">
    </form>
    {{-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence --}}
    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>
    {{-- form para exclusão --}}
    <form method="POST" class="form" id="delete-form" action="{{ route('produtos.destroy', $produtos->id) }}">
        @csrf
        {{-- o método HTTP para exclusão deve ser o DELETE --}}
        @method('DELETE')

@endsection
