@extends('layouts.main')

@section('title','Bem-vindo')

@section('content')

<div class="caixa-produtos d-flex flex-wrap justify-content-around">
    @foreach ($produtos as $produto)
        <div class="produto d-flex flex-column justify-content-evenly border border-secondary mb-4 mt-4 ">
            <a href="{{ route('produtos.show', $produto->id) }}">
            <img class="img-produto" src="images/upload/{{$produto['imagem']}}" alt="{{$produto->nome}}"> 
            </a>
            <div class="info-mobile">
                <a class="fs-1 text-dark" href="{{ route('produtos.show', $produto->id) }}"><u>{{$produto->nome}}</u></a>
                <article class="preco-produto">R$ {{$produto->preco}}</article>
            </div>

        </div>
    @endforeach
</div>   
@endsection