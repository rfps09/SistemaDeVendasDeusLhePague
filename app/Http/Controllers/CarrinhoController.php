<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use App\Models\DetalheVenda;
use DB;
use Exception;

class CarrinhoController extends Controller
{
    function adicionarCarrinho(Request $request,$codProduto) {
        $produtos = $request->session()->get('cart', []);

        if (array_key_exists($codProduto, $produtos)) {
            if($produtos[$codProduto]->qtdEstoque > $produtos[$codProduto]->qty)
                $produtos[$codProduto]->qty++;
        } else {
            $produto = Produto::find($codProduto);

            $produto->qty = 1;

            $produtos[$codProduto] = $produto;
        }

        $request->session()->put('cart',$produtos);

        return redirect('carrinho');
    }

    function removerCarrinho(Request $request, $index) {
        $request->session()->pull('cart.' . $index);

        return redirect('carrinho');
    }

    function carrinho(Request $request) {
        $produtos = $request->session()->get('cart', []);
        $total = 0;
        foreach($produtos as $produto) {
            $total += $produto->valorUnitario*$produto->qty;
        }

        return view('carrinho',['produtos' => $produtos, 'total' => $total]);
    }

    function comprar(Request $request) {
        $produtos = $request->session()->get('cart', []);

        if($produtos) {
            try{
                DB::beginTransaction();
                    $cliente = auth()->user();

                    $pedido = new Venda;

                    $pedido->codCliente = $cliente->id;

                    $pedido->save();

                    foreach($produtos as $produto) {
                        if($produto->qtdEstoque < $produto->qty) throw new Exception('Sem estoque');
                        $detalhePedido = new DetalheVenda;

                        $detalhePedido->codVenda = $pedido->codVenda;
                        $detalhePedido->codProduto = $produto->codProduto;
                        $detalhePedido->qtdProduto = $produto->qty;

                        Produto::where('codProduto', $produto->codProduto)->update(['qtdEstoque' => $produto->qtdEstoque - $produto->qty]);

                        $detalhePedido->save();
                    }

                    $request->session()->forget('cart');

                DB::commit();
            } catch(Exception $e) {
                DB::rollback();
            }
        }

        return redirect(route('meusPedidos'));
    }
}