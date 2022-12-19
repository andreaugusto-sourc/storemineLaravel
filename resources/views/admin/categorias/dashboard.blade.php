@extends('layouts.main')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>Dashboard de Categorias</h1>
            </div>
            <div class="card-body">
                <a href="{{route('categorias.create')}}" class="btn btn-success btn-lg">Adicionar Categoria</a>
            </div>
        </div>
    </div>
</div>
@foreach ($Categorias as $Categoria)

<div class="d-flex justify-content-around align-items-center m-5">

    <a class="w-25" href="{{route('categorias.show',$Categoria->id)}}">{{$Categoria->nome}}</a>

    <form action="{{route('categorias.destroy',$Categoria->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('categorias.edit',$Categoria->id)}}">Editar</a></button>
</div>

@endforeach
@endsection
