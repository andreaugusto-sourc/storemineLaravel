@extends('layouts.main')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>Dashboard de Cupons de Desconto</h1>
            </div>
            <div class="card-body">
                <a href="{{route('cupons.create')}}" class="btn btn-success btn-lg">Adicionar Cupom de Desconto</a>
            </div>
        </div>
    </div>
</div>
@foreach ($CuponsDesconto as $CupomDesconto)

<div class="d-flex justify-content-around align-items-center m-5">

    <a class="w-25" href="{{route('cupons.show',$CupomDesconto->id)}}">{{$CupomDesconto->nome}}</a>

    <form action="{{route('cupons.destroy',$CupomDesconto->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('cupons.edit',$CupomDesconto->id)}}">Editar</a></button>
</div>

@endforeach
@endsection
