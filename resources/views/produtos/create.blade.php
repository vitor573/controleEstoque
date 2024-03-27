@extends('layout')
@section('content')
<h2>Cadastrar Novo produto</h2>
    {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
    <form class="form" method="POST" action="{{ route('produtos.store') }}">
        {{-- CSRF é um token de segurança para validar o formulário --}}
        @csrf
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required>
        <label for="Nome">Descrição:</label>
        <input type="text" name="description" id="description" required>
        <label for="Nome">Preço:</label>
        <input type="double" name="price" id="price" required>
        <label for="Nome">Peso:</label>
        <input type="double" name="weight" id="weight" required>
        <label for="Nome">Categoria:</label>
        <input type="double" name="category" id="category" required>
        <label for="Nome">Quantidade:</label>
        <input type="double" name="quantity" id="quantity" required>
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection
