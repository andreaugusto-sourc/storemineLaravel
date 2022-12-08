@extends('layouts.main')

@section('title', 'StoreMine')

@section('content')
<form class="form" action="{{ route('categorias.store') }}" method="post">
    @csrf
    <h1>Cadastrar Categoria</h1>
    <label for="nome">Nome:</label>
    <input class="form-control" type="text" id="nome" name="nome">
    <label for="descricao">Descrição:</label>
    <input class="form-control" type="text" id="descricao" name="descricao">
    <button type="submit" class="btn btn-secondary btn-lg">Cadastrar</button>
</form>
@endsection