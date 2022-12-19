@extends('layouts.main')

@section('title', 'StoreMine')

@section('content')
<form class="form" action="{{ route('categorias.update', $Categoria->id) }}" method="post">
    @csrf
    @method('PUT')
    <h1>Editar Categoria</h1>
    <label for="nome">Nome:</label>
    <input value="{{$Categoria->nome}}" class="form-control" type="text" id="nome" name="nome">
    <label for="descricao">Descrição:</label>
    <input value="{{$Categoria->descricao}}" class="form-control" type="text" id="descricao" name="descricao">
    <button type="submit" class="btn btn-secondary btn-lg">Editar</button>
</form>
@endsection