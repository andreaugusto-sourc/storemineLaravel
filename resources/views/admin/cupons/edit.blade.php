@extends('layouts.main')

@section('title','Cadastro')

@section('content')

<form class="form" action="{{ route('cupons.update', $Produto->id) }}" method="post">
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
    <option>porc</option>
    <option>valor</option>
</select>

<label for="limite">Limite:</label>
<input value="{{$CupomDesconto->limite}}" type="number" name="limite" id="limite">

<label for="modo_limite">Modo limite:</label>
<select name="modo_limite" id="modo_limite">
    <option>qtd</option>
    <option>valor</option>
</select>

<label for="ativo">Ativo:</label>
<select name="ativo" id="ativo">
    <option>Sim</option>
    <option>Não</option>
</select>

<label for="dthr_validade">Data de validade:</label>
<input value="{{$CupomDesconto->dthr_validade}}" type="datetime-local" name="dthr_validade" id="dthr_validade">

<button type="submit" class="btn btn-secondary btn-lg">Cadastrar</button>
</form>
@endsection