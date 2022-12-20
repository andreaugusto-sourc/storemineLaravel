@extends('layouts.main')

@section('title', $Produto->nome )

@section('content')
<div class="d-flex flex-wrap justify-content-center align-items-center mb-5 mt-5">
    <img src="/images/upload/{{$Produto->imagem}}" class="w-50 border border-secondary" alt="{{$Produto->nome}}">
    <div class="d-flex flex-column px-5">
        <p class="fs-1">{{$Produto->estoque}} Unidades</p>

        <h2 class="display-5">{{$Produto->nome}}</h2>

        <div class="d-flex flex-column mt-2 mb-4">
            <h1 class="display-4">R$ {{$Produto->preco}} à vista</h1>
            <aside class="fs-2">Em até 8X sem juros!</aside>
            <a class="fs-3"><u>Formas de pagamento</u></a>
        </div>

        <label for="quantidade" class="fs-3">Quantidade:</label>
        <select name="quantidade" id="quantidade">
            @for($i = 1; $i < 5; $i++)
                <option class="form-select-option">{{$i}}</option>
            @endfor
        </select>

        @if($Categoria->nome == "Roupas")
            <label for="tamanho" class="fs-3">Tamanho:</label>
            <select name="tamanho" id="tamanho">
                <option class="form-select-option">PP</option>
                <option class="form-select-option">P</option>
                <option class="form-select-option">M</option>
                <option class="form-select-option">G</option>
                <option class="form-select-option">GG</option>
            </select>
        @endif
 
        <div class="d-grid gap-2">
            <form action="{{route('carrinho.adicionar')}}" method="post">
            @csrf
            <input type="hidden" value="{{$Produto->id}}"name="id">
            <button type="submit" class="btn btn-success w-100">Comprar</button>
            </form>
        </div>

        <div class="d-flex flex-column mt-4">
            <h3 class="fs-1">Calcule seu frete</h3>
            <label for="inputFrete" class="fs-3">Digite seu CEP:</label>
            <input class="input" type="text" id="inputFrete" placeholder="Ex: 18105-720" name="inputFrete">
           
        </div>

    </div>
</div>
@endsection