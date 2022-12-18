@extends('layouts.main')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>Dashboard de produtos</h1>
            </div>
            <div class="card-body">
                <a href="{{route('produtos.create')}}" class="btn btn-success btn-lg">Adicionar Produto</a>
            </div>
        </div>
    </div>
</div>
@foreach ($Produtos as $Produto)

<div class="d-flex justify-content-around align-items-center m-5">

    <img src="images/upload/{{$Produto->imagem}}" class="logo border border-dark"" alt="{{$Produto->nome}}">

    <a class="w-25" href="{{route('produtos.show',$Produto->id)}}">{{$Produto->nome}}</a>

    <form action="{{route('produtos.destroy',$Produto->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('produtos.edit',$Produto->id)}}">Editar</a></button>
</div>

@endforeach
@endsection
