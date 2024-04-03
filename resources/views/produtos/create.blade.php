@extends('layout')
@section('content')
<h2>Cadastrar Novo produto</h2>
<div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
<form class="form" method="POST" action="{{ route('produtos.store') }}" style="display: flex; flex-direction: column; gap: 10px;">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" required>
    <label for="price">Preço:</label>
    <input type="number" name="price" id="price" required>
    <label for="weight">Peso:</label>
    <input type="number" name="weight" id="weight" required>
    <label for="category">Categoria:</label>
    <input type="text" name="category" id="category" required>
    <label for="quantity">Quantidade:</label>
    <input type="number" name="quantity" id="quantity" required>
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" required></textarea>
    <div style="display: flex; justify-content: space-between; width: 100%;">
        <button type="submit" class="btn">Salvar</button>
        <button type="reset" class="btn">Limpar</button>
    </div>
</form>
</div>
@endsection
