<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Compra;
use Auth;

class ComprasController extends Controller
{

    public function index()
    {
       
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $produto = Produto::findOrFail($request->get('idP'));
        $produtos = new \stdClass();

        $produtos->produto_id = $produto->idP;
        $produtos->produto_nome = $produto->nomeP;
        $produtos->produto_qtd = $request->get('qtd');
        $produtos = json_decode(json_encode($produtos));

        $compra = new Compra([
            "user_id"=>Auth::id(),
            "fornecedor_id"=> $produto->fornecedor_id,
            "produtos"=> $produtos,
       ]);
       $compra->save();
       return redirect('/')->with('success','Compra efetuada');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
       return redirect('/homeFornecedor')->with('success','Marcado como enviado com sucesso');
    }
}
