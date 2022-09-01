@extends('layouts.main')

@if($produto != NULL)
    @section('title', $produto->descricao)
@else
    @section('title', 'Produto não encontrado')
@endif
@section('conteudo')

@if($produto != NULL)
<div class="container mt-5 mb-5 pt-2">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="/img/produtos/{{$produto->codProduto}}.jpg" width="350" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-outline-secondary" href="{{ back()->getTargetUrl() }}">
                                        <svg class="bi bi-arrow-left-circle-fill pr-2" width="18" height="18"><use xlink:href="#arrow"/></svg>
                                        <span class="ml-2">Voltar</span>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-4 mb-3">
                                <h5 class="text-uppercase">{{$produto->descricao}}</h5>
                                <span class="strike-text">R${{number_format($produto->valorUnitario*1.40,2,',','.')}}</span>
                                <span>28% off</span>
                                <div class="price d-flex flex-row align-items-center"> 
                                    <h4 class="mr-1">R${{number_format($produto->valorUnitario,2,',','.')}}</h4>
                                </div>
                                <h6 class="text-success">Frete Grátis</h6>
                            </div>
                            
                            <div class="cart mt-4 align-items-center">
                                @if ($produto->qtdEstoque > 0)
                                <a href="{{ route('adicionarCarrinho', ['id' => $produto->codProduto]) }}" class="btn btn-primary text-uppercase mr-2 px-4">Adicionar ao carrinho</a>
                                @else
                                <a class="btn btn-danger text-uppercase mr-2 px-4" disabled>Indisponível</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="container mt-5 mb-5 pt-2 text-center">
        <h1>Produto não encontrado</h1>
    </div>
@endif
@endsection