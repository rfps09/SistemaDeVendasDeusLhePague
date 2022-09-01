@extends('layouts.main')

@section('title', 'Meus Pedidos')

@section('conteudo')
@if(session('msg'))
<script>
    alert('{{ session('msg') }}');
</script>
@endif
<div class="container mt-5 mb-5">
    @if($pedidos->isNotEmpty())
    <div class="col">
        @foreach ($pedidos as $pedido)
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                <h6 class="my-0 fw-normal">Pedido Nº {{ $pedido->codVenda }}</h6>
                <h6 class="my-0 fw-normal">Pedido realizado em {{ date_format(date_create($pedido->dataVenda), 'd/m/Y h:m') }}</h6>
                </div>
                <div class="card-body">
                    <div class="row bg-white border rounded">
                        <div class="col-md-2 mt-1"></div>
                        <div class="col-md-6 mt-1">
                            <h5>Produto</h5>    
                        </div>
                        <div class="align-items-center align-content-center col-md-2 border-left mt-1">
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <h5 class="mr-1">Preço</h5>
                            </div>
                        </div>
                        <div class="align-items-center align-content-center col-md-2 border-left mt-1">
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <h5 class="mr-1">Quantidade</h5>
                            </div>
                        </div>
                    </div>

                    @foreach ($detalhePedidos[$pedido->codVenda] as $produto)
                        <div class="row p-2 bg-white border rounded mb-2">
                            <div class="col-md-2 mt-1">
                                <a href="{{ route('paginaProduto', ['id' => $produto->codProduto]) }}">
                                    <img class="img-fluid img-responsive rounded product-image" src="/img/produtos/{{$produto->codProduto}}.jpg" width="240" height="240">
                                </a>
                            </div>
                            <div class="col-md-6 mt-1">
                                <h5><a href="{{ route('paginaProduto', ['id' => $produto->codProduto]) }}">{{ $produto->descricao }}</a></h5>    
                            </div>
                            <div class="align-items-center align-content-center col-md-2 border-left mt-1">
                                <div class="d-flex flex-row align-items-center justify-content-center">
                                    <h4 class="mr-1">R${{number_format($produto->valorUnitario,2,",",".")}}</h4>
                                </div>
                            </div>
                            <div class="align-items-center align-content-center col-md-2 border-left mt-1">
                                <div class="d-flex flex-row align-items-center justify-content-center">
                                    <h4 class="mr-1">{{ $produto->qtdProduto }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach
    </div>
    @else
    <h1 class="text-center">Nenhum Pedido Ainda</h1>
    @endif
<div class="container mt-5 mb-5">
@endsection