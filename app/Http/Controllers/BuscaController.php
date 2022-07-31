<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class BuscaController extends Controller
{
    private $produtos;
    public function __construct( Produto $produto) {
         $this->produtos = $produto;
     }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $busca,Produto $produtos)
    {
        if($busca =='-'){
            $busca = $request->get('busca');
        }
        $docura = $request->get('docura');
        $acidez = $request->get('acidez');
        $variedade = $request->get('variedade');

        $produtos = $produtos->where('nome', 'like', "%{$busca}%");

        $result= $produtos->get();
        if ($request->has('docura')) {
            $result = $result->where('docura','==',$docura);
        }
        if ($request->has('acidez')) {
            $result = $result->where('acidez','==',$acidez);
        }
        if ($request->has('variedade')) {
            $result = $result->where('variedade','==',$variedade);
        }
        return view('Busca.busca',compact('result','busca'));
    }


    public function destroy($id)
    {
        //
    }
}
