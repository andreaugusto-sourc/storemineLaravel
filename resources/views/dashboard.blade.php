@extends('layouts.main')

@section('title','Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Dashboard Geral</h1>
                <a class="btn btn-link text-dark" href="dashboard/categorias">Categorias</a>

                <a class="btn btn-link text-dark" href="dashboard/produtos">Produtos</a>
            
                <a class="btn btn-link text-dark" href="dashboard/cupons">Cupons</a>
            </div>
        </div>
    </div>
</div>
@endsection