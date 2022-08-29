<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Carrinho extends Component
{
    public function incrementar($key, Request $request) {
        $produto = $request->session()->get($key);
        if($produto->qty < $produto->qtdEstoque)
            $produto->qty++;
    }

    public function decrementar($key, Request $request) {
        $produto = $request->session()->get($key);
        if($produto->qty > 1)
            $produto->qty--;
    }

    public function render()
    {
        return view('livewire.carrinho');
    }
}
