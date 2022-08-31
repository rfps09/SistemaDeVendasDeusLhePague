<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Produto;
use DB;

class ProdutosController extends Controller
{
    public function index(Request $request) {
        $search = $request->query('search');

        if($search) {
            $search = explode(' ', $search);

            $produtos = Produto::where('descricao', 'like', '%'. $search[0] .'%')->get();

            foreach ($search as $term) {
                $produtosInterset = Produto::where('descricao', 'like', '%'. $term .'%')->get();
                if($produtosInterset->isNotEmpty() && $produtos->isNotEmpty())
                    $produtos = $produtosInterset->intersect($produtos);
                else if($produtos->isEmpty())
                    $produtos = $produtosInterset;
            }
        } else {
            $produtos = Produto::all();
        }

        return view('home', ['produtos'=>$produtos]);
    }

    public function edicao(Request $request) {
        $search = $request->query('search');

        if($search) {
            $search = explode(' ', $search);

            $produtos = Produto::where('descricao', 'like', '%'. $search[0] .'%')->get();

            foreach ($search as $term) {
                $produtosInterset = Produto::where('descricao', 'like', '%'. $term .'%')->get();
                if($produtosInterset->isNotEmpty() && $produtos->isNotEmpty())
                    $produtos = $produtosInterset->intersect($produtos);
                else if($produtos->isEmpty())
                    $produtos = $produtosInterset;
            }
        } else {
            $produtos = Produto::all();
        }

        return view('editarProdutos', ['produtos'=>$produtos]);
    }

    public function cadastrar() {
        return view('cadastrarProduto');
    }

    public function editar($id) {
        $produto = Produto::find($id);

        return view('editarProduto', ['produto'=>$produto]);
    }

    public function remover($id) {
        if(Produto::destroy($id)) {
            File::delete(public_path('img/produtos/'. $id.'.jpg'));
        }

        return redirect(route('paginaEdicaoProdutos'));
    }

    public function produtoPagina($id) {
        $produto = Produto::find($id);

        return view('produto', ['produto'=>$produto]);
    }

    public function store(Request $request) {
        $statement = DB::select("SHOW TABLE STATUS LIKE 'produtos'");
        $id = $statement[0]->Auto_increment;

        $produto = new Produto;

        $produto->codProduto = $id;
        $produto->unidade = $request->unidade;
        $produto->descricao = $request->descricao;
        $produto->valorUnitario = $request->valorUnitario;
        $produto->estoqueMinimo = $request->estoqueMinimo;
        $produto->qtdEstoque = $request->qtdEstoque;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $extension = $request->image->extension();
            $imageName = $id.'.'.$extension;
            $request->image->move(public_path('img/produtos'), $imageName);
        }

        $produto->save();

        return redirect(route('home'));
    }

    public function change($id, Request $request) {
        $produto = Produto::find($id);

        $produto->unidade = $request->unidade;
        $produto->descricao = $request->descricao;
        $produto->valorUnitario = $request->valorUnitario;
        $produto->estoqueMinimo = $request->estoqueMinimo;
        $produto->qtdEstoque = $request->qtdEstoque;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $extension = $request->image->extension();
            $imageName = $id.'.'.$extension;
            $request->image->move(public_path('img/produtos'), $imageName);
        }

        $produto->save();

        return redirect(route('paginaEdicaoProdutos'));
    }
}
