<?php

namespace App\Http\Controllers\Produtos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produtos;

use function Laravel\Prompts\search;

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

        return redirect('produtos')->with('msg', 'Produto cadastrado com sucesso');
    }

    public function show(string $id)
    {
        $produtos = Produtos::find($id);

        return $produtos ? view('produtos.show')->with('produtos', $produtos)
            : view('produtos.show')->with('msg', 'Produto não encontrado!');
    }

    public function destroy(string $id)
    {
        $produtos = Produtos::find($id);
        $produtos->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Post deleted successfully');
    }

    public function edit(string $id)
    {
        $produtos = Produtos::find($id);

        if ($produtos) {
            return view('produtos.edit')->with('produtos', $produtos);
        } else {
            $produtos = Produtos::all();
            return view('produtos.index')->with('produtos', $produtos)
                ->with('msg', 'Produto não encontrado!');
        }
    }

    public function update(Request $request, $id)
    {
        $produtos = Produtos::find($id);

        $produtos->name = $request->input('name');
        $produtos->description = $request->input('description');
        $produtos->price = $request->input('price');
        $produtos->weight = $request->input('weight');
        $produtos->category = $request->input('category');
        $produtos->quantity = $request->input('quantity');

        $produtos->save();

        return view('produtos.index')->with('produtos', $produtos)
            ->with('msg', 'Produto atualizado!');
    }

    public function getProdutos(Request $request)
    {
        $columnMapping = [
            0 => 'name',
            1 => 'description',
            2 => 'price',
            3 => 'weight',
            4 => 'category',
            5 => 'quantity',
        ];

        $orderColumnIndex = $request->input('order.0.column');
        $orderDir = $request->input('order.0.dir');

        $orderColumn = isset($columnMapping[$orderColumnIndex]) ? $columnMapping[$orderColumnIndex] : 'name';
        $orderDir = $orderDir ? $orderDir : 'asc';

        $produtos = Produtos::orderBy($orderColumn, $orderDir)->get();

        $search = $request->input('search');

        $data = [];
        if (isset($search["value"])) {
            $data = $this->search($search["value"]);
        } else {
            foreach ($produtos as $produto) {
                $data[] = [
                    $produto->name,
                    $produto->description,
                    $produto->price,
                    $produto->weight,
                    $produto->category,
                    $produto->quantity,
                    $produto->id,
                ];
            }
        }


        $response = (json_encode([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $produtos->count(),
            'recordsFiltered' => $produtos->count(),
            'data' => $data
        ]));

        return $response;
    }

    public function search($search)
    {
        $colunas = [
            'name',
            'description',
            'category',
            'price',
            'weight',
            'quantity'
        ];

        $query = Produtos::query();

        foreach ($colunas as $coluna) {
            $query->orWhere($coluna, 'like', '%' . $search . '%');
        }

        $produtos = $query->get();

        foreach ($produtos as $produto) {
            $data[] = [
                $produto->name,
                $produto->description,
                $produto->price,
                $produto->weight,
                $produto->category,
                $produto->quantity,
                $produto->id,
            ];
        }


        return $data;
    }
}
