@extends('layouts.main')

@section('title','Carrinho')
    
@section('content')
    @forelse($pedidos as $pedido)
    <section class="mb-5 mt-5">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="d-flex w-75 justify-content-between pt-3 pb-3">
                    <h2>Pedido: {{$pedidos->count()}}</h2>
                    <h2>Criado em: {{date('d/m/Y', strtotime($pedido->created_at))}}</h2>
                </div>
                @php
                $total_pedido = 0;   
                @endphp
                @foreach ($pedido->pedido_produtos as $pedido_produto)
                <div class="card mb-4">
                    <div class="card-body p-4">
                      <div class="row align-items-center fs-3 text-center">
                        <div class="col-md-2">
                          <img src="images/upload/{{$pedido_produto->produto->imagem}}"
                            class="img-fluid" alt="{{$pedido_produto->produto->descricao}}">
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                          <div>
                            <p class="small text-muted mb-4 pb-2">Produto</p>
                            <p class="lead fw-normal mb-0">{{$pedido_produto->produto->nome}}</p>
                          </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                          <div>
                            <p class="small text-muted mb-4 pb-2">Quantidade</p>
                            <div class="d-flex justify-content-around">
                                <a class="lead fw-normal mb-0" href=""><ion-icon name="add-circle-outline"></ion-icon></a>
                                <p class="lead fw-normal mb-0">{{$pedido_produto->qtd}}</p>
                                <a class="lead fw-normal mb-0" href=""><ion-icon name="remove-circle-outline"></ion-icon></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                          <div>
                            <p class="small text-muted mb-4 pb-2">Valor Unit.</p>
                            <p class="lead fw-normal mb-0">R$ {{number_format($pedido_produto->produto->preco,2,',','.')}}</p>
                          </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <div>
                              <p class="small text-muted mb-4 pb-2">Desconto(s)</p>
                              <p class="lead fw-normal mb-0">R$ {{number_format($pedido_produto->descontos,2,',','.')}}</p>
                            </div>
                          </div>
                        @php
                        $total_produto = $pedido_produto->valores - $pedido_produto->descontos;
                        $total_pedido += $total_produto; 
                        @endphp
                        <div class="col-md-2 d-flex justify-content-center">
                          <div>
                            <p class="small text-muted mb-4 pb-2">Total</p>
                            <p class="lead fw-normal mb-0">R$ {{number_format($total_produto,2,',','.')}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              <div class="card mb-5">
                <div class="card-body p-4">
                  <div class="float-end">
                    <p class="mb-0 me-5 d-flex align-items-center">
                      <span class="small text-muted me-2 fs-3">Total do pedido:</span> <span
                        class="lead fw-normal fs-2">R$ {{number_format($total_pedido,2,',','.')}} </span>
                    </p>
                  </div>
                </div>
              </div>
      
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success btn-lg me-2">Continue comprando</button>
                <button type="button" class="btn btn-primary btn-lg">Prosseguir</button>
              </div>
      
            </div>
          </div>
        </div>
        @empty
        <h1>Não há nenhum produto no carrinho</h1>
        @endforelse
      </section>
@endsection