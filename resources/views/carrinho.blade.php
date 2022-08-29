@extends('layouts.main')

@section('title', 'Carrinho')

@section('conteudo')
<div class="container px-3 my-5 clearfix">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            @if(!empty($produtos))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $key => $produto)
                        <tr>
                            <td class="col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="{{ route('paginaProduto', ['id'=>$produto->codProduto]) }}"> <img class="media-object" src="/img/produtos/{{ $produto->codProduto }}.jpg" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{ route('paginaProduto', ['id'=>$produto->codProduto]) }}">{{ $produto->descricao }}</a></h4>
                                    <span>Status: </span><span class="text-success"><strong>Em estoque</strong></span>
                                </div>
                            </div></td>
                            <td class="col-md-1" style="text-align: center">
                                {{$produto->qty}}
                            </td>
                            <td class="col-md-1 text-center"><strong>R${{ number_format($produto->valorUnitario,2,",",".") }}</strong></td>
                            <td class="col-md-1 text-center"><strong>R${{ number_format($produto->valorUnitario*$produto->qty,2,",",".") }}</strong></td>
                            <td class="col-md-1">
                            <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> <a href="{{ route('removerCarrinho',['index' => $key]) }}" class="text-decoration-none link-light">Remove</a>
                            </button></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right">
                            <h5><strong>R${{ number_format($total,2,",",".") }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Frete</h5></td>
                        <td class="text-right"><h5><strong>R$0.00</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>R${{ number_format($total,2,",",".") }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> <a href="{{ route('home') }}" class="text-decoration-none link-dark">Continuar Comprando
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            <a href="{{ route('comprar') }}" class="text-decoration-none link-light">
                                Pagar 
                            </a>
                            <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
            @else
            <h1 class="text-center">Nem um item no carrinho</h1>
            @endif
        </div>
    </div>
</div>
@endsection