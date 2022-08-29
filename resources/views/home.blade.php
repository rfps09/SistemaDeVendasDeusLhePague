@extends('layouts.main')

@section('title', 'SysSales')

@section('conteudo')

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            @foreach ($produtos as $produto)
            <div class="row p-2 bg-white border rounded mt-2">
                <div class="col-md-3 mt-1"><a href="{{ route('paginaProduto', ['id' => $produto->codProduto]) }}"><img class="img-fluid img-responsive rounded product-image" src="/img/produtos/{{$produto->codProduto}}.jpg"></a></div>
                <div class="col-md-6 mt-1">
                    <h5><a href="{{ route('paginaProduto', ['id' => $produto->codProduto]) }}">{{$produto->descricao}}</a></h5>    
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">R${{number_format($produto->valorUnitario,2,",",".")}}</h4><span class="strike-text">R${{number_format($produto->valorUnitario*1.40,2,",",".")}}</span>
                    </div>
                    <h6 class="text-success">Frete Grátis</h6>
                    <div class="d-flex flex-column mt-4">
                        <a class="btn btn-primary btn-sm" type="button" href="{{ route('paginaProduto', ['id' => $produto->codProduto]) }}">Detalhes</a>
                        @if ($produto->qtdEstoque > 0)
                        <a class="btn btn-outline-primary btn-sm mt-2" type="button" href="{{ route('adicionarCarrinho', ['id' => $produto->codProduto]) }}">Comprar</a>
                        @else
                        <a class="btn btn-danger btn-sm mt-2" type="button" disabled>Indisponível</a>
                        @endif
                        
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>

@endsection