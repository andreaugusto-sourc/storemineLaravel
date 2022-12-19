@extends('layouts.main')

@section('title','StoreMine')

@section('content')

<form class="form" action="{{ route('produtos.update', $Produto->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1>Editar Produto</h1>
    <label for="nome">Nome:</label>
    <input class="form-control" value="{{$Produto->nome}}" type="text" id="nome" name="nome">
    <label for="descricao">Descrição:</label>
    <input class="form-control" value="{{$Produto->descricao}}" type="text" id="descricao" name="descricao">
    <label for="imagem">Imagem:</label>
    <input class="form-control" type="file" id="imagem" name="imagem">
    <label for="preco">Preço:</label>
    <input class="form-control" value="{{$Produto->preco}}" type="number" id="preco" name="preco">
    <label for="ativo">Ativo:</label>
    <select name="ativo" id="ativo">
        @if($Produto->ativo == "Sim")
        <option selected>Sim</option>
        @else
        <option>Sim</option>
        @endif
        @if($Produto->ativo == "Não")
        <option selected>Não</option>
        @else
        <option>Não</option>
        @endif
    </select>
    <label for="estoque">Estoque:</label>
    <input class="form-control" value="{{$Produto->estoque}}" type="text" id="estoque" name="estoque">
    <select name="idCategoria" id="idCategoria">
        @foreach ($categorias as $categoria)
            @if ($categoria->id != $Produto->idCategoria)
            <option>{{$categoria->id}} - {{$categoria->nome}}</option>
            @else
            <option selected>{{$categoria->id}} - {{$categoria->nome}}</option>
            @endif
        @endforeach
    </select>
    <button type="submit" class="btn btn-secondary btn-lg">Editar</button>
</form>
@endsection