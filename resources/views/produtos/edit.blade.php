@extends('layout')
@section('content')
<h2>Atualizar o Produto</h2>
<div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <form class="form" id="update-form" method="POST" action="{{ route('produtos.update', $produtos->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ $produtos->name }}">
        <label for="price">Preço:</label>
        <input type="number" name="price" id="price" required value="{{ $produtos->price }}">
        <label for="weight">Peso:</label>
        <input type="number" name="weight" id="weight" required value="{{ $produtos->weight }}">
        <label for="category">Categoria:</label>
        <input type="text" name="category" id="category" required value="{{ $produtos->category }}">
        <label for="quantity">Quantidade:</label>
        <input type="number" name="quantity" id="quantity" required value="{{ $produtos->quantity }}">
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" required>{{ $produtos->description }}</textarea>
        <div style="display: flex; justify-content: center; margin-top: 20px;">
            <button type="submit" class="btn" name="action" value="save">Salvar</button>
            <a href="{{ route('produtos.index') }}" class="btn">Voltar</a>
        </div>
    </form>
</div>
@endsection
