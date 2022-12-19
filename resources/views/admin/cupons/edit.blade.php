@extends('layouts.main')

@section('title','Cadastro')

@section('content')

<form class="form" action="{{ route('cupons.update', $CupomDesconto->id) }}" method="post">
@csrf
@method('PUT')
<h1>Editar Cupom de Desconto</h1>
<label for="nome">Nome:</label>
<input value="{{$CupomDesconto->nome}}" type="text" name="nome" id="nome">

<label for="localizador">Localizador:</label>
<input value="{{$CupomDesconto->localizador}}" type="text" name="localizador" id="localizador">

<label for="desconto">Desconto:</label>
<input value="{{$CupomDesconto->desconto}}" type="number" name="desconto" id="desconto">

<label for="modo_desconto">Modo desconto:</label>
<select name="modo_desconto" id="modo_desconto">
    @if($CupomDesconto->modo_desconto == "porc")
    <option selected>porc</option>
    @else
    <option>porc</option>
    @endif
    @if($CupomDesconto->modo_desconto == "valor")
    <option selected>valor</option>
    @else
    <option>valor</option>
    @endif
</select>

<label for="limite">Limite:</label>
<input value="{{$CupomDesconto->limite}}" type="number" name="limite" id="limite">

<label for="modo_limite">Modo limite:</label>
<select name="modo_limite" id="modo_limite">
    @if($CupomDesconto->modo_desconto == "qtd")
    <option selected>qtd</option>
    @else
    <option>qtd</option>
    @endif
    @if($CupomDesconto->modo_desconto == "valor")
    <option selected>valor</option>
    @else
    <option>valor</option>
    @endif
</select>

<label for="ativo">Ativo:</label>
<select name="ativo" id="ativo">
    @if($CupomDesconto->ativo == "Sim")
    <option selected>Sim</option>
    @else
    <option>Sim</option>
    @endif
    @if($CupomDesconto->ativo == "Não")
    <option selected>Não</option>
    @else
    <option>Não</option>
    @endif
</select>

<label for="dthr_validade">Data de validade:</label>
<input value="{{$CupomDesconto->dthr_validade}}" type="datetime-local" name="dthr_validade" id="dthr_validade">

<button type="submit" class="btn btn-secondary btn-lg">Cadastrar</button>
</form>
@endsection