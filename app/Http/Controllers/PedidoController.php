<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Venda;
use App\Models\DetalheVenda;
use DB;

class PedidoController extends Controller
{
    function pedidos() {
        $pedidos = [];
        $detalhePedidos = [];

        $id = auth()->user()->id;
        $pedidos = Venda::where('codCliente',$id)->orderBy('codVenda','desc')->get();

        foreach($pedidos as $pedido) {
            $key = $pedido->codVenda;
            $produtos = DB::table('detalhe_vendas')
            ->join('produtos', 'detalhe_vendas.codProduto', '=', 'produtos.codProduto')
            ->select('produtos.*', 'qtdProduto')
            ->where('codVenda',$key)
            ->get();
            $detalhePedidos[$key] = $produtos;
        }
    
        return view('meusPedidos', ['pedidos'=>$pedidos, 'detalhePedidos'=>$detalhePedidos]);
    }
}
