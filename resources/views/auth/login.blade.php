@extends('layout')

@section('content')
<h2>Login</h2>
<div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <form class="form" method="POST" action="{{ route('login') }}" style="display: flex; flex-direction: column; gap: 10px;">
        @csrf
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>
        <div style="display: flex; justify-content: space-between; width: 100%;">
            <button type="submit" class="btn">Entrar</button>

        </div>
    </form>
</div>
@endsection
