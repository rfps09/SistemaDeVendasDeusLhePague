@extends('layouts.main')

@section('title', 'Edição de Produtos')

@section('conteudo')

@if(session('msg'))
<script>
    alert('{{ session('msg') }}');
</script>
@endif
<div class="container pt-5 mt-2 mt-md-n3">
    <div class="row justify-content-md-center">
        <div class="col-xl-9 col-md-8">
            <div class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary bg-gradient bg-opacity-75 container-fluid">
                <span>Edição de Produtos</span>

                <form class="d-flex" role="search" method="GET" action="{{ route('paginaEdicaoProdutos') }}">
                    <input class="form-control me-2" type="search" name="search" id="search" placeholder="Busca" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>

                <a class="font-size-sm" href="{{ back()->getTargetUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" style="width: 1rem; height: 1rem;">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                voltar
                </a>
            </div>
            <!-- Item-->
            @foreach ($produtos as $key => $produto)
            <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="{{ route('paginaProduto', ['id' => $produto->codProduto]) }}"><img src="/img/produtos/{{ $produto->codProduto }}.jpg" alt="Product" width="240" height="240"></a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="{{ route('paginaProduto', ['id' => $produto->codProduto]) }}">{{ $produto->descricao }}</a></h3>
                        <div class="font-size-lg text-primary pt-2">R${{ $produto->valorUnitario }}</div>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <a class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button" href="{{ route('paginaEdicaoProduto', ['id' => $produto->codProduto]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg>Editar</a>
                    <a class="btn btn-outline-danger btn-sm btn-block mb-2" type="button" href="{{ route('removerProduto', ['id' => $produto->codProduto]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>Remover</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection