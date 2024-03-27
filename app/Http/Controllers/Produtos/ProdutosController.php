<?php

namespace App\Http\Controllers\Produtos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();

        return view('produtos.index')->with('produtos', $produtos);
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $produtos = new Produtos();

        $produtos->name = $request->input('name');
        $produtos->description = $request->input('description');
        $produtos->price = $request->input('price');
        $produtos->weight = $request->input('weight');
        $produtos->category = $request->input('category');
        $produtos->quantity = $request->input('quantity');

        $produtos->save();

        $produtos = Produtos::all();

        return view('produtos.index')->with('produtos', $produtos)
            ->with('msg', 'Produto cadastrado com sucesso');

    }

    public function show(string $id)
    {
        $produtos = Produtos::find($id);

       return $produtos ? view('produtos.show')->with('produtos', $produtos)
        : view('produtos.show')->with('msg', 'Produto não encontrado!');
    }

    public function edit(string $id)
    {
        $produtos = Produtos::find($id);

        if($produtos) {
            return view('produtos.edit')->with('produtos', $produtos);
        } else {
            $produtos = Produtos::all();
            return view('produtos.index')->with('produtos', $produtos)
                ->with('msg', 'Produto não encontrado!');
        }
    }

    public function update(Request $request, string $id)
    {
        $produtos = Produtos::find($id);

        $produtos->name = $request->input('name');
        $produtos->description = $request->input('description');
        $produtos->price = $request->input('price');
        $produtos->weight = $request->input('weight');
        $produtos->category = $request->input('category');
        $produtos->quantity = $request->input('quantity');

        $produtos->save();

        $produtos = Produtos::all();
        return view('produtos.index')->with('produtos', $produtos)
            ->with('msg', 'Produto não encontrado!');

    }

    public function destroy(string $id)
    {
        $produtos = Produtos::find($id);

        $produtos->delete();

        $produtos = Produtos::all();
        return view('produtos.index')->with('produtos', $produtos)
            ->with('msg', 'Produto não encontrado!');
    }
}
