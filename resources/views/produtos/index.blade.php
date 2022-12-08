@extends('layouts.main')

@section('title','Bem-vindo')

@section('content')

<div class="caixa-produtos">
    @foreach ($produtos as $produto)
        <div class="produto">
            <a href="{{ route('produtos.show', $produto->id) }}">
            <img class="img-produto" src="images/upload/{{$produto['imagem']}}" alt="{{$produto->nome}}"> 
            </a>
            <div class="info-mobile">
                <a class="nome-produto" href="{{ route('produtos.show', $produto->id) }}">{{$produto->nome}}</a>
                <article class="preco-produto">R$ {{$produto->preco/100}}</article>
            </div>

        </div>
    @endforeach
</div>   
@endsection