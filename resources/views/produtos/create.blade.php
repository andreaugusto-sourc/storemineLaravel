@extends('layouts.main')

@section('title','StoreMine')

@section('content')

<form class="form" action="{{route('produtos.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h1>Cadastrar Produto</h1>
    <label for="nome">Nome:</label>
    <input class="form-control" type="text" id="nome" name="nome">
    <label for="descricao">Descrição:</label>
    <input class="form-control" type="text" id="descricao" name="descricao">
    <label for="imagem">Imagem:</label>
    <input class="form-control" type="file" id="imagem" name="imagem">
    <label for="preco">Preço:</label>
    <input class="form-control" type="number" id="preco" name="preco">
    <label for="estoque">Estoque:</label>
    <input class="form-control" type="number" id="estoque" name="estoque">
    <select name="idCategoria" id="idCategoria">
        @foreach ($categorias as $categoria)
            <option>{{$categoria->id}} - {{$categoria->nome}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-secondary btn-lg">Cadastrar</button>
</form>
@endsection